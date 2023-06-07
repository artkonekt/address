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
use Konekt\Address\Models\Address;
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

    /** @test */
    public function it_can_tell_whether_a_country_is_part_of_it()
    {
        Country::create(['id' => 'PL', 'name' => 'Poland', 'phonecode' => '48', 'is_eu_member' => true]);
        Country::create(['id' => 'HU', 'name' => 'Hungary', 'phonecode' => '36', 'is_eu_member' => true]);
        Country::create(['id' => 'SK', 'name' => 'Slovakia', 'phonecode' => '421', 'is_eu_member' => true]);

        Country::create(['id' => 'GR', 'name' => 'Greece', 'phonecode' => '30', 'is_eu_member' => true]);
        Country::create(['id' => 'IT', 'name' => 'Italy', 'phonecode' => '39', 'is_eu_member' => true]);

        $cee = Zone::create(['name' => 'Central Europe']);
        $cee->addCountries('PL', 'SK', 'HU');
        $se = Zone::create(['name' => 'Southern Europe']);
        $se->addCountries('GR', 'IT');

        $this->assertTrue($cee->isCountryPartOfIt('PL'));
        $this->assertTrue($cee->isCountryPartOfIt('HU'));
        $this->assertTrue($cee->isCountryPartOfIt('SK'));
        $this->assertFalse($cee->isCountryPartOfIt('GR'));
        $this->assertFalse($cee->isCountryPartOfIt('IT'));

        $this->assertTrue($se->isCountryPartOfIt('GR'));
        $this->assertTrue($se->isCountryPartOfIt('IT'));
        $this->assertFalse($se->isCountryPartOfIt('PL'));
        $this->assertFalse($se->isCountryPartOfIt('HU'));
        $this->assertFalse($se->isCountryPartOfIt('SK'));
    }

    /** @test */
    public function it_can_tell_whether_a_province_is_part_of_it()
    {
        Country::create(['id' => 'AT', 'name' => 'Austria', 'phonecode' => '43', 'is_eu_member' => true]);
        $burgenland = Province::create(['country_id' => 'AT', 'type' => ProvinceType::STATE, 'code' => 'AT-1', 'name' => 'Burgenland']);
        $niederosterreich = Province::create(['country_id' => 'AT', 'type' => ProvinceType::STATE, 'code' => 'AT-3', 'name' => 'Niederösterreich']);
        $tirol = Province::create(['country_id' => 'AT', 'type' => ProvinceType::STATE, 'code' => 'AT-7', 'name' => 'Tirol']);

        $zone = Zone::create(['name' => 'Bordering with Hungary']);
        $zone->addProvinces($burgenland, $niederosterreich);

        $this->assertTrue($zone->isProvincePartOfIt($burgenland));
        $this->assertTrue($zone->isProvincePartOfIt($niederosterreich));
        $this->assertFalse($zone->isProvincePartOfIt($tirol));
    }

    /** @test */
    public function it_can_tell_whether_an_address_is_part_of_it()
    {
        $ireland = Country::firstOrCreate(['id' => 'IE'], ['name' => 'Ireland', 'is_eu_member' => true, 'phonecode' => '353']);
        $uk = Country::firstOrCreate(['id' => 'GB'], ['name' => 'Unitked Kingdom', 'is_eu_member' => false, 'phonecode' => '44']);

        $leinster = Province::create(['country_id' => 'IE', 'type' => ProvinceType::PROVINCE, 'code' => 'L', 'name' => 'Leinster']);

        $addressInDublin = Address::create(['country_id' => 'IE', 'city' => 'Dublin', 'province_id' => $leinster->id, 'name' => 'Seán O\'Casey', 'address' => '85 Upper Dorset Street']);
        $addressInBelfast = Address::create(['country_id' => 'GB', 'city' => 'Belfast', 'name' => 'Ulster Museum', 'address' => 'Botanic Gardens', 'postalcode' => 'BT9 5AB']);

        $leinsterAndUK = Zone::create(['name' => 'This is just a test']);
        $leinsterAndUK->addCountry($uk);
        $leinsterAndUK->addProvince($leinster);

        $republicOfIreland = Zone::create(['name' => 'Ireland']);
        $republicOfIreland->addCountry($ireland);

        $this->assertTrue($leinsterAndUK->isAddressPartOfIt($addressInDublin));
        $this->assertTrue($leinsterAndUK->isAddressPartOfIt($addressInBelfast));

        $this->assertTrue($republicOfIreland->isAddressPartOfIt($addressInDublin));
        $this->assertFalse($republicOfIreland->isAddressPartOfIt($addressInBelfast));
    }

    /** @test */
    public function it_can_return_the_ids_of_the_countries()
    {
        Country::firstOrCreate(['id' => 'NG'], ['name' => 'Nigeria', 'is_eu_member' => false, 'phonecode' => '234']);
        Country::firstOrCreate(['id' => 'MA'], ['name' => 'Marocco', 'is_eu_member' => false, 'phonecode' => '212']);

        $zone = Zone::create(['name' => 'African Zone']);
        $zone->addCountries('NG', 'MA');

        $this->assertEquals(['NG', 'MA'], $zone->getMemberCountryIds());
    }

    /** @test */
    public function it_can_return_the_ids_of_the_provinces()
    {
        Country::firstOrCreate(['id' => 'HU', 'name' => 'Hungary', 'phonecode' => '36', 'is_eu_member' => true]);
        $baz = Province::create(['country_id' => 'HU', 'type' => ProvinceType::COUNTY, 'code' => 'BZ', 'name' => 'BAZ Megye']);
        $fejer = Province::create(['country_id' => 'HU', 'type' => ProvinceType::COUNTY, 'code' => 'FE', 'name' => 'Fejér Megye']);
        $szabolcs = Province::create(['country_id' => 'HU', 'type' => ProvinceType::COUNTY, 'code' => 'SZ', 'name' => 'Szabolcs-Szatmár-Bereg Megye']);

        $zone = Zone::create(['name' => 'Eastern Hungary']);
        $zone->addProvinces($baz, $fejer, $szabolcs);

        $this->assertEquals([$baz->id, $fejer->id, $szabolcs->id], $zone->getMemberProvinceIds());
    }
}
