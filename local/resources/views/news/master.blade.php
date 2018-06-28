<!--
Author: FreeCSS
Author URL: http://www.free-css.com/template-categories/news
-->
<!DOCTYPE html>
<html>
<head>
    <title>{{ $title or 'KINGDOM NVHAI'}}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="news/images/favicon.ico" type="image/gif" sizes="16x16">
    <link rel="stylesheet" type="text/css" href="{{asset('news/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('news/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('news/css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('news/css/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('news/css/theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('news/css/style.css')}}">
    <!--[if lt IE 9]>
    <script src="{{asset('news/js/html5shiv.min.js')}}"></script>
    <script src="{{asset('news/js/respond.min.js')}}"></script>
    <![endif]-->

    <!-- Google Analytics -->
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-65258802-1', 'auto');
        ga('send', 'pageview');
    </script>

    <!-- Fanpage -->
    <div id="fb-root"></div>
    <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.11';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
</head>
<body>

<!-- Navbar -->
<div id="preloader">
    <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container">
    <header id="header">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="header_top">
                    <div class="header_top_left">
                        <ul class="top_nav">
                            <li><a href="{{ url('/') }}">KINGDOM NVHAI</a></li>
                            <!-- <li><a href="pages/page.html">About Us</a></li> -->
                            <li><a href="{{ url('https://www.youtube.com/channel/UCxUL0zS-XiU36bkUsr5dWbg') }}">Youtube Channel</a></li>
                            <li><a href="{{ url('http://localhost/KAWAIICODE/') }}">Kawaii Code</a></li>
                            <li><a href="http://datealive.kingdomnvhai.info/">Date a live Fan Club</a></li>
                        </ul>
                    </div>
                    <div class="header_top_right">
                        <form action="#" class="search_form">
                            <input type="text" placeholder="Text to Search">
                            <input type="submit" value="">
                        </form>
                    </div>
                </div>
                <div class="header_bottom">
                    <div class="header_bottom_left"><a class="logo" href="{{ url('/') }}"><img src="{{ asset('news/images/logo_name_NVHAI_small_blue.png') }}" width="200px"></a></div>
                    <div class="header_bottom_right"><a href="#"><img src="{{asset('news/images/addbanner_728x90_V1.jpg')}}" alt=""></a></div>
                </div>
            </div>
        </div>
    </header>
    <div id="navarea">
        <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav custom_nav">
                        <li class="dropdown"> <a href="#" class="" data-toggle="dropdown" role="button" aria-expanded="false">Chuyên mục</a>
                            <ul class="dropdown-menu" role="menu">
                                <?php
                                $enable = ENABLE;
                                $con = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
                                mysqli_set_charset($con,"utf8");
                                $query = "SELECT * FROM category WHERE enable = $enable";

                                if ($result = $con->query($query)) {

                                /* fetch object array */
                                while ($obj = $result->fetch_object()) {
                                ?>

                                <li><a href="{{ route('category-page', $obj->urlCat ) }}">{{ $obj->nameCat }}</a></li>

                                <?php
                                }
                                /* free result set */
                                $result->close();
                                } ?>

                            </ul>
                        </li>
                        <li class="dropdown"> <a href="#" class="" data-toggle="dropdown" role="button" aria-expanded="false">Download</a>
                            <ul class="dropdown-menu" role="menu">
                                <?php
                                $enable = ENABLE;
                                $con = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
                                mysqli_set_charset($con,"utf8");
                                $query = "SELECT * FROM category WHERE enable = $enable";

                                if ($result = $con->query($query)) {

                                /* fetch object array */
                                while ($obj = $result->fetch_object()) {
                                ?>

                                <li><a href="{{ route('download-page', $obj->urlCat ) }}">{{ $obj->nameCat }}</a></li>

                                <?php
                                }
                                /* free result set */
                                $result->close();
                                } ?>

                            </ul>
                        </li>
                        <!--  <li><a href="pages/contact.html">Contact</a></li>
                        <li><a href="pages/404.html">404 page</a></li> -->
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!-- End Navbar -->

    <!-- Main Content -->
    <section id="mainContent">

        <!-- Content Middle -->

        <div class="content_middle">
            <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="content_middle_leftbar">
                    <div class="single_category wow fadeInDown">
                        <h2> <span class="bold_line"><span></span></span> <span class="solid_line"></span> <a href="#" class="title_text">Mới nhất</a> </h2>
                        <ul class="catg1_nav">
                            <?php
                                for ($i=0; $i<=1; $i++){
                            ?>
                            <li>
                                <div class="catgimg_container"> <a href="{{ $heads[$i]->urlDetailPost }}" class="catg1_img"><img alt="" src="{{ url('/') }}/upload/images/thumbnail/{{ $heads[$i]->imgDetailPost }}"></a></div>
                                <h3 class="post_titile"><a href="{{ $heads[$i]->urlDetailPost }}">{{ $heads[$i]->nameDetailPost }}</a></h3>
                            </li>
                            <?php } ?>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="content_middle_middle">
                    <div class="slick_slider2">

                        @foreach($newest as $new)
                            <div class="single_featured_slide"> <a href="#"><img alt="{{ $new->nameDetailPost }}" src="{{ url('/') }}/upload/images/thumbnail/{{ $new->imgDetailPost }}"></a>
                                <h2><a href="{{ route('post-content', $new->urlDetailPost ) }}">{{ $new->nameDetailPost }}</a></h2>
                                <p>{{ $new->presentDetailPost }}</p>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="content_middle_rightbar">
                    <div class="single_category wow fadeInDown">
                        <h2> <span class="bold_line"><span></span></span> <span class="solid_line"></span> <a href="#" class="title_text">Mới nhất</a> </h2>
                        <ul class="catg1_nav">
                            <?php
                            for ($j=2; $j<=3; $j++){
                            ?>
                            <li>
                                <div class="catgimg_container"> <a href="{{ route('post-content', $heads[$j]->urlDetailPost ) }}" class="catg1_img"><img alt="" src="{{ url('/') }}/upload/images/thumbnail/{{ $heads[$j]->imgDetailPost }}"></a></div>
                                <h3 class="post_titile"><a href="{{ route('post-content', $heads[$j]->urlDetailPost ) }}">{{ $heads[$j]->nameDetailPost }}</a></h3>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="content_bottom">
            <!-- Content Left -->
            @yield('NoiDung')

            <!-- Sidebar -->
            <div class="col-lg-4 col-md-4">
                <div class="content_bottom_right">
                    <div class="single_bottom_rightbar">
                        <img alt="" src="{{asset('news/images/addbanner_300x250.jpg')}}" width="100%">
                        <h2>Cập nhật thường xuyên</h2>
                        <ul class="small_catg popular_catg wow fadeInDown">
                            @foreach($updates as $update)
                                <li>
                                    <div class="media wow fadeInDown"> <a href="{{ route('post-content', $update->urlDetailPost ) }}" class="media-left"><img alt="" src="{{ url('/') }}/upload/images/thumbnail/{{ $update->imgDetailPost }}"> </a>
                                        <div class="media-body">
                                            <h4 class="media-heading"><a href="{{ route('post-content', $update->urlDetailPost ) }}">{{ $update->nameDetailPost }}</a></h4>
                                            <p>{{ $update->presentDetailPost }}</p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="single_bottom_rightbar">
                        <ul role="tablist" class="nav nav-tabs custom-tabs">
                            <li class="active" role="presentation"><a data-toggle="tab" role="tab" aria-controls="home" href="#mostPopular">Xem nhiều nhất</a></li>
                            <li role="presentation"><a data-toggle="tab" role="tab" aria-controls="messages" href="#recentComent">Đề xuất</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="mostPopular" class="tab-pane fade in active" role="tabpanel">
                                <ul class="small_catg popular_catg wow fadeInDown">

                                    @foreach ($mostViews as $view)
                                        <li>
                                            <div class="media wow fadeInDown"> <a class="media-left" href="{{ route('post-content', $view->urlDetailPost ) }}"><img src="{{ url('/') }}/upload/images/thumbnail/{{ $view->imgDetailPost }}"alt=""></a>
                                                <div class="media-body">
                                                    <h4 class="media-heading"><a href="{{ route('post-content', $view->urlDetailPost ) }}">{{ $view->nameDetailPost }}</a></h4>
                                                    <p>{{ $view->presentDetailPost }}</p>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                            <div id="recentComent" class="tab-pane fade" role="tabpanel">
                                <ul class="small_catg popular_catg">
                                    @foreach($random as $rand)
                                        <li>
                                            <div class="media wow fadeInDown"> <a class="media-left" href="{{ route('post-content', $rand->urlDetailPost ) }}"><img src="{{ url('/') }}/upload/images/thumbnail/{{ $rand->imgDetailPost }}" alt=""></a>
                                                <div class="media-body">
                                                    <h4 class="media-heading"><a href="{{ route('post-content', $rand->urlDetailPost ) }}">{{ $rand->nameDetailPost }}</a></h4>
                                                    <p>{{ $rand->presentDetailPost }}</p>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="single_bottom_rightbar">
                        <h2>TÌM KIẾM</h2>
                        <div class="blog_archive wow fadeInDown">
                            <form action="{{ route('list-search-post') }}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <select name="category" style="margin-bottom:5px">
                                    <option value="all">Tất cả</option>
                                    <?php
                                    $enable = ENABLE;
                                    $con = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
                                    mysqli_set_charset($con,"utf8");
                                    $query = "SELECT * FROM category WHERE enable = $enable";

                                    if ($result = $con->query($query)) {

                                    /* fetch object array */
                                    while ($obj = $result->fetch_object()) {
                                    ?>

                                        <option value="{{ $obj->idCat }}">{{ $obj->nameCat }}</option>

                                    <?php
                                    }
                                    /* free result set */
                                    $result->close();
                                    } ?>

                                </select>
                                <select name="date">
                                    <option value="desc">Mới nhất</option>
                                    <option value="asc">Cũ nhất</option>
                                </select>
                                <input type="text" id="keyword" name="keyword" placeholder="Từ khóa">
                                <input type="submit" id="search" name="search" value="Tìm kiếm">
                            </form>
                        </div>
                    </div>
                    <!-- <div class="single_bottom_rightbar wow fadeInDown">
                        <h2>LINK QUẢNG CÁO</h2>
                        <ul>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Blog Home</a></li>
                            <li><a href="#">Error Page</a></li>
                            <li><a href="#">Social link</a></li>
                            <li><a href="#">Login</a></li>
                        </ul>
                    </div> -->
                    <img alt="" src="{{asset('news/images/addbanner_300x250.jpg')}}" width="100%">
                </div>
            </div>
        </div>
    </section>
    <!-- content-section-ends-here -->
</div>

<footer id="footer">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="single_footer_top wow fadeInLeft">
                        <h2>Flicker Images</h2>
                        <ul class="flicker_nav">
                            <li><a href="#"><img src="images/75x75.jpg" alt=""></a></li>
                            <li><a href="#"><img src="images/75x75.jpg" alt=""></a></li>
                            <li><a href="#"><img src="images/75x75.jpg" alt=""></a></li>
                            <li><a href="#"><img src="images/75x75.jpg" alt=""></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="single_footer_top wow fadeInDown">
                        <h2>Tags</h2>
                        <ul class="labels_nav">
                            <li><a href="#">Gallery</a></li>
                            <li><a href="#">Business</a></li>
                            <li><a href="#">Games</a></li>
                            <li><a href="#">Life &amp; Style</a></li>
                        </ul>
                    </div>
                </div>
                <!-- <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="single_footer_top wow fadeInRight">
                        <h2>About Us</h2>
                        <p>Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed nec laoreet orci, eget ullamcorper quam. Phasellus lorem neque, </p>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <div class="footer_bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="footer_bottom_left">
                        <p>Copyright &copy; 2045 <a href="index.html">magExpress</a></p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="footer_bottom_right">
                        <p>Developed BY KINGDOM NVHAI</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="{{asset('news/js/jquery.min.js')}}"></script>
<script src="{{asset('news/js/bootstrap.min.js')}}"></script>
<script src="{{asset('news/js/wow.min.js')}}"></script>
<script src="{{asset('news/js/slick.min.js')}}"></script>
<script src="{{asset('news/js/custom.js')}}"></script>
</body>
</html>