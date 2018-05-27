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
                        <div class="card card-plain">
                            <div class="header">
                                <h4 class="title">Administrator</h4>
                                <p class="category">Admin Manager</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover">
                                    <thead>
                                        <th width="5%">ID</th>
                                    	<th width="10%">LASTNAME</th>
                                        <th>FIRSTNAME</th>
                                    	<th width="10%">USERNAME</th>
                                        <th>PASSWORD</th>
                                        <th>TYPE</th>
                                    </thead>
                                    <tbody>

                                        @foreach ($admins as $admin)

                                        <tr>
                                        	<td>{{ $admin->id }}</td>
                                        	<td>{{ $admin->lastname }}</td>
                                            <td>{{ $admin->firstname }}</td>
                                        	<td>{{ $admin->username }}</td>
                                        	<td>{{ $admin->password }}</td>
                                            <td>{{ $admin->type }}</td>
                                            <td><a href="{{ url('$user-update') }}">Edit</a></td>
                                        </tr>

                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-plain">
                            <div class="header">
                                <h4 class="title">User</h4>
                                <p class="category">User Manager</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover">
                                    <thead>
                                    <th width="5%">ID</th>
                                    <th width="10%">LASTNAME</th>
                                    <th>FIRSTNAME</th>
                                    <th width="10%">USERNAME</th>
                                    <th>PASSWORD</th>
                                    <th>TYPE</th>
                                    </thead>
                                    <tbody>

                                    @foreach ($users as $user)

                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->lastname }}</td>
                                            <td>{{ $user->firstname }}</td>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->password }}</td>
                                            <td>{{ $user->type }}</td>
                                            <td><a href="{{ url('$user-update') }}">Edit</a></td>
                                        </tr>

                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        @include('admin/footer')
