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
                                        <th width="10%">Name</th>
                                        <th>Present</th>
                                        <th width="15%">URL</th>
                                        <th width="10%">THUMBAIL</th>
                                    </thead>
                                    <tbody>

                                    @foreach ($sites as $site)

                                        <tr>
                                            <td>{{ $site->idSite }}</td>
                                            <td>{{ $site->nameSite }}</td>
                                            <td>{{ $site->presentSite }}</td>
                                            <td>{{ $site->urlSite }}</td>
                                            <td><img src="upload/images/thumbnail/{{ $site->imgSite }}" width="100%"></td>

                                            <form action="{{ url('sites-update/'.$site->idSite) }}" method="post" >
                                                {{ csrf_field() }}
                                                <td><input type="submit" value="Update" ></td>
                                            </form>
                                            <form action="{{ url('sites-delete/'.$site->idSite) }}" method="post" >
                                                {{ csrf_field() }}
                                                <td><input type="submit" value="Delete" ></td>
                                            </form>
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
