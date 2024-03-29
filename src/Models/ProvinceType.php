<?php

declare(strict_types=1);

/**
 * Contains the ProvinceType class.
 *
 * @copyright   Copyright (c) 2016 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2016-11-24
 *
 */

namespace Konekt\Address\Models;

use Konekt\Address\Contracts\ProvinceType as ProvinceTypeContract;
use Konekt\Enum\Enum;

/**
 * @method static ProvinceType STATE()
 * @method static ProvinceType REGION()
 * @method static ProvinceType PROVINCE()
 * @method static ProvinceType COUNTY()
 * @method static ProvinceType TERRITORY()
 * @method static ProvinceType FEDERAL()
 * @method static ProvinceType MILITARY()
 * @method static ProvinceType UNIT()
 * @method static ProvinceType MUNICIPALITY()
 */
class ProvinceType extends Enum implements ProvinceTypeContract
{
    public const __DEFAULT = self::PROVINCE;

    public const STATE = 'state';
    public const REGION = 'region';
    public const PROVINCE = 'province';
    public const COUNTY = 'county';
    public const TERRITORY = 'territory';
    public const FEDERAL_DISTRICT = 'federal_district';
    public const MILITARY = 'military';
    public const UNIT = 'unit';
    public const MUNICIPALITY = 'municipality';

    protected static $labels = [];

    protected static function boot()
    {
        static::$labels = [
            self::STATE => __('State'),
            self::REGION => __('Region'),
            self::PROVINCE => __('Province'),
            self::COUNTY => __('County'),
            self::TERRITORY => __('Territory'),
            self::FEDERAL_DISTRICT => __('Federal District'),
            self::MILITARY => __('Military'),
            self::UNIT => __('Geographical Unit'),
            self::MUNICIPALITY => __('Municipality'),
        ];
    }
}
