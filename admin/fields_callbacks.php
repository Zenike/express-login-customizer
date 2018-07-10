<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// TEXT INPUT
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function elc_text_input($args) {
	$options = get_option( 'elc_database_saving', elc_options_default() );

	$id = isset($args['id']) ? $args['id'] : '';
	$label = isset($args['label']) ? $args['label'] : '';
	$value = isset($options[$id]) ? sanitize_text_field($options[$id]) : '';

	echo '<input id="elc_options_' . $id . '" name="elc_options[' . $id . ']" type="text" value="' . $value . '" />';
	echo '<br>';
	echo '<label for="elc_options_' . $id . '">' . $label . '</label>';
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// FILE INPUT
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function elc_file_input($args) {



	$options = get_option( 'elc_database_saving', elc_options_default() );

	$id = isset($args['id']) ? $args['id'] : '';
	$label = isset($args['label']) ? $args['label'] : '';
	$value = isset($options[$id]) ? sanitize_text_field($options[$id]) : '';


	echo '<div>';
	echo '<img id="image-preview" src="" width="100" height="100" style="max-height: 100px; width: 100px;">';
	echo '</div>';

	echo '<input id="upload_image_button" type="button" class="button" value="UPLOADER" ?>';

	echo '<input type="hidden" name="image_attachment_id" id="image_attachment_id" value=">';

	echo '<input id="elc_options_' . $id . '" name="elc_options[' . $id . ']" type="text" value="' . $value . '" />';
	echo '<br>';
	echo '<label for="elc_options_' . $id . '">' . $label . '</label>';
}

?>
