<?php
namespace App\Services\Admin\Download;

use App\Model\download;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\ServiceProvider;

class InsertDownloadService extends ServiceProvider
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
        $enable  = 0;

        // File name mặc định không có tên
        $fileName = '';

        //Kiểm tra file
        if (Input::hasFile('thumbnail'))
        {
            // Thư mục upload
            $uploadPath = public_path('../../upload/images/download');
            $file = Input::file('thumbnail');

            // File name được gắn tên
            $fileName = $file->getClientOriginalName();

            // Đưa file vào thư mục
            $file->move($uploadPath, $fileName);
        }

        if ($request->enable != null)
        {
            $enable = $request->enable;
        }

        $query = download::insert([
            'nameDown'     => $request->name,
            'linkDown'     => $request->link,
            'imgDown'      => $fileName,  // Lấy tên file
            'enable'       => $enable,
            'idDetailPost' => $request->present,
        ]);

        return $query;
    }
}
