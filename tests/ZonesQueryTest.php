<?php

declare(strict_types=1);

/**
 * Contains the ZonesQueryTest class.
 *
 * @copyright   Copyright (c) 2023 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2023-02-26
 *
 */

namespace Konekt\Address\Tests;

use Illuminate\Support\Collection;
use Konekt\Address\Models\Address;
use Konekt\Address\Models\Country;
use Konekt\Address\Models\Province;
use Konekt\Address\Models\ProvinceType;
use Konekt\Address\Models\Zone;
use Konekt\Address\Models\ZoneScope;
use Konekt\Address\Query\Zones;

class ZonesQueryTest extends TestCase
{
    /** @test */
    public function it_can_return_all_the_zones_of_an_address()
    {
        $finland = Country::firstOrCreate(['id' => 'FI'], ['name' => 'Finland', 'is_eu_member' => true, 'phonecode' => '358']);
        $sweden = Country::firstOrCreate(['id' => 'SE'], ['name' => 'Sweden', 'is_eu_member' => true, 'phonecode' => '46']);

        $addressInFinland = Address::create(['country_id' => 'FI', 'city' => 'Uusikaupunki', 'name' => 'Kari Takko', 'address' => 'Sepänkatu 1', 'postalcode' => '23500']);
        $addressInSweden = Address::create(['country_id' => 'SE', 'city' => 'Borås', 'name' => 'Anette Svensson', 'address' => 'Gustav Adolfsgatan 60', 'postalcode' => '504 57']);

        $southWestFinland = Zone::create(['name' => 'South West Finland']);
        $southWestFinland->addCountry($finland);

        $westCoastSweden = Zone::create(['name' => 'West Coast Sweden']);
        $westCoastSweden->addCountry($sweden);

        $scandinavia = Zone::create(['name' => 'Scandinavia', 'scope' => ZoneScope::PRICING]);
        $scandinavia->addCountry($sweden);
        $scandinavia->addCountry($finland);

        $zonesOfTheFinnishAddress = Zones::withAnyScope()->theAddressBelongsTo($addressInFinland);
        $this->assertInstanceOf(Collection::class, $zonesOfTheFinnishAddress);
        $this->assertCount(2, $zonesOfTheFinnishAddress);
        $this->assertContains('South West Finland', $zonesOfTheFinnishAddress->pluck('name'));
        $this->assertContains('Scandinavia', $zonesOfTheFinnishAddress->pluck('name'));

        $zonesOfTheSwedishAddress = Zones::withAnyScope()->theAddressBelongsTo($addressInSweden);
        $this->assertInstanceOf(Collection::class, $zonesOfTheSwedishAddress);
        $this->assertCount(2, $zonesOfTheSwedishAddress);
        $this->assertContains('West Coast Sweden', $zonesOfTheSwedishAddress->pluck('name'));
        $this->assertContains('Scandinavia', $zonesOfTheSwedishAddress->pluck('name'));
    }

    /** @test */
    public function it_can_return_all_the_zones_of_a_country()
    {
        $belgium = Country::create(['id' => 'BE', 'name' => 'Belgium', 'is_eu_member' => true, 'phonecode' => '32']);
        $netherlands = Country::create(['id' => 'NL', 'name' => 'Netherlands', 'is_eu_member' => true, 'phonecode' => '31']);
        $luxembourg = Country::create(['id' => 'LU', 'name' => 'Luxembourg', 'is_eu_member' => true, 'phonecode' => '352']);

        $benl = Zone::create(['name' => 'Belgium & Netherlands', 'scope' => ZoneScope::SHIPPING]);
        $benl->addCountry($belgium);
        $benl->addCountry($netherlands);

        $benelux = Zone::create(['name' => 'Benelux', 'scope' => ZoneScope::PRICING]);
        $benelux->addCountry($belgium);
        $benelux->addCountry($netherlands);
        $benelux->addCountry($luxembourg);

        $zonesOfBelgium = Zones::withAnyScope()->theCountryBelongsTo($belgium);
        $this->assertInstanceOf(Collection::class, $zonesOfBelgium);
        $this->assertCount(2, $zonesOfBelgium);
        $this->assertContains('Belgium & Netherlands', $zonesOfBelgium->pluck('name'));
        $this->assertContains('Benelux', $zonesOfBelgium->pluck('name'));

        $zonesOfNetherlands = Zones::withAnyScope()->theCountryBelongsTo($netherlands);
        $this->assertInstanceOf(Collection::class, $zonesOfNetherlands);
        $this->assertCount(2, $zonesOfNetherlands);
        $this->assertContains('Belgium & Netherlands', $zonesOfNetherlands->pluck('name'));
        $this->assertContains('Benelux', $zonesOfNetherlands->pluck('name'));

        $zonesOfLuxembourg = Zones::withAnyScope()->theCountryBelongsTo('LU');
        $this->assertInstanceOf(Collection::class, $zonesOfLuxembourg);
        $this->assertCount(1, $zonesOfLuxembourg);
        $this->assertContains('Benelux', $zonesOfLuxembourg->pluck('name'));
    }

