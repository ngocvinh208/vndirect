<?php 
include(TEMPLATEPATH.'/include/menus.php');
include(TEMPLATEPATH.'/include/mcsajax.php');
add_theme_support( 'post-thumbnails', array('post','page','dich_vu','tuyen_dung','tin_vndirect','mang_luoi_chi_nhanh','video_huong_dan','quan_he_co_dong','bao_cao_thuong_nien') );
add_theme_support( 'tag', array('tuyen_dung') );
/* Script Admin */
function my_script() { ?>
	<style type="text/css">
		#dashboard_primary,#icl_dashboard_widget,
		#dashboard_right_now #wp-version-message,#wpfooter{
			display:none;
		}
	</style>
<?php }
add_action( 'admin_footer', 'my_script' );
function custom_style_login() {
	?>
    <style type="text/css">
		.login h1 a {
			background-image: url( <?php echo get_template_directory_uri(); ?>/images/logo-header.png);
			background-size: 100% auto;
			height: 52px;
			width: 205px;
		}
		.wp-social-login-provider-list img {
			max-width:100%;
		}
	</style>
<?php }
add_action( 'login_head', 'custom_style_login' );
/* add css, jquery */
function theme_mcs_scripts() {
	wp_enqueue_style( 'style-fonts-opensan', 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700,800&amp;subset=vietnamese' );
	wp_enqueue_style( 'style-fonts-awesome', get_template_directory_uri() . '/fonts/font-awesome.min.css' );
	wp_enqueue_style( 'style-reset', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css' );
	wp_enqueue_style( 'style-datepicker', get_template_directory_uri() . '/js/datepicker/jquery-ui.css' );
	wp_enqueue_style( 'style-slick', get_template_directory_uri() . '/js/slick/slick.css' );
	wp_enqueue_style( 'style-slick-theme', get_template_directory_uri() . '/js/slick/slick-theme.css' );
	wp_enqueue_style( 'style-chart', get_template_directory_uri() . '/js/chart/Chart.min.css' );
	wp_enqueue_style( 'style-fancybox', get_template_directory_uri() . '/js/fancybox3/jquery.fancybox.min.css' );
	wp_enqueue_style( 'style-bootstrap', get_template_directory_uri() . '/css/mcs.reset.css' );
	wp_enqueue_style( 'style-animate', get_template_directory_uri() . '/css/animate.min.css' );
	wp_enqueue_style( 'main-style', get_stylesheet_uri() );
	wp_enqueue_style( 'style-responsive', get_template_directory_uri() . '/css/responsive.css' );
}
add_action( 'wp_enqueue_scripts', 'theme_mcs_scripts' );

/* register page option ACF */
if( function_exists('acf_add_options_page') ) {
	$parent = acf_add_options_page( array(
		'page_title' => 'VNDIRECT Options',
		'menu_title' => 'VNDIRECT Options',
		'icon_url' => 'dashicons-image-filter',
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'VNDirect',
		'menu_title' 	=> 'VNDirect',
		'parent_slug' 	=> $parent['menu_slug'],
	));
}
add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
	  show_admin_bar(false);
}
add_action( 'init', 'create_tag_taxonomies', 0 );

//create two taxonomies, genres and tags for the post type "tag"
function create_tag_taxonomies() 
{
  // Add new taxonomy, NOT hierarchical (like tags)
  $labels = array(
    'name' => _x( 'Tags', 'taxonomy general name' ),
    'singular_name' => _x( 'Tag', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Tags' ),
    'popular_items' => __( 'Popular Tags' ),
    'all_items' => __( 'All Tags' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Tag' ), 
    'update_item' => __( 'Update Tag' ),
    'add_new_item' => __( 'Add New Tag' ),
    'new_item_name' => __( 'New Tag Name' ),
    'separate_items_with_commas' => __( 'Separate tags with commas' ),
    'add_or_remove_items' => __( 'Add or remove tags' ),
    'choose_from_most_used' => __( 'Choose from the most used tags' ),
    'menu_name' => __( 'Tags' ),
  ); 

  register_taxonomy('tag_recruitment','tuyen_dung',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'tag' ),
  ));
}
function get_youtube_id_from_url($url)  {
     preg_match('/(http(s|):|)\/\/(www\.|)yout(.*?)\/(embed\/|watch.*?v=|)([a-z_A-Z0-9\-]{11})/i', $url, $results);    return $results[6];
}
function change_date($date) {
	$array_date = explode('/',$date);
	$datenew = $array_date[2].'-'.$array_date[1].'-'.$array_date[0];
	return $datenew;
}
?>