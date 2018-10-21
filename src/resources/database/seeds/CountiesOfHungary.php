<?php
/**
 * Contains the db seeder with the counties of Hungary
 *
 * @copyright   Copyright (c) 2018 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2018-10-21
 *
 */

namespace Konekt\Address\Seeds;

use Illuminate\Database\Seeder;

class CountiesOfHungary extends Seeder
{
    public function run()
    {
        \DB::table('provinces')->insert([
            [
                'name'       => 'Budapest',
                'country_id' => 'HU',
                'type'       => 'county'
            ],
            [
                'name'       => 'Baranya',
                'country_id' => 'HU',
                'type'       => 'county'
            ],
            [
                'name'       => 'Bács-Kiskun',
                'country_id' => 'HU',
                'type'       => 'county'
            ],
            [
                'name'       => 'Békés',
                'country_id' => 'HU',
                'type'       => 'county'
            ],
            [
                'name'       => 'Borsod-Abaúj-Zemplén',
                'country_id' => 'HU',
                'type'       => 'county'
            ],
            [
                'name'       => 'Csongrád',
                'country_id' => 'HU',
                'type'       => 'county'
            ],
            [
                'name'       => 'Fejér',
                'country_id' => 'HU',
                'type'       => 'county'
            ],
            [
                'name'       => 'Győr-Moson-Sopron',
                'country_id' => 'HU',
                'type'       => 'county'
            ],
            [
                'name'       => 'Hajdú-Bihar',
                'country_id' => 'HU',
                'type'       => 'county'
            ],
            [
                'name'       => 'Heves',
                'country_id' => 'HU',
                'type'       => 'county'
            ],
            [
                'name'       => 'Jász-Nagykun-Szolnok',
                'country_id' => 'HU',
                'type'       => 'county'
            ],
            [
                'name'       => 'Komárom-Esztergom',
                'country_id' => 'HU',
                'type'       => 'county'
            ],
            [
                'name'       => 'Nógrád',
                'country_id' => 'HU',
                'type'       => 'county'
            ],
            [
                'name'       => 'Pest',
                'country_id' => 'HU',
                'type'       => 'county'
            ],
            [
                'name'       => 'Somogy',
                'country_id' => 'HU',
                'type'       => 'county'
            ],
            [
                'name'       => 'Szabolcs-Szatmár-Bereg',
                'country_id' => 'HU',
                'type'       => 'county'
            ],
            [
                'name'       => 'Tolna',
                'country_id' => 'HU',
                'type'       => 'county'
            ],
            [
                'name'       => 'Vas',
                'country_id' => 'HU',
                'type'       => 'county'
            ],
            [
                'name'       => 'Veszprém',
                'country_id' => 'HU',
                'type'       => 'county'
            ],
            [
                'name'       => 'Zala',
                'country_id' => 'HU',
                'type'       => 'county'
            ]
        ]);
    }
}
