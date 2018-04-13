<?php

namespace App\Http\Controllers\Admin\Auth;

use Auth;
use \App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        $remember = $request->input('remember');
        $getAdmininfo = $this->credentials($request);

        $availablecheck = Auth::guard('admin')->attempt($getAdmininfo, $remember);

        if ($availablecheck) {
            $result_array = array('result' => 'success', 'url' => route('admin.dashboard'));
            return response()->json($result_array);
        }

        $result_array = array('result' => 'fail');
        return response()->json($result_array);
    }

    public function logout(Request $request)
    {
        $this->guard('admin')->logout();

        $request->session()->invalidate();

        return redirect('/admin');
    }
}
