<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    public function run(): void
    {
        $countries = [
            ['code' => 'AF', 'name' => 'Afghanistan',          'phone_code' => '+93',  'currency_code' => 'AFN', 'emoji_flag' => '🇦🇫', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'AL', 'name' => 'Albania',              'phone_code' => '+355', 'currency_code' => 'ALL', 'emoji_flag' => '🇦🇱', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'DZ', 'name' => 'Algeria',              'phone_code' => '+213', 'currency_code' => 'DZD', 'emoji_flag' => '🇩🇿', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'AR', 'name' => 'Argentina',            'phone_code' => '+54',  'currency_code' => 'ARS', 'emoji_flag' => '🇦🇷', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'AU', 'name' => 'Australia',            'phone_code' => '+61',  'currency_code' => 'AUD', 'emoji_flag' => '🇦🇺', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'AT', 'name' => 'Austria',              'phone_code' => '+43',  'currency_code' => 'EUR', 'emoji_flag' => '🇦🇹', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'BD', 'name' => 'Bangladesh',           'phone_code' => '+880', 'currency_code' => 'BDT', 'emoji_flag' => '🇧🇩', 'is_register_allowed' => true,  'sort_order' => 1],
            ['code' => 'BE', 'name' => 'Belgium',              'phone_code' => '+32',  'currency_code' => 'EUR', 'emoji_flag' => '🇧🇪', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'BR', 'name' => 'Brazil',               'phone_code' => '+55',  'currency_code' => 'BRL', 'emoji_flag' => '🇧🇷', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'CA', 'name' => 'Canada',               'phone_code' => '+1',   'currency_code' => 'CAD', 'emoji_flag' => '🇨🇦', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'CN', 'name' => 'China',                'phone_code' => '+86',  'currency_code' => 'CNY', 'emoji_flag' => '🇨🇳', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'DK', 'name' => 'Denmark',              'phone_code' => '+45',  'currency_code' => 'DKK', 'emoji_flag' => '🇩🇰', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'EG', 'name' => 'Egypt',                'phone_code' => '+20',  'currency_code' => 'EGP', 'emoji_flag' => '🇪🇬', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'FI', 'name' => 'Finland',              'phone_code' => '+358', 'currency_code' => 'EUR', 'emoji_flag' => '🇫🇮', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'FR', 'name' => 'France',               'phone_code' => '+33',  'currency_code' => 'EUR', 'emoji_flag' => '🇫🇷', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'DE', 'name' => 'Germany',              'phone_code' => '+49',  'currency_code' => 'EUR', 'emoji_flag' => '🇩🇪', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'GH', 'name' => 'Ghana',                'phone_code' => '+233', 'currency_code' => 'GHS', 'emoji_flag' => '🇬🇭', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'GR', 'name' => 'Greece',               'phone_code' => '+30',  'currency_code' => 'EUR', 'emoji_flag' => '🇬🇷', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'IN', 'name' => 'India',                'phone_code' => '+91',  'currency_code' => 'INR', 'emoji_flag' => '🇮🇳', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'ID', 'name' => 'Indonesia',            'phone_code' => '+62',  'currency_code' => 'IDR', 'emoji_flag' => '🇮🇩', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'IR', 'name' => 'Iran',                 'phone_code' => '+98',  'currency_code' => 'IRR', 'emoji_flag' => '🇮🇷', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'IQ', 'name' => 'Iraq',                 'phone_code' => '+964', 'currency_code' => 'IQD', 'emoji_flag' => '🇮🇶', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'IE', 'name' => 'Ireland',              'phone_code' => '+353', 'currency_code' => 'EUR', 'emoji_flag' => '🇮🇪', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'IL', 'name' => 'Israel',               'phone_code' => '+972', 'currency_code' => 'ILS', 'emoji_flag' => '🇮🇱', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'IT', 'name' => 'Italy',                'phone_code' => '+39',  'currency_code' => 'EUR', 'emoji_flag' => '🇮🇹', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'JP', 'name' => 'Japan',                'phone_code' => '+81',  'currency_code' => 'JPY', 'emoji_flag' => '🇯🇵', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'JO', 'name' => 'Jordan',               'phone_code' => '+962', 'currency_code' => 'JOD', 'emoji_flag' => '🇯🇴', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'KE', 'name' => 'Kenya',                'phone_code' => '+254', 'currency_code' => 'KES', 'emoji_flag' => '🇰🇪', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'KW', 'name' => 'Kuwait',               'phone_code' => '+965', 'currency_code' => 'KWD', 'emoji_flag' => '🇰🇼', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'MY', 'name' => 'Malaysia',             'phone_code' => '+60',  'currency_code' => 'MYR', 'emoji_flag' => '🇲🇾', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'MX', 'name' => 'Mexico',               'phone_code' => '+52',  'currency_code' => 'MXN', 'emoji_flag' => '🇲🇽', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'MA', 'name' => 'Morocco',              'phone_code' => '+212', 'currency_code' => 'MAD', 'emoji_flag' => '🇲🇦', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'NL', 'name' => 'Netherlands',          'phone_code' => '+31',  'currency_code' => 'EUR', 'emoji_flag' => '🇳🇱', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'NZ', 'name' => 'New Zealand',          'phone_code' => '+64',  'currency_code' => 'NZD', 'emoji_flag' => '🇳🇿', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'NG', 'name' => 'Nigeria',              'phone_code' => '+234', 'currency_code' => 'NGN', 'emoji_flag' => '🇳🇬', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'NO', 'name' => 'Norway',               'phone_code' => '+47',  'currency_code' => 'NOK', 'emoji_flag' => '🇳🇴', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'PK', 'name' => 'Pakistan',             'phone_code' => '+92',  'currency_code' => 'PKR', 'emoji_flag' => '🇵🇰', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'PH', 'name' => 'Philippines',          'phone_code' => '+63',  'currency_code' => 'PHP', 'emoji_flag' => '🇵🇭', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'PL', 'name' => 'Poland',               'phone_code' => '+48',  'currency_code' => 'PLN', 'emoji_flag' => '🇵🇱', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'PT', 'name' => 'Portugal',             'phone_code' => '+351', 'currency_code' => 'EUR', 'emoji_flag' => '🇵🇹', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'QA', 'name' => 'Qatar',                'phone_code' => '+974', 'currency_code' => 'QAR', 'emoji_flag' => '🇶🇦', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'RO', 'name' => 'Romania',              'phone_code' => '+40',  'currency_code' => 'RON', 'emoji_flag' => '🇷🇴', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'RU', 'name' => 'Russia',               'phone_code' => '+7',   'currency_code' => 'RUB', 'emoji_flag' => '🇷🇺', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'SA', 'name' => 'Saudi Arabia',         'phone_code' => '+966', 'currency_code' => 'SAR', 'emoji_flag' => '🇸🇦', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'SG', 'name' => 'Singapore',            'phone_code' => '+65',  'currency_code' => 'SGD', 'emoji_flag' => '🇸🇬', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'ZA', 'name' => 'South Africa',         'phone_code' => '+27',  'currency_code' => 'ZAR', 'emoji_flag' => '🇿🇦', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'KR', 'name' => 'South Korea',          'phone_code' => '+82',  'currency_code' => 'KRW', 'emoji_flag' => '🇰🇷', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'ES', 'name' => 'Spain',                'phone_code' => '+34',  'currency_code' => 'EUR', 'emoji_flag' => '🇪🇸', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'LK', 'name' => 'Sri Lanka',            'phone_code' => '+94',  'currency_code' => 'LKR', 'emoji_flag' => '🇱🇰', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'SE', 'name' => 'Sweden',               'phone_code' => '+46',  'currency_code' => 'SEK', 'emoji_flag' => '🇸🇪', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'CH', 'name' => 'Switzerland',          'phone_code' => '+41',  'currency_code' => 'CHF', 'emoji_flag' => '🇨🇭', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'TH', 'name' => 'Thailand',             'phone_code' => '+66',  'currency_code' => 'THB', 'emoji_flag' => '🇹🇭', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'TR', 'name' => 'Turkey',               'phone_code' => '+90',  'currency_code' => 'TRY', 'emoji_flag' => '🇹🇷', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'UA', 'name' => 'Ukraine',              'phone_code' => '+380', 'currency_code' => 'UAH', 'emoji_flag' => '🇺🇦', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'AE', 'name' => 'United Arab Emirates', 'phone_code' => '+971', 'currency_code' => 'AED', 'emoji_flag' => '🇦🇪', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'GB', 'name' => 'United Kingdom',       'phone_code' => '+44',  'currency_code' => 'GBP', 'emoji_flag' => '🇬🇧', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'US', 'name' => 'United States',        'phone_code' => '+1',   'currency_code' => 'USD', 'emoji_flag' => '🇺🇸', 'is_register_allowed' => false, 'sort_order' => 0],
            ['code' => 'VN', 'name' => 'Vietnam',              'phone_code' => '+84',  'currency_code' => 'VND', 'emoji_flag' => '🇻🇳', 'is_register_allowed' => false, 'sort_order' => 0],
        ];

        foreach ($countries as $country) {
            DB::table('countries')->updateOrInsert(
                ['code' => $country['code']],
                array_merge($country, ['updated_at' => now()])
            );
        }
    }
}
