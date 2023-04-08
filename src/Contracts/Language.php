<?php

declare(strict_types=1);

/**
 * Contains the Language interface.
 *
 * @copyright   Copyright (c) 2023 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2023-04-08
 *
 */

namespace Konekt\Address\Contracts;

interface Language
{
    public static function findByIsoCode(string $code): ?Language;

    public function getIsoCode(): string;

    public function getName(): string;

    public function getNativeName(): string;
}
