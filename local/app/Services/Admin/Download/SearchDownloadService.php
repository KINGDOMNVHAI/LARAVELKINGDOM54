<?php
namespace App\Services\Admin\Download;

use App\Model\download;
use DB;
use Illuminate\Support\ServiceProvider;

class SearchDownloadService extends ServiceProvider
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
        $query = download::where('nameDown', 'like', $keyword);

        // Get response
        $response = $query->paginate(ITEM_PER_PAGE);

        return $response;
    }
}
