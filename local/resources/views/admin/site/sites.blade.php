<!doctype html>
<html lang="en">
<head>

<!-- kế thừa template bằng include -->
@include('admin.header')

</head>
<body>

<div class="wrapper">

    @include('admin.sidebar')

    <div class="main-panel">

        @include('admin.navigation')


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-3">
                            {!! $sites->links() !!}
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">SITES</h4>
                                <p class="category">Other pages of KINGDOM NVHAI</p>
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-10" style="padding-top: 5px">
                                    <form action="{{ route('sites-search') }}" method="post">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" name="search" value="Search">
                                        <input type="text" name="keyword" placeholder="Keyword" value="{{ $keyword or '' }}">
                                    </form>
                                </div>
                                <div class="col-md-2">
                                    <button type="button"><a href="{{ url('sites-insert') }}" style="color:#000">Insert</a></button> &nbsp;
                                </div>
                            </div>

                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th width="5%">ID</th>
                                        <th width="20%">Name</th>
                                        <th width="30%">Present</th>
                                        <th width="15%">URL</th>
                                        <th width="10%">IMG</th>
                                        <th>Edit / Delete</th>
                                    </thead>
                                    <tbody>

                                    @foreach ($sites as $site)

                                        <tr>
                                            <td>{{ $site->idSite }}</td>
                                            <td>{{ $site->nameSite }}</td>
                                            <td>{{ str_limit($site->presentSite,100) }}</td>
                                            <td>{{ str_limit($site->urlSite,30) }}</td>
                                            <td><img src="upload/images/thumbnail/{{ $site->imgSite }}" width="100%"></td>
                                            <td>
                                                <a href="{{ route('sites-list-update',$site->idSite) }}" style="font-size:18px">
                                                    <i class="fa fa-edit"></i>
                                                </a><!--  Update -->

                                                <i class="fa fa-times" onclick="myFunction({{ $site->idSite }})" style="color:#1DC7EA; font-size:18px"></i>

                                                <script>
                                                    function myFunction(a) {
                                                        var base_url = window.location.origin;
                                                        var c = base_url + "/LARAVELKINGDOM/sites-delete/" + a;
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
                        {!! $sites->links() !!}
                    </div>
                </div>

            </div>
        </div> <!-- Table -->

        <!-- Footer -->
        @include('admin.footer')
