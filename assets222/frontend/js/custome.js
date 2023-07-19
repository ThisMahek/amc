jQuery(document).ready(function($) {
  // Toggle search box
  $(".search-top").click(function(){
    $(".search-drop").slideToggle(); 
  });
// Toggle search box
jQuery(window).scroll(function() {
    if (jQuery(this).scrollTop() > 100) {
        jQuery(".navbar").addClass("topmines");
    } else {
        jQuery(".navbar").removeClass("topmines");
    }
    if (jQuery(this).scrollTop() > 250) {
        jQuery(".navbar").addClass("nav-active");
    } else {
        jQuery(".navbar").removeClass("nav-active");
    }
});

//scroll top
jQuery(window).scroll(function() {
    if (jQuery(this).scrollTop() > 100) {
        jQuery(".scrollup").addClass("active");
    } else {
        jQuery(".scrollup").removeClass("active");
    }
});
jQuery(".scrollup").click(function() {
    jQuery("html, body").animate({
        scrollTop: 0
    }, 600);
    return false;
});

//scroll top

// Counter
var a = 0;
$(window).scroll(function() {
  var oTop = $('#counter').offset().top - window.innerHeight;
  if (a == 0 && $(window).scrollTop() > oTop) {
    $('.counter-value').each(function() {
      var $this = $(this),
        countTo = $this.attr('data-count');
      $({
        countNum: $this.text()
      }).animate({
          countNum: countTo
        },
        {
          duration: 2000,
          easing: 'swing',
          step: function() {
            $this.text(Math.floor(this.countNum));
          },
          complete: function() {
            $this.text(this.countNum);
            //alert('finished');
          }
        });
    });
    a = 1;
  }
});
// Counter

$('.bannerSlider').slick({
  dots: false,
  infinite: true,
  speed: 300,
  arrows: false,
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2000,
  adaptiveHeight: true,
});

$('.slideUp').slick({
  infinite: true,
  vertical: true,
  verticalSwiping: true,
  slidesToShow: 5,
  slidesToScroll: 1,
  arrows: false,
  dots: false,
  autoplay: true,
  autoplaySpeed: 1000,
  pauseOnHover:true,
});

$('.testimonial-slide').slick({
  slidesToShow: 2,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2000,

  responsive: [
    {
      breakpoint: 767.98,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      }
    }, 
  ]
   
});

$('.course-slide').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2000,

  responsive: [
    {
      breakpoint: 991.98,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
      }
    }, 

    {
      breakpoint: 767.98,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      }
    }, 
  ]
   
});

  $('.partners-slide').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,

    responsive: [
      {
        breakpoint: 767.98,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
        }
      },
    ]

  });

  // WOW Animation
  new WOW().init();
  //GALLERY
  baguetteBox.run('.tz-gallery');
  //machheight
jQuery(".matchHeight").matchHeight(); 
 
});


