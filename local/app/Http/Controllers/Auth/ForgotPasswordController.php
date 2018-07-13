<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ForgotPasswordEmail;
use App\Mail\InforUserEmail;
use App\Model\users;
use DB;
use File;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;

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
        return view('auth.forgot.forgotpassword');
    }

    public function sendcode(Request $request)
    {
        $username = $request->username;
        $email    = $request->email;

        // Check username
        if ($username != null)
        {
            // Check email
            if ($email != null)
            {
                // check username and email in database
                $query = users::where('email', '=', $email)
                    ->where('username', '=', $username)
                    ->first();

                // if they exist
                if ($query != null)
                {
                    $firstname_query = $query['firstname'];
                    $lastname_query = $query['lastname'];
                    $fullname_query = "$firstname_query $lastname_query";
                    $username_query = $query['username'];
                    $email_query = $query['email'];


//                    $mang = array(
//                        'name' => $query['lastname'],
//                    );

//                    var_dump($mang['name']);die;

                    Mail::send('mails.demo',
                        array(
                            'name' => $fullname_query,
                            'content' => 'Mật khẩu mới',
                        ),
                        function($message){
                        $message->to('nvhai2306@gmail.com', 'Visitor')->subject('Email mật khẩu');
                    });

//                    Mail::to($email_query)
//                        ->send('mails.demo',array(
//                            'name' => $fullname_query
//                        ), function($message){
//                            $message->from('nvhai2306@gmail.com', 'KINGDOM NVHAI')->subject('Email mật khẩu');
//                        });

//                    Mail::to($request->user())->send(new ForgotPasswordEmail($mang));

                    return redirect('forgot-password')->with('message', 'Mã xác nhận đã được gửi. Vui lòng kiểm tra email để xác nhận');
                }
                else
                {
                    return redirect('forgot-password')->with('message', 'Username và email không trùng khớp');
                }
            }
            else
            {
                return redirect('forgot-password')->with('message', 'Bạn chưa nhập email');
            }
        }
        else
        {
            return redirect('forgot-password')->with('message', 'Bạn chưa nhập tên đăng nhập');
        }
    }

    // Gửi code theo dạng download file txt

    public function downloadcode(Request $request)
    {
        $username   = $request->input('username');
        $email      = $request->input('email');

        // Check username
        if ($username != null)
        {
            // Check email
            if ($email != null)
            {
                // Function File:: need destination, fileName and data
                $fileName = time() . '_datafile.txt';
                $destinationPath = public_path('upload\txt'.$fileName);
                File::put($destinationPath,$email);

                // Download file
                return Response::download($destinationPath, $fileName);
                return redirect('/forgot-password')->with('message', 'Mã xác nhận đã được gửi. Vui lòng kiểm tra email để xác nhận');
            }
            else
            {
                return redirect('/forgot-password')->with('message', 'Bạn chưa nhập email');
            }
        }
        else
        {
            return redirect('/forgot-password')->with('message', 'Bạn chưa nhập tên đăng nhập');
        }
    }
}
