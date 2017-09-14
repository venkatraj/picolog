<?php
require_once get_template_directory() . '/includes/options-config.php';
	if( ! class_exists('Picolog_Customizer_API_Wrapper') ) {
		require_once get_template_directory() . '/admin/class.picolog-customizer-api-wrapper.php';
	}


Picolog_Customizer_API_Wrapper::getInstance($options);
