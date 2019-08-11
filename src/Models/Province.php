<?php
/**
 * Contains the Province model class
 *
 * @copyright   Copyright (c) 2016 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2016-11-30
 *
 */

namespace Konekt\Address\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Konekt\Address\Contracts\Province as ProvinceContract;
use Konekt\Enum\Eloquent\CastsEnums;

/**
 * Province Entity class
 *
 * @property int          $id
 * @property int          $country_id
 * @property ProvinceType $type
 * @property string       $code       Max 16 characters
 * @property string       $name
 * @property ?Province    $parent
 * @property Collection   $children
 */
class Province extends Model implements ProvinceContract
{
    use CastsEnums;

    public $timestamps = false;

    protected $table = 'provinces';

    protected $guarded = ['id'];

    protected $enums = [
        'type' => 'ProvinceTypeProxy@enumClass'
    ];

    public function country(): BelongsTo
    {
        return $this->belongsTo(CountryProxy::modelClass(), 'country_id');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(ProvinceProxy::modelClass(), 'parent_id');
    }

    public function removeParent(): void
    {
        $this->parent()->dissociate();
    }

    public function setParent(ProvinceContract $province): void
    {
        $this->parent()->associate($province);
    }

    public function hasParent(): bool
    {
        return null !== $this->parent_id;
    }

    public function children(): HasMany
    {
        return $this->hasMany(ProvinceProxy::modelClass(), 'parent_id');
    }

    /** @inheritDoc */
    public static function findByCountryAndCode($country, string $code): ?ProvinceContract
    {
        $country = is_object($country) ? $country->id : $country;

        return ProvinceProxy::byCountry($country)
                            ->where('code', $code)
                            ->take(1)
                            ->get()
                            ->first();
    }

    public function scopeByCountry($query, $country)
    {
        $country = is_object($country) ? $country->id : $country;

        return $query->where('country_id', $country);
    }

    public function scopeByType($query, $provinceType)
    {
        $type = is_object($provinceType) ? $provinceType->value() : $provinceType;

        return $query->where('type', $type);
    }

    public function scopeSortByName($query)
    {
        return $query->orderBy('name');
    }
}
