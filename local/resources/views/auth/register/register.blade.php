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
        <img src="auth/images/chara_l_48.png" width="960" height="962"  alt="" id="lefting"/>
        <img src="auth/images/chara_r_54.png" width="960" height="962"  alt="" id="righting"/>
        <div id="content" class="container">
            <div class="box-top-blue col-md-offset-3 col-md-6 login-present">
                <div class="login-register-form col-md-offset-3 col-md-6">
                    <p class="header-msg">Register</p>
                    <form action="{{ route('register') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                        <h3>Request</h3>

                        <input type="text" class="login-register-input" name="firstname" placeholder="First name"><br>
                        <input type="text" class="login-register-input" name="lastname" placeholder="Last name"><br>
                        <input type="text" class="login-register-input" name="username" placeholder="Username"><br>
                        <input type="password" class="login-register-input" name="password" placeholder="Password"><br>
                        <input type="text" class="login-register-input" name="email" placeholder="Email"><br>

                        <h3>Other</h3>

                        <input type="text" class="login-register-input" name="city" placeholder="City"><br>
                        <input type="text" class="login-register-input" name="address" placeholder="Address"><br>
                        <input type="text" class="login-register-input" name="company" placeholder="Company"><br>
                        <input type="text" class="login-register-input" name="facebook" placeholder="Facebook"><br>
                        <input type="text" class="login-register-input" name="twitter" placeholder="Twitter"><br>

                        <center><a href="{{ route('kd-login') }}">Đã có tài khoản</a>  |  <a href="{{ route('forgot-password') }}">Quên mật khẩu?</a></center><br>

                        <input type="submit" class="submit-signup" value="Register">

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
    <a href="https://www.facebook.com/NVHAI-306458502862792/"><img src="assets/login/images/facebook-icon.png" width="50px"></a>
    <a href="https://www.youtube.com/channel/UCxUL0zS-XiU36bkUsr5dWbg"><img src="assets/login/images/youtube-icon.png" width="50px"></a>
</div>

</body>
</html>
