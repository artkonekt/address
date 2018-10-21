<?php
/**
 * Contains the db seeder with the states of Germany
 *
 * @copyright   Copyright (c) 2018 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2018-10-21
 *
 */

namespace Konekt\Address\Seeds;

use Illuminate\Database\Seeder;

class StatesOfGermany extends Seeder
{
    public function run()
    {
        \DB::table('provinces')->insert([
            [
                "name"       => "Baden-Württemberg",
                "country_id" => "DE",
                "type"       => "state",
                "code"       => "BW"
            ],
            [
                "name"       => "Bayern",
                "country_id" => "DE",
                "type"       => "state",
                "code"       => "BY"
            ],
            [
                "name"       => "Berlin",
                "country_id" => "DE",
                "type"       => "state",
                "code"       => "BE"
            ],
            [
                "name"       => "Brandenburg",
                "country_id" => "DE",
                "type"       => "state",
                "code"       => "BB"
            ],
            [
                "name"       => "Bremen",
                "country_id" => "DE",
                "type"       => "state",
                "code"       => "HB"
            ],
            [
                "name"       => "Hamburg",
                "country_id" => "DE",
                "type"       => "state",
                "code"       => "HH"
            ],
            [
                "name"       => "Hessen",
                "country_id" => "DE",
                "type"       => "state",
                "code"       => "HE"
            ],
            [
                "name"       => "Mecklenburg-Vorpommern",
                "country_id" => "DE",
                "type"       => "state",
                "code"       => "MV"
            ],
            [
                "name"       => "Niedersachsen",
                "country_id" => "DE",
                "type"       => "state",
                "code"       => "NI"
            ],
            [
                "name"       => "Nordrhein-Westfalen",
                "country_id" => "DE",
                "type"       => "state",
                "code"       => "NW"
            ],
            [
                "name"       => "Rheinland-Pfalz",
                "country_id" => "DE",
                "type"       => "state",
                "code"       => "RP"
            ],
            [
                "name"       => "Saarland",
                "country_id" => "DE",
                "type"       => "state",
                "code"       => "SL"
            ],
            [
                "name"       => "Sachsen",
                "country_id" => "DE",
                "type"       => "state",
                "code"       => "SN"
            ],
            [
                "name"       => "Sachsen-Anhalt",
                "country_id" => "DE",
                "type"       => "state",
                "code"       => "ST"
            ],
            [
                "name"       => "Schleswig-Holstein",
                "country_id" => "DE",
                "type"       => "state",
                "code"       => "SH"
            ],
            [
                "name"       => "Thüringen",
                "country_id" => "DE",
                "type"       => "state",
                "code"       => "TH"
            ]
        ]);
    }
}
