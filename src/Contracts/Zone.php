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
    public function addCountry(Country $country): void;
}