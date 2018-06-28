<?php
namespace App\Http\Controllers\Auth;

use App\Model\user;
use App\Http\Controllers\Controller;
use App\Response\Auth\LoginResponse;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use DB;

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
    protected $redirectTo = '/dashboard';

    /**
     * Store main view template
     */
    public $mainView = 'auth.login.login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view($this->mainView);
    }


    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        if( Auth::attempt(['username' => $username, 'password' => $password]))
        {
            return redirect()->intended();
        }
        else
        {
            return redirect()->route('kd-login')->with('message', 'WRONG_PASSWORD');
        }

    }

}
