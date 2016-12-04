<?php
/**
 * Contains the Organization entity class.
 *
 * @copyright   Copyright (c) 2016 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2016-12-04
 *
 */


namespace Konekt\Address\Models\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Organization Entity class
 *
 * @property int            $id
 * @property string         $name
 * @property string         $tax_nr             Tax/VAT Identification Number
 * @property string         $registration_nr    Company/Trade Registration Number
 */
class Organization extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'organizations';

}