var $j = jQuery.noConflict(); // Prevent jQuery conflicts

function init()
{
	$j('.inp-heading').ColorPicker({
			onSubmit: function(hsb, hex, rgb, el) {
				$j(el).val(hex);
				$j(el).ColorPickerHide();
			},
			onBeforeShow: function () {
				$j(this).ColorPickerSetColor(this.value);
			}
		})
		.bind('keyup', function(){
			$j(this).ColorPickerSetColor(this.value);
		});
}

jQuery(document).ready(init);