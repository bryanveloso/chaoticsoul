<?php

// Widgets FTW!

if ( function_exists('register_sidebar') )
	register_sidebar(array(
  	'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));

function widget_chaoticsoul_links() {
	wp_list_bookmarks(array(
		'title_before' => '<h3>', 
		'title_after' => '</h3>', 
	));
}

function widget_chaoticsoul_search() {
?>
	<form method="get" id="searchform" action="/">
	<div><input type="text" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" value="Journal Search&#8230;" />
	<!-- <input type="submit" id="searchsubmit" value="Search" /> -->
	</div>
	</form>
<?php
}


if ( function_exists('register_sidebar_widget') ) {
	register_sidebar_widget(__('Links', 'widgets'), 'widget_chaoticsoul_links', null, 'links');
	register_sidebar_widget(__('Search', 'widgets'), 'widget_chaoticsoul_search', null, 'search');
}

// Custom Header FTW!
// Only activate this if your version of WordPress supports custom header images! (2.1+)


define('HEADER_TEXTCOLOR', '');
define('HEADER_IMAGE', '%s/images/headerimage.jpg'); // %s is theme dir uri
define('HEADER_IMAGE_WIDTH', 760);
define('HEADER_IMAGE_HEIGHT', 151);
define('NO_HEADER_TEXT', true );

function admin_header_style() {
?>

<style type="text/css">
#headimg {
	height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
	width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
}

#headimg h1, #headimg #desc {
	display: none;
}
</style>

<?php }

add_custom_image_header('header_style', 'admin_header_style');

?>