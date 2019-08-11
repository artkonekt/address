<?php
/**
 * Contains the HungaryTest class.
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
use Konekt\Address\Seeds\CountiesOfHungary;
use Konekt\Address\Seeds\Countries;
use Konekt\Address\Tests\TestCase;

class HungaryTest extends TestCase
{
    /** @var Country */
    private $hungary;

    protected function setUp(): void
    {
        parent::setUp();

        $this->hungary = Country::find('HU');
    }

    /** @test */
    public function the_country_is_present()
    {
        $this->assertEquals('Hungary', $this->hungary->name);
    }

    /** @test */
    public function has_all_of_its_20_counties()
    {
        $countiesOfHungary = Province::byCountry($this->hungary)->get();
        $this->assertCount(20, $countiesOfHungary);

        $names = $countiesOfHungary->map(function ($county) {
            return $county->name;
        });

        $this->assertContains('Baranya', $names);
        $this->assertContains('Bács-Kiskun', $names);
        $this->assertContains('Békés', $names);
        $this->assertContains('Borsod-Abaúj-Zemplén', $names);
        $this->assertContains('Budapest', $names);
        $this->assertContains('Csongrád', $names);
        $this->assertContains('Fejér', $names);
        $this->assertContains('Győr-Moson-Sopron', $names);
        $this->assertContains('Hajdú-Bihar', $names);
        $this->assertContains('Heves', $names);
        $this->assertContains('Jász-Nagykun-Szolnok', $names);
        $this->assertContains('Komárom-Esztergom', $names);
        $this->assertContains('Nógrád', $names);
        $this->assertContains('Pest', $names);
        $this->assertContains('Somogy', $names);
        $this->assertContains('Szabolcs-Szatmár-Bereg', $names);
        $this->assertContains('Tolna', $names);
        $this->assertContains('Vas', $names);
        $this->assertContains('Veszprém', $names);
        $this->assertContains('Zala', $names);
    }

    protected function setUpDatabase($application)
    {
        parent::setUpDatabase($application);

        $this->artisan('db:seed', ['--class' => Countries::class]);
        $this->artisan('db:seed', ['--class' => CountiesOfHungary::class]);
    }
}
