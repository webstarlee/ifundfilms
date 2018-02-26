<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use \App\Admin;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function validateLogin($request)
    {
        $this->validate($request, [
            'email' => 'required', 'password' => 'required'
        ]);
    }

    protected function credentials(Request $request)
    {
        return array_merge($request->only('email', 'password'));
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

    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect('/admin');
    }
}
