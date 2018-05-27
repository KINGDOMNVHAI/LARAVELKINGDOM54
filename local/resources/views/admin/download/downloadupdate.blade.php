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
                        <div class="card card-plain">
                            <div class="header">
                                <h4 class="title">Insert</h4>
                                <p class="category">
                                    <!-- Update Successful: show message -->
                                    @if (session() -> has('message'))
                                        {{ session() -> get('message') }}
                                    @else
                                        {{ 'Other pages of KINGDOM NVHAI' }}
                                    @endif
                                </p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover">
                                    <form action="{{ route('download-update') }}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <tr>
                                            <td>NAME</td>
                                            <td><input type="text" name="name" id="name" style="width: 100%;" value="{{ $download->nameCat }}"></td>
                                        </tr>
                                        <tr>
                                            <td>LINK DOWNLOAD<br>(If have many links, give BR )</td>
                                            <td><textarea name="link" id="link" rows="10" cols="50"></textarea></td>
                                        </tr>
                                        <tr>
                                            <td>ID POST</td>
                                            <td><input type="text" name="post" id="post" style="width: 100%;"></td>
                                        </tr>
                                        <tr>
                                            <td>THUMBNAIL (300x200)</td>
                                            <td><input type="file" name="thumbnail" id="thumbnail"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" name="enable" value="1"> HIDDEN </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><input type="submit" name="submit"></td>
                                        </tr>
                                    </form>
                                </table>
                            </div>
                        </div>
                        <div>

                        </div>
                    </div>
                </div>

                <!-- Footer -->
@include('admin.footer')
