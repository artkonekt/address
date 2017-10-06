<?php
/**
 * Contains the db seeder with the states of USA
 *
 * @copyright   Copyright (c) 2016 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2016-12-03
 *
 */

namespace Konekt\Address\Seeds;

use Illuminate\Database\Seeder;
use Konekt\Address\Models\ProvinceType;

class StatesOfUsa extends Seeder
{

    /**
     * Inserts the states of USA into the provinces table
     *
     * @return void
     */
    public function run()
    {
        \DB::table('provinces')->insert([
                [
                    "code"       => "AL",
                    "name"       => "Alabama",
                    "country_id" => "US",
                    "type"       => "state"
                ],
                [
                    "code"       => "AK",
                    "name"       => "Alaska",
                    "country_id" => "US",
                    "type"       => "state"
                ],
                [
                    "code"       => "AZ",
                    "name"       => "Arizona",
                    "country_id" => "US",
                    "type"       => "state"
                ],
                [
                    "code"       => "AR",
                    "name"       => "Arkansas",
                    "country_id" => "US",
                    "type"       => "state"
                ],
                [
                    "code"       => "CA",
                    "name"       => "California",
                    "country_id" => "US",
                    "type"       => "state"
                ],
                [
                    "code"       => "CO",
                    "name"       => "Colorado",
                    "country_id" => "US",
                    "type"       => "state"
                ],
                [
                    "code"       => "CT",
                    "name"       => "Connecticut",
                    "country_id" => "US",
                    "type"       => "state"
                ],
                [
                    "code"       => "DE",
                    "name"       => "Delaware",
                    "country_id" => "US",
                    "type"       => "state"
                ],
                [
                    "code"       => "FL",
                    "name"       => "Florida",
                    "country_id" => "US",
                    "type"       => "state"
                ],
                [
                    "code"       => "GA",
                    "name"       => "Georgia",
                    "country_id" => "US",
                    "type"       => "state"
                ],
                [
                    "code"       => "HI",
                    "name"       => "Hawaii",
                    "country_id" => "US",
                    "type"       => "state"
                ],
                [
                    "code"       => "ID",
                    "name"       => "Idaho",
                    "country_id" => "US",
                    "type"       => "state"
                ],
                [
                    "code"       => "IL",
                    "name"       => "Illinois",
                    "country_id" => "US",
                    "type"       => "state"
                ],
                [
                    "code"       => "IN",
                    "name"       => "Indiana",
                    "country_id" => "US",
                    "type"       => "state"
                ],
                [
                    "code"       => "IA",
                    "name"       => "Iowa",
                    "country_id" => "US",
                    "type"       => "state"
                ],
                [
                    "code"       => "KS",
                    "name"       => "Kansas",
                    "country_id" => "US",
                    "type"       => "state"
                ],
                [
                    "code"       => "KY",
                    "name"       => "Kentucky",
                    "country_id" => "US",
                    "type"       => "state"
                ],
                [
                    "code"       => "LA",
                    "name"       => "Louisiana",
                    "country_id" => "US",
                    "type"       => "state"
                ],
                [
                    "code"       => "ME",
                    "name"       => "Maine",
                    "country_id" => "US",
                    "type"       => "state"
                ],
                [
                    "code"       => "MD",
                    "name"       => "Maryland",
                    "country_id" => "US",
                    "type"       => "state"
                ],
                [
                    "code"       => "MA",
                    "name"       => "Massachusetts",
                    "country_id" => "US",
                    "type"       => "state"
                ],
                [
                    "code"       => "MI",
                    "name"       => "Michigan",
                    "country_id" => "US",
                    "type"       => "state"
                ],
                [
                    "code"       => "MN",
                    "name"       => "Minnesota",
                    "country_id" => "US",
                    "type"       => "state"
                ],
                [
                    "code"       => "MS",
                    "name"       => "Mississippi",
                    "country_id" => "US",
                    "type"       => "state"
                ],
                [
                    "code"       => "MO",
                    "name"       => "Missouri",
                    "country_id" => "US",
                    "type"       => "state"
                ],
                [
                    "code"       => "MT",
                    "name"       => "Montana",
                    "country_id" => "US",
                    "type"       => "state"
                ],
                [
                    "code"       => "NE",
                    "name"       => "Nebraska",
                    "country_id" => "US",
                    "type"       => "state"
                ],
                [
                    "code"       => "NV",
                    "name"       => "Nevada",
                    "country_id" => "US",
                    "type"       => "state"
                ],
                [
                    "code"       => "NH",
                    "name"       => "New Hampshire",
                    "country_id" => "US",
                    "type"       => "state"
                ],
                [
                    "code"       => "NJ",
                    "name"       => "New Jersey",
                    "country_id" => "US",
                    "type"       => "state"
                ],
                [
                    "code"       => "NM",
                    "name"       => "New Mexico",
                    "country_id" => "US",
                    "type"       => "state"
                ],
                [
                    "code"       => "NY",
                    "name"       => "New York",
                    "country_id" => "US",
                    "type"       => "state"
                ],
                [
                    "code"       => "NC",
                    "name"       => "North Carolina",
                    "country_id" => "US",
                    "type"       => "state"
                ],
                [
                    "code"       => "ND",
                    "name"       => "North Dakota",
                    "country_id" => "US",
                    "type"       => "state"
                ],
                [
                    "code"       => "OH",
                    "name"       => "Ohio",
                    "country_id" => "US",
                    "type"       => "state"
                ],
                [
                    "code"       => "OK",
                    "name"       => "Oklahoma",
                    "country_id" => "US",
                    "type"       => "state"
                ],
                [
                    "code"       => "OR",
                    "name"       => "Oregon",
                    "country_id" => "US",
                    "type"       => "state"
                ],
                [
                    "code"       => "PA",
                    "name"       => "Pennsylvania",
                    "country_id" => "US",
                    "type"       => "state"
                ],
                [
                    "code"       => "RI",
                    "name"       => "Rhode Island",
                    "country_id" => "US",
                    "type"       => "state"
                ],
                [
                    "code"       => "SC",
                    "name"       => "South Carolina",
                    "country_id" => "US",
                    "type"       => "state"
                ],
                [
                    "code"       => "SD",
                    "name"       => "South Dakota",
                    "country_id" => "US",
                    "type"       => "state"
                ],
                [
                    "code"       => "TN",
                    "name"       => "Tennessee",
                    "country_id" => "US",
                    "type"       => "state"
                ],
                [
                    "code"       => "TX",
                    "name"       => "Texas",
                    "country_id" => "US",
                    "type"       => "state"
                ],
                [
                    "code"       => "UT",
                    "name"       => "Utah",
                    "country_id" => "US",
                    "type"       => "state"
                ],
                [
                    "code"       => "VT",
                    "name"       => "Vermont",
                    "country_id" => "US",
                    "type"       => "state"
                ],
                [
                    "code"       => "VA",
                    "name"       => "Virginia",
                    "country_id" => "US",
                    "type"       => "state"
                ],
                [
                    "code"       => "WA",
                    "name"       => "Washington",
                    "country_id" => "US",
                    "type"       => "state"
                ],
                [
                    "code"       => "WV",
                    "name"       => "West Virginia",
                    "country_id" => "US",
                    "type"       => "state"
                ],
                [
                    "code"       => "WI",
                    "name"       => "Wisconsin",
                    "country_id" => "US",
                    "type"       => "state"
                ],
                [
                    "code"       => "WY",
                    "name"       => "Wyoming",
                    "country_id" => "US",
                    "type"       => "state"
                ],
                // -- END OF STATES
                [
                    "code"       => "DC",
                    "name"       => "District of Columbia",
                    "country_id" => "US",
                    "type"       => ProvinceType::FEDERAL_DISTRICT
                ],
                [
                    "code"       => "AS",
                    "name"       => "American Samoa",
                    "country_id" => "US",
                    "type"       => ProvinceType::TERRITORY
                ],
                [
                    "code"       => "GU",
                    "name"       => "Guam",
                    "country_id" => "US",
                    "type"       => ProvinceType::TERRITORY
                ],
                [
                    "code"       => "MP",
                    "name"       => "Northern Mariana Islands",
                    "country_id" => "US",
                    "type"       => ProvinceType::TERRITORY
                ],
                [
                    "code"       => "PR",
                    "name"       => "Puerto Rico",
                    "country_id" => "US",
                    "type"       => ProvinceType::TERRITORY
                ],
                [
                    "code"       => "VI",
                    "name"       => "Virgin Islands",
                    "country_id" => "US",
                    "type"       => ProvinceType::TERRITORY
                ],
                [
                    "code"       => "AA",
                    "name"       => "Armed Forces Americas (except Canada)",
                    "country_id" => "US",
                    "type"       => ProvinceType::MILITARY
                ],
                [
                    "code"       => "AE",
                    "name"       => "Armed Forces Europe, the Middle East, and Canada",
                    "country_id" => "US",
                    "type"       => ProvinceType::MILITARY
                ],
                [
                    "code"       => "AP",
                    "name"       => "Armed Forces Pacific",
                    "country_id" => "US",
                    "type"       => ProvinceType::MILITARY
                ]
            ]

        );
    }
}
