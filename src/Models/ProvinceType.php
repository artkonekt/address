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

class ProvinceType extends Enum implements ProvinceTypeContract
{
    const __default = self::PROVINCE;
    const STATE     = 'state';
    const REGION    = 'region';
    const PROVINCE  = 'province';
    const COUNTY    = 'county';

    protected static $displayTexts = [
        self::STATE    => 'State',
        self::REGION   => 'Region',
        self::PROVINCE => 'Province',
        self::COUNTY   => 'County'
    ];

}