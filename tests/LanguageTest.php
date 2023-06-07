<?php

declare(strict_types=1);

/**
 * Contains the LanguageTest class.
 *
 * @copyright   Copyright (c) 2023 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2023-04-08
 *
 */

namespace Konekt\Address\Tests;

use Konekt\Address\Contracts\Language as LanguageContract;
use Konekt\Address\Models\Language;
use Konekt\Address\Seeds\Languages;

class LanguageTest extends TestCase
{
    /** @test */
    public function it_can_be_created()
    {
        $mandoa = Language::create([
            'id' => 'ma',
            'name' => 'Mandalorian',
            'native_name' => 'Mando’a',
        ]);

        $this->assertInstanceOf(Language::class, $mandoa);
        $this->assertInstanceOf(LanguageContract::class, $mandoa);
        $this->assertEquals('ma', $mandoa->id);
        $this->assertEquals('ma', $mandoa->getIsoCode());
        $this->assertEquals('Mandalorian', $mandoa->getName());
        $this->assertEquals('Mando’a', $mandoa->getNativeName());
    }

    /** @test */
    public function it_can_be_seeded()
    {
        $this->seed(Languages::class);

        $rumantsch = Language::findByIsoCode('rm');
        $this->assertInstanceOf(Language::class, $rumantsch);
        $this->assertEquals('rm', $rumantsch->getIsoCode());
        $this->assertEquals('Romansh', $rumantsch->getName());
        $this->assertEquals('rumantsch', $rumantsch->getNativeName());
    }
}
