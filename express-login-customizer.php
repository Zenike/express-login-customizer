<?php
/*
Plugin Name: Express Login Customizer
Plugin URI: https://github.com/Zenike/express-login-customizer
description: Wordpress plugin - allow the user to customize the login screen via the wp backend
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
	?>
	<style type='text/css'>
		body.login {
		background-color: #222;
		}

		.login #login h1 a {
		background-image: url(<?php echo get_bloginfo('template_directory'); ?>/assets/img/login/logo.svg);
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
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );


function elc_admin_script() {
	?>
	<script type="text/javascript">
		jQuery( document ).ready( function( $ ) {
			// // Uploading files
			// var file_frame;
			// var wp_media_post_id = wp.media.model.settings.post.id; // Store the old id
			// var set_to_post_id = <?php echo $my_saved_attachment_post_id; ?>; // Set this
			// jQuery('#upload_image_button').on('click', function( event ){
			// 	event.preventDefault();
			// 	// If the media frame already exists, reopen it.
			// 	if ( file_frame ) {
			// 		// Set the post ID to what we want
			// 		file_frame.uploader.uploader.param( 'post_id', set_to_post_id );
			// 		// Open frame
			// 		file_frame.open();
			// 		return;
			// 	} else {
			// 		// Set the wp.media post id so the uploader grabs the ID we want when initialised
			// 		wp.media.model.settings.post.id = set_to_post_id;
			// 	}
			// 	// Create the media frame.
			// 	file_frame = wp.media.frames.file_frame = wp.media({
			// 		title: 'Select a image to upload',
			// 		button: {
			// 			text: 'Use this image',
			// 		},
			// 		multiple: false	// Set to true to allow multiple files to be selected
			// 	});
			// 	// When an image is selected, run a callback.
			// 	file_frame.on( 'select', function() {
			// 		// We set multiple to false so only get one image from the uploader
			// 		attachment = file_frame.state().get('selection').first().toJSON();
			// 		// Do something with attachment.id and/or attachment.url here
			// 		$( '#image-preview' ).attr( 'src', attachment.url ).css( 'width', 'auto' );
			// 		$( '#image_attachment_id' ).val( attachment.id );
			// 		// Restore the main post ID
			// 		wp.media.model.settings.post.id = wp_media_post_id;
			// 	});
			// 		// Finally, open the modal
			// 		file_frame.open();
			// });
			// // Restore the main ID when the add media button is pressed
			// jQuery( 'a.add_media' ).on( 'click', function() {
			// 	wp.media.model.settings.post.id = wp_media_post_id;
			// });
		});
	</script>
	<?php
}
add_action( 'admin_enqueue_scripts', 'elc_admin_script' );




//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// INCLUDE ADMIN PAGE STUFF
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if( is_admin() ) {
	require( plugin_dir_path(__FILE__) . 'admin/admin-page.php' );
	require( plugin_dir_path(__FILE__) . 'admin/fields_callbacks.php' );
	require( plugin_dir_path(__FILE__) . 'admin/texts_callbacks.php' );
}




?>
