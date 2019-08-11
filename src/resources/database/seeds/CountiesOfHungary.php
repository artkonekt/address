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
                'type'       => 'county',
                'code'       => 'BU'
            ],
            [
                'name'       => 'Baranya',
                'country_id' => 'HU',
                'type'       => 'county',
                'code'       => 'BA'
            ],
            [
                'name'       => 'Bács-Kiskun',
                'country_id' => 'HU',
                'type'       => 'county',
                'code'       => 'BK'
            ],
            [
                'name'       => 'Békés',
                'country_id' => 'HU',
                'type'       => 'county',
                'code'       => 'BE'
            ],
            [
                'name'       => 'Borsod-Abaúj-Zemplén',
                'country_id' => 'HU',
                'type'       => 'county',
                'code'       => 'BZ'
            ],
            [
                'name'       => 'Csongrád',
                'country_id' => 'HU',
                'type'       => 'county',
                'code'       => 'CS'
            ],
            [
                'name'       => 'Fejér',
                'country_id' => 'HU',
                'type'       => 'county',
                'code'       => 'FE'
            ],
            [
                'name'       => 'Győr-Moson-Sopron',
                'country_id' => 'HU',
                'type'       => 'county',
                'code'       => 'GS'
            ],
            [
                'name'       => 'Hajdú-Bihar',
                'country_id' => 'HU',
                'type'       => 'county',
                'code'       => 'HB'
            ],
            [
                'name'       => 'Heves',
                'country_id' => 'HU',
                'type'       => 'county',
                'code'       => 'HE'
            ],
            [
                'name'       => 'Jász-Nagykun-Szolnok',
                'country_id' => 'HU',
                'type'       => 'county',
                'code'       => 'JN'
            ],
            [
                'name'       => 'Komárom-Esztergom',
                'country_id' => 'HU',
                'type'       => 'county',
                'code'       => 'KE'
            ],
            [
                'name'       => 'Nógrád',
                'country_id' => 'HU',
                'type'       => 'county',
                'code'       => 'NO'
            ],
            [
                'name'       => 'Pest',
                'country_id' => 'HU',
                'type'       => 'county',
                'code'       => 'PE'
            ],
            [
                'name'       => 'Somogy',
                'country_id' => 'HU',
                'type'       => 'county',
                'code'       => 'SO'
            ],
            [
                'name'       => 'Szabolcs-Szatmár-Bereg',
                'country_id' => 'HU',
                'type'       => 'county',
                'code'       => 'SZ'
            ],
            [
                'name'       => 'Tolna',
                'country_id' => 'HU',
                'type'       => 'county',
                'code'       => 'TO'
            ],
            [
                'name'       => 'Vas',
                'country_id' => 'HU',
                'type'       => 'county',
                'code'       => 'VA'
            ],
            [
                'name'       => 'Veszprém',
                'country_id' => 'HU',
                'type'       => 'county',
                'code'       => 'VE'
            ],
            [
                'name'       => 'Zala',
                'country_id' => 'HU',
                'type'       => 'county',
                'code'       => 'ZA'
            ]
        ]);
    }
}
