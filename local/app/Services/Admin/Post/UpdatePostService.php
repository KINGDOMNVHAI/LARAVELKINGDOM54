<?php
namespace App\Services\Admin\Post;

use App\Model\detailpost;
use DB;
use Illuminate\Support\ServiceProvider;

class UpdatePostService extends ServiceProvider
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
        $checkbox = detailpost::where('idDetailPost', $request->id)->first();

        var_dump($checkbox->enable);die;

        // File name mặc định không có tên
        $fileName = '';

        //Kiểm tra file
        if ($request->hasFile('thumbnail'))
        {
            // Thư mục upload
            $uploadPath = public_path('../../upload/images/thumbnail');
            $file = $request->file('thumbnail');

            // File name được gắn tên
            $fileName = $file->getClientOriginalName();

            // Đưa file vào thư mục
            $file->move($uploadPath, $fileName);
        } else {
            $fileName = $request->img;
        }

        $query = detailpost::where('idDetailPost', $request->id)
        ->update([
            'nameDetailPost'    => $request->name,
            'urlDetailPost'     => $request->url,
            'contentDetailPost' => $request->content,
            'presentDetailPost' => $request->present,
            'dateDetailPost'    => $request->date,
            'imgDetailPost'     => $fileName,  // Lấy tên file
            'idCat'             => $request->categories,
        ]);

        return $query;
    }
}
