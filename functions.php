<?php
  	
	  function gsc_add_assets() {
		wp_register_style("bootstrap",get_template_directory_uri()."/css/bootstrap.min.css",array(), false, "all");
		wp_register_style("font-awesome",get_template_directory_uri()."/fontawesome/css/all.min.css",array(),false, "all");
		
		wp_enqueue_style("theme", get_template_directory_uri()."/css/templatemo-style.css" ,array("bootstrap","font-awesome"));
        
		wp_enqueue_script("plugin", get_template_directory_uri()."/js/plugins.js");
    }

    add_action("wp_enqueue_scripts","gsc_add_assets");

	function gsc_theme_support(){
		add_theme_support('title-tag');
		add_theme_support('post-thumbnails');
		add_theme_support('custom-logo',
			array(
				"width" => 158,
				"height" => 48,
				"flex-width" => true,
				"flex-height" => true
			)
		);
	}
	add_action("after_setup_theme","gsc_theme_support");

	function gsc_add_menus(){
		register_nav_menus(
			array(
				'menu-principal' => 'Menu principal'
			)
		);
	}
	add_action("after_setup_theme","gsc_add_menus");