<?php

$pureline_layout = pureline_get_option('pureline_layout','2cl');
$pureline_widgets_header = pureline_get_option('pureline_widgets_header','disable');
$pureline_widgets_footer = pureline_get_option('pureline_widgets_num','disable');

if (($pureline_layout == "2cr" || $pureline_layout == "2cl" || $pureline_layout == "3cr" || $pureline_layout == "3cl" || $pureline_layout == "3cm"))  
{
register_sidebar(array(
'name' => 'Sidebar 1',
'id' => 'sidebar-1',
'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
'after_widget' => '</div></div>',
'before_title' => '<div class="before-title"><div class="widget-title-background"></div><h3 class="widget-title">',
'after_title' => '</h3></div>',
));
} else {
register_sidebar(array(
'name' => 'Sidebar Widgets Disabled',
'id' => 'sidebar-1',
'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
'after_widget' => '</div></div>',
'before_title' => '<div class="before-title"><div class="widget-title-background"></div><h3 class="widget-title">',
'after_title' => '</h3></div>',
'description' => __('You are using one column layout. Please visit theme settings page and change layout to enable sidebar widgets. Widgets placed on this area won\'t be active.', 'pure-line'),
));
}



if (($pureline_layout == "3cr" || $pureline_layout == "3cl" || $pureline_layout == "3cm"))  
{
register_sidebar(array(
'name' => 'Sidebar 2',
'id' => 'sidebar-2',
'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
'after_widget' => '</div></div>',
'before_title' => '<div class="before-title"><div class="widget-title-background"></div><h3 class="widget-title">',
'after_title' => '</h3></div>',
));
}


function pureline_header1() {
register_sidebar(array(
'name' => 'Header 1',
'id' => 'header-1',
'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
'after_widget' => '</div></div>',
'before_title' => '<div class="before-title"><div class="widget-title-background"></div><h3 class="widget-title">',
'after_title' => '</h3></div>',
)); }
function pureline_header2() { 
register_sidebar(array(
'name' => 'Header 2',
'id' => 'header-2',
'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
'after_widget' => '</div></div>',
'before_title' => '<div class="before-title"><div class="widget-title-background"></div><h3 class="widget-title">',
'after_title' => '</h3></div>',
)); }
function pureline_header3() { 
register_sidebar(array(
'name' => 'Header 3',
'id' => 'header-3',
'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
'after_widget' => '</div></div>',
'before_title' => '<div class="before-title"><div class="widget-title-background"></div><h3 class="widget-title">',
'after_title' => '</h3></div>',
)); }
function pureline_header4() { 
register_sidebar(array(
'name' => 'Header 4',
'id' => 'header-4',
'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
'after_widget' => '</div></div>',
'before_title' => '<div class="before-title"><div class="widget-title-background"></div><h3 class="widget-title">',
'after_title' => '</h3></div>',
));
}

function pureline_footer1() {

register_sidebar(array(
'name' => 'Footer 1',
'id' => 'footer-1',
'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
'after_widget' => '</div></div>',
'before_title' => '<div class="before-title"><div class="widget-title-background"></div><h3 class="widget-title">',
'after_title' => '</h3></div>',
)); }
function pureline_footer2() { 
register_sidebar(array(
'name' => 'Footer 2',
'id' => 'footer-2',
'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
'after_widget' => '</div></div>',
'before_title' => '<div class="before-title"><div class="widget-title-background"></div><h3 class="widget-title">',
'after_title' => '</h3></div>',
)); }
function pureline_footer3() { 
register_sidebar(array(
'name' => 'Footer 3',
'id' => 'footer-3',
'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
'after_widget' => '</div></div>',
'before_title' => '<div class="before-title"><div class="widget-title-background"></div><h3 class="widget-title">',
'after_title' => '</h3></div>',
)); }
function pureline_footer4() { 
register_sidebar(array(
'name' => 'Footer 4',
'id' => 'footer-4',
'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
'after_widget' => '</div></div>',
'before_title' => '<div class="before-title"><div class="widget-title-background"></div><h3 class="widget-title">',
'after_title' => '</h3></div>',
));
}

// Header widgets

  if (($pureline_widgets_header == "one"))  
{
pureline_header1();
}
  if (($pureline_widgets_header == "two"))  
{
pureline_header1();
pureline_header2();
}
  if (($pureline_widgets_header == "three"))  
{
pureline_header1();
pureline_header2();
pureline_header3();
}
  if (($pureline_widgets_header == "four"))  
{
pureline_header1();
pureline_header2();
pureline_header3();
pureline_header4();
} else {}

// Footer widgets

  if (($pureline_widgets_footer == "one"))  
{
pureline_footer1();
}
  if (($pureline_widgets_footer == "two"))  
{
pureline_footer1();
pureline_footer2();
}
  if (($pureline_widgets_footer == "three"))  
{
pureline_footer1();
pureline_footer2();
pureline_footer3();
}
  if (($pureline_widgets_footer == "four"))  
{
pureline_footer1();
pureline_footer2();
pureline_footer3();
pureline_footer4();
} else {}

function pureline_widget_area_active( $index ) {
	global $wp_registered_sidebars;
	
	$widgetarea = wp_get_sidebars_widgets();
	if ( isset($widgetarea[$index]) ) return true;
	
	return false;
}

function pureline_widget_area( $name = false ) {
	if ( !isset($name) ) {
		$widget[] = "widget.php";
	} else {
		$widget[] = "widget-{$name}.php";
	}
	locate_template( $widget, true );
}




function pureline_widget_before_title() { ?>

<div class="before-title"><div class="widget-title-background"></div><h3 class="widget-title">

<?php }

function pureline_widget_after_title() { ?>

</h3></div>

<?php }

function pureline_widget_before_widget() { ?>

<div class="widget"><div class="widget-content">

<?php }

function pureline_widget_after_widget() { ?>

</div></div>

<?php }


function pureline_widget_text($args, $number = 1) {
extract($args);
$options = get_option('pureline_widget_text');
$title = $options[$number]['title'];
if ( empty($title) )
$title = '';  }

?>
