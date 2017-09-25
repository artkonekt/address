<?php
/**
 * Contains the Person model class.
 *
 * @copyright   Copyright (c) 2016 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2016-12-04
 *
 */


namespace Konekt\Address\Models;

use DateTime;
use Konekt\Address\Contracts\Gender as GenderContract;
use Konekt\Address\Contracts\NameOrder as NameOrderContract;
use Konekt\Address\Contracts\Person as PersonContract;
use Illuminate\Database\Eloquent\Model;


/**
 * Person Entity class
 *
 * @property int            $id
 * @property string         $firstname  First Name
 * @property string         $lastname   Last Name
 * @property string         $email
 * @property DateTime       $birthdate
 * @property Gender         $gender
 * @property string         $phone      Max 22 chars
 * @property string         $nin        National Identification Number max 21 chars
 * @property NameOrder      $nameorder  Name order (eastern or western)
 */
class Person extends Model implements PersonContract
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'persons';

    protected $fillable = ['firstname', 'lastname', 'email', 'phone', 'birthdate', 'nin', 'gender', 'nameorder'];

    /**
     * The attributes to be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'birthdate'
    ];

    /**
     * @return NameOrder
     */
    public function getNameorderAttribute()
    {
        return NameOrderProxy::create(array_get($this->attributes, 'nameorder'));
    }

    /**
     * @param NameOrder|string $value
     */
    public function setNameorderAttribute($value)
    {
        $this->attributes['nameorder'] = $value instanceof NameOrderContract ? $value->value() : $value;
    }

    /**
     * @return Gender
     */
    public function getGenderAttribute()
    {
        return GenderProxy::create(array_get($this->attributes, 'gender'));
    }

    /**
     * @param Gender|string $value
     */
    public function setGenderAttribute($value)
    {
        $this->attributes['gender'] = $value instanceof GenderContract ? $value->value() : $value;
    }

    /**
     * @inheritdoc
     */
    public function name()
    {
        if ($this->nameorder && $this->nameorder->equals(NameOrder::EASTERN())) {
            return sprintf('%s %s', $this->lastname, $this->firstname);
        }

        return sprintf('%s %s', $this->firstname, $this->lastname);
    }

}