<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\site;
use App\Services\Admin\Site\InsertSiteService;
use App\Services\Admin\Site\ListSiteService;
use App\Services\Admin\Site\SearchSiteService;
use App\Services\Admin\Site\UpdateSiteService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function indexList()
    {
        if (Auth::check())
        {
            $listSite = new ListSiteService;
            $viewSite = $listSite->listPaginate();

            return view('admin.site.sites', [
                'title' => TITLE_ADMIN_SITE,
                'sites' => $viewSite,
            ]);
        }
        else {
            return redirect()->route('kd-login');
        }
    }

    public function indexInsert()
    {
        if (Auth::check())
        {
            return view('admin.site.sitesinsert', [
                'title' => TITLE_ADMIN_SITE,
            ]);
        }
        else {
            return redirect()->route('kd-login');
        }
    }

    public function insert(Request $request)
    {
        $insertSite = new InsertSiteService;
        $viewData = $insertSite->run($request);

        return redirect('/sites');
    }

    public function indexUpdate($idSite)
    {
        if (Auth::check())
        {
            $site = site::where('idSite', $idSite)->first();

            return view('admin.site.sitesupdate', [
                'title'      => TITLE_ADMIN_POST,
                'site'      => $site,
            ]);
        }
        else {
            return redirect()->route('kd-login');
        }
    }

    public function update(Request $request)
    {
        $updateSite = new UpdateSiteService;
        $viewData = $updateSite->run($request);

        return redirect()->route('sites')->with('result','Update Successfully');
    }

    public function delete($idSite)
    {
        site::where('idSite', $idSite)->delete();

        return redirect()->route('sites');
    }

    public function search(Request $request)
    {
        if (Auth::check())
        {
            $searchSite = new SearchSiteService;
            $viewSite = $searchSite->run($request);

            return view('admin.site.sites', [
                'title' => TITLE_ADMIN_SITE,
                'sites' => $viewSite,
            ]);
        }
        else {
            return redirect()->route('kd-login');
        }
    }
}
