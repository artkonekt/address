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

use Konekt\Address\Contracts\AddressType as AddressTypeContract;
use Konekt\Enum\Enum;

class AddressType extends Enum implements AddressTypeContract
{
    const __default = self::SHIPPING;

    const SHIPPING  = 'shipping';
    const BILLING   = 'billing';

    protected static $labels = [];

    protected static function boot()
    {
        static::$labels = [
            self::SHIPPING => __('Shipping'),
            self::BILLING  => __('Billing')
        ];
    }

}
