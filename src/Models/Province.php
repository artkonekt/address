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

    public function country()
    {
        return $this->belongsTo(CountryProxy::modelClass(), 'country_id');
    }

    /**
     * @return ProvinceTypeContract
     */
    public function getTypeAttribute($value)
    {
        //Extend the enum proxy with a utility method for this
        $class = ProvinceTypeProxy::enumClass();

        return new $class($value);
    }

    /**
     * @param ProvinceTypeContract|string $value
     */
    public function setTypeAttribute($value)
    {
        $this->attributes['type'] = $value instanceof ProvinceTypeContract ? $value->getValue() : $value;
    }

}