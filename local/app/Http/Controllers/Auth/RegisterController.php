<?php

namespace App\Http\Controllers\Auth;

use App\Model\users;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    public function index()
    {
        return view('auth.register.register');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'password'  => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    public $timestamps = true;

    public function create(Request $request)
    {
        // Values for variables
        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $username = $request->username;
        $password = $request->password;
        $email = $request->email;
        $city = $request->city;
        $address = $request->address;
        $company = $request->company;
        $facebook = $request->facebook;
        $twitter = $request->twitter;

        users::insert([
            'firstname' => $firstname,
            'lastname'  => $lastname,
            'username'  => $username,
            'password'  => bcrypt($password),
            'email'     => $email,
            'type'      => 'member',
            'city'      => $city,
            'address'   => $address,
            'company'   => $company,
            'facebook'  => $facebook,
            'twitter'   => $twitter,
        ]);

        // After insert, back to previous page
        return redirect('/kd-login')->with('message', 'Đăng ký thành công');
    }
}
