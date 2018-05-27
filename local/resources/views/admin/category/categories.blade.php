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
                            {!! $categories->links() !!}
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">LIST CATEGORIES</h4>
                                <p class="category">Category management</p>
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
                                    <button><a href="#" style="color:#000">Insert</a></button>
                                </div>
                            </div>

                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <th width="5%">ID</th>
                                    <th width="20%">Name</th>
                                    <th width="20%">URL</th>
                                    <th>Enable</th>
                                    <th>Edit / Delete</th>
                                    </thead>
                                    <tbody>

                                    @foreach ($categories as $category)

                                        <tr>
                                            <td>{{ $category->idCat }}</td>
                                            <td>{{ str_limit($category->nameCat,30) }}</td>
                                            <td>{{ str_limit($category->urlCat,30) }}</td>
                                            <td>{{ $category->enable }}</td>
                                            <td>
                                                <a href="{{ route('posts-list-update',$category->idCat) }}" style="font-size:18px">
                                                    <i class="fa fa-edit"></i>
                                                </a><!--  Update -->

                                                <i class="fa fa-times" onclick="myFunction({{ $category->idCat }})" style="color:#1DC7EA; font-size:18px"></i>

                                                <script>
                                                    function myFunction(a) {
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
                    <div class="col-md-3">
                        {!! $categories->links() !!}
                    </div>
                </div>

            </div>
        </div> <!-- Table -->

        <!-- Footer -->
@include('admin.footer')
