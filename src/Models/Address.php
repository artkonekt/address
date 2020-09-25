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
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Konekt\Address\Contracts\Address as AddressContract;
use Konekt\Enum\Eloquent\CastsEnums;

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
    use CastsEnums;

    protected $guarded = ['id'];

    protected $enums = [
        'type' => AddressType::class
    ];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'addresses';

    public function country(): BelongsTo
    {
        return $this->belongsTo(CountryProxy::modelClass(), 'country_id');
    }

    public function province(): BelongsTo
    {
        return $this->belongsTo(ProvinceProxy::modelClass(), 'province_id');
    }
}
