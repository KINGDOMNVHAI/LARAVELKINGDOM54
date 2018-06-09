<?php
namespace App\Services\Admin\Download;

use App\Model\download;
use App\Model\detailpost;
use Illuminate\Support\ServiceProvider;

class ListDownloadService extends ServiceProvider
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
        $query = download::all();

        return $query;
    }

    public function listPaginate()
    {
        $query = download::paginate(PAGINATE_POST_INDEX);

        return $query;
    }

    public function listJoinDownloadDetailpostPaginate()
    {
        $query = download::join('detailpost','detailpost.idDetailPost','download.idDetailPost')
                        ->paginate(PAGINATE_POST_INDEX);

        return $query;
    }
}
