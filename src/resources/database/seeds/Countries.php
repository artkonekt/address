<?php

declare(strict_types=1);

/**
 * Contains the db seeder with all the countries of the world
 *
 * @copyright   Copyright (c) 2016 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2016-12-03
 *
 */

namespace Konekt\Address\Seeds;

use Illuminate\Database\Seeder;

class Countries extends Seeder
{
    /**
     * Empties the countries table and then inserts all the countries of the world into it
     *
     * @return void
     */
    public function run(): void
    {
        \DB::table('countries')->delete();

        foreach (array_chunk(self::all(), 50, true) as $countries) {
            \DB::table('countries')->insert(
                array_map(
                    fn ($record, $id) => array_merge($record, ['id' => $id]),
                    $countries,
                    array_keys($countries),
                ),
            );
        }
    }

    /**
     * @return null|array<string,array{name: string, phonecode: int, is_eu_member: bool}>
     */
    public static function byCode(string $code): ?array
    {
        $code = strtoupper($code);
        $country = self::all()[$code] ?? null;

        return $country ? array_merge($country, ['id' => $code]) : null;
    }

    public static function all(): array
    {
        return [
            'AF' => [
                'name' => 'Afghanistan',
                'phonecode' => 93,
                'is_eu_member' => 0
            ],
            'AL' => [
                'name' => 'Albania',
                'phonecode' => 355,
                'is_eu_member' => 0
            ],
            'DZ' => [
                'name' => 'Algeria',
                'phonecode' => 213,
                'is_eu_member' => 0
            ],
            'AS' => [
                'name' => 'American Samoa',
                'phonecode' => 1684,
                'is_eu_member' => 0
            ],
            'AD' => [
                'name' => 'Andorra',
                'phonecode' => 376,
                'is_eu_member' => 0
            ],
            'AO' => [
                'name' => 'Angola',
                'phonecode' => 244,
                'is_eu_member' => 0
            ],
            'AI' => [
                'name' => 'Anguilla',
                'phonecode' => 1264,
                'is_eu_member' => 0
            ],
            'AQ' => [
                'name' => 'Antarctica',
                'phonecode' => 0,
                'is_eu_member' => 0
            ],
            'AG' => [
                'name' => 'Antigua and Barbuda',
                'phonecode' => 1268,
                'is_eu_member' => 0
            ],
            'AR' => [
                'name' => 'Argentina',
                'phonecode' => 54,
                'is_eu_member' => 0
            ],
            'AM' => [
                'name' => 'Armenia',
                'phonecode' => 374,
                'is_eu_member' => 0
            ],
            'AW' => [
                'name' => 'Aruba',
                'phonecode' => 297,
                'is_eu_member' => 0
            ],
            'AU' => [
                'name' => 'Australia',
                'phonecode' => 61,
                'is_eu_member' => 0
            ],
            'AT' => [
                'name' => 'Austria',
                'phonecode' => 43,
                'is_eu_member' => 1
            ],
            'AZ' => [
                'name' => 'Azerbaijan',
                'phonecode' => 994,
                'is_eu_member' => 0
            ],
            'BS' => [
                'name' => 'Bahamas',
                'phonecode' => 1242,
                'is_eu_member' => 0
            ],
            'BH' => [
                'name' => 'Bahrain',
                'phonecode' => 973,
                'is_eu_member' => 0
            ],
            'BD' => [
                'name' => 'Bangladesh',
                'phonecode' => 880,
                'is_eu_member' => 0
            ],
            'BB' => [
                'name' => 'Barbados',
                'phonecode' => 1246,
                'is_eu_member' => 0
            ],
            'BY' => [
                'name' => 'Belarus',
                'phonecode' => 375,
                'is_eu_member' => 0
            ],
            'BE' => [
                'name' => 'Belgium',
                'phonecode' => 32,
                'is_eu_member' => 1
            ],
            'BZ' => [
                'name' => 'Belize',
                'phonecode' => 501,
                'is_eu_member' => 0
            ],
            'BJ' => [
                'name' => 'Benin',
                'phonecode' => 229,
                'is_eu_member' => 0
            ],
            'BM' => [
                'name' => 'Bermuda',
                'phonecode' => 1441,
                'is_eu_member' => 0
            ],
            'BT' => [
                'name' => 'Bhutan',
                'phonecode' => 975,
                'is_eu_member' => 0
            ],
            'BO' => [
                'name' => 'Bolivia',
                'phonecode' => 591,
                'is_eu_member' => 0
            ],
            'BA' => [
                'name' => 'Bosnia and Herzegovina',
                'phonecode' => 387,
                'is_eu_member' => 0
            ],
            'BW' => [
                'name' => 'Botswana',
                'phonecode' => 267,
                'is_eu_member' => 0
            ],
            'BV' => [
                'name' => 'Bouvet Island',
                'phonecode' => 0,
                'is_eu_member' => 0
            ],
            'BR' => [
                'name' => 'Brazil',
                'phonecode' => 55,
                'is_eu_member' => 0
            ],
            'IO' => [
                'name' => 'British Indian Ocean Territory',
                'phonecode' => 246,
                'is_eu_member' => 0
            ],
            'BN' => [
                'name' => 'Brunei Darussalam',
                'phonecode' => 673,
                'is_eu_member' => 0
            ],
            'BG' => [
                'name' => 'Bulgaria',
                'phonecode' => 359,
                'is_eu_member' => 1
            ],
            'BF' => [
                'name' => 'Burkina Faso',
                'phonecode' => 226,
                'is_eu_member' => 0
            ],
            'BI' => [
                'name' => 'Burundi',
                'phonecode' => 257,
                'is_eu_member' => 0
            ],
            'KH' => [
                'name' => 'Cambodia',
                'phonecode' => 855,
                'is_eu_member' => 0
            ],
            'CM' => [
                'name' => 'Cameroon',
                'phonecode' => 237,
                'is_eu_member' => 0
            ],
            'CA' => [
                'name' => 'Canada',
                'phonecode' => 1,
                'is_eu_member' => 0
            ],
            'CV' => [
                'name' => 'Cape Verde',
                'phonecode' => 238,
                'is_eu_member' => 0
            ],
            'KY' => [
                'name' => 'Cayman Islands',
                'phonecode' => 1345,
                'is_eu_member' => 0
            ],
            'CF' => [
                'name' => 'Central African Republic',
                'phonecode' => 236,
                'is_eu_member' => 0
            ],
            'TD' => [
                'name' => 'Chad',
                'phonecode' => 235,
                'is_eu_member' => 0
            ],
            'CL' => [
                'name' => 'Chile',
                'phonecode' => 56,
                'is_eu_member' => 0
            ],
            'CN' => [
                'name' => 'China',
                'phonecode' => 86,
                'is_eu_member' => 0
            ],
            'CX' => [
                'name' => 'Christmas Island',
                'phonecode' => 61,
                'is_eu_member' => 0
            ],
            'CC' => [
                'name' => 'Cocos (Keeling) Islands',
                'phonecode' => 672,
                'is_eu_member' => 0
            ],
            'CO' => [
                'name' => 'Colombia',
                'phonecode' => 57,
                'is_eu_member' => 0
            ],
            'KM' => [
                'name' => 'Comoros',
                'phonecode' => 269,
                'is_eu_member' => 0
            ],
            'CG' => [
                'name' => 'Congo',
                'phonecode' => 242,
                'is_eu_member' => 0
            ],
            'CD' => [
                'name' => 'Congo, the Democratic Republic of the',
                'phonecode' => 243,
                'is_eu_member' => 0
            ],
            'CK' => [
                'name' => 'Cook Islands',
                'phonecode' => 682,
                'is_eu_member' => 0
            ],
            'CR' => [
                'name' => 'Costa Rica',
                'phonecode' => 506,
                'is_eu_member' => 0
            ],
            'CI' => [
                'name' => 'Cote D\'Ivoire',
                'phonecode' => 225,
                'is_eu_member' => 0
            ],
            'HR' => [
                'name' => 'Croatia',
                'phonecode' => 385,
                'is_eu_member' => 1
            ],
            'CU' => [
                'name' => 'Cuba',
                'phonecode' => 53,
                'is_eu_member' => 0
            ],
            'CY' => [
                'name' => 'Cyprus',
                'phonecode' => 357,
                'is_eu_member' => 1
            ],
            'CZ' => [
                'name' => 'Czech Republic',
                'phonecode' => 420,
                'is_eu_member' => 1
            ],
            'DK' => [
                'name' => 'Denmark',
                'phonecode' => 45,
                'is_eu_member' => 1
            ],
            'DJ' => [
                'name' => 'Djibouti',
                'phonecode' => 253,
                'is_eu_member' => 0
            ],
            'DM' => [
                'name' => 'Dominica',
                'phonecode' => 1767,
                'is_eu_member' => 0
            ],
            'DO' => [
                'name' => 'Dominican Republic',
                'phonecode' => 1809,
                'is_eu_member' => 0
            ],
            'EC' => [
                'name' => 'Ecuador',
                'phonecode' => 593,
                'is_eu_member' => 0
            ],
            'EG' => [
                'name' => 'Egypt',
                'phonecode' => 20,
                'is_eu_member' => 0
            ],
            'SV' => [
                'name' => 'El Salvador',
                'phonecode' => 503,
                'is_eu_member' => 0
            ],
            'GQ' => [
                'name' => 'Equatorial Guinea',
                'phonecode' => 240,
                'is_eu_member' => 0
            ],
            'ER' => [
                'name' => 'Eritrea',
                'phonecode' => 291,
                'is_eu_member' => 0
            ],
            'EE' => [
                'name' => 'Estonia',
                'phonecode' => 372,
                'is_eu_member' => 1
            ],
            'ET' => [
                'name' => 'Ethiopia',
                'phonecode' => 251,
                'is_eu_member' => 0
            ],
            'FK' => [
                'name' => 'Falkland Islands (Malvinas)',
                'phonecode' => 500,
                'is_eu_member' => 0
            ],
            'FO' => [
                'name' => 'Faroe Islands',
                'phonecode' => 298,
                'is_eu_member' => 0
            ],
            'FJ' => [
                'name' => 'Fiji',
                'phonecode' => 679,
                'is_eu_member' => 0
            ],
            'FI' => [
                'name' => 'Finland',
                'phonecode' => 358,
                'is_eu_member' => 1
            ],
            'FR' => [
                'name' => 'France',
                'phonecode' => 33,
                'is_eu_member' => 1
            ],
            'GF' => [
                'name' => 'French Guiana',
                'phonecode' => 594,
                'is_eu_member' => 0
            ],
            'PF' => [
                'name' => 'French Polynesia',
                'phonecode' => 689,
                'is_eu_member' => 0
            ],
            'TF' => [
                'name' => 'French Southern Territories',
                'phonecode' => 0,
                'is_eu_member' => 0
            ],
            'GA' => [
                'name' => 'Gabon',
                'phonecode' => 241,
                'is_eu_member' => 0
            ],
            'GM' => [
                'name' => 'Gambia',
                'phonecode' => 220,
                'is_eu_member' => 0
            ],
            'GE' => [
                'name' => 'Georgia',
                'phonecode' => 995,
                'is_eu_member' => 0
            ],
            'DE' => [
                'name' => 'Germany',
                'phonecode' => 49,
                'is_eu_member' => 1
            ],
            'GH' => [
                'name' => 'Ghana',
                'phonecode' => 233,
                'is_eu_member' => 0
            ],
            'GI' => [
                'name' => 'Gibraltar',
                'phonecode' => 350,
                'is_eu_member' => 0
            ],
            'GR' => [
                'name' => 'Greece',
                'phonecode' => 30,
                'is_eu_member' => 1
            ],
            'GL' => [
                'name' => 'Greenland',
                'phonecode' => 299,
                'is_eu_member' => 0
            ],
            'GD' => [
                'name' => 'Grenada',
                'phonecode' => 1473,
                'is_eu_member' => 0
            ],
            'GP' => [
                'name' => 'Guadeloupe',
                'phonecode' => 590,
                'is_eu_member' => 0
            ],
            'GU' => [
                'name' => 'Guam',
                'phonecode' => 1671,
                'is_eu_member' => 0
            ],
            'GT' => [
                'name' => 'Guatemala',
                'phonecode' => 502,
                'is_eu_member' => 0
            ],
            'GN' => [
                'name' => 'Guinea',
                'phonecode' => 224,
                'is_eu_member' => 0
            ],
            'GW' => [
                'name' => 'Guinea-Bissau',
                'phonecode' => 245,
                'is_eu_member' => 0
            ],
            'GY' => [
                'name' => 'Guyana',
                'phonecode' => 592,
                'is_eu_member' => 0
            ],
            'HT' => [
                'name' => 'Haiti',
                'phonecode' => 509,
                'is_eu_member' => 0
            ],
            'HM' => [
                'name' => 'Heard Island and Mcdonald Islands',
                'phonecode' => 0,
                'is_eu_member' => 0
            ],
            'VA' => [
                'name' => 'Holy See (Vatican City State)',
                'phonecode' => 39,
                'is_eu_member' => 0
            ],
            'HN' => [
                'name' => 'Honduras',
                'phonecode' => 504,
                'is_eu_member' => 0
            ],
            'HK' => [
                'name' => 'Hong Kong',
                'phonecode' => 852,
                'is_eu_member' => 0
            ],
            'HU' => [
                'name' => 'Hungary',
                'phonecode' => 36,
                'is_eu_member' => 1
            ],
            'IS' => [
                'name' => 'Iceland',
                'phonecode' => 354,
                'is_eu_member' => 0
            ],
            'IN' => [
                'name' => 'India',
                'phonecode' => 91,
                'is_eu_member' => 0
            ],
            'ID' => [
                'name' => 'Indonesia',
                'phonecode' => 62,
                'is_eu_member' => 0
            ],
            'IR' => [
                'name' => 'Iran, Islamic Republic of',
                'phonecode' => 98,
                'is_eu_member' => 0
            ],
            'IQ' => [
                'name' => 'Iraq',
                'phonecode' => 964,
                'is_eu_member' => 0
            ],
            'IE' => [
                'name' => 'Ireland',
                'phonecode' => 353,
                'is_eu_member' => 1
            ],
            'IL' => [
                'name' => 'Israel',
                'phonecode' => 972,
                'is_eu_member' => 0
            ],
            'IT' => [
                'name' => 'Italy',
                'phonecode' => 39,
                'is_eu_member' => 1
            ],
            'JM' => [
                'name' => 'Jamaica',
                'phonecode' => 1876,
                'is_eu_member' => 0
            ],
            'JP' => [
                'name' => 'Japan',
                'phonecode' => 81,
                'is_eu_member' => 0
            ],
            'JO' => [
                'name' => 'Jordan',
                'phonecode' => 962,
                'is_eu_member' => 0
            ],
            'KZ' => [
                'name' => 'Kazakhstan',
                'phonecode' => 7,
                'is_eu_member' => 0
            ],
            'KE' => [
                'name' => 'Kenya',
                'phonecode' => 254,
                'is_eu_member' => 0
            ],
            'KI' => [
                'name' => 'Kiribati',
                'phonecode' => 686,
                'is_eu_member' => 0
            ],
            'KP' => [
                'name' => 'Korea, Democratic People\'s Republic of',
                'phonecode' => 850,
                'is_eu_member' => 0
            ],
            'KR' => [
                'name' => 'Korea, Republic of',
                'phonecode' => 82,
                'is_eu_member' => 0
            ],
            'KW' => [
                'name' => 'Kuwait',
                'phonecode' => 965,
                'is_eu_member' => 0
            ],
            'KG' => [
                'name' => 'Kyrgyzstan',
                'phonecode' => 996,
                'is_eu_member' => 0
            ],
            'LA' => [
                'name' => 'Lao People\'s Democratic Republic',
                'phonecode' => 856,
                'is_eu_member' => 0
            ],
            'LV' => [
                'name' => 'Latvia',
                'phonecode' => 371,
                'is_eu_member' => 1
            ],
            'LB' => [
                'name' => 'Lebanon',
                'phonecode' => 961,
                'is_eu_member' => 0
            ],
            'LS' => [
                'name' => 'Lesotho',
                'phonecode' => 266,
                'is_eu_member' => 0
            ],
            'LR' => [
                'name' => 'Liberia',
                'phonecode' => 231,
                'is_eu_member' => 0
            ],
            'LY' => [
                'name' => 'Libyan Arab Jamahiriya',
                'phonecode' => 218,
                'is_eu_member' => 0
            ],
            'LI' => [
                'name' => 'Liechtenstein',
                'phonecode' => 423,
                'is_eu_member' => 0
            ],
            'LT' => [
                'name' => 'Lithuania',
                'phonecode' => 370,
                'is_eu_member' => 1
            ],
            'LU' => [
                'name' => 'Luxembourg',
                'phonecode' => 352,
                'is_eu_member' => 1
            ],
            'MO' => [
                'name' => 'Macao',
                'phonecode' => 853,
                'is_eu_member' => 0
            ],
            'MK' => [
                'name' => 'North Macedonia',
                'phonecode' => 389,
                'is_eu_member' => 0
            ],
            'MG' => [
                'name' => 'Madagascar',
                'phonecode' => 261,
                'is_eu_member' => 0
            ],
            'MW' => [
                'name' => 'Malawi',
                'phonecode' => 265,
                'is_eu_member' => 0
            ],
            'MY' => [
                'name' => 'Malaysia',
                'phonecode' => 60,
                'is_eu_member' => 0
            ],
            'MV' => [
                'name' => 'Maldives',
                'phonecode' => 960,
                'is_eu_member' => 0
            ],
            'ML' => [
                'name' => 'Mali',
                'phonecode' => 223,
                'is_eu_member' => 0
            ],
            'MT' => [
                'name' => 'Malta',
                'phonecode' => 356,
                'is_eu_member' => 1
            ],
            'MH' => [
                'name' => 'Marshall Islands',
                'phonecode' => 692,
                'is_eu_member' => 0
            ],
            'MQ' => [
                'name' => 'Martinique',
                'phonecode' => 596,
                'is_eu_member' => 0
            ],
            'MR' => [
                'name' => 'Mauritania',
                'phonecode' => 222,
                'is_eu_member' => 0
            ],
            'MU' => [
                'name' => 'Mauritius',
                'phonecode' => 230,
                'is_eu_member' => 0
            ],
            'YT' => [
                'name' => 'Mayotte',
                'phonecode' => 269,
                'is_eu_member' => 0
            ],
            'MX' => [
                'name' => 'Mexico',
                'phonecode' => 52,
                'is_eu_member' => 0
            ],
            'FM' => [
                'name' => 'Micronesia, Federated States of',
                'phonecode' => 691,
                'is_eu_member' => 0
            ],
            'MD' => [
                'name' => 'Moldova, Republic of',
                'phonecode' => 373,
                'is_eu_member' => 0
            ],
            'MC' => [
                'name' => 'Monaco',
                'phonecode' => 377,
                'is_eu_member' => 0
            ],
            'MN' => [
                'name' => 'Mongolia',
                'phonecode' => 976,
                'is_eu_member' => 0
            ],
            'MS' => [
                'name' => 'Montserrat',
                'phonecode' => 1664,
                'is_eu_member' => 0
            ],
            'MA' => [
                'name' => 'Morocco',
                'phonecode' => 212,
                'is_eu_member' => 0
            ],
            'MZ' => [
                'name' => 'Mozambique',
                'phonecode' => 258,
                'is_eu_member' => 0
            ],
            'MM' => [
                'name' => 'Myanmar',
                'phonecode' => 95,
                'is_eu_member' => 0
            ],
            'NA' => [
                'name' => 'Namibia',
                'phonecode' => 264,
                'is_eu_member' => 0
            ],
            'NR' => [
                'name' => 'Nauru',
                'phonecode' => 674,
                'is_eu_member' => 0
            ],
            'NP' => [
                'name' => 'Nepal',
                'phonecode' => 977,
                'is_eu_member' => 0
            ],
            'NL' => [
                'name' => 'Netherlands',
                'phonecode' => 31,
                'is_eu_member' => 1
            ],
            'AN' => [
                'name' => 'Netherlands Antilles',
                'phonecode' => 599,
                'is_eu_member' => 0
            ],
            'NC' => [
                'name' => 'New Caledonia',
                'phonecode' => 687,
                'is_eu_member' => 0
            ],
            'NZ' => [
                'name' => 'New Zealand',
                'phonecode' => 64,
                'is_eu_member' => 0
            ],
            'NI' => [
                'name' => 'Nicaragua',
                'phonecode' => 505,
                'is_eu_member' => 0
            ],
            'NE' => [
                'name' => 'Niger',
                'phonecode' => 227,
                'is_eu_member' => 0
            ],
            'NG' => [
                'name' => 'Nigeria',
                'phonecode' => 234,
                'is_eu_member' => 0
            ],
            'NU' => [
                'name' => 'Niue',
                'phonecode' => 683,
                'is_eu_member' => 0
            ],
            'NF' => [
                'name' => 'Norfolk Island',
                'phonecode' => 672,
                'is_eu_member' => 0
            ],
            'MP' => [
                'name' => 'Northern Mariana Islands',
                'phonecode' => 1670,
                'is_eu_member' => 0
            ],
            'NO' => [
                'name' => 'Norway',
                'phonecode' => 47,
                'is_eu_member' => 0
            ],
            'OM' => [
                'name' => 'Oman',
                'phonecode' => 968,
                'is_eu_member' => 0
            ],
            'PK' => [
                'name' => 'Pakistan',
                'phonecode' => 92,
                'is_eu_member' => 0
            ],
            'PW' => [
                'name' => 'Palau',
                'phonecode' => 680,
                'is_eu_member' => 0
            ],
            'PS' => [
                'name' => 'Palestinian Territory, Occupied',
                'phonecode' => 970,
                'is_eu_member' => 0
            ],
            'PA' => [
                'name' => 'Panama',
                'phonecode' => 507,
                'is_eu_member' => 0
            ],
            'PG' => [
                'name' => 'Papua New Guinea',
                'phonecode' => 675,
                'is_eu_member' => 0
            ],
            'PY' => [
                'name' => 'Paraguay',
                'phonecode' => 595,
                'is_eu_member' => 0
            ],
            'PE' => [
                'name' => 'Peru',
                'phonecode' => 51,
                'is_eu_member' => 0
            ],
            'PH' => [
                'name' => 'Philippines',
                'phonecode' => 63,
                'is_eu_member' => 0
            ],
            'PN' => [
                'name' => 'Pitcairn',
                'phonecode' => 0,
                'is_eu_member' => 0
            ],
            'PL' => [
                'name' => 'Poland',
                'phonecode' => 48,
                'is_eu_member' => 1
            ],
            'PT' => [
                'name' => 'Portugal',
                'phonecode' => 351,
                'is_eu_member' => 1
            ],
            'PR' => [
                'name' => 'Puerto Rico',
                'phonecode' => 1787,
                'is_eu_member' => 0
            ],
            'QA' => [
                'name' => 'Qatar',
                'phonecode' => 974,
                'is_eu_member' => 0
            ],
            'RE' => [
                'name' => 'Reunion',
                'phonecode' => 262,
                'is_eu_member' => 0
            ],
            'RO' => [
                'name' => 'Romania',
                'phonecode' => 40,
                'is_eu_member' => 1
            ],
            'RU' => [
                'name' => 'Russian Federation',
                'phonecode' => 7,
                'is_eu_member' => 0
            ],
            'RW' => [
                'name' => 'Rwanda',
                'phonecode' => 250,
                'is_eu_member' => 0
            ],
            'SH' => [
                'name' => 'Saint Helena',
                'phonecode' => 290,
                'is_eu_member' => 0
            ],
            'KN' => [
                'name' => 'Saint Kitts and Nevis',
                'phonecode' => 1869,
                'is_eu_member' => 0
            ],
            'LC' => [
                'name' => 'Saint Lucia',
                'phonecode' => 1758,
                'is_eu_member' => 0
            ],
            'PM' => [
                'name' => 'Saint Pierre and Miquelon',
                'phonecode' => 508,
                'is_eu_member' => 0
            ],
            'VC' => [
                'name' => 'Saint Vincent and the Grenadines',
                'phonecode' => 1784,
                'is_eu_member' => 0
            ],
            'WS' => [
                'name' => 'Samoa',
                'phonecode' => 684,
                'is_eu_member' => 0
            ],
            'SM' => [
                'name' => 'San Marino',
                'phonecode' => 378,
                'is_eu_member' => 0
            ],
            'ST' => [
                'name' => 'Sao Tome and Principe',
                'phonecode' => 239,
                'is_eu_member' => 0
            ],
            'SA' => [
                'name' => 'Saudi Arabia',
                'phonecode' => 966,
                'is_eu_member' => 0
            ],
            'SN' => [
                'name' => 'Senegal',
                'phonecode' => 221,
                'is_eu_member' => 0
            ],
            'SC' => [
                'name' => 'Seychelles',
                'phonecode' => 248,
                'is_eu_member' => 0
            ],
            'SL' => [
                'name' => 'Sierra Leone',
                'phonecode' => 232,
                'is_eu_member' => 0
            ],
            'SG' => [
                'name' => 'Singapore',
                'phonecode' => 65,
                'is_eu_member' => 0
            ],
            'SK' => [
                'name' => 'Slovakia',
                'phonecode' => 421,
                'is_eu_member' => 1
            ],
            'SI' => [
                'name' => 'Slovenia',
                'phonecode' => 386,
                'is_eu_member' => 1
            ],
            'SB' => [
                'name' => 'Solomon Islands',
                'phonecode' => 677,
                'is_eu_member' => 0
            ],
            'SO' => [
                'name' => 'Somalia',
                'phonecode' => 252,
                'is_eu_member' => 0
            ],
            'ZA' => [
                'name' => 'South Africa',
                'phonecode' => 27,
                'is_eu_member' => 0
            ],
            'GS' => [
                'name' => 'South Georgia and the South Sandwich Islands',
                'phonecode' => 0,
                'is_eu_member' => 0
            ],
            'ES' => [
                'name' => 'Spain',
                'phonecode' => 34,
                'is_eu_member' => 1
            ],
            'LK' => [
                'name' => 'Sri Lanka',
                'phonecode' => 94,
                'is_eu_member' => 0
            ],
            'SD' => [
                'name' => 'Sudan',
                'phonecode' => 249,
                'is_eu_member' => 0
            ],
            'SR' => [
                'name' => 'Suriname',
                'phonecode' => 597,
                'is_eu_member' => 0
            ],
            'SJ' => [
                'name' => 'Svalbard and Jan Mayen',
                'phonecode' => 47,
                'is_eu_member' => 0
            ],
            'SZ' => [
                'name' => 'Swaziland',
                'phonecode' => 268,
                'is_eu_member' => 0
            ],
            'SE' => [
                'name' => 'Sweden',
                'phonecode' => 46,
                'is_eu_member' => 1
            ],
            'CH' => [
                'name' => 'Switzerland',
                'phonecode' => 41,
                'is_eu_member' => 0
            ],
            'SY' => [
                'name' => 'Syrian Arab Republic',
                'phonecode' => 963,
                'is_eu_member' => 0
            ],
            'TW' => [
                'name' => 'Taiwan, Province of China',
                'phonecode' => 886,
                'is_eu_member' => 0
            ],
            'TJ' => [
                'name' => 'Tajikistan',
                'phonecode' => 992,
                'is_eu_member' => 0
            ],
            'TZ' => [
                'name' => 'Tanzania, United Republic of',
                'phonecode' => 255,
                'is_eu_member' => 0
            ],
            'TH' => [
                'name' => 'Thailand',
                'phonecode' => 66,
                'is_eu_member' => 0
            ],
            'TL' => [
                'name' => 'Timor-Leste',
                'phonecode' => 670,
                'is_eu_member' => 0
            ],
            'TG' => [
                'name' => 'Togo',
                'phonecode' => 228,
                'is_eu_member' => 0
            ],
            'TK' => [
                'name' => 'Tokelau',
                'phonecode' => 690,
                'is_eu_member' => 0
            ],
            'TO' => [
                'name' => 'Tonga',
                'phonecode' => 676,
                'is_eu_member' => 0
            ],
            'TT' => [
                'name' => 'Trinidad and Tobago',
                'phonecode' => 1868,
                'is_eu_member' => 0
            ],
            'TN' => [
                'name' => 'Tunisia',
                'phonecode' => 216,
                'is_eu_member' => 0
            ],
            'TR' => [
                'name' => 'Turkey',
                'phonecode' => 90,
                'is_eu_member' => 0
            ],
            'TM' => [
                'name' => 'Turkmenistan',
                'phonecode' => 7370,
                'is_eu_member' => 0
            ],
            'TC' => [
                'name' => 'Turks and Caicos Islands',
                'phonecode' => 1649,
                'is_eu_member' => 0
            ],
            'TV' => [
                'name' => 'Tuvalu',
                'phonecode' => 688,
                'is_eu_member' => 0
            ],
            'UG' => [
                'name' => 'Uganda',
                'phonecode' => 256,
                'is_eu_member' => 0
            ],
            'UA' => [
                'name' => 'Ukraine',
                'phonecode' => 380,
                'is_eu_member' => 0
            ],
            'AE' => [
                'name' => 'United Arab Emirates',
                'phonecode' => 971,
                'is_eu_member' => 0
            ],
            'GB' => [
                'name' => 'United Kingdom',
                'phonecode' => 44,
                'is_eu_member' => 0
            ],
            'US' => [
                'name' => 'United States',
                'phonecode' => 1,
                'is_eu_member' => 0
            ],
            'UM' => [
                'name' => 'United States Minor Outlying Islands',
                'phonecode' => 1,
                'is_eu_member' => 0
            ],
            'UY' => [
                'name' => 'Uruguay',
                'phonecode' => 598,
                'is_eu_member' => 0
            ],
            'UZ' => [
                'name' => 'Uzbekistan',
                'phonecode' => 998,
                'is_eu_member' => 0
            ],
            'VU' => [
                'name' => 'Vanuatu',
                'phonecode' => 678,
                'is_eu_member' => 0
            ],
            'VE' => [
                'name' => 'Venezuela',
                'phonecode' => 58,
                'is_eu_member' => 0
            ],
            'VN' => [
                'name' => 'Viet Nam',
                'phonecode' => 84,
                'is_eu_member' => 0
            ],
            'VG' => [
                'name' => 'Virgin Islands, British',
                'phonecode' => 1284,
                'is_eu_member' => 0
            ],
            'VI' => [
                'name' => 'Virgin Islands, U.s.',
                'phonecode' => 1340,
                'is_eu_member' => 0
            ],
            'WF' => [
                'name' => 'Wallis and Futuna',
                'phonecode' => 681,
                'is_eu_member' => 0
            ],
            'EH' => [
                'name' => 'Western Sahara',
                'phonecode' => 212,
                'is_eu_member' => 0
            ],
            'YE' => [
                'name' => 'Yemen',
                'phonecode' => 967,
                'is_eu_member' => 0
            ],
            'ZM' => [
                'name' => 'Zambia',
                'phonecode' => 260,
                'is_eu_member' => 0
            ],
            'ZW' => [
                'name' => 'Zimbabwe',
                'phonecode' => 263,
                'is_eu_member' => 0
            ],
            'RS' => [
                'name' => 'Serbia',
                'phonecode' => 381,
                'is_eu_member' => 0
            ],
            'AP' => [
                'name' => 'Asia / Pacific Region',
                'phonecode' => 0,
                'is_eu_member' => 0
            ],
            'ME' => [
                'name' => 'Montenegro',
                'phonecode' => 382,
                'is_eu_member' => 0
            ],
            'AX' => [
                'name' => 'Aland Islands',
                'phonecode' => 358,
                'is_eu_member' => 0
            ],
            'BQ' => [
                'name' => 'Bonaire, Sint Eustatius and Saba',
                'phonecode' => 599,
                'is_eu_member' => 0
            ],
            'CW' => [
                'name' => 'Curacao',
                'phonecode' => 599,
                'is_eu_member' => 0
            ],
            'GG' => [
                'name' => 'Guernsey',
                'phonecode' => 44,
                'is_eu_member' => 0
            ],
            'IM' => [
                'name' => 'Isle of Man',
                'phonecode' => 44,
                'is_eu_member' => 0
            ],
            'JE' => [
                'name' => 'Jersey',
                'phonecode' => 44,
                'is_eu_member' => 0
            ],
            'XK' => [
                'name' => 'Kosovo',
                'phonecode' => 381,
                'is_eu_member' => 0
            ],
            'BL' => [
                'name' => 'Saint Barthelemy',
                'phonecode' => 590,
                'is_eu_member' => 0
            ],
            'MF' => [
                'name' => 'Saint Martin',
                'phonecode' => 590,
                'is_eu_member' => 0
            ],
            'SX' => [
                'name' => 'Sint Maarten',
                'phonecode' => 1,
                'is_eu_member' => 0
            ],
            'SS' => [
                'name' => 'South Sudan',
                'phonecode' => 211,
                'is_eu_member' => 0
            ],
        ];
    }
}
