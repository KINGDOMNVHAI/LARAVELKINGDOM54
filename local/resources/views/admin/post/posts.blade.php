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
                        <div class="col-md-6">
                            {!! $posts->links() !!}
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">LIST POSTS</h4>
                                <p class="category">Posts management</p>
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
                                    <button><a href="{{ route('posts-insert')  }}" style="color:#000">Insert</a></button>
                                </div>
                            </div>

                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Present</th>
                                        <th width="25%">Content</th>
                                        <th>Date</th>
                                        <th>URL</th>
                                        <th width="10%">IMG</th>
                                        <th>Category</th>
                                        <th>Enable</th>
                                        <th>Author</th>
                                        <th>Views</th>
                                        <th>Edit / Delete</th>
                                    </thead>
                                    <tbody>

                                        @foreach ($posts as $post)

                                        <tr>
                                            <td>{{ $post->idDetailPost }}</td>
                                            <td>{{ str_limit($post->nameDetailPost,30) }}</td>
                                            <td>{{ str_limit($post->presentDetailPost,50) }}</td>
                                            <td>{{ str_limit($post->contentDetailPost,120) }}</td>
                                            <td>{{ $post->dateDetailPost }}</td>
                                            <td>{{ str_limit($post->urlDetailPost,30) }}</td>
                                            <td><img src="local/public/upload/images/thumbnail/{{ $post->imgDetailPost }}" width="100%"></td>

                                            <?php
                                            $id = $post->idCat;
                                            $con = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
                                            mysqli_set_charset($con,"utf8");

                                            $query = mysqli_query($con,"SELECT nameCat FROM category WHERE idCat = $id");
                                            $row = mysqli_fetch_array($query,MYSQLI_NUM);

                                            ?>

                                            <td><a href="{{ route('categories-list-update',$post->idCat) }}">{{ $row[0] }}</a></td>

                                            <?php mysqli_close($con); ?>

                                            <td>
                                                @if ($post->enable == ENABLE)
                                                    <i class="fa fa-check"></i>
                                                @endif
                                            </td>
                                            <td>{{ $post->author }}</td>
                                            <td>{{ $post->viewDetailPost }}</td>
                                            <td>
                                                <a href="{{ route('posts-list-update',$post->idDetailPost) }}" style="font-size:18px">
                                                    <i class="fa fa-edit"></i>
                                                </a><!--  Update -->

                                                <i class="fa fa-times" onclick="deletePost({{ $post->idDetailPost }})" style="color:#1DC7EA; font-size:18px"></i>

                                                <script>
                                                    function deletePost(a) {
                                                        var base_url = window.location.origin;
                                                        var c = base_url + "/LARAVELKINGDOM/posts-delete/" + a;
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
                    <div class="col-md-6">
                        {!! $posts->links() !!}
                    </div>
                </div>

            </div>
        </div> <!-- Table -->

        <!-- Footer -->
        @include('admin.footer')
