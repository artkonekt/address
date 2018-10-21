<?php
/**
 * Contains the db seeder with the provinces of the Netherlands
 *
 * @copyright   Copyright (c) 2018 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2018-10-21
 *
 */

namespace Konekt\Address\Seeds;

use Illuminate\Database\Seeder;

class ProvincesOfNetherlands extends Seeder
{
    public function run()
    {
        \DB::table('provinces')->insert([
            [
                "name"       => "Drenthe",
                "country_id" => "NL",
                "type"       => "province",
                "code"       => "DR"
            ],
            [
                "name"       => "Flevoland",
                "country_id" => "NL",
                "type"       => "province",
                "code"       => "FL"
            ],
            [
                "name"       => "Friesland",
                "country_id" => "NL",
                "type"       => "province",
                "code"       => "FR"
            ],
            [
                "name"       => "Gelderland",
                "country_id" => "NL",
                "type"       => "province",
                "code"       => "GE"
            ],
            [
                "name"       => "Groningen",
                "country_id" => "NL",
                "type"       => "province",
                "code"       => "GR"
            ],
            [
                "name"       => "Limburg",
                "country_id" => "NL",
                "type"       => "province",
                "code"       => "LI"
            ],
            [
                "name"       => "Noord-Brabant",
                "country_id" => "NL",
                "type"       => "province",
                "code"       => "NB"
            ],
            [
                "name"       => "Noord-Holland",
                "country_id" => "NL",
                "type"       => "province",
                "code"       => "NH"
            ],
            [
                "name"       => "Overijssel",
                "country_id" => "NL",
                "type"       => "province",
                "code"       => "OV"
            ],
            [
                "name"       => "Utrecht",
                "country_id" => "NL",
                "type"       => "province",
                "code"       => "UT"
            ],
            [
                "name"       => "Zeeland",
                "country_id" => "NL",
                "type"       => "province",
                "code"       => "ZE"
            ],
            [
                "name"       => "Zuid-Holland",
                "country_id" => "NL",
                "type"       => "province",
                "code"       => "ZH"
            ]
        ]);
    }
}
