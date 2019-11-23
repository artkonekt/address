<?php
/**
 * Contains the StatesAndTerritoriesOfIndia class.
 *
 * @copyright   Copyright (c) 2019 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2019-08-10
 *
 */

namespace Konekt\Address\Seeds;

use Illuminate\Database\Seeder;
use Konekt\Address\Models\ProvinceType;

class StatesAndTerritoriesOfIndia extends Seeder
{
    public function run()
    {
        \DB::table('provinces')->insert([
            [
                "code"       => "AP",
                "name"       => "Andhra Pradesh",
                "country_id" => "IN",
                "type"       => ProvinceType::STATE
            ],
            [
                "code"       => "AR",
                "name"       => "Arunachal Pradesh",
                "country_id" => "IN",
                "type"       => ProvinceType::STATE
            ],
            [
                "code"       => "AS",
                "name"       => "Assam",
                "country_id" => "IN",
                "type"       => ProvinceType::STATE
            ],
            [
                "code"       => "BR",
                "name"       => "Bihar",
                "country_id" => "IN",
                "type"       => ProvinceType::STATE
            ],
            [
                "code"       => "CT",
                "name"       => "Chhattisgarh",
                "country_id" => "IN",
                "type"       => ProvinceType::STATE
            ],
            [
                "code"       => "GA",
                "name"       => "Goa",
                "country_id" => "IN",
                "type"       => ProvinceType::STATE
            ],
            [
                "code"       => "GJ",
                "name"       => "Gujarat",
                "country_id" => "IN",
                "type"       => ProvinceType::STATE
            ],
            [
                "code"       => "HR",
                "name"       => "Haryana",
                "country_id" => "IN",
                "type"       => ProvinceType::STATE
            ],
            [
                "code"       => "HP",
                "name"       => "Himachal Pradesh",
                "country_id" => "IN",
                "type"       => ProvinceType::STATE
            ],
            [
                "code"       => "JH",
                "name"       => "Jharkhand",
                "country_id" => "IN",
                "type"       => ProvinceType::STATE
            ],
            [
                "code"       => "KA",
                "name"       => "Karnataka",
                "country_id" => "IN",
                "type"       => ProvinceType::STATE
            ],
            [
                "code"       => "KL",
                "name"       => "Kerala",
                "country_id" => "IN",
                "type"       => ProvinceType::STATE
            ],
            [
                "code"       => "MP",
                "name"       => "Madhya Pradesh",
                "country_id" => "IN",
                "type"       => ProvinceType::STATE
            ],
            [
                "code"       => "MH",
                "name"       => "Maharashtra",
                "country_id" => "IN",
                "type"       => ProvinceType::STATE
            ],
            [
                "code"       => "MN",
                "name"       => "Manipur",
                "country_id" => "IN",
                "type"       => ProvinceType::STATE
            ],
            [
                "code"       => "ML",
                "name"       => "Meghalaya",
                "country_id" => "IN",
                "type"       => ProvinceType::STATE
            ],
            [
                "code"       => "MZ",
                "name"       => "Mizoram",
                "country_id" => "IN",
                "type"       => ProvinceType::STATE
            ],
            [
                "code"       => "NL",
                "name"       => "Nagaland",
                "country_id" => "IN",
                "type"       => ProvinceType::STATE
            ],
            [
                "code"       => "OR",
                "name"       => "Odisha",
                "country_id" => "IN",
                "type"       => ProvinceType::STATE
            ],
            [
                "code"       => "PB",
                "name"       => "Punjab",
                "country_id" => "IN",
                "type"       => ProvinceType::STATE
            ],
            [
                "code"       => "RJ",
                "name"       => "Rajasthan",
                "country_id" => "IN",
                "type"       => ProvinceType::STATE
            ],
            [
                "code"       => "SK",
                "name"       => "Sikkim",
                "country_id" => "IN",
                "type"       => ProvinceType::STATE
            ],
            [
                "code"       => "TN",
                "name"       => "Tamil Nadu",
                "country_id" => "IN",
                "type"       => ProvinceType::STATE
            ],
            [
                "code"       => "TG",
                "name"       => "Telangana",
                "country_id" => "IN",
                "type"       => ProvinceType::STATE
            ],
            [
                "code"       => "TR",
                "name"       => "Tripura",
                "country_id" => "IN",
                "type"       => ProvinceType::STATE
            ],
            [
                "code"       => "UP",
                "name"       => "Uttar Pradesh",
                "country_id" => "IN",
                "type"       => ProvinceType::STATE
            ],
            [
                "code"       => "UT",
                "name"       => "Uttarakhand",
                "country_id" => "IN",
                "type"       => ProvinceType::STATE
            ],
            [
                "code"       => "WB",
                "name"       => "West Bengal",
                "country_id" => "IN",
                "type"       => ProvinceType::STATE
            ],
            // Union Territories
            [
                "code"       => "AN",
                "name"       => "Andaman and Nicobar Islands",
                "country_id" => "IN",
                "type"       => ProvinceType::TERRITORY
            ],
            [
                "code"       => "CH",
                "name"       => "Chandigarh",
                "country_id" => "IN",
                "type"       => ProvinceType::TERRITORY
            ],
            [
                "code"       => "DN",
                "name"       => "Dadra and Nagar Haveli",
                "country_id" => "IN",
                "type"       => ProvinceType::TERRITORY
            ],
            [
                "code"       => "DD",
                "name"       => "Daman and Diu",
                "country_id" => "IN",
                "type"       => ProvinceType::TERRITORY
            ],
            [
                "code"       => "DL",
                "name"       => "Delhi",
                "country_id" => "IN",
                "type"       => ProvinceType::TERRITORY
            ],
            [
                "code"       => "JK",
                "name"       => "Jammu and Kashmir",
                "country_id" => "IN",
                "type"       => ProvinceType::TERRITORY
            ],
            [
                "code"       => "LA",
                "name"       => "Ladakh",
                "country_id" => "IN",
                "type"       => ProvinceType::TERRITORY
            ],
            [
                "code"       => "LD",
                "name"       => "Lakshadweep",
                "country_id" => "IN",
                "type"       => ProvinceType::TERRITORY
            ],
            [
                "code"       => "PY",
                "name"       => "Puducherry",
                "country_id" => "IN",
                "type"       => ProvinceType::TERRITORY
            ],
        ]);
    }
}
