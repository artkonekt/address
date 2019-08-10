<?php
/**
 * Contains the Organization model class.
 *
 * @copyright   Copyright (c) 2016 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2016-12-04
 *
 */

namespace Konekt\Address\Models;

use Illuminate\Database\Eloquent\Model;
use Konekt\Address\Contracts\Organization as OrganizationContract;

/**
 * Organization Entity class
 *
 * @property int            $id
 * @property string         $name
 * @property string         $tax_nr             Tax/VAT Identification Number
 * @property string         $registration_nr    Company/Trade Registration Number
 */
class Organization extends Model implements OrganizationContract
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'organizations';

    protected $fillable = ['name', 'tax_nr', 'registration_nr', 'email', 'phone'];
}
