<?php

$purelinethemename = "Pure Line";

if ( get_stylesheet_directory() == get_template_directory() ) {
	define('PUR_URL', get_template_directory() . '/library/functions/');
	define('PUR_DIRECTORY', get_template_directory_uri() . '/library/functions/');
} else {
	define('PUR_URL', get_stylesheet_directory() . '/library/functions/');
	define('PUR_DIRECTORY', get_template_directory_uri() . '/library/functions/');
}

require_once( get_template_directory() . '/library/functions/options-framework.php' );
require_once( get_template_directory() . '/library/functions/basic-functions.php' );

?>