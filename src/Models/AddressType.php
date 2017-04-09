<?php
/**
 * Contains the AddressType enum class.
 *
 * @copyright   Copyright (c) 2016 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2016-12-03
 *
 */


namespace Konekt\Address\Models;

use Konekt\Enum\Enum;

class AddressType extends Enum
{
    const __default = self::SHIPPING;
    const SHIPPING  = 'shipping';
    const BILLING   = 'billing';

    protected static $displayTexts = [
        self::SHIPPING => 'Shipping',
        self::BILLING  => 'Billing'
    ];

}
