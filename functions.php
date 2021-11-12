<?php
  	//Añado CSS & JS
	  function gsc_add_assets() {
		wp_register_style("bootstrap",get_template_directory_uri()."/css/bootstrap.min.css",array(), false, "all");
		wp_register_style("font-awesome",get_template_directory_uri()."/fontawesome/css/all.min.css",array(),false, "all");
		
		wp_enqueue_style("theme", get_template_directory_uri()."/css/templatemo-style.css" ,array("bootstrap","font-awesome"));
        
		wp_enqueue_script("plugin", get_template_directory_uri()."/js/plugins.js");
    }

    add_action("wp_enqueue_scripts","gsc_add_assets");

	// Habilito: <title>, post-thumbnails, logo
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


	// Registro Menu principal
	function gsc_add_menus(){
		register_nav_menus(
			array(
				'menu-principal' => 'Menu principal'
			)
		);
	}
	add_action("after_setup_theme","gsc_add_menus");

	// Registro sidebar
	function gsc_add_sidebar(){
		register_sidebar(
			array(
				'name' => 'pie de página',
				'id' => 'pie-pagina',
				'before_widget' => '',
				'after_widget' => ''
			)
		);
	}

	add_action('widgets_init','gsc_add_sidebar');

	function gsc_add_post_type_foto(){

		$labels = array(
			'name' => 'Foto',
			'singular_name' => 'Foto',
			'all-items' => 'Todas las fotos',
			'add_new' => 'Añadir foto'
		);

		$args = array(
			'labels'             => $labels,
			'description'        => 'Fotos para mostrar en galeria.',
			'public'             => true,
			'publicly_queryable' => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'foto' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 5,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail' ),
			'taxonomies'         => array('category'),
			'show_in_rest'       => true,
			'menu_icon'          => 'dashicons-images-alt'
		);

		register_post_type('foto',$args);
	}

	add_action("init","gsc_add_post_type_foto");

	function gsc_add_post_type_video(){

		$labels = array(
			'name' => 'Video',
			'singular_name' => 'Video',
			'all-items' => 'Todos los videos',
			'add_new' => 'Añadir video'
		);

		$args = array(
			'labels'             => $labels,
			'description'        => 'Videos para mostrar en galeria.',
			'public'             => true,
			'publicly_queryable' => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'video'),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 5,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail' ),
			'taxonomies'         => array('category'),
			'show_in_rest'       => true,
			'menu_icon'          => 'dashicons-editor-video'
		);

		register_post_type('video',$args);
	}

	add_action("init","gsc_add_post_type_video");