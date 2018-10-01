<?php
namespace App\Services\News;

use App\Model\category;
use App\Model\detailpost;
use DB;
use Illuminate\Support\ServiceProvider;

class CategoryPostService extends ServiceProvider
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
    public function run($urlCat)
    {
        $idCat = category::where('urlCat', 'like', $urlCat)->first();

        $post = detailpost::join('category', 'category.idCat', 'detailpost.idCat')
            ->select(
                'category.nameCat',
                'detailpost.nameDetailPost as name_post',
                'detailpost.urlDetailPost as url_post',
                'detailpost.presentDetailPost as present_post',
                DB::raw("DATE_FORMAT(detailpost.dateDetailPost,'%d-%m-%Y') as date_post"),
                'detailpost.imgDetailPost as img_post'
            )
            ->where('detailpost.enable', '=', ENABLE)
            ->where('detailpost.idCat', '=', $idCat->idCat)
            ->orderBy('detailpost.dateDetailPost', 'DESC')
            ->paginate(POST_PER_CATEGORY);

        return $post;

    }
}
