<?php
/**
 * Contains the db seeder with Romanian counties
 *
 * @copyright   Copyright (c) 2016 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2016-12-03
 *
 */

namespace Konekt\Address\Seeds;

use Illuminate\Database\Seeder;

class CountiesOfRomania extends Seeder
{
    /**
     * Inserts the counties of Romania into the provinces table
     *
     * @return void
     */
    public function run()
    {
        \DB::table('provinces')->insert([

                [
                    'name'       => 'Alba',
                    'country_id' => 'RO',
                    'type'       => 'county',
                    'code'       => 'AB',
                ],

                [
                    'name'       => 'Arad',
                    'country_id' => 'RO',
                    'type'       => 'county',
                    'code'       => 'AR',
                ],

                [
                    'name'       => 'Arges',
                    'country_id' => 'RO',
                    'type'       => 'county',
                    'code'       => 'AG',
                ],

                [
                    'name'       => 'Bacau',
                    'country_id' => 'RO',
                    'type'       => 'county',
                    'code'       => 'BC',
                ],

                [
                    'name'       => 'Bihor',
                    'country_id' => 'RO',
                    'type'       => 'county',
                    'code'       => 'BH',
                ],

                [
                    'name'       => 'Bistrita-Nasaud',
                    'country_id' => 'RO',
                    'type'       => 'county',
                    'code'       => 'BN',
                ],

                [
                    'name'       => 'Botosani',
                    'country_id' => 'RO',
                    'type'       => 'county',
                    'code'       => 'BT',
                ],

                [
                    'name'       => 'Braila',
                    'country_id' => 'RO',
                    'type'       => 'county',
                    'code'       => 'BR',
                ],

                [
                    'name'       => 'Brasov',
                    'country_id' => 'RO',
                    'type'       => 'county',
                    'code'       => 'BV',
                ],

                [
                    'name'       => 'Bucuresti',
                    'country_id' => 'RO',
                    'type'       => 'county',
                    'code'       => 'B ',
                ],

                [
                    'name'       => 'Buzau',
                    'country_id' => 'RO',
                    'type'       => 'county',
                    'code'       => 'BZ',
                ],

                [
                    'name'       => 'Caras Severin',
                    'country_id' => 'RO',
                    'type'       => 'county',
                    'code'       => 'CS',
                ],

                [
                    'name'       => 'Calarasi',
                    'country_id' => 'RO',
                    'type'       => 'county',
                    'code'       => 'CL',
                ],

                [
                    'name'       => 'Cluj',
                    'country_id' => 'RO',
                    'type'       => 'county',
                    'code'       => 'CJ',
                ],

                [
                    'name'       => 'Constanta',
                    'country_id' => 'RO',
                    'type'       => 'county',
                    'code'       => 'CT',
                ],

                [
                    'name'       => 'Covasna',
                    'country_id' => 'RO',
                    'type'       => 'county',
                    'code'       => 'CV',
                ],

                [
                    'name'       => 'Dambovita',
                    'country_id' => 'RO',
                    'type'       => 'county',
                    'code'       => 'DB',
                ],

                [
                    'name'       => 'Dolj',
                    'country_id' => 'RO',
                    'type'       => 'county',
                    'code'       => 'DJ',
                ],

                [
                    'name'       => 'Galati',
                    'country_id' => 'RO',
                    'type'       => 'county',
                    'code'       => 'GL',
                ],

                [
                    'name'       => 'Giurgiu',
                    'country_id' => 'RO',
                    'type'       => 'county',
                    'code'       => 'GR',
                ],

                [
                    'name'       => 'Gorj',
                    'country_id' => 'RO',
                    'type'       => 'county',
                    'code'       => 'GJ',
                ],

                [
                    'name'       => 'Harghita',
                    'country_id' => 'RO',
                    'type'       => 'county',
                    'code'       => 'HR',
                ],

                [
                    'name'       => 'Hunedoara',
                    'country_id' => 'RO',
                    'type'       => 'county',
                    'code'       => 'HD',
                ],

                [
                    'name'       => 'Ialomita',
                    'country_id' => 'RO',
                    'type'       => 'county',
                    'code'       => 'IL',
                ],

                [
                    'name'       => 'Iasi',
                    'country_id' => 'RO',
                    'type'       => 'county',
                    'code'       => 'IS',
                ],

                [
                    'name'       => 'Ilfov',
                    'country_id' => 'RO',
                    'type'       => 'county',
                    'code'       => 'IF',
                ],

                [
                    'name'       => 'Maramures',
                    'country_id' => 'RO',
                    'type'       => 'county',
                    'code'       => 'MM',
                ],

                [
                    'name'       => 'Mehedinti',
                    'country_id' => 'RO',
                    'type'       => 'county',
                    'code'       => 'MH',
                ],

                [
                    'name'       => 'Mures',
                    'country_id' => 'RO',
                    'type'       => 'county',
                    'code'       => 'MS',
                ],

                [
                    'name'       => 'Neamt',
                    'country_id' => 'RO',
                    'type'       => 'county',
                    'code'       => 'NT',
                ],

                [
                    'name'       => 'Olt',
                    'country_id' => 'RO',
                    'type'       => 'county',
                    'code'       => 'OT',
                ],

                [
                    'name'       => 'Prahova',
                    'country_id' => 'RO',
                    'type'       => 'county',
                    'code'       => 'PH',
                ],

                [
                    'name'       => 'Satu Mare',
                    'country_id' => 'RO',
                    'type'       => 'county',
                    'code'       => 'SM',
                ],

                [
                    'name'       => 'Salaj',
                    'country_id' => 'RO',
                    'type'       => 'county',
                    'code'       => 'SJ',
                ],

                [
                    'name'       => 'Sibiu',
                    'country_id' => 'RO',
                    'type'       => 'county',
                    'code'       => 'SB',
                ],

                [
                    'name'       => 'Suceava',
                    'country_id' => 'RO',
                    'type'       => 'county',
                    'code'       => 'SV',
                ],

                [
                    'name'       => 'Teleorman',
                    'country_id' => 'RO',
                    'type'       => 'county',
                    'code'       => 'TR',
                ],

                [
                    'name'       => 'Timis',
                    'country_id' => 'RO',
                    'type'       => 'county',
                    'code'       => 'TM',
                ],

                [
                    'name'       => 'Tulcea',
                    'country_id' => 'RO',
                    'type'       => 'county',
                    'code'       => 'TL',
                ],

                [
                    'name'       => 'Vaslui',
                    'country_id' => 'RO',
                    'type'       => 'county',
                    'code'       => 'VS',
                ],

                [
                    'name'       => 'Valcea',
                    'country_id' => 'RO',
                    'type'       => 'county',
                    'code'       => 'VL',
                ],

                [
                    'name'       => 'Vrancea',
                    'country_id' => 'RO',
                    'type'       => 'county',
                    'code'       => 'VN',
                ],
        ]);
    }
}
