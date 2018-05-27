<div class="col-lg-4 col-md-4">
    <div class="content_bottom_right">
        <div class="single_bottom_rightbar">
            <img alt="" src="{{asset('news/images/addbanner_300x250.jpg')}}" width="100%">
            <h2>Cập nhật thường xuyên</h2>
            <ul class="small_catg popular_catg wow fadeInDown">
                @foreach($updates as $update)
                <li>
                    <div class="media wow fadeInDown"> <a href="#" class="media-left"><img alt="" src="upload/images/thumbnail/{{ $update->imgDetailPost }}"> </a>
                        <div class="media-body">
                            <h4 class="media-heading"><a href="#">{{ $update->nameDetailPost }}</a></h4>
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
                            <div class="media wow fadeInDown"> <a class="media-left" href="#"><img src="upload/images/thumbnail/{{ $view->imgDetailPost }}"alt=""></a>
                                <div class="media-body">
                                    <h4 class="media-heading"><a href="#">{{ $view->nameDetailPost }}</a></h4>
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
                            <div class="media wow fadeInDown"> <a class="media-left" href="#"><img src="upload/images/thumbnail/{{ $rand->imgDetailPost }}" alt=""></a>
                                <div class="media-body">
                                    <h4 class="media-heading"><a href="#">{{ $rand->nameDetailPost }}</a></h4>
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
                <form action="#" method="post">
                    <select name="search">
                        @foreach($menuCategories as $menuCategory)
                        <option value="">{{ $menuCategory->nameCat }}</option>
                        @endforeach
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