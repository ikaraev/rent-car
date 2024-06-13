<?php

namespace Karaev\Admin\Infrastructure\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Karaev\Admin\Infrastructure\Facades\AdminAuth;
use Karaev\Admin\Infrastructure\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return Inertia::render('Admin/Auth/Login');
    }

    public function login(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect(route('admin.dashboard'));
    }
}
