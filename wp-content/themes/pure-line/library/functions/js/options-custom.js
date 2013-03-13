/**
 * Prints out the inline javascript needed for the colorpicker and choosing
 * the tabs in the panel.
 */

jQuery(document).ready(function($) {
	
  var $noconflict = jQuery.noConflict(); 
  
	// Fade out the save message
	$noconflict('.fade').delay(1000).fadeOut(1000);
	
	// Color Picker
	$noconflict('.colorSelector').each(function(){
		var Othis = this; //cache a copy of the this variable for use inside nested function
		var initialColor = $noconflict(Othis).next('input').attr('value');
		$noconflict(this).ColorPicker({
		color: initialColor,
		onShow: function (colpkr) {
		$noconflict(colpkr).fadeIn(500);
		return false;
		},
		onHide: function (colpkr) {
		$noconflict(colpkr).fadeOut(500);
		return false;
		},
		onChange: function (hsb, hex, rgb) {
		$noconflict(Othis).children('div').css('backgroundColor', '#' + hex);
		$noconflict(Othis).next('input').attr('value','#' + hex);
	}
	});
	}); //end color picker
	
	// Switches option sections
	$noconflict('.group').hide();
	var activetab = '';
	if (typeof(localStorage) != 'undefined' ) {
		activetab = localStorage.getItem("activetab");
	}
	if (activetab != '' && $noconflict(activetab).length ) {
		$noconflict(activetab).fadeIn();
	} else {
		$noconflict('.group:first').fadeIn();
	}
	$noconflict('.group .collapsed').each(function(){
		$noconflict(this).find('input:checked').parent().parent().parent().nextAll().each( 
			function(){
				if ($noconflict(this).hasClass('last')) {
					$noconflict(this).removeClass('hidden');
						return false;
					}
				$noconflict(this).filter('.hidden').removeClass('hidden');
			});
	});
	
	if (activetab != '' && $noconflict(activetab + '-tab').length ) {
		$noconflict(activetab + '-tab').addClass('nav-tab-active');
	}
	else {
		$noconflict('.nav-tab-wrapper a:first').addClass('nav-tab-active');
	}
	$noconflict('.nav-tab-wrapper a').click(function(evt) {
		$noconflict('.nav-tab-wrapper a').removeClass('nav-tab-active');
		$noconflict(this).addClass('nav-tab-active').blur();
		var clicked_group = $noconflict(this).attr('href');
		if (typeof(localStorage) != 'undefined' ) {
			localStorage.setItem("activetab", $noconflict(this).attr('href'));
		}
		$noconflict('.group').hide();
		$noconflict(clicked_group).fadeIn();
		evt.preventDefault();
	});
           					
	$noconflict('.group .collapsed input:checkbox').click(unhideHidden);
				
	function unhideHidden(){
		if ($noconflict(this).attr('checked')) {
			$noconflict(this).parent().parent().parent().nextAll().removeClass('hidden');
		}
		else {
			$noconflict(this).parent().parent().parent().nextAll().each( 
			function(){
				if ($noconflict(this).filter('.last').length) {
					$noconflict(this).addClass('hidden');
					return false;		
					}
				$noconflict(this).addClass('hidden');
			});
           					
		}
	}  
  
 var $popup = jQuery.noConflict(); 
    $popup(document).ready(function(){ 
       $popup('.t4p-save-popup').fadeTo("slow", 1).animate({opacity: 1.0}, 700).fadeTo("slow", 0).animate({zIndex: -1000});
           });   

  
 	// Image Options
	$noconflict('.t4p-radio-img-img').click(function(){
		$noconflict(this).parent().parent().find('.t4p-radio-img-img').removeClass('t4p-radio-img-selected');
		$noconflict(this).addClass('t4p-radio-img-selected');		
	});
		
	$noconflict('.t4p-radio-img-label').hide();
	$noconflict('.t4p-radio-img-img').show();
	$noconflict('.t4p-radio-img-radio').hide();
		 		
});	