<?php
/**
 * Contains the Province.php
 *
 * @copyright   Copyright (c) 2016 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2016-11-30
 *
 */


namespace Konekt\Address\Models\Entities;

use Illuminate\Database\Eloquent\Model;
use Konekt\Address\Models\ProvinceType;

/**
 * Province Entity class
 *
 * @property int            $id
 * @property int            $country_id
 * @property ProvinceType   $type
 * @property string         $code       Max 16 characters
 * @property string         $name
 */
class Province extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'provinces';

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    /**
     * @return ProvinceType
     */
    public function getTypeAttribute($value)
    {
        return new ProvinceType($value);
    }

    /**
     * @param ProvinceType $provinceType
     */
    public function setTypeAttribute(ProvinceType $provinceType)
    {
        $this->attributes['type'] = $provinceType->getValue();
    }

}