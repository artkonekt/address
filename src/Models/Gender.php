<?php
/**
 * Contains the Gender enum class.
 *
 * @copyright   Copyright (c) 2016 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2016-12-04
 *
 */

namespace Konekt\Address\Models;

use Konekt\Address\Contracts\Gender as GenderContract;
use Konekt\Enum\Enum;

/**
 * @method static Gender UNKNOWN()
 * @method static Gender MALE()
 * @method static Gender FEMALE()
 */
class Gender extends Enum implements GenderContract
{
    const UNKNOWN = null;
    const MALE    = 'm';
    const FEMALE  = 'f';

    protected static $labels = [];

    protected static function boot()
    {
        static::$labels = [
            self::UNKNOWN => __('Unknown'),
            self::MALE    => __('Male'),
            self::FEMALE  => __('Female')
        ];
    }
}