    /** @test */
    public function it_can_return_all_the_zones_of_a_province()
    {
        Country::firstOrCreate(['id' => 'FI'], ['name' => 'Finland', 'is_eu_member' => true, 'phonecode' => '358']);
        Country::firstOrCreate(['id' => 'SE'], ['name' => 'Sweden', 'is_eu_member' => true, 'phonecode' => '46']);

        $southWestFinland = Province::create(['country_id' => 'FI', 'name' => 'South West Finland', 'code' => '19', 'type' => ProvinceType::REGION]);
        $satakunta = Province::create(['country_id' => 'FI', 'name' => 'Satakunta', 'code' => '17', 'type' => ProvinceType::REGION]);

        $westernFinland = Zone::create(['name' => 'Western Finland', 'scope' => 'billing']);
        $westernFinland->addProvince($southWestFinland);
        $westernFinland->addProvince($satakunta);

        $vastraGotaland = Province::create(['country_id' => 'SE', 'name' => 'Västra Götaland', 'type' => ProvinceType::COUNTY]);
        $westCoastSweden = Zone::create(['name' => 'West Coast Sweden', 'scope' => 'billing']);
        $westCoastSweden->addProvince($vastraGotaland);

        $nordpost = Zone::create(['name' => 'Nordpost', 'scope' => ZoneScope::SHIPPING]);
        $nordpost->addProvince($southWestFinland);
        $nordpost->addProvince($satakunta);
        $nordpost->addProvince($vastraGotaland);

        $zonesOfSouthWestFinland = Zones::withAnyScope()->theProvinceBelongsTo($southWestFinland);
        $this->assertInstanceOf(Collection::class, $zonesOfSouthWestFinland);
        $this->assertCount(2, $zonesOfSouthWestFinland);
        $this->assertContains('Western Finland', $zonesOfSouthWestFinland->pluck('name'));
        $this->assertContains('Nordpost', $zonesOfSouthWestFinland->pluck('name'));

        $zonesOfSatakunta = Zones::withAnyScope()->theProvinceBelongsTo($satakunta);
        $this->assertInstanceOf(Collection::class, $zonesOfSatakunta);
        $this->assertCount(2, $zonesOfSatakunta);
        $this->assertContains('Western Finland', $zonesOfSatakunta->pluck('name'));
        $this->assertContains('Nordpost', $zonesOfSatakunta->pluck('name'));

        $zonesVastraGotaland = Zones::withAnyScope()->theProvinceBelongsTo($vastraGotaland);
        $this->assertInstanceOf(Collection::class, $zonesVastraGotaland);
        $this->assertCount(2, $zonesVastraGotaland);
        $this->assertContains('West Coast Sweden', $zonesVastraGotaland->pluck('name'));
        $this->assertContains('Nordpost', $zonesVastraGotaland->pluck('name'));
    }

