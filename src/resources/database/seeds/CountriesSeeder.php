<?php
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

class CountriesSeeder extends Seeder
{

    /**
     * Empties the countries table and then inserts all the countries of the world into it
     *
     * @return void
     */
    public function run()
    {


        \DB::table('countries')->delete();

        \DB::table('countries')->insert([

            [
                'id'        => 'AF',
                'name'      => 'Afghanistan',
                'phonecode' => 93,
            ],

            [
                'id'        => 'AL',
                'name'      => 'Albania',
                'phonecode' => 355,
            ],

            [
                'id'        => 'DZ',
                'name'      => 'Algeria',
                'phonecode' => 213,
            ],

            [
                'id'        => 'AS',
                'name'      => 'American Samoa',
                'phonecode' => 1684,
            ],

            [
                'id'        => 'AD',
                'name'      => 'Andorra',
                'phonecode' => 376,
            ],

            [
                'id'        => 'AO',
                'name'      => 'Angola',
                'phonecode' => 244,
            ],

            [
                'id'        => 'AI',
                'name'      => 'Anguilla',
                'phonecode' => 1264,
            ],

            [
                'id'        => 'AQ',
                'name'      => 'Antarctica',
                'phonecode' => 0,
            ],

            [
                'id'        => 'AG',
                'name'      => 'Antigua and Barbuda',
                'phonecode' => 1268,
            ],

            [
                'id'        => 'AR',
                'name'      => 'Argentina',
                'phonecode' => 54,
            ],

            [
                'id'        => 'AM',
                'name'      => 'Armenia',
                'phonecode' => 374,
            ],

            [
                'id'        => 'AW',
                'name'      => 'Aruba',
                'phonecode' => 297,
            ],

            [
                'id'        => 'AU',
                'name'      => 'Australia',
                'phonecode' => 61,
            ],

            [
                'id'           => 'AT',
                'name'         => 'Austria',
                'phonecode'    => 43,
                'is_eu_member' => 1
            ],

            [
                'id'        => 'AZ',
                'name'      => 'Azerbaijan',
                'phonecode' => 994,
            ],

            [
                'id'        => 'BS',
                'name'      => 'Bahamas',
                'phonecode' => 1242,
            ],

            [
                'id'        => 'BH',
                'name'      => 'Bahrain',
                'phonecode' => 973,
            ],

            [
                'id'        => 'BD',
                'name'      => 'Bangladesh',
                'phonecode' => 880,
            ],

            [
                'id'        => 'BB',
                'name'      => 'Barbados',
                'phonecode' => 1246,
            ],

            [
                'id'        => 'BY',
                'name'      => 'Belarus',
                'phonecode' => 375,
            ],

            [
                'id'           => 'BE',
                'name'         => 'Belgium',
                'phonecode'    => 32,
                'is_eu_member' => 1
            ],

            [
                'id'        => 'BZ',
                'name'      => 'Belize',
                'phonecode' => 501,
            ],

            [
                'id'        => 'BJ',
                'name'      => 'Benin',
                'phonecode' => 229,
            ],

            [
                'id'        => 'BM',
                'name'      => 'Bermuda',
                'phonecode' => 1441,
            ],

            [
                'id'        => 'BT',
                'name'      => 'Bhutan',
                'phonecode' => 975,
            ],

            [
                'id'        => 'BO',
                'name'      => 'Bolivia',
                'phonecode' => 591,
            ],

            [
                'id'        => 'BA',
                'name'      => 'Bosnia and Herzegovina',
                'phonecode' => 387,
            ],

            [
                'id'        => 'BW',
                'name'      => 'Botswana',
                'phonecode' => 267,
            ],

            [
                'id'        => 'BV',
                'name'      => 'Bouvet Island',
                'phonecode' => 0,
            ],

            [
                'id'        => 'BR',
                'name'      => 'Brazil',
                'phonecode' => 55,
            ],

            [
                'id'        => 'IO',
                'name'      => 'British Indian Ocean Territory',
                'phonecode' => 246,
            ],

            [
                'id'        => 'BN',
                'name'      => 'Brunei Darussalam',
                'phonecode' => 673,
            ],

            [
                'id'           => 'BG',
                'name'         => 'Bulgaria',
                'phonecode'    => 359,
                'is_eu_member' => 1
            ],

            [
                'id'        => 'BF',
                'name'      => 'Burkina Faso',
                'phonecode' => 226,
            ],

            [
                'id'        => 'BI',
                'name'      => 'Burundi',
                'phonecode' => 257,
            ],

            [
                'id'        => 'KH',
                'name'      => 'Cambodia',
                'phonecode' => 855,
            ],

            [
                'id'        => 'CM',
                'name'      => 'Cameroon',
                'phonecode' => 237,
            ],

            [
                'id'        => 'CA',
                'name'      => 'Canada',
                'phonecode' => 1,
            ],

            [
                'id'        => 'CV',
                'name'      => 'Cape Verde',
                'phonecode' => 238,
            ],

            [
                'id'        => 'KY',
                'name'      => 'Cayman Islands',
                'phonecode' => 1345,
            ],

            [
                'id'        => 'CF',
                'name'      => 'Central African Republic',
                'phonecode' => 236,
            ],

            [
                'id'        => 'TD',
                'name'      => 'Chad',
                'phonecode' => 235,
            ],

            [
                'id'        => 'CL',
                'name'      => 'Chile',
                'phonecode' => 56,
            ],

            [
                'id'        => 'CN',
                'name'      => 'China',
                'phonecode' => 86,
            ],

            [
                'id'        => 'CX',
                'name'      => 'Christmas Island',
                'phonecode' => 61,
            ],

            [
                'id'        => 'CC',
                'name'      => 'Cocos (Keeling) Islands',
                'phonecode' => 672,
            ],

            [
                'id'        => 'CO',
                'name'      => 'Colombia',
                'phonecode' => 57,
            ],

            [
                'id'        => 'KM',
                'name'      => 'Comoros',
                'phonecode' => 269,
            ],

            [
                'id'        => 'CG',
                'name'      => 'Congo',
                'phonecode' => 242,
            ],

            [
                'id'        => 'CD',
                'name'      => 'Congo, the Democratic Republic of the',
                'phonecode' => 243,
            ],

            [
                'id'        => 'CK',
                'name'      => 'Cook Islands',
                'phonecode' => 682,
            ],

            [
                'id'        => 'CR',
                'name'      => 'Costa Rica',
                'phonecode' => 506,
            ],

            [
                'id'        => 'CI',
                'name'      => 'Cote D\'Ivoire',
                'phonecode' => 225,
            ],

            [
                'id'           => 'HR',
                'name'         => 'Croatia',
                'phonecode'    => 385,
                'is_eu_member' => 1
            ],

            [
                'id'        => 'CU',
                'name'      => 'Cuba',
                'phonecode' => 53,
            ],

            [
                'id'           => 'CY',
                'name'         => 'Cyprus',
                'phonecode'    => 357,
                'is_eu_member' => 1
            ],

            [
                'id'           => 'CZ',
                'name'         => 'Czech Republic',
                'phonecode'    => 420,
                'is_eu_member' => 1
            ],

            [
                'id'           => 'DK',
                'name'         => 'Denmark',
                'phonecode'    => 45,
                'is_eu_member' => 1
            ],

            [
                'id'        => 'DJ',
                'name'      => 'Djibouti',
                'phonecode' => 253,
            ],

            [
                'id'        => 'DM',
                'name'      => 'Dominica',
                'phonecode' => 1767,
            ],

            [
                'id'        => 'DO',
                'name'      => 'Dominican Republic',
                'phonecode' => 1809,
            ],

            [
                'id'        => 'EC',
                'name'      => 'Ecuador',
                'phonecode' => 593,
            ],

            [
                'id'        => 'EG',
                'name'      => 'Egypt',
                'phonecode' => 20,
            ],

            [
                'id'        => 'SV',
                'name'      => 'El Salvador',
                'phonecode' => 503,
            ],

            [
                'id'        => 'GQ',
                'name'      => 'Equatorial Guinea',
                'phonecode' => 240,
            ],

            [
                'id'        => 'ER',
                'name'      => 'Eritrea',
                'phonecode' => 291,
            ],

            [
                'id'           => 'EE',
                'name'         => 'Estonia',
                'phonecode'    => 372,
                'is_eu_member' => 1
            ],

            [
                'id'        => 'ET',
                'name'      => 'Ethiopia',
                'phonecode' => 251,
            ],

            [
                'id'        => 'FK',
                'name'      => 'Falkland Islands (Malvinas)',
                'phonecode' => 500,
            ],

            [
                'id'        => 'FO',
                'name'      => 'Faroe Islands',
                'phonecode' => 298,
            ],

            [
                'id'        => 'FJ',
                'name'      => 'Fiji',
                'phonecode' => 679,
            ],

            [
                'id'           => 'FI',
                'name'         => 'Finland',
                'phonecode'    => 358,
                'is_eu_member' => 1
            ],

            [
                'id'           => 'FR',
                'name'         => 'France',
                'phonecode'    => 33,
                'is_eu_member' => 1
            ],

            [
                'id'        => 'GF',
                'name'      => 'French Guiana',
                'phonecode' => 594,
            ],

            [
                'id'        => 'PF',
                'name'      => 'French Polynesia',
                'phonecode' => 689,
            ],

            [
                'id'        => 'TF',
                'name'      => 'French Southern Territories',
                'phonecode' => 0,
            ],

            [
                'id'        => 'GA',
                'name'      => 'Gabon',
                'phonecode' => 241,
            ],

            [
                'id'        => 'GM',
                'name'      => 'Gambia',
                'phonecode' => 220,
            ],

            [
                'id'        => 'GE',
                'name'      => 'Georgia',
                'phonecode' => 995,
            ],

            [
                'id'           => 'DE',
                'name'         => 'Germany',
                'phonecode'    => 49,
                'is_eu_member' => 1
            ],

            [
                'id'        => 'GH',
                'name'      => 'Ghana',
                'phonecode' => 233,
            ],

            [
                'id'        => 'GI',
                'name'      => 'Gibraltar',
                'phonecode' => 350,
            ],

            [
                'id'           => 'GR',
                'name'         => 'Greece',
                'phonecode'    => 30,
                'is_eu_member' => 1
            ],

            [
                'id'        => 'GL',
                'name'      => 'Greenland',
                'phonecode' => 299,
            ],

            [
                'id'        => 'GD',
                'name'      => 'Grenada',
                'phonecode' => 1473,
            ],

            [
                'id'        => 'GP',
                'name'      => 'Guadeloupe',
                'phonecode' => 590,
            ],

            [
                'id'        => 'GU',
                'name'      => 'Guam',
                'phonecode' => 1671,
            ],

            [
                'id'        => 'GT',
                'name'      => 'Guatemala',
                'phonecode' => 502,
            ],

            [
                'id'        => 'GN',
                'name'      => 'Guinea',
                'phonecode' => 224,
            ],

            [
                'id'        => 'GW',
                'name'      => 'Guinea-Bissau',
                'phonecode' => 245,
            ],

            [
                'id'        => 'GY',
                'name'      => 'Guyana',
                'phonecode' => 592,
            ],

            [
                'id'        => 'HT',
                'name'      => 'Haiti',
                'phonecode' => 509,
            ],

            [
                'id'        => 'HM',
                'name'      => 'Heard Island and Mcdonald Islands',
                'phonecode' => 0,
            ],

            [
                'id'        => 'VA',
                'name'      => 'Holy See (Vatican City State)',
                'phonecode' => 39,
            ],

            [
                'id'        => 'HN',
                'name'      => 'Honduras',
                'phonecode' => 504,
            ],

            [
                'id'        => 'HK',
                'name'      => 'Hong Kong',
                'phonecode' => 852,
            ],

            [
                'id'           => 'HU',
                'name'         => 'Hungary',
                'phonecode'    => 36,
                'is_eu_member' => 1
            ],

            [
                'id'        => 'IS',
                'name'      => 'Iceland',
                'phonecode' => 354,
            ],

            [
                'id'        => 'IN',
                'name'      => 'India',
                'phonecode' => 91,
            ],

            [
                'id'        => 'ID',
                'name'      => 'Indonesia',
                'phonecode' => 62,
            ],

            [
                'id'        => 'IR',
                'name'      => 'Iran, Islamic Republic of',
                'phonecode' => 98,
            ],

            [
                'id'        => 'IQ',
                'name'      => 'Iraq',
                'phonecode' => 964,
            ],

            [
                'id'           => 'IE',
                'name'         => 'Ireland',
                'phonecode'    => 353,
                'is_eu_member' => 1
            ],

            [
                'id'        => 'IL',
                'name'      => 'Israel',
                'phonecode' => 972,
            ],

            [
                'id'           => 'IT',
                'name'         => 'Italy',
                'phonecode'    => 39,
                'is_eu_member' => 1
            ],

            [
                'id'        => 'JM',
                'name'      => 'Jamaica',
                'phonecode' => 1876,
            ],

            [
                'id'        => 'JP',
                'name'      => 'Japan',
                'phonecode' => 81,
            ],

            [
                'id'        => 'JO',
                'name'      => 'Jordan',
                'phonecode' => 962,
            ],

            [
                'id'        => 'KZ',
                'name'      => 'Kazakhstan',
                'phonecode' => 7,
            ],

            [
                'id'        => 'KE',
                'name'      => 'Kenya',
                'phonecode' => 254,
            ],

            [
                'id'        => 'KI',
                'name'      => 'Kiribati',
                'phonecode' => 686,
            ],

            [
                'id'        => 'KP',
                'name'      => 'Korea, Democratic People\'s Republic of',
                'phonecode' => 850,
            ],

            [
                'id'        => 'KR',
                'name'      => 'Korea, Republic of',
                'phonecode' => 82,
            ],

            [
                'id'        => 'KW',
                'name'      => 'Kuwait',
                'phonecode' => 965,
            ],

            [
                'id'        => 'KG',
                'name'      => 'Kyrgyzstan',
                'phonecode' => 996,
            ],

            [
                'id'        => 'LA',
                'name'      => 'Lao People\'s Democratic Republic',
                'phonecode' => 856,
            ],

            [
                'id'           => 'LV',
                'name'         => 'Latvia',
                'phonecode'    => 371,
                'is_eu_member' => 1
            ],

            [
                'id'        => 'LB',
                'name'      => 'Lebanon',
                'phonecode' => 961,
            ],

            [
                'id'        => 'LS',
                'name'      => 'Lesotho',
                'phonecode' => 266,
            ],

            [
                'id'        => 'LR',
                'name'      => 'Liberia',
                'phonecode' => 231,
            ],

            [
                'id'        => 'LY',
                'name'      => 'Libyan Arab Jamahiriya',
                'phonecode' => 218,
            ],

            [
                'id'        => 'LI',
                'name'      => 'Liechtenstein',
                'phonecode' => 423,
            ],

            [
                'id'           => 'LT',
                'name'         => 'Lithuania',
                'phonecode'    => 370,
                'is_eu_member' => 1
            ],

            [
                'id'           => 'LU',
                'name'         => 'Luxembourg',
                'phonecode'    => 352,
                'is_eu_member' => 1
            ],

            [
                'id'        => 'MO',
                'name'      => 'Macao',
                'phonecode' => 853,
            ],

            [
                'id'        => 'MK',
                'name'      => 'Macedonia, the Former Yugoslav Republic of',
                'phonecode' => 389,
            ],

            [
                'id'        => 'MG',
                'name'      => 'Madagascar',
                'phonecode' => 261,
            ],

            [
                'id'        => 'MW',
                'name'      => 'Malawi',
                'phonecode' => 265,
            ],

            [
                'id'        => 'MY',
                'name'      => 'Malaysia',
                'phonecode' => 60,
            ],

            [
                'id'        => 'MV',
                'name'      => 'Maldives',
                'phonecode' => 960,
            ],

            [
                'id'        => 'ML',
                'name'      => 'Mali',
                'phonecode' => 223,
            ],

            [
                'id'           => 'MT',
                'name'         => 'Malta',
                'phonecode'    => 356,
                'is_eu_member' => 1
            ],

            [
                'id'        => 'MH',
                'name'      => 'Marshall Islands',
                'phonecode' => 692,
            ],

            [
                'id'        => 'MQ',
                'name'      => 'Martinique',
                'phonecode' => 596,
            ],

            [
                'id'        => 'MR',
                'name'      => 'Mauritania',
                'phonecode' => 222,
            ],

            [
                'id'        => 'MU',
                'name'      => 'Mauritius',
                'phonecode' => 230,
            ],

            [
                'id'        => 'YT',
                'name'      => 'Mayotte',
                'phonecode' => 269,
            ],

            [
                'id'        => 'MX',
                'name'      => 'Mexico',
                'phonecode' => 52,
            ],

            [
                'id'        => 'FM',
                'name'      => 'Micronesia, Federated States of',
                'phonecode' => 691,
            ],

            [
                'id'        => 'MD',
                'name'      => 'Moldova, Republic of',
                'phonecode' => 373,
            ],

            [
                'id'        => 'MC',
                'name'      => 'Monaco',
                'phonecode' => 377,
            ],

            [
                'id'        => 'MN',
                'name'      => 'Mongolia',
                'phonecode' => 976,
            ],

            [
                'id'        => 'MS',
                'name'      => 'Montserrat',
                'phonecode' => 1664,
            ],

            [
                'id'        => 'MA',
                'name'      => 'Morocco',
                'phonecode' => 212,
            ],

            [
                'id'        => 'MZ',
                'name'      => 'Mozambique',
                'phonecode' => 258,
            ],

            [
                'id'        => 'MM',
                'name'      => 'Myanmar',
                'phonecode' => 95,
            ],

            [
                'id'        => 'NA',
                'name'      => 'Namibia',
                'phonecode' => 264,
            ],

            [
                'id'        => 'NR',
                'name'      => 'Nauru',
                'phonecode' => 674,
            ],

            [
                'id'        => 'NP',
                'name'      => 'Nepal',
                'phonecode' => 977,
            ],

            [
                'id'           => 'NL',
                'name'         => 'Netherlands',
                'phonecode'    => 31,
                'is_eu_member' => 1
            ],

            [
                'id'        => 'AN',
                'name'      => 'Netherlands Antilles',
                'phonecode' => 599,
            ],

            [
                'id'        => 'NC',
                'name'      => 'New Caledonia',
                'phonecode' => 687,
            ],

            [
                'id'        => 'NZ',
                'name'      => 'New Zealand',
                'phonecode' => 64,
            ],

            [
                'id'        => 'NI',
                'name'      => 'Nicaragua',
                'phonecode' => 505,
            ],

            [
                'id'        => 'NE',
                'name'      => 'Niger',
                'phonecode' => 227,
            ],

            [
                'id'        => 'NG',
                'name'      => 'Nigeria',
                'phonecode' => 234,
            ],

            [
                'id'        => 'NU',
                'name'      => 'Niue',
                'phonecode' => 683,
            ],

            [
                'id'        => 'NF',
                'name'      => 'Norfolk Island',
                'phonecode' => 672,
            ],

            [
                'id'        => 'MP',
                'name'      => 'Northern Mariana Islands',
                'phonecode' => 1670,
            ],

            [
                'id'        => 'NO',
                'name'      => 'Norway',
                'phonecode' => 47,
            ],

            [
                'id'        => 'OM',
                'name'      => 'Oman',
                'phonecode' => 968,
            ],

            [
                'id'        => 'PK',
                'name'      => 'Pakistan',
                'phonecode' => 92,
            ],

            [
                'id'        => 'PW',
                'name'      => 'Palau',
                'phonecode' => 680,
            ],

            [
                'id'        => 'PS',
                'name'      => 'Palestinian Territory, Occupied',
                'phonecode' => 970,
            ],

            [
                'id'        => 'PA',
                'name'      => 'Panama',
                'phonecode' => 507,
            ],

            [
                'id'        => 'PG',
                'name'      => 'Papua New Guinea',
                'phonecode' => 675,
            ],

            [
                'id'        => 'PY',
                'name'      => 'Paraguay',
                'phonecode' => 595,
            ],

            [
                'id'        => 'PE',
                'name'      => 'Peru',
                'phonecode' => 51,
            ],

            [
                'id'        => 'PH',
                'name'      => 'Philippines',
                'phonecode' => 63,
            ],

            [
                'id'        => 'PN',
                'name'      => 'Pitcairn',
                'phonecode' => 0,
            ],

            [
                'id'           => 'PL',
                'name'         => 'Poland',
                'phonecode'    => 48,
                'is_eu_member' => 1
            ],

            [
                'id'           => 'PT',
                'name'         => 'Portugal',
                'phonecode'    => 351,
                'is_eu_member' => 1
            ],

            [
                'id'        => 'PR',
                'name'      => 'Puerto Rico',
                'phonecode' => 1787,
            ],

            [
                'id'        => 'QA',
                'name'      => 'Qatar',
                'phonecode' => 974,
            ],

            [
                'id'        => 'RE',
                'name'      => 'Reunion',
                'phonecode' => 262,
            ],

            [
                'id'           => 'RO',
                'name'         => 'Romania',
                'phonecode'    => 40,
                'is_eu_member' => 1
            ],

            [
                'id'        => 'RU',
                'name'      => 'Russian Federation',
                'phonecode' => 7,
            ],

            [
                'id'        => 'RW',
                'name'      => 'Rwanda',
                'phonecode' => 250,
            ],

            [
                'id'        => 'SH',
                'name'      => 'Saint Helena',
                'phonecode' => 290,
            ],

            [
                'id'        => 'KN',
                'name'      => 'Saint Kitts and Nevis',
                'phonecode' => 1869,
            ],

            [
                'id'        => 'LC',
                'name'      => 'Saint Lucia',
                'phonecode' => 1758,
            ],

            [
                'id'        => 'PM',
                'name'      => 'Saint Pierre and Miquelon',
                'phonecode' => 508,
            ],

            [
                'id'        => 'VC',
                'name'      => 'Saint Vincent and the Grenadines',
                'phonecode' => 1784,
            ],

            [
                'id'        => 'WS',
                'name'      => 'Samoa',
                'phonecode' => 684,
            ],

            [
                'id'        => 'SM',
                'name'      => 'San Marino',
                'phonecode' => 378,
            ],

            [
                'id'        => 'ST',
                'name'      => 'Sao Tome and Principe',
                'phonecode' => 239,
            ],

            [
                'id'        => 'SA',
                'name'      => 'Saudi Arabia',
                'phonecode' => 966,
            ],

            [
                'id'        => 'SN',
                'name'      => 'Senegal',
                'phonecode' => 221,
            ],

            [
                'id'        => 'SC',
                'name'      => 'Seychelles',
                'phonecode' => 248,
            ],

            [
                'id'        => 'SL',
                'name'      => 'Sierra Leone',
                'phonecode' => 232,
            ],

            [
                'id'        => 'SG',
                'name'      => 'Singapore',
                'phonecode' => 65,
            ],

            [
                'id'           => 'SK',
                'name'         => 'Slovakia',
                'phonecode'    => 421,
                'is_eu_member' => 1
            ],

            [
                'id'           => 'SI',
                'name'         => 'Slovenia',
                'phonecode'    => 386,
                'is_eu_member' => 1
            ],

            [
                'id'        => 'SB',
                'name'      => 'Solomon Islands',
                'phonecode' => 677,
            ],

            [
                'id'        => 'SO',
                'name'      => 'Somalia',
                'phonecode' => 252,
            ],

            [
                'id'        => 'ZA',
                'name'      => 'South Africa',
                'phonecode' => 27,
            ],

            [
                'id'        => 'GS',
                'name'      => 'South Georgia and the South Sandwich Islands',
                'phonecode' => 0,
            ],

            [
                'id'           => 'ES',
                'name'         => 'Spain',
                'phonecode'    => 34,
                'is_eu_member' => 1
            ],

            [
                'id'        => 'LK',
                'name'      => 'Sri Lanka',
                'phonecode' => 94,
            ],

            [
                'id'        => 'SD',
                'name'      => 'Sudan',
                'phonecode' => 249,
            ],

            [
                'id'        => 'SR',
                'name'      => 'Suriname',
                'phonecode' => 597,
            ],

            [
                'id'        => 'SJ',
                'name'      => 'Svalbard and Jan Mayen',
                'phonecode' => 47,
            ],

            [
                'id'        => 'SZ',
                'name'      => 'Swaziland',
                'phonecode' => 268,
            ],

            [
                'id'           => 'SE',
                'name'         => 'Sweden',
                'phonecode'    => 46,
                'is_eu_member' => 1
            ],

            [
                'id'        => 'CH',
                'name'      => 'Switzerland',
                'phonecode' => 41,
            ],

            [
                'id'        => 'SY',
                'name'      => 'Syrian Arab Republic',
                'phonecode' => 963,
            ],

            [
                'id'        => 'TW',
                'name'      => 'Taiwan, Province of China',
                'phonecode' => 886,
            ],

            [
                'id'        => 'TJ',
                'name'      => 'Tajikistan',
                'phonecode' => 992,
            ],

            [
                'id'        => 'TZ',
                'name'      => 'Tanzania, United Republic of',
                'phonecode' => 255,
            ],

            [
                'id'        => 'TH',
                'name'      => 'Thailand',
                'phonecode' => 66,
            ],

            [
                'id'        => 'TL',
                'name'      => 'Timor-Leste',
                'phonecode' => 670,
            ],

            [
                'id'        => 'TG',
                'name'      => 'Togo',
                'phonecode' => 228,
            ],

            [
                'id'        => 'TK',
                'name'      => 'Tokelau',
                'phonecode' => 690,
            ],

            [
                'id'        => 'TO',
                'name'      => 'Tonga',
                'phonecode' => 676,
            ],

            [
                'id'        => 'TT',
                'name'      => 'Trinidad and Tobago',
                'phonecode' => 1868,
            ],

            [
                'id'        => 'TN',
                'name'      => 'Tunisia',
                'phonecode' => 216,
            ],

            [
                'id'        => 'TR',
                'name'      => 'Turkey',
                'phonecode' => 90,
            ],

            [
                'id'        => 'TM',
                'name'      => 'Turkmenistan',
                'phonecode' => 7370,
            ],

            [
                'id'        => 'TC',
                'name'      => 'Turks and Caicos Islands',
                'phonecode' => 1649,
            ],

            [
                'id'        => 'TV',
                'name'      => 'Tuvalu',
                'phonecode' => 688,
            ],

            [
                'id'        => 'UG',
                'name'      => 'Uganda',
                'phonecode' => 256,
            ],

            [
                'id'        => 'UA',
                'name'      => 'Ukraine',
                'phonecode' => 380,
            ],

            [
                'id'        => 'AE',
                'name'      => 'United Arab Emirates',
                'phonecode' => 971,
            ],

            [
                'id'           => 'GB',
                'name'         => 'United Kingdom',
                'phonecode'    => 44,
                'is_eu_member' => 1
            ],

            [
                'id'        => 'US',
                'name'      => 'United States',
                'phonecode' => 1,
            ],

            [
                'id'        => 'UM',
                'name'      => 'United States Minor Outlying Islands',
                'phonecode' => 1,
            ],

            [
                'id'        => 'UY',
                'name'      => 'Uruguay',
                'phonecode' => 598,
            ],

            [
                'id'        => 'UZ',
                'name'      => 'Uzbekistan',
                'phonecode' => 998,
            ],

            [
                'id'        => 'VU',
                'name'      => 'Vanuatu',
                'phonecode' => 678,
            ],

            [
                'id'        => 'VE',
                'name'      => 'Venezuela',
                'phonecode' => 58,
            ],

            [
                'id'        => 'VN',
                'name'      => 'Viet Nam',
                'phonecode' => 84,
            ],

            [
                'id'        => 'VG',
                'name'      => 'Virgin Islands, British',
                'phonecode' => 1284,
            ],

            [
                'id'        => 'VI',
                'name'      => 'Virgin Islands, U.s.',
                'phonecode' => 1340,
            ],

            [
                'id'        => 'WF',
                'name'      => 'Wallis and Futuna',
                'phonecode' => 681,
            ],

            [
                'id'        => 'EH',
                'name'      => 'Western Sahara',
                'phonecode' => 212,
            ],

            [
                'id'        => 'YE',
                'name'      => 'Yemen',
                'phonecode' => 967,
            ],

            [
                'id'        => 'ZM',
                'name'      => 'Zambia',
                'phonecode' => 260,
            ],

            [
                'id'        => 'ZW',
                'name'      => 'Zimbabwe',
                'phonecode' => 263,
            ],

            [
                'id'        => 'RS',
                'name'      => 'Serbia',
                'phonecode' => 381,
            ],

            [
                'id'        => 'AP',
                'name'      => 'Asia / Pacific Region',
                'phonecode' => 0,
            ],

            [
                'id'        => 'ME',
                'name'      => 'Montenegro',
                'phonecode' => 382,
            ],

            [
                'id'        => 'AX',
                'name'      => 'Aland Islands',
                'phonecode' => 358,
            ],

            [
                'id'        => 'BQ',
                'name'      => 'Bonaire, Sint Eustatius and Saba',
                'phonecode' => 599,
            ],

            [
                'id'        => 'CW',
                'name'      => 'Curacao',
                'phonecode' => 599,
            ],

            [
                'id'        => 'GG',
                'name'      => 'Guernsey',
                'phonecode' => 44,
            ],

            [
                'id'        => 'IM',
                'name'      => 'Isle of Man',
                'phonecode' => 44,
            ],

            [
                'id'        => 'JE',
                'name'      => 'Jersey',
                'phonecode' => 44,
            ],

            [
                'id'        => 'XK',
                'name'      => 'Kosovo',
                'phonecode' => 381,
            ],

            [
                'id'        => 'BL',
                'name'      => 'Saint Barthelemy',
                'phonecode' => 590,
            ],

            [
                'id'        => 'MF',
                'name'      => 'Saint Martin',
                'phonecode' => 590,
            ],

            [
                'id'        => 'SX',
                'name'      => 'Sint Maarten',
                'phonecode' => 1,
            ],

            [
                'id'        => 'SS',
                'name'      => 'South Sudan',
                'phonecode' => 211,
            ],

        ]);


    }
}
