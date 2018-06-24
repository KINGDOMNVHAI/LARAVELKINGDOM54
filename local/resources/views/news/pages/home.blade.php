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
    </div><!-- List Categories and Posts -->

@endsection