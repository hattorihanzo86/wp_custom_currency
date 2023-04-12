<?php
/*
 * Plugin Name:       Custom Currency USD
 * Plugin URI:        https://areyes.me
 * Description:       Custom USD Currency
 * Version:           1.0.0

 * Author:            Andrian Reyes
 * Author URI:        https://areyes.me
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://areyes.me/wp/plugins/custom_currency
 * Text Domain:       my-basics-plugin
 * Domain Path:       /languages
 */


 

 
add_filter('woocommerce_currency_symbol', 'change_existing_currency_symbol', 10, 2);

function change_existing_currency_symbol( $currency_symbol, $currency ) {
     switch( $currency ) {
          case 'USD': $currency_symbol = '$'; break;
     }
     return $currency_symbol;
}

add_filter('woocommerce_get_price_html', 'custom_price_format', 10, 2);

function custom_price_format( $price_html, $product ) {
     $currency_symbol = get_woocommerce_currency_symbol();
     $price = $product->get_price();
     $price_with_currency = $currency_symbol . ' ' . $price . ' USD';
     $price_html = '<span class="woocommerce-Price-amount amount">' . $price_with_currency . '</span>';
     return $price_html;
}
