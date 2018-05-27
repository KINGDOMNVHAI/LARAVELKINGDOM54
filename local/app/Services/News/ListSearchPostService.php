<?php
namespace App\Services\News;

use App\Model\category;
use App\Model\detailpost;
use Illuminate\Support\ServiceProvider;

class ListSearchPostService extends ServiceProvider
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
    public function run($request)
    {
        $response = [];

        $keyword = '%' . $request->keyword . '%';

        // Create query
        // ilike only for Postgre, not support for phpmyadmin
        $query = detailpost::where('nameDetailPost', 'like', $keyword);

        if ($request->category != 'all')
        {
            $query = $query->where('idCat', $request->category);
        }

        if ($request->date == 'asc')
        {
            $query = $query->orderBy('dateDetailPost', 'asc');
        }

        if ($request->date == 'desc')
        {
            $query = $query->orderBy('dateDetailPost', 'desc');
        }

        // Get response
        $response = $query->paginate(ITEM_PER_PAGE);

        return $response;


    }
}
