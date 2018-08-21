<?php
namespace App\Services\News;

use App\Model\detailpost;
use App\Model\category;
use DB;
use Illuminate\Support\ServiceProvider;

class HomePagePostService extends ServiceProvider
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
    public function run()
    {
        $arrayCategory = [];
        $arrayIdCategory = [];
        $arrayPost = [];

        $cat = category::where('enable', '=', true)->get();

        $arrayCategory = $cat;

        for ($i=0; $i < count($arrayCategory); $i++)
        {
            $arrayIdCategory[$i] = $arrayCategory[$i]->idCat;
        }

        for ($j=0; $j < count($arrayIdCategory); $j++)
        {
            $arrayPost[$j] = category::join('detailpost', 'category.idCat', '=', 'detailpost.idCat')
                ->select(
                    'category.nameCat as name_category',
                    'category.urlCat as url_category',
                    'detailpost.nameDetailPost as name_post',
                    'detailpost.urlDetailPost as url_post',
                    'detailpost.presentDetailPost as present_post',
                    DB::raw("DATE_FORMAT(detailpost.dateDetailPost,'%d-%m-%Y') as date_post"),
                    'detailpost.imgDetailPost as img_post'
                )
                ->where('category.enable', true)
                ->where('category.idCat', '=', $arrayIdCategory[$j])
                ->orderBy('detailpost.dateDetailPost', 'DESC')
                ->take(HOME_POSTS)
                ->get();
        }

        return $arrayPost;
    }

    public function showAllCategories()
    {
        $query = category::where('enable', '=', true)->get();

        return $query;
    }

    public function headPosition()
    {
        $query = detailpost::where('head_position', '!=', HEADER_NONE)->get();

        return $query;
    }
}
