<?php
namespace App\Services\Admin\Post;

use Illuminate\Support\ServiceProvider;
use App\Model\detailpost;
use App\Model\category;
use DB;

class DeletePostService extends ServiceProvider
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
        // SQL đúng
        $sql =  DB::table('detailpost')
            ->select(
                'category.nameCat AS name_category',
                'category.urlCat AS url_category' ,
                DB::raw('count(detailpost.idCat) as count_post'),
                DB::raw('sum(detailpost.viewDetailPost) as view_post')
            )
            ->leftJoin('category','detailpost.idCat','category.idCat')
            ->groupBy('category.nameCat', 'category.urlCat')
            ->orderBy('detailpost.idCat', 'ASC')
            ->get();

        return $sql;
    }
}
