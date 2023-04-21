<?php

/* 
Plugin Name: Labb2 plugin
*/

function labb2_css() {
	echo "
	<style type='text/css'>


	</style>
	";
}

add_action( 'init', 'labb2_css' );

?>