<?php

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Frontpage right',
		'id' => 'frontpage-right',
		'description' => 'Right sidebar on top of the front page',
		'before_widget' => '<li id="%1$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));
}
