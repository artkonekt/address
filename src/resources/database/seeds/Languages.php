<?php

declare(strict_types=1);

/**
 * Contains the Languages class.
 *
 * @copyright   Copyright (c) 2023 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2023-04-08
 *
 */

namespace Konekt\Address\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Languages extends Seeder
{
    public function run(): void
    {
        DB::table('languages')->upsert(
            [
            ['id' => 'aa', 'name' => 'Afar', 'native_name' => 'Qafaraf'],
            ['id' => 'ab', 'name' => 'Abkhazian', 'native_name' => 'Аԥсуа бызшәа'],
            ['id' => 'af', 'name' => 'Afrikaans', 'native_name' => 'Afrikaans'],
            ['id' => 'am', 'name' => 'Amharic', 'native_name' => 'አማርኛ'],
            ['id' => 'an', 'name' => 'Aragonese', 'native_name' => 'aragonés'],
            ['id' => 'ar', 'name' => 'Arabic', 'native_name' => 'العربية'],
            ['id' => 'as', 'name' => 'Assamese', 'native_name' => 'অসমীয়া'],
            ['id' => 'av', 'name' => 'Avaric', 'native_name' => 'Магӏарул мацӏ'],
            ['id' => 'ay', 'name' => 'Aymara', 'native_name' => 'Aymar'],
            ['id' => 'az', 'name' => 'Azerbaijani', 'native_name' => 'azərbaycan dili'],
            ['id' => 'ba', 'name' => 'Bashkir', 'native_name' => 'Башҡортса'],
            ['id' => 'be', 'name' => 'Belarusian', 'native_name' => 'беларуская'],
            ['id' => 'bg', 'name' => 'Bulgarian', 'native_name' => 'български'],
            ['id' => 'bm', 'name' => 'Bambara', 'native_name' => 'Bamana'],
            ['id' => 'bn', 'name' => 'Bengali', 'native_name' => 'বাংলা'],
            ['id' => 'bo', 'name' => 'Tibetan', 'native_name' => 'བོད་སྐད་'],
            ['id' => 'br', 'name' => 'Breton', 'native_name' => 'brezhoneg'],
            ['id' => 'bs', 'name' => 'Bosnian', 'native_name' => 'bosanski'],
            ['id' => 'ca', 'name' => 'Catalan', 'native_name' => 'català'],
            ['id' => 'ce', 'name' => 'Chechen', 'native_name' => 'Нохчийн мотт'],
            ['id' => 'co', 'name' => 'Corsican', 'native_name' => 'Corsican'],
            ['id' => 'cr', 'name' => 'Cree', 'native_name' => 'Cree'],
            ['id' => 'cs', 'name' => 'Czech', 'native_name' => 'čeština'],
            ['id' => 'cv', 'name' => 'Chuvash', 'native_name' => 'Чӑвашла'],
            ['id' => 'cy', 'name' => 'Welsh', 'native_name' => 'Cymraeg'],
            ['id' => 'da', 'name' => 'Danish', 'native_name' => 'dansk'],
            ['id' => 'de', 'name' => 'German', 'native_name' => 'Deutsch'],
            ['id' => 'dv', 'name' => 'Divehi', 'native_name' => 'Dhivehi'],
            ['id' => 'dz', 'name' => 'Dzongkha', 'native_name' => 'རྫོང་ཁ'],
            ['id' => 'ee', 'name' => 'Ewe', 'native_name' => 'Eʋegbe'],
            ['id' => 'el', 'name' => 'Greek', 'native_name' => 'Ελληνικά'],
            ['id' => 'en', 'name' => 'English', 'native_name' => 'English'],
            ['id' => 'eo', 'name' => 'Esperanto', 'native_name' => 'esperanto'],
            ['id' => 'es', 'name' => 'Spanish', 'native_name' => 'español'],
            ['id' => 'et', 'name' => 'Estonian', 'native_name' => 'eesti'],
            ['id' => 'eu', 'name' => 'Basque', 'native_name' => 'euskara'],
            ['id' => 'fa', 'name' => 'Persian', 'native_name' => 'فارسی'],
            ['id' => 'ff', 'name' => 'Fulah', 'native_name' => 'Fulani'],
            ['id' => 'fi', 'name' => 'Finnish', 'native_name' => 'suomi'],
            ['id' => 'fj', 'name' => 'Fijian', 'native_name' => 'Vosa Vaka-Viti'],
            ['id' => 'fo', 'name' => 'Faroese', 'native_name' => 'føroyskt'],
            ['id' => 'fr', 'name' => 'French', 'native_name' => 'français'],
            ['id' => 'fy', 'name' => 'Western Frisian', 'native_name' => 'Western Frisian'],
            ['id' => 'ga', 'name' => 'Irish', 'native_name' => 'Gaeilge'],
            ['id' => 'gd', 'name' => 'Scottish Gaelic', 'native_name' => 'Scottish Gaelic'],
            ['id' => 'gl', 'name' => 'Galician', 'native_name' => 'galego'],
            ['id' => 'gn', 'name' => 'Guarani', 'native_name' => 'Guarani'],
            ['id' => 'gu', 'name' => 'Gujarati', 'native_name' => 'ગુજરાતી'],
            ['id' => 'ha', 'name' => 'Hausa', 'native_name' => 'Hausa'],
            ['id' => 'he', 'name' => 'Hebrew', 'native_name' => 'עברית'],
            ['id' => 'hi', 'name' => 'Hindi', 'native_name' => 'हिन्दी'],
            ['id' => 'hr', 'name' => 'Croatian', 'native_name' => 'hrvatski'],
            ['id' => 'ht', 'name' => 'Haitian', 'native_name' => 'kreyòl ayisyen'],
            ['id' => 'hu', 'name' => 'Hungarian', 'native_name' => 'magyar'],
            ['id' => 'hy', 'name' => 'Armenian', 'native_name' => 'հայերեն'],
            ['id' => 'ia', 'name' => 'Interlingua', 'native_name' => 'Interlingua'],
            ['id' => 'id', 'name' => 'Indonesian', 'native_name' => 'Indonesia'],
            ['id' => 'ig', 'name' => 'Igbo', 'native_name' => 'Ásụ̀sụ́ Ìgbò'],
            ['id' => 'is', 'name' => 'Icelandic', 'native_name' => 'íslenska'],
            ['id' => 'it', 'name' => 'Italian', 'native_name' => 'italiano'],
            ['id' => 'ja', 'name' => 'Japanese', 'native_name' => '日本語'],
            ['id' => 'jv', 'name' => 'Javanese', 'native_name' => 'basa Jawa'],
            ['id' => 'ka', 'name' => 'Georgian', 'native_name' => 'ქართული'],
            ['id' => 'kg', 'name' => 'Kongo', 'native_name' => 'Kikongo'],
            ['id' => 'ki', 'name' => 'Kikuyu', 'native_name' => 'Gĩgĩkũyũ'],
            ['id' => 'kk', 'name' => 'Kazakh', 'native_name' => 'қазақ тілі'],
            ['id' => 'km', 'name' => 'Khmer', 'native_name' => 'ខ្មែរ'],
            ['id' => 'kn', 'name' => 'Kannada', 'native_name' => 'ಕನ್ನಡ'],
            ['id' => 'ko', 'name' => 'Korean', 'native_name' => '한국어'],
            ['id' => 'kr', 'name' => 'Kanuri', 'native_name' => 'Kànùrí'],
            ['id' => 'ku', 'name' => 'Kurdish', 'native_name' => 'Kurdî'],
            ['id' => 'ks', 'name' => 'Kashmiri', 'native_name' => 'كٲشُر'],
            ['id' => 'ky', 'name' => 'Kyrgyz', 'native_name' => 'кыргызча'],
            ['id' => 'la', 'name' => 'Latin', 'native_name' => 'Latin'],
            ['id' => 'lb', 'name' => 'Luxembourgish', 'native_name' => 'Lëtzebuergesch'],
            ['id' => 'lg', 'name' => 'Ganda', 'native_name' => 'Oluganda'],
            ['id' => 'li', 'name' => 'Limburgish', 'native_name' => 'Lèmburgs'],
            ['id' => 'ln', 'name' => 'Lingala', 'native_name' => 'lingála'],
            ['id' => 'lo', 'name' => 'Lao', 'native_name' => 'ລາວ'],
            ['id' => 'lu', 'name' => 'Luba-Katanga', 'native_name' => 'Kiluba'],
            ['id' => 'lt', 'name' => 'Lithuanian', 'native_name' => 'lietuvių'],
            ['id' => 'lv', 'name' => 'Latvian', 'native_name' => 'latviešu'],
            ['id' => 'mg', 'name' => 'Malagasy', 'native_name' => 'malagasy'],
            ['id' => 'mk', 'name' => 'Macedonian', 'native_name' => 'македонски'],
            ['id' => 'ml', 'name' => 'Malayalam', 'native_name' => 'മലയാളം'],
            ['id' => 'mn', 'name' => 'Mongolian', 'native_name' => 'монгол'],
            ['id' => 'mr', 'name' => 'Marathi', 'native_name' => 'मराठी'],
            ['id' => 'ms', 'name' => 'Malay', 'native_name' => 'Bahasa Melayu'],
            ['id' => 'mt', 'name' => 'Maltese', 'native_name' => 'Malti'],
            ['id' => 'my', 'name' => 'Burmese', 'native_name' => 'မြန်မာစာ'],
            ['id' => 'nd', 'name' => 'Northern Ndebele', 'native_name' => 'isiNdebele'],
            ['id' => 'ne', 'name' => 'Nepali', 'native_name' => 'नेपाली'],
            ['id' => 'nl', 'name' => 'Dutch', 'native_name' => 'Nederlands'],
            ['id' => 'no', 'name' => 'Norwegian', 'native_name' => 'norsk'],
            ['id' => 'nr', 'name' => 'Southern Ndebele', 'native_name' => 'isiNdebele seSewula'],
            ['id' => 'nv', 'name' => 'Navajo', 'native_name' => 'Diné Bizaad'],
            ['id' => 'oc', 'name' => 'Occitan', 'native_name' => 'Occitan'],
            ['id' => 'om', 'name' => 'Oromo', 'native_name' => 'Oromoo'],
            ['id' => 'or', 'name' => 'Oriya', 'native_name' => 'ଓଡ଼ିଆ'],
            ['id' => 'os', 'name' => 'Ossetian', 'native_name' => 'ирон ӕвзаг'],
            ['id' => 'pa', 'name' => 'Punjabi', 'native_name' => 'ਪੰਜਾਬੀ'],
            ['id' => 'pl', 'name' => 'Polish', 'native_name' => 'polski'],
            ['id' => 'ps', 'name' => 'Pashto', 'native_name' => 'پښتو'],
            ['id' => 'pt', 'name' => 'Portuguese', 'native_name' => 'português'],
            ['id' => 'qu', 'name' => 'Quechua', 'native_name' => 'Quechua'],
            ['id' => 'rm', 'name' => 'Romansh', 'native_name' => 'rumantsch'],
            ['id' => 'rn', 'name' => 'Rundi', 'native_name' => 'Ikirundi'],
            ['id' => 'ro', 'name' => 'Romanian', 'native_name' => 'română'],
            ['id' => 'ru', 'name' => 'Russian', 'native_name' => 'русский'],
            ['id' => 'rw', 'name' => 'Kinyarwanda', 'native_name' => 'Ikinyarwanda'],
            ['id' => 'sc', 'name' => 'Sardinian', 'native_name' => 'sardu'],
            ['id' => 'sd', 'name' => 'Sindhi', 'native_name' => 'Sindhi'],
            ['id' => 'se', 'name' => 'Northern Sámi', 'native_name' => 'davvisámegiella'],
            ['id' => 'sg', 'name' => 'Sango', 'native_name' => 'yângâ tî sängö'],
            ['id' => 'si', 'name' => 'Sinhala', 'native_name' => 'සිංහල'],
            ['id' => 'sk', 'name' => 'Slovak', 'native_name' => 'slovenčina'],
            ['id' => 'sl', 'name' => 'Slovenian', 'native_name' => 'slovenščina'],
            ['id' => 'sm', 'name' => 'Samoan', 'native_name' => 'Gagana faʻa Sāmoa'],
            ['id' => 'sn', 'name' => 'Shona', 'native_name' => 'chiShona'],
            ['id' => 'so', 'name' => 'Somali', 'native_name' => 'Soomaali'],
            ['id' => 'sq', 'name' => 'Albanian', 'native_name' => 'shqip'],
            ['id' => 'sr', 'name' => 'Serbian', 'native_name' => 'српски'],
            ['id' => 'ss', 'name' => 'Swazi', 'native_name' => 'siSwati'],
            ['id' => 'st', 'name' => 'Southern Sotho', 'native_name' => 'Southern Sotho'],
            ['id' => 'su', 'name' => 'Sundanese', 'native_name' => 'Sundanese'],
            ['id' => 'sv', 'name' => 'Swedish', 'native_name' => 'svenska'],
            ['id' => 'sw', 'name' => 'Swahili', 'native_name' => 'Kiswahili'],
            ['id' => 'ta', 'name' => 'Tamil', 'native_name' => 'தமிழ்'],
            ['id' => 'te', 'name' => 'Telugu', 'native_name' => 'తెలుగు'],
            ['id' => 'tg', 'name' => 'Tajik', 'native_name' => 'тоҷикӣ'],
            ['id' => 'th', 'name' => 'Thai', 'native_name' => 'ไทย'],
            ['id' => 'ti', 'name' => 'Tigrinya', 'native_name' => 'ትግርኛ'],
            ['id' => 'tk', 'name' => 'Turkmen', 'native_name' => 'Turkmen'],
            ['id' => 'tl', 'name' => 'Tagalog', 'native_name' => 'Tagalog'],
            ['id' => 'tn', 'name' => 'Tswana', 'native_name' => 'Setswana'],
            ['id' => 'to', 'name' => 'Tongan', 'native_name' => 'lea fakatonga'],
            ['id' => 'tr', 'name' => 'Turkish', 'native_name' => 'Türkçe'],
            ['id' => 'ts', 'name' => 'Tsonga', 'native_name' => 'Xitsonga'],
            ['id' => 'tt', 'name' => 'Tatar', 'native_name' => 'Tatar'],
            ['id' => 'tw', 'name' => 'Twi', 'native_name' => 'Twi'],
            ['id' => 'ug', 'name' => 'Uyghur', 'native_name' => 'ئۇيغۇرچە'],
            ['id' => 'uk', 'name' => 'Ukrainian', 'native_name' => 'українська'],
            ['id' => 'ur', 'name' => 'Urdu', 'native_name' => 'اردو'],
            ['id' => 'uz', 'name' => 'Uzbek', 'native_name' => 'o‘zbek'],
            ['id' => 've', 'name' => 'Venda', 'native_name' => 'Tshivenḓa'],
            ['id' => 'vi', 'name' => 'Vietnamese', 'native_name' => 'Tiếng Việt'],
            ['id' => 'wa', 'name' => 'Walloon', 'native_name' => 'wa'],
            ['id' => 'xh', 'name' => 'Xhosa', 'native_name' => 'Xhosa'],
            ['id' => 'yi', 'name' => 'Yiddish', 'native_name' => 'Yiddish'],
            ['id' => 'yo', 'name' => 'Yoruba', 'native_name' => 'Èdè Yorùbá'],
            ['id' => 'za', 'name' => 'Zhuang', 'native_name' => '話僮'],
            ['id' => 'zh', 'name' => 'Chinese', 'native_name' => '中文'],
            ['id' => 'zu', 'name' => 'Zulu', 'native_name' => 'isiZulu'],
        ],
            ['id'],
            ['name', 'native_name'],
        );
    }
}
