<?php
/**
 * Contains the db seeder with the provinces and territories of the Canada (English)
 *
 * @copyright   Copyright (c) 2023 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2023-02-27
 *
 */

namespace Konekt\Address\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvincesAndTerritoriesOfCanada extends Seeder
{
    public function run()
    {
        DB::table('provinces')->insert([
            /** - - - - - - - - - P R O V I N C E S - - - - - - - - **/
            [
                'name'       => 'Alberta',
                'country_id' => 'CA',
                'type'       => 'province',
                'code'       => 'AB'
            ],
            [
                'name'       => 'British Columbia',
                'country_id' => 'CA',
                'type'       => 'province',
                'code'       => 'BC'
            ],
            [
                'name'       => 'Manitoba',
                'country_id' => 'CA',
                'type'       => 'province',
                'code'       => 'MB'
            ],
            [
                'name'       => 'New Brunswick',
                'country_id' => 'CA',
                'type'       => 'province',
                'code'       => 'NB'
            ],
            [
                'name'       => 'Newfoundland',
                'country_id' => 'CA',
                'type'       => 'province',
                'code'       => 'NL'
            ],
            [
                'name'       => 'Nova Scotia',
                'country_id' => 'CA',
                'type'       => 'province',
                'code'       => 'NS'
            ],
            [
                'name'       => 'Ontario',
                'country_id' => 'CA',
                'type'       => 'province',
                'code'       => 'ON'
            ],
            [
                'name'       => 'Prince Edward Island',
                'country_id' => 'CA',
                'type'       => 'province',
                'code'       => 'PE'
            ],
            [
                'name'       => 'Quebec',
                'country_id' => 'CA',
                'type'       => 'province',
                'code'       => 'QC'
            ],
            [
                'name'       => 'Saskatchewan',
                'country_id' => 'CA',
                'type'       => 'province',
                'code'       => 'SK'
            ],
            /** - - - - - - - - - T E R R I T O R I E S - - - - - - - - **/
            [
                'name'       => 'Northwest Territories',
                'country_id' => 'CA',
                'type'       => 'territory',
                'code'       => 'NT'
            ],
            [
                'name'       => 'Nunavut',
                'country_id' => 'CA',
                'type'       => 'territory',
                'code'       => 'NU'
            ],
            [
                'name'       => 'Yukon',
                'country_id' => 'CA',
                'type'       => 'territory',
                'code'       => 'YT'
            ],
        ]);
    }
}
