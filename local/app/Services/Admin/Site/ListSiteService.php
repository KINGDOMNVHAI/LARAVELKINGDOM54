<?php
namespace App\Services\Admin\Site;

use App\Model\site;
use Illuminate\Support\ServiceProvider;

class ListSiteService extends ServiceProvider
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
    public function list()
    {
        $query = site::all();

        return $query;
    }

    public function listPaginate()
    {
        $query = site::paginate(PAGINATE_SITE_INDEX);

        return $query;
    }
}
