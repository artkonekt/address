<?php
/**
 * Contains the GermanyTest class.
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
use Konekt\Address\Seeds\Countries;
use Konekt\Address\Seeds\StatesOfGermany;
use Konekt\Address\Tests\TestCase;

class GermanyTest extends TestCase
{
    /** @var Country */
    private $germany;

    protected function setUp(): void
    {
        parent::setUp();

        $this->germany = Country::find('DE');
    }

    /** @test */
    public function the_country_is_present()
    {
        $this->assertEquals('Germany', $this->germany->name);
    }

    /** @test */
    public function has_all_of_its_16_states()
    {
        $statesOfGermany = Province::byCountry($this->germany)->get();
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

    protected function setUpDatabase($application)
    {
        parent::setUpDatabase($application);

        $this->artisan('db:seed', ['--class' => Countries::class]);
        $this->artisan('db:seed', ['--class' => StatesOfGermany::class]);
    }
}
