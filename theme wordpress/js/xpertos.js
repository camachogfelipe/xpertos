// JavaScript Document
var wow = new WOW(
  {
    boxClass:     'wow',      // animated element css class (default is wow)
    animateClass: 'animated', // animation css class (default is animated)
    offset:       0,          // distance to the element when triggering the animation (default is 0)
    mobile:       true,       // trigger animations on mobile devices (default is true)
    live:         true,       // act on asynchronously loaded content (default is true)
    /*callback:     function(box) {
      // the callback is fired every time an animation is started
      // the argument that is passed in is the DOM node being animated
    },*/
    scrollContainer: null
  }
);
new WOW().init();

jQuery(function() {
	jQuery(".site-header-menu").sticky({topSpacing:0, bottomSpacing: 100});
	jQuery('.flexslider').flexslider({
		animation: "slide",
		controlNav: false,
	});

	var $header = jQuery('section');
	jQuery(window).scroll(function () {
		if(scrollY <= 0) {
			$header.animate({
				opacity: 0.9999
			}, 300);
		}
		if(scrollY > 0 && $header.is(':not(:animated)')){
			$header.animate({
				opacity: 0.9999
			}, 300);
		}
	});

	jQuery('#navbar-main ul li a').bind('click', function(event) {
		var $anchor = jQuery(this);
		jQuery('html, body').stop().animate({
			scrollTop: jQuery($anchor.attr('href')).offset().top - 70
		}, 1500, 'easeOutExpo');
		event.preventDefault();
	});
  if(jQuery("#modal-disponibilidad").length > 0 ) {
    jQuery("#modal-disponibilidad").modal();
  }

	setTimeout(function(){
		jQuery('body').addClass('loaded');
    var url = window.location.hash;
    console.log(url);
    if(url == "#ok") {
      jQuery('#modal-ok').modal();
    }
    else if(url == "#nok") {
      jQuery('#modal-nok').modal();
    }
    else if(url == "#modal-login") {
      jQuery("#modal-login").modal();
    }
    var get = getGET();
    if( jQuery("#modal-editresponse").length > 0 && get['updated'].length > 0) {
      jQuery("#modal-editresponse").modal();
    }
	}, 3000);

	if(jQuery('.data_validate').length > 0) {
    if(jQuery( ".datepicker" ).length > 0) {
      jQuery( ".datepicker" ).datepicker({
        'dateFormat'  : "yy-mm-dd",
        'minDate'     : "+2 day",
        'regional'    : ['es'],
        beforeShowDay: noFinesDeSemana //nuestra función que identifica fines de semana y festivos
      });
    }
    jQuery(document).on('focus',".datepicker2", function(){
      jQuery( this ).datepicker({
        'dateFormat'  : "yy-mm-dd",
        'minDate'     : "+2 day",
        'regional'    : ['es'],
        beforeShowDay: noFinesDeSemana //nuestra función que identifica fines de semana y festivos
      });
    });
    if( jQuery("#8_horas").length > 0 ) {
      jQuery("#8_horas").on("change", function() {
        jQuery("#7am").attr('checked', true);
        jQuery("#7am").parent().addClass("active");
        jQuery("#1pm").attr('checked', false);
        jQuery("#1pm").parent().removeClass("active");
        jQuery(".1pm").hide();
      });
      jQuery("#4_horas").on("change", function() {
        jQuery("#7am").attr('checked', true);
        jQuery("#7am").parent().addClass("active");
        jQuery("#1pm").attr('checked', false);
        jQuery("#1pm").parent().removeClass("active");
        jQuery(".1pm").show();
      });
    }
    jQuery("input[name='no_servicios']").on("change", function() {
      var days = jQuery("input[name='no_servicios']:checked").val();
      if(days > 1 && days < 24) {
        var input = "";
        for(x=2; x<=days; x++) {
          input = input + '<input type="text" required class="form-control datepicker2" name="fechas[]" placeholder="Escoge el día">';
        }
        jQuery(".calendar-limpieza").html(input);
      }
      else {
        jQuery(".calendar-limpieza").html("");
      }
    });
    jQuery('.data_validate').each(function() {
  		jQuery(this).validate({
  			onkeyup: false,
  			errorClass: 'has-error',
  			validClass: 'valid',
  			highlight: function(element) {
  				jQuery(element).closest('div').addClass("has-error");
  			},
  			unhighlight: function(element) {
  				jQuery(element).closest('div').removeClass("has-error");
  			},
  			errorPlacement: function(error, element) {
  				jQuery(element).closest('div').append(error);
  			},
  			invalidHandler: function(form, validator) {
  				// callback
  			},
        submitHandler : function(form) {
          if( jQuery(".terminos").length > 0 ) {
            var acepto = jQuery("input[name='acepto_condiciones']:checked").val();
            if( acepto == "no" ) {
              jQuery("#modal-condiciones").modal();
              return false;
            }
            form.submit();
          }
          form.submit();
        }
  		});
    });
	}

	if(jQuery('.section-services').length > 0) {
		jQuery('.section-services a').on('click', function(){
			event.preventDefault();
			jQuery( '.section-services a' ).each(function( index ){
				jQuery( this ).removeClass( 'active' );

			});
			jQuery( this ).addClass( 'active' );
			jQuery('.section-services .text div').each(function( index ){
				jQuery( this ).removeClass( 'bounceInDown animated' ).addClass( 'bounceInDown animated' ).addClass( 'hide' );

			});
			tid = jQuery( this ).attr( 'data-rel' );
			id = '.section-services #' + tid;
			jQuery( id ).removeClass( 'bounceInDown animated' ).addClass( 'bounceInDown animated' ).removeClass( 'hide' );
		});
	}
});

