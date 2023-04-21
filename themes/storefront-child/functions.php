<?php

//Tar bort Sidebar genom filter
function remove_sidebar() { 
    return false; 
} 
add_filter( 'is_active_sidebar', 'remove_sidebar', 10, 2 ); 

//Tar bort texten Visar alla 5 resultat vid Standardsorteringen
function my_remove_product_result_count() {
    remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
    remove_action('woocommerce_after_shop_loop', 'woocommerce_result_count', 20);
}
add_action('after_setup_theme', 'my_remove_product_result_count', 99);

//Tar bort Standardsorteringen längst ner på sidan
function my_remove_catalog_ordering() {
    remove_action('woocommerce_after_shop_loop', 'woocommerce_catalog_ordering', 10);
}
add_action('after_setup_theme', 'my_remove_catalog_ordering', 99);

//Denna funktion skriver ut erbjudande på e-handeln gällande från vilken summa det erbjuds fri frakt
function free_shipping() {
    echo '<div class="shipping-info">'. "Fri frakt vid köp över 299 kr". '</div>';
}
add_action('storefront_before_content', 'free_shipping', );

add_action('init', 'registrera_meny');

//Registrerar en undermeny i header
function registrera_meny()
    {
        $menus = array(
        'undermeny' => 'undermeny',
        );
        register_nav_menus($menus);
    }


?>