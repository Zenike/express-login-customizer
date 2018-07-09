<?php


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// 1) CREATE SUBMENU
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// on commence ici, on crée et nomme un nouveau menu
function je_cree_mon_menu_pour_customize_login()
{
	add_submenu_page(
		'tools.php',//parent_slug
		'Express login customize options',//page_title
		'Login customizer',//menu_title
		'manage_options',//capability
		'express-login-customizer',//menu_slug
		'wporg_options_page_html'//callable function																	SUITE ICI UNIQUEMENT
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
			settings_fields('login_options_group');																		//SUITE ICI
			// output setting sections and their fields
			// (sections are registered for "wporg", each field is registered to a specific section)
			do_settings_sections('express-login-customizer');																	//ET ICI
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
	register_setting(
		'login_options_group',
		'test_test_test'
	);

	add_settings_section(
		'login_first_options',// ID of the section
		'custooom section login',// formated title of the section
		'section_login_callback',// function that echoes content between title and fields
		'express-login-customizer'// name of the actual page where to display these options
	);

	add_settings_field(
		"couleur_theme",
		"blabla",
		"rempli_input",
		"express-login-customizer",
		"login_first_options"
	);
}
add_action('admin_init', 'creer_et_diviser_les_options');

// petit callback pour afficher une sous phrase
function section_login_callback() {
	echo '<p>bla bla bla</p>';
}




?>
