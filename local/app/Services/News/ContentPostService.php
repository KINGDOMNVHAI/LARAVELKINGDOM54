<?php
namespace App\Services\News;

use App\Model\category;
use App\Model\detailpost;
use DB;
use Illuminate\Support\ServiceProvider;

class ContentPostService extends ServiceProvider
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
    public function content($urlDetailPost)
    {
        $post = detailpost::join('category', 'category.idCat', 'detailpost.idCat')
                        ->where('urlDetailPost', 'like', $urlDetailPost)
                        ->first();

        return $post;
    }

    public function involve($urlDetailPost)
    {
        $idCat = $this->content($urlDetailPost)->idCat;

        $query = detailpost::where('idCat','=',$idCat)
                ->orderBy(DB::raw('RAND()'))
                ->take(INVOLVE_POST)
                ->get();

        return $query;
    }
}
