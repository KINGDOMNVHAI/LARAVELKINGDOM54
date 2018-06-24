<?php
namespace App\Services\News;

use App\Model\download;
use App\Model\category;
use Illuminate\Support\ServiceProvider;

class ListDownloadService extends ServiceProvider
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
    public function list()
    {
        $query = download::all();

        return $query;
    }

    public function listPaginate()
    {
        $query = download::paginate(PAGINATE_POST_INDEX);

        return $query;
    }

    public function listJoinDownloadPostPaginate()
    {
        $query = download::join('detailpost','detailpost.idDetailPost','download.idDetailPost')
            ->paginate(PAGINATE_POST_INDEX);

        return $query;
    }

    public function listDownloadPostCategory($urlCat)
    {
        $idCat = category::where('urlCat', 'like', $urlCat)->first();

        $post = download::join('detailpost', 'detailpost.idDetailPost', '=', 'download.idDetailPost')
            ->join('category', 'detailpost.idCat', '=', 'category.idCat')
            ->select(
                'category.nameCat',
                'detailpost.*',
                'download.*'
            )
            ->where('category.idCat', '=', $idCat->idCat)
            ->where('download.enable', '=', ENABLE)
            ->paginate(POST_PER_CATEGORY);

        return $post;
    }
}
