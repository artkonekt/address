<?php
/**
 * Contains the NetherlandsTest class.
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
use Konekt\Address\Seeds\ProvincesOfNetherlands;
use Konekt\Address\Tests\TestCase;

class NetherlandsTest extends TestCase
{
    /** @var Country */
    private $netherlands;

    protected function setUp(): void
    {
        parent::setUp();

        $this->netherlands = Country::find('NL');
    }

    /** @test */
    public function the_country_is_present()
    {
        $this->assertEquals('Netherlands', $this->netherlands->name);
    }

    /** @test */
    public function has_all_of_its_12_provinces()
    {
        $provincesOfNetherlands = Province::byCountry($this->netherlands)->get();
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

    protected function setUpDatabase($application)
    {
        parent::setUpDatabase($application);

        $this->artisan('db:seed', ['--class' => Countries::class]);
        $this->artisan('db:seed', ['--class' => ProvincesOfNetherlands::class]);
    }
}
