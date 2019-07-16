<?php

	/**
	 * @package Region Halland ACF Page News Simple
	 */
	/*
	Plugin Name: Region Halland ACF Page News Simple
	Description: ACF-fält för extra fält nederst på en nyhets-sida
	Version: 1.4.0
	Author: Roland Hydén
	License: GPL-3.0
	Text Domain: regionhalland
	*/

	// vid 'init', anropa funktionen region_halland_register_utbildning()
	add_action('init', 'region_halland_register_page_news_simple' );

	// Funktionen region_halland_register_nyhet()
	// denna funktion registrerar en ny post_type och gör den synlig i wp-admin
	function region_halland_register_page_news_simple() {
		
		// Vilka labels denna post_type ska ha
		$labels = array(
		        'name'                  => _x( 'Nyheter', 'Post type general name', 'textdomain' ),
		        'singular_name'         => _x( 'Nyhet', 'Post type singular name', 'textdomain' ),
		        'menu_name'             => _x( 'Nyheter', 'Admin Menu text', 'textdomain' ),
		        'add_new'               => __( 'Lägg till nyhet', 'textdomain' ),
        		'add_new_item'          => __( 'Lägg till nyhet', 'textdomain' ),
        		'edit_item'          	=> __( 'Editera nyhet', 'vuxhalland' ),
		    );
		
		// Inställningar för denna post_type 
	    $args = array(
	        'labels' => $labels,
	        'rewrite' => array('slug' => 'nyhet'),
			'show_ui' => true,
			'has_archive' => false,
			'publicly_queryable' => true,
			'public' => true,
			'query_var' => false,
			'menu_icon' => 'dashicons-megaphone',
	        'supports' => array( 'title', 'editor', 'author', 'thumbnail'),
	    );

	    // Registrera post_type
	    register_post_type( 'nyhet', $args );
	    
	}

	// Anropa function om ACF är installerad
	add_action('acf/init', 'my_acf_add_page_news_simple_field_groups');

	// Function för att lägga till "field groups"
	function my_acf_add_page_news_simple_field_groups() {

		if (function_exists('acf_add_local_field_group')):

			acf_add_local_field_group(array(
			    'key' => 'group_1000013',
			    'title' => ' ',
			    'fields' => array(
			        0 => array(
		              'key' => 'field_1000014',
            		  'label' => __('Länk', 'regionhalland'),
            		  'name' => 'name_1000014',
            		  'type' => 'link',
            		  'instructions' => __('Länk till läs mer. Kan vara en extern länk eller en sida.', 'vuxhalland'),
            		  'required' => 0,
            		  'conditional_logic' => 0,
            		  'wrapper' => array(
                		'width' => '',
                		'class' => '',
                		'id' => '',
            		  ),
            		  'return_format' => 'array',
        		    ),
        		    1 => array(
			        	'key' => 'field_1000015',
			            'label' => __('Nyhetsingress', 'regionhalland'),
			            'name' => 'name_1000015',
			            'type' => 'textarea',
			            'instructions' => __('Nyhetsingress', 'regionhalland'),
			            'required' => 0,
			            'conditional_logic' => 0,
			            'wrapper' => array(
			                'width' => '',
			                'class' => '',
			                'id' => '',
			            ),
			            'default_value' => '',
			            'placeholder' => __('', 'regionhalland'),
			            'maxlength' => '',
			            'rows' => 4,
			            'new_lines' => '',
			        ),

			    ),
			    'location' => array(
			        0 => array(
			            0 => array(
			                'param' => 'post_type',
			                'operator' => '==',
			                'value' => 'nyhet',
			            ),
			        )
			    ),
			    'menu_order' => 0,
			    'position' => 'normal',
			    'style' => 'default',
			    'label_placement' => 'top',
			    'instruction_placement' => 'label',
			    'hide_on_screen' => '',
			    'active' => 1,
			    'description' => '',
			));

		endif;

	}

	// Returnera nyheter, default = 3
	function get_region_halland_get_page_news_simple($myNumber = 3)
	{
		
		// Preparerar array för att hämta ut nyheter
		$args = array( 
			'post_type'		=> 'nyhet',
			'number' 		=> $myNumber,
			'sort_column' 	=> 'menu_order', 
			'sort_order' 	=> 'asc'
		);

		// Hämta valda utbildningar
		$pages = get_posts($args);
		
		// Loopa igenom valda utbildningar
		foreach ($pages as $page) {

						// Länk
			$field_link 		= get_field_object('field_1000014', $page->ID);
			if (is_array($field_link['value'])) {
				$page->link_title 	= $field_link['value']['title'];
				$page->link_url 	= $field_link['value']['url'];
				$page->link_target 	= $field_link['value']['target'];
				if ($page->link_url) {
					$page->link_has_url = 1;
				} else {
					$page->link_has_url = 0;
				}
			} else {
				$page->link_title 	= "";
				$page->link_url 	= "";
				$page->link_target 	= "";
				$page->link_has_url = 0;
			}
			
			// Lägg till sidans url 	
			$page->url 			= get_page_link($page->ID);
			
			// Bild
			$page->image 		= get_the_post_thumbnail($page->ID);
			$page->image_url 	= get_the_post_thumbnail_url($page->ID);

			$page->description 	= get_field('name_1000015', $page->ID);
		}

		// Returnera valda nyheter
		return $pages;
	}

	// Returnera nyheter, default = 3
	function get_region_halland_get_page_news_simple_single($id)
	{
		
		// ID för aktuell post
		$myID = $id;
		
		// Hämta page information
		$page = get_post($myID);
		
		// Länk
		$field_link = get_field_object('field_1000014', $page->ID);
		if (is_array($field_link['value'])) {
			$page->link_title 	= $field_link['value']['title'];
			$page->link_url 	= $field_link['value']['url'];
			$page->link_target 	= $field_link['value']['target'];
			if ($page->link_url) {
				$page->link_has_url = 1;
			} else {
				$page->link_has_url = 0;
			}
		} else {
			$page->link_title 	= "";
			$page->link_url 	= "";
			$page->link_target 	= "";
			$page->link_has_url = 0;
		}
		
		// Lägg till sidans url 	
		$page->url 			= get_page_link($page->ID);
		
		// Bild
		$page->image 		= get_the_post_thumbnail($page->ID);
		$page->image_url 	= get_the_post_thumbnail_url($page->ID);

		$page->description 	= get_field('name_1000015', $page->ID);

		// Returnera valda nyheter
		return $page;
		
	}

	// Metod som anropas när pluginen aktiveras
	function region_halland_acf_page_news_simple_activate() {
		
		// Vi aktivering, registrera post_type "utbildning"
		region_halland_register_page_news_simple();

		// Tala om för wordpress att denna post_type finns
		// Detta gör att permalink fungerar
	    flush_rewrite_rules();
	}

	// Metod som anropas när pluginen avaktiveras
	function region_halland_acf_page_news_simple_deactivate() {
		// Nothing at the moment
	}
	
	// Vilken metod som ska anropas när pluginen aktiveras
	register_activation_hook( __FILE__, 'region_halland_acf_page_news_simple_activate');

	// Vilken metod som ska anropas när pluginen avaktiveras
	register_deactivation_hook( __FILE__, 'region_halland_acf_page_news_simple_deactivate');

?>