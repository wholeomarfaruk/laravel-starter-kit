<?php

namespace App\Livewire\Admin\SystemSettings;

use App\Livewire\Traits\WithMediaPicker;
use App\Models\Setting;
use Livewire\Component;

class SystemSettings extends Component
{
    use WithMediaPicker;

    public string $activeGroup = 'general';

    // General
    public string  $site_name        = '';
    public string  $site_tagline     = '';
    public string  $timezone         = 'UTC';
    public string  $date_format      = 'd-m-Y';
    public string  $currency         = 'USD';
    public string  $currency_symbol  = '$';
    public string  $language         = 'en';

    // Branding (file IDs)
    public ?int $site_logo        = null;
    public ?int $site_logo_black  = null;
    public ?int $site_logo_white  = null;
    public ?int $site_logo_symbol = null;
    public ?int $site_favicon     = null;

    // Mail
    public string $mail_from_name    = '';
    public string $mail_from_address = '';

    // Social
    public string $facebook  = '';
    public string $twitter   = '';
    public string $instagram = '';
    public string $linkedin  = '';

    // Registration
    public bool $allow_registration    = true;
    public bool $restrict_by_country   = false;
    public bool $require_email_verify  = false;

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

            $old = [
                'site_name'       => Setting::get('site_name'),
                'site_tagline'    => Setting::get('site_tagline'),
                'timezone'        => Setting::get('timezone'),
                'date_format'     => Setting::get('date_format'),
                'currency'        => Setting::get('currency'),
                'currency_symbol' => Setting::get('currency_symbol'),
                'language'        => Setting::get('language'),
            ];

            Setting::set('site_name',         $this->site_name);
            Setting::set('site_tagline',      $this->site_tagline);
            Setting::set('timezone',          $this->timezone);
            Setting::set('date_format',       $this->date_format);
            Setting::set('currency',          $this->currency);
            Setting::set('currency_symbol',   $this->currency_symbol);
            Setting::set('language',          $this->language);
            Setting::set('site_logo',         $this->site_logo        ? (string) $this->site_logo        : null);
            Setting::set('site_logo_black',   $this->site_logo_black  ? (string) $this->site_logo_black  : null);
            Setting::set('site_logo_white',   $this->site_logo_white  ? (string) $this->site_logo_white  : null);
            Setting::set('site_logo_symbol',  $this->site_logo_symbol ? (string) $this->site_logo_symbol : null);
            Setting::set('site_favicon',      $this->site_favicon     ? (string) $this->site_favicon     : null);

            $new = [
                'site_name'       => $this->site_name,
                'site_tagline'    => $this->site_tagline,
                'timezone'        => $this->timezone,
                'date_format'     => $this->date_format,
                'currency'        => $this->currency,
                'currency_symbol' => $this->currency_symbol,
                'language'        => $this->language,
            ];

