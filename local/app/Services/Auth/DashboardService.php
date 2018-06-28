<?php
namespace App\Services\Auth;

use App\Model\detailpost;
use DB;
use Illuminate\Support\ServiceProvider;

class DashboardService extends ServiceProvider
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
        $sql =  detailpost::select(
                'category.nameCat AS name_category',
                'category.urlCat AS url_category' ,
                DB::raw('count(detailpost.idCat) as count_post'),
                DB::raw('sum(detailpost.views) as view_post')
            )
            ->leftJoin('category','detailpost.idCat','category.idCat')
            ->groupBy('category.nameCat', 'category.urlCat', 'detailpost.idCat')
            ->orderBy('detailpost.idCat', 'ASC')
            ->get();

        return $sql;
    }
}
