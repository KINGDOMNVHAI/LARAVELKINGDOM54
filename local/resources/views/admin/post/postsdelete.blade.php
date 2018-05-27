<!doctype html>
<html lang="en">
<head>

<!-- kế thừa template bằng include -->
@include('admin/header')

<script type="text/javascript" language="javascript" src='{{asset("ckeditor/ckeditor.js")}}' ></script>
<script type="text/javascript" language="javascript" src='{{asset("ckfinder/ckfinder.js")}}' ></script>

</head>
<body>

<div class="wrapper">

    <!-- kế thừa template bằng include -->
    @include('admin/sidebar')

    <div class="main-panel">
		
        <!-- kế thừa template bằng include -->
        @include('admin/navigation')

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">DELETE POSTS</h4>
                                <p class="category">Choose posts you want to delete</p>
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-9" style="padding-top: 5px">
                                    <form action="{{ route('posts-search')  }}" method="post">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" name="ipsearch" value="Search">
                                        <input type="text" name="ipsearch" placeholder="Keyword">

                                        <select name="slcase">
                                            <option value="idtang">ID tăng dần</option>
                                            <option value="idgiam">ID giảm dần</option>
                                            <!-- <option value="datetang">Ngày tăng dần</option>
                                            <option value="dategiam">Ngày giảm dần</option>
                                            <option value="trangchu">Bài ngoài trang chủ</option> -->
                                        </select>
                                    </form>
                                </div>
                                <div class="col-md-3">
                                    {!! $posts->links() !!}
                                </div>
                            </div>

                            <form action="{{ route('posts-delete-many-posts') }}" method="post" >
                                <div class="col-md-7">
                                    <input type="submit" value="Delete">
                                </div>
                                <input type="submit" name>
                                <div class="content table-responsive table-full-width">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th></th>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Present</th>
                                            <th>Date</th>
                                            <th width="10%">IMG</th>
                                            <th>Category</th>
                                            <th>New Post</th>
                                            <th>Views</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($posts as $post)
                                            <tr>
                                                <td><input type="checkbox" name="checkbox[]" value="{{ $post->idDetailPost }}">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}"></td>
                                                <td>{{ $post->idDetailPost }}</td>
                                                <td>{{ str_limit($post->nameDetailPost,30) }}</td>
                                                <td>{{ str_limit($post->presentDetailPost,50) }}</td>
                                                <td>{{ $post->dateDetailPost }}</td>
                                                <td><img src="upload/images/thumbnail/{{ $post->imgDetailPost }}" width="100%"></td>
                                                <td><center>{{ $post->idCat }}</center></td>
                                                <td>{{ $post->newpost }}</td>
                                                <td>{{ $post->viewDetailPost }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </form>

                        </div>
                    </div>
                </div> <!-- Row -->

                {!! $posts->links() !!}

            </div>
        </div> <!-- Table -->

        <!-- Footer -->
        @include('admin/footer')
        