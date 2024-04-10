<?php

declare(strict_types=1);

/**
 * Contains the Zoneable trait.
 *
 * @copyright   Copyright (c) 2024 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2024-04-10
 *
 */

namespace Konekt\Address\Concerns;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;
use Konekt\Address\Contracts\Zone;
use Konekt\Address\Models\ZoneProxy;

/**
 * @property integer|null $zone_id
 * @property-read Zone|null $zone
 *
 * @method Builder forZone(Zone|int $zone)
 * @method Builder forZones(array|Collection $zones)
 */
trait Zoneable
{
    public function getZone(): ?Zone
    {
        return $this->zone;
    }

    public function isZoneRestricted(): bool
    {
        return null !== $this->zone_id;
    }

    public function isNotZoneRestricted(): bool
    {
        return !$this->isZoneRestricted();
    }

    public function zone(): BelongsTo
    {
        return $this->belongsTo(ZoneProxy::modelClass(), 'zone_id', 'id');
    }

    public function scopeForZone(Builder $query, Zone|int $zone): Builder
    {
        return $query->where('zone_id', is_int($zone) ? $zone : $zone->id);
    }

    public function scopeForZones(Builder $query, array|Collection $zones): Builder
    {
        if (is_array($zones)) {
            $zones = array_map(fn (Zone|int $zone) => is_int($zone) ? $zone : $zone->id, $zones);
        } else {
            $zones = $zones->map(fn (Zone $zone) => $zone->id);
        }

        return $query->whereIn('zone_id', $zones);
    }
}
