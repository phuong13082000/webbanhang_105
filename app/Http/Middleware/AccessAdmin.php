<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use Closure;
use Illuminate\Support\Facades\Auth;

class AccessAdmin
{
    protected $admin;

    public function __construct(Admin $admin)
    {
        $this->admin = $admin;
    }

    public function handle($request, Closure $next)
    {
        $actions = Route::getCurrentRoute()->getAction();

        $roles = $actions['roles'] ?? null;

        if ($this->admin->hasRole($roles) || !$roles) {
            return $next($request);
        } else {
            return abort(401);
        }
    }
}
