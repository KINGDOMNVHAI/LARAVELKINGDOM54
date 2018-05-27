<!doctype html>
<html lang="en">
<head>

@include('admin.header')

<script type="text/javascript" language="javascript" src='{{asset("ckeditor/ckeditor.js")}}' ></script>
<script type="text/javascript" language="javascript" src='{{asset("ckfinder/ckfinder.js")}}' ></script>

</head>
<body>

<div class="wrapper">

    @include('admin.sidebar')

    <div class="main-panel">

        @include('navigation')

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-plain">
                            <div class="header">
                                <h4 class="title">Edit Site</h4>
                                <p class="category">Tên bài viết</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover">
                                    <form action="{{ url('sites-insert') }}" method="post">
                                        {{ csrf_field() }}
                                        <tr>
                                            <td>ID</td>
                                            <td>ID của bài viết</td>
                                        </tr>
                                        <tr>
                                            <td>Name</td>
                                            <td><input type="text" name="ipname" id="ipname" style="width: 100%;"></td>
                                        </tr>
                                        <tr>
                                            <td>Present</td>
                                            <td><textarea name="ippresent" id="ippresent" rows="10" cols="50"></textarea></td>
                                            <script>CKEDITOR.replace('ippresent',{
                                                filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
                                                filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
                                                filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
                                                filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
                                                filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
                                                filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
                                            });</script>
                                        </tr>
                                        <tr>
                                            <td>URL</td>
                                            <td><input type="text" name="ipurl" id="ipurl" style="width: 100%;"></td>
                                        </tr>
                                        <tr>
                                            <td>IMG (300x200)</td>
                                            <td><input type="text" name="ipimg" id="ipimg" placeholder="kingdom-nvhai.jpg" style="width: 100%;"></td>
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
