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
                                    <a href="{{ route('post-content', $post->urlDetailPost ) }}">
                                        <img alt="{{ $post->nameDetailPost }}" src="{{ url('/') }}/upload/images/thumbnail/{{ $post->imgDetailPost }}">
                                    </a>
                                </div>
                                <h2 class="catg_titile" style="width:100%">
                                    <a href="{{ route('post-content', $post->urlDetailPost ) }}">{{ $post->nameDetailPost }}</a>
                                </h2>
                                <div class="comments_box"> <span class="meta_date">{{ $post->dateDetailPost }}</span> <span class="meta_comment"><a href="#">No Comments</a></span> <span class="meta_more"><a  href="#">Read More...</a></span> </div>
                                <p>{{ $post->presentDetailPost }}</p>
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