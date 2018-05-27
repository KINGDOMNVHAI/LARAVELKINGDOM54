<header id="header">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="header_top">
                <div class="header_top_left">
                    <ul class="top_nav">
                        <li><a href="index.html">KINGDOM NVHAI</a></li>
                        <li><a href="pages/page.html">About Us</a></li>
                        <li><a href="pages/contact.html">Youtube Channel</a></li>
                        <li><a href="pages/404.html">Kawaii Code</a></li>
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
                <div class="header_bottom_left"><a class="logo" href="index.html"><img src="{{ asset('news/images/logo_name_NVHAI_small_blue.png') }}" width="200px"></a></div>
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
                    <li class="dropdown"> <a href="#" class="" data-toggle="dropdown" role="button" aria-expanded="false">Categories</a>
                        <ul class="dropdown-menu" role="menu">
                            <?php
                            $con = new mysqli("localhost", "root", "", "nvhai");
                            mysqli_set_charset($con,"utf8");
                            $query = "SELECT * FROM category WHERE enable = ENABLE_CATEGORY";

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
                    <li><a href="pages/single.html">Download</a></li>
                    <li><a href="pages/contact.html">Contact</a></li>
                    <li><a href="pages/404.html">404 page</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>
