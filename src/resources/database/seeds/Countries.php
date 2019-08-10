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

class Countries extends Seeder
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
                'id'           => 'AF',
                'name'         => 'Afghanistan',
                'phonecode'    => 93,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'AL',
                'name'         => 'Albania',
                'phonecode'    => 355,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'DZ',
                'name'         => 'Algeria',
                'phonecode'    => 213,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'AS',
                'name'         => 'American Samoa',
                'phonecode'    => 1684,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'AD',
                'name'         => 'Andorra',
                'phonecode'    => 376,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'AO',
                'name'         => 'Angola',
                'phonecode'    => 244,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'AI',
                'name'         => 'Anguilla',
                'phonecode'    => 1264,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'AQ',
                'name'         => 'Antarctica',
                'phonecode'    => 0,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'AG',
                'name'         => 'Antigua and Barbuda',
                'phonecode'    => 1268,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'AR',
                'name'         => 'Argentina',
                'phonecode'    => 54,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'AM',
                'name'         => 'Armenia',
                'phonecode'    => 374,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'AW',
                'name'         => 'Aruba',
                'phonecode'    => 297,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'AU',
                'name'         => 'Australia',
                'phonecode'    => 61,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'AT',
                'name'         => 'Austria',
                'phonecode'    => 43,
                'is_eu_member' => 1
            ],

            [
                'id'           => 'AZ',
                'name'         => 'Azerbaijan',
                'phonecode'    => 994,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'BS',
                'name'         => 'Bahamas',
                'phonecode'    => 1242,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'BH',
                'name'         => 'Bahrain',
                'phonecode'    => 973,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'BD',
                'name'         => 'Bangladesh',
                'phonecode'    => 880,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'BB',
                'name'         => 'Barbados',
                'phonecode'    => 1246,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'BY',
                'name'         => 'Belarus',
                'phonecode'    => 375,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'BE',
                'name'         => 'Belgium',
                'phonecode'    => 32,
                'is_eu_member' => 1
            ],

            [
                'id'           => 'BZ',
                'name'         => 'Belize',
                'phonecode'    => 501,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'BJ',
                'name'         => 'Benin',
                'phonecode'    => 229,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'BM',
                'name'         => 'Bermuda',
                'phonecode'    => 1441,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'BT',
                'name'         => 'Bhutan',
                'phonecode'    => 975,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'BO',
                'name'         => 'Bolivia',
                'phonecode'    => 591,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'BA',
                'name'         => 'Bosnia and Herzegovina',
                'phonecode'    => 387,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'BW',
                'name'         => 'Botswana',
                'phonecode'    => 267,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'BV',
                'name'         => 'Bouvet Island',
                'phonecode'    => 0,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'BR',
                'name'         => 'Brazil',
                'phonecode'    => 55,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'IO',
                'name'         => 'British Indian Ocean Territory',
                'phonecode'    => 246,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'BN',
                'name'         => 'Brunei Darussalam',
                'phonecode'    => 673,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'BG',
                'name'         => 'Bulgaria',
                'phonecode'    => 359,
                'is_eu_member' => 1
            ],

            [
                'id'           => 'BF',
                'name'         => 'Burkina Faso',
                'phonecode'    => 226,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'BI',
                'name'         => 'Burundi',
                'phonecode'    => 257,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'KH',
                'name'         => 'Cambodia',
                'phonecode'    => 855,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'CM',
                'name'         => 'Cameroon',
                'phonecode'    => 237,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'CA',
                'name'         => 'Canada',
                'phonecode'    => 1,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'CV',
                'name'         => 'Cape Verde',
                'phonecode'    => 238,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'KY',
                'name'         => 'Cayman Islands',
                'phonecode'    => 1345,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'CF',
                'name'         => 'Central African Republic',
                'phonecode'    => 236,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'TD',
                'name'         => 'Chad',
                'phonecode'    => 235,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'CL',
                'name'         => 'Chile',
                'phonecode'    => 56,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'CN',
                'name'         => 'China',
                'phonecode'    => 86,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'CX',
                'name'         => 'Christmas Island',
                'phonecode'    => 61,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'CC',
                'name'         => 'Cocos (Keeling) Islands',
                'phonecode'    => 672,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'CO',
                'name'         => 'Colombia',
                'phonecode'    => 57,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'KM',
                'name'         => 'Comoros',
                'phonecode'    => 269,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'CG',
                'name'         => 'Congo',
                'phonecode'    => 242,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'CD',
                'name'         => 'Congo, the Democratic Republic of the',
                'phonecode'    => 243,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'CK',
                'name'         => 'Cook Islands',
                'phonecode'    => 682,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'CR',
                'name'         => 'Costa Rica',
                'phonecode'    => 506,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'CI',
                'name'         => 'Cote D\'Ivoire',
                'phonecode'    => 225,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'HR',
                'name'         => 'Croatia',
                'phonecode'    => 385,
                'is_eu_member' => 1
            ],

            [
                'id'           => 'CU',
                'name'         => 'Cuba',
                'phonecode'    => 53,
                'is_eu_member' => 0
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
            ]
        ]);

        \DB::table('countries')->insert([

            [
                'id'           => 'DK',
                'name'         => 'Denmark',
                'phonecode'    => 45,
                'is_eu_member' => 1
            ],

            [
                'id'           => 'DJ',
                'name'         => 'Djibouti',
                'phonecode'    => 253,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'DM',
                'name'         => 'Dominica',
                'phonecode'    => 1767,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'DO',
                'name'         => 'Dominican Republic',
                'phonecode'    => 1809,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'EC',
                'name'         => 'Ecuador',
                'phonecode'    => 593,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'EG',
                'name'         => 'Egypt',
                'phonecode'    => 20,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'SV',
                'name'         => 'El Salvador',
                'phonecode'    => 503,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'GQ',
                'name'         => 'Equatorial Guinea',
                'phonecode'    => 240,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'ER',
                'name'         => 'Eritrea',
                'phonecode'    => 291,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'EE',
                'name'         => 'Estonia',
                'phonecode'    => 372,
                'is_eu_member' => 1
            ],

            [
                'id'           => 'ET',
                'name'         => 'Ethiopia',
                'phonecode'    => 251,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'FK',
                'name'         => 'Falkland Islands (Malvinas)',
                'phonecode'    => 500,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'FO',
                'name'         => 'Faroe Islands',
                'phonecode'    => 298,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'FJ',
                'name'         => 'Fiji',
                'phonecode'    => 679,
                'is_eu_member' => 0
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
                'id'           => 'GF',
                'name'         => 'French Guiana',
                'phonecode'    => 594,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'PF',
                'name'         => 'French Polynesia',
                'phonecode'    => 689,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'TF',
                'name'         => 'French Southern Territories',
                'phonecode'    => 0,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'GA',
                'name'         => 'Gabon',
                'phonecode'    => 241,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'GM',
                'name'         => 'Gambia',
                'phonecode'    => 220,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'GE',
                'name'         => 'Georgia',
                'phonecode'    => 995,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'DE',
                'name'         => 'Germany',
                'phonecode'    => 49,
                'is_eu_member' => 1
            ],

            [
                'id'           => 'GH',
                'name'         => 'Ghana',
                'phonecode'    => 233,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'GI',
                'name'         => 'Gibraltar',
                'phonecode'    => 350,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'GR',
                'name'         => 'Greece',
                'phonecode'    => 30,
                'is_eu_member' => 1
            ],

            [
                'id'           => 'GL',
                'name'         => 'Greenland',
                'phonecode'    => 299,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'GD',
                'name'         => 'Grenada',
                'phonecode'    => 1473,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'GP',
                'name'         => 'Guadeloupe',
                'phonecode'    => 590,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'GU',
                'name'         => 'Guam',
                'phonecode'    => 1671,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'GT',
                'name'         => 'Guatemala',
                'phonecode'    => 502,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'GN',
                'name'         => 'Guinea',
                'phonecode'    => 224,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'GW',
                'name'         => 'Guinea-Bissau',
                'phonecode'    => 245,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'GY',
                'name'         => 'Guyana',
                'phonecode'    => 592,
                'is_eu_member' => 0
            ]

        ]);

        \DB::table('countries')->insert([
            [
                'id'           => 'HT',
                'name'         => 'Haiti',
                'phonecode'    => 509,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'HM',
                'name'         => 'Heard Island and Mcdonald Islands',
                'phonecode'    => 0,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'VA',
                'name'         => 'Holy See (Vatican City State)',
                'phonecode'    => 39,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'HN',
                'name'         => 'Honduras',
                'phonecode'    => 504,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'HK',
                'name'         => 'Hong Kong',
                'phonecode'    => 852,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'HU',
                'name'         => 'Hungary',
                'phonecode'    => 36,
                'is_eu_member' => 1
            ],

            [
                'id'           => 'IS',
                'name'         => 'Iceland',
                'phonecode'    => 354,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'IN',
                'name'         => 'India',
                'phonecode'    => 91,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'ID',
                'name'         => 'Indonesia',
                'phonecode'    => 62,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'IR',
                'name'         => 'Iran, Islamic Republic of',
                'phonecode'    => 98,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'IQ',
                'name'         => 'Iraq',
                'phonecode'    => 964,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'IE',
                'name'         => 'Ireland',
                'phonecode'    => 353,
                'is_eu_member' => 1
            ],

            [
                'id'           => 'IL',
                'name'         => 'Israel',
                'phonecode'    => 972,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'IT',
                'name'         => 'Italy',
                'phonecode'    => 39,
                'is_eu_member' => 1
            ],

            [
                'id'           => 'JM',
                'name'         => 'Jamaica',
                'phonecode'    => 1876,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'JP',
                'name'         => 'Japan',
                'phonecode'    => 81,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'JO',
                'name'         => 'Jordan',
                'phonecode'    => 962,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'KZ',
                'name'         => 'Kazakhstan',
                'phonecode'    => 7,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'KE',
                'name'         => 'Kenya',
                'phonecode'    => 254,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'KI',
                'name'         => 'Kiribati',
                'phonecode'    => 686,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'KP',
                'name'         => 'Korea, Democratic People\'s Republic of',
                'phonecode'    => 850,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'KR',
                'name'         => 'Korea, Republic of',
                'phonecode'    => 82,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'KW',
                'name'         => 'Kuwait',
                'phonecode'    => 965,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'KG',
                'name'         => 'Kyrgyzstan',
                'phonecode'    => 996,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'LA',
                'name'         => 'Lao People\'s Democratic Republic',
                'phonecode'    => 856,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'LV',
                'name'         => 'Latvia',
                'phonecode'    => 371,
                'is_eu_member' => 1
            ],

            [
                'id'           => 'LB',
                'name'         => 'Lebanon',
                'phonecode'    => 961,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'LS',
                'name'         => 'Lesotho',
                'phonecode'    => 266,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'LR',
                'name'         => 'Liberia',
                'phonecode'    => 231,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'LY',
                'name'         => 'Libyan Arab Jamahiriya',
                'phonecode'    => 218,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'LI',
                'name'         => 'Liechtenstein',
                'phonecode'    => 423,
                'is_eu_member' => 0
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
            ]

        ]);

        \DB::table('countries')->insert([

            [
                'id'           => 'MO',
                'name'         => 'Macao',
                'phonecode'    => 853,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'MK',
                'name'         => 'Macedonia, the Former Yugoslav Republic of',
                'phonecode'    => 389,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'MG',
                'name'         => 'Madagascar',
                'phonecode'    => 261,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'MW',
                'name'         => 'Malawi',
                'phonecode'    => 265,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'MY',
                'name'         => 'Malaysia',
                'phonecode'    => 60,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'MV',
                'name'         => 'Maldives',
                'phonecode'    => 960,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'ML',
                'name'         => 'Mali',
                'phonecode'    => 223,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'MT',
                'name'         => 'Malta',
                'phonecode'    => 356,
                'is_eu_member' => 1
            ],

            [
                'id'           => 'MH',
                'name'         => 'Marshall Islands',
                'phonecode'    => 692,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'MQ',
                'name'         => 'Martinique',
                'phonecode'    => 596,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'MR',
                'name'         => 'Mauritania',
                'phonecode'    => 222,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'MU',
                'name'         => 'Mauritius',
                'phonecode'    => 230,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'YT',
                'name'         => 'Mayotte',
                'phonecode'    => 269,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'MX',
                'name'         => 'Mexico',
                'phonecode'    => 52,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'FM',
                'name'         => 'Micronesia, Federated States of',
                'phonecode'    => 691,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'MD',
                'name'         => 'Moldova, Republic of',
                'phonecode'    => 373,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'MC',
                'name'         => 'Monaco',
                'phonecode'    => 377,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'MN',
                'name'         => 'Mongolia',
                'phonecode'    => 976,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'MS',
                'name'         => 'Montserrat',
                'phonecode'    => 1664,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'MA',
                'name'         => 'Morocco',
                'phonecode'    => 212,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'MZ',
                'name'         => 'Mozambique',
                'phonecode'    => 258,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'MM',
                'name'         => 'Myanmar',
                'phonecode'    => 95,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'NA',
                'name'         => 'Namibia',
                'phonecode'    => 264,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'NR',
                'name'         => 'Nauru',
                'phonecode'    => 674,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'NP',
                'name'         => 'Nepal',
                'phonecode'    => 977,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'NL',
                'name'         => 'Netherlands',
                'phonecode'    => 31,
                'is_eu_member' => 1
            ],

            [
                'id'           => 'AN',
                'name'         => 'Netherlands Antilles',
                'phonecode'    => 599,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'NC',
                'name'         => 'New Caledonia',
                'phonecode'    => 687,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'NZ',
                'name'         => 'New Zealand',
                'phonecode'    => 64,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'NI',
                'name'         => 'Nicaragua',
                'phonecode'    => 505,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'NE',
                'name'         => 'Niger',
                'phonecode'    => 227,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'NG',
                'name'         => 'Nigeria',
                'phonecode'    => 234,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'NU',
                'name'         => 'Niue',
                'phonecode'    => 683,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'NF',
                'name'         => 'Norfolk Island',
                'phonecode'    => 672,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'MP',
                'name'         => 'Northern Mariana Islands',
                'phonecode'    => 1670,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'NO',
                'name'         => 'Norway',
                'phonecode'    => 47,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'OM',
                'name'         => 'Oman',
                'phonecode'    => 968,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'PK',
                'name'         => 'Pakistan',
                'phonecode'    => 92,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'PW',
                'name'         => 'Palau',
                'phonecode'    => 680,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'PS',
                'name'         => 'Palestinian Territory, Occupied',
                'phonecode'    => 970,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'PA',
                'name'         => 'Panama',
                'phonecode'    => 507,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'PG',
                'name'         => 'Papua New Guinea',
                'phonecode'    => 675,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'PY',
                'name'         => 'Paraguay',
                'phonecode'    => 595,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'PE',
                'name'         => 'Peru',
                'phonecode'    => 51,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'PH',
                'name'         => 'Philippines',
                'phonecode'    => 63,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'PN',
                'name'         => 'Pitcairn',
                'phonecode'    => 0,
                'is_eu_member' => 0
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
                'id'           => 'PR',
                'name'         => 'Puerto Rico',
                'phonecode'    => 1787,
                'is_eu_member' => 0
            ]

        ]);

        \DB::table('countries')->insert([

            [
                'id'           => 'QA',
                'name'         => 'Qatar',
                'phonecode'    => 974,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'RE',
                'name'         => 'Reunion',
                'phonecode'    => 262,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'RO',
                'name'         => 'Romania',
                'phonecode'    => 40,
                'is_eu_member' => 1
            ],

            [
                'id'           => 'RU',
                'name'         => 'Russian Federation',
                'phonecode'    => 7,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'RW',
                'name'         => 'Rwanda',
                'phonecode'    => 250,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'SH',
                'name'         => 'Saint Helena',
                'phonecode'    => 290,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'KN',
                'name'         => 'Saint Kitts and Nevis',
                'phonecode'    => 1869,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'LC',
                'name'         => 'Saint Lucia',
                'phonecode'    => 1758,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'PM',
                'name'         => 'Saint Pierre and Miquelon',
                'phonecode'    => 508,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'VC',
                'name'         => 'Saint Vincent and the Grenadines',
                'phonecode'    => 1784,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'WS',
                'name'         => 'Samoa',
                'phonecode'    => 684,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'SM',
                'name'         => 'San Marino',
                'phonecode'    => 378,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'ST',
                'name'         => 'Sao Tome and Principe',
                'phonecode'    => 239,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'SA',
                'name'         => 'Saudi Arabia',
                'phonecode'    => 966,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'SN',
                'name'         => 'Senegal',
                'phonecode'    => 221,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'SC',
                'name'         => 'Seychelles',
                'phonecode'    => 248,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'SL',
                'name'         => 'Sierra Leone',
                'phonecode'    => 232,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'SG',
                'name'         => 'Singapore',
                'phonecode'    => 65,
                'is_eu_member' => 0
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
                'id'           => 'SB',
                'name'         => 'Solomon Islands',
                'phonecode'    => 677,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'SO',
                'name'         => 'Somalia',
                'phonecode'    => 252,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'ZA',
                'name'         => 'South Africa',
                'phonecode'    => 27,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'GS',
                'name'         => 'South Georgia and the South Sandwich Islands',
                'phonecode'    => 0,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'ES',
                'name'         => 'Spain',
                'phonecode'    => 34,
                'is_eu_member' => 1
            ],

            [
                'id'           => 'LK',
                'name'         => 'Sri Lanka',
                'phonecode'    => 94,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'SD',
                'name'         => 'Sudan',
                'phonecode'    => 249,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'SR',
                'name'         => 'Suriname',
                'phonecode'    => 597,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'SJ',
                'name'         => 'Svalbard and Jan Mayen',
                'phonecode'    => 47,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'SZ',
                'name'         => 'Swaziland',
                'phonecode'    => 268,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'SE',
                'name'         => 'Sweden',
                'phonecode'    => 46,
                'is_eu_member' => 1
            ],

            [
                'id'           => 'CH',
                'name'         => 'Switzerland',
                'phonecode'    => 41,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'SY',
                'name'         => 'Syrian Arab Republic',
                'phonecode'    => 963,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'TW',
                'name'         => 'Taiwan, Province of China',
                'phonecode'    => 886,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'TJ',
                'name'         => 'Tajikistan',
                'phonecode'    => 992,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'TZ',
                'name'         => 'Tanzania, United Republic of',
                'phonecode'    => 255,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'TH',
                'name'         => 'Thailand',
                'phonecode'    => 66,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'TL',
                'name'         => 'Timor-Leste',
                'phonecode'    => 670,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'TG',
                'name'         => 'Togo',
                'phonecode'    => 228,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'TK',
                'name'         => 'Tokelau',
                'phonecode'    => 690,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'TO',
                'name'         => 'Tonga',
                'phonecode'    => 676,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'TT',
                'name'         => 'Trinidad and Tobago',
                'phonecode'    => 1868,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'TN',
                'name'         => 'Tunisia',
                'phonecode'    => 216,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'TR',
                'name'         => 'Turkey',
                'phonecode'    => 90,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'TM',
                'name'         => 'Turkmenistan',
                'phonecode'    => 7370,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'TC',
                'name'         => 'Turks and Caicos Islands',
                'phonecode'    => 1649,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'TV',
                'name'         => 'Tuvalu',
                'phonecode'    => 688,
                'is_eu_member' => 0
            ]

        ]);

        \DB::table('countries')->insert([

            [
                'id'           => 'UG',
                'name'         => 'Uganda',
                'phonecode'    => 256,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'UA',
                'name'         => 'Ukraine',
                'phonecode'    => 380,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'AE',
                'name'         => 'United Arab Emirates',
                'phonecode'    => 971,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'GB',
                'name'         => 'United Kingdom',
                'phonecode'    => 44,
                'is_eu_member' => 1
            ],

            [
                'id'           => 'US',
                'name'         => 'United States',
                'phonecode'    => 1,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'UM',
                'name'         => 'United States Minor Outlying Islands',
                'phonecode'    => 1,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'UY',
                'name'         => 'Uruguay',
                'phonecode'    => 598,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'UZ',
                'name'         => 'Uzbekistan',
                'phonecode'    => 998,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'VU',
                'name'         => 'Vanuatu',
                'phonecode'    => 678,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'VE',
                'name'         => 'Venezuela',
                'phonecode'    => 58,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'VN',
                'name'         => 'Viet Nam',
                'phonecode'    => 84,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'VG',
                'name'         => 'Virgin Islands, British',
                'phonecode'    => 1284,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'VI',
                'name'         => 'Virgin Islands, U.s.',
                'phonecode'    => 1340,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'WF',
                'name'         => 'Wallis and Futuna',
                'phonecode'    => 681,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'EH',
                'name'         => 'Western Sahara',
                'phonecode'    => 212,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'YE',
                'name'         => 'Yemen',
                'phonecode'    => 967,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'ZM',
                'name'         => 'Zambia',
                'phonecode'    => 260,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'ZW',
                'name'         => 'Zimbabwe',
                'phonecode'    => 263,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'RS',
                'name'         => 'Serbia',
                'phonecode'    => 381,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'AP',
                'name'         => 'Asia / Pacific Region',
                'phonecode'    => 0,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'ME',
                'name'         => 'Montenegro',
                'phonecode'    => 382,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'AX',
                'name'         => 'Aland Islands',
                'phonecode'    => 358,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'BQ',
                'name'         => 'Bonaire, Sint Eustatius and Saba',
                'phonecode'    => 599,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'CW',
                'name'         => 'Curacao',
                'phonecode'    => 599,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'GG',
                'name'         => 'Guernsey',
                'phonecode'    => 44,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'IM',
                'name'         => 'Isle of Man',
                'phonecode'    => 44,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'JE',
                'name'         => 'Jersey',
                'phonecode'    => 44,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'XK',
                'name'         => 'Kosovo',
                'phonecode'    => 381,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'BL',
                'name'         => 'Saint Barthelemy',
                'phonecode'    => 590,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'MF',
                'name'         => 'Saint Martin',
                'phonecode'    => 590,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'SX',
                'name'         => 'Sint Maarten',
                'phonecode'    => 1,
                'is_eu_member' => 0
            ],

            [
                'id'           => 'SS',
                'name'         => 'South Sudan',
                'phonecode'    => 211,
                'is_eu_member' => 0
            ],

        ]);
    }
}
