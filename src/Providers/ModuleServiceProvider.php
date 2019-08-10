<?php
/**
 * Contains the ModuleServiceProvider class.
 *
 * @copyright   Copyright (c) 2016 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2016-11-30
 *
 */

namespace Konekt\Address\Providers;

use Konekt\Address\Models\Address;
use Konekt\Address\Models\AddressType;
use Konekt\Address\Models\Country;
use Konekt\Address\Models\Gender;
use Konekt\Address\Models\NameOrder;
use Konekt\Address\Models\Organization;
use Konekt\Address\Models\Person;
use Konekt\Address\Models\Province;
use Konekt\Address\Models\ProvinceType;
use Konekt\Concord\BaseModuleServiceProvider;

class ModuleServiceProvider extends BaseModuleServiceProvider
{
    protected $models = [
        Address::class,
        Country::class,
        Organization::class,
        Person::class,
        Province::class
    ];

    protected $enums = [
        AddressType::class,
        Gender::class,
        NameOrder::class,
        ProvinceType::class
    ];
}
