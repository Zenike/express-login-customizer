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
	echo '<img id="img_test" src="" alt="" style="width:100px">';
	echo '<br>';
	echo '<input id="hidden_input_test" name="sdfsdf" type="text" value="" />';
	echo '<a href="#" id="insert-my-media" class="button">Add my media</a>';
}

?>
