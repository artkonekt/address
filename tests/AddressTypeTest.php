<?php
/**
 * Contains the AddressTypeTest class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-06-26
 *
 */


namespace Konekt\Address\Tests;


use Konekt\Address\Models\AddressType;
use Konekt\Address\Models\AddressTypeProxy;

class AddressTypeTest extends TestCase
{
    public function testCanBeInstantiated()
    {
        $type = new AddressType();
        $this->assertNotNull($type);
        $this->assertEquals(AddressType::__default, $type->getValue());

        $shipping = AddressType::SHIPPING();
        $this->assertTrue($shipping->equals(AddressTypeProxy::SHIPPING()));

        $billing = AddressType::BILLING();
        $this->assertTrue($billing->equals(AddressTypeProxy::BILLING()));

    }

}