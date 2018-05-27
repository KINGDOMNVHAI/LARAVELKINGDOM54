@include ('newstheme.header')

<body>

@include ('newstheme.navbar')

<div class="main-body">
    <div class="wrap">
        <ol class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li class="active">About</li>
        </ol>
        <div class="about-page">
            <div class="col-md-8 content-left">
                <div class="about">
                    <h2 class="head">KINGDOM NVHAI</h2>

                    <h5>Xin chào mọi người!</h5>
                    <p>Tôi tên là Nguyễn Việt Hải, sinh năm 1993 tại thành phố Hồ Chí Minh. Tôi học ngành Công nghệ thông tin về lập trình. Với mong muốn được tạo ra những sản phẩm lập trình có thể phổ biến rộng rãi, cùng với ước mơ xa hơn là có một trung tâm tin học, tôi đã lập ra trang web KINGDOM NVHAI để giới thiệu cũng như trao đổi, chia sẻ kinh nghiệm với mọi người.</p>
                    <p>Trước đây, tôi đã phát hiện mình có khả năng viết lách khi làm Cộng Tác Viên MU Việt Nam. Bút danh của tôi khi đó là THIÊN NỮ NVHAI. Từ đó, tôi đã quyết định mình phải có một trang web tin tức, blog, Youtube để làm lãnh địa riêng, sự nghiệp riêng của mình. Đây cũng là nơi khởi đầu cho một trung tâm tin học sẽ được mở trong tương lai, đào tạo them nhiều nhân tài lập trình viên cho đất nước.</p>

                    <center><img src="{{asset("upload/images/aboutus/about-kingdom-nvhai.jpg")}}" alt="About KINGDOM NVHAI" width="80%"/></center>

                    <h5>Kỹ năng cá nhân</h5>
                    <p>
                        Bắt đầu từ lập trình web </br>
                        Ngôn ngữ chính: HTML, CSS, PHP </br>
                        Frameword: Wordpress, Laravel </br>
                        TOEIC 550</br>
                        Nơi sinh và làm việc tại TPHCM</br>
                    </p>

                    <h5>Hệ thống website KINGDOM NVHAI</h5>
                    <p><b>News.kingdomnvhai.info</b>: Trang tin tức về 4 chủ đề: Mạng xã hội, Game, Anime - Manga, Thủ thuật IT.</p>
                    <p><b>Datealive.kingdomnvhai.info</b>: Trang web về Light Novel Date a live.</p>
                    <p><b>Kênh Youtube KINGDOM NVHAI</b>: Kênh Youtube chứa video về 4 chủ đề: Mạng xã hội, Game, Anime - Manga, Thủ thuật IT.</p>
                    <p><b>Fanpage NVHAI</b>: Fanpage Facebook.</p>

                    <h5>Cam kết của trang web</h5>
                    <p>_ Không đăng các hình ảnh, tin tức dung tục, mang tính câu khách, lời lẽ phản động, kích động.</br>
                        _ Không đăng tin chuyện đời tư, hủ tục mê tín dị đoan, tin tức nhảm nhí, video khiêu dâm, quá bạo lực.</br>
                        _ Không đăng tin liên quan đến chính trị, tôn giáo, nhà nước, thế giới, tránh gây hiểu lầm, xung đột.</br>
                        _ Mọi link download của trang web đều do trang web tự tạo hoặc link có sẵn đã download thử, tránh trường hợp virut, trojan, mã độc… xâm nhập máy vi tính. Nếu link của trang web có vấn đề, xin vui lòng liên hệ qua email.</br>
                        _ Có thể lấy thông tin, ý văn của các bài viết khác nhưng không sao chép.</br>
                        _ Có thể dịch bài viết nước ngoài.</br>
                        _ Các hình ảnh nhạy cảm sẽ giới hạn ở một mức độ nhất định như: áo tắm, đồ bơi, censored… nhưng sẽ không có những hình ảnh khiêu dâm.</br>
                        _ Hình ảnh quảng cáo không chứa nội dung khiêu dâm, phản động. Các tổ chức, cá nhân thuê quảng cáo đều được nêu rõ tên.</br>
                        _ Những bài viết bình luận, review có thể có ý kiến cá nhân, nhưng tuyệt đối không chứa hàm ý chống chính quyền, đả kích, khiêu khích.</br>
                    </p>
                    <h5>Nghiêm cấm</h5>
                    <p>
                        _ Những lời bình luận dung tục, ngôn từ vô văn hóa, liên quan đến chính trị, tôn giáo, nhà nước, thế giới, gây xung đột.</br>
                        _ Những hình ảnh phản cảm, thô tục.</br>
                        _ Những tin quảng cáo chưa được web cho phép, tin rác, spam…</br>
                    </p>

                    <div class="signature-post">NVHAI</div>

                    <!-- <div class="more-address">
                        <address>
                            <strong>Express News</strong><br>
                            795 Folsom Ave, Suite 600<br>
                            San Francisco, CA 94107<br>
                            <abbr title="Phone">P :</abbr> (123) 456-7890
                        </address>
                        <address>
                            <strong>Email</strong><br>
                            <a href="mailto:info@example.com">mail@example.com</a>
                        </address>
                    </div> -->

                </div>
            </div>

            @include ('newstheme.sidebar')

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- content-section-ends-here -->
<!-- footer-section-starts-here -->

@include ('newstheme.footer')
