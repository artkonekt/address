<?php
/**
 * Contains the Address entity class.
 *
 * @copyright   Copyright (c) 2016 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2016-12-03
 *
 */


namespace Konekt\Address\Models\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Address Entity class
 *
 * @property int            $id
 * @property string         $name
 * @property string         $email
 * @property string         $phone      Max 22 chars
 * @property int            $country_id
 * @property int            $province_id
 * @property ProvinceType   $type
 * @property string         $zip       Max 12 characters
 * @property string         $city
 * @property string         $address
 */
class Address extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'countries';

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

}