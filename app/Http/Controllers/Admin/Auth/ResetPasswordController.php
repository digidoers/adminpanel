<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
class ResetPasswordController extends Controller
{
   
    use ResetsPasswords;

    public function showResetForm(Request $request)
    {
        $token = $request->route()->parameter('token');
        
        return view('admin.auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    protected $redirectTo = RouteServiceProvider::HOME;
}
