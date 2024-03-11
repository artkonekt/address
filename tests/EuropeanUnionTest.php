<?php

declare(strict_types=1);

/**
 * Contains the EuropeanUnionTest class.
 *
 * @copyright   Copyright (c) 2024 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2024-03-11
 *
 */

namespace Konekt\Address\Tests;

use Konekt\Address\Utils\EuropeanUnion;
use PHPUnit\Framework\TestCase as PhpUnitTestCase;

class EuropeanUnionTest extends PhpUnitTestCase
{
    public static function memberStateProvider(): array
    {
        return [
            ['DE', '1960-01-01', true],
            ['DE', '1957-12-30', false],
            ['UK', '1973-01-01', true],
            ['UK', '2020-02-01', false],
            ['UK', '1972-12-25', false],
            ['EE', '2020-02-01', true],
            ['EE', '2004-04-30', false],
            ['HR', '2013-06-30', false],
            ['HR', '2013-07-01', true],
            ['HR', null, true],
            ['SI', '2004-04-30', false],
            ['SI', '2004-05-01', true],
            ['SI', '2004-05-02', true],
        ];
    }

    public static function vatNumberProvider(): array
    {
        return [
            ['ATU12345678', 'AT'],
            ['ATW12345678', false],
            ['ATU2345678', false],
            ['ATU123456789', false],
            ['BE1234567890', 'BE'],
            ['BE12345678A', false],
            ['BE12345678', false],
            ['BG1234567890', 'BG'],
            ['BG123456789', 'BG'],
            ['BG12345678', false],
            ['BG12345678901', false],
            ['HR12345678901', 'HR'],
            ['HR1234567890', false],
            ['HR123456789012', false],
            ['CY12345678X', 'CY'],
            ['cy12345678q', 'CY'],
            ['cy123456781', false],
            ['CY12345678', false],
            ['CZ12345678', 'CZ'],
            ['CZ123456789', 'CZ'],
            ['cz1234567890', 'CZ'],
            ['cz12345678900', false],
            ['DK45875460', 'DK'],
            ['DK00100234', 'DK'],
            ['DK0010023', false],
            ['DK001002345', false],
            ['DK123A5678', false],
            ['EE545854391', 'EE'],
            ['EE01130232', false],
            ['EE3910063122', false],
            ['FI84638463', 'FI'],
            ['fi00100234', 'FI'],
            ['fi0050042', false],
            ['FI000012345', false],
            ['FI123B8765', false],
            ['FR12345678901', 'FR'],
            ['FRX1234567890', 'FR'],
            ['FR1X123456789', 'FR'],
            ['FRXX123456789', 'FR'],
            ['FRXXX23456789', false],
            ['FR12X23456789', false],
            ['FR1223456789', false],
            ['DE332537240', 'DE'],
            ['de123456789', 'DE'],
            ['DE06385314', false],
            ['DE332537240A', false],
            ['EL332537240', 'GR'],
            ['el123456789', 'GR'],
            ['EL06385314', false],
            ['ELA32537240', false],
            ['HU12345678', 'HU'],
            ['HU1234567', false],
            ['HU123456789', false],
            ['IE1234567X', 'IE'],
            ['IE1234567A', 'IE'],
            ['IE1234567W', 'IE'],
            ['IE1234567WW', 'IE'],
            ['IE1234567B', 'IE'],
            ['IE1234567FW', 'IE'],
            ['IE1F34567F', false],
            ['IT12345678901', 'IT'],
            ['IT123456789012', false],
            ['IT1234567890F', false],
            ['LV12345678901', 'LV'],
            ['LV123456789', false],
            ['LVA1234567890', false],
            ['LT123456789', 'LT'],
            ['LT1234567890', false],
            ['LT12345678901', false],
            ['LT123456789012', 'LT'],
            ['LT1234567890123', false],
            ['LU12345678', 'LU'],
            ['LU123456789', false],
            ['MT12345678', 'MT'],
            ['MT123456789', false],
            ['NL123456789B01', 'NL'],
            ['NL123456789BO2', 'NL'],
            ['nl123456789bo2', 'NL'],
            ['NL123456789BO1', false],
            ['NL123456789A01', false],
            ['NL123456789AO2', false],
            ['NL123456789001', false],
            ['PL1234567890', 'PL'],
            ['PL123456789', false],
            ['PL12345678901', false],
            ['PLA234567890', false],
            ['PL123456789O', false],
            ['PT123456789', 'PT'],
            ['PT1234567890', false],
            ['PT12345678', false],
            ['RO5', false],
            ['RO54', 'RO'],
            ['RO455', 'RO'],
            ['RO3548', 'RO'],
            ['RO54701', 'RO'],
            ['RO547009', 'RO'],
            ['RO9876543', 'RO'],
            ['RO35409777', 'RO'],
            ['RO48071901', 'RO'],
            ['RO480719012', 'RO'],
            ['RO4807190123', 'RO'],
            ['RO480719012A', false],
            ['RO48071901234', false],
            ['SK1234567890', 'SK'],
            ['SK123456789', false],
            ['SK12345678901', false],
            ['ESX12345678', 'ES'],
            ['ES12345678X', 'ES'],
            ['ESX1234567X', 'ES'],
            ['ESX123467X', false],
            ['ES112345677', false],
            ['SE123456789012', 'SE'],
            ['SE12345678901', false],
            ['SE1234567890123', false],
            ['SI12345678', 'SI'],
            ['SI123A5678', false],
            ['SI123A56789', false],
            ['SI123A567', false],
            ['GB123456789', 'UK'],
            ['GB12345678', false],
            ['GB1234567890', false],
        ];
    }

    /**
     * @test
     * @dataProvider vatNumberProvider
     */
    public function vat_number_format_compliance(string $vatNumber, false|string $expected): void
    {
        $this->assertEquals($expected, EuropeanUnion::validateVatNumberFormat($vatNumber));
    }

    /**
     * @test
     * @dataProvider memberStateProvider
     */
    public function is_member_state_test(string $country, string|null $date, bool $isMember): void
    {
        $this->assertEquals(
            $isMember,
            EuropeanUnion::isMemberState($country, $date),
            sprintf('%s should %sbe the member of the EU on %s', $country, $isMember ? '' : 'not ', $date)
        );
    }
}
