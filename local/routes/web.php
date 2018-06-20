<?php

/* **************************** ADMIN PAGE **************************** */

// ======================= Dashboard =======================

Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard');

// truyền dữ liệu vào biến $title ở tiêu đề trang <title>
// Link dẫn dùng pages.dashboard hoặc pages/dashboard
// return view('pages/dashboard', ['title' => 'Welcome to Laravel Admin - Light Bootstrap Dashboard']);

// ======================= Login, Logout, Register, Forgot =======================

Route::get('/kd-login','Auth\LoginController@index')->name('kd-login');

Route::post('/check-login','Auth\LoginController@login')->name('check-login');

Route::get('/kd-register', 'Auth\RegisterController@index')->name('register-form');

Route::post('/register-insert', 'Auth\RegisterController@create')->name('register');

Route::get('/forgot-password', 'Auth\ForgotPasswordController@index')->name('forgot-password');

Route::post('/forgot-password-sendcode', 'Auth\ForgotPasswordController@sendcode')->name('forgot-password-sendcode');

Route::get('logout', 'Admin\DashboardController@logout')->name('logout');

// ======================= Categories =======================

Route::get('/categories', 'Admin\CategoryController@indexList')->name('categories');

Route::get('/categories-update', 'Admin\CategoryController@indexList')->name('categories-list-update');

Route::get('/categories-delete/{idCat}', 'Admin\CategoryController@delete')->name('categories-delete');

// ======================= Posts =======================

Route::get('/posts', 'Admin\PostController@indexList')->name('posts');

Route::post('/posts-search', 'Admin\PostController@search')->name('posts-search');

Route::get('/posts-insert', 'Admin\PostController@indexInsert')->name('posts-insert');

Route::post('/posts-insert', 'Admin\PostController@insert')->name('posts-insert');

Route::get('/posts-update/{idDetailPost}', 'Admin\PostController@indexUpdate')->name('posts-list-update');

Route::post('/posts-updated/{idDetailPost}', 'Admin\PostController@update')->name('posts-update');

Route::get('/posts-delete', 'Admin\PostController@indexDelete')->name('posts-list-delete');

Route::post('/posts-delete', 'Admin\PostController@deleteManyPost')->name('posts-delete-many-posts');

Route::get('/posts-delete/{idDetailPost}', 'Admin\PostController@deletePost')->name('posts-delete-post');

// ======================= Sites =======================

Route::get('/sites', 'Admin\SiteController@indexList')->name('sites');

Route::post('/sites-search', 'Admin\SiteController@search')->name('sites-search');

Route::get('/sites-insert', 'Admin\SiteController@indexInsert')->name('sites-insert');

Route::post('/sites-insert', 'Admin\SiteController@insert')->name('sites-insert');

Route::get('/sites-update/{idSite}', 'Admin\SiteController@indexUpdate')->name('sites-list-update');

Route::post('/sites-update/', 'Admin\SiteController@update')->name('sites-update');

Route::get('/sites-delete/{idSite}', 'Admin\SiteController@delete')->name('sites-delete');

// ======================= Download =======================

Route::get('/download', 'Admin\DownloadController@indexList')->name('download');

Route::post('/download-search', 'Admin\DownloadController@search')->name('download-search');

Route::get('/download-insert', 'Admin\DownloadController@indexInsert')->name('download-insert');

Route::post('/download-insert', 'Admin\DownloadController@insert')->name('download-insert');

Route::get('/download-update/{idDown}', 'Admin\DownloadController@indexUpdate')->name('download-list-update');

Route::post('/download-update/', 'Admin\DownloadController@update')->name('download-update');

Route::get('/download-delete/{idDown}', 'Admin\DownloadController@delete')->name('download-delete');




// ======================= User Profile =======================

Route::get('/user-profile', 'Admin\ProfileController@index')->name('user-profile');

Route::post('/user-profile-update/{id}', 'Admin\ProfileController@update')->name('user-profile-update');

// ======================= Security =======================

Route::get('/security', 'Admin\SecurityController@index')->name('security');

Route::post('/security-update', 'Admin\SecurityController@update')->name('security-update');

// ======================= Administrator =======================

Route::get('/administrator', 'Admin\AdministratorController@index')->name('administrator');








/* **************************** NEWS PAGE **************************** */

// ======================= Home Page =======================

Route::get('/', 'News\HomeController@index');

Route::get('/about-us', 'News\HomeController@about');

// ======================= Category Page =======================

Route::get('/category/{urlCat}', 'News\PostController@listPostCategory')->name('category-page');

// ======================= Post Page =======================

Route::get('/post/{urlDetailPost}', 'News\PostController@contentPost')->name('post-content');

// ======================= Download Page =======================

Route::get('/download/{urlCat}', 'News\DownloadController@listDownload')->name('download-page');

// ======================= Search Page =======================

Route::post('/list-search-post', 'News\PostController@listSearch')->name('list-search-post');

