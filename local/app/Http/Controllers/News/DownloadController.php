<?php
namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Services\Admin\Categories\ListCategoryService;
use App\Services\News\ListDownloadService;
use App\Services\All\ListMostViewPost;
use App\Services\All\ListNewestPost;
use App\Services\All\ListRecentPost;
use App\Services\All\ListUpdatePost;
use App\Services\News\ListSearchPostService;
use App\Services\News\HomePagePostService;
use Illuminate\Http\Request;

class DownloadController extends Controller
{

    // Làm 1 trang download có danh sách được phân loại dựa theo URL

    public function listPostDownload($urlCat)
    {
        // Public Services
        $menuCategories = new ListDownloadService();
        $viewCategories = $menuCategories->listJoinDownloadPostPaginate();

        $newest     = new ListNewestPost;
        $viewNewest = $newest->run(NEWEST_HOME_POSTS, null);

        $mostView     = new ListMostViewPost;
        $viewMostView = $mostView->run(MOST_VIEW_HOME_POSTS, null);

        $update     = new ListUpdatePost;
        $viewUpdate = $update->run(UPDATE_HOME_POSTS, null);

        $random     = new ListRecentPost;
        $viewRandom = $random->run(RECENT_HOME_POSTS, null);

        $posts      = new HomePagePostService();
        $viewHead   = $posts->headPosition();

        // Private Services
        $postDownload = new ListDownloadService();
        $viewPost = $postDownload->listDownloadPostCategory($urlCat);

        return view('news.pages.listdownload', [
            'title'          => TITLE_NEWS_INDEX,

            // Public Services
            'menuCategories' => $viewCategories,
            'newest'         => $viewNewest,
            'mostViews'      => $viewMostView,
            'updates'        => $viewUpdate,
            'random'         => $viewRandom,
            'heads'          => $viewHead,

            // Private Services
            'posts'          => $viewPost,
        ]);
    }

    public function listSearch(Request $request)
    {
        // Public Services
        $menuCategories = new ListCategoryService();
        $viewCategories = $menuCategories->listEnable(null);

        $newest     = new ListNewestPost;
        $viewNewest = $newest->run(NEWEST_HOME_POSTS, null);

        $mostView     = new ListMostViewPost;
        $viewMostView = $mostView->run(MOST_VIEW_HOME_POSTS, null);

        $update     = new ListUpdatePost;
        $viewUpdate = $update->run(UPDATE_HOME_POSTS, null);

        $random     = new ListRecentPost;
        $viewRandom = $random->run(RECENT_HOME_POSTS, null);

        // Private Services
        $listPost = new ListSearchPostService();
        $viewListPost = $listPost->run($request);

        return view('news.pages.search', [
            'title'     => TITLE_NEWS_INDEX,

            // Public Services
            'menuCategories' => $viewCategories,
            'newest'         => $viewNewest,
            'mostViews'      => $viewMostView,
            'updates'        => $viewUpdate,
            'random'         => $viewRandom,

            // Private Services
            'posts'          => $viewListPost,
        ]);
    }

}
