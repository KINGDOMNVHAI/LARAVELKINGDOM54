<?php
namespace App\Services\All;

use App\Model\detailpost;
use Illuminate\Support\ServiceProvider;

class ListUpdatePost extends ServiceProvider
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
        // UPDATE POST
        $new = detailpost::where('enable', '=', HIDDEN_POST);

        if ($idCat != null)
        {
            $new = $new->where('idCat', '=', $idCat);
        }

        $new = $new->where('update', '=', UPDATE_POST)
            ->orderBy('dateDetailPost', 'desc')
            ->take($num)
            ->get();

        return $new;
    }
}
