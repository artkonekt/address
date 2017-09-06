<?php
/**
 * Contains the ProvinceTest class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-09-06
 *
 */


namespace Konekt\Address\Tests;


use Konekt\Address\Contracts\ProvinceType;
use Konekt\Address\Models\Country;
use Konekt\Address\Models\CountryProxy;
use Konekt\Address\Models\ProvinceProxy;
use Konekt\Address\Tests\ProvinceType\ExtProvinceType;
use Konekt\Address\Seeds\Countries;
use Konekt\Address\Seeds\CountiesOfRomania;
use Konekt\Address\Seeds\StatesOfUsa;

class ProvinceTest extends TestCase
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

//        $this->usa     = CountryProxy::find('US');
//        $this->uk      = CountryProxy::find('GB');
        $this->romania = CountryProxy::find('RO');
        $this->cluj    = ProvinceProxy::where([
            'country_id' => $this->romania->id,
            'code'       => 'CJ'
        ])->take(1)->get()->first();
//        $this->germany = CountryProxy::find('DE');
    }

    /**
     * @test
     */
    public function province_type_can_be_extended_and_is_returned_properly()
    {
        app('concord')->registerEnum(ProvinceType::class, ExtProvinceType::class);

        $this->assertInstanceOf(ExtProvinceType::class, $this->cluj->type);
    }

}