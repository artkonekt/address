<?php
/**
 * Contains the ProvincesOfIndonesia class.
 *
 * @copyright   Copyright (c) 2019 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2019-08-11
 *
 */

namespace Konekt\Address\Seeds;

use Illuminate\Database\Seeder;

class ProvincesOfIndonesia extends Seeder
{
    public function run()
    {
        $this->createJavaWithProvinces();
        $this->createKalimantanWithProvinces();
        $this->createMalukuIslandsWithProvinces();
        $this->createPapuaWithProvinces();
        $this->createSulawesiWithProvinces();
        $this->createLesserSundaIslandsWithProvinces();
        $this->createSumatraWithProvinces();
    }

    private function createJavaWithProvinces()
    {
        $idOfJava = $this->createUnitAndReturnId('JW', 'Java');

        \DB::table('provinces')->insert(
            $this->getProvincesInsertArray(
                $idOfJava,
                [
                'BT' => 'Banten',
                'JB' => 'West Java',
                'JT' => 'Central Java',
                'JI' => 'East Java',
            ]
            )
        );

        \DB::table('provinces')->insert([
            [
                "name"       => "Jakarta",
                "country_id" => "ID",
                "parent_id"  => $idOfJava,
                "type"       => "region",
                "code"       => "JK"
            ],
            [
                "name"       => "Yogyakarta",
                "country_id" => "ID",
                "parent_id"  => $idOfJava,
                "type"       => "region",
                "code"       => "YO"
            ]
        ]);
    }

    private function createKalimantanWithProvinces()
    {
        \DB::table('provinces')->insert(
            $this->getProvincesInsertArray(
                $this->createUnitAndReturnId('KA', 'Kalimantan'),
                [
                    'KB' => 'West Kalimantan',
                    'KS' => 'South Kalimantan',
                    'KT' => 'Central Kalimantan',
                    'KI' => 'East Kalimantan',
                    'KU' => 'North Kalimantan'
                ]
            )
        );
    }

    private function createMalukuIslandsWithProvinces()
    {
        \DB::table('provinces')->insert(
            $this->getProvincesInsertArray(
                $this->createUnitAndReturnId('ML', 'Maluku Islands'),
                [
                    'MA' => 'Maluku',
                    'MU' => 'North Maluku'
                ]
            )
        );
    }

    private function createPapuaWithProvinces()
    {
        \DB::table('provinces')->insert(
            $this->getProvincesInsertArray(
                $this->createUnitAndReturnId('PP', 'Papua'),
                [
                    'PA' => 'Papua',
                    'PB' => 'West Papua'
                ]
            )
        );
    }

    private function createSulawesiWithProvinces()
    {
        \DB::table('provinces')->insert(
            $this->getProvincesInsertArray(
                $this->createUnitAndReturnId('SL', 'Sulawesi'),
                [
                'SN' => 'South Sulawesi',
                'ST' => 'Central Sulawesi',
                'SG' => 'Southeast Sulawesi',
                'SA' => 'North Sulawesi',
                'SR' => 'West Sulawesi',
                'GO' => 'Gorontalo',
            ]
            )
        );
    }

    private function createLesserSundaIslandsWithProvinces()
    {
        \DB::table('provinces')->insert(
            $this->getProvincesInsertArray(
                $this->createUnitAndReturnId('NU', 'Lesser Sunda Islands'),
                [
                'BA' => 'Bali',
                'NB' => 'West Nusa Tenggara',
                'NT' => 'East Nusa Tenggara'
            ]
            )
        );
    }

    private function createSumatraWithProvinces()
    {
        \DB::table('provinces')->insert(
            $this->getProvincesInsertArray(
                $this->createUnitAndReturnId('SM', 'Sumatra'),
                [
                'AC' => 'Aceh',
                'BB' => 'Bangka Belitung Islands',
                'BE' => 'Bengkulu',
                'JA' => 'Jambi',
                'LA' => 'Lampung',
                'RI' => 'Riau',
                'KR' => 'Riau Islands',
                'SB' => 'West Sumatra',
                'SS' => 'South Sumatra',
                'SU' => 'North Sumatra',
            ]
            )
        );
    }

    private function getProvincesInsertArray(int $parentId, array $provinces): array
    {
        $result = [];

        foreach ($provinces as $code => $name) {
            $result[] = [
                "name"       => $name,
                "code"       => $code,
                "country_id" => "ID",
                "parent_id"  => $parentId,
                "type"       => "province"
            ];
        }

        return $result;
    }

    private function createUnitAndReturnId(string $code, string $name): int
    {
        return \DB::table('provinces')->insertGetId([
            "name"       => $name,
            "country_id" => "ID",
            "type"       => "unit",
            "code"       => $code
        ]);
    }
}
