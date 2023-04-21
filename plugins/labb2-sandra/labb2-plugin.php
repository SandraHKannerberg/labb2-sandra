<?php

/* 
Plugin Name: Labb2 plugin
*/

function labb2_css_button()

{
	echo "
	<style type='text/css'>

		.button_container {
			display: flex;
			gap: 1rem;
			padding-top: 25px;
			padding-left: 25px;
			padding-bottom: 0px;
		}

		.labb2_button {
			all: unset;
			cursor: pointer;
		}
		.remove_labb2_button {
			all: unset;
			cursor: pointer;
		}

	</style>
	";
}
add_action('init', 'labb2_css_button');


function labb2_css()

{
	echo "
	<style type='text/css'>

		#masthead {
			background-color: rgb(41, 41, 41);
		}	
		#page {
			background-color: rgb(41, 41, 41);
		}
		#colophon {
			background-color: rgb(41, 41, 41);
		}
		a {
			color: white;
		}
		.labb2_button {
			border: 2px solid black;
			border-radius: 50%;
		}
		.remove_labb2_button {
			border: 2px solid black;
			border-radius: 50%;
		}

	</style>
	";
}

function activate_labb2_css()
{
setcookie('labb2_css', '1', time() + 3600 * 24 * 30, '/');
add_action('wp_head', 'labb2_css');
}

function deactivate_labb2_css()
{
setcookie('labb2_css', '', time() - 3600, '/');
unset($_COOKIE['labb2_css']);
}

if (isset($_POST['labb2_button'])) {
activate_labb2_css();
} elseif (isset($_POST['remove_labb2_button'])) {
deactivate_labb2_css();
}
if (isset($_COOKIE['labb2_css'])) {
add_action('wp_head', 'labb2_css');
}
?>

<!--Skapar knappen som ska kunna byta färg på webbsidan -->
<div class="button_container">
	<form method="post">
		<input type="hidden" name="labb2_button" value="1" />
		<button type="submit" class="labb2_button"><i class="fa-regular fa-moon"></i></button>
	</form>

	<form method="post">
		<input type="hidden" name="remove_labb2_button" value="1" />
		<button type="submit" class="remove_labb2_button"><i class="fa-solid fa-sun"></i></button>
	</form>
</div>


<script src="https://kit.fontawesome.com/bce314e193.js" crossorigin="anonymous"></script>