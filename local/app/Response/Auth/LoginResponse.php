<?php

namespace App\Response\Auth;

use App\Http\Controllers\Controller;
use App\Model\detailpost;
use App\Model\category;
use App\Services\Admin\Post\InsertPostService;
use App\Services\Admin\Post\ListPostService;
use App\Quotation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class LoginResponse extends Controller
{


    /**
     * Store main view template
     */
    public $mainView = 'auth.login.login';

    /**
     * Make frontend response
     */
    public function getResponse()
    {
        return view($this->mainView);

    }




}