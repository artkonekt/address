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
use Konekt\Address\Contracts\ProvinceType as ProvinceTypeContract;

/**
 * Province Entity class
 *
 * @property int            $id
 * @property int            $country_id
 * @property ProvinceType   $type
 * @property string         $code       Max 16 characters
 * @property string         $name
 */
class Province extends Model implements ProvinceContract
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'provinces';

    protected $guarded = ['id'];

    public $timestamps = false;

    public function country()
    {
        return $this->belongsTo(CountryProxy::modelClass(), 'country_id');
    }

    /**
     * @return ProvinceTypeContract
     */
    public function getTypeAttribute()
    {
        return ProvinceTypeProxy::create($this->attributes['type']);
    }

    /**
     * @param ProvinceTypeContract|string $value
     */
    public function setTypeAttribute($value)
    {
        $this->attributes['type'] = $value instanceof ProvinceTypeContract ? $value->value() : $value;
    }

    /**
     * Returns a single province object by country and code
     *
     * @param \Konekt\Address\Contracts\Country|string  $country
     * @param string                                    $code
     *
     * @return \Konekt\Address\Contracts\Province
     */
    public static function findByCountryAndCode($country, $code)
    {
        $country = is_object($country) ? $country->id : $country;

        return ProvinceProxy::where([
            'country_id' => $country,
            'code'       => $code
        ])->take(1)->get()->first();
    }

}