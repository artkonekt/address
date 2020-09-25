<?php
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
    const __DEFAULT        = self::PROVINCE;

    const STATE            = 'state';
    const REGION           = 'region';
    const PROVINCE         = 'province';
    const COUNTY           = 'county';
    const TERRITORY        = 'territory';
    const FEDERAL_DISTRICT = 'federal_district';
    const MILITARY         = 'military';
    const UNIT             = 'unit';
    const MUNICIPALITY     = 'municipality';

    protected static $labels = [];

    protected static function boot()
    {
        static::$labels = [
            self::STATE            => __('State'),
            self::REGION           => __('Region'),
            self::PROVINCE         => __('Province'),
            self::COUNTY           => __('County'),
            self::TERRITORY        => __('Territory'),
            self::FEDERAL_DISTRICT => __('Federal District'),
            self::MILITARY         => __('Military'),
            self::UNIT             => __('Geographical Unit'),
            self::MUNICIPALITY     => __('Municipality'),
        ];
    }
}
