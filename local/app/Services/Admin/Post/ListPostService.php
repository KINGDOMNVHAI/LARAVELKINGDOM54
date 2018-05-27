<?php
namespace App\Services\Admin\Post;

use App\Model\detailpost;
use Illuminate\Support\ServiceProvider;

class ListPostService extends ServiceProvider
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
        $query = detailpost::all();

        return $query;
    }

    public function listPaginate()
    {
        $query = detailpost::paginate(PAGINATE_POST_INDEX);

        return $query;
    }
}
