<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\category;
use App\Model\detailpost;
use App\Services\Admin\Categories\ListCategoryService;
use App\Services\Admin\Post\InsertPostService;
use App\Services\Admin\Post\ListPostService;
use App\Services\Admin\Post\SearchPostService;
use App\Services\Admin\Post\UpdatePostService;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function indexList()
    {
        if (Auth::check())
        {
            $listPost = new ListPostService;
            $viewPost = $listPost->listPaginate();

            $listCategory = new ListCategoryService;
            $viewCategory = $listCategory->list();

            return view('admin.post.posts', [
                'title'      => TITLE_ADMIN_POST,
                'posts'      => $viewPost,
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
            $viewData = category::all();

            return view('admin.post.postsinsert', [
                'title'      => 'Posts - list of posts in KINGDOM NVHAI',
                'categories' => $viewData
            ]);
        }
        else {
            return redirect()->route('kd-login');
        }
    }

    public function insert(Request $request)
    {
        $insertPost = new InsertPostService;
        $viewData = $insertPost->run($request);

        // After insert, back to previous page
        return redirect()->route('posts');
    }

    public function indexUpdate($idDetailPost)
    {
        // Connect table detailpost to show information of post
        $post = detailpost::where('idDetailPost', '=', $idDetailPost)->first();

        // Connect table category to show nameCat of post
        $postcat = category::where('idCat', '=', $post->idCat)->first();

        // Show HTML of selected option
        // Use {{ $op }} or {!! $op !!} in views
        $op = '<option value="'.$postcat->idCat.'">'. $postcat->nameCat .'</option>';

        // Show all category, except selected category
        $listcat = category::where('idCat','!=', $post->idCat)->get();

        return view('admin.post.postsupdate', [
            'title'   => 'Site KINGDOM NVHAI',
            'post'    => $post,
            'listcat' => $listcat,
            'op'      => $op
        ]);
    }

    public function update(Request $request)
    {
        $updatePost = new UpdatePostService;
        $viewData   = $updatePost->run($request);

        return redirect()->route('posts');
    }

    public function indexDelete()
    {
        $viewData = detailpost::paginate(PAGINATE_POST_DELETE);

        return view('admin.post.postsdelete', [
            'title' => 'Posts - list of posts in KINGDOM NVHAI',
            'posts' => $viewData
        ]);
    }

    public function deletePost($idDetailPost)
    {
        detailpost::where('idDetailPost', $idDetailPost)->delete();

        return redirect()->route('posts');
    }

    public function deleteManyPost(Request $request)
    {
        // Tạo mảng chứa các id từ checkbox
        $mang = array();

        // Đếm số lượng checkbox
        $sumarray =  count($request->checkbox);

        for ($i = 0; $i<$sumarray; $i++){

            // Gán giá trị từ checkbox vào mảng
            array_push($mang, $request->checkbox[$i]);

            // Xóa mảng đó
            DB::table('detailpost')->whereIn('idDetailPost', $mang)->delete();
        }

        return redirect()->route('posts');
    }

    public function search(Request $request)
    {
        if (Auth::check())
        {
            $searchPost = new SearchPostService;
            $viewSearch = $searchPost->run($request);

            $listCategory = new ListCategoryService;
            $viewCategory = $listCategory->list();

            return view('admin.post.posts', [
                'title'      => TITLE_ADMIN_POST,
                'posts'      => $viewSearch,
                'categories' => $viewCategory,
            ]);
        }
        else {
            return redirect()->route('kd-login');
        }
    }
}
