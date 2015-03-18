<?php

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Frontpage right',
		'id' => 'frontpage-right',
		'description' => 'Right sidebar on top of the front page',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
}
