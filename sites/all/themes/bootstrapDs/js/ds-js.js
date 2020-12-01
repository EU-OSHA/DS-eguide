
(function ($) {
$(document).ready(function(){
  $(".short-and-see-more").shorten();
  glossary();
  glossaryLetters();
  glossaryClick();
  glossarySearch();
  glossaryOrderDivs();

  jQuery("button#edit-navigation-back").remove();

  if (jQuery('div:contains("targeting switch")').length>0){
    jQuery('div .error').remove()
  }
  if (jQuery('div:contains("__autoload")').length>0){
    jQuery('div .error').remove()
  }

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

(function ($) {
    $(document).ready(function(){
      if($("#quiz-take-question-feedback-form").length>0 || $(".summary-questions").length>0 ){
      $(".cur_que_title").removeClass("cur_que_title");

    }
  });
})(jQuery);


/***** TITLE contact Us *********/
(function ($) {
    $(document).ready(function(){
      if($("#webform-client-form-67").length>0){
    jQuery("title").html("Contact Us | Dangerous Substances e-tool | EU-OSHA");
    $("meta[name='description']").attr("content", "Submit your feedback to the European Agency for Safety and Health at Work");
    }
  });
})(jQuery);

/***** TITLE Front page *********/
(function ($) {
    $(document).ready(function(){
      if($(".content-home-questions").length>0){
    jQuery("title").html("Home | Dangerous Substances e-tool | EU-OSHA");
    }
  });
})(jQuery);







/*Displaying contact us

(function ($) {
  $(document).ready(function(){
    $(".display-down-contact-us, .contact-us-title").click(function(){
      $(".webform-client-form").slideToggle();
      $(".display-down-contact-us").toggleClass("active");
    });
  });
})(jQuery);
*/

/***** FAQS *********/

(function ($) {
    $(document).ready(function(){
    $( ".view-id-faqs .faq_question" ).click(function() {
      $(this).next(".faq_answer").slideToggle( "fast" );
      $(this).toggleClass("active");
      $(this).parent(".faq-row").toggleClass("active");
    });
  });
})(jQuery);


/***** Glossary *********/

(function ($) {
    $(document).ready(function(){
    $( ".type-name" ).click(function() {
      $(this).toggleClass("active");
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

// Hide Header on on scroll down
/*
(function ($) {
  $(document).ready(function(){
    var didScroll;
    var lastScrollTop = 0;
    var delta = 5;
    var navbarHeight = $('header').outerHeight()-70;

    $(window).scroll(function(event){
        didScroll = true;
    });

    setInterval(function() {
        if (didScroll) {
            hasScrolled();
            didScroll = false;
        }
    }, 110);

    function hasScrolled() {
        var st = $(this).scrollTop();
        
        // Make sure they scroll more than delta
        if(Math.abs(lastScrollTop - st) <= delta)
            return;
        
        // If they scrolled down and are past the navbar, add class .nav-up.
        // This is necessary so you never see what is "behind" the navbar.
        if (st > lastScrollTop && st > navbarHeight){
            // Scroll Down
            $('header').removeClass('nav-down').addClass('nav-up');
        } else {
            // Scroll Up
            if(st + $(window).height() < $(document).height()) {
                $('header').removeClass('nav-up').addClass('nav-down');
            }
        }
        
        lastScrollTop = st;
    }
  });
})(jQuery);

 //sticky menu 
(function ($) {
  $(document).ready(function(){
    //alert(document.documentElement.scrollHeight);
      /*$(function () {
          // Check the initial Position of the Sticky Header
          var nav = $('.ds-menu');
          if(jQuery("body.not-logged-in").height()>=150){
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
      fixing sticky menu*/
      /*var num = 120; //number of pixels before modifying styles
      if($("body").height()>=550){
        $(window).bind('scroll', function () {
            if ($(window).scrollTop() > num) {
                $("header").addClass("sticktotop");
            } else {
                $('header').removeClass('sticktotop');
            }
        });
      };
  });
})(jQuery);*/




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
    

/*Confirmation message*/

(function ($) {
   

$(document).ready(function(){
    jQuery("#edit-confirmation-yes").click(function(){ confirm_yes(); 

    });     
    jQuery("#edit-confirmation-no").click(function(){ confirm_no(); 
    
    });
    
    jQuery(".form-radio").click(function(){ function_change(); 
    
    });

    jQuery(".multichoice-row").click(function(){ function_change(); 
    
    });


    //Get the defaul value and hide de warning message
    if (jQuery(".no_confirm").length==0){
      $("#edit-default-value").val(jQuery( "#quiz-question-answering-form input:checked" ).val());
      jQuery(".confirmation-warning").hide();
    }else{
      jQuery(".confirmation-warning").show();
    }


  });
})(jQuery);



function confirm_yes(){
 jQuery("#edit-new-confirmation").val(1);
}
function confirm_no(){
 jQuery("#edit-new-confirmation").val(0);
}

function function_change(){
  if (jQuery(".confirmation-warning").length==1){
    if (jQuery( "#quiz-question-answering-form input:checked" ).val() == jQuery("#edit-default-value").val()){
      jQuery(".confirmation-warning").hide();
      if (jQuery(".no_confirm").length==1){
          jQuery(".no_confirm").hide();
      }



    }else{
      jQuery(".confirmation-warning").show();
      //jQuery(".confirmation-warning").focus();
      var focalizar = jQuery(".confirmation-warning").position().top;
      jQuery('html,body').animate({scrollTop: focalizar}, 100);
    }
  }

}


function glossary() {

  //Si está en la página de glossary que no salgan los popups
  if(jQuery(".section-glossary").length>0) {
    jQuery(".lexicon-term").each(function() {
      jQuery(this).removeAttr("class").removeAttr("href").removeAttr("title");
    });
  }


  var title="";
  jQuery(".lexicon-term").each(function() {
    jQuery(this).removeAttr("href");

    /*lexicon-mark-term.tpl.php-> Ahí hago la magia*/

    jQuery(this).click(function () {
      removePopUps();
      title=jQuery(this).attr("data-titleBM");
      jQuery(this).addClass("poparizado");
      var html="<div class='popup'><div class='closePop'><img src='/dangerous-substances/sites/all/themes/bootstrapDs/images/closeGlossary.png'></div><div class='contentPop'>"+title+"</div></div>";
      jQuery(this).before(html);
      //positioning

      //tengo el problema que si el texto sale en 2 lineas la cosa sale mal. Me hago un algoritmo para que detecte si ocupa más de una línea

      var textoSel=jQuery(this).text();
      var topPalabra=0;
      var variasLineas=0;

      var cachos=jQuery.trim(textoSel).split(" ");
      if(cachos.length>0) {
        var txtTemporal="";
        for(i=0;i<cachos.length;i++) {
          txtTemporal=txtTemporal+"<span>"+cachos[i]+"</span> ";
        }
        jQuery(this).html(txtTemporal);

        var contador=0;
        jQuery("span",this).each(function() {
          if(contador==0) {
            topPalabra=jQuery(this).position().top;
          } else {
            if(topPalabra!=jQuery(this).position().top) {
              variasLineas=1;
            }
          }
          contador++;
        });
      }

      if(variasLineas==0) {
        jQuery(this).html(textoSel);
        var widthWord=jQuery(this).width()/2;
        var widthBox=jQuery(".popup").width()/2;
        var leftWord=jQuery(this).position().left;
        var leftPut=(leftWord+widthWord)-(widthBox)+"px";
        jQuery(".popup").css("left",leftPut); //center

        var topWord=jQuery(this).position().top;
        var heightWord=jQuery(this).height();
        var heightBox=jQuery(".popup").height();
        var topPut=topWord-heightBox-heightWord+"px";
        jQuery(".popup").css("top",topPut); //center
      } else {
        var widthWord=jQuery("span:eq(0)",this).width()/2;
        var widthBox=jQuery(".popup").width()/2;
        var leftWord=jQuery("span:eq(0)",this).position().left;
        var leftPut=(leftWord+widthWord)-(widthBox)+"px";
        jQuery(".popup").css("left",leftPut); //center

        var topWord=jQuery("span:eq(0)",this).position().top;
        var heightWord=jQuery("span:eq(0)",this).height();
        var heightBox=jQuery(".popup").height();
        var topPut=topWord-heightBox-heightWord+"px";
        jQuery(".popup").css("top",topPut); //center
        jQuery(this).html(textoSel);
      }

      jQuery(".closePop").click(function () {
        removePopUps();
        jQuery(".poparizado").removeClass("poparizado");
      });


      jQuery(".popup").each(function() {
        jQuery(this).draggable().css("cursor","move"); //lo hago dragabble porque si es muy grande no se puede ver el icono de cerrar, así la mueve y puede cerrarla.
      });



    }); 
    
    //jQuery(this).addClass("tooltip"); //descartado por errores cuando las palabras salen en varias líneas


  });

    /*
    jQuery('.tooltip').tooltipster({
       animation: 'fade',
       delay: 100,
       theme: 'tooltipster-default',
       touchDevices: true,
       trigger: 'click'
    });
    */


    //Hago que las pestañas del buscador y a-z filter también sean linkables
    if(jQuery(".searchGlossary a").length>0) {
      jQuery(".searchGlossary").click(function() {
        location.href=jQuery(".searchGlossary a").attr("href");
      });
    }
    if(jQuery(".filterGlossary a").length>0) {
      jQuery(".filterGlossary").click(function() {
        location.href=jQuery(".filterGlossary a").attr("href");
      });
    }

}

function removePopUps() {
  jQuery(".popup").each(function() {
    jQuery(this).remove();
  });
  jQuery(".arrowPopUp").each(function() {
    jQuery(this).remove();
  });
}



function menuloginup(){
  if (jQuery("a[href='/user/logout']").length>0) {
    jQuery("#block-system-main-menu .menu").addClass("menupos");
    jQuery("#containerTools").addClass("menudown");
    }
  else
    {
    jQuery("#block-system-main-menu .menu").removeClass("menupos");
    jQuery("#containerTools").removeClass("menudown");
  }
}

function glossaryLetters() {
  if (jQuery(".lexicon-links").length>0) {
      //Separar las letras entre si un poco
      var htmlInicial=jQuery(".lexicon-links").html();
      var span=jQuery(".lexicon-links span.selectaletter").html();

      var cachosSpan=htmlInicial.split("</span>");
      var cadenaTratar=cachosSpan[1];

      var letras=cadenaTratar.split("|");

      var cadenaPoner="";
      for(i=0;i<letras.length;i++) {
        cadenaPoner=cadenaPoner+"<span>"+letras[i]+"</span> |"
      }

      cadenaPoner="<span class='selectaletter'>"+span+"</span>"+cadenaPoner;
      cadenaPoner=cadenaPoner.substring(0, cadenaPoner.length-1);
      jQuery(".lexicon-links").html(cadenaPoner);

      //si hay alguna letra seleccionada que se ponga una capa encima del vocabulario...
      var letterSelected=jQuery(".lexicon-item.active").text();
      var html="<div class='letterSelected'>"+letterSelected+"</div>";
      jQuery(".lexicon-list dl").before(html);
  }
}

function glossaryClick() {
  if (jQuery(".lexicon-list dt").length>0) {
      jQuery(".lexicon-list dt").each(function() {
        jQuery(this).click(function () {
          jQuery(this).next().slideToggle();
          if(jQuery(this).hasClass("selected")) {
            jQuery(this).removeClass("selected");
          } else {
            jQuery(this).addClass("selected");
          }
          //hacer que cambie la dirección de la fecha del background
        });
      });
  }
}


function glossarySearch() {
  
  if(jQuery(".search-api-page-results").length>0) {
    letra="";
    jQuery(".search-api-page-results .search-result h3").before("<div class='letterSelected'>"+letra+"</div>");
    
    jQuery(".letterSelected").each(function(){
      letra= jQuery(this).next().text();
      letra=jQuery.trim(letra).substr(0,1);
      jQuery(this).text(letra);
    });
    
    //letra=jQuery.trim(jQuery(".search-result h3").text()).substr(0,1);
    
    
  }
}

function glossaryOrderDivs() {
  if(jQuery(".search-api-page-results").length>0) {
    jQuery("li.search-result").each(function() {
      var title=jQuery.trim(jQuery("h3",this).text()).toLowerCase();
      jQuery(this).attr("data-orden",title);
    });
  }

  var divList = jQuery("li.search-result");
  divList.sort(function(a, b){
      return jQuery(a).data("orden")>jQuery(b).data("orden");
  });
  jQuery(".search-api-page-results").html(divList);

  jQuery("li.search-result").each(function() {
    jQuery(this).css("margin-bottom","1em");
  });
}


(function ($) {
  $(document).ready(function(){
    if(jQuery("body.page-node-edit.node-type-checklist").length>0) {
      $("ul.tabs.secondary").addClass("container");
    }
    if(jQuery("body.page-node-edit.node-type-recommendation").length>0) {
      $("ul.tabs.secondary").addClass("container");
    }
  });
})(jQuery);

(function ($) {
  $(document).ready(function(){
    if(jQuery(".toolkit-preview").length>0) {
      $(".alert-block").remove();
    }
  jQuery(".form-item-yes label").text("Checklist answer");
  jQuery(".form-item-no label").text("Checklist answer");

  if(jQuery(".toolkit").length>0) {
    jQuery(".field-edit-link").remove()
  }

  });
})(jQuery);


/* Hide admin tabs if user login is not administrador - html-tpl.php */
jQuery(document).ready(function () {
  jQuery("ul.tabs.primary").hide();
  if(jQuery(".show-admin-tabs").length>0) {
    jQuery("ul.tabs.primary").show();
  }
});




