<?php

declare(strict_types=1);

/**
 * Contains the ZoneTest class.
 *
 * @copyright   Copyright (c) 2023 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2023-02-26
 *
 */

namespace Konekt\Address\Tests;

use Konekt\Address\Contracts\Zone as ZoneContract;
use Konekt\Address\Models\Country;
use Konekt\Address\Models\Province;
use Konekt\Address\Models\ProvinceType;
use Konekt\Address\Models\Zone;
use Konekt\Address\Models\ZoneProxy;
use Konekt\Address\Models\ZoneScope;

class ZoneTest extends TestCase
{
    /** @test */
    public function it_can_be_created_with_minimal_data()
    {
        $zone = Zone::create(['name' => 'Capital + Agglomeration']);

        $this->assertInstanceOf(Zone::class, $zone);
        $this->assertInstanceOf(ZoneContract::class, $zone);
    }

    /** @test */
    public function it_has_a_proxy()
    {
        $zone = ZoneProxy::create(['name' => 'Central Region']);

        $this->assertInstanceOf(Zone::class, $zone);
    }

    /** @test */
    public function it_has_a_default_scope_which_is_an_enum()
    {
        $zone = Zone::create(['name' => 'West Coast']);

        $this->assertInstanceOf(ZoneScope::class, $zone->scope);
        $this->assertEquals(ZoneScope::SHIPPING(), $zone->scope);
    }

    /** @test */
    public function countries_can_be_added_to_it_as_members()
    {
        $zone = Zone::create(['name' => 'British Commonwealth']);
        $uk = Country::create(['id' => 'UK', 'name' => 'United Kingdom', 'phonecode' => '44', 'is_eu_member' => false]);

        $zone->addCountry($uk);

        $this->assertCount(1, $zone->members);
        $firstMember = $zone->members->first()->member;
        $this->assertInstanceOf(Country::class, $firstMember);
        $this->assertEquals($uk->id, $firstMember->id);
    }

    /** @test */
    public function members_can_tell_if_they_are_a_country()
    {
        $zone = Zone::create(['name' => 'British Commonwealth']);
        $canada = Country::create(['id' => 'CA', 'name' => 'Canada', 'phonecode' => '1', 'is_eu_member' => false]);

        $zone->addCountry($canada);

        $this->assertTrue($zone->members[0]->isCountry());
        $this->assertInstanceOf(Country::class, $zone->members[0]->getCountry());
        $this->assertEquals($canada->id, $zone->members[0]->getCountry()->id);
        // it is not a province
        $this->assertFalse($zone->members[0]->isProvince());
        $this->assertNull($zone->members[0]->getProvince());
    }

    /** @test */
    public function provinces_can_be_added_to_it_as_members()
    {
        $zone = Zone::create(['name' => 'Transylvania']);

        Country::create(['id' => 'RO', 'name' => 'Romania', 'phonecode' => '40', 'is_eu_member' => true]);
        $brasov = Province::create(['country_id' => 'RO', 'type' => ProvinceType::COUNTY, 'code' => 'BV', 'name' => 'Brasov']);

        $zone->addProvince($brasov);

        $this->assertCount(1, $zone->members);
        $firstMember = $zone->members->first()->member;
        $this->assertInstanceOf(Province::class, $firstMember);
        $this->assertEquals($brasov->code, $firstMember->code);
    }

    /** @test */
    public function members_can_tell_if_they_are_a_province()
    {
        $zone = Zone::create(['name' => 'Moravia']);
        Country::create(['id' => 'CZ', 'name' => 'Czechia', 'phonecode' => '420', 'is_eu_member' => true]);
        $southMoravia = Province::create(['country_id' => 'CZ', 'type' => ProvinceType::REGION, 'code' => 'CZ-64', 'name' => 'South Moravia']);

        $zone->addProvince($southMoravia);

        $this->assertTrue($zone->members[0]->isProvince());
        $this->assertInstanceOf(Province::class, $zone->members[0]->getProvince());
        $this->assertEquals($southMoravia->code, $zone->members[0]->getProvince()->code);
        // It is not a country
        $this->assertFalse($zone->members[0]->isCountry());
        $this->assertNull($zone->members[0]->getCountry());
    }
}
