<?php
/**
 * Contains the CountryTest class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-07-01
 *
 */


namespace Konekt\Address\Tests;


use Konekt\Address\Contracts\Country;
use Konekt\Address\Models\CountryProxy;
use Konekt\Address\Seeds\Countries;
use Konekt\Address\Seeds\CountiesOfRomania;
use Konekt\Address\Seeds\StatesOfUsa;

class CountryTest extends TestCase
{
    /**
     * @inheritdoc
     */
    protected function setUpDatabase($application)
    {
        parent::setUpDatabase($application);

        $this->artisan('db:seed', ['--class' => Countries::class]);
        $this->artisan('db:seed', ['--class' => StatesOfUsa::class]);
        $this->artisan('db:seed', ['--class' => CountiesOfRomania::class]);
    }

    public function testCountryRetrievesRegions()
    {
        $usa = CountryProxy::find('US');

        $this->assertInstanceOf(Country::class, $usa);
        $this->assertCount(50, $usa->states);

        $romania = CountryProxy::find('RO');

        $this->assertInstanceOf(Country::class, $romania);
        $this->assertCount(42, $romania->provinces);

    }

}