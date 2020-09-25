<?php
/**
 * Contains the Country interface.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-04-09
 *
 */

namespace Konekt\Address\Contracts;

use Illuminate\Database\Eloquent\Relations\HasMany;

interface Country
{
    public function provinces(): HasMany;
}
