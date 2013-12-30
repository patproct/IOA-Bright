<?php
function loop_post_classes($post_type,$tags) {
	if (isset($post_type) && isset($tags)) {
		$returned_string = $post_type;
		if (is_archive() || is_home()) {
			foreach ($tags as $tag) {
				$returned_string .= ' '.$tag->slug;
			}
			if (has_category('propwash') && !is_category('propwash')) $returned_string .= " propwash";
		}
		$returned_string .= ' post-object';
		return $returned_string;
	} else { return false; }
}

// Replaces the excerpt "more" text with a link
function new_excerpt_more($more) {
	global $post;
	return '&#8230;</p><p><a class="moretag" href="'. get_permalink($post->ID) .'">Read the full post &rarr;</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

function register_ioa_menus() {
  register_nav_menus(
    array(
      'sidebar-menu' => __( 'Sidebar Menu' ),
      'footer-menu' => __( 'Footer Menu' )
    )
  );
}
add_action( 'init', 'register_ioa_menus' );

if ( function_exists ('register_sidebar')) { 
    register_sidebar(array(
		'id' => 'right-sidebar',
		'name' => 'Default right sidebar',
		'description' => 'This is the default sidebar on the right side of the page.'
	));
	register_sidebar(array(
		'id' => 'home-sidebar',
		'name' => 'Home right sidebar',
		'description' => 'This is the sidebar on the right side of the homepage.'
	));
}

function menus($menu_name="sidebar-menu") {
	wp_nav_menu( array( 'theme_location' => $menu_name ) );
}
function pagination() {
	global $wp_query;

	$big = 999999999; // need an unlikely integer

	$page_links = paginate_links( array(
		'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'total' => $wp_query->max_num_pages
	) );
	return ($page_links) ? '<div id="pagination">'.$page_links.'</div>' : '';
}
function archives_title() {
	if (is_category()) {
		$cat_pre = (is_category('news') || is_category('propwash')) ? '' : 'Category: ';
		single_cat_title($cat_pre,true);
	}
	if (is_tag()) printf(__('Posts tagged &quot;%s&quot;', 'kubrick'), single_tag_title('',false));
	if (is_day()) printf(_c('Archive for %s|Daily archive page', 'kubrick'), get_the_time(__('F jS, Y', 'kubrick')));
	if (is_month()) printf(_c('Posts from %s|Monthly archive page', 'kubrick'), get_the_time(__('F Y', 'kubrick')));
	if (is_year()) printf(_c('Posts from %s|Yearly archive page', 'kubrick'), get_the_time(__('Y', 'kubrick')));
	if (is_author()) {
		$curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
		echo "Posts by ".$curauth->display_name;
	}
}
function displayYear() { // This function automatically moves the year displayed up on November 1
	date_default_timezone_set('America/Indianapolis');

	$day_of_year = date('z');
	$actual_year = date('Y');
	$display_year;

	if ($day_of_year >= 305) {
		$display_year = $actual_year + 1;
	} else {
		$display_year = $actual_year;
	}
	return $display_year;
}

// Begin settings
/*
function gs_settings_callback() {
	echo "hello";
}
function my_custom_submenu_page_callback() {
	echo '<div class="wrap"><div id="icon-tools" class="icon32"></div>';
			echo '<h2>My Custom Submenu Page</h2>';
			echo '<p>Hello.</p>';
			add_settings_field( 'gsc_settings-id', 'Google Custom Search', 'gs_settings_callback', 'general', 'gs_settings-id', array( 'label_for' => 'gsc_settings-id' ));
			add_settings_section( 'gs_settings-id', 'Google Services', 'gs_settings_callback', 'general' );
	echo '</div>';
}
function google_settings_menu() {
	add_submenu_page( 'options-general.php', 'Google Services', 'Google Services', 'manage_options', 'google-submenu-page', 'my_custom_submenu_page_callback' );
}
add_action('admin_menu','google_settings_menu'); */
// End settings

// Begin widgets
// Google Maps Shortcode
function fn_googleMaps($atts, $content = null) {
	extract(shortcode_atts(array(
		"width" => '425',
		"height" => '400',
		"src" => ''
	), $atts));
	
	return ($src) ? '<iframe width="'.$width.'" height="'.$height.'" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="'.$src.'&amp;output=embed" class="googlemap"></iframe><small class="googlemaplink"><div class="clr"></div><a href="'. $src .'" target="_blank" title="View a larger version of this map">View larger map</a></small>' : false;
}
// add_shortcode("googlemap", "fn_googleMaps");

// Flickr Shortcode
function fn_flickr($atts, $content = null) {
	extract(shortcode_atts(array(
		"width" => '425',
		"height" => '319',
		"src" => '',
		"user" => '14419341%40N02',
		"set" => '72157622352654604'
	), $atts));
	
	return '<object width="'.$width.'" height="'.$height.'"><param name="flashvars" value="offsite=true&lang=en-us&page_show_url=%2Fphotos%2F'.$user.'%2Fsets%2F'.$set.'%2Fshow%2F&page_show_back_url=%2Fphotos%2F'.$user.'%2Fsets%2F'.$set.'%2F&set_id='.$set.'&jump_to="></param> <param name="movie" value="http://www.flickr.com/apps/slideshow/show.swf?v=109615"></param><param name="allowFullScreen" value="true"></param><embed type="application/x-shockwave-flash" src="http://www.flickr.com/apps/slideshow/show.swf?v=109615" allowFullScreen="true" flashvars="offsite=true&lang=en-us&page_show_url=%2Fphotos%2F'.$user.'%2Fsets%2F'.$set.'%2Fshow%2F&page_show_back_url=%2Fphotos%2F'.$user.'%2Fsets%2F'.$set.'%2F&set_id='.$set.'&jump_to=" width="'.$width.'" height="'.$height.'"></embed></object>';
}
add_shortcode("ioa-flickr", "fn_flickr");

function googleresultfunction( $atts, $content = null ) {
	echo '<div class="searchbox"><gcse:searchbox-only></gcse:searchbox-only></div><gcse:searchresults-only linkTarget="_self"></gcse:searchresults-only>';
}
add_shortcode('googleresults', 'googleresultfunction');
// End widgets

// Set max width on embedded media (videos, etc.)
if (!isset($content_width)) $content_width = 459;
?>