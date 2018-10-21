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

use Illuminate\Database\Eloquent\Model;
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
 */
class Province extends Model implements ProvinceContract
{
    use CastsEnums;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'provinces';

    protected $guarded = ['id'];

    protected $enums = [
        'type' => 'ProvinceTypeProxy@enumClass'
    ];

    public $timestamps = false;

    public function country()
    {
        return $this->belongsTo(CountryProxy::modelClass(), 'country_id');
    }

    /**
     * Returns a single province object by country and code
     *
     * @param \Konekt\Address\Contracts\Country|string $country
     * @param string                                   $code
     *
     * @return \Konekt\Address\Contracts\Province
     */
    public static function findByCountryAndCode($country, $code)
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
}
