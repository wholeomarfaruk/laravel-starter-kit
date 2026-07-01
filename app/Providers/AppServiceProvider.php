<?php

namespace App\Providers;

use App\Listeners\AuthActivityListener;
use App\Models\ActivityLog;
use Carbon\CarbonImmutable;
use Illuminate\Auth\Events\Failed;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;
use Laravel\Fortify\Contracts\LoginResponse;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(LoginResponse::class, \App\Http\Responses\LoginResponse::class);
    }

    public function boot(): void
    {
        $this->configureDefaults();
        $this->registerActivityTracking();
        $this->registerAuthListeners();
    }

    protected function registerActivityTracking(): void
    {
        ActivityLog::creating(function (ActivityLog $activity) {
            if (app()->runningInConsole()) {
                return;
            }

            $activity->ip_address ??= request()->ip();
            $activity->user_agent ??= request()->userAgent();
        });
    }

    protected function registerAuthListeners(): void
    {
        $listener = AuthActivityListener::class;

        Event::listen(Login::class,         [$listener, 'handleLogin']);
        Event::listen(Logout::class,        [$listener, 'handleLogout']);
        Event::listen(Failed::class,        [$listener, 'handleFailed']);
        Event::listen(PasswordReset::class, [$listener, 'handlePasswordReset']);
    }

    protected function configureDefaults(): void
    {
        Date::use(CarbonImmutable::class);

        DB::prohibitDestructiveCommands(
            app()->isProduction(),
        );

        Password::defaults(fn (): ?Password => app()->isProduction()
            ? Password::min(12)
                ->mixedCase()
                ->letters()
                ->numbers()
                ->symbols()
                ->uncompromised()
            : null
        );
    }
}
