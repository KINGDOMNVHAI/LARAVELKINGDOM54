<?php
namespace App\Services\Admin\Profile;

use App\Model\user;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

class UpdateProfileService extends ServiceProvider
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
        $fileNameAvatar = '';
        $fileNameBanner = '';

        //Kiểm tra file
        if ($request->hasFile('avatar'))
        {
            // Thư mục upload
            $uploadPath = public_path('../../upload/images/avatar');
            $file = $request->file('avatar');

            // File name được gắn tên
            $fileNameAvatar = $file->getClientOriginalName();

            // Đưa file vào thư mục
            $file->move($uploadPath, $fileNameAvatar);
        } else {
            $fileNameAvatar = Auth::user()->avatar;
        }

        //Kiểm tra file
        if ($request->hasFile('banner'))
        {
            // Thư mục upload
            $uploadPath = public_path('../../upload/images/banner');
            $file = $request->file('banner');

            // File name được gắn tên
            $fileNameBanner = $file->getClientOriginalName();

            // Đưa file vào thư mục
            $file->move($uploadPath, $fileNameBanner);
        } else {
            $fileNameBanner = Auth::user()->banner;
        }

        $query = user::where('id', Auth::user()->id)
            ->update([
                'lastname' => $request->lastname,
                'firstname' => $request->firstname,
                'username' => $request->username,
                'email' => $request->email,
                'city' => $request->city,
                'address' => $request->address,
                'company' => $request->company,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'aboutme' => $request->aboutme,
                'signature' => $request->signature,
                'avatar' => $fileNameAvatar, // Lấy tên file
                'banner' => $fileNameBanner, // Lấy tên file
            ]);

        return $query;
    }
}
