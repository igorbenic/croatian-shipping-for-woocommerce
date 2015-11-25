<?php
/*
Plugin Name: Croatian Shipping for WooCommerce
Plugin URI: #
Description: WooCommerce Shipping plugin with Croatian Shippings
Version: 1.0.0
Author: Igor Benić
Author URI: http://twitter.com/igorbenic
textdomain: ibenic_woo_shipping
*/

add_action( 'plugins_loaded', 'ibenic_woo_shipping_textdomain' );
	function ibenic_woo_shipping_textdomain() {

		load_plugin_textdomain( 'ibenic_woo_shipping', false, plugin_basename(  dirname(__FILE__ ) ) . '/languages' );
	}
/**
 * Check if WooCommerce is active
 */
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
 
	/**
	 * Functions
	 */
	require_once( 'functions/ibenic_woo_hp_functions.php' );
    
    /**
     * Shippings
     */
	require_once( 'shippings/ibenic_woo_hp_shipping.php' );

	/**
	 * Restrictions
	 */
    require_once( 'restrictions/ibenic_woo_hp_restriction.php' );

    /**
     * Adding Shipping methods to WooCommerce
     * @param  array $methods 
     * @return array          
     */
	function ibenic_add_shipping_methods( $methods ) {
		$methods[] = 'WC_HP_Shipping';
		return $methods;
	}

	add_filter( 'woocommerce_shipping_methods', 'ibenic_add_shipping_methods' );


	add_action( 'plugins_loaded', 'ibenic_woo_restrictions' );

	/**
	 * Loading Restrictions
	 * 
	 */
	function ibenic_woo_restrictions(){

		new IBENIC_WOO_HP_RESTRICTION();
	}


	
}

