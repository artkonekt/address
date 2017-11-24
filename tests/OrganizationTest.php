<?php
/**
 * Contains the OrganizationTest class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-09-25
 *
 */


namespace Konekt\Address\Tests;

use Konekt\Address\Contracts\Organization as OrganizationContract;
use Konekt\Address\Models\Organization;
use Konekt\Address\Models\OrganizationProxy;

class OrganizationTest extends TestCase
{
    /**
     * @test
     */
    public function can_be_instantiated()
    {
        $org = new Organization();

        $this->assertInstanceOf(Organization::class, $org);
    }

    /**
     * @test
     */
    public function implements_the_organization_interface()
    {
        $person = new Organization();

        $this->assertInstanceOf(OrganizationContract::class, $person);
    }

    /**
     * @test
     */
    public function organization_proxy_returns_the_proper_class()
    {
        $this->assertEquals(Organization::class, OrganizationProxy::modelClass());
    }

    /**
     * @test
     */
    public function can_be_created_with_minimal_data()
    {
        $jetbrains = OrganizationProxy::create([
            'name' => 'JetBrains s.r.o.'
        ]);

        $this->assertInstanceOf(Organization::class, $jetbrains);

        $jetbrains = $jetbrains->fresh();

        $this->assertEquals('JetBrains s.r.o.', $jetbrains->name);
        $this->assertNotNull($jetbrains->id);
    }

    /**
     * @test
     */
    public function all_fields_can_be_set()
    {
        $startAlliance = OrganizationProxy::create([
            'name'            => 'Berlin Partner für Wirtschaft und Technologie GmbH',
            'tax_nr'          => 'DE136629780',
            'registration_nr' => 'HRB 13072 B',
            'email'           => 'lukas.engenbach@berlin-partner.de',
            'phone'           => '+49 30 46302-599'
        ]);

        $startAlliance = $startAlliance->fresh();

        $this->assertEquals('Berlin Partner für Wirtschaft und Technologie GmbH', $startAlliance->name);
        $this->assertEquals('DE136629780', $startAlliance->tax_nr);
        $this->assertEquals('HRB 13072 B', $startAlliance->registration_nr);
        $this->assertEquals('lukas.engenbach@berlin-partner.de', $startAlliance->email);
        $this->assertEquals('+49 30 46302-599', $startAlliance->phone);
    }
}
