$(document).ready(function() {
  $(".animsition").animsition({
    inClass: 'fade-in',
    outClass: 'fade-out',
    inDuration: 1500,
    outDuration: 800,
    linkElement: '.animsition-link',
    // e.g. linkElement: 'a:not([target="_blank"]):not([href^=#])'
    loading: true,
    loadingParentElement: 'body', //animsition wrapper element
    loadingClass: 'animsition-loading',
    loadingInner: '', // e.g '<img src="loading.svg" />'
    timeout: false,
    timeoutCountdown: 5000,
    onLoadEvent: true,
    browser: [ 'animation-duration', '-webkit-animation-duration'],
    // "browser" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
    // The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
    overlay : false,
    overlayClass : 'animsition-overlay-slide',
    overlayParentElement : 'body',
    transition: function(url){ window.location.href = url; }
  });
    /******slider********* */
    $(".add_slider").slick({
        dots: false,
        infinite: true,
        centerMode: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay:false,
        arrows:true,
      })
        $(".product_slider").slick({
        dots: false,
        infinite: true,
        centerMode: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay:false,
        arrows:true,
      })
      $(".productsub_slider").slick({
        dots: false,
        infinite: true,
        centerMode: true,
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay:false,
        arrows:true,
      })
      $(".brandsub_slider").slick({
        dots: false,
        infinite: true,
        centerMode: true,
        slidesToShow: 7,
        slidesToScroll: 1,
        autoplay:false,
        arrows:true,
      })
      $(".category_filter ul > li").click(function(){
        $(this).toggleClass("open_filter")
      });
      

   
       /******slider********* */

       $('.product_small_image li img').click(function(){
           $('.product_main_image img').attr("src", $(this).attr("src"));
        });
           $('.product_small_image li').on('click', function(){
            $('.product_small_image li').removeClass('active_thumb');
            $(this).addClass('active_thumb');
            });

       //  js for quantity plus minus 
 $('#plus').unbind('click').bind('click', function () {
    var value = $('#number').val();
    value++;
    $('#number').val(value);
});

$('#minus').unbind('click').bind('click', function () {
    var value = $('#number').val();
    value--;
    $('#number').val(value);
});
// js for more link in footer start
 $(".read-more-wrap li:nth-child(10)").nextAll().addClass('read-more-target');
 
 $('.read-more-state').click( function(){
   var location = $(this).parent().parent();
        $(".read-more-wrap li:nth-child(10)",location).nextAll().toggleClass('read-more-target');
      
      
 });

  $('[data-toggle="tooltip"]').tooltip() 

 function UncheckAll(){ 
      var w = document.getElementById('footer_bottom').getElementsByTagName('input');
      for(var i = 0; i < w.length; i++){ 
        if(w[i].type=='checkbox'){ 
          w[i].checked = false; 
        }
      }
  } 

  window.onload = function(){
    UncheckAll();
}

// js for more link in footer end
  });