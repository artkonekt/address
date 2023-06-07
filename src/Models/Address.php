<?php

declare(strict_types=1);

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
 * @property AddressType|null $type
 * @property string         $country_id
 * @property int|null       $province_id
 * @property string|null    $postalcode     Max 12 characters
 * @property string|null    $city
 * @property string         $address
 *
 * @property-read Country $country
 * @property-read null|Province $province
 * @method static Address create(array $attributes = [])
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
