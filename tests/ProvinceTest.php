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

use Illuminate\Database\QueryException;
use Konekt\Address\Contracts\Country as CountryContract;
use Konekt\Address\Contracts\Province as ProvinceContract;
use Konekt\Address\Models\Country;
use Konekt\Address\Models\CountryProxy;
use Konekt\Address\Models\Province;
use Konekt\Address\Models\ProvinceProxy;
use Konekt\Address\Models\ProvinceType;
use Konekt\Address\Seeds\CountiesOfHungary;
use Konekt\Address\Seeds\Countries;
use Konekt\Address\Seeds\CountiesOfRomania;

class ProvinceTest extends TestCase
{
    /** @test */
    public function province_type_is_the_proper_enum_type()
    {
        $cluj = Province::findByCountryAndCode('RO', 'CJ');
        $this->assertInstanceOf(ProvinceType::class, $cluj->type);

        $this->assertTrue(
            $cluj->type->equals(ProvinceType::COUNTY()),
            sprintf('Cluj should be a %s but is a "%s"', ProvinceType::COUNTY, $cluj->type)
        );
    }

    /** @test */
    public function is_aware_of_its_country()
    {
        $cluj    = Province::findByCountryAndCode('RO', 'CJ');
        $romania = Country::find('RO');

        $this->assertInstanceOf(CountryContract::class, $cluj->country);
        $this->assertEquals($romania->id, $cluj->country->id);
    }

    /** @test */
    public function can_be_created_with_create_method()
    {
        $ciongrad = Province::create([
            'country_id' => 'RO',
            'type'       => ProvinceType::COUNTY,
            'code'       => 'CI',
            'name'       => 'Ciongrad'
        ]);

        $this->assertNotEmpty($ciongrad->id);

        $ciongrad->fresh();

        $this->assertEquals('CI', $ciongrad->code);
        $this->assertTrue($ciongrad->type->equals(ProvinceType::COUNTY()));
    }

    /** @test */
    public function province_type_can_be_changed_via_plain_string()
    {
        $bichis = ProvinceProxy::create([
            'country_id' => 'RO',
            'type'       => ProvinceType::COUNTY,
            'code'       => 'BI',
            'name'       => 'Bichis'
        ]);

        $this->assertNotEmpty($bichis->id);

        $bichis->type = ProvinceType::MILITARY;
        $bichis->save();

        $this->assertTrue($bichis->type->equals(ProvinceType::MILITARY()));
    }

    /** @test */
    public function province_type_can_be_set_with_enum()
    {
        $haiduc = ProvinceProxy::create([
            'country_id' => 'RO',
            'type'       => ProvinceType::COUNTY(),
            'code'       => 'HA',
            'name'       => 'Haiduc'
        ]);

        $this->assertNotEmpty($haiduc->id);

        $haiduc->type = ProvinceType::MILITARY();
        $haiduc->save();

        $this->assertTrue($haiduc->type->equals(ProvinceType::MILITARY()));
    }

    /** @test */
    public function province_can_be_retrieved_by_country_and_code()
    {
        $brasov = ProvinceProxy::findByCountryAndCode('RO', 'BV');

        $this->assertInstanceOf(ProvinceContract::class, $brasov);
        $this->assertEquals('RO', $brasov->country_id);
        $this->assertEquals('BV', $brasov->code);
    }

    /** @test */
    public function find_by_country_and_code_accepts_country_object_as_first_parameter()
    {
        $cluj = ProvinceProxy::findByCountryAndCode(Country::find('RO'), 'CJ');

        $this->assertInstanceOf(ProvinceContract::class, $cluj);
        $this->assertEquals('RO', $cluj->country_id);
        $this->assertEquals('CJ', $cluj->code);
    }

    /** @test */
    public function find_by_country_and_code_returns_null_on_nonexistent()
    {
        $inexistent = ProvinceProxy::findByCountryAndCode('RO', 'VW');

        $this->assertNull($inexistent);
    }

    /** @test */
    public function provinces_can_be_returned_by_country()
    {
        $this->assertCount(20, Province::byCountry('HU')->get());

        $hungary = CountryProxy::find('HU');
        $this->assertCount(20, ProvinceProxy::byCountry($hungary)->get());
    }

    /** @test */
    public function country_and_province_code_combination_is_unique()
    {
        Province::create(['country_id' => 'ID', 'name' => 'Whaat?', 'code' => 'WWW']);
        $this->expectException(QueryException::class);
        Province::create(['country_id' => 'ID', 'name' => 'Puaaff', 'code' => 'WWW']);
    }

    /**
     * @inheritdoc
     */
    protected function setUpDatabase($application)
    {
        parent::setUpDatabase($application);

        $this->artisan('db:seed', ['--class' => Countries::class]);
        $this->artisan('db:seed', ['--class' => CountiesOfHungary::class]);
        $this->artisan('db:seed', ['--class' => CountiesOfRomania::class]);
    }
}
