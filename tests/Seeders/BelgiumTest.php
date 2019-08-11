<?php
/**
 * Contains the BelgiumTest class.
 *
 * @copyright   Copyright (c) 2019 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2019-08-11
 *
 */

namespace Konekt\Address\Tests\Seeders;

use Konekt\Address\Models\Country;
use Konekt\Address\Models\Province;
use Konekt\Address\Models\ProvinceType;
use Konekt\Address\Seeds\Countries;
use Konekt\Address\Seeds\ProvincesAndRegionsOfBelgium;
use Konekt\Address\Tests\TestCase;

class BelgiumTest extends TestCase
{
    /** @var Country */
    private $belgium;

    protected function setUp(): void
    {
        parent::setUp();

        $this->belgium = Country::find('BE');
    }

    /** @test */
    public function the_country_is_present()
    {
        $this->assertEquals('Belgium', $this->belgium->name);
    }

    /** @test */
    public function has_all_of_its_provinces_and_regions()
    {
        $this->assertCount(13, Province::byCountry($this->belgium)->get());
    }

    /** @test */
    public function has_3_regions()
    {
        $regions = Province::byCountry($this->belgium)->byType(ProvinceType::REGION)->get();

        $regionNames = $regions->map(function ($region) {
            return $region->name;
        });

        $this->assertCount(3, $regions);
        $this->assertContains('Flanders', $regionNames);
        $this->assertContains('Brussels', $regionNames);
        $this->assertContains('Wallonia', $regionNames);
    }

    /** @test */
    public function has_10_provinces()
    {
        $provinces = Province::byCountry($this->belgium)->byType(ProvinceType::PROVINCE)->get();

        $provinceNames = $provinces->map(function ($province) {
            return $province->name;
        });

        $this->assertCount(10, $provinces);
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
    }

    /** @test */
    public function brussels_region_has_no_provinces()
    {
        $brussels = Province::findByCountryAndCode($this->belgium, 'BRU');

        $this->assertCount(0, $brussels->children);
    }

    /** @test */
    public function flanders_region_has_its_5_provinces()
    {
        $flanders = Province::findByCountryAndCode($this->belgium, 'VLG');

        $names = $flanders->children->map(function ($province) {
            return $province->name;
        });

        $this->assertCount(5, $flanders->children);
        $this->assertContains('Antwerp', $names);
        $this->assertContains('East Flanders', $names);
        $this->assertContains('Flemish Brabant', $names);
        $this->assertContains('Limburg', $names);
        $this->assertContains('West Flanders', $names);
    }

    /** @test */
    public function wallonia_region_has_its_5_provinces()
    {
        $wallonia = Province::findByCountryAndCode($this->belgium, 'WAL');

        $names = $wallonia->children->map(function ($province) {
            return $province->name;
        });

        $this->assertCount(5, $wallonia->children);
        $this->assertContains('Hainaut', $names);
        $this->assertContains('Liège', $names);
        $this->assertContains('Luxembourg', $names);
        $this->assertContains('Namur', $names);
        $this->assertContains('Walloon Brabant', $names);
    }

    protected function setUpDatabase($application)
    {
        parent::setUpDatabase($application);

        $this->artisan('db:seed', ['--class' => Countries::class]);
        $this->artisan('db:seed', ['--class' => ProvincesAndRegionsOfBelgium::class]);
    }
}
