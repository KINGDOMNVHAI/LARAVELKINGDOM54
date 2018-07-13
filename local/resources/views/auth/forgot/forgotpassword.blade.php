@include('auth/header')

<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.9";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<div id="page">
    <header id="masthead" class="site-header default container">
        <div class="header-container row">
            <div class="header-container_inner">
                <div class="site-branding col-md-2">
                    <h1 class="site-logo">
                        <a href="http://news.kingdomnvhai.info"><img src="auth/images/logo_name_NVHAI_small_blue.png" width="90%" alt=""/></a>
                    </h1>
                </div>

                <div class="nav-responsive dropdown">
                    <a href="#" class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a>
                    <div class="res-menu-wrap">
                        <div class="res-menu">
                            <a href="#home">Giới thiệu</a>
                            <a href="#news">Tin tức</a>
                            <a href="#news" class="res-sub-menu">Mạng xã hội</a>
                            <a href="#" class="res-sub-menu">Game</a>
                            <a href="#" class="res-sub-menu">Anime - Manga</a>
                            <a href="#" class="res-sub-menu">Thủ thuật IT</a>
                            <a href="#contact">Dịch vụ</a>
                            <a href="#about">Download</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </header>

    <div class="login-form row">

        <img src="auth/images/chara_r_19.png" width="960" height="962"  alt="" id="lefting"/>
        <img src="auth/images/chara_r_33.png" width="960" height="962"  alt="" id="righting"/>

        <div id="content" class="container">
            <div class="box-top-blue col-md-offset-3 col-md-6 login-present">
                <div class="login-register-form col-md-offset-3 col-md-6">
                    <p class="header-msg">Forgot Password</p>
                    <form action="{{ route('forgot-password-sendcode') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                        <p>Nhập tên tài khoản và email của bạn. Hệ thống sẽ gửi mật khẩu mới nếu tên tài khoản khớp với email</p>

                        <input type="text" class="login-register-input" name="username" placeholder="Tên tài khoản"><br>
                        <input type="text" class="login-register-input" name="email" placeholder="Email"><br>

                        <input type="submit" class="submit-signup" value="Gửi mật khẩu">

                        @if (session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- ===================== JAVASCRIPT ===================== -->

<script src="js/bootstrap.js"></script>
<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/function.js"></script>
<script src="slick/slick.min.js"></script>
<script src="js/master.js"></script>

<style>
    #callnowbutton {
        display:block;
        position:fixed;
        width:80px;
        height:200px;
        right:0; bottom:50%;
        text-decoration:none;
    }

</style>

<div id="callnowbutton">
    <a href="https://www.facebook.com/NVHAI-306458502862792/"><img src="{{ asset('auth/images/facebook-icon.png') }}" width="50px"></a>
    <a href="https://www.youtube.com/channel/UCxUL0zS-XiU36bkUsr5dWbg"><img src="{{ asset('auth/images/youtube-icon.png') }}" width="50px"></a>
</div>


</body>
</html>
