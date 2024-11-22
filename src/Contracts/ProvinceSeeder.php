<?php

declare(strict_types=1);

namespace Konekt\Address\Contracts;

interface ProvinceSeeder
{
    public static function getCountryCode(): string;

    /**
     * @return array|ProvinceType[]
     */
    public static function getProvinceTypes(): array;
}