    /** @test */
    public function it_can_return_the_zones_by_a_given_scope()
    {
        $finland = Country::firstOrCreate(['id' => 'FI'], ['name' => 'Finland', 'is_eu_member' => true, 'phonecode' => '358']);
        $sweden = Country::firstOrCreate(['id' => 'SE'], ['name' => 'Sweden', 'is_eu_member' => true, 'phonecode' => '46']);
        $denmark = Country::firstOrCreate(['id' => 'DK'], ['name' => 'Denmark', 'is_eu_member' => true, 'phonecode' => '45']);
        $norway = Country::firstOrCreate(['id' => 'NO'], ['name' => 'Norway', 'is_eu_member' => false, 'phonecode' => '47']);

        $euro = Zone::create(['name' => 'Euro Countries', 'scope' => 'pricing']);
        $euro->addCountry($finland);

        $krona = Zone::create(['name' => 'Krona Countries', 'scope' => 'pricing']);
        $krona->addCountry($sweden);
        $krona->addCountry($denmark);
        $krona->addCountry($norway);

        $nordicEuCountries = Zone::create(['name' => 'Nordic EU Countries', 'scope' => 'billing']);
        $nordicEuCountries->addCountry('FI');
        $nordicEuCountries->addCountry('SE');
        $nordicEuCountries->addCountry('DK');

        $postNordTerritory = Zone::create(['name' => 'PostNord Territory', 'scope' => 'shipping']);
        $postNordTerritory->addCountry('SE');
        $postNordTerritory->addCountry('DK');
        $postNordTerritory->addCountry('NO');
        $postNordTerritory->addCountry('FI');

        /* ---------------- F I N L A N D ---------------- */
        $finlandPricingZones = Zones::withPricingScope()->theCountryBelongsTo('FI');
        $this->assertCount(1, $finlandPricingZones);
        $this->assertEquals('Euro Countries', $finlandPricingZones->first()->name);

        $finlandBillingZones = Zones::withBillingScope()->theCountryBelongsTo('FI');
        $this->assertCount(1, $finlandBillingZones);
        $this->assertEquals('Nordic EU Countries', $finlandBillingZones->first()->name);

        $finlandShippingZones = Zones::withShippingScope()->theCountryBelongsTo('FI');
        $this->assertCount(1, $finlandShippingZones);
        $this->assertEquals('PostNord Territory', $finlandShippingZones->first()->name);

        /* ---------------- S W E D E N ---------------- */
        $swedenPricingZones = Zones::withPricingScope()->theCountryBelongsTo('SE');
        $this->assertCount(1, $swedenPricingZones);
        $this->assertEquals('Krona Countries', $swedenPricingZones->first()->name);

        $swedenBillingZones = Zones::withBillingScope()->theCountryBelongsTo('SE');
        $this->assertCount(1, $swedenBillingZones);
        $this->assertEquals('Nordic EU Countries', $swedenBillingZones->first()->name);

        $swedenShippingZones = Zones::withShippingScope()->theCountryBelongsTo('SE');
        $this->assertCount(1, $swedenShippingZones);
        $this->assertEquals('PostNord Territory', $swedenShippingZones->first()->name);

        /* ---------------- D E N M A R K ---------------- */
        $denmarkPricingZones = Zones::withPricingScope()->theCountryBelongsTo('DK');
        $this->assertCount(1, $denmarkPricingZones);
        $this->assertEquals('Krona Countries', $denmarkPricingZones->first()->name);

        $denmarkBillingZones = Zones::withBillingScope()->theCountryBelongsTo('DK');
        $this->assertCount(1, $denmarkBillingZones);
        $this->assertEquals('Nordic EU Countries', $denmarkBillingZones->first()->name);

        $denmarkShippingZones = Zones::withShippingScope()->theCountryBelongsTo('DK');
        $this->assertCount(1, $denmarkShippingZones);
        $this->assertEquals('PostNord Territory', $denmarkShippingZones->first()->name);

        /* ---------------- N O R W A Y ---------------- */
        $norwayPricingZones = Zones::withPricingScope()->theCountryBelongsTo('NO');
        $this->assertCount(1, $norwayPricingZones);
        $this->assertEquals('Krona Countries', $norwayPricingZones->first()->name);

        $norwayBillingZones = Zones::withBillingScope()->theCountryBelongsTo('NO');
        $this->assertCount(0, $norwayBillingZones);

        $norayShippingZones = Zones::withShippingScope()->theCountryBelongsTo('NO');
        $this->assertCount(1, $norayShippingZones);
        $this->assertEquals('PostNord Territory', $norayShippingZones->first()->name);
    }

