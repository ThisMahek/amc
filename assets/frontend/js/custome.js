$(document).ready(function() {
 $('#franchise_course_id').multiselect({includeSelectAllOption:false}) ;
});
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
    arrows: false,
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

function franchiseRegister() 
{
    $(".login-btn").text('Validating...').attr('disabled',true)
     
    $.ajax({
        url:$('#franchise_register_form').attr('action'),
        data:$('#franchise_register_form').serialize(),
        type:'POST',
        dataType:'json',
        success:function(objResponse)
        {
          $(".login-btn").text('Register').attr('disabled',false);
          
          if(objResponse.status)
          {
             alert(objResponse.message);
             location.replace(base_url+"franchise-registration/"+objResponse.franchise_and_user_id);
          }
          else
          {
             $.each(objResponse.aErrors, function(key, value) 
             {
                    if(value !== "")
                    {
                      $('#input-' + key).addClass('is-invalid');
                      $('#input-' + key).parents('.form-cover').find('.error').html(value);
                    } 
                });
            grecaptcha.reset();

          }
        }
      })
}
function franchiseLogin() 
{
    $(".login-btn").text('Validating...').attr('disabled',true)
     
    $.ajax({
        url:$('#franchise_login_form').attr('action'),
        data:$('#franchise_login_form').serialize(),
        type:'POST',
        dataType:'json',
        success:function(objResponse)
        {
          $(".login-btn").text('Login').attr('disabled',false);
          alert(objResponse.message);
          if(objResponse.status)
          {
             console.log(objResponse);
             location.replace(objResponse.redirect);
          }
          else
          {
             $.each(objResponse.aErrors, function(key, value) 
             {
                    if(value !== "")
                    {
                      console.log(key);
                      $('#input-' + key).addClass('is-invalid');
                      $('#input-' + key).parents('.form-cover').find('.error').html(value);
                    } 
                });
            grecaptcha.reset();

          }
        }
      })
}
$('#franchise_register_form input').on('keyup', function () { 
        $(this).removeClass('is-invalid').addClass('is-valid');
        $(this).parents('.form-group').find('.error').html(" ");
    });

function synchLoginRegisterDiv(div_class) 
{
  $(".form_div").hide();
  $(".login-btn").hide();
  $("."+div_class).show();
  $("."+div_class+'_button').show();
}

function toggleTermAndCondition(isOpen)
{
  
  $('.term-and-condition-content').slideToggle();
}