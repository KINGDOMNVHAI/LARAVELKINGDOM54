<?php
namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Services\Admin\Categories\ListCategoryService;
use App\Services\All\ListMostViewPost;
use App\Services\All\ListNewestPost;
use App\Services\All\ListRecentPost;
use App\Services\All\ListUpdatePost;
use App\Services\News\CategoryPostService;
use App\Services\News\ContentPostService;
use App\Services\News\HomePagePostService;
use App\Services\News\ListSearchPostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function listPostCategory($urlCat)
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

        $posts      = new HomePagePostService();
        $viewHead   = $posts->headPosition();

        // Private Services
        $postCategory = new CategoryPostService();
        $viewPost = $postCategory->run($urlCat);

        return view('news.pages.listpost', [
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

    public function contentPost($urlDetailPost)
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

        $posts      = new HomePagePostService();
        $viewHead   = $posts->headPosition();

        // Private Services
        $single     = new ContentPostService;
        $viewContent = $single->content($urlDetailPost);
        $viewInvolve = $single->involve($urlDetailPost);

        return view('news.pages.single', [
            'title'          => TITLE_NEWS_INDEX,

            // Public Services
            'menuCategories' => $viewCategories,
            'newest'         => $viewNewest,
            'mostViews'      => $viewMostView,
            'updates'        => $viewUpdate,
            'random'         => $viewRandom,
            'heads'          => $viewHead,

            // Private Services
            'content'        => $viewContent,
            'involves'       => $viewInvolve,
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
