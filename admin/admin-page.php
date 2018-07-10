<?php

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// 1) CREATE SUBMENU
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// on commence ici, on crée et nomme un nouveau menu
function je_cree_mon_menu_pour_customize_login()
{
	add_submenu_page(
		'tools.php',//parent_slug
		'Express Login Customizer',//page_title
		'ELC',//menu_title
		'manage_options',//capability
		'express-login-customizer',//menu_slug
		'wporg_options_page_html'//callable function ==> FOLLOWUP
	);
}
add_action('admin_menu', 'je_cree_mon_menu_pour_customize_login');


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// 2) CREATE STRUCTURE THEN CALL OPTIONS
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// crée la base html de la page puis appelle les inputs etc
function wporg_options_page_html()
{
	// check user capabilities
	if (!current_user_can('manage_options')) {
		return;
	}
	?>
	<div class="wrap">
		<h1><?php echo esc_html(get_admin_page_title()); ?></h1>
		<form action="options.php" method="post">
			<?php
			// output security fields for the registered setting "wporg_options"
			settings_fields('login_options_group');// ==> FOLLOWUP
			// output setting sections and their fields
			// (sections are registered for "wporg", each field is registered to a specific section)
			do_settings_sections('express-login-customizer');// ==> FOLLOWUP
			// output save settings button
			submit_button('Save Settings');
			?>
		</form>
	</div>
	<?php
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// 3) CALL OPTIONS THEN DIVIDE IN SECTIONS
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// crée la liste des options et la divise en sections nommées
function creer_et_diviser_les_options() {

	// MAIN OPTIONS, GLOBAL TO THE ENTIRE PAGE
	register_setting(
		'login_options_group',// name of the options group
		'elc_database_saving',//name of the options in the database
		'validate_plugin_settings'// function that validate the settings ==> FOLLOWUP
	);

	// DEFINE DEFAULT OPTIONS
	function elc_options_default() {
		return array(
			'theme_color' => '#ed7333',
			'theme_subcolor' => '#d16126',
			'bg_color' => '#222',
			'login_logo' => 'image ???',
		);
	}

		// ONE SECTION
		add_settings_section(
			'about_the_colors',// ID of the section
			'All about the colors !',// formated title of the section
			'subtitle_of_colors_section',// function that echoes content between title and fields
			'express-login-customizer'// name of the actual page where to display these options
		);

			// ONE FIELD
			add_settings_field(
				"theme_color",// ID of the specific setting
				"Theme color of the website",// text (label) of the setting
				"elc_text_input",// callback function that generate a type of input
				"express-login-customizer",// name of the actual page where to display these options
				"about_the_colors",// name of the corresponding section
				[ 'id' => 'theme_color', 'label' => 'hexadecimal' ]
			);

			// ONE FIELD
			add_settings_field(
				"theme_subcolor",
				"Theme second color of the website",
				"elc_text_input",
				"express-login-customizer",
				"about_the_colors",
				[ 'id' => 'theme_subcolor', 'label' => 'hexadecimal' ]
			);

			// ONE FIELD
			add_settings_field(
				"bg_color",
				"Background color of the login page",
				"elc_text_input",
				"express-login-customizer",
				"about_the_colors",
				[ 'id' => 'bg_color', 'label' => 'hexadecimal' ]
			);

		// ONE SECTION
		add_settings_section(
			'about_the_logo',
			'All about the logo !',
			'subtitle_of_logos_section',
			'express-login-customizer'
		);

			// ONE FIELD
			add_settings_field(
				"login_logo",
				"Logo of the login page",
				"elc_file_input",
				"express-login-customizer",
				"about_the_logo",
				[ 'id' => 'login_logo', 'label' => 'image file' ]
			);
}
add_action('admin_init', 'creer_et_diviser_les_options');


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// 4) VALIDATE THE PLUGIN SETTINGS
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// dfsfsdfsd sdf
function validate_plugin_settings($input) {

	// a faire : ajouter les fonctions de validation

	return $input;
}



?>
