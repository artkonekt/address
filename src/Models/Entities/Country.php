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

namespace Konekt\Location\Models\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Country Entity class
 *
 * @property string $id
 * @property string $name
 * @property int    $phonecode
 * @property bool   $is_eu_member
 */
class Country extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'countries';
}
