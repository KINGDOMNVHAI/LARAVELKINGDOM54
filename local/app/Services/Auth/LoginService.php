<?php
namespace App\Services\Auth;

use App\Model\users;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

class LoginService extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     *
     *
     * @return void
     */
    public function checkUser($request)
    {
        $query = users::where('username', $request)->first();

        return $query;
    }
}
