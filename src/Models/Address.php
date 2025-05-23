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
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Konekt\Address\Contracts\Address as AddressContract;
use Konekt\Enum\Eloquent\CastsEnums;

/**
 * Address Entity class
 *
 * @property int            $id
 * @property string         $name
 * @property string|null    $company_name
 * @property string|null    $firstname
 * @property string|null    $lastname
 * @property AddressType|null $type
 * @property string         $country_id
 * @property int|null       $province_id
 * @property string|null    $postalcode     Max 12 characters
 * @property string|null    $city
 * @property string         $address
 * @property string|null    $address2
 * @property string|null    $email
 * @property string|null    $phone
 * @property string|null    $tax_nr
 * @property string|null    $registration_nr
 * @property string|null    $access_code
 * @property Model|null     $model
 *
 * @property-read Country $country
 * @property-read null|Province $province
 * @method static Address create(array $attributes = [])
 */
class Address extends Model implements AddressContract
{
    use CastsEnums;

    public static string $toStringFormat = '%name%, %address% [%city%, %country_id%]';

    protected $guarded = ['id'];

    protected $enums = [
        'type' => 'AddressTypeProxy@enumClass'
    ];

    protected $table = 'addresses';

    public function __toString(): string
    {
        return str_replace(
            [
                '%name%', '%company_name%', '%firstname%', '%lastname%', '%city%', '%country%', '%province%', '%type%',
                '%country_id%', '%province_id%', '%postalcode%', '%address%', '%address2%', '%email%', '%phone%',
                '%tax_nr%', '%registration_nr%', '%access_code%'
            ],
            [
                $this->name, $this->company_name, $this->firstname, $this->lastname, $this->city, $this->country?->name,
                $this->province?->name, $this->type?->label(), $this->country_id, $this->province_id, $this->postalcode,
                $this->address, $this->address2, $this->email, $this->phone, $this->tax_nr, $this->registration_nr,
                $this->access_code,
            ],
            static::$toStringFormat
        );
    }

    public function model(): MorphTo
    {
        return $this->morphTo();
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(CountryProxy::modelClass(), 'country_id');
    }

    public function province(): BelongsTo
    {
        return $this->belongsTo(ProvinceProxy::modelClass(), 'province_id');
    }
}
