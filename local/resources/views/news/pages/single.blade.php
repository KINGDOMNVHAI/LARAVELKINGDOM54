@extends('news.master')

@section('NoiDung')

<div class="col-md-8 content-left single-post">
    <div class="single_page_area">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ route('category-page', $content->urlCat ) }}">{{ $content->nameCat }}</a></li>
            <li class="active">{{ str_limit($content->nameDetailPost, 80)  }}</li>
        </ol>
        <h2 class="post_titile">{{ $content->nameDetailPost }}</h2>
        <div class="last-article">

            {!! $content->contentDetailPost !!}
            <p class="signature">{!! $content->author !!}</p>

            <div class="clearfix"></div>
            <!--related-posts-->
            <div class="row related-posts">
                <h4>Đề xuất</h4>

                @foreach($involves as $involve)
                    <div class="col-xs-6 col-md-3 related-grids">
                        <a href="{{url('/post/'. $involve->urlDetailPost)}}" class="thumbnail">
                            <img src="{{asset("local/public/upload/images/thumbnail/$involve->imgDetailPost")}}" alt="{{ $involve->nameDetailPost }}" />
                        </a>
                        <h5><a href="{{url('/post/'. $involve->urlDetailPost)}}">{{ $involve->nameDetailPost }}</a></h5>
                    </div>
                @endforeach

            </div>
            <!--//related-posts-->

            <div class="clearfix"></div>
        </div>
    </div>
</div>

@endsection