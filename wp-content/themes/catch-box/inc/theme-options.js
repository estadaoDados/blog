// JavaScript Document
jQuery(document).ready(function($){
	
	$(".option-content").hide();

	$("h3.option-toggle").click(function(){
	$(this).toggleClass("option-active").next().slideToggle("fast");
		return false; 
	});

});
jQuery(document).ready(function ($) {
    setTimeout(function () {
        $(".fade").fadeOut("slow", function () {
            $(".fade").remove();
        });

    }, 2000);
});


var farbtastic;

(function($){
	var pickColor = function(a) {
		farbtastic.setColor(a);
		$('#link-color').val(a);
		$('#link-color-example').css('background-color', a);
	};

	$(document).ready( function() {
		$('#default-color').wrapInner('<a href="#" />');

		farbtastic = $.farbtastic('#colorPickerDiv', pickColor);

		pickColor( $('#link-color').val() );

		$('.pickcolor').click( function(e) {
			$('#colorPickerDiv').show();
			e.preventDefault();
		});

		$('#link-color').keyup( function() {
			var a = $('#link-color').val(),
				b = a;

			a = a.replace(/[^a-fA-F0-9]/, '');
			if ( '#' + a !== b )
				$('#link-color').val(a);
			if ( a.length === 3 || a.length === 6 )
				pickColor( '#' + a );
		});

		$(document).mousedown( function() {
			$('#colorPickerDiv').hide();
		});

		$('#default-color a').click( function(e) {
			pickColor( '#' + this.innerHTML.replace(/[^a-fA-F0-9]/, '') );
			e.preventDefault();
		});

		$('.image-radio-option.color-scheme input:radio').change( function() {
			var currentDefault = $('#default-color a'),
				newDefault = $(this).next().val();

			if ( $('#link-color').val() == currentDefault.text() )
				pickColor( newDefault );

			currentDefault.text( newDefault );
		});
	});
})(jQuery);