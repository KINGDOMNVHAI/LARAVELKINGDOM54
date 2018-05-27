jQuery(document).ready(function($){


    $('.multiple-items').slick({
        dots: false,
        arrows: false,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1
    });
    
$('.responsive').slick({
    dots: false,
            arrows: false,
    infinite: true,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 4,
    responsive: [
    {
        breakpoint: 1024,
        settings: 
        {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: true
        }
    },
    {
        breakpoint: 600,
        settings: 
        {
            slidesToShow: 2,
            slidesToScroll: 2
        }
    },
    {
        breakpoint: 480,
        settings: 
        {
            slidesToShow: 1,
            slidesToScroll: 1
        }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]

});

$('.single-item').slick({
    dots: false,
    arrows: false,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1
});





    //input date
    if($('.input-date').length){
        var pkcont = 'body';
        if($('.picker-container').length){
            pkcont = '.picker-container';
        }
        $('.input-date').datepicker({
            todayHighlight: true,
            startDate: "0d",
            container: pkcont
        });
    }
    
    //Show/Hide scroll-top on Scroll
    // hide #back-top first
	$("#scroll-top").hide();
    // fade in #back-top
    $(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('#scroll-top').fadeIn();
            } else {
                $('#scroll-top').fadeOut();
            }
        });
        // scroll body to 0px on click
        $('#scroll-top').click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 1000);
        });
    });
    $('.navbar-toggle').on('click',function(e){
        $(this).toggleClass('open');
        $('body').toggleClass('menuin');
    });
    $('.nav-overlay').on('click',this,function(e){
        $('.navbar-toggle').trigger('click');
    });
   
    $('.collapse').on('click','.collapse-heading',function(){
        var container = $(this).parent('.collapse');
        $(container).siblings().removeClass('on').find('.collapse-body').slideUp();
        $(container).find('.collapse-body').is(':visible')  ?  
        $(container).removeClass('on').find('.collapse-body').slideUp() :
        $(container).addClass('on').find(':hidden').slideDown() ;
        
    });
    $(window).scrollTop() > $("#header").height() ? $("#header").addClass("sticky") : $("#header").removeClass("sticky");
    $(window).scroll(function () {
        $(window).scrollTop() > $("#header").height() ? $("#header").addClass("sticky") : $("#header").removeClass("sticky");
    });

    if($('#slider-team').length){
        $('#slider-team').slick({
            dots: false,
            arrows: true,
            infinite: true,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 1,
            focusOnSelect: true,
            autoplaySpeed: 2000,
            centerMode: true,
            centerPadding: 0,
            prevArrow: '<span class="slick-prev slick-arrow"><i class="fa fa-angle-left"><i></span>',
            nextArrow: '<span class="slick-next slick-arrow"><i class="fa fa-angle-right"><i></span>',
            responsive: [
                    {
                      breakpoint: 769,
                      settings: {
                        slidesToShow: 2,
                      }
                    },
                    {
                      breakpoint: 480,
                      settings: {
                        slidesToShow: 1,
                      }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                  ]
        });
    }
    if ($('#slider-portfolio-home').length){
        $('#slider-portfolio-home').slick({
            dots: false,
            arrows: false,
            infinite: true,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 1,
            focusOnSelect: true,
            autoplaySpeed: 2000,
            centerMode: true,
//            centerPadding: 0,
            responsive: [
                    {
                      breakpoint: 769,
                      settings: {
                        slidesToShow: 2,
                      }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                  ]
        });
        // init filter
        var filterSelector = $('.portfolio-filter-ul').find('.active [data-filter]').data('filter');
        if(filterSelector == 'all'){
            filterSelector = 'slider-item';
        }
       
        $('#slider-portfolio-home').slick('slickFilter', '.'+filterSelector);
        //change filter
        $('.portfolio-filter-ul').on('click', 'a[data-filter]', function(e){
            var $this = $(this);
            var $li = $(this).closest('li');
            $li.addClass('active').siblings().removeClass('active');          
            filterSelector = $this.data('filter') == 'all' ? 'slider-item' : $this.data('filter') ;
            $('#slider-portfolio-home').slick('slickUnfilter');
            $('#slider-portfolio-home').slick('slickFilter', '.'+filterSelector);
        });
    }
    if($('#slider-portfolio').length){
        var opt = {
            dots: false,
            arrows: false,
            infinite: true,
            speed: 300,
            rows: 2,
            slidesPerRow: 4,
            focusOnSelect: true,
//            centerPadding: 0,
            responsive: [
                    {
                      breakpoint: 1025,
                      settings: {
                         slidesPerRow: 3,
                      }
                    },
                    {
                      breakpoint: 769,
                      settings: {
                         slidesPerRow: 2,
                      }
                    },
//                    {
//                      breakpoint: 480,
//                      settings: {
//                         slidesPerRow: 1,
//                      }
//                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                ]
        }
        // init slider
        $('#slider-portfolio').slick(opt);
        // init filter
        var slider = $('#slider-portfolio');
        var allSlides = slider.find('.slick-slide > div > *').clone();
        var trigger = $('button');

        $('.portfolio-filter-ul').on('click', 'a[data-filter]', function(e){
            var $this = $(this);
            var $li = $(this).closest('li');
            $li.addClass('active').siblings().removeClass('active'); 
            filterSelector = $this.data('filter') == 'all' ? 'slider-item' : $this.data('filter') ;
            var filterSlides = allSlides.filter('.'+filterSelector);
            slider.slick('unslick').empty().append(filterSlides).slick(opt);
        });
    }
//    slider-multi-row
    if($('.slider-multi-row').length){
        $('.slider-multi-row').slick({
            dots: false,
            arrows: false,
            infinite: true,
            speed: 300,
            rows: 3,
            slidesPerRow: 2,
            focusOnSelect: true,
//            centerPadding: 0,
            responsive: [
                    {
                      breakpoint: 769,
                      settings: {
                         slidesPerRow: 1,
                      }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                ]
        });
    }
    if($('.slider-news-home').length){
        $('.slider-news-home').slick({
            dots: false,
            arrows: false,
            infinite: true,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 1,
            focusOnSelect: true,
            autoplaySpeed: 2000,
            vertical: true,
            verticalSwiping: true,
//            centerPadding: 0,
            responsive: [
                    {
                      breakpoint: 480,
                      settings: {
                        arrows:false,
                      }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                  ]
        });
    }
    if ($('#slider-top').length){
        $('#slider-top').slick({
            dots: true,
            arrows:true,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            prevArrow: '<span class="slick-prev slick-arrow"><i class="fa fa-angle-left"><i></span>',
            nextArrow: '<span class="slick-next slick-arrow"><i class="fa fa-angle-right"><i></span>',
            customPaging: function(slider, i){
                return '<span class="thumb-holder"><img src="'+$(slider.$slides[i]).data('bgThumb')+'" alt=""></span>';  
            },
            responsive: [
                    {
                      breakpoint: 480,
                      settings: {
                        arrows:false,
                      }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                  ]
        });
    }
         if($('#map-canvas').length){
         google.maps.event.addDomListener(window, 'load', initmap);
         var infowindow = new google.maps.InfoWindow({
            size: new google.maps.Size(150, 50)
        });
    var map;
    var gmarkers = [];
    function createMarker(latlng, title) {
        var marker = new google.maps.Marker({
            position: latlng,
            title: title,
            icon: "data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjMycHgiIGhlaWdodD0iMzJweCIgdmlld0JveD0iMCAwIDQzOC41MzYgNDM4LjUzNiIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNDM4LjUzNiA0MzguNTM2OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+CjxnPgoJPHBhdGggZD0iTTMyMi42MjEsNDIuODI1QzI5NC4wNzMsMTQuMjcyLDI1OS42MTksMCwyMTkuMjY4LDBjLTQwLjM1MywwLTc0LjgwMywxNC4yNzUtMTAzLjM1Myw0Mi44MjUgICBjLTI4LjU0OSwyOC41NDktNDIuODI1LDYzLTQyLjgyNSwxMDMuMzUzYzAsMjAuNzQ5LDMuMTQsMzcuNzgyLDkuNDE5LDUxLjEwNmwxMDQuMjEsMjIwLjk4NiAgIGMyLjg1Niw2LjI3Niw3LjI4MywxMS4yMjUsMTMuMjc4LDE0LjgzOGM1Ljk5NiwzLjYxNywxMi40MTksNS40MjgsMTkuMjczLDUuNDI4YzYuODUyLDAsMTMuMjc4LTEuODExLDE5LjI3My01LjQyOCAgIGM1Ljk5Ni0zLjYxMywxMC41MTMtOC41NjIsMTMuNTU5LTE0LjgzOGwxMDMuOTE4LTIyMC45ODZjNi4yODItMTMuMzI0LDkuNDI0LTMwLjM1OCw5LjQyNC01MS4xMDYgICBDMzY1LjQ0OSwxMDUuODI1LDM1MS4xNzYsNzEuMzc4LDMyMi42MjEsNDIuODI1eiBNMjcwLjk0MiwxOTcuODU1Yy0xNC4yNzMsMTQuMjcyLTMxLjQ5NywyMS40MTEtNTEuNjc0LDIxLjQxMSAgIHMtMzcuNDAxLTcuMTM5LTUxLjY3OC0yMS40MTFjLTE0LjI3NS0xNC4yNzctMjEuNDE0LTMxLjUwMS0yMS40MTQtNTEuNjc4YzAtMjAuMTc1LDcuMTM5LTM3LjQwMiwyMS40MTQtNTEuNjc1ICAgYzE0LjI3Ny0xNC4yNzUsMzEuNTA0LTIxLjQxNCw1MS42NzgtMjEuNDE0YzIwLjE3NywwLDM3LjQwMSw3LjEzOSw1MS42NzQsMjEuNDE0YzE0LjI3NCwxNC4yNzIsMjEuNDEzLDMxLjUsMjEuNDEzLDUxLjY3NSAgIEMyOTIuMzU1LDE2Ni4zNTIsMjg1LjIxNywxODMuNTc1LDI3MC45NDIsMTk3Ljg1NXoiIGZpbGw9IiMwMDUxOTgiLz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K",
        });
        google.maps.event.addListener(marker, 'click', function () {
            infowindow.setContent(title);
            infowindow.open(map, marker);
        });
        gmarkers.push(marker);
        return marker;
    }
    function callinfobox(i) {
        google.maps.event.trigger(gmarkers[i], "click");
    }
    function deleteMarkers() {
        clearMarkers();
        gmarkers = [];
      }
    // Sets the map on all markers in the array.
      function setMapOnAll(map) {
        for (var i = 0; i < gmarkers.length; i++) {
          gmarkers[i].setMap(map);
        }
      }

      // Removes the markers from the map, but keeps them in the array.
      function clearMarkers() {
        setMapOnAll(null);
      }
    function initmap() {
        var myLatlng = new google.maps.LatLng(10.78572,106.66642);
        var mapOptions = {
            // How zoomed in you want the map to start at (always required)
            zoom: 16,
            disableDefaultUI: true,
            scrollwheel: false,
            zoomControl: true,
            draggable: true,
          zoomControlOptions: {
//              position: google.maps.ControlPosition.BOTTOM_LEFT
          },
            // The latitude and longitude to center the map (always required)
            center: myLatlng,
            // How you would like to style the map. 
            // This is where you would paste any style found on Snazzy Maps.
            styles: [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]
        };
    var mapElement = document.getElementById('map-canvas');

    // Create the Google Map using our element and options defined above
    map = new google.maps.Map(mapElement, mapOptions);
        createMarker(myLatlng,'<a href="https://mona-media.com/dich-vu/thiet-ke-website-chuyen-nghiep/" title="Công ty thiế kế website chuyên nghiệp">Thiết kế website</a>&nbsp;<img src="http://mona-media.com/logo.png" style="width:20px;vertical-align:sub" alt="MonaMedia"> <strong>Mona Media</strong>').setMap(map);



    }
    }


});