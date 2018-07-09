<?php
/*
Plugin Name: Express Login Customizer
Plugin URI: nothing
description: nothing
Version: 1.0
Author: Zenike
Author URI: https://github.com/Zenike
License: GPL2
*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );





//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// EDIT BASIC STYLE AND TEXT
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function my_login_logo_url() {
	return "http://www.flexvision.be";
}
add_filter('login_headerurl', 'my_login_logo_url');

function my_login_logo_url_title() {
	return 'Your Site Name and Info';
}
add_filter('login_headertitle', 'my_login_logo_url_title');

function my_login_stylesheet() {
	// wp_enqueue_style('custom-login', plugins_url('style-express-login-customizer.css', __FILE__));
	//wp_enqueue_script( 'custom-login', get_stylesheet_directory_uri() . '/style-login.js' );
	$img_directory = get_bloginfo('template_directory') . "/assets/img/";

	?>
	<style type='text/css'>
		body.login {
		background-color: #222;
		}

		.login #login h1 a {
		background-image: url(<?php echo get_bloginfo('template_directory'); ?>/assets/img//login/logo.svg);
		-webkit-background-size: contain;
		background-size: contain;
		width: auto;
		background-position: center;
		background-repeat: no-repeat;
		}

		.wp-core-ui #login .button-primary {
		background-color: #ed7333;
		border-color: #ed7333;
		box-shadow: none;
		text-shadow: none;
		}

		.wp-core-ui #login .button-primary:hover {
		background-color: #d16126;
		border-color: #d16126;
		}
	</style>
	<?php
}
add_action('login_enqueue_scripts', 'my_login_stylesheet');

if( is_admin() ) {
	require( plugin_dir_path(__FILE__) . 'admin/admin-page.php' );
	require( plugin_dir_path(__FILE__) . 'admin/fields_callbacks.php' );
}
?>
