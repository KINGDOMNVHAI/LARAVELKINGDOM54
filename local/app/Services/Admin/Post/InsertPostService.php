<?php
namespace App\Services\Admin\Post;

use App\Model\detailpost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\ServiceProvider;

class InsertPostService extends ServiceProvider
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
        $popular = 0;
        $update  = 0;

        // File name mặc định không có tên
        $fileName = '';

        //Kiểm tra file
        if (Input::hasFile('thumbnail'))
        {
            // Thư mục upload
            $uploadPath = public_path('upload/images/thumbnail');
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
        if ($request->popular != null)
        {
            $popular = $request->popular;
        }
        if ($request->update != null)
        {
            $update = $request->update;
        }

        $query = detailpost::insert([
            'nameDetailPost'    => $request->name,
            'urlDetailPost'     => $request->url,
            'contentDetailPost' => $request->content,
            'presentDetailPost' => $request->present,
            'dateDetailPost'    => $request->date,
            'imgDetailPost'     => $fileName,  // Lấy tên file
            'idCat'             => $request->categories,
            'signature'         => Auth::user()->signature,
            'author'            => Auth::user()->username,
            'enable'            => $enable,
            'popular'           => $popular,
            'update'            => $update,
            'views'             => 0,
        ]);

        return $query;
    }
}
