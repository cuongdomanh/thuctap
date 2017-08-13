/*------------------------------------------------------------------
[Table of contents]

- Project:  ShopOne - Furniture Store HTML Template
- Version:  1.1
- Author:   Andrey Sokoltsov
- Profile:  http://themeforest.net/user/andreysokoltsov
--*/

(function() {
    "use strict";

    var Core = {

        initialized: false,

        initialize: function() {

            if (this.initialized) return;
            this.initialized = true;

            this.build();

        },

        build: function() {
            //Placeholder for IE
            $('input, textarea').placeholder();

            // Page preloader
            this.initPagePreloader();

            //Setup WOW.js
            this.initScrollAnimations();

            // Dropdown menu
            this.dropdownhover();

            // Main Slider
            this.initMainSlider();

            // Accordion
            this.initAccordion();

            // Tooltip
            this.initTooltip();

            // Display filter range
            this.initDisplayFilter();

            // Slider range
            this.initSliderRange();

            // Load more button
            this.loadMore();

            // Selectpicker
            this.selectPicker();

            // bxSlider
            this.initBxSlider();

            // Select product color
            this.selectProductColor();

            // Owl Carousel
            this.initOwlCarousel();

            //Isotope Filter
            this.isotopeFilter();

            //Count Down
            this.initCountDown();

        },

        initPagePreloader: function(options) {
            var $preloader = $('#page-preloader'),
            $spinner = $preloader.find('.spinner-loader');
            $( window ).on('load', function() {
                $spinner.fadeOut();
                $preloader.delay(500).fadeOut('slow');
                window.scrollTo( 0, 0 );
            });
        },

        fixedMenu: function(options) {
            $("#toggle-menu button").on('click', function(e){
                $(this).toggleClass('is-active');
            });
        },

        dropdownhover: function(options) {
            //Extra script for smoother navigation effect **/
            if ($(window).width() > 767) {
                $('.b-header-menu').on('mouseenter', '.list-inline > .dropdown', function() {
                    "use strict";
                    $(this).addClass('open');
                }).on('mouseleave', '.list-inline > .dropdown', function() {
                    "use strict";
                    $(this).removeClass('open');
                });
            }
        },

        initToggleMenu: function () {

            var trigger = $('.toggle-menu-button');
            var closemob = $('.close-menu-mobile');
            var isClosed = true;

            function showMenu() {
                $('#fixedMenu').delay(0).fadeIn(300);
                $('#toggle-nav').addClass('nav-mobile');
                trigger.addClass('is-open');
                isClosed = false;
            }

            function hideMenu() {
                $('#fixedMenu').fadeOut(100);
                $('#toggle-nav').removeClass('nav-mobile');
                trigger.removeClass('is-open');
                isClosed = true;
            }

            trigger.on('click', function (e) {
                e.preventDefault();
                if (isClosed === true) {
                    showMenu();
                } else {
                    hideMenu();
                }
            });

            closemob.on('click', function (e) {
                e.preventDefault();
                if (isClosed === true) {
                    showMenu();
                } else {
                    hideMenu();
                }
                trigger.removeClass('is-open is-active');
            });
        },

        initSearchAnimation: function(options) {
            $(".iconSearch").on('click', function(e){
                e.preventDefault();
                $('#search').toggleClass('open-search');
            });
        },

        initMainSlider: function(options) {
            var $mainSlider = $( '.full-width-slider' );
            if($mainSlider && $mainSlider.length){
                $mainSlider.each(function(i) {
                    var $proSlider = $(this);

                    var widthData = $proSlider.data('width');
                    var heightData = $proSlider.data('height');
                    var fadeData = $proSlider.data('fade');
                    var buttonsData = $proSlider.data('buttons');
                    var arrowsData = $proSlider.data('arrows');
                    var waitForLayersData = $proSlider.data('wait-for-layers');
                    var thumbnailPointerData = $proSlider.data('thumbnail-pointer');
                    var touchSwipeData = $proSlider.data('touch-swipe');
                    var autoplayData = $proSlider.data('autoplay');
                    var autoScaleLayersData = $proSlider.data('auto-scale-layers');
                    var visibleSizeData = $proSlider.data('visible-size');
                    var forceSizeData = $proSlider.data('force-size');
                    var autoplayDelayData = $proSlider.data('autoplay-delay');
                    var proNext = $proSlider.data('next-slide');
                    var proPrev = $proSlider.data('previous-slide');

                    $proSlider.sliderPro({
                        width: widthData,
                        height: heightData,
                        fade: fadeData,
                        buttons: buttonsData,
                        arrows:arrowsData,
                        waitForLayers: waitForLayersData,
                        thumbnailPointer: thumbnailPointerData,
                        touchSwipe: touchSwipeData,
                        autoplay: autoplayData,
                        autoScaleLayers: autoScaleLayersData,
                        visibleSize: visibleSizeData,
                        forceSize: forceSizeData,
                        autoplayDelay: autoplayDelayData
                    });
                    $(proNext).click(function(){
                        $proSlider.sliderPro( 'nextSlide' );
                    });
                    $(proPrev).click(function(){
                        $proSlider.sliderPro('previousSlide');
                    });

                    var slidercounter = $( this ).data( 'sliderPro' );
                    $(this).append('<div class="counter"><span class="active">'+(parseInt(slidercounter.getSelectedSlide(), 10) + 1) +'</span>&ensp; / &ensp;'+slidercounter.getTotalSlides()+'</div>');
                    slidercounter.on( 'gotoSlide', function( event ) {
                        $(this).find('.counter .active').text(event.index + 1);
                    });

                });
            }
        },

        initAccordion: function(options) {
            var accordionBox = $('.enable-accordion');
            if(accordionBox && accordionBox.length){
                accordionBox.each(function(i) {
                    var $accordion = $(this);

                    var heightStyleData = $accordion.data('height-style');
                    var collapsibleData = $accordion.data('collapsible');
                    var activeData = $accordion.data('active');

                    $accordion.accordion({
                        heightStyle: heightStyleData,
                        collapsible: collapsibleData,
                        active: activeData,
                    });
                });
            }
        },

        initTooltip: function(options) {
            $('[data-toggle="tooltip"]').tooltip();
        },

        initSliderRange: function(options) {
            $('#price-min').change(function () {
                var val = $(this).val();
                $('#slider-range').slider("values",0,val);
            });

            $('#price-max').change( function() {
                var val2 = $(this).val();
                $('#slider-range').slider("values",1,val2);
            });

            $( "#slider-range" ).slider({
                range: true,
                min: 0,
                max: 900,
                values: [ 0, 400 ],
                slide: function( event, ui ) {
                    $('#price-min').val("$" + ui.values[0]);
                    $('#price-max').val("$" + ui.values[1]);
                }
            });
            $('#price-min').val("$" + $('#slider-range').slider("values",0));
            $('#price-max').val("$" + $('#slider-range').slider("values",1));
        },

        initDisplayFilter: function(options) {
            $(".btn-display-filter").click(function () {
                $(this).toggleClass('filter-on');
                $('.filter-block').toggleClass("filter-show");
            });
        },

        loadMore: function(options) {
            $(".b-category-more").hide();
            $(".b-best-more").hide();
            $(".b-featured-more").hide();
            $(".btn-more").click(function(){
                $(this).hide();
                $(".b-category-more").fadeIn(550);
                $(".b-best-more").fadeIn(550);
                $(".b-featured-more").fadeIn(550);
            });
        },

        selectPicker: function(options){
            $('.selectpicker').selectpicker({
                style: 'btn-default btn-sm',
                size: 4
            });

            //reset select options
            $('form').on('reset', function() {
                setTimeout(function() {
                    $('.selectpicker').selectpicker('refresh');
                });
            });

        },

        initBxSlider: function(options) {
            var bxSliderBox = $('.enable-bx-slider');
            if(bxSliderBox && bxSliderBox.length){
                bxSliderBox.each(function(i) {
                    var $bx = $(this);

                    var pagerCustomData = $bx.data('pager-custom');
                    var controlsData = $bx.data('controls');
                    var minSlidesData = $bx.data('min-slides');
                    var maxSlidesData = $bx.data('max-slides');
                    var slideWidthData = $bx.data('slide-width');
                    var slideMarginData = $bx.data('slide-margin');
                    var pagerData = $bx.data('pager');
                    var modeData = $bx.data('mode');
                    var infiniteLoopData = $bx.data('infinite-loop');

                    $bx.bxSlider({
                        pagerCustom: pagerCustomData,
                        controls: controlsData,
                        minSlides: minSlidesData,
                        maxSlides: maxSlidesData,
                        slideWidth: slideWidthData,
                        slideMargin: slideMarginData,
                        pager: pagerData,
                        mode: modeData,
                        infiniteLoop: infiniteLoopData,
                        prevText: (modeData == 'vertical' ? '<span class="fa fa-angle-up"></span>' : '<span class="fa fa-angle-left"></span>'),
                        nextText: (modeData == 'vertical' ? '<span class="fa fa-angle-down"></span>' : '<span class="fa fa-angle-right"></span>'),
                    });
                });
            }
        },

        initOwlCarousel: function(options) {
            var owlCarouselBox = $('.enable-owl-carousel');
            if(owlCarouselBox && owlCarouselBox.length){
                owlCarouselBox.each(function(i) {
                    var $owl = $(this);

                    var loopData = $owl.data('loop');
                    var autoWidthData = $owl.data('auto-width');
                    var dotsData = $owl.data('dots');
                    var navData = $owl.data('nav');
                    var marginData = $owl.data('margin');
                    var responsiveClassData = $owl.data('responsive-class');
                    var responsiveData = $owl.data('responsive');
                    var sliderNext = $owl.data('slider-next');
                    var sliderPrev = $owl.data('slider-prev');

                    $owl.owlCarousel({
                        loop: loopData,
                        autoWidth: autoWidthData,
                        dots: dotsData,
                        nav: navData,
                        margin: marginData,
                        responsiveClass: responsiveClassData,
                        responsive: responsiveData,
                    });
                    $(sliderNext).click(function(){
                        $owl.trigger('next.owl.carousel');
                    });
                    $(sliderPrev).click(function(){
                        $owl.trigger('prev.owl.carousel');
                    });
                });
            }
        },

        selectProductColor: function(options) {
            $(".color-picker a").on('click', function(e){
                e.preventDefault();
                $(this).parent('li').toggleClass('color-selected');
            });
        },

        isotopeFilter: function(options) {
            // init Isotope
            var $series = $('.b-home-series').isotope();
            var $best = $('.b-home-best').isotope();

            // filter series items on button click
            $('.items-series').on( 'click', 'li', function() {
                var filterValue = $(this).attr('data-filter');
                $series.isotope({ filter: filterValue });
            });

            // change is-checked class on buttons
            $('.items-series').each( function( i, buttonGroup ) {
                var $buttonGroup = $( buttonGroup );
                $buttonGroup.on( 'click', 'li', function() {
                    $buttonGroup.find('.active-filt').removeClass('active-filt');
                    $( this ).addClass('active-filt');
                });
            });

            // filter bestsellers items on button click
            $('.items-best').on( 'click', 'li', function() {
                var filterValue = $(this).attr('data-filter');
                $best.isotope({ filter: filterValue });
            });

            // change is-checked class on buttons
            $('.items-best').each( function( i, buttonGroup ) {
                var $buttonGroup = $( buttonGroup );
                $buttonGroup.on( 'click', 'li', function() {
                    $buttonGroup.find('.active-filt').removeClass('active-filt');
                    $( this ).addClass('active-filt');
                });
            });

        },

        initCountDown: function(options) {
            var $countdown = $( '.countdown' );
            if($countdown && $countdown.length){
                $countdown.each(function(i) {
                    var $countdownItem = $(this);

                    var endDateData = $countdownItem.data('end-date');
                    var themeData = $countdownItem.data('theme');
                    var titleDaysData = $countdownItem.data('title-days');
                    var titleHoursData = $countdownItem.data('title-hours');
                    var titleMinutesData = $countdownItem.data('title-minutes');
                    var titleSecondsData = $countdownItem.data('title-seconds');

                    $countdownItem.dsCountDown({
                        endDate: new Date(endDateData),
                        theme: themeData,
                        titleDays: titleDaysData,
                        titleHours: titleHoursData,
                        titleMinutes: titleMinutesData,
                        titleSeconds: titleSecondsData
                    });
                });
            }
        },

        initScrollAnimations: function(options) {
            var scrollingAnimations = true; // Set false to turn off animations
            if(scrollingAnimations){
                new WOW().init();
            }
        }

    };

    Core.initialize();

})();