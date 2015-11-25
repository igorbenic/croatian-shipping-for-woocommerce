<?php
class IBENIC_WOO_HP_RESTRICTION{

		public function __construct(){

	 	
			add_action( 'woocommerce_review_order_before_cart_contents', array( $this, 'validate_checkout_on_update_order' ), 10 );
			add_action('woocommerce_checkout_process', array( $this, 'validate_checkout' ));

				
		}

		public function validate_checkout(){

			
				 $chosen_methods = WC()->session->get( 'chosen_shipping_methods' );

				 if(in_array('wc_hp_shipping', $chosen_methods)){

				 	$getCountryToShip = WC()->customer->get_shipping_country();
				 	$shippingCountries = ibenic_get_hp_shipping_countries();
				 	$wcCountries = new WC_Countries();

						 $WooCountries = $wcCountries->get_countries();

						 $message = "";

			 			 $messageType = "";

			 		 	 $methodLabel = __('Croatian Post Office','ibenic_woo_shipping');

			 			 $selectedCountry = $WooCountries[$getCountryToShip];


				 	    if($getCountryToShip != "HR" && !array_key_exists($getCountryToShip, $shippingCountries)){

						 	$message = sprintf(__("Sorry, %s is not shipping to %s","ibenic_woo_shipping"), $methodLabel, $selectedCountry);
						 	
						 	$messageType = "error";

						 	if(!wc_has_notice($message, $messageType)){
						 	
						 		wc_add_notice($message, $messageType);
						 
						 	}
						 	
						 }
				 }
	
			
		}

		/**
		 * Validating checkout country for Croatian Post Office shipping
		 * @param  array $posted 
		 */
		public function validate_checkout_on_update_order( $posted ) {
			if ( defined( 'WOOCOMMERCE_CHECKOUT' ) ) {

				 $shippingCountries = ibenic_get_hp_shipping_countries();

				 $packages       = WC()->shipping->get_packages();

				 $chosen_methods = WC()->session->get( 'chosen_shipping_methods' );
				 
				 if ( ! empty( $packages ) ) {
				 	foreach ( $packages as $i => $package ) {


				 		if ( empty( $chosen_methods[ $i ] ) || $chosen_methods[$i] != "wc_hp_shipping" ) {
							
							continue;
							
						}

				  		

				 

				 

					 	 $getCountryToShip = WC()->customer->get_shipping_country();//$shippingCountry;
					 
			 			 $wcCountries = new WC_Countries();

						 $WooCountries = $wcCountries->get_countries();

			 			 $message = "";

			 			 $messageType = "";

			 			 $methodLabel = $package[ 'rates' ][ $chosen_methods[ $i ] ]->label;

			 			 $selectedCountry = $WooCountries[$getCountryToShip];

						 if($getCountryToShip != "HR" && !array_key_exists($getCountryToShip, $shippingCountries)){

						 	$message = sprintf(__("Sorry, %s is not shipping to %s","ibenic_woo_shipping"), $methodLabel, $selectedCountry);
						 	
						 	$messageType = "error";
						 	
						 }else{
						 	
							$message = sprintf(__("%s is shipping to %s","ibenic_woo_shipping"), $methodLabel, $selectedCountry);
						 	
						 	$messageType = "success";
							

						 }
						 
						 if(!wc_has_notice($message, $messageType)){
						 	
						 	wc_add_notice($message, $messageType);
						 
						 }

					}
				}
			}
			
					 
			 
					 
		}




	}