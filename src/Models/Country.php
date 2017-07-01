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
use Konekt\Address\Contracts\Country as CountryContract;

/**
 * Country Entity class
 *
 * @property string $id
 * @property string $name
 * @property int    $phonecode
 * @property bool   $is_eu_member
 */
class Country extends Model implements CountryContract
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'countries';

    /**
     * @var bool Country id's are non-numeric
     */
    public $incrementing = false;


    public function provinces()
    {
        return $this->hasMany(ProvinceProxy::modelClass(), 'country_id', 'id');
    }

    public function states()
    {
        return $this->provinces()->where('type', ProvinceType::STATE);
    }
}
