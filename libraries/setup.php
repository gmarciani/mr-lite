<?php

require_once(get_template_directory() . '/libraries/class-tgm-plugin-activation.php');

if ( !isset( $content_width ) )
	$content_width = 620;

function mr_setup_theme_scripts() {
	wp_deregister_script( 'jquery' );

	wp_enqueue_script('jquery',           get_template_directory_uri() . '/bower_components/jquery/dist/jquery.min.js', array(), '2.1.3', false);
	wp_enqueue_script('modernizr',        get_template_directory_uri() . '/bower_components/modernizr/modernizr.js', array(), '2.8.3', false);
	wp_enqueue_script('boostrap',        	get_template_directory_uri() . '/bower_components/bootstrap/dist/js/bootstrap.min.js', array('jquery'), '2.8.3', false);
	wp_enqueue_script('comment-reply');

  wp_enqueue_script('mr-main-script', 	get_template_directory_uri() . '/dist/scripts/main.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'mr_setup_theme_scripts');

function mr_setup_theme_styles() {
	wp_enqueue_style('mr-style', 					get_stylesheet_uri());
	wp_enqueue_style('mr-main-style',  		get_template_directory_uri() . '/dist/styles/app.css');
}
add_action('wp_enqueue_scripts', 'mr_setup_theme_styles');

function mr_setup_theme_support() {
	add_theme_support('post-formats', array( 'gallery', 'video', 'quote', 'link'));
  add_theme_support('post-thumbnails');
  add_theme_support('automatic-feed-links');
	add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'widgets'));
	add_theme_support('title-tag');

  add_editor_style();

  load_theme_textdomain('mr-lite', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'mr_setup_theme_support');

function mr_setup_theme_menus() {
	register_nav_menu('header-menu', __('Header Menu', 'mr-lite'));
	register_nav_menu('main-menu', __('Main Menu', 'mr-lite'));
}
add_action('init', 'mr_setup_theme_menus');

function mr_setup_theme_widgets() {
  register_sidebar(array(
		'name'          => __('Main Sidebar', 'mr-lite'),
		'id'            => 'main_sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));
}
add_action('widgets_init', 'mr_setup_theme_widgets');

function mr_header_icons() {
	?>

	<!-- Favicon -->

	<link rel="shortcut icon" sizes="48x48" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/dist/images/logo-favicon-48.png">
  <link rel="shortcut icon" sizes="32x32" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/dist/images/logo-favicon-32.png">
  <link rel="shortcut icon" sizes="16x16" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/dist/images/logo-favicon-16.png">
  <link rel="icon"          sizes="48x48" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/dist/images/logo-favicon-48.png">
  <link rel="icon"          sizes="32x32" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/dist/images/logo-favicon-32.png">
  <link rel="icon"          sizes="16x16" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/dist/images/logo-favicon-16.png">

	<!-- Apple -->

  <meta name="apple-mobile-web-app-capable" content="yes"/>

  <link rel="apple-touch-icon"          sizes="144x144"  href="<?php echo get_template_directory_uri(); ?>/dist/images/logo-icon-apple-touch-icon-ipad-retina.png"/>
  <link rel="apple-touch-icon"          sizes="114x114"  href="<?php echo get_template_directory_uri(); ?>/dist/images/logo-icon-apple-touch-icon-iphone-retina.png"/>
  <link rel="apple-touch-icon"          sizes="72x72"    href="<?php echo get_template_directory_uri(); ?>/dist/images/logo-icon-apple-touch-icon-ipad.png"/>
  <link rel="apple-touch-icon"          sizes="57x57"    href="<?php echo get_template_directory_uri(); ?>/dist/images/logo-icon-apple-touch-icon-iphone.png"/>
  <link rel="apple-touch-startup-image" sizes="748x1024" href="<?php echo get_template_directory_uri(); ?>/dist/images/logo-icon-apple-touch-startup-image-ipad-landscape.png"/>
  <link rel="apple-touch-startup-image" sizes="768x1004" href="<?php echo get_template_directory_uri(); ?>/dist/images/logo-icon-apple-touch-startup-image-ipad-portrait.png"/>
  <link rel="apple-touch-startup-image" sizes="320x460"  href="<?php echo get_template_directory_uri(); ?>/dist/images/logo-icon-apple-touch-startup-image-iphone.png"/>

	<!-- Android -->

  <meta name="mobile-web-app-capable" content="yes"/>

  <link rel="shortcut icon"             sizes="192x192" href="<?php echo get_template_directory_uri(); ?>/dist/images/logo-icon-android-192.png"/>
  <link rel="shortcut icon"             sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/dist/images/logo-icon-android-144.png"/>
  <link rel="shortcut icon"             sizes="96x96"   href="<?php echo get_template_directory_uri(); ?>/dist/images/logo-icon-android-96.png"/>
  <link rel="shortcut icon"             sizes="72x72"   href="<?php echo get_template_directory_uri(); ?>/dist/images/logo-icon-android-72.png"/>
  <link rel="shortcut icon"             sizes="48x48"   href="<?php echo get_template_directory_uri(); ?>/dist/images/logo-icon-android-48.png"/>
  <link rel="shortcut icon"             sizes="36x36"   href="<?php echo get_template_directory_uri(); ?>/dist/images/logo-icon-android-36.png"/>

  <!-- Windows -->

  <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/dist/images/logo-icon-microsoft-tile-image-144.png">
  <meta name="msapplication-TileColor" content="#d61b51">

	<?php

}
add_action('wp_head', 'mr_header_icons');

function mr_required_plugins() {
	$plugins = array(
		array(
			'name' 							=> 'Contact Form 7',
			'slug' 							=> 'contact-form-7',
			'required'					=> false,
			'force_activation' 	=> false,
			'force_deactivation'=> false,
		)
	);

	tgmpa($plugins);
}
add_action('tgmpa_register', 'mr_required_plugins');

function mr_alter_comment_form_fields($fields) {
	unset($fields['email']);
	unset($fields['url']);
	return $fields;
}
add_filter('comment_form_default_fields', 'mr_alter_comment_form_fields');

?>
