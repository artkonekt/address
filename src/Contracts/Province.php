<?php
/**
 * Contains the Province interface.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-04-09
 *
 */

namespace Konekt\Address\Contracts;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

interface Province
{
    public static function findByCountryAndCode($country, string $code): ?Province;

    public function country(): BelongsTo;

    public function parent(): BelongsTo;

    public function children(): HasMany;

    public function removeParent(): void;

    public function setParent(Province $province): void;

    public function hasParent(): bool;
}
