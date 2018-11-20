<?php
namespace App\Services\All;

use App\Model\detailpost;
use Illuminate\Support\ServiceProvider;

class ListMostViewPost extends ServiceProvider
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
     * Show most view post
     *
     * @return void
     */
    public function run($num,$idCat)
    {
        // MOST VIEW POST
        $view = detailpost::where('enable', ENABLE);

        if ($idCat != null)
        {
            $view = $view->where('idCat', '=', $idCat);
        }

        $view = $view->orderBy('views', 'desc')
            ->latest('dateDetailPost')
            ->take($num)
            ->get();

        return $view;
    }
}
