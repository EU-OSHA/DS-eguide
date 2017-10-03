/*SEE MORE*/

(function ($) {
$(document).ready(function(){
    $(".short-and-see-more").shorten();
  });
})(jQuery);


/***** HEADER *********/
(function ($) {
    $(document).ready(function(){
      if($(".feedback-short").length>0){
    $( "legend" ).removeClass( "panel-heading" ).addClass( "panel-header" );
    }
  });
})(jQuery);




/***** FAQS *********/

(function ($) {
    $(document).ready(function(){
    $( ".view-id-faqs .faq_question" ).click(function() {
      $(this).next(".faq_answer").slideToggle( "slow" );
      $(this).toggleClass("active");
      $(this).parent(".faq-row").toggleClass("active");
    });
  });
})(jQuery);


/*Show skipped */
(function ($) {
$(document).ready(function(){
    $(".content").prev("h2").remove();
    $(".site-map-menu").addClass("container");
   
    $('#filter-questions').on('change', function() {
      if ( this.value == '0')
      {
        $( "li.answered" ).show();
        $( "li.pending" ).show();
        $( ".questions-title .noSkipped" ).addClass('selected');
        $( ".questions-title .toSkipped" ).removeClass('selected');
      }
      else
      {
        $( "li.answered" ).hide();
        $( "li.pending" ).hide();
        $( ".questions-title .toSkipped" ).addClass('selected');
        $( ".questions-title .noSkipped" ).removeClass('selected');
      }
    });

        

  });
})(jQuery);


/* sticky menu  */
(function ($) {
  $(document).ready(function(){
    //alert(document.documentElement.scrollHeight);
      $(function () {
          // Check the initial Position of the Sticky Header
          var nav = $('.ds-menu');
          if(jQuery("body.not-logged-in").height()>=1440){
            if (nav.length) {
                var stickyNavTop = nav.offset().top;
                $(window).scroll(function () {
                    if ($(window).scrollTop() > stickyNavTop) {
                        $('header').addClass('sticktotop');
                        
                    } else {
                        $('header').removeClass('sticktotop');
                    }
                });
              }
          }
      });
  });
})(jQuery);


/** GO TO TOP **/

(function ($) {
  $(document).ready(function(){
       $(window).scroll(function () {
          if ($(this).scrollTop() > 350) {
             $(".go-top-wrapper").css('display','block');
             $(".go-top-wrapper").fadeIn();
          } else {
              $(".go-top-wrapper").fadeOut();
              $(".go-top-wrapper").css('display','none');
          }
        });
        // scroll body to 0px on click
        $("a[href='#top']").click(function () {
          $(".go-top-wrapper").css('display','none');
          $('body,html').animate({
              scrollTop: 0
          }, 800);
          return false;
        });
  });
})(jQuery);

/** END GO TO TOP **/


/* Hide tabs in /user login page */
(function ($) {
  $(document).ready(function(){
     $('.hide-tabs').prev('.tabs').hide();
  });
})(jQuery);

(function ($) {
$( window ).load(function() {
  $('.hide-tabs').prev('.tabs').hide();
});
})(jQuery);

/* END Hide tabs in /user login page */



/* Checks */

(function ($) {
  $(document).ready(function(){
     $('.table-striped tbody tr:last input').addClass('last-check');
     $('.table-striped tbody tr:last input').removeClass('form-checkbox');
     //$('.table-striped tbody tr:last').addClass('last-tr');
     //$('.table-striped tbody tr:last').removeClass('multichoice-row');    
    
    
     $('input.last-check').on('click', function() {
        $('input.form-checkbox').not(this).prop('checked', false);
     });

     $('input.form-checkbox').on('click', function() {
        $('input.last-check').not(this).prop('checked', false); 
     });

     

     $('.table-striped tbody tr td:last-child').addClass('text-check-td');
     $('.table-striped tbody tr td:last').removeClass('text-check-td').addClass('last-text-check-td');

     
     $('.table-striped tbody tr td.text-check-td').click(function() {
        $('input.last-check').attr('checked', false);
        if ($(this).parent().find('.form-checkbox').is(':checked')) {
          $(this).parent().find('.form-checkbox').attr('checked', false);
        }else{
           $(this).parent().find('.form-checkbox').attr('checked', true);
        }
     });

     $('.table-striped tbody tr td.last-text-check-td').click(function() {
        $('input.form-checkbox').attr('checked', false);
        if ($('input.last-check').is(':checked')) {
         $('input.last-check').attr('checked', false);
        }else{
          $('input.last-check').attr('checked', true);
        }
     });

     

     

  });
})(jQuery);
      
