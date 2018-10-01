@extends('news.master')

@section('NoiDung')

<div class="col-lg-8 col-md-8">
    <div class="content_bottom_left">
        <div class="single_category wow fadeInDown">
            <div class="archive_style_1">
                <h2> <span class="bold_line"><span></span></span> <span class="solid_line"></span> <span class="title_text">{{ $posts[0]->nameCat }}</span> </h2>
                @foreach($posts as $post)
                    <div class="business_category_left wow fadeInDown" style="min-height:500px">
                        <ul class="fashion_catgnav">
                            <li>
                                <div class="catgimg2_container">
                                    <a href="{{ route('post-content', $post->url_post ) }}">
                                        <img alt="{{ $post->name_post }}" src="{{ url('/') }}/local/public/upload/images/thumbnail/{{ $post->img_post }}">
                                    </a>
                                </div>
                                <h2 class="catg_titile" style="width:100%">
                                    <a href="{{ route('post-content', $post->url_post ) }}">{{ $post->name_post }}</a>
                                </h2>
                                <div class="comments_box"> <span class="meta_date">{{ $post->date_post }}</span></div>
                                <p>{{ $post->present_post }}</p>
                            </li>
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="pagination_area">
            <nav> {!! $posts->links() !!} </nav>
        </div>
    </div>
</div>

@endsection