var sections = jQuery('section')
  , nav = jQuery('nav')
  , nav_height = nav.outerHeight();

jQuery(window).on('scroll', function () {
  var cur_pos = jQuery(this).scrollTop();

  sections.each(function() {
    var top = jQuery(this).offset().top - nav_height,
        bottom = top + jQuery(this).outerHeight();

    if (cur_pos >= top && cur_pos <= bottom) {
      nav.find('a').removeClass('current');
      sections.removeClass('current');

      jQuery(this).addClass('current');
      nav.find('a[href="#'+jQuery(this).attr('id')+'"]').addClass('current');
    }
  });
});

/* French initialisation for the jQuery UI date picker plugin. */
/* Written by Keith Wood (kbwood{at}iinet.com.au),
			  Stéphane Nahmani (sholby@sholby.net),
			  Stéphane Raimbault <stephane.raimbault@gmail.com> */
(function( factory ) {
	if ( typeof define === "function" && define.amd ) {

		// AMD. Register as an anonymous module.
		define([ "../jquery.ui.datepicker" ], factory );
	} else {

		// Browser globals
		factory( jQuery.datepicker );
	}
}(function( datepicker ) {
	datepicker.regional['es'] = {
		closeText: 'Cerrar',
		prevText: 'Anterior',
		nextText: 'Siguiente',
		currentText: 'hoy',
		monthNames: ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'],
		monthNamesShort: ['ene.', 'feb.', 'mar', 'abr', 'may', 'jun', 'jul.', 'ago', 'sep.', 'oct.', 'nov.', 'dic.'],
		dayNames: ['domingo', 'lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado'],
		dayNamesShort: ['dom.', 'lun.', 'mar.', 'mie.', 'jue.', 'vie.', 'sab.'],
		dayNamesMin: ['D','L','M','M','J','V','S'],
		weekHeader: 'Sem.',
		dateFormat: 'yy-mm-dd',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''};
	datepicker.setDefaults(datepicker.regional['es']);

	return datepicker.regional['fr'];

}));

function noFinesDeSemana(date) {
var day = date.getDay();
 // aqui indicamos el numero correspondiente a los dias que ha de bloquearse (el 0 es Domingo, 1 Lunes, etc...) en el ejemplo bloqueo todos menos los lunes y jueves.
 return [(day != 0), ''];
}

function getGET(){
   var loc = document.location.href;
   var getString = loc.split('?')[1];
   var GET = getString.split('&');
   var get = {};//this object will be filled with the key-value pairs and returned.

   for(var i = 0, l = GET.length; i < l; i++){
      var tmp = GET[i].split('=');
      get[tmp[0]] = unescape(decodeURI(tmp[1]));
   }
   return get;
}
