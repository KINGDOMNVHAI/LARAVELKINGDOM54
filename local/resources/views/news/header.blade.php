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
