<?php
/**
 * Contains the Person entity class.
 *
 * @copyright   Copyright (c) 2016 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2016-12-04
 *
 */


namespace Konekt\Address\Models\Entities;

use Konekt\Address\Models\NameOrder;


/**
 * Person Entity class
 *
 * @property int            $id
 * @property string         $firstname  First Name
 * @property string         $lastname   Last Name
 * @property string         $email
 * @property string         $phone      Max 22 chars
 * @property string         $nin        National Identification Number max 21 chars
 * @property NameOrder      $nameorder  Name order (eastern or western)
 */
class Person extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'persons';

    /**
     * @return NameOrder
     */
    public function getNameorderAttribute($value)
    {
        return new NameOrder($value);
    }

    /**
     * @param NameOrder $nameOrder
     */
    public function setTypeAttribute(NameOrder $nameOrder)
    {
        $this->attributes['nameorder'] = $nameOrder->getValue();
    }

}