<?php
/**
 * Contains the UsaTest class.
 *
 * @copyright   Copyright (c) 2019 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2019-08-11
 *
 */

namespace Konekt\Address\Tests\Seeders;

use Konekt\Address\Contracts\Province as ProvinceContract;
use Konekt\Address\Models\Country;
use Konekt\Address\Models\Province;
use Konekt\Address\Models\ProvinceType;
use Konekt\Address\Seeds\Countries;
use Konekt\Address\Seeds\StatesOfUsa;
use Konekt\Address\Tests\TestCase;

class UsaTest extends TestCase
{
    /** @var Country */
    private $usa;

    protected function setUp(): void
    {
        parent::setUp();

        $this->usa = Country::find('US');
    }

    /** @test */
    public function the_country_is_present()
    {
        $this->assertEquals('United States', $this->usa->name);
    }

    /** @test */
    public function california_is_still_there()
    {
        $california = Province::findByCountryAndCode('US', 'CA');

        $this->assertInstanceOf(ProvinceContract::class, $california);
        $this->assertEquals('US', $california->country_id);
        $this->assertEquals('CA', $california->code);
        $this->assertTrue($california->type->equals(ProvinceType::STATE()));
    }

    /** @test */
    public function has_all_of_its_50_states()
    {
        $states = Province::byCountry($this->usa)->byType(ProvinceType::STATE)->get();
        $this->assertCount(50, $states);

        $names = $states->map(function ($state) {
            return $state->name;
        });

        $this->assertContains('Alabama', $names);
        $this->assertContains('Alaska', $names);
        $this->assertContains('Arizona', $names);
        $this->assertContains('Arkansas', $names);
        $this->assertContains('California', $names);
        $this->assertContains('Colorado', $names);
        $this->assertContains('Connecticut', $names);
        $this->assertContains('Delaware', $names);
        $this->assertContains('Florida', $names);
        $this->assertContains('Georgia', $names);
        $this->assertContains('Hawaii', $names);
        $this->assertContains('Idaho', $names);
        $this->assertContains('Illinois', $names);
        $this->assertContains('Indiana', $names);
        $this->assertContains('Iowa', $names);
        $this->assertContains('Kansas', $names);
        $this->assertContains('Kentucky', $names);
        $this->assertContains('Louisiana', $names);
        $this->assertContains('Maine', $names);
        $this->assertContains('Maryland', $names);
        $this->assertContains('Massachusetts', $names);
        $this->assertContains('Michigan', $names);
        $this->assertContains('Minnesota', $names);
        $this->assertContains('Mississippi', $names);
        $this->assertContains('Missouri', $names);
        $this->assertContains('Montana', $names);
        $this->assertContains('Nebraska', $names);
        $this->assertContains('Nevada', $names);
        $this->assertContains('New Hampshire', $names);
        $this->assertContains('New Jersey', $names);
        $this->assertContains('New Mexico', $names);
        $this->assertContains('New York', $names);
        $this->assertContains('North Carolina', $names);
        $this->assertContains('North Dakota', $names);
        $this->assertContains('Ohio', $names);
        $this->assertContains('Oklahoma', $names);
        $this->assertContains('Oregon', $names);
        $this->assertContains('Pennsylvania', $names);
        $this->assertContains('Rhode Island', $names);
        $this->assertContains('South Carolina', $names);
        $this->assertContains('South Dakota', $names);
        $this->assertContains('Tennessee', $names);
        $this->assertContains('Texas', $names);
        $this->assertContains('Utah', $names);
        $this->assertContains('Vermont', $names);
        $this->assertContains('Virginia', $names);
        $this->assertContains('Washington', $names);
        $this->assertContains('West Virginia', $names);
        $this->assertContains('Wisconsin', $names);
        $this->assertContains('Wyoming', $names);
    }

    protected function setUpDatabase($application)
    {
        parent::setUpDatabase($application);

        $this->artisan('db:seed', ['--class' => Countries::class]);
        $this->artisan('db:seed', ['--class' => StatesOfUsa::class]);
    }
}
