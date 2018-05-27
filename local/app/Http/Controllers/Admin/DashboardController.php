<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Auth\DashboardService;
use App\Response\DashboardResponse;
use App\Quotation;
use Illuminate\Support\Facades\Auth;
use App\Services\All\ListNewestPost;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        if (Auth::check())
        {
            $dashboardService = new DashboardService;
            $viewDashboard    = $dashboardService->run();

            $newestPost = new ListNewestPost;
            $viewNewest = $newestPost->run(6,null);

            return view('admin.dashboard.dashboard', [
                'title'      => TITLE_ADMIN_DASHBOARD,
                'categories' => $viewDashboard,
                'newest'     => $viewNewest,
            ]);

        }
        else {
            return redirect()->route('kd-login');
        }

    }

    public function logout()
    {
        // logout function
        Auth::logout();
        return redirect()->route('kd-login');
    }
}
