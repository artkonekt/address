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

/**
 *  @method static AddressType BILLING()
 *  @method static AddressType BUSINESS()
 *  @method static AddressType CONTRACT()
 *  @method static AddressType MAILING()
 *  @method static AddressType PICKUP()
 *  @method static AddressType RESIDENTIAL()
 *  @method static AddressType SHIPPING()
 *  @method static AddressType UNDEFINED()
 */
class AddressType extends Enum implements AddressTypeContract
{
    const __DEFAULT = self::UNDEFINED;

    /** To display on Invoices */
    const BILLING = 'billing';

    /** At which a business is located */
    const BUSINESS = 'business';

    /** Aka legal address: that is the registered address of a person/organization */
    const CONTRACT = 'contract';

    /** To which (physical) correspondence should be sent */
    const MAILING = 'mailing';

    /** At which items should be picked up */
    const PICKUP = 'pickup';

    /** Where a person lives */
    const RESIDENTIAL = 'residential';

    /** To which ordered goods should be delivered */
    const SHIPPING = 'shipping';

    /** Not specified */
    const UNDEFINED = null;

    protected static $labels = [];

    protected static function boot()
    {
        static::$labels = [
            self::BILLING     => __('Billing'),
            self::BUSINESS    => __('Business'),
            self::CONTRACT    => __('Contract'),
            self::MAILING     => __('Mailing'),
            self::PICKUP      => __('Pickup'),
            self::RESIDENTIAL => __('Residential'),
            self::SHIPPING    => __('Shipping'),
            self::UNDEFINED   => __('Undefined')
        ];
    }
}
