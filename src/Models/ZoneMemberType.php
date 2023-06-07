<?php

declare(strict_types=1);

/**
 * Contains the ZoneMemberType class.
 *
 * @copyright   Copyright (c) 2023 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2023-02-26
 *
 */

namespace Konekt\Address\Models;

use Konekt\Address\Contracts\ZoneMemberType as ZoneMemberTypeContract;
use Konekt\Enum\Enum;

/**
 * @method static self COUNTRY()
 * @method static self PROVINCE()
 *
 * @method bool isCountry()
 * @method bool isProvince()
 *
 * @property-read bool $is_country
 * @property-read bool $is_province
 */
class ZoneMemberType extends Enum implements ZoneMemberTypeContract
{
    public const __DEFAULT = self::COUNTRY;
    public const COUNTRY = 'country';
    public const PROVINCE = 'province';

    protected static array $labels = [];

    protected static function boot()
    {
        static::$labels = [
            self::COUNTRY => __('Country'),
            self::PROVINCE => __('Province'),
        ];
    }
}
