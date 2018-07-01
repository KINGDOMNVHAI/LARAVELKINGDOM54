<?php
namespace App\Services\Admin\Download;

use App\Model\download;
use DB;
use Illuminate\Support\ServiceProvider;

class UpdateDownloadService extends ServiceProvider
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
            $uploadPath = public_path('upload/images/download');
            $file = $request->file('thumbnail');

            // File name được gắn tên
            $fileName = $file->getClientOriginalName();

            // Đưa file vào thư mục
            $file->move($uploadPath, $fileName);
        } else {
            $fileName = $request->img;
        }

        if (isset($request->enable))
        {
            $enable = $request->enable;
        }
        else
        {
            $enable = UNENABLE;
        }

        $query = download::where('idDown', $request->id)
            ->update([
                'nameDown'      => $request->name,
                'linkDown'      => $request->link,
                'imgDown'       => $fileName,  // Lấy tên file
                'idDetailPost'  => $request->post,
                'enable'        => $enable,
            ]);

        return $query;
    }
}
