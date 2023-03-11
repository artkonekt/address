<?php

declare(strict_types=1);

/**
 * Contains the db seeder with the provinces and territories of the Canada (French)
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

class ProvincesAndTerritoriesOfCanadaFrench extends Seeder
{
    public function run()
    {
        DB::table('provinces')->insert([
            /** - - - - - - - - - P R O V I N C E S - - - - - - - - **/
            [
                'name' => 'Alberta',
                'country_id' => 'CA',
                'type' => 'province',
                'code' => 'AB'
            ],
            [
                'name' => 'Colombie Britannique',
                'country_id' => 'CA',
                'type' => 'province',
                'code' => 'BC'
            ],
            [
                'name' => 'Manitoba',
                'country_id' => 'CA',
                'type' => 'province',
                'code' => 'MB'
            ],
            [
                'name' => 'Nouveau-Brunswick',
                'country_id' => 'CA',
                'type' => 'province',
                'code' => 'NB'
            ],
            [
                'name' => 'Terre-Neuve-et-Labrador',
                'country_id' => 'CA',
                'type' => 'province',
                'code' => 'NL'
            ],
            [
                'name' => 'Nouvelle-Écosse',
                'country_id' => 'CA',
                'type' => 'province',
                'code' => 'NS'
            ],
            [
                'name' => 'Ontario',
                'country_id' => 'CA',
                'type' => 'province',
                'code' => 'ON'
            ],
            [
                'name' => 'Île du Prince-Édouard',
                'country_id' => 'CA',
                'type' => 'province',
                'code' => 'PE'
            ],
            [
                'name' => 'Quebec',
                'country_id' => 'CA',
                'type' => 'province',
                'code' => 'QC'
            ],
            [
                'name' => 'Saskatchewan',
                'country_id' => 'CA',
                'type' => 'province',
                'code' => 'SK'
            ],
            /** - - - - - - - - - T E R R I T O R I E S - - - - - - - - **/
            [
                'name' => 'Territoires du Nord-Ouest',
                'country_id' => 'CA',
                'type' => 'territory',
                'code' => 'NT'
            ],
            [
                'name' => 'Nunavut',
                'country_id' => 'CA',
                'type' => 'territory',
                'code' => 'NU'
            ],
            [
                'name' => 'Territoire du Yukon',
                'country_id' => 'CA',
                'type' => 'territory',
                'code' => 'YT'
            ],
        ]);
    }
}
