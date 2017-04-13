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

/**
 * Address Entity class
 *
 * @property int            $id
 * @property string         $name
 * @property int            $country_id
 * @property int            $province_id
 * @property ProvinceType   $type
 * @property string         $postalcode     Max 12 characters
 * @property string         $city
 * @property string         $address
 */
class Address extends Model implements AddressContract
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'countries';

    /**
     * Relationship to the country the address belongs to
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo(CountryRepository::modelClass(), 'country_id');
    }

}