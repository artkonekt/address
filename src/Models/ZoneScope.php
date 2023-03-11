<?php

declare(strict_types=1);

/**
 * Contains the ZoneScope class.
 *
 * @copyright   Copyright (c) 2023 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2023-02-26
 *
 */

namespace Konekt\Address\Models;

use Konekt\Address\Contracts\ZoneScope as ZoneScopeContract;
use Konekt\Enum\Enum;

/**
 * @method static self SHIPPING()
 * @method static self BILLING()
 * @method static self PRICING()
 * @method static self CONTENT()
 *
 * @method bool isShipping()
 * @method bool isBilling()
 * @method bool isPricing()
 * @method bool isContent()
 *
 * @property-read bool $is_shipping
 * @property-read bool $is_billing
 * @property-read bool $is_pricing
 * @property-read bool $is_content
 */
class ZoneScope extends Enum implements ZoneScopeContract
{
    public const __DEFAULT = self::SHIPPING;
    public const SHIPPING = 'shipping';
    public const BILLING = 'billing';
    public const TAXATION = 'taxation';
    public const PRICING = 'pricing';
    public const CONTENT = 'content';

    protected static array $labels = [];

    protected static function boot()
    {
        static::$labels = [
            self::SHIPPING => __('Shipping'),
            self::BILLING => __('Billing'),
            self::TAXATION => __('Taxation'),
            self::PRICING => __('Pricing'),
            self::CONTENT => __('Content'),
        ];
    }
}
