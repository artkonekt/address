<?php

declare(strict_types=1);

/**
 * Contains the ZoneMember interface.
 *
 * @copyright   Copyright (c) 2023 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2023-02-26
 *
 */

namespace Konekt\Address\Contracts;

interface ZoneMember
{
    public function getCountry(): ?Country;

    public function getProvince(): ?Province;

    public function isCountry(): bool;

    public function isProvince(): bool;

    public function getName(): string;
}
