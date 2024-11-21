<?php

declare(strict_types=1);

namespace Konekt\Address\Tests\Seeders;

use Illuminate\Support\Arr;
use Konekt\Address\Seeds\CountiesOfHungary;
use Konekt\Address\Seeds\CountiesOfRomania;
use Konekt\Address\Seeds\ProvincesAndRegionsOfBelgium;
use Konekt\Address\Seeds\ProvinceSeeders;
use Konekt\Address\Seeds\ProvincesOfIndonesia;
use Konekt\Address\Seeds\ProvincesOfNetherlands;
use Konekt\Address\Seeds\StatesAndTerritoriesOfIndia;
use Konekt\Address\Seeds\StatesOfGermany;
use Konekt\Address\Seeds\StatesOfUsa;
use Konekt\Address\Tests\TestCase;

class ProvinceSeederRegistryTest extends TestCase
{
    /** @test */
    public function it_has_all_the_built_in_seeders()
    {
        $this->assertCount(10, ProvinceSeeders::choices());
    }

    /** @test */
    public function it_has_two_seeders_for_canada()
    {
        $this->assertCount(2, ProvinceSeeders::availableSeedersOfCountry('CA'));
    }

    /** @test */
    public function it_has_one_seeder_for_usa()
    {
        $seeders = ProvinceSeeders::availableSeedersOfCountry('US');
        $this->assertCount(1, $seeders);
        $this->assertEquals(StatesOfUsa::class, Arr::first($seeders));
    }

    /** @test */
    public function it_has_one_seeder_for_indonesia()
    {
        $seeders = ProvinceSeeders::availableSeedersOfCountry('ID');
        $this->assertCount(1, $seeders);
        $this->assertEquals(ProvincesOfIndonesia::class, Arr::first($seeders));
    }

    /** @test */
    public function it_has_one_seeder_for_belgium()
    {
        $seeders = ProvinceSeeders::availableSeedersOfCountry('BE');
        $this->assertCount(1, $seeders);
        $this->assertEquals(ProvincesAndRegionsOfBelgium::class, Arr::first($seeders));
    }

    /** @test */
    public function it_has_one_seeder_for_netherlands()
    {
        $seeders = ProvinceSeeders::availableSeedersOfCountry('NL');
        $this->assertCount(1, $seeders);
        $this->assertEquals(ProvincesOfNetherlands::class, Arr::first($seeders));
    }

    /** @test */
    public function it_has_one_seeder_for_germany()
    {
        $seeders = ProvinceSeeders::availableSeedersOfCountry('DE');
        $this->assertCount(1, $seeders);
        $this->assertEquals(StatesOfGermany::class, Arr::first($seeders));
    }

    /** @test */
    public function it_has_one_seeder_for_hungary()
    {
        $seeders = ProvinceSeeders::availableSeedersOfCountry('HU');
        $this->assertCount(1, $seeders);
        $this->assertEquals(CountiesOfHungary::class, Arr::first($seeders));
    }

    /** @test */
    public function it_has_one_seeder_for_romania()
    {
        $seeders = ProvinceSeeders::availableSeedersOfCountry('RO');
        $this->assertCount(1, $seeders);
        $this->assertEquals(CountiesOfRomania::class, Arr::first($seeders));
    }

    /** @test */
    public function it_has_one_seeder_for_india()
    {
        $seeders = ProvinceSeeders::availableSeedersOfCountry('IN');
        $this->assertCount(1, $seeders);
        $this->assertEquals(StatesAndTerritoriesOfIndia::class, Arr::first($seeders));
    }
}
