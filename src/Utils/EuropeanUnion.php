<?php

declare(strict_types=1);

/**
 * Contains the EuropeanUnion class.
 *
 * @copyright   Copyright (c) 2024 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2024-03-11
 *
 */

namespace Konekt\Address\Utils;

use DateTimeInterface;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Date;

class EuropeanUnion
{
    protected static array $members = [
        'AT' => ['joined' => '1995-01-01', 'left' => null, 'regex' => 'ATU\d{8}'], // Austria
        'BE' => ['joined' => '1958-01-01', 'left' => null, 'regex' => 'BE\d{10}'], // Belgium
        'BG' => ['joined' => '2007-01-01', 'left' => null, 'regex' => 'BG\d{9,10}'], // Bulgaria
        'CY' => ['joined' => '2004-05-01', 'left' => null, 'regex' => 'CY\d{8}[A-Z]'], // Cyprus
        'CZ' => ['joined' => '2004-05-01', 'left' => null, 'regex' => 'CZ\d{8,10}'], // Czech Republic
        'DE' => ['joined' => '1958-01-01', 'left' => null, 'regex' => 'DE\d{9}'], // Germany
        'DK' => ['joined' => '1973-01-01', 'left' => null, 'regex' => 'DK\d{8}'], // Denmark
        'EE' => ['joined' => '2004-05-01', 'left' => null, 'regex' => 'EE\d{9}'], // Estonia
        'ES' => ['joined' => '1986-01-01', 'left' => null, 'regex' => 'ES([A-Z]\d{7}[A-Z]|\d{8}[A-Z]|[A-Z]\d{8})'], // Spain
        'FI' => ['joined' => '1995-01-01', 'left' => null, 'regex' => 'FI\d{8}'], // Finland
        'FR' => ['joined' => '1958-01-01', 'left' => null, 'regex' => 'FR[A-Z0-9]{2}\d{9}'], // France
        'GR' => ['joined' => '1981-01-01', 'left' => null, 'regex' => 'EL\d{9}'], // Greece
        'HR' => ['joined' => '2013-07-01', 'left' => null, 'regex' => 'HR\d{11}'], // Croatia
        'HU' => ['joined' => '2004-05-01', 'left' => null, 'regex' => 'HU\d{8}'], // Hungary
        'IE' => ['joined' => '1973-01-01', 'left' => null, 'regex' => 'IE\d{6,7}[A-Za-z]\d?[A-Za-z]?'], // Ireland
        'IT' => ['joined' => '1958-01-01', 'left' => null, 'regex' => 'IT\d{11}'], // Italy
        'LT' => ['joined' => '2004-05-01', 'left' => null, 'regex' => 'LT(\d{9}|\d{12})'], // Lithuania
        'LU' => ['joined' => '1958-01-01', 'left' => null, 'regex' => 'LU\d{8}'], // Luxembourg
        'LV' => ['joined' => '2004-05-01', 'left' => null, 'regex' => 'LV\d{11}'], // Latvia
        'MT' => ['joined' => '2004-05-01', 'left' => null, 'regex' => 'MT\d{8}'], // Malta
        'NL' => ['joined' => '1958-01-01', 'left' => null, 'regex' => 'NL\d{9}B(\d{2}|O2)'], // Netherlands
        'PL' => ['joined' => '2004-05-01', 'left' => null, 'regex' => 'PL\d{10}'], // Poland
        'PT' => ['joined' => '1986-01-01', 'left' => null, 'regex' => 'PT\d{9}'], // Portugal
        'RO' => ['joined' => '2007-01-01', 'left' => null, 'regex' => 'RO\d{2,10}'], // Romania
        'SE' => ['joined' => '1995-01-01', 'left' => null, 'regex' => 'SE\d{12}'], // Sweden
        'SI' => ['joined' => '2004-05-01', 'left' => null, 'regex' => 'SI\d{8}'], // Slovenia
        'SK' => ['joined' => '2004-05-01', 'left' => null, 'regex' => 'SK\d{10}'], // Slovakia
        'UK' => ['joined' => '1973-01-01', 'left' => '2020-01-31', 'regex' => 'GB\d{9}'], // United Kingdom
    ];

    /**
     * @param string $vatNumber
     * @return false|string
     */
    public static function validateVatNumberFormat(string $vatNumber): false|string
    {
        $country = mb_strtoupper(mb_substr($vatNumber, 0, 2));
        $country = match ($country) {
            'EL' => 'GR',
            'GB' => 'UK',
            default => $country,
        };

        if (null === $format = Arr::get(static::$members, "$country.regex")) {
            return false;
        }

        return preg_match("/^$format$/", mb_strtoupper($vatNumber)) ? $country : false;
    }

    public static function isMemberState(string $countryCode, string|DateTimeInterface $at = null): bool
    {
        if (null === $member = Arr::get(static::$members, $countryCode)) {
            return false;
        }

        $at ??= Date::now();
        if (!$at instanceof Carbon) {
            $at = Date::parse($at);
        }

        $joined = Date::parse($member['joined']);
        if ($joined->isAfter($at)) {
            return false;
        }

        return null === $member['left'] || $at->isBefore(Date::parse($member['left']));
    }

    public static function isNotAMemberState(string $countryCode, string|DateTimeInterface $at = null): bool
    {
        return !self::isMemberState($countryCode, $at);
    }
}
