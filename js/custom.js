var $ = jQuery;
// $(window).on('load', function(){
// 	jQuery('.wrapper').fadeIn('slow');
// });
jQuery(document).ready(function($) {
  //WOW JS init
  new WOW().init();
  
  $('.home-banner').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: true,
    arrows: false,
    responsive: [
      {
        breakpoint: 767,
        settings: {
          dots: false
        }
      },
    ]
  },setTimeout(function(){
    jQuery('.home-banner').addClass('show');
  }, 500));
  $('.scroll-top').click(function () {
  	$("html, body").animate({
  	    scrollTop: 0
  	}, 600);
  	return false;
  });
  $('.navbar-toggle').on('click', function(){
    $(this).toggleClass('active');
    $('.navigation').toggleClass('active');
  });
  jQuery(".accordion .card-body").hide();
  jQuery(".accordion .card-header").on('click', function() {
      var target = jQuery(this).data('target');
      jQuery(this).stop().toggleClass('active').siblings('.card-body').stop().toggleClass('active').stop().slideToggle('fast');
      // jQuery(target).slideToggle('fast').toggleClass('active').siblings('.accordion .card-body').toggleClass('active');
      // jQuery(".accordion .card-body").not(target).slideUp('fast');
      jQuery(this).parents('.card').siblings('.card').children('.card-header').removeClass('active').siblings('.card-body').removeClass('active').slideUp('fast');
  });
});
$(window).scroll(function() {
    var scroll = $(window).scrollTop();
    if (scroll > 0) {
      $("header").addClass("sticky");
    }
    else{
      $("header").removeClass("sticky");
    }
});