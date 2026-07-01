<?php

namespace App\Http\Responses;

use App\Models\Panel;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $user = auth()->user();

        // Find the first active panel the user belongs to, ordered by sort_order
        $panel = Panel::whereHas('users', fn ($q) => $q->where('users.id', $user->id))
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->first();

        if ($panel && $panel->route_name) {
            return redirect()->intended(route($panel->route_name));
        }

        // Fallback: superadmin/admin → admin panel, others → /dashboard
        if ($user->hasRole(['superadmin', 'admin'])) {
            return redirect()->intended(route('admin.dashboard'));
        }

        return redirect()->intended(route('dashboard'));
    }
}
