<?php
/**
 * Contains the IndiaTest class.
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
use Konekt\Address\Seeds\StatesAndTerritoriesOfIndia;
use Konekt\Address\Tests\TestCase;

class IndiaTest extends TestCase
{
    /** @var Country */
    private $india;

    protected function setUp(): void
    {
        parent::setUp();

        $this->india = Country::find('IN');
    }

    /** @test */
    public function the_country_is_present()
    {
        $this->assertEquals('India', $this->india->name);
    }

    /** @test */
    public function india_has_all_of_its_29_states()
    {
        $statesOfIndia = Province::byCountry($this->india)->byType(ProvinceType::STATE())->get();

        $names = $statesOfIndia->map(function ($state) {
            return $state->name;
        });

        $this->assertCount(29, $statesOfIndia);
        $this->assertContains('Andhra Pradesh', $names);
        $this->assertContains('Arunachal Pradesh', $names);
        $this->assertContains('Assam', $names);
        $this->assertContains('Bihar', $names);
        $this->assertContains('Chhattisgarh', $names);
        $this->assertContains('Goa', $names);
        $this->assertContains('Gujarat', $names);
        $this->assertContains('Haryana', $names);
        $this->assertContains('Himachal Pradesh', $names);
        $this->assertContains('Jammu and Kashmir', $names);
        $this->assertContains('Jharkhand', $names);
        $this->assertContains('Karnataka', $names);
        $this->assertContains('Kerala', $names);
        $this->assertContains('Madhya Pradesh', $names);
        $this->assertContains('Maharashtra', $names);
        $this->assertContains('Manipur', $names);
        $this->assertContains('Meghalaya', $names);
        $this->assertContains('Mizoram', $names);
        $this->assertContains('Nagaland', $names);
        $this->assertContains('Odisha', $names);
        $this->assertContains('Punjab', $names);
        $this->assertContains('Rajasthan', $names);
        $this->assertContains('Sikkim', $names);
        $this->assertContains('Tamil Nadu', $names);
        $this->assertContains('Telangana', $names);
        $this->assertContains('Tripura', $names);
        $this->assertContains('Uttar Pradesh', $names);
        $this->assertContains('Uttarakhand', $names);
        $this->assertContains('West Bengal', $names);
    }

    /** @test */
    public function india_has_all_of_its_7_territories()
    {
        $territoriesOfIndia = Province::byCountry($this->india)->byType(ProvinceType::TERRITORY)->get();

        $names = $territoriesOfIndia->map(function ($territory) {
            return $territory->name;
        });

        $this->assertCount(7, $territoriesOfIndia);
        $this->assertContains('Andaman and Nicobar Islands', $names);
        $this->assertContains('Chandigarh', $names);
        $this->assertContains('Dadra and Nagar Haveli', $names);
        $this->assertContains('Daman and Diu', $names);
        $this->assertContains('Delhi', $names);
        $this->assertContains('Lakshadweep', $names);
        $this->assertContains('Puducherry', $names);
    }

    protected function setUpDatabase($application)
    {
        parent::setUpDatabase($application);

        $this->artisan('db:seed', ['--class' => Countries::class]);
        $this->artisan('db:seed', ['--class' => StatesAndTerritoriesOfIndia::class]);
    }
}
