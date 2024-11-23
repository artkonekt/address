<?php

declare(strict_types=1);

namespace Konekt\Address\Contracts;

use Konekt\Extend\Contracts\Registerable;

interface ProvinceSeeder extends Registerable
{
    public static function getCountryCode(): string;

    /**
     * @return array|ProvinceType[]
     */
    public static function getProvinceTypes(): array;

    public function run(): void;
}
