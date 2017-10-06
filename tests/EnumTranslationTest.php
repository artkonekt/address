<?php
/**
 * Contains the EnumTranslationTest class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-09-14
 *
 */


namespace Konekt\Address\Tests;

use Konekt\Address\Models\AddressType;

class EnumTranslationTest extends TestCase
{

    /**
     * @test
     */
    public function address_type_labels_can_be_translated()
    {
        AddressType::reset();

        $this->assertEquals('Lieferadresse', AddressType::SHIPPING()->label());
        $this->assertEquals('Rechnungsadresse', (string) AddressType::BILLING());
    }

    protected function resolveApplicationConfiguration($app)
    {
        parent::resolveApplicationConfiguration($app);

        $app['config']->set('app.locale', 'de');
    }
}
