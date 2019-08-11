<?php
/**
 * Contains the IndonesiaTest class.
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
use Konekt\Address\Seeds\ProvincesOfIndonesia;
use Konekt\Address\Tests\TestCase;

class IndonesiaTest extends TestCase
{
    /** @var Country */
    private $indonesia;

    protected function setUp(): void
    {
        parent::setUp();

        $this->indonesia = Country::find('ID');
    }

    /** @test */
    public function the_country_is_present()
    {
        $this->assertEquals('Indonesia', $this->indonesia->name);
    }

    /** @test */
    public function has_32_provinces()
    {
        $this->assertCount(32, Province::byCountry($this->indonesia)->byType(ProvinceType::PROVINCE())->get());
    }

    /** @test */
    public function has_2_special_regions()
    {
        $regions = Province::byCountry($this->indonesia)->byType(ProvinceType::REGION)->get();

        $names = $regions->map(function ($region) {
            return $region->name;
        });

        $this->assertCount(2, $regions);
        $this->assertContains('Jakarta', $names);
        $this->assertContains('Yogyakarta', $names);
    }

    /** @test */
    public function has_7_geographical_units()
    {
        $units = Province::byCountry($this->indonesia)->byType(ProvinceType::UNIT())->get();

        $names = $units->map(function ($unit) {
            return $unit->name;
        });

        $this->assertCount(7, $units);
        $this->assertContains('Java', $names);
        $this->assertContains('Kalimantan', $names);
        $this->assertContains('Maluku Islands', $names);
        $this->assertContains('Lesser Sunda Islands', $names);
        $this->assertContains('Papua', $names);
        $this->assertContains('Sulawesi', $names);
        $this->assertContains('Sumatra', $names);
    }

    /** @test */
    public function java_has_4_provinces()
    {
        $java      = Province::findByCountryAndCode($this->indonesia, 'JW');
        $provinces = $java->children()->byType(ProvinceType::PROVINCE)->get();

        $names = $provinces->map(function ($province) {
            return $province->name;
        });

        $this->assertCount(4, $provinces);
        $this->assertContains('Banten', $names);
        $this->assertContains('West Java', $names);
        $this->assertContains('Central Java', $names);
        $this->assertContains('East Java', $names);
    }

    /** @test */
    public function java_has_2_special_regions()
    {
        $java    = Province::findByCountryAndCode($this->indonesia, 'JW');
        $regions = $java->children()->byType(ProvinceType::REGION())->get();

        $names = $regions->map(function ($region) {
            return $region->name;
        });

        $this->assertCount(2, $regions);
        $this->assertContains('Jakarta', $names);
        $this->assertContains('Yogyakarta', $names);
    }

    /** @test */
    public function kalimantan_has_5_provinces()
    {
        $kalimantan = Province::findByCountryAndCode($this->indonesia, 'KA');

        $names = $kalimantan->children->map(function ($province) {
            return $province->name;
        });

        $this->assertCount(5, $kalimantan->children);
        $this->assertContains('West Kalimantan', $names);
        $this->assertContains('Central Kalimantan', $names);
        $this->assertContains('East Kalimantan', $names);
        $this->assertContains('North Kalimantan', $names);
        $this->assertContains('South Kalimantan', $names);
    }

    /** @test */
    public function maluku_has_2_provinces()
    {
        $maluku = Province::findByCountryAndCode($this->indonesia, 'ML');

        $names = $maluku->children->map(function ($province) {
            return $province->name;
        });

        $this->assertCount(2, $maluku->children);
        $this->assertContains('Maluku', $names);
        $this->assertContains('North Maluku', $names);
    }

    /** @test */
    public function lesser_sunda_islands_has_3_provinces()
    {
        $lesserSundaIslands = Province::findByCountryAndCode($this->indonesia, 'NU');

        $names = $lesserSundaIslands->children->map(function ($province) {
            return $province->name;
        });

        $this->assertCount(3, $lesserSundaIslands->children);
        $this->assertContains('Bali', $names);
        $this->assertContains('West Nusa Tenggara', $names);
        $this->assertContains('East Nusa Tenggara', $names);
    }

    /** @test */
    public function papua_has_2_provinces()
    {
        $papua = Province::findByCountryAndCode($this->indonesia, 'PP');

        $names = $papua->children->map(function ($province) {
            return $province->name;
        });

        $this->assertCount(2, $papua->children);
        $this->assertContains('Papua', $names);
        $this->assertContains('West Papua', $names);
    }

    /** @test */
    public function sulawesi_has_6_provinces()
    {
        $sulawesi = Province::findByCountryAndCode($this->indonesia, 'SL');

        $names = $sulawesi->children->map(function ($province) {
            return $province->name;
        });

        $this->assertCount(6, $sulawesi->children);
        $this->assertContains('South Sulawesi', $names);
        $this->assertContains('North Sulawesi', $names);
        $this->assertContains('Central Sulawesi', $names);
        $this->assertContains('Southeast Sulawesi', $names);
        $this->assertContains('West Sulawesi', $names);
        $this->assertContains('Gorontalo', $names);
    }

    /** @test */
    public function sumatra_has_10_provinces()
    {
        $sumatra = Province::findByCountryAndCode($this->indonesia, 'SM');

        $names = $sumatra->children->map(function ($province) {
            return $province->name;
        });

        $this->assertCount(10, $sumatra->children);
        $this->assertContains('South Sumatra', $names);
        $this->assertContains('North Sumatra', $names);
        $this->assertContains('West Sumatra', $names);
        $this->assertContains('Aceh', $names);
        $this->assertContains('Riau', $names);
        $this->assertContains('Jambi', $names);
        $this->assertContains('Bengkulu', $names);
        $this->assertContains('Lampung', $names);
        $this->assertContains('Bangka Belitung Islands', $names);
        $this->assertContains('Riau Islands', $names);
    }

    protected function setUpDatabase($application)
    {
        parent::setUpDatabase($application);

        $this->artisan('db:seed', ['--class' => Countries::class]);
        $this->artisan('db:seed', ['--class' => ProvincesOfIndonesia::class]);
    }
}
