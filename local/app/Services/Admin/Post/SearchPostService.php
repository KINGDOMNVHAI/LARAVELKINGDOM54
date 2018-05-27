<?php

namespace App\Services\Admin\Post;

use App\Model\detailpost;
use DB;
use Illuminate\Support\ServiceProvider;

class SearchPostService extends ServiceProvider
{
    /**
     * Store all input data.
     * @var array
     */
    protected $_inputRequest = null;

    /**
     * ListUserShared constructor.
     * @param $request
     */
    public function __construct()
    {

    }

    /**
     * ListUserService
     *
     * @return array
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
