<?php

namespace App\Http\Controllers\User\Auth;

use Auth;
use \App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('user.auth.login');
    }

    public function showClientRequestForm()
    {
        return view('user.auth.passwords.clientId');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        $remember = $request->input('remember');
        $getAdmininfo = $this->credentials($request);

        $availablecheck = Auth::attempt($getAdmininfo, $remember);

        if ($availablecheck) {
            $result_array = array('result' => 'success', 'url' => route('profile'));
            return response()->json($result_array);
        }
        $result_array = array('result' => 'fail');
        return response()->json($result_array);
    }

    public function checkClientId($client_id)
    {
        $user = User::where('client_id', $client_id)->first();
        if ($user) {
            $view = view('user.auth.loginInner',compact('user'))->render();
            $result_array = array('result' => 'success', 'html' => $view);
            return response()->json($result_array);
        }
        $result_array = array('result' => 'fail');
        return response()->json($result_array);
    }
}
