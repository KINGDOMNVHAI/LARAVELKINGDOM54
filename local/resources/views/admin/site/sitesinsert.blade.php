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
                                    <form action="{{ route('sites-insert') }}" method="post" enctype="multipart/form-data" >
                                        {{ csrf_field() }}
                                        <tr>
                                            <td>Name</td>
                                            <td><input type="text" name="name" id="name" style="width: 100%;"></td>
                                        </tr>
                                        <tr>
                                            <td>Present</td>
                                            <td><textarea name="present" id="present" rows="10" cols="50"></textarea></td>
                                            <script>CKEDITOR.replace('present',{
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
                                            <td><input type="text" name="url" id="url" style="width: 100%;"></td>
                                        </tr>
                                        <tr>
                                            <td>THUMBNAIL (300x200)</td>
                                            <td><input type="file" name="thumbnail" id="thumbnail"></td>
                                        </tr>
                                        <tr>
                                            <td>HIDDEN</td>
                                            <td>
                                                <input type="radio" name="hidden" checked value="1"> YES
                                                <input type="radio" name="hidden" value="0"> NO
                                            </td>
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
