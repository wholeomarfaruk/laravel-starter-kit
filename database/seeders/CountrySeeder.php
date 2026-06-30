<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    public function run(): void
    {
        $countries = [
            ['name' => 'Afghanistan',         'code' => 'AF', 'phone_code' => '+93',  'currency_code' => 'AFN'],
            ['name' => 'Albania',             'code' => 'AL', 'phone_code' => '+355', 'currency_code' => 'ALL'],
            ['name' => 'Algeria',             'code' => 'DZ', 'phone_code' => '+213', 'currency_code' => 'DZD'],
            ['name' => 'Argentina',           'code' => 'AR', 'phone_code' => '+54',  'currency_code' => 'ARS'],
            ['name' => 'Australia',           'code' => 'AU', 'phone_code' => '+61',  'currency_code' => 'AUD'],
            ['name' => 'Austria',             'code' => 'AT', 'phone_code' => '+43',  'currency_code' => 'EUR'],
            ['name' => 'Bangladesh',          'code' => 'BD', 'phone_code' => '+880', 'currency_code' => 'BDT'],
            ['name' => 'Belgium',             'code' => 'BE', 'phone_code' => '+32',  'currency_code' => 'EUR'],
            ['name' => 'Brazil',              'code' => 'BR', 'phone_code' => '+55',  'currency_code' => 'BRL'],
            ['name' => 'Canada',              'code' => 'CA', 'phone_code' => '+1',   'currency_code' => 'CAD'],
            ['name' => 'China',               'code' => 'CN', 'phone_code' => '+86',  'currency_code' => 'CNY'],
            ['name' => 'Denmark',             'code' => 'DK', 'phone_code' => '+45',  'currency_code' => 'DKK'],
            ['name' => 'Egypt',               'code' => 'EG', 'phone_code' => '+20',  'currency_code' => 'EGP'],
            ['name' => 'Finland',             'code' => 'FI', 'phone_code' => '+358', 'currency_code' => 'EUR'],
            ['name' => 'France',              'code' => 'FR', 'phone_code' => '+33',  'currency_code' => 'EUR'],
            ['name' => 'Germany',             'code' => 'DE', 'phone_code' => '+49',  'currency_code' => 'EUR'],
            ['name' => 'Ghana',               'code' => 'GH', 'phone_code' => '+233', 'currency_code' => 'GHS'],
            ['name' => 'Greece',              'code' => 'GR', 'phone_code' => '+30',  'currency_code' => 'EUR'],
            ['name' => 'India',               'code' => 'IN', 'phone_code' => '+91',  'currency_code' => 'INR'],
            ['name' => 'Indonesia',           'code' => 'ID', 'phone_code' => '+62',  'currency_code' => 'IDR'],
            ['name' => 'Iran',                'code' => 'IR', 'phone_code' => '+98',  'currency_code' => 'IRR'],
            ['name' => 'Iraq',                'code' => 'IQ', 'phone_code' => '+964', 'currency_code' => 'IQD'],
            ['name' => 'Ireland',             'code' => 'IE', 'phone_code' => '+353', 'currency_code' => 'EUR'],
            ['name' => 'Israel',              'code' => 'IL', 'phone_code' => '+972', 'currency_code' => 'ILS'],
            ['name' => 'Italy',               'code' => 'IT', 'phone_code' => '+39',  'currency_code' => 'EUR'],
            ['name' => 'Japan',               'code' => 'JP', 'phone_code' => '+81',  'currency_code' => 'JPY'],
            ['name' => 'Jordan',              'code' => 'JO', 'phone_code' => '+962', 'currency_code' => 'JOD'],
            ['name' => 'Kenya',               'code' => 'KE', 'phone_code' => '+254', 'currency_code' => 'KES'],
            ['name' => 'Kuwait',              'code' => 'KW', 'phone_code' => '+965', 'currency_code' => 'KWD'],
            ['name' => 'Malaysia',            'code' => 'MY', 'phone_code' => '+60',  'currency_code' => 'MYR'],
            ['name' => 'Mexico',              'code' => 'MX', 'phone_code' => '+52',  'currency_code' => 'MXN'],
            ['name' => 'Morocco',             'code' => 'MA', 'phone_code' => '+212', 'currency_code' => 'MAD'],
            ['name' => 'Netherlands',         'code' => 'NL', 'phone_code' => '+31',  'currency_code' => 'EUR'],
            ['name' => 'New Zealand',         'code' => 'NZ', 'phone_code' => '+64',  'currency_code' => 'NZD'],
            ['name' => 'Nigeria',             'code' => 'NG', 'phone_code' => '+234', 'currency_code' => 'NGN'],
            ['name' => 'Norway',              'code' => 'NO', 'phone_code' => '+47',  'currency_code' => 'NOK'],
            ['name' => 'Pakistan',            'code' => 'PK', 'phone_code' => '+92',  'currency_code' => 'PKR'],
            ['name' => 'Philippines',         'code' => 'PH', 'phone_code' => '+63',  'currency_code' => 'PHP'],
            ['name' => 'Poland',              'code' => 'PL', 'phone_code' => '+48',  'currency_code' => 'PLN'],
            ['name' => 'Portugal',            'code' => 'PT', 'phone_code' => '+351', 'currency_code' => 'EUR'],
            ['name' => 'Qatar',               'code' => 'QA', 'phone_code' => '+974', 'currency_code' => 'QAR'],
            ['name' => 'Romania',             'code' => 'RO', 'phone_code' => '+40',  'currency_code' => 'RON'],
            ['name' => 'Russia',              'code' => 'RU', 'phone_code' => '+7',   'currency_code' => 'RUB'],
            ['name' => 'Saudi Arabia',        'code' => 'SA', 'phone_code' => '+966', 'currency_code' => 'SAR'],
            ['name' => 'Singapore',           'code' => 'SG', 'phone_code' => '+65',  'currency_code' => 'SGD'],
            ['name' => 'South Africa',        'code' => 'ZA', 'phone_code' => '+27',  'currency_code' => 'ZAR'],
            ['name' => 'South Korea',         'code' => 'KR', 'phone_code' => '+82',  'currency_code' => 'KRW'],
            ['name' => 'Spain',               'code' => 'ES', 'phone_code' => '+34',  'currency_code' => 'EUR'],
            ['name' => 'Sri Lanka',           'code' => 'LK', 'phone_code' => '+94',  'currency_code' => 'LKR'],
            ['name' => 'Sweden',              'code' => 'SE', 'phone_code' => '+46',  'currency_code' => 'SEK'],
            ['name' => 'Switzerland',         'code' => 'CH', 'phone_code' => '+41',  'currency_code' => 'CHF'],
            ['name' => 'Thailand',            'code' => 'TH', 'phone_code' => '+66',  'currency_code' => 'THB'],
            ['name' => 'Turkey',              'code' => 'TR', 'phone_code' => '+90',  'currency_code' => 'TRY'],
            ['name' => 'Ukraine',             'code' => 'UA', 'phone_code' => '+380', 'currency_code' => 'UAH'],
            ['name' => 'United Arab Emirates','code' => 'AE', 'phone_code' => '+971', 'currency_code' => 'AED'],
            ['name' => 'United Kingdom',      'code' => 'GB', 'phone_code' => '+44',  'currency_code' => 'GBP'],
            ['name' => 'United States',       'code' => 'US', 'phone_code' => '+1',   'currency_code' => 'USD'],
            ['name' => 'Vietnam',             'code' => 'VN', 'phone_code' => '+84',  'currency_code' => 'VND'],
        ];

        foreach ($countries as $country) {
            DB::table('countries')->updateOrInsert(['code' => $country['code']], $country);
        }
    }
}
