<?php

add_action('init','post_type_sustainability_slide');

function post_type_sustainability_slide(){
	$labels = array(

			'name'			=>	_x('Sustainability Slide','general name'),
			'singular_name'	=>  _x('Sustainability Slide','singular name'),
			'menu_name'		=>	_x('Sustainability Slide','admin menu'),
			'name_admin_bar'=>	_x('Sustainability Slide','add new on admin bar'),
			'add_new'		=>	_x('Add New','slide'),
			'add_new_item'	=>	'Add slide',
			'new_item'		=>	'New slide',
			'edit_item'		=>	'Edit slides',
			'view_item'		=>	'View slides',
			);

	$args = array(

			'labels'				=>	$labels,
			'description'			=>	'Post type to include slides',
			'public'				=>	false,
			'publicly_queryable'	=>	false,
			'supports'				=>	array('title','thumbnail','editor'),
			'show_in_menu'			=>	true,
			'show_in_admin_bar'		=>	true,
			'show_in_nav_menus'		=>	false,
			'menu_icon'				=>	'dashicons-slides',
			'menu_position'			=>	10,
			'hierarchical'			=>	false,	
			'rewrite'				=>	false,	
			);

	register_post_type('sustainability_slide',$args);
}
