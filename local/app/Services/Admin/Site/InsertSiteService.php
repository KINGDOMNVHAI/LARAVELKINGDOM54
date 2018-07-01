<?php
namespace App\Services\Admin\Site;

use App\Model\site;
use Illuminate\Support\ServiceProvider;

class InsertSiteService extends ServiceProvider
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
        // File name mặc định không có tên
        $fileName = '';

        //Kiểm tra file
        if ($request->hasFile('thumbnail'))
        {
            // Thư mục upload
            $uploadPath = public_path('upload/images/thumbnail');
            $file = $request->file('thumbnail');

            // File name được gắn tên
            $fileName = $file->getClientOriginalName();

            // Đưa file vào thư mục
            $file->move($uploadPath, $fileName);
        }

        $query = site::insert([
            'nameSite'    => $request->name,
            'urlSite'     => $request->url,
            'presentSite' => $request->present,
            'imgSite'     => $fileName, // Lấy tên file
            'enable'      => $request->enable,
        ]);

        return $query;
    }
}
