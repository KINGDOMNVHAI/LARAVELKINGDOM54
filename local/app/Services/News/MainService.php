<?php
namespace App\Services\News;

use App\Model\detailpost;
use Illuminate\Support\ServiceProvider;

class MainService extends ServiceProvider
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
    public function recent_post()
    {
        // RECENT POST
        $breaks = detailpost::where('enable', '=', '0')
            ->orderBy('dateDetailPost', 'desc')
            ->take(4)
            ->get();

        return $breaks;
    }

    public function most_view()
    {
        // RECENT POST
        $view = detailpost::where('enable', '=', '0')
            ->orderBy('dateDetailPost', 'desc')
            ->take(4)
            ->get();

        return $view;
    }
}
