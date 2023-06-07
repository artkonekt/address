<?php

declare(strict_types=1);

/**
 * Contains the Zone class.
 *
 * @copyright   Copyright (c) 2023 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2023-02-26
 *
 */

namespace Konekt\Address\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;
use Konekt\Address\Contracts\Address as AddressContract;
use Konekt\Address\Contracts\Country as CountryContract;
use Konekt\Address\Contracts\Province as ProvinceContract;
use Konekt\Address\Contracts\Zone as ZoneContract;
use Konekt\Enum\Eloquent\CastsEnums;

/**
 * @property int $id
 * @property string $name
 * @property ZoneScope $scope
 * @property Collection|ZoneMember[] $members
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @method static self create(array $attributes = [])
 *
 */
class Zone extends Model implements ZoneContract
{
    use CastsEnums;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected array $enums = [
        'scope' => 'ZoneScopeProxy@enumClass'
    ];

    public function members(): HasMany
    {
        return $this->hasMany(ZoneMemberProxy::modelClass());
    }

    public function addCountry(CountryContract|string $country): void
    {
        $this->members()->create(['member_type' => ZoneMemberType::COUNTRY, 'member_id' => is_string($country) ? $country : $country->id]);
    }

    public function addCountries(CountryContract|string ...$countries): void
    {
        DB::transaction(function () use ($countries) {
            foreach ($countries as $country) {
                $this->addCountry($country);
            }
        });
    }

    public function addProvince(ProvinceContract $province): void
    {
        $this->members()->create(['member_type' => ZoneMemberType::PROVINCE, 'member_id' => $province->id]);
    }

    public function addProvinces(ProvinceContract ...$provinces): void
    {
        DB::transaction(function () use ($provinces) {
            foreach ($provinces as $province) {
                $this->addProvince($province);
            }
        });
    }

    public function isCountryPartOfIt(CountryContract|string $country): bool
    {
        return (bool) $this->members()
            ->where('member_type', ZoneMemberType::COUNTRY)
            ->where('member_id', is_string($country) ? $country : $country->id)
            ->count();
    }

    public function isProvincePartOfIt(ProvinceContract $province): bool
    {
        return (bool) $this->members()
            ->where('member_type', ZoneMemberType::PROVINCE)
            ->where('member_id', $province->id)
            ->count();
    }

    public function isAddressPartOfIt(AddressContract $address): bool
    {
        $query = $this->members();
        if (null !== $address->province_id) {
            $query->orWhere(function (Builder $query) use ($address) {
                $query
                    ->where(fn (Builder $q) => $q->where('member_type', ZoneMemberType::COUNTRY)->where('member_id', $address->country_id))
                    ->where(fn (Builder $q) => $q->where('member_type', ZoneMemberType::PROVINCE)->where('member_id', $address->province_id));
            });
        } else {
            $query
                ->where('member_type', ZoneMemberType::COUNTRY)
                ->where('member_id', $address->country_id);
        }

        return (bool) $query->count();
    }

    public function getMemberCountryIds(): array
    {
        return $this->members()->ofType(ZoneMemberType::COUNTRY)->pluck('member_id')->toArray();
    }

    public function getMemberProvinceIds(): array
    {
        return $this->members()->ofType(ZoneMemberType::PROVINCE)->pluck('member_id')->toArray();
    }

    protected static function booted()
    {
        static::creating(function ($zone) {
            if (null === $zone->scope) {
                $zone->scope = ZoneScopeProxy::defaultValue();
            }
        });
    }
}
