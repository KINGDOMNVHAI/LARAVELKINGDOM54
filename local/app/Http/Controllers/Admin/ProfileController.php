<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\Profile\UpdateProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        if (Auth::check())
        {
            return view('admin/profile/userprofile', [
                'title' => 'User Profile'
            ]);
        }
        else {
            return redirect()->route('kd-login');
        }
    }

    public function update(Request $request)
    {
        $updateProfile = new UpdateProfileService;
        $viewData   = $updateProfile->run($request);

        return redirect('/user-profile');
    }

}
