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
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

    public function addCountry(CountryContract $country): void
    {
        $this->members()->create(['member_type' => ZoneMemberType::COUNTRY, 'member_id' => $country->id]);
    }

    public function addProvince(ProvinceContract $province): void
    {
        $this->members()->create(['member_type' => ZoneMemberType::PROVINCE, 'member_id' => $province->id]);
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