    /** @test */
    public function it_only_returns_zones_containing_the_given_province_if_an_address_is_in_a_province_and_there_are_multiple_zones_for_the_same_country_but_for_different_provinces()
    {
        $this->seedCanadianProvinces();
        $quebecOntario = $this->shippingZoneForCanada('quebec-ontario', 'QC', 'ON');
        $maritimes = $this->shippingZoneForCanada('maritimes', 'NB', 'NS', 'PE');
        $westernCanada = $this->shippingZoneForCanada('ouest-canadien', 'AB', 'BC', 'MB', 'NF', 'NT', 'NU', 'SK', 'YT');

        $addressInQuebec = Address::create(['country_id' => 'CA', 'province_id' => Province::findByCountryAndCode('CA', 'QC')->id, 'city' => 'Quebec', 'name' => 'Benoit Fourna', 'address' => '5401 Bd des Galeries', 'postalcode' => 'G2K 1N4']);
        $addressInVancouver = Address::create(['country_id' => 'CA', 'province_id' => Province::findByCountryAndCode('CA', 'BC')->id, 'city' => 'Vancouver', 'name' => 'Gerald Durell', 'address' => '1391 E 41st Ave', 'postalcode' => 'V5W 1R7']);
        $addressInHalifax = Address::create(['country_id' => 'CA', 'province_id' => Province::findByCountryAndCode('CA', 'NS')->id, 'city' => 'Halifax', 'name' => 'Rahul Singh', 'address' => '2585 Robie St', 'postalcode' => 'B3K 4N5']);

        $zonesForTheQuebecAddress = Zones::withShippingScope()->theAddressBelongsTo($addressInQuebec);
        $this->assertCount(1, $zonesForTheQuebecAddress);
        $this->assertEquals($quebecOntario->id, $zonesForTheQuebecAddress->first()->id);

        $zonesForTheVancouverAddress = Zones::withShippingScope()->theAddressBelongsTo($addressInVancouver);
        $this->assertCount(1, $zonesForTheVancouverAddress);
        $this->assertEquals($westernCanada->id, $zonesForTheVancouverAddress->first()->id);

        $zonesForTheHalifaxAddress = Zones::withShippingScope()->theAddressBelongsTo($addressInHalifax);
        $this->assertCount(1, $zonesForTheHalifaxAddress);
        $this->assertEquals($maritimes->id, $zonesForTheHalifaxAddress->first()->id);
    }

    private function shippingZoneForCanada(string $name, string ...$provinceCodes): Zone
    {
        $zone = Zone::firstOrCreate(['name' => $name], ['scope' => ZoneScope::SHIPPING]);
        if ($zone->wasRecentlyCreated) {
            $zone->addProvinces(...$this->provinces('CA', ...$provinceCodes));
        }

        return $zone;
    }

    /**
     * @return Province[]
     */
    private function provinces(string $country, string ...$provinceCodes): array
    {
        return Province::byCountry($country)->whereIn('code', $provinceCodes)->get()->all();
    }

    private function seedCanadianProvinces()
    {
        $canada = Country::firstOrCreate(['id' => 'CA'], ['name' => 'Canada', 'is_eu_member' => false, 'phonecode' => '1']);

        $provinces = [
            'AB' => 'Alberta',
            'BC' => 'Colombie-Britannique',
            'MB' => 'Manitoba',
            'NB' => 'Nouveau-Brunswick',
            'NF' => 'Terre-Neuve-et-Labrador',
            'NS' => 'Nouvelle-Écosse',
            'NT' => 'Territoires du Nord-Ouest',
            'NU' => 'Nunavut',
            'ON' => 'Ontario',
            'PE' => 'Île-du-Prince-Édouard',
            'QC' => 'Québec',
            'SK' => 'Saskachewan',
            'YT' => 'Yukon',
        ];

        foreach ($provinces as $code => $name) {
            Province::firstOrCreate(['code' => $code, 'country_id' => 'CA', 'type' => 'province'], ['name' => $name]);
        }
    }
}
