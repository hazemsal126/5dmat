$(document).ready(function(){
    var owl = $('#home_slider');

        owl.on('initialized.owl.carousel change.owl.carousel',function(elem){
            var current = elem.item.index;
            $(elem.target).find(".owl-item").eq(current).find(".to-animate").removeClass('fadeInUp animated');
        });
       
        owl.on('initialized.owl.carousel changed.owl.carousel',function(elem){
            window.setTimeout(function(){
                var current = elem.item.index;
                $(elem.target).find(".owl-item").eq(current).find(".to-animate").addClass('fadeInUp animated');
            }, 400);
        });
        owl.owlCarousel({
                items: 1,
                loop: true,
                margin: 0,
                responsiveClass: true,
                nav: true,
                dots: true,
                rtl:true,
                smartSpeed: 500,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                animateOut: 'fadeOut',
                animateIn: 'fadeIn',
                navText:['<i class="fal fa-long-arrow-right"></i>',
                '<i class="fal fa-long-arrow-left"></i>'],
        });


    var owl2 = $('#banner_slide');

        owl2.owlCarousel({
                items: 1,
                loop: true,
                margin: 0,
                responsiveClass: true,
                nav: true,
                dots: true,
                rtl:true,
                smartSpeed: 500,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                animateOut: 'fadeOut',
                animateIn: 'fadeIn',
                navText:['<i class="fal fa-long-arrow-right"></i>',
                '<i class="fal fa-long-arrow-left"></i>'],
        });
            

	/*open menu*/
    $(".hamburger").click(function(){
        $("body,html").addClass('menu-toggle');
        $(".hamburger").addClass('active');
    });
    $(".m-overlay").click(function(){
        $("body,html").removeClass('menu-toggle');
        $(".hamburger").removeClass('active');
    });


    $('a[href="#search"]').on('click', function(event) {
    event.preventDefault();
        $('#search').addClass('open');
        $('#main-wrapper').addClass('wrapper-blur');
        setTimeout(function(){
            $('#search form > input[type="text"]').focus();
        },100);
    });

    $('#search, #search .overlay-close').on('click keyup', function(event) {
        if (event.target == this || event.target.className == 'overlay-close' || event.keyCode == 27) {
            $(this).removeClass('open');
            $('#main-wrapper').removeClass('wrapper-blur');
        }
    });

    $(".toggle_filter").click(function(){
        $(this).closest('div.filter_group').find('.fig_body').slideToggle()
    });




     $('#list').click(function(event){
        event.preventDefault();
        $('#filter_items').removeClass('view_grid');
        $('#filter_items').addClass('view_list');
        $(this).addClass('active');
        $('#grid').removeClass('active');
    });
     $('#grid').click(function(event){
        event.preventDefault();
        $('#filter_items').removeClass('view_list');
        $('#filter_items').addClass('view_grid');
        $(this).addClass('active');
        $('#list').removeClass('active');
    });


    //  $('.product-gallery-slider').slick({
    //   slidesToShow: 1,
    //   slidesToScroll: 1,
    //   rtl:false,
    //   arrows: false,
    //   fade: true,
    //   asNavFor: '.produvt-gallery-thumbs'
    // });
    // $('.produvt-gallery-thumbs').slick({
    //   slidesToShow: 5,
    //   slidesToScroll: 1,
    //   asNavFor: '.product-gallery-slider',
    //   dots: false,
    //   rtl:false,
    //   centerMode: false,
    //   focusOnSelect: true,
    //   arrows: false,
    //   vertical:true
    // });

})


