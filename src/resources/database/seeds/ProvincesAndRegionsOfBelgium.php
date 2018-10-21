<?php
/**
 * Contains the db seeder with the provinces of the Belgium
 *
 * @copyright   Copyright (c) 2018 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2018-10-21
 *
 */

namespace Konekt\Address\Seeds;

use Illuminate\Database\Seeder;

class ProvincesAndRegionsOfBelgium extends Seeder
{
    public function run()
    {
        \DB::table('provinces')->insert([
            [
                "name"       => "Brussels",
                "country_id" => "BE",
                "type"       => "region",
                "code"       => "BRU"
            ],
            [
                "name"       => "Flanders",
                "country_id" => "BE",
                "type"       => "region",
                "code"       => "VLG"
            ],
            [
                "name"       => "Wallonia",
                "country_id" => "BE",
                "type"       => "region",
                "code"       => "WAL"
            ],
            [
                "name"       => "Antwerp",
                "country_id" => "BE",
                "type"       => "province",
                "code"       => "VAN"
            ],
            [
                "name"       => "East Flanders",
                "country_id" => "BE",
                "type"       => "province",
                "code"       => "VOV"
            ],
            [
                "name"       => "Flemish Brabant",
                "country_id" => "BE",
                "type"       => "province",
                "code"       => "VBR"
            ],
            [
                "name"       => "Limburg",
                "country_id" => "BE",
                "type"       => "province",
                "code"       => "VLI"
            ],
            [
                "name"       => "West Flanders",
                "country_id" => "BE",
                "type"       => "province",
                "code"       => "VWV"
            ],
            [
                "name"       => "Hainaut",
                "country_id" => "BE",
                "type"       => "province",
                "code"       => "WHT"
            ],
            [
                "name"       => "Liège",
                "country_id" => "BE",
                "type"       => "province",
                "code"       => "WLG"
            ],
            [
                "name"       => "Luxembourg",
                "country_id" => "BE",
                "type"       => "province",
                "code"       => "WLX"
            ],
            [
                "name"       => "Namur",
                "country_id" => "BE",
                "type"       => "province",
                "code"       => "WNA"
            ],
            [
                "name"       => "Walloon Brabant",
                "country_id" => "BE",
                "type"       => "province",
                "code"       => "WBR"
            ]
        ]);
    }
}
