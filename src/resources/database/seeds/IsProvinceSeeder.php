<?php

declare(strict_types=1);

namespace Konekt\Address\Seeds;

use Konekt\Address\Contracts\ProvinceType;
use Konekt\Address\Models\ProvinceTypeProxy;

trait IsProvinceSeeder
{
    public static function getCountryCode(): string
    {
        return self::$forCountry;
    }

    public static function getProvinceTypes(): array
    {
        return array_map(fn (string|ProvinceType $type) => is_string($type) ? ProvinceTypeProxy::create($type) : $type, self::$provinceTypes);
    }
}
