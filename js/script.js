jQuery(document).ready(function ($) {

  /*select*/
  $('select').niceSelect();

  /*open search*/
  $(document).on('click', 'header .btn-search a', function (e){
    e.preventDefault()
    $('.search-line').slideDown();
  });

  /*close search*/
  $(document).on('click', '.close-search-line', function (e){
    e.preventDefault()
    $('.search-line').slideUp();
  });

  if(window.innerWidth > 1199){
    /*open cabinet*/
    $(document).on('click', '.logo-line .is-login', function (e){
      e.preventDefault()
      $('.user-line').slideDown();
    });

    /*close cabinet*/
    $(document).on('click', '.close-user-line', function (e){
      e.preventDefault()
      $('.user-line').slideUp();
    });

    /*open favorite product*/
    $(document).on('click', 'header .btn-like', function (e){
      e.preventDefault()
      $('.like-line').slideDown();
    });

    /*close favorite product*/
    $(document).on('click', '.close-like', function (e){
      e.preventDefault()
      $('.like-line').slideUp();
    });
  }





  /*slider*/
  var swiperBanner = new Swiper(".banner-slider", {});

  var swiperProduct = new Swiper(".product-slider", {
    slidesPerView: 4,
    spaceBetween: 20,
    loop:true,
    navigation: {
      nextEl: ".product-next",
      prevEl: ".product-prev",
    },
    breakpoints: {
      320: {
        slidesPerView: 1.275,
        spaceBetween: 20,
      },
      576: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      991: {
        slidesPerView: 3,
        spaceBetween: 20,
      },
      1280: {
        slidesPerView: 4,
        spaceBetween: 20,
      },
    },
  });

  var swiperProgress = new Swiper(".slider-progress", {
    slidesPerView: "auto",
    spaceBetween: 25,
    pagination: {
      el: ".progress-pagination",
      type: "progressbar",
    },
    breakpoints: {
      320: {
        loop:true,
        spaceBetween: 20,
      },
      576: {
        loop:false,
        spaceBetween: 25,
      },
    }
  });

  var swiperNews = new Swiper(".slider-news", {
    slidesPerView: "auto",
    spaceBetween: 21,
  });

  /*like*/
  $(document).on('click', '.like-wrap a', function (e){
    e.preventDefault()
    $(this).closest('.like-wrap').toggleClass('is-like');
    $(this).children('i').toggleClass('far fas')
  });

  /*accordion*/
  $(function() {
    $(".accordion > .accordion-item.is-active").children(".accordion-panel").slideDown();
    $(document).on('click', '.accordion > .accordion-item .accordion-thumb', function (e){
      let item = $(this).closest('.accordion-item').index() + 1;
      $(this).parent('.accordion-item').siblings(".accordion-item").removeClass("is-active").children(".accordion-panel").slideUp();
      $(this).parent('.accordion-item').toggleClass("is-active").children(".accordion-panel").slideToggle("ease-out");


      $('.showrooms figure img').hide();
      $('.showrooms figure .img-'+item).show();
    });

  });

  /* mob-menu*/
  $(document).on('click', '.open-menu a', function (e){
    e.preventDefault();

    $.fancybox.open( $('#menu-responsive'), {
      touch:false,
      autoFocus:false,
    });
    setTimeout(function() {
      $('body').addClass('is-active');
      $('html').addClass('is-menu');
      $('header').addClass('is-active');
    }, 100);

  });

  $(document).on('click', '.open-menu-mob a', function (e){
    e.preventDefault();
    $('body').removeClass('is-active');
    $.fancybox.close();
    $('header').removeClass('is-active');
    $('html').removeClass('is-menu');
  });


  /*open sub-menu*/
  $(document).on('click', '.menu-responsive .mob-menu > ul > li span', function (e){
    e.preventDefault();
    $(this).parent('li').toggleClass('is-open');
    if($(this).parent('li').hasClass('is-open')){
      $(this).siblings('.sub-menu').slideDown();
    }else{
      $(this).siblings('.sub-menu').slideUp();
    }
  });


  /*show/hide footer menu*/

  if(window.innerWidth < 576){
    $(document).on('click', 'footer .menu ul li h6', function (e) {
      e.preventDefault();

      $(this).closest('ul').toggleClass('is-open');

      if($(this).closest('ul').hasClass('is-open')){
        $(this).closest('ul').find('li').slideDown();
      }else{
        $(this).closest('ul').find('li').slideUp();
      }
    })
  }

  /*mob search open*/
  $(document).on('click', '.menu-responsive .item-1 .btn-search a', function (e) {
    $('body').removeClass('is-active');
    $.fancybox.close();
    $('header').removeClass('is-active');
    $('html').removeClass('is-menu');

    setTimeout(function() {
      $('.search-line').slideDown();
    }, 500);

  });


  //TABS
  (function($){
    jQuery.fn.lightTabs = function(options){

      var createTabs = function(){
        tabs = this;
        i = 0;

        showPage = function(i){
          $(tabs).find(".tab-content").children("div").hide();
          $(tabs).find(".tab-content").children("div").eq(i).show();
          $(tabs).find(".tabs-menu").children("li").removeClass("is-active");
          $(tabs).find(".tabs-menu").children("li").eq(i).addClass("is-active");
        }

        showPage(0);

        $(tabs).find(".tabs-menu").children("li").each(function(index, element){
          $(element).attr("data-page", i);
          i++;
        });

        $(tabs).find(".tabs-menu").children("li").click(function(){
          showPage(parseInt($(this).attr("data-page")));
        });
      };
      return this.each(createTabs);
    };
  })(jQuery);
  $(".tabs").lightTabs();

  //RANGE

  var $range = $(".js-range-slider"),
    $from = $(".js-from"),
    $to = $(".js-to"),
    range,
    min = 0.05,
    max = 11,
    from,
    to;

  var updateValues = function () {
    $from.prop("value", from);
    $to.prop("value", to);
  };

  $range.ionRangeSlider({
    type: "double",
    min: min,
    max: max,
    step:0.05,
    skin: "round",
    hide_min_max: true,
    hide_from_to: true,
    prettify_enabled: false,
    onChange: function (data) {
      from = data.from;
      to = data.to;
      updateValues();

    }
  });

  range = $range.data("ionRangeSlider");

  var updateRange = function () {
    range.update({
      from: from,
      to: to
    });

  };

  $from.on("change", function () {

    from = +$(this).prop("value");
    if (from < min) {
      from = min;
    }
    if (from > to) {
      from = to;
    }

    updateValues();
    updateRange();
  });

  $to.on("change", function () {
    to = +$(this).prop("value");
    if (to > max) {
      to = max;
    }
    if (to < from) {
      to = from;
    }

    updateValues();
    updateRange();
  });



  //RANGE 2

  var $range2 = $(".js-range-slider-2"),
    $from2 = $(".js-from-2"),
    $to2 = $(".js-to-2"),
    range2,
    min2 = 300,
    max2 = 2430000,
    from2,
    to2;

  var updateValues2 = function () {
    $from2.prop("value", from2);
    $to2.prop("value", to2);
  };

  $range2.ionRangeSlider({
    type: "double",
    min: min2,
    skin: "round",
    max: max2,
    step:100,
    hide_min_max: true,
    hide_from_to: true,
    prettify_enabled: false,
    onChange: function (data) {
      from2 = data.from;
      to2 = data.to;
      updateValues2();

    }
  });

  range2 = $range2.data("ionRangeSlider");

  var updateRange2 = function () {
    range2.update({
      from: from2,
      to: to2
    });

  };

  $from2.on("change", function () {

    from2 = +$(this).prop("value");
    if (from2 < min2) {
      from2 = min2;
    }
    if (from2 > to2) {
      from2 = to2;
    }

    updateValues2();
    updateRange2();
  });

  $to2.on("change", function () {
    to2 = +$(this).prop("value");
    if (to2 > max2) {
      to2 = max2;
    }
    if (to2 < from2) {
      to2 = from2;
    }

    updateValues2();
    updateRange2();
  });


  //RANGE 3

  let $range3 = $('.js-range-slider-3')
  $range3.ionRangeSlider({
    type: "double",
    min: 1,
    skin: "round",
    max:4,
    step:1,
    hide_min_max: true,
    hide_from_to: true,
    prettify_enabled: false,
    grid: false,
    min_interval:1,

  });

  $range3.on("change", function () {
    var $inp = $(this);
    var from = $inp.prop("value"); // reading input value
    console.log(from); // FROM value
  });

  $range3.on("change", function () {
    var $inp = $(this);
    var from = $inp.prop("value"); // reading input value
    let firstSelect = from.slice(0, 1);
    let lastSelect = from.slice(2);
    if(firstSelect == 2 && lastSelect == 4){
      $('.label-4>div').removeClass().addClass('hide-1')
    }else if(firstSelect == 3 && lastSelect == 4){
      $('.label-4>div').removeClass().addClass('hide-2')
    } else if(firstSelect == 1 && lastSelect == 3){
      $('.label-4>div').removeClass().addClass('hide-3')
    }else if(firstSelect == 1 && lastSelect == 2){
      $('.label-4>div').removeClass().addClass('hide-4')
    }else if(firstSelect == 2 && lastSelect == 3){
      $('.label-4>div').removeClass().addClass('hide-5')
    }else if(firstSelect == 1 && lastSelect == 4){
      $('.label-4>div').removeClass()
    }

  });

  //RANGE 4


  let $range4 = $('.js-range-slider-4')
  $range4.ionRangeSlider({
    type: "double",
    min: 1,
    skin: "round",
    max: 4,
    step:1,
    hide_min_max: true,
    hide_from_to: true,
    prettify_enabled: false,
    grid: false,
    min_interval:1,

  });

  $range4.on("change", function () {
    var $inp = $(this);
    var from = $inp.prop("value"); // reading input value
    console.log(from); // FROM value
  });

  $range4.on("change", function () {
    var $inp = $(this);
    var from = $inp.prop("value"); // reading input value
    let firstSelect = from.slice(0, 1);
    let lastSelect = from.slice(2);
    if(firstSelect == 2 && lastSelect == 4){
      $('.label-5>div').removeClass().addClass('hide-1')
    }else if(firstSelect == 3 && lastSelect == 4){
      $('.label-5>div').removeClass().addClass('hide-2')
    } else if(firstSelect == 1 && lastSelect == 3){
      $('.label-5>div').removeClass().addClass('hide-3')
    }else if(firstSelect == 1 && lastSelect == 2){
      $('.label-5>div').removeClass().addClass('hide-4')
    }else if(firstSelect == 2 && lastSelect == 3){
      $('.label-5>div').removeClass().addClass('hide-5')
    }else if(firstSelect == 1 && lastSelect == 4){
      $('.label-5>div').removeClass()
    }

  });

  //RANGE 5


  let $range5 = $('.js-range-slider-5')
  $range5.ionRangeSlider({
    type: "double",
    min: 1,
    skin: "round",
    max: 4,
    step:1,
    hide_min_max: true,
    hide_from_to: true,
    prettify_enabled: false,
    grid: false,
    min_interval:1,
  });

  $range5.on("change", function () {
    var $inp = $(this);
    var from = $inp.prop("value"); // reading input value
    let firstSelect = from.slice(0, 1);
    let lastSelect = from.slice(2);
    if(firstSelect == 2 && lastSelect == 4){
      $('.label-6>div').removeClass().addClass('hide-1')
    }else if(firstSelect == 3 && lastSelect == 4){
      $('.label-6>div').removeClass().addClass('hide-2')
    } else if(firstSelect == 1 && lastSelect == 3){
      $('.label-6>div').removeClass().addClass('hide-3')
    }else if(firstSelect == 1 && lastSelect == 2){
      $('.label-6>div').removeClass().addClass('hide-4')
    }else if(firstSelect == 2 && lastSelect == 3){
      $('.label-6>div').removeClass().addClass('hide-5')
    }else if(firstSelect == 1 && lastSelect == 4){
      $('.label-6>div').removeClass()
    }

  });


  /*slider*/
  var swiperP1 = new Swiper(".slider-p-1", {
    effect: "fade",

    scrollbar: {
      el: ".swiper-scrollbar-1",
      hide: false,
      draggable: true,
    },
  });
  var swiperP2 = new Swiper(".slider-p-2", {
    effect: "fade",

    scrollbar: {
      el: ".swiper-scrollbar-2",
      hide: false,
      draggable: true,
    },
  });
  var swiperP3 = new Swiper(".slider-p-3", {
    effect: "fade",

    scrollbar: {
      el: ".swiper-scrollbar-3",
      hide: false,
      draggable: true,
    },
  });

  /*show info product (catalog page)*/
  $(document).on('click', '.catalog .product-line', function (e){
    e.preventDefault();
    $(this).toggleClass('is-open');
    if($(this).hasClass('is-open')){
      $(this).children('.detail').slideDown();
    }else{
      $(this).children('.detail').slideUp();
    }
  })

  /*mask*/
  //$('.money').mask('000 000 000', {reverse: true});

  /*popup*/
  $(".fancybox").fancybox({
    touch:false,
    autoFocus:false,
  });


 /* open filter*/
  $(document).on('click', '.filter-popup .item h6', function (e){
    e.preventDefault();
    let item = $(this).closest('.item');
    item.toggleClass('is-open');
    if(item.hasClass('is-open')){
      item.find('.wrap').slideDown();
    }else{
      item.find('.wrap').slideUp();

    }
  });

  /*code tel*/

  if($('#code-tel').length > 0){
    var input = document.querySelector("#code-tel");
    window.intlTelInput(input, {
      //allowDropdown: true,
      //autoHideDialCode: true,
      // autoPlaceholder: "off",
      // dropdownContainer: document.body,
      // excludeCountries: ["ru"],
      // formatOnDisplay: false,
      /*    geoIpLookup: function(callback) {
            $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
              var countryCode = (resp && resp.country) ? resp.country : "";
              callback(countryCode);
            });
          },*/
      // hiddenInput: "full_number",
      //initialCountry: "auto",
      //localizedCountries: { 'de': 'Deutschland' },
      // nationalMode: false,
      // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
      // placeholderNumberType: "MOBILE",
      //preferredCountries: ['us'],
      InitialCountry: "",
      separateDialCode: true,

    });
  }


  /*mask*/
  $('#code-tel').mask("0 000 0000", {placeholder: "0 000 0000"});


  /*open item step-2*/
  if(window.innerWidth < 576){
    $(document).on('click', '.test-wrap .step-2-content h1', function (e){
      e.preventDefault();
      let item = $(this);
      item.toggleClass('is-open');
      if(item.hasClass('is-open')){
        $('.test-wrap .step-2-content .left .item').slideDown();
      }else{
        $('.test-wrap .step-2-content .left .item').slideUp();
      }
    });
  }


  /*open filter*/
  $(document).on('click', '.filter-btn', function (e){
    e.preventDefault();
   $('.catalog-product .filter-block').slideDown();
  });

  /*close filter*/
  $(document).on('click', '.close-filter-block', function (e){
    e.preventDefault();
    $('.catalog-product .filter-block').slideUp();
  });

});