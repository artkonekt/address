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

use Carbon\Carbon;
use Konekt\Address\Contracts\Country as CountryContract;
use Konekt\Address\Models\Country;
use Konekt\Address\Models\CountryProxy;
use Konekt\Address\Seeds\Countries;
use Konekt\Address\Seeds\CountiesOfRomania;
use Konekt\Address\Seeds\StatesOfUsa;

class CountryTest extends TestCase
{
    /** @var  Country */
    protected $usa;

    /** @var  Country */
    protected $uk;

    /** @var  Country */
    protected $romania;

    /** @var  Country */
    protected $germany;

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

    public function setUp()
    {
        parent::setUp();

        $this->usa     = CountryProxy::find('US');
        $this->uk      = CountryProxy::find('GB');
        $this->romania = CountryProxy::find('RO');
        $this->germany = CountryProxy::find('DE');
    }

    /**
     * @test
     */
    public function countries_can_be_found_by_their_iso_code()
    {
        $this->assertInstanceOf(CountryContract::class, $this->usa);
        $this->assertInstanceOf(CountryContract::class, $this->romania);
        $this->assertInstanceOf(CountryContract::class, $this->germany);
        $this->assertInstanceOf(CountryContract::class, $this->uk);
    }

    /**
     * @test
     */
    public function country_properly_retrieves_its_provinces()
    {
        $this->assertCount(50, $this->usa->states);

        $this->assertCount(42, $this->romania->provinces);
        $this->assertCount(0, $this->romania->states);
        $this->assertCount(42, $this->romania->counties);
    }

    /**
     * @test
     */
    public function eu_countries_have_the_eu_flag_on()
    {
        $brexit = Carbon::createFromDate(2019, 03, 29);

        $this->assertTrue($this->romania->is_eu_member);
        $this->assertTrue($this->germany->is_eu_member);
        $this->assertFalse($this->usa->is_eu_member);

        $this->assertEquals(
            $brexit->isFuture(),
            $this->uk->is_eu_member
        );
    }
}
