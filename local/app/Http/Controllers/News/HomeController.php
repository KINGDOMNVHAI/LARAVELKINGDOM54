<?php
namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Services\Admin\Categories\ListCategoryService;
use App\Services\All\ListMostViewPost;
use App\Services\All\ListNewestPost;
use App\Services\All\ListRecentPost;
use App\Services\All\ListUpdatePost;
use App\Services\News\HomePagePostService;

class HomeController extends Controller
{
    public function index()
    {
        // Public Services
        $menuCategories = new ListCategoryService();
        $viewCategories = $menuCategories->listEnable();

        $newest     = new ListNewestPost;
        $viewNewest = $newest->run(NEWEST_HOME_POSTS, null);

        $mostView     = new ListMostViewPost;
        $viewMostView = $mostView->run(MOST_VIEW_HOME_POSTS, null);

        $update     = new ListUpdatePost;
        $viewUpdate = $update->run(UPDATE_HOME_POSTS, null);

        $random     = new ListRecentPost;
        $viewRandom = $random->run(RECENT_HOME_POSTS, null);

        // Private Services
        $posts          = new HomePagePostService();
        $viewData       = $posts->run();
        $viewCategories = $posts->showAllCategories();

        return view('news.pages.home', [
            'title'     => TITLE_NEWS_INDEX,

            // Public Services
            'menuCategories' => $viewCategories,
            'mostViews'      => $viewMostView,
            'updates'        => $viewUpdate,
            'random'         => $viewRandom,

            // Private Services
            'newest'     => $viewNewest,
            'categories' => $viewCategories,
            'posts'      => $viewData,
        ]);
    }

}
