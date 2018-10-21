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
use Konekt\Address\Contracts\Province as ProvinceContract;
use Konekt\Address\Models\Country;
use Konekt\Address\Models\CountryProxy;
use Konekt\Address\Models\Province;
use Konekt\Address\Models\ProvinceProxy;
use Konekt\Address\Models\ProvinceType;
use Konekt\Address\Seeds\CountiesOfHungary;
use Konekt\Address\Seeds\Countries;
use Konekt\Address\Seeds\CountiesOfRomania;
use Konekt\Address\Seeds\ProvincesAndRegionsOfBelgium;
use Konekt\Address\Seeds\ProvincesOfNetherlands;
use Konekt\Address\Seeds\StatesOfGermany;
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
        $this->artisan('db:seed', ['--class' => StatesOfGermany::class]);
        $this->artisan('db:seed', ['--class' => StatesOfUsa::class]);
        $this->artisan('db:seed', ['--class' => ProvincesAndRegionsOfBelgium::class]);
        $this->artisan('db:seed', ['--class' => ProvincesOfNetherlands::class]);
        $this->artisan('db:seed', ['--class' => CountiesOfHungary::class]);
        $this->artisan('db:seed', ['--class' => CountiesOfRomania::class]);
    }

    public function setUp()
    {
        parent::setUp();

        $this->romania = CountryProxy::find('RO');
        $this->cluj    = ProvinceProxy::findByCountryAndCode('RO', 'CJ');
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
        $bichis = ProvinceProxy::create([
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

    /**
     * @test
     */
    public function province_type_can_be_set_with_enum()
    {
        $haiduc = ProvinceProxy::create([
            'country_id' => $this->romania->id,
            'type'       => ProvinceType::COUNTY(),
            'code'       => 'HA',
            'name'       => 'Haiduc'
        ]);

        $this->assertNotEmpty($haiduc->id);

        $haiduc->type = ProvinceType::MILITARY();
        $haiduc->save();

        $this->assertTrue($haiduc->type->equals(ProvinceType::MILITARY()));
    }

    /**
     * @test
     */
    public function province_can_be_retrieved_by_country_and_code()
    {
        $brasov = ProvinceProxy::findByCountryAndCode('RO', 'BV');

        $this->assertInstanceOf(ProvinceContract::class, $brasov);
        $this->assertEquals('RO', $brasov->country_id);
        $this->assertEquals('BV', $brasov->code);
    }

    /**
     * @test
     */
    public function find_by_country_and_code_accepts_country_object_as_first_parameter()
    {
        $cluj = ProvinceProxy::findByCountryAndCode($this->romania, 'CJ');

        $this->assertInstanceOf(ProvinceContract::class, $cluj);
        $this->assertEquals('RO', $cluj->country_id);
        $this->assertEquals('CJ', $cluj->code);
    }

    /**
     * @test
     */
    public function find_by_country_and_code_returns_null_on_nonexistent()
    {
        $inexistent = ProvinceProxy::findByCountryAndCode('RO', 'VW');

        $this->assertNull($inexistent);
    }

    /**
     * @test
     */
    public function returns_us_states_by_country_and_code()
    {
        $california = ProvinceProxy::findByCountryAndCode('US', 'CA');

        $this->assertInstanceOf(ProvinceContract::class, $california);
        $this->assertEquals('US', $california->country_id);
        $this->assertEquals('CA', $california->code);
        $this->assertTrue($california->type->equals(ProvinceType::STATE()));
    }

    /** @test */
    public function provinces_can_be_returned_by_country()
    {
        $this->assertCount(20, Province::byCountry('HU')->get());

        $hungary = CountryProxy::find('HU');
        $this->assertCount(20, ProvinceProxy::byCountry($hungary)->get());
    }

    /** @test */
    public function hungary_has_all_of_its_counties()
    {
        $hungary = CountryProxy::find('HU');
        $this->assertEquals('Hungary', $hungary->name);

        $countiesOfHungary = Province::byCountry($hungary)->get();
        $this->assertCount(20, $countiesOfHungary);

        $names = $countiesOfHungary->map(function ($county) {
            return $county->name;
        });

        $this->assertContains('Baranya', $names);
        $this->assertContains('Bács-Kiskun', $names);
        $this->assertContains('Békés', $names);
        $this->assertContains('Borsod-Abaúj-Zemplén', $names);
        $this->assertContains('Budapest', $names);
        $this->assertContains('Csongrád', $names);
        $this->assertContains('Fejér', $names);
        $this->assertContains('Győr-Moson-Sopron', $names);
        $this->assertContains('Hajdú-Bihar', $names);
        $this->assertContains('Heves', $names);
        $this->assertContains('Jász-Nagykun-Szolnok', $names);
        $this->assertContains('Komárom-Esztergom', $names);
        $this->assertContains('Nógrád', $names);
        $this->assertContains('Pest', $names);
        $this->assertContains('Somogy', $names);
        $this->assertContains('Szabolcs-Szatmár-Bereg', $names);
        $this->assertContains('Tolna', $names);
        $this->assertContains('Vas', $names);
        $this->assertContains('Veszprém', $names);
        $this->assertContains('Zala', $names);
    }

    /** @test */
    public function germany_has_all_of_its_states()
    {
        $germany = CountryProxy::find('DE');
        $this->assertEquals('Germany', $germany->name);

        $statesOfGermany = Province::byCountry($germany)->get();
        $this->assertCount(16, $statesOfGermany);

        $names = $statesOfGermany->map(function ($state) {
            return $state->name;
        });

        $this->assertContains('Baden-Württemberg', $names);
        $this->assertContains('Bayern', $names);
        $this->assertContains('Berlin', $names);
        $this->assertContains('Brandenburg', $names);
        $this->assertContains('Bremen', $names);
        $this->assertContains('Hamburg', $names);
        $this->assertContains('Hessen', $names);
        $this->assertContains('Mecklenburg-Vorpommern', $names);
        $this->assertContains('Niedersachsen', $names);
        $this->assertContains('Nordrhein-Westfalen', $names);
        $this->assertContains('Rheinland-Pfalz', $names);
        $this->assertContains('Saarland', $names);
        $this->assertContains('Sachsen', $names);
        $this->assertContains('Sachsen-Anhalt', $names);
        $this->assertContains('Schleswig-Holstein', $names);
        $this->assertContains('Thüringen', $names);
    }

    /** @test */
    public function the_netherlands_has_all_of_its_provinces()
    {
        $netherlands = CountryProxy::find('NL');
        $this->assertEquals('Netherlands', $netherlands->name);

        $provincesOfNetherlands = Province::byCountry($netherlands)->get();
        $this->assertCount(12, $provincesOfNetherlands);

        $names = $provincesOfNetherlands->map(function ($state) {
            return $state->name;
        });

        $this->assertContains('Drenthe', $names);
        $this->assertContains('Flevoland', $names);
        $this->assertContains('Friesland', $names);
        $this->assertContains('Gelderland', $names);
        $this->assertContains('Groningen', $names);
        $this->assertContains('Limburg', $names);
        $this->assertContains('Noord-Brabant', $names);
        $this->assertContains('Noord-Holland', $names);
        $this->assertContains('Overijssel', $names);
        $this->assertContains('Utrecht', $names);
        $this->assertContains('Zeeland', $names);
        $this->assertContains('Zuid-Holland', $names);
    }

    /** @test */
    public function belgium_has_all_of_its_provinces_and_regions()
    {
        $belgium = CountryProxy::find('BE');
        $this->assertEquals('Belgium', $belgium->name);

        $allProvincesOfBelgium = Province::byCountry($belgium)->get();
        $this->assertCount(13, $allProvincesOfBelgium);

        $provinces = $allProvincesOfBelgium->filter(function ($province) {
            return $province->type->isProvince();
        });

        $this->assertCount(10, $provinces);

        $regions = $allProvincesOfBelgium->filter(function ($region) {
            return $region->type->isRegion();
        });

        $this->assertCount(3, $regions);

        $provinceNames = $allProvincesOfBelgium->map(function ($province) {
            return $province->name;
        });

        $this->assertContains('Antwerp', $provinceNames);
        $this->assertContains('East Flanders', $provinceNames);
        $this->assertContains('Flemish Brabant', $provinceNames);
        $this->assertContains('Limburg', $provinceNames);
        $this->assertContains('West Flanders', $provinceNames);
        $this->assertContains('Hainaut', $provinceNames);
        $this->assertContains('Liège', $provinceNames);
        $this->assertContains('Luxembourg', $provinceNames);
        $this->assertContains('Namur', $provinceNames);
        $this->assertContains('Walloon Brabant', $provinceNames);

        $regionNames = $regions->map(function ($region) {
            return $region->name;
        });

        $this->assertContains('Flanders', $regionNames);
        $this->assertContains('Brussels', $regionNames);
        $this->assertContains('Wallonia', $regionNames);
    }
}
