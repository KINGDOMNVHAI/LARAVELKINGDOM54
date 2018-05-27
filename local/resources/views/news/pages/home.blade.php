@extends('news.master')

@section('NoiDung')

    <div class="col-lg-8 col-md-8">

        <?php
        $soluong = count($categories);
        // Show Category
        for ($i=0; $i<$soluong; $i++){
        ?>

        <div class="col-lg-6 col-md-6">
            <div class="single_category">
                <h2> <span class="bold_line"><span></span></span> <span class="solid_line"></span> <a class="title_text" href="#">{{ $categories[$i]->nameCat }}</a></h2>
                <ul class="small_catg wow fadeInDown">
                    <?php
                    // Show Posts in Category
                    for ($j=0; $j<HOME_POSTS; $j++){
                    ?>
                    <li>
                        <div class="media"> <a class="media-left" href="#"><img src="upload/images/thumbnail/{{ $posts[$i][$j]->img_post }}" alt=""></a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="{{ route('post-content', $posts[$i][$j]->url_post ) }}">{{ $posts[$i][$j]->name_post }}</a></h4>
                                <div class="comments_box"> <span class="meta_date">{{ $posts[$i][$j]->date_post }}</span></div>
                            </div>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <?php } ?>

        <div class="col-lg-6 col-md-6">
            <div class="single_category">
                <h2> <span class="bold_line"><span></span></span> <span class="solid_line"></span> <a class="title_text" href="#"></a> </h2>
                <ul class="fashion_catgnav wow fadeInDown">
                    <li>
                        <div class="catgimg2_container"> <a href="pages/single.html"><img alt="" src="images/390x240x1.jpg"></a> </div>
                        <h2 class="catg_titile"><a href="#">Aenean mollis metus sit amet ligula adipiscing</a></h2>
                        <div class="comments_box"> <span class="meta_date">14/12/2045</span> <span class="meta_comment"><a href="#">No Comments</a></span> <span class="meta_more"><a  href="#">Read More...</a></span> </div>
                        <p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla...</p>
                    </li>
                </ul>
                <ul class="small_catg wow fadeInDown">
                    <li>
                        <div class="media"> <a class="media-left" href="#"><img src="images/112x112.jpg" alt=""></a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#"></a></h4>
                                <div class="comments_box"> <span class="meta_date">14/12/2045</span> <span class="meta_comment"><a href="#">No Comments</a></span> </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="media"> <a class="media-left" href="#"><img src="images/112x112.jpg" alt=""></a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#"></a></h4>
                                <div class="comments_box"> <span class="meta_date">14/12/2045</span> <span class="meta_comment"><a href="#">No Comments</a></span> </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="media"> <a class="media-left" href="#"><img src="images/112x112.jpg" alt=""></a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#"></a></h4>
                                <div class="comments_box"> <span class="meta_date">14/12/2045</span> <span class="meta_comment"><a href="#">No Comments</a></span> </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div><!-- List Categories and Posts -->

@endsection