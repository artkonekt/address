<?php

declare(strict_types=1);

/**
 * Contains the Zones class.
 *
 * @copyright   Copyright (c) 2023 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2023-02-26
 *
 */

namespace Konekt\Address\Query;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Konekt\Address\Contracts\Address;
use Konekt\Address\Contracts\Country;
use Konekt\Address\Contracts\Province;
use Konekt\Address\Contracts\ZoneScope as ZoneScopeContract;
use Konekt\Address\Models\ZoneMemberType;
use Konekt\Address\Models\ZoneProxy;
use Konekt\Address\Models\ZoneScope;
use Konekt\Address\Models\ZoneScopeProxy;

class Zones
{
    protected ?ZoneScope $scope = null;

    public static function withAnyScope(): static
    {
        return new static();
    }

    public static function withScope(string|ZoneScopeContract $scope): static
    {
        $instance = new static();
        $instance->scope = is_string($scope) ? ZoneScopeProxy::create($scope) : $scope;

        return $instance;
    }

    public static function withPricingScope(): static
    {
        return static::withScope(ZoneScope::PRICING);
    }

    public static function withBillingScope(): static
    {
        return static::withScope(ZoneScope::BILLING);
    }

    public static function withShippingScope(): static
    {
        return static::withScope(ZoneScope::SHIPPING);
    }

    public static function withContentScope(): static
    {
        return static::withScope(ZoneScope::CONTENT);
    }

    public static function withTaxationScope(): static
    {
        return static::withScope(ZoneScope::TAXATION);
    }

    public function get(): Collection
    {
        return $this->preparedQuery()->get();
    }

    public function theAddressBelongsTo(Address $address): Collection
    {
        $query = $this->preparedQuery();

        if (null !== $address->province_id) {
            $query->where(function (Builder $query) use ($address) {
                $query
                    ->whereHas('members', fn (Builder $q) => $q->where('member_type', ZoneMemberType::COUNTRY)->where('member_id', $address->country_id))
                    ->orWhereHas('members', fn (Builder $q) => $q->where('member_type', ZoneMemberType::PROVINCE)->where('member_id', $address->province_id));
            });
        } else {
            $query->whereHas('members', fn (Builder $q) => $q->where('member_type', ZoneMemberType::COUNTRY)->where('member_id', $address->country_id));
        }

        return $query->get();
    }

    public function theCountryBelongsTo(Country|string $country): Collection
    {
        return $this->preparedQuery()
            ->whereHas('members', fn (Builder $q) => $q->where('member_type', ZoneMemberType::COUNTRY)->where('member_id', is_string($country) ? strtoupper($country) : $country->id))
            ->get();
    }

    public function theProvinceBelongsTo(Province $province): Collection
    {
        return $this->preparedQuery()
            ->whereHas('members', fn (Builder $q) => $q->where('member_type', ZoneMemberType::PROVINCE)->where('member_id', $province->id))
            ->get();
    }

    protected function preparedQuery(): Builder
    {
        $query = ZoneProxy::query();
        if (null !== $this->scope) {
            $query->where('scope', $this->scope->value());
        }

        return $query;
    }
}
