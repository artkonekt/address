<?php

declare(strict_types=1);

namespace Konekt\Address\Tests\Seeders;

use Konekt\Address\Seeds\Countries;
use Konekt\Address\Tests\TestCase;

class CountrySeederTest extends TestCase
{
    /** @test */
    public function it_can_return_the_list_of_countries(): void
    {
        $countries = Countries::all();
        $this->assertIsArray($countries);
        $this->assertCount(252, $countries);

        foreach ($countries as $id => $country) {
            $this->assertIsString($id);
            $this->assertEquals(2, strlen($id));
            $this->assertArrayHasKey('name', $country);
            $this->assertArrayHasKey('phonecode', $country);
            $this->assertArrayHasKey('is_eu_member', $country);
        }
    }

    /** @test */
    public function a_country_can_be_retrieved_by_code(): void
    {
        $afghanistan = Countries::byCode('AF');
        $this->assertIsArray($afghanistan);
        $this->assertArrayHasKey('id', $afghanistan);
        $this->assertArrayHasKey('name', $afghanistan);
        $this->assertArrayHasKey('phonecode', $afghanistan);
        $this->assertArrayHasKey('is_eu_member', $afghanistan);
        $this->assertIsString($afghanistan['id']);
        $this->assertEquals('AF', $afghanistan['id']);
    }

    /** @test */
    public function country_by_code_retrieval_is_case_insensitive(): void
    {
        $belgium = Countries::byCode('be');
        $this->assertIsArray($belgium);
        $this->assertArrayHasKey('id', $belgium);
        $this->assertArrayHasKey('name', $belgium);
        $this->assertArrayHasKey('phonecode', $belgium);
        $this->assertArrayHasKey('is_eu_member', $belgium);
        $this->assertIsString($belgium['id']);
        $this->assertEquals('BE', $belgium['id']);
    }

    /** @test */
    public function attempting_to_retrieve_a_non_existent_country_returns_null(): void
    {
        $this->assertNull(Countries::byCode('nope'));
    }
}
