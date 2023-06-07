<?php

declare(strict_types=1);
/**
 * Contains the AddressTest class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-09-15
 *
 */

namespace Konekt\Address\Tests;

use Konekt\Address\Contracts\Address as AddressContract;
use Konekt\Address\Contracts\AddressType as AddressTypeContract;
use Konekt\Address\Contracts\Province as ProvinceContract;
use Konekt\Address\Models\Address;
use Konekt\Address\Models\AddressProxy;
use Konekt\Address\Models\AddressType;
use Konekt\Address\Models\Country;
use Konekt\Address\Models\Province;
use Konekt\Address\Models\ProvinceType;
use Konekt\Address\Seeds\CountiesOfRomania;
use Konekt\Address\Seeds\Countries;
use Konekt\Address\Seeds\StatesOfUsa;
use Konekt\Enum\Enum;

class AddressTest extends TestCase
{
    protected $hello = [
        'name' => 'HELLOFRESH SE',
        'country_id' => 'DE',
        'address' => '37A Saarbrücker Strasse',
        'city' => 'Berlin'
    ];

    protected $avaya = [
        'name' => 'Avaya Inc.',
        'company_name' => 'Avaya Inc.',
        'firstname' => 'Alan',
        'lastname' => 'Masarek',
        'access_code' => '7661',
        'country_id' => 'US',
        'address' => '4655 Great America Parkway',
        'address2' => 'xyz',
        'phone' => '+1555666777',
        'email' => 'contact@avaya.com',
        'tax_nr' => 'US123456',
        'registration_nr' => 'US123456',
        'city' => 'Santa Clara',
        'state' => 'CA'
    ];

    /** @var  Province */
    protected $california;

    /**
     * @test
     */
    public function can_be_instantiated()
    {
        $address = new Address();

        $this->assertInstanceOf(Address::class, $address);
    }

    /**
     * @test
     */
    public function implements_the_address_interface()
    {
        $address = new Address();

        $this->assertInstanceOf(AddressContract::class, $address);
    }

    /**
     * @test
     */
    public function address_proxy_returns_the_proper_class()
    {
        $this->assertEquals(Address::class, AddressProxy::modelClass());
    }

    /**
     * @test
     */
    public function can_be_created_with_minimal_data()
    {
        $address = AddressProxy::create([
            'name' => $this->hello['name'],
            'country_id' => $this->hello['country_id'],
            'address' => $this->hello['address']
        ]);

        $this->assertInstanceOf(Address::class, $address);

        $address = $address->fresh();

        $this->assertEquals($this->hello['name'], $address->name);
        $this->assertEquals($this->hello['address'], $address->address);
        $this->assertEquals($this->hello['country_id'], $address->country_id);
    }

    /**
     * @test
     */
    public function address_type_is_enum()
    {
        $address = AddressProxy::create([
            'name' => $this->hello['name'],
            'country_id' => $this->hello['country_id'],
            'address' => $this->hello['address']
        ]);

        $this->assertInstanceOf(Enum::class, $address->type);
        $this->assertInstanceOf(AddressTypeContract::class, $address->type);
    }

    /**
     * @test
     */
    public function address_type_is_null_slash_undefined_by_default()
    {
        $address = AddressProxy::create([
            'name' => $this->hello['name'],
            'country_id' => $this->hello['country_id'],
            'address' => $this->hello['address']
        ]);

        $this->assertNull($address->type->value());
        $this->assertTrue(AddressType::UNDEFINED()->equals($address->type));
    }

    public function returns_the_country_model()
    {
        $address = AddressProxy::create([
            'name' => $this->hello['name'],
            'country_id' => $this->hello['country_id'],
            'city' => $this->hello['city'],
            'address' => $this->hello['address']
        ]);

        $this->assertInstanceOf(Address::class, $address);
        $this->assertEquals($this->hello['city'], $address->city);

        $this->assertInstanceOf(Country::class, $address->country);
        $this->assertEquals($this->hello['country_id'], $address->country->id);
    }

    /**
     * @test
     */
    public function returns_province_as_model()
    {
        $state = Province::findByCountryAndCode($this->avaya['country_id'], $this->avaya['state']);

        $this->assertInstanceOf(Province::class, $state);

        $address = AddressProxy::create([
            'name' => $this->avaya['name'],
            'country_id' => $this->avaya['country_id'],
            'province_id' => $state->id,
            'city' => $this->avaya['city'],
            'address' => $this->avaya['address']
        ]);

        $this->assertInstanceOf(Province::class, $address->province);
        $this->assertInstanceOf(ProvinceContract::class, $address->province);
        $this->assertEquals($this->avaya['state'], $address->province->code);
        $this->assertEquals(ProvinceType::STATE, $address->province->type->value());
    }

    /**
     * @test
     */
    public function it_properly_saves_all_the_fields()
    {
        $state = Province::findByCountryAndCode($this->avaya['country_id'], $this->avaya['state']);

        $address = AddressProxy::create([
            'name' => $this->avaya['name'],
            'firstname' => $this->avaya['firstname'],
            'lastname' => $this->avaya['lastname'],
            'company_name' => $this->avaya['company_name'],
            'country_id' => $this->avaya['country_id'],
            'province_id' => $state->id,
            'city' => $this->avaya['city'],
            'address' => $this->avaya['address'],
            'address2' => $this->avaya['address2'],
            'email' => $this->avaya['email'],
            'phone' => $this->avaya['phone'],
            'access_code' => $this->avaya['access_code'],
            'tax_nr' => $this->avaya['tax_nr'],
            'registration_nr' => $this->avaya['registration_nr'],
            'type' => AddressType::BUSINESS
        ]);

        $address->refresh();

        $this->assertNotNull($address->id);
        $this->assertEquals($this->avaya['name'], $address->name);
        $this->assertEquals($this->avaya['company_name'], $address->company_name);
        $this->assertEquals($this->avaya['firstname'], $address->firstname);
        $this->assertEquals($this->avaya['lastname'], $address->lastname);

        $this->assertEquals($this->avaya['country_id'], $address->country_id);
        $this->assertEquals($this->avaya['country_id'], $address->country->id);

        $this->assertEquals($state->id, $address->province_id);
        $this->assertEquals($state->id, $address->province->id);
        $this->assertEquals($this->avaya['state'], $address->province->code);

        $this->assertEquals($this->avaya['city'], $address->city);
        $this->assertEquals($this->avaya['address'], $address->address);
        $this->assertEquals($this->avaya['address2'], $address->address2);

        $this->assertEquals($this->avaya['email'], $address->email);
        $this->assertEquals($this->avaya['phone'], $address->phone);
        $this->assertEquals($this->avaya['tax_nr'], $address->tax_nr);
        $this->assertEquals($this->avaya['registration_nr'], $address->registration_nr);
        $this->assertEquals($this->avaya['access_code'], $address->access_code);

        $this->assertTrue(AddressType::BUSINESS()->equals($address->type));
    }

    /**
     * @inheritdoc
     */
    protected function setUpDatabase($app)
    {
        parent::setUpDatabase($app);

        $this->artisan('db:seed', ['--class' => Countries::class]);
        $this->artisan('db:seed', ['--class' => StatesOfUsa::class]);
        $this->artisan('db:seed', ['--class' => CountiesOfRomania::class]);
    }
}
