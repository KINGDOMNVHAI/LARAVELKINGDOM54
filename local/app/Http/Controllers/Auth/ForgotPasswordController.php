<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use File;
use DB;

//use Illuminate\Foundation\Auth\AuthenticatesUsers;
//use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Validator;
//use Illuminate\Support\Facades\Redirect;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('auth.forgotpassword');
    }

    public function sendcode(Request $request)
    {
        $email = $request->input('ipemail');

        if ($email != null)
        {
            // Function File:: need destination, fileName and data
            $fileName = time() . '_datafile.txt';
            $destinationPath = public_path('upload\txt'.$fileName);
            File::put($destinationPath,$email);
            
            // Download file
	        return Response::download($destinationPath, $fileName);
            return redirect('/forgot-password')->with('result', 'Mã xác nhận đã được gửi. Vui lòng kiểm tra email để xác nhận');
        }
        else
        {
            return redirect('/forgot-password')->with('result', 'Bạn chưa nhập email');
        }

    }
}
