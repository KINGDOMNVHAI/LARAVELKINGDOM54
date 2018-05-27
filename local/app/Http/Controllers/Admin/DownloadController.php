<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\category;
use App\Model\detailpost;
use App\Model\download;
use App\Services\Admin\Categories\ListCategoryService;
use App\Services\Admin\Download\InsertDownloadService;
use App\Services\Admin\Download\ListDownloadService;
use App\Services\Admin\Post\UpdatePostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DownloadController extends Controller
{
    public function indexList()
    {
        if (Auth::check())
        {
            $listDownload = new ListDownloadService;
            $viewDownload = $listDownload->listPaginate();

            $listCategory = new ListCategoryService;
            $viewCategory = $listCategory->list();

            return view('admin.download.download', [
                'title'      => TITLE_ADMIN_POST,
                'downloads'  => $viewDownload,
                'categories' => $viewCategory,
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
            return view('admin.download.downloadinsert', [
                'title'      => TITLE_ADMIN_POST,
            ]);
        }
        else {
            return redirect()->route('kd-login');
        }
    }

    public function insert(Request $request)
    {
        $insertPost = new InsertDownloadService;
        $viewData = $insertPost->run($request);

        // After insert, back to previous page
        return redirect()->route('download');
    }

    public function indexUpdate($idDown)
    {
        if (Auth::check())
        {
            // Connect table detailpost to show information of post
            $download = download::where('idDown', '=', $idDown)->first();

            return view('admin.download.downloadupdate', [
                'title'      => TITLE_ADMIN_POST,
                'download'      => $download,
            ]);
        }
        else {
            return redirect()->route('kd-login');
        }
    }

    public function update(Request $request)
    {
        $updatePost = new UpdatePostService;
        $viewData   = $updatePost->run($request);

        return redirect()->route('download');
    }

    public function deletePost($idDown)
    {
        download::where('idDown', $idDown)->delete();

        return redirect()->route('download');
    }

    public function search(Request $request)
    {
        if (Auth::check())
        {

            return view('admin.post.posts', [
                'title'      => TITLE_ADMIN_POST,

            ]);
        }
        else {
            return redirect()->route('kd-login');
        }
    }
}
