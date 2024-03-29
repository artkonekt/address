<?php

declare(strict_types=1);

/**
 * Contains the NameOrder enum class.
 *
 * @copyright   Copyright (c) 2016 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2016-12-04
 *
 */

namespace Konekt\Address\Models;

use Konekt\Address\Contracts\NameOrder as NameOrderContract;
use Konekt\Enum\Enum;

class NameOrder extends Enum implements NameOrderContract
{
    public const __DEFAULT = self::WESTERN;

    public const WESTERN = 'western';
    public const EASTERN = 'eastern';

    protected static $labels = [];

    protected static function boot()
    {
        static::$labels = [
            self::WESTERN => __('Western'),
            self::EASTERN => __('Eastern')
        ];
    }
}
