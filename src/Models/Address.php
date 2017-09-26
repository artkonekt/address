<?php
/**
 * Contains the Address model class.
 *
 * @copyright   Copyright (c) 2016 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2016-12-03
 *
 */


namespace Konekt\Address\Models;

use Illuminate\Database\Eloquent\Model;
use Konekt\Address\Contracts\Address as AddressContract;
use Konekt\Address\Contracts\AddressType as AddressTypeContract;

/**
 * Address Entity class
 *
 * @property int            $id
 * @property string         $name
 * @property int            $country_id
 * @property int            $province_id
 * @property string         $postalcode     Max 12 characters
 * @property string         $city
 * @property string         $address
 */
class Address extends Model implements AddressContract
{
    protected $guarded = ['id'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'addresses';

    /**
     * Relationship to the country the address belongs to
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo(CountryProxy::modelClass(), 'country_id');
    }

    /**
     * Relationship to the province the address belongs to
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function province()
    {
        return $this->belongsTo(ProvinceProxy::modelClass(), 'province_id');
    }

    /**
     * @return AddressTypeContract
     */
    public function getTypeAttribute()
    {
        return AddressTypeProxy::create(array_get($this->attributes, 'type'));
    }

    /**
     * @param AddressTypeContract|string $value
     */
    public function setTypeAttribute($value)
    {
        $this->attributes['type'] = $value instanceof AddressTypeContract ? $value->value() : $value;
    }

}