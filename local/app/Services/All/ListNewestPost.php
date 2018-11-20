<?php
namespace App\Services\All;

use App\Model\detailpost;
use Illuminate\Support\ServiceProvider;

class ListNewestPost extends ServiceProvider
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
     * Show newest post
     *
     * @return void
     */
    public function run($num,$idCat)
    {
        // NEWEST POST
        $new = detailpost::where('enable', ENABLE);

        if ($idCat != null)
        {
            $new = $new->where('idCat', '=', $idCat);
        }

        $new = $new->latest('dateDetailPost')
            ->take($num)
            ->get();

        return $new;
    }
}
