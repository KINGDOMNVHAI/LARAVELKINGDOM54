<?php

namespace App\Http\Controllers\Admin;

use App\SiteModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;
//use App\Quotation;

class AdministratorController extends Controller
{
    public function index()
    {
        if (Auth::check())
        {
            // Query SELECT
            $query_user = DB::select("SELECT * FROM users WHERE type = 'member' ");
            $query_admin = DB::select("SELECT * FROM users WHERE type != 'member' ");

            // Show views dashboard.blade.php in pages
            // pages.dashboard or pages/dashboard
            // query is $sites in dashboard.blade.php

            return view('admin.administrator.administrator', [
                'title' => 'Site KINGDOM NVHAI',
                'admins' => $query_admin,
                'users' => $query_user
            ]);
        }
        else {
            return redirect('/dashboard');
        }
    }

    public function update()
    {

    }

    public function delete()
    {


    }

}
