<?php
/**
 * Contains the Country model class
 *
 * @copyright   Copyright (c) 2016 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2016-11-30
 *
 */

namespace Konekt\Address\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Konekt\Address\Contracts\Country as CountryContract;

/**
 * Country Model class
 *
 * @property string     $id
 * @property string     $name
 * @property int        $phonecode
 * @property bool       $is_eu_member
 * @property Collection provinces
 * @property Collection states
 * @property Collection counties
 */
class Country extends Model implements CountryContract
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'countries';

    protected $casts = [
        'is_eu_member' => 'bool'
    ];

    /**
     * @var bool Country id's are non-numeric
     */
    public $incrementing = false;

    public $timestamps = false;


    public function provinces()
    {
        return $this->hasMany(ProvinceProxy::modelClass(), 'country_id', 'id');
    }

    public function states()
    {
        return $this->provinces()->where('type', ProvinceType::STATE);
    }

    public function counties()
    {
        return $this->provinces()->where('type', ProvinceType::COUNTY);
    }
}
