<!--
Theme: Light Bootstrap Dashboard
Author: Creative Tim
Author URL: https://www.creative-tim.com/product/light-bootstrap-dashboard
-->
<!doctype html>
<html lang="en">
<head>

<!-- kế thừa template bằng include -->
@include('admin.header')

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
                    <div class="col-md-6">
                        <div class="card card-user">
                            <div class="image">
                                @if(Auth::user()->banner != null)
                                    <img src="local/public/upload/images/banner/{{Auth::user()->banner}}" />
                                @else
                                    <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/>
                                @endif
                            </div>
                            <div class="content">
                                <div class="author">
                                    <a href="#">
                                        @if(Auth::user()->avatar != null)
                                            <img class="avatar border-gray" src="local/public/upload/images/avatar/{{Auth::user()->avatar}}" />
                                        @else
                                            <img class="avatar border-gray" src="admin/imgs/faces/face-1.jpg" />
                                        @endif

                                        <h4 class="title">{{ __('admin.welcome_user') }} {{Auth::user()->username}}!
                                            <small>({{Auth::user()->type}})</small><br />
                                        </h4>
                                    </a>
                                </div>
                                <p class="description text-center">{{Auth::user()->aboutme}}</p>
                            </div>
                            <hr>
                            <div class="text-center">
                                <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Get chart from Google Analytics</h4>
                                <p class="category">{{ __('admin.posts_per_category') }}</p>
                            </div>
                            <div class="content">
                                <div id="chartHours" class="ct-chart" style="position: relative; width:100%;">
                                    <!-- Chart -->
                                    <script src="{{ asset('admin/js/Chart.min.js') }}"></script>
                                    <canvas id="myChart" style="max-height:300px;"></canvas>
                                    <script>
                                    var ctx = document.getElementById("myChart").getContext('2d');
                                    var myChart = new Chart(ctx, {
                                        type: 'bar',
                                        data: {
                                            labels: ["Red", "Blue", "Yellow", "Green"],
                                            datasets: [{
                                                label: '# of A',
                                                data: [120, 19, 3, 5],
                                                backgroundColor: [
                                                    'rgba(255, 99, 132, 0.2)',
                                                    'rgba(54, 162, 235, 0.2)',
                                                    'rgba(255, 206, 86, 0.2)',
                                                    'rgba(75, 192, 192, 0.2)'
                                                ],
                                                borderColor: [
                                                    'rgba(255,99,132,1)',
                                                    'rgba(54, 162, 235, 1)',
                                                    'rgba(255, 206, 86, 1)',
                                                    'rgba(75, 192, 192, 1)'
                                                ],
                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            scales: {
                                                yAxes: [{
                                                    ticks: {
                                                        beginAtZero:true
                                                    }
                                                }]
                                            }
                                        }
                                    });
                                    </script>
                                </div>
                                <div class="footer">
                                    <div class="legend">
                                        <i class="fa fa-circle text-info"></i> Open
                                        <i class="fa fa-circle text-danger"></i> Click
                                        <i class="fa fa-circle text-warning"></i> Click Second Time
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-history"></i> Updated 3 minutes ago
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Thống kê tin tức</h4>
                                <p class="category">{{ __('admin.categories_and_posts') }}</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>{{ __('admin.category_name') }}</th>
                                        <th>{{ __('admin.category_url') }}</th>
                                        <th>{{ __('admin.category_number_of_posts') }}</th>
                                        <th>{{ __('admin.category_number_of_views') }}</th>
                                    </thead>
                                    <tbody>

                                    @foreach ($categories as $category)

                                        <tr>
                                            <td>{{ $category->name_category }}</td>
                                            <td>{{ $category->url_category }}</td>
                                            <td>{{ $category->count_post or 0 }}</td>
                                            <td>{{ $category->view_post or 0 }}</td>
                                        </tr>

                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card ">
                            <div class="header">
                                <h4 class="title">{{ __('admin.new_post') }}</h4>
                                <p class="category">{{ __('admin.newest_post') }}</p>
                            </div>
                            <div class="content">
                                <div class="table-full-width">
                                    <table class="table">
                                        <tbody>
                                            @foreach($newest as $new)
                                            <tr>
                                                <td>
                                                    {{ $new->dateDetailPost }}
                                                </td>
                                                <td>
													<img src="local/public/upload/images/thumbnail/{{ $new->imgDetailPost }}" width="100px">&nbsp&nbsp
													{{ $new->nameDetailPost }}
												</td>

                                                @if (Auth::user()->type == TYPE_EDITOR || Auth::user()->type == TYPE_ADMIN)
                                                <td class="td-actions text-right">
                                                    <a href="{{ route('posts-list-update',$new->idDetailPost) }}"><i class="fa fa-edit"></i></a>
                                                </td>
                                                @endif

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
        </div>

        <!-- Footer -->
        @include('admin/footer')