            $this->logSettingsChange('General settings were updated', $old, $new);
        }

        if ($this->activeGroup === 'mail') {
            $this->validate([
                'mail_from_name'    => 'required|string|max:100',
                'mail_from_address' => 'required|email',
            ]);

            $old = [
                'from_name'    => Setting::get('from_name',    '', 'mail'),
                'from_address' => Setting::get('from_address', '', 'mail'),
            ];

            Setting::set('from_name',    $this->mail_from_name,    'mail');
            Setting::set('from_address', $this->mail_from_address, 'mail');

            $this->logSettingsChange('Mail settings were updated', $old, [
                'from_name'    => $this->mail_from_name,
                'from_address' => $this->mail_from_address,
            ]);
        }

        if ($this->activeGroup === 'social') {
            $old = [
                'facebook'  => Setting::get('facebook',  '', 'social'),
                'twitter'   => Setting::get('twitter',   '', 'social'),
                'instagram' => Setting::get('instagram', '', 'social'),
                'linkedin'  => Setting::get('linkedin',  '', 'social'),
            ];

            Setting::set('facebook',  $this->facebook,  'social');
            Setting::set('twitter',   $this->twitter,   'social');
            Setting::set('instagram', $this->instagram, 'social');
            Setting::set('linkedin',  $this->linkedin,  'social');

            $this->logSettingsChange('Social settings were updated', $old, [
                'facebook'  => $this->facebook,
                'twitter'   => $this->twitter,
                'instagram' => $this->instagram,
                'linkedin'  => $this->linkedin,
            ]);
        }

        if ($this->activeGroup === 'registration') {
            $old = [
                'allow_registration'   => (bool) Setting::get('allow_registration',   '1', 'registration'),
                'restrict_by_country'  => (bool) Setting::get('restrict_by_country',  '0', 'registration'),
                'require_email_verify' => (bool) Setting::get('require_email_verify', '0', 'registration'),
            ];

            Setting::set('allow_registration',   $this->allow_registration   ? '1' : '0', 'registration');
            Setting::set('restrict_by_country',  $this->restrict_by_country  ? '1' : '0', 'registration');
            Setting::set('require_email_verify', $this->require_email_verify ? '1' : '0', 'registration');
            Setting::forgetGroup('registration');

            $this->logSettingsChange('Registration settings were updated', $old, [
                'allow_registration'   => $this->allow_registration,
                'restrict_by_country'  => $this->restrict_by_country,
                'require_email_verify' => $this->require_email_verify,
            ]);
        }

        $this->dispatch('toast', ['type' => 'success', 'message' => 'Settings saved successfully']);
    }

    private function logSettingsChange(string $description, array $old, array $new): void
    {
        $changed = array_filter(array_keys($new), fn ($k) => ($old[$k] ?? null) != ($new[$k] ?? null));

        if (empty($changed)) {
            return;
        }

        activity('settings')
            ->causedBy(auth()->user())
            ->withProperties([
                'old'        => array_intersect_key($old, array_flip($changed)),
                'attributes' => array_intersect_key($new, array_flip($changed)),
            ])
            ->event('updated')
            ->log($description);
    }

    public function render()
    {
        return view('livewire.admin.system-settings.system-settings')->layout('layouts.admin.admin');
    }

    private function loadSettings(): void
    {
        $this->site_name        = Setting::get('site_name',       'Laravel Starter Kit');
        $this->site_tagline     = Setting::get('site_tagline',    '');
        $this->timezone         = Setting::get('timezone',        'Asia/Dhaka');
        $this->date_format      = Setting::get('date_format',     'd-m-Y');
        $this->currency         = Setting::get('currency',        'BDT');
        $this->currency_symbol  = Setting::get('currency_symbol', '৳');
        $this->language         = Setting::get('language',        'en');

        $this->site_logo        = ($v = Setting::get('site_logo'))        ? (int) $v : null;
        $this->site_logo_black  = ($v = Setting::get('site_logo_black'))  ? (int) $v : null;
        $this->site_logo_white  = ($v = Setting::get('site_logo_white'))  ? (int) $v : null;
        $this->site_logo_symbol = ($v = Setting::get('site_logo_symbol')) ? (int) $v : null;
        $this->site_favicon     = ($v = Setting::get('site_favicon'))     ? (int) $v : null;

        $this->mail_from_name    = Setting::get('from_name',    'Laravel Starter Kit', 'mail');
        $this->mail_from_address = Setting::get('from_address', '', 'mail');

        $this->facebook  = Setting::get('facebook',  '', 'social');
        $this->twitter   = Setting::get('twitter',   '', 'social');
        $this->instagram = Setting::get('instagram', '', 'social');
        $this->linkedin  = Setting::get('linkedin',  '', 'social');

        $this->allow_registration   = (bool) Setting::get('allow_registration',   '1', 'registration');
        $this->restrict_by_country  = (bool) Setting::get('restrict_by_country',  '0', 'registration');
        $this->require_email_verify = (bool) Setting::get('require_email_verify', '0', 'registration');
    }
}
