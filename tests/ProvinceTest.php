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


use Konekt\Address\Contracts\Country as CountryContract;
use Konekt\Address\Models\Country;
use Konekt\Address\Models\CountryProxy;
use Konekt\Address\Models\Province;
use Konekt\Address\Models\ProvinceProxy;
use Konekt\Address\Models\ProvinceType;
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

        $this->romania = CountryProxy::find('RO');
        $this->cluj    = ProvinceProxy::where([
            'country_id' => $this->romania->id,
            'code'       => 'CJ'
        ])->take(1)->get()->first();
    }

    /**
     * @test
     */
    public function province_type_is_the_proper_enum_type()
    {
        $this->assertInstanceOf(ProvinceType::class, $this->cluj->type);

        $this->assertTrue(
            $this->cluj->type->equals(ProvinceType::COUNTY()),
            sprintf('Cluj should be a %s but is a "%s"', ProvinceType::COUNTY, $this->cluj->type)
        );
    }

    /**
     * @test
     */
    public function is_aware_of_its_country()
    {
        $this->assertInstanceOf(CountryContract::class, $this->cluj->country);
        $this->assertEquals($this->romania->id, $this->cluj->country->id);
    }

    /**
     * @test
     */
    public function can_be_created_with_create_method()
    {
        $ciongrad = Province::create([
            'country_id' => $this->romania->id,
            'type'       => ProvinceType::COUNTY,
            'code'       => 'CI',
            'name'       => 'Ciongrad'
        ]);

        $this->assertNotEmpty($ciongrad->id);

        $ciongrad->fresh();

        $this->assertEquals('CI', $ciongrad->code);
        $this->assertTrue($ciongrad->type->equals(ProvinceType::COUNTY()));
    }

    /**
     * @test
     */
    public function province_type_can_be_changed_via_plain_string()
    {
        $bichis = Province::create([
            'country_id' => $this->romania->id,
            'type'       => ProvinceType::COUNTY,
            'code'       => 'BI',
            'name'       => 'Bichis'
        ]);

        $this->assertNotEmpty($bichis->id);

        $bichis->type = ProvinceType::MILITARY;
        $bichis->save();

        $this->assertTrue($bichis->type->equals(ProvinceType::MILITARY()));
    }

}