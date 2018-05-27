<?php
namespace App\Services\All;

use App\Model\detailpost;
use DB;
use Illuminate\Support\ServiceProvider;

class ListRecentPost extends ServiceProvider
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
     * Register the application services.
     *
     * @return void
     */
    public function run($num)
    {
        // RECENT POST
        $view = detailpost::where('enable', '=', HIDDEN_POST)
            ->orderBy(DB::raw('RAND()'))
            ->latest('dateDetailPost')
            ->take($num)
            ->get();

        return $view;
    }
}
