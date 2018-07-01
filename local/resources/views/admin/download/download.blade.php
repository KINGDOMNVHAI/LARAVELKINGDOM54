<!doctype html>
<html lang="en">
<head>

<!-- kế thừa template bằng include -->
@include('admin.header')

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
                                    <form action="{{ route('download-search') }}" method="post">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" name="search" value="Search">
                                        <input type="text" name="keyword" placeholder="Keyword" value="{{ $keyword or '' }}">
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
                                            <td><a href="{{ $download->linkDown }}" target="_blank">{{ str_limit($download->linkDown,50) }}</a></td>
                                            <td><img src="local/public/upload/images/download/{{ $download->imgDown }}" width="100%"></td>

                                            <?php
                                                $id = $download->idDetailPost;
                                                $con = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
                                                mysqli_set_charset($con,"utf8");

                                                $query = mysqli_query($con,"SELECT nameDetailPost FROM detailpost WHERE idDetailPost = $id");
                                                $row = mysqli_fetch_array($query,MYSQLI_NUM);

                                            ?>

                                            <td><a href="{{ route('posts-list-update',$download->idDetailPost) }}">{{ str_limit($row[0],30) }}</a></td>

                                            <?php mysqli_close($con); ?>

                                            <td>{{ $download->enable }}</td>
                                            <td>
                                                <a href="{{ route('download-list-update',$download->idDown) }}" style="font-size:18px">
                                                    <i class="fa fa-edit"></i>
                                                </a><!--  Update -->

                                                <i class="fa fa-times" onclick="myFunction({{ $download->idDown }})" style="color:#1DC7EA; font-size:18px"></i>

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
        