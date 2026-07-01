<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        $defaults = [
            ['group' => 'general', 'key' => 'site_name',      'value' => 'Laravel Starter Kit', 'type' => 'text',    'label' => 'Site Name'],
            ['group' => 'general', 'key' => 'site_tagline',   'value' => '',                    'type' => 'text',    'label' => 'Site Tagline'],
            ['group' => 'general', 'key' => 'site_logo',        'value' => null, 'type' => 'file', 'label' => 'Logo (Normal)'],
            ['group' => 'general', 'key' => 'site_logo_black', 'value' => null, 'type' => 'file', 'label' => 'Logo (Black)'],
            ['group' => 'general', 'key' => 'site_logo_white', 'value' => null, 'type' => 'file', 'label' => 'Logo (White)'],
            ['group' => 'general', 'key' => 'site_logo_symbol','value' => null, 'type' => 'file', 'label' => 'Logo (Symbol / Icon)'],
            ['group' => 'general', 'key' => 'site_favicon',    'value' => null, 'type' => 'file', 'label' => 'Favicon'],
            ['group' => 'general', 'key' => 'timezone',       'value' => 'Asia/Dhaka',          'type' => 'text',    'label' => 'Timezone'],
            ['group' => 'general', 'key' => 'date_format',    'value' => 'd-m-Y',               'type' => 'text',    'label' => 'Date Format'],
            ['group' => 'general', 'key' => 'currency',       'value' => 'BDT',                 'type' => 'text',    'label' => 'Default Currency'],
            ['group' => 'general', 'key' => 'currency_symbol','value' => '৳',                   'type' => 'text',    'label' => 'Currency Symbol'],
            ['group' => 'general', 'key' => 'language',       'value' => 'en',                  'type' => 'text',    'label' => 'Default Language'],

            ['group' => 'mail',    'key' => 'from_name',      'value' => 'Laravel Starter Kit', 'type' => 'text',    'label' => 'Mail From Name'],
            ['group' => 'mail',    'key' => 'from_address',   'value' => 'no-reply@example.com','type' => 'text',    'label' => 'Mail From Address'],

            ['group' => 'social',  'key' => 'facebook',       'value' => '',                    'type' => 'text',    'label' => 'Facebook URL'],
            ['group' => 'social',  'key' => 'twitter',        'value' => '',                    'type' => 'text',    'label' => 'Twitter / X URL'],
            ['group' => 'social',  'key' => 'instagram',      'value' => '',                    'type' => 'text',    'label' => 'Instagram URL'],
            ['group' => 'social',  'key' => 'linkedin',       'value' => '',                    'type' => 'text',    'label' => 'LinkedIn URL'],
        ];

        foreach ($defaults as $setting) {
            Setting::updateOrCreate(
                ['group' => $setting['group'], 'key' => $setting['key']],
                $setting
            );
        }
    }
}
