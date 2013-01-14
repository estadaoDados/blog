var $j = jQuery.noConflict(); // Prevent jQuery conflicts

function init()
{
	$j("#tabs").tabs();
}


jQuery(document).ready(init);
