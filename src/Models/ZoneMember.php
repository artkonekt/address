<?php

declare(strict_types=1);

/**
 * Contains the ZoneMember class.
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
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Konekt\Address\Contracts\Country;
use Konekt\Address\Contracts\Province;
use Konekt\Address\Contracts\ZoneMember as ZoneMemberContract;
use Konekt\Address\Contracts\ZoneMemberType as ZoneMemberTypeContract;
use Konekt\Enum\Eloquent\CastsEnums;

/**
 * @property int $id
 * @property ZoneMemberType $member_type
 * @property string $member_id
 * @property Country|Province|Model $member
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @method static ofType(ZoneMemberTypeContract|string $type): Builder
 */
class ZoneMember extends Model implements ZoneMemberContract
{
    use CastsEnums;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected array $enums = [
        'member_type' => 'ZoneMemberTypeProxy@enumClass',
    ];

    public function member(): MorphTo
    {
        return $this->morphTo('member');
    }

    public function getCountry(): ?Country
    {
        return $this->isCountry() ? $this->member : null;
    }

    public function getProvince(): ?Province
    {
        return $this->isProvince() ? $this->member : null;
    }

    public function isCountry(): bool
    {
        return $this->member_type->isCountry();
    }

    public function isProvince(): bool
    {
        return $this->member_type->isProvince();
    }

    public function getName(): string
    {
        return match ($this->member_type->value()) {
            ZoneMemberType::COUNTRY,
            ZoneMemberType::PROVINCE => $this->member?->name ?? $this->member_type . ':' . $this->member_id,
            default => $this->member_type . ':' . $this->member_id,
        };
    }

    public function scopeOfType(Builder $query, ZoneMemberTypeContract|string $type): Builder
    {
        return $query->where('member_type', is_string($type) ? $type : $type->value());
    }
}
