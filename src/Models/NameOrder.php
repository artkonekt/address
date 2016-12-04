<?php
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


use Konekt\Enum\Enum;

class NameOrder extends Enum
{
    const __default = self::WESTERN;
    const WESTERN   = 'western';
    const EASTERN   = 'eastern';

    protected static $displayTexts = [
        self::WESTERN => 'Western',
        self::EASTERN => 'Eastern'
    ];

}