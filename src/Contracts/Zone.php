<?php

declare(strict_types=1);

/**
 * Contains the Zone interface.
 *
 * @copyright   Copyright (c) 2023 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2023-02-26
 *
 */

namespace Konekt\Address\Contracts;

interface Zone
{
    public function addCountry(Country|string $country): void;

    public function addCountries(Country|string ...$countries): void;

    public function addProvince(Province $province): void;

    public function addProvinces(Province ...$provinces): void;

    public function isCountryPartOfIt(Country|string $country): bool;

    public function isProvincePartOfIt(Province $province): bool;

    public function isAddressPartOfIt(Address $address): bool;

    public function getMemberCountryIds(): array;

    public function getMemberProvinceIds(): array;
}
