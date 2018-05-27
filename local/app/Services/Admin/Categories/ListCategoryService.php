<?php
namespace App\Services\Admin\Categories;

use App\Model\category;
use Illuminate\Support\ServiceProvider;

class ListCategoryService extends ServiceProvider
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
        $query = category::all();

        return $query;
    }

    public function listPaginate()
    {
        $query = category::paginate(PAGINATE_POST_INDEX);

        return $query;
    }

    public function listEnable()
    {
        $query = category::where('enable', ENABLE_CATEGORY);

        return $query;
    }
}
