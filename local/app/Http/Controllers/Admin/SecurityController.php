<?php

namespace App\Http\Controllers\Admin;

use App\SiteModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;

class SecurityController extends Controller
{
    public function index()
    {
        if (Auth::check())
        {
            return view('admin/security/security', [
                'title' => 'Security'
            ] );
        }
        else {
            return redirect('/dashboard');
        }
    }

    public function update()
    {

    }

}
