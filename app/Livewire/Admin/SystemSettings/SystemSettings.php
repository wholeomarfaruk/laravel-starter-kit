<?php

namespace App\Livewire\Admin\SystemSettings;

use App\Models\Setting;
use Livewire\Component;

class SystemSettings extends Component
{
    public string $activeGroup = 'general';

    // General
    public string $site_name     = '';
    public string $site_tagline  = '';
    public string $timezone      = 'UTC';
    public string $date_format   = 'd-m-Y';
    public string $currency      = 'USD';
    public string $currency_symbol = '$';
    public string $language      = 'en';

    // Mail
    public string $mail_from_name    = '';
    public string $mail_from_address = '';

    // Social
    public string $facebook  = '';
    public string $twitter   = '';
    public string $instagram = '';
    public string $linkedin  = '';

    public function mount(): void
    {
        $this->loadSettings();
    }

    public function setGroup(string $group): void
    {
        $this->activeGroup = $group;
    }

    public function save(): void
    {
        if ($this->activeGroup === 'general') {
            $this->validate([
                'site_name'   => 'required|string|max:100',
                'timezone'    => 'required|string',
                'date_format' => 'required|string',
                'currency'    => 'required|string|max:10',
                'language'    => 'required|string|max:10',
            ]);

            Setting::set('site_name',       $this->site_name);
            Setting::set('site_tagline',    $this->site_tagline);
            Setting::set('timezone',        $this->timezone);
            Setting::set('date_format',     $this->date_format);
            Setting::set('currency',        $this->currency);
            Setting::set('currency_symbol', $this->currency_symbol);
            Setting::set('language',        $this->language);
        }

        if ($this->activeGroup === 'mail') {
            $this->validate([
                'mail_from_name'    => 'required|string|max:100',
                'mail_from_address' => 'required|email',
            ]);

            Setting::set('from_name',    $this->mail_from_name,    'mail');
            Setting::set('from_address', $this->mail_from_address, 'mail');
        }

        if ($this->activeGroup === 'social') {
            Setting::set('facebook',  $this->facebook,  'social');
            Setting::set('twitter',   $this->twitter,   'social');
            Setting::set('instagram', $this->instagram, 'social');
            Setting::set('linkedin',  $this->linkedin,  'social');
        }

        $this->dispatch('toast', ['type' => 'success', 'message' => 'Settings saved successfully']);
    }

    public function render()
    {
        return view('livewire.admin.system-settings.system-settings')->layout('layouts.admin.admin');
    }

    private function loadSettings(): void
    {
        $this->site_name        = Setting::get('site_name',       'Laravel Starter Kit');
        $this->site_tagline     = Setting::get('site_tagline',    '');
        $this->timezone         = Setting::get('timezone',        'UTC');
        $this->date_format      = Setting::get('date_format',     'd-m-Y');
        $this->currency         = Setting::get('currency',        'USD');
        $this->currency_symbol  = Setting::get('currency_symbol', '$');
        $this->language         = Setting::get('language',        'en');

        $this->mail_from_name    = Setting::get('from_name',    'Laravel Starter Kit', 'mail');
        $this->mail_from_address = Setting::get('from_address', '', 'mail');

        $this->facebook  = Setting::get('facebook',  '', 'social');
        $this->twitter   = Setting::get('twitter',   '', 'social');
        $this->instagram = Setting::get('instagram', '', 'social');
        $this->linkedin  = Setting::get('linkedin',  '', 'social');
    }
}
