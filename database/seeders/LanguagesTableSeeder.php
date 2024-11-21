<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = [
            ['code' => 'af', 'name' => 'Afrikaans'],
            ['code' => 'sq', 'name' => 'Albanian'],
            ['code' => 'am', 'name' => 'Amharic'],
            ['code' => 'ar', 'name' => 'Arabic'],
            ['code' => 'hy', 'name' => 'Armenian'],
            ['code' => 'az', 'name' => 'Azerbaijani'],
            ['code' => 'eu', 'name' => 'Basque'],
            ['code' => 'be', 'name' => 'Belarusian'],
            ['code' => 'bn', 'name' => 'Bengali'],
            ['code' => 'bs', 'name' => 'Bosnian'],
            ['code' => 'bg', 'name' => 'Bulgarian'],
            ['code' => 'ca', 'name' => 'Catalan'],
            ['code' => 'zh', 'name' => 'Chinese'],
            ['code' => 'hr', 'name' => 'Croatian'],
            ['code' => 'cs', 'name' => 'Czech'],
            ['code' => 'da', 'name' => 'Danish'],
            ['code' => 'nl', 'name' => 'Dutch'],
            ['code' => 'en', 'name' => 'English'],
            ['code' => 'et', 'name' => 'Estonian'],
            ['code' => 'fi', 'name' => 'Finnish'],
            ['code' => 'fr', 'name' => 'French'],
            ['code' => 'ka', 'name' => 'Georgian'],
            ['code' => 'de', 'name' => 'German'],
            ['code' => 'el', 'name' => 'Greek'],
            ['code' => 'gu', 'name' => 'Gujarati'],
            ['code' => 'he', 'name' => 'Hebrew'],
            ['code' => 'hi', 'name' => 'Hindi'],
            ['code' => 'hu', 'name' => 'Hungarian'],
            ['code' => 'is', 'name' => 'Icelandic'],
            ['code' => 'id', 'name' => 'Indonesian'],
            ['code' => 'it', 'name' => 'Italian'],
            ['code' => 'ja', 'name' => 'Japanese'],
            ['code' => 'kn', 'name' => 'Kannada'],
            ['code' => 'kk', 'name' => 'Kazakh'],
            ['code' => 'ko', 'name' => 'Korean'],
            ['code' => 'lv', 'name' => 'Latvian'],
            ['code' => 'lt', 'name' => 'Lithuanian'],
            ['code' => 'mk', 'name' => 'Macedonian'],
            ['code' => 'ml', 'name' => 'Malayalam'],
            ['code' => 'mn', 'name' => 'Mongolian'],
            ['code' => 'ne', 'name' => 'Nepali'],
            ['code' => 'no', 'name' => 'Norwegian'],
            ['code' => 'fa', 'name' => 'Persian'],
            ['code' => 'pl', 'name' => 'Polish'],
            ['code' => 'pt', 'name' => 'Portuguese'],
            ['code' => 'ro', 'name' => 'Romanian'],
            ['code' => 'ru', 'name' => 'Russian'],
            ['code' => 'sr', 'name' => 'Serbian'],
            ['code' => 'sk', 'name' => 'Slovak'],
            ['code' => 'sl', 'name' => 'Slovenian'],
            ['code' => 'es', 'name' => 'Spanish'],
            ['code' => 'sw', 'name' => 'Swahili'],
            ['code' => 'sv', 'name' => 'Swedish'],
            ['code' => 'ta', 'name' => 'Tamil'],
            ['code' => 'te', 'name' => 'Telugu'],
            ['code' => 'th', 'name' => 'Thai'],
            ['code' => 'tr', 'name' => 'Turkish'],
            ['code' => 'uk', 'name' => 'Ukrainian'],
            ['code' => 'ur', 'name' => 'Urdu'],
            ['code' => 'vi', 'name' => 'Vietnamese'],
            ['code' => 'cy', 'name' => 'Welsh'],
        ];
        

        DB::table('tbl_languages')->insert($languages);
    }
}
