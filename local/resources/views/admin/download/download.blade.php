<!doctype html>
<html lang="en">
<head>

<!-- kế thừa template bằng include -->
@include('admin.header')

<script type="text/javascript" language="javascript" src='{{asset("ckeditor/ckeditor.js")}}' ></script>
<script type="text/javascript" language="javascript" src='{{asset("ckfinder/ckfinder.js")}}' ></script>

</head>
<body>

<div class="wrapper">

    <!-- kế thừa template bằng include -->
    @include('admin.sidebar')

    <div class="main-panel">
		
        <!-- kế thừa template bằng include -->
        @include('admin.navigation')

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-3">
                            {!! $downloads->links() !!}
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">LIST DOWNLOAD</h4>
                                <p class="category">Download management</p>
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-10" style="padding-top: 5px">
                                    <form action="{{ route('posts-search') }}" method="post">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" name="search" value="Search">
                                        <input type="text" name="keyword" placeholder="Keyword" value="{{ $keyword or '' }}">
                                        <select name="category">
                                            <option value="all">All Categories</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->idCat }}">{{ $category->nameCat }}</option>
                                            @endforeach
                                        </select>
                                        <select name="date">
                                            <option value="desc">Mới nhất</option>
                                            <option value="asc">Cũ nhất</option>
                                        </select>
                                    </form>
                                </div>
                                <div class="col-md-2">
                                    <button><a href="{{ route('download-insert')  }}" style="color:#000">Insert</a></button>
                                </div>
                            </div>

                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>URL</th>
                                        <th width="10%">IMG</th>
                                        <th>Post</th>
                                        <th>Enable</th>
                                        <th>Edit / Delete</th>
                                    </thead>
                                    <tbody>

                                        @foreach ($downloads as $download)

                                        <tr>
                                            <td>{{ $download->idDown }}</td>
                                            <td>{{ str_limit($download->nameDown,30) }}</td>
                                            <td>{{ str_limit($download->linkDown,50) }}</td>
                                            <td><img src="upload/images/download/{{ $download->imgDown }}" width="100%"></td>
                                            <td>{{ str_limit($download->idDetailPost,30) }}</td>
                                            <td>{{ $download->enable }}</td>
                                            <td>
                                                <a href="{{ route('download-list-update',$download->idDown) }}" style="font-size:18px">
                                                    <i class="fa fa-edit"></i>
                                                </a><!--  Update -->

                                                <i class="fa fa-times" onclick="myFunction({{ $download->idDetailPost }})" style="color:#1DC7EA; font-size:18px"></i>

                                                <script>
                                                    function myFunction(a) {
                                                        var base_url = window.location.origin;
                                                        var c = base_url + "/LARAVELKINGDOM/download-delete/" + a;
                                                        if (confirm("Bạn muốn xóa bài viết?")) {
                                                            window.location.replace(c);
                                                        }
                                                    }
                                                </script>
                                            </td>
                                            <!-- Submit Update -->
                                        </tr>

                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> <!-- Row -->

                <div class="col-md-12">
                    <div class="col-md-3">
                        {!! $downloads->links() !!}
                    </div>
                </div>

            </div>
        </div> <!-- Table -->

        <!-- Footer -->
        @include('admin.footer')
        