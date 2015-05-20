jQuery(document).ready(function($){

  $('.action.search label, .action.search i').click(function(){
    $('.action.search').toggleClass('active');
  });

  $('.site-actions .socials > .active-socials').click(function(){
    $('.site-actions .socials').toggleClass('active');
  });

  $('.back-top').click(function() {
    $('html,body').animate({
      scrollTop: 0
      }, 'slow'
    );
  });

  $('.site-actions .show-site-nav').click(function(){
    $('body').toggleClass('show-nav');
    $('html, body').scrollTop(0);
  });

  /*

  var vph = $(window).height();
  $('.site-main').css('min-height', vph + 'px');
  $(window).resize(function(){
    resizeMain();
  });
  function resizeMain() {
    var vph = $(window).height();
    $('.site-main').css('min-height', vph + 'px');
  }*/

  function responsiveIframe() {
     // Fix responsive iframe
    $('iframe').each(function(){
      var iw = $(this).width();
      var ih = $(this).height();
      var ip = $(this).parent().width();
      var ipw = ip/iw;
      var ipwh = Math.round(ih*ipw);
      $(this).css({
        'width': ip,
        'height' : ipwh,
      });
    });
  }
  responsiveIframe();

  $(window).resize(function(){
    responsiveIframe();
  });


});
