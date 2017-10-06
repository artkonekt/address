<?php
/**
 * Contains the ProvinceExtTest class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-09-13
 *
 */


namespace Konekt\Address\Tests;

use Konekt\Address\Contracts\ProvinceType as ProvinceTypeContract;
use Konekt\Address\Models\Country;
use Konekt\Address\Models\CountryProxy;
use Konekt\Address\Models\ProvinceProxy;
use Konekt\Address\Models\ProvinceTypeProxy;
use Konekt\Address\Tests\ProvinceType\ExtProvinceType;
use Konekt\Address\Seeds\Countries;
use Konekt\Address\Seeds\CountiesOfRomania;
use Konekt\Address\Seeds\StatesOfUsa;

class ProvinceExtTypeTest extends TestCase
{
    /** @var  Country */
    protected $romania;

    /**
     * @inheritdoc
     */
    protected function setUpDatabase($application)
    {
        parent::setUpDatabase($application);

        $this->artisan('db:seed', ['--class' => Countries::class]);
        $this->artisan('db:seed', ['--class' => StatesOfUsa::class]);
        $this->artisan('db:seed', ['--class' => CountiesOfRomania::class]);
    }

    public function setUp()
    {
        parent::setUp();

        app('concord')->registerEnum(ProvinceTypeContract::class, ExtProvinceType::class);

        $this->romania = CountryProxy::find('RO');
        $this->cluj    = ProvinceProxy::findByCountryAndCode('RO', 'CJ');
    }
    
    /**
     * @test
     */
    public function province_type_can_be_extended_and_is_returned_properly()
    {
        $this->assertEquals(ExtProvinceType::class, ProvinceTypeProxy::enumClass());
        $this->assertInstanceOf(ExtProvinceType::class, $this->cluj->type);
    }
}
