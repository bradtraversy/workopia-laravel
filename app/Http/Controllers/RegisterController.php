<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class RegisterController extends Controller
{
    // @desc    Show register form
    // @route   GET /register
    public function register(): View
    {
        return view('auth.register');
    }
}
