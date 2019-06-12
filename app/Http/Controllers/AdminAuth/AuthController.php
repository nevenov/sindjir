<?php

namespace Sinjirite\Http\Controllers\AdminAuth;

use Sinjirite\User;
use Validator;
use Sinjirite\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectTo = '/admin';
    protected $redirectAfterLogout = 'admin/login';
    protected $guard = 'admin';

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }
}
