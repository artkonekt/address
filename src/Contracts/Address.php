<?php
/**
 * Contains the Address interface.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-04-09
 *
 */

namespace Konekt\Address\Contracts;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface Address
{
    public function country(): BelongsTo;

    public function province(): BelongsTo;
}
