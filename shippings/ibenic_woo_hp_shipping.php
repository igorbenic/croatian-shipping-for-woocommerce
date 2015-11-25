<?php


	function ibenic_wc_hp_shipping() {
		if ( ! class_exists( 'WC_HP_Shipping' ) ) {
			class WC_HP_Shipping extends WC_Shipping_Method {
				/**
				 * Constructor for your shipping class
				 *
				 * @access public
				 * @return void
				 */
				public function __construct() {
					$this->id                 = 'wc_hp_shipping'; // Id for your shipping method. Should be uunique.
					$this->method_title       = __( 'Croatian Post Office Shipping', 'ibenic_woo_shipping' );  // Title shown in admin
					$this->method_description = __( 'Calculate shipping cost for package  delivery using Croatian Post Office', 'ibenic_woo_shipping' ); // Description shown in admin
					$this->title              = __("Croatian Post Office","ibenic_woo_shipping"); // This can be added as an setting but for this example its forced.

					$this->init();

					//display_admin_countries();
					$this->enabled            = $this->settings["enable"]; // This can be added as an setting but for this example its forced enabled
					
					//echo $this->croatia_shipping_value(4, 1);
				}

				/**
				 * Init your settings
				 *
				 * @access public
				 * @return void
				 */
				function init() {
					// Load the settings API
					$this->init_form_fields(); // This is part of the settings API. Override the method to add your own settings
					$this->init_settings(); // This is part of the settings API. Loads settings you previously init.

					// Save settings in admin if you have any defined
					add_action( 'woocommerce_update_options_shipping_' . $this->id, array( $this, 'process_admin_options' ) );
				}

				/**
				 * Initialise Gateway Settings Form Fields
				 */
				 function init_form_fields() {
				     $this->form_fields = array(
				     'enable' => array(
				          'title' => __( 'Enable', 'ibenic_woo_shipping' ),
				          'type' => 'checkbox',
				          'description' => __( 'Enable this shipping.', 'ibenic_woo_shipping' ),
				          'default' => 'no'
				          ),
				    /* 'unutar_delivery' => array(
				          'title' => __( 'Croatia - Delivery', 'ibenic_woo_hp' ),
				          'type' => 'select',
				          'description' => __( 'Using ransom when shipping in Croatia.', 'ibenic_woo_hp' ),
				          'options' => array(
						          '1' => 'Post Office',
						          '2' => 'Buyer Address'
						     ) // array of options for select/multiselects only
				           ),*/
				     'croatia_ransom' => array(
				          'title' => __( 'Croatia - Ransom', 'ibenic_woo_shipping' ),
				          'type' => 'checkbox',
				          'description' => __( 'Using ransom when shipping in Croatia.', 'ibenic_woo_shipping' ),
				          'default' => "no"
				           ),
				     'croatia_returnee' => array(
				          'title' => __( 'Croatia - Returnee', 'ibenic_woo_shipping' ),
				          'type' => 'checkbox',
				          'description' => __( 'Using returnee when shipping in Croatia.', 'ibenic_woo_shipping' ),
				          'default' => "no"
				           ),
				      'croatia_grossly' => array(
				          'title' => __( 'Croatia - Allocated / Grossly', 'ibenic_woo_shipping' ),
				          'type' => 'checkbox',
				          'description' => __( 'Packages are allocated or grossly when shipping in Croatia.', 'ibenic_woo_shipping' ),
				          'default' => "no"
				           ),

				    /* 'unutar_druga_dostava' => array(
				          'title' => __( 'Croatia - Second delivery, sending package to another address with returnee', 'ibenic_woo_hp' ),
				          'type' => 'checkbox',
				          'description' => __( 'Packages are sent to another address when shipping in Croatia.', 'ibenic_woo_hp' ),
				          'default' => "no"
				           ),*/

				    /*  'unutar_primatelj' => array(
				          'title' => __( 'Croatia - Delivering to the Addressee', 'ibenic_woo_hp' ),
				          'type' => 'checkbox',
				          'description' => __( 'Packages are delivered to the addressee when shipping in Croatia.', 'ibenic_woo_hp' ),
				          'default' => "no"
				           ),*/
						
						 'International_package' => array(
				          'title' => __( 'International - Type of Package', 'ibenic_woo_shipping' ),
				          'type' => 'select',
				           'options' => array(
						          '1' => 'Economic',
						          '2' => 'Premium'
						     ) // array of options for select/multiselects only
				           ),

				      'International_ransom' => array(
				          'title' => __( 'International - Ransom (Cash on Delivery)', 'ibenic_woo_shipping' ),
				          'type' => 'checkbox',
				          'description' => __( 'Using ransom when shipping International.', 'ibenic_woo_shipping' ),
				          'default' => "no"
				           ),
				     'International_returnee' => array(
				          'title' => __( 'International - Returnee (Advice of Delivery)', 'ibenic_woo_shipping' ),
				          'type' => 'checkbox',
				          'description' => __( 'Using returnee when shipping International.', 'ibenic_woo_shipping' ),
				          'default' => "no"
				           ),
				      'International_grossly' => array(
				          'title' => __( 'International - Cumbersome', 'ibenic_woo_shipping' ),
				          'type' => 'checkbox',
				          'description' => __( 'Packages are grossly/cumbersome when shipping International.', 'ibenic_woo_shipping' ),
				          'default' => "no"
				           ),

				      'International_fragile' => array(
				          'title' => __( 'International - Fragile', 'ibenic_woo_shipping' ),
				          'type' => 'checkbox',
				          'description' => __( 'Packages are fragile when shipping International.', 'ibenic_woo_shipping' ),
				          'default' => "no"
				           ),

				    

				      'International_insured' => array(
				          'title' => __( 'International - Insured Value', 'ibenic_woo_shipping' ),
				          'type' => 'checkbox',
				          'description' => __( 'Enable or disable insured value for packages that can be sent with it. If disabled, insured value is applied only to shippings which require it and cannot ship without it.', 'ibenic_woo_shipping' ),
				          'default' => "no"
				           ),

				     );
				} // End init_form_fields()

				/**
				 * calculate_shipping function.
				 *
				 * @access public
				 * @param mixed $package
				 * @return void
				 */
				public function calculate_shipping( $package ) {

					$cost = 0;
					$weight = 0; 
					$dimensions = 0; 

					foreach ( $package['contents'] as $item_id => $values ) 
						{ 
							$_product = $values['data']; 
							$weight = $weight + $_product->get_weight() * $values['quantity']; 
							$dimensions = $dimensions + (($_product->length * $values['quantity']) * $_product->width * $_product->height); 
						}

					$totalCost = $package["contents_cost"];

					if($package["destination"]["country"] == "HR"){
							if($weight < 2){
								$weight = 1;
							}elseif($weight < 5){
								$weight = 2;
							}elseif($weight < 10){
								$weight = 3;
							}elseif($weight < 15){
								$weight = 4;
							}elseif($weight <= 20){
								$weight = 5;
							}else{
								//ERROR REPORT 
								$weight = null;
							}

							$cost = $this->croatia_shipping_value($weight, $totalCost);
					}else{
							$cost = $this->international_shipping_value($weight, $totalCost, $package["destination"]["country"]);
					}



					$rate = array(
						'id' => $this->id,
						'label' => $this->title,
						'cost' => $cost,
						//'calc_tax' => 'per_item'
					);

					// Register the rate
					$this->add_rate( $rate );
				}


				public function croatia_shipping_value($weight, $totalCost){
					$tezinapaketu = floatval($weight);
					/*Adresa: 2, Post Office = 1*/
					//echo "tezina:".$tezinapaketu;
					$predanogdje= 1;
					
					$otkupnina = floatval(5.92);
					$povratnica = floatval(2.48);
					//$dop4 = floatval("x");
					$glomazno = floatval(12);
					//$dop6 = floatval(1.6);



					$minvrijednost=3;
					
					$vrijednostpaketu = $totalCost;
					
					$vrijednostpaketu = floatval($vrijednostpaketu);
					
					/*if (isNaN($vrijednostpaketu)){
						alert('UpiĹˇite vrijednost poĹˇiljke')
						return false;
					}*/
					
					/*if ($vrijednostpaketu>100000){
						alert('Maksimalna vrijednost paketa je 100000,00 kn');
						return false;
					}*/
					
					
					$temp = $tezinapaketu;
					$postotkauvecanje = null;
					
					if ($tezinapaketu==1){ 
						if ($predanogdje==1){
							$temp=18;
						}else{
							$temp=20;
						}
						$postotkauvecanje=1;
					}else if ($tezinapaketu==2){ 
						if ($predanogdje==1){
							$temp=20;
						}else{
							$temp=25;
						}
						$postotkauvecanje=1;
					}else if ($tezinapaketu==3){ 
						if ($predanogdje==1){
							$temp=23;
						}else{
							$temp=28;
						}
						$postotkauvecanje=1;
					}else if ($tezinapaketu==4){ 
						if ($predanogdje==1){
							$temp=30;
						}else{
							$temp=35;
						}
						$postotkauvecanje=1.25;
					}else if ($tezinapaketu==5){ 
						if ($predanogdje==1){
							$temp=33;
						}else{
							$temp=38;
						}
						$postotkauvecanje=1.25;
					}
					//if (tezinapaketu>3) minvrijednost=3.66; //ako je teze od 10kg
					//echo "temp: ".$temp." uvecanje: ".$postotkauvecanje." ";
				
					if($this->settings["croatia_ransom"] == "yes"){
						$temp = $temp + $otkupnina*$postotkauvecanje;
					}
					//echo "sa otkupnina: ".$temp. " ";
					if($this->settings["croatia_returnee"] == "yes"){
						$temp = $temp + $povratnica*$postotkauvecanje;
					}

					if($this->settings["croatia_grossly"] == "yes"){
						$temp = $temp + $glomazno*$postotkauvecanje;
					}
					/*if (x.dop2b.checked) temp=temp+(dop2*postotkauvecanje);
					if (x.dop3b.checked) temp=temp+(dop3*postotkauvecanje);
					if (x.dop5b.checked) temp=temp+(dop5*postotkauvecanje);
					if (x.dop6b.checked) temp=temp+(dop6*postotkauvecanje);*/
					
					$temp1 = ($vrijednostpaketu * $minvrijednost/100);
					if ($temp1<3) $temp1=3;
					if ($temp1>220) $temp1=220;
					if ($temp1>0 && $vrijednostpaketu>100) $temp=$temp+$temp1;
					
					//var temp2 = (temp*50/100);
					
					//Druga Dostava- ne koristimo: if (x.dop4b.checked) temp=temp+10;
					
					$temp = round($temp*100)/100;
					$pointPosition = strpos($temp, ".");

					

				

					if($pointPosition === false){
						$temp = $temp + ".00";
					} else {
					   $b= $this->Mid($temp,$pointPosition+1,2);
					   if($b > 0 && $pointPosition >0 && strlen($b) < 2){
					   	$temp = $temp+"0";
					   }
					}


					return (string)$temp;
					
				}

				public function international_shipping_value($weight, $totalCost, $countryCode){
				 
					$countries = ibenic_get_hp_shipping_countries();
                    
	
					$temp = $countries[$countryCode];
					$arr = explode("|", $temp);

					$izborpaketa = intval($this->settings["International_package"]);
					$insuredValue = $this->settings["International_insured"];

					//Dio iz funkcije stosvesmije
					if ($arr[0]=="1" || $arr[0]=="5" || $arr[0]=="6" || $arr[0]=="7"){

						$izborpaketa = 2;
					}

					$otkupnina = floatval(18.5);
					$povratnica = floatval(8);

					//$insuredValue = floatval(18);

					$vrijednostPaketa = floatval($totalCost);
					$tezpaketam = floatval($weight);



					if ($izborpaketa==1) {
						
						 

						/*if (isNaN(tezpaketam) || (tezpaketam>arr[9])){
							
							if (lng=="hr") {
								alert('Maksimalna masa je '+arr[9]+' kg');
							}else{
								alert('The maximum weight is '+arr[9]+' kg');
							}
							
							
							return false;
						}*/
						
						if ($arr[6]=='NE') {
							
							$insuredValue = "yes";
						}
						
					}else{
						
						/*if (isNaN($tezpaketam) || (tezpaketam>arr[4])){
							if (lng=="hr") {
								alert('Maksimalna masa je '+arr[4]+' kg');
							}else{
								alert('The maximum weight is '+arr[4]+' kg');
							}
							return false;
						}*/

						if ($arr[1]=='NE') {
							
							$insuredValue = "yes";
						}
					}

					$tezpaketam2=$tezpaketam;
					

					$pointPosition = strpos($tezpaketam, ".");

					
					if($pointPosition !== false){

						$b= $this->Mid($temp,$pointPosition+1,2);
						if($b < 10 && $pointPosition > 0){
							$tezpaketam = $this->Mid($tezpaketam, 0, $pointPosition)*1+1;
						}
					}
					
					$zona = 0;
					if ($tezpaketam<=1){
						if ($izborpaketa==1) {
							if (intval($arr[0])==1) $zona=75;
							if (intval($arr[0])==2) $zona=120;
							if (intval($arr[0])==3) $zona=150;
							if (intval($arr[0])==4) $zona=180;
							if (intval($arr[0])==5) $zona=90;
							if (intval($arr[0])==6) $zona=144;
							if (intval($arr[0])==7) $zona=100;
						} else {
							if (intval($arr[0])==1) $zona=75;
							if (intval($arr[0])==2) $zona=144;
							if (intval($arr[0])==3) $zona=174;
							if (intval($arr[0])==4) $zona=190;
							if (intval($arr[0])==5) $zona=90;
							if (intval($arr[0])==6) $zona=144;
							if (intval($arr[0])==7) $zona=100;
						}					
					}else if($tezpaketam<=2){
						if ($izborpaketa==1) {
							if (intval($arr[0])==1) $zona=90;
							if (intval($arr[0])==2) $zona=140;
							if (intval($arr[0])==3) $zona=180;
							if (intval($arr[0])==4) $zona=220;
							if (intval($arr[0])==5) $zona=120;
							if (intval($arr[0])==6) $zona=188;
							if (intval($arr[0])==7) $zona=130;
						} else {
							if (intval($arr[0])==1) $zona=90;
							if (intval($arr[0])==2) $zona=188;
							if (intval($arr[0])==3) $zona=236;
							if (intval($arr[0])==4) $zona=300;
							if (intval($arr[0])==5) $zona=120;
							if (intval($arr[0])==6) $zona=188;
							if (intval($arr[0])==7) $zona=130;
						}					
					}else if($tezpaketam<=5){
						if ($izborpaketa==1) {
							if (intval($arr[0])==1) $zona=110;
							if (intval($arr[0])==2) $zona=220;
							if (intval($arr[0])==3) $zona=250;
							if (intval($arr[0])==4) $zona=320;
							if (intval($arr[0])==5) $zona=165;
							if (intval($arr[0])==6) $zona=260;
							if (intval($arr[0])==7) $zona=180;
						} else {
							if (intval($arr[0])==1) $zona=110;
							if (intval($arr[0])==2) $zona=260;
							if (intval($arr[0])==3) $zona=306;
							if (intval($arr[0])==4) $zona=400;
							if (intval($arr[0])==5) $zona=165;
							if (intval($arr[0])==6) $zona=260;
							if (intval($arr[0])==7) $zona=180;
						}					
					}else if($tezpaketam<=10){

						if ($izborpaketa==1) {
							if (intval($arr[0])==1) $zona=150;
							if (intval($arr[0])==2) $zona=270;
							if (intval($arr[0])==3) $zona=400;
							if (intval($arr[0])==4) $zona=500;
							if (intval($arr[0])==5) $zona=230;
							if (intval($arr[0])==6) $zona=310;
							if (intval($arr[0])==7) $zona=250;
						} else {

							if (intval($arr[0])==1) $zona=150;
							if (intval($arr[0])==2) $zona=310;
							if (intval($arr[0])==3) $zona=480;
							if (intval($arr[0])==4) $zona=580;
							if (intval($arr[0])==5) $zona=230;
							if (intval($arr[0])==6) $zona=310;
							if (intval($arr[0])==7) $zona=250;

						}					
					}else if($tezpaketam<=15){
						if ($izborpaketa==1) {
							if (intval($arr[0])==1) $zona=240;
							if (intval($arr[0])==2) $zona=280;
							if (intval($arr[0])==3) $zona=440;
							if (intval($arr[0])==4) $zona=520;
							if (intval($arr[0])==5) $zona=350;
							if (intval($arr[0])==6) $zona=400;
							if (intval($arr[0])==7) $zona=320;
						} else {
							if (intval($arr[0])==1) $zona=240;
							if (intval($arr[0])==2) $zona=320;
							if (intval($arr[0])==3) $zona=520;
							if (intval($arr[0])==4) $zona=600;
							if (intval($arr[0])==5) $zona=350;
							if (intval($arr[0])==6) $zona=400;
							if (intval($arr[0])==7) $zona=320;
						}					
					}else if($tezpaketam<=20){
						if ($izborpaketa==1) {
							if (intval($arr[0])==1) $zona=280;
							if (intval($arr[0])==2) $zona=320;
							if (intval($arr[0])==3) $zona=520;
							if (intval($arr[0])==4) $zona=640;
							if (intval($arr[0])==5) $zona=415;
							if (intval($arr[0])==6) $zona=450;
							if (intval($arr[0])==7) $zona=360;
						} else {
							if (intval($arr[0])==1) $zona=280;
							if (intval($arr[0])==2) $zona=360;
							if (intval($arr[0])==3) $zona=600;
							if (intval($arr[0])==4) $zona=680;
							if (intval($arr[0])==5) $zona=415;
							if (intval($arr[0])==6) $zona=450;
							if (intval($arr[0])==7) $zona=360;
						}					
					}else if($tezpaketam<=25){
						if ($izborpaketa==1) {
							if (intval($arr[0])==1) $zona=320;
							if (intval($arr[0])==2) $zona=400;
							if (intval($arr[0])==3) $zona=600;
							if (intval($arr[0])==4) $zona=720;
							if (intval($arr[0])==5) $zona=500;
							if (intval($arr[0])==6) $zona=550;
							if (intval($arr[0])==7) $zona=440;
						} else {
							if (intval($arr[0])==1) $zona=320;
							if (intval($arr[0])==2) $zona=440;
							if (intval($arr[0])==3) $zona=680;
							if (intval($arr[0])==4) $zona=760;
							if (intval($arr[0])==5) $zona=500;
							if (intval($arr[0])==6) $zona=550;
							if (intval($arr[0])==7) $zona=440;
						}					
					}else if($tezpaketam<=30){
						if ($izborpaketa==1) {
							if (intval($arr[0])==1) $zona=360;
							if (intval($arr[0])==2) $zona=480;
							if (intval($arr[0])==3) $zona=680;
							if (intval($arr[0])==4) $zona=800;
							if (intval($arr[0])==5) $zona=610;
							if (intval($arr[0])==6) $zona=650;
							if (intval($arr[0])==7) $zona=520;
						} else {
							if (intval($arr[0])==1) $zona=360;
							if (intval($arr[0])==2) $zona=520;
							if (intval($arr[0])==3) $zona=760;
							if (intval($arr[0])==4) $zona=880;
							if (intval($arr[0])==5) $zona=610;
							if (intval($arr[0])==6) $zona=650;
							if (intval($arr[0])==7) $zona=520;
						}					
					}

					$temp = $zona;
					
					if($tezpaketam<=10){
						$otkupnina= floatval(14.8);
						$povratnica= floatval(6.4);
					}
					
					$a = null;
					
					$otkupninaIzbor = $this->settings["International_ransom"];
					$povratnicaIzbor = $this->settings["International_returnee"];

					$fragile = $this->settings["International_fragile"];
					$cumbersome = $this->settings["International_grossly"];

					//START - function stosvesmije
					$izborPoDrzavi = null;;
					
					
					if ($izborpaketa==1){
						$izborPoDrzavi=$arr[10];
					}else{
						$izborPoDrzavi=$arr[5];
					}
					
				
					if (strpos($izborPoDrzavi, "AR") === false){
						$povratnicaIzbor = "no";
						
					}
					
					//lomljvo
					if (strpos($izborPoDrzavi, "L") === false){
						$fragile = "no";
						
					}
					
					
					if (strpos($izborPoDrzavi, "G") === false){
						$cumbersome = "no";
						
					}
					
					
					if ($arr[11]=="" || $arr[11]=="0"){
						$otkupninaIzbor = "no";
					}

					
					
					
					//END - funkcija stosvesmije
					//start provjeravrijednostipaket
					if ($izborpaketa==1){
						$kojepolje=$arr[7];
					}else{
						$kojepolje=$arr[2];
					}

					if ($kojepolje!="DA"){
						 $insuredValue = "no";
					}
					//end provjeravrijednostipaket

					if ($povratnicaIzbor == "yes"){
						
						if ($izborpaketa==1){
							$a=$arr[10];
						}else{
							$a=$arr[5];
						}
						
						$positionAR = strpos($a, "AR");

						if($positionAR === false){
							$povratnicaIzbor = "no";
						}else{
							$temp = $temp + $povratnica;
						}

						/*if (a.indexOf('AR')==-1){
							ALERT
							if (lng=="hr") {
								alert('Usluga povratnice nije moguÄ‡a');
							}else{
								alert('Advice of delivery (AR)) not available');
							}
							return false;
						}
						temp=temp+dop3;*/
					} 
				
					if( $otkupninaIzbor == "yes"){

						$aaa = $arr[11];

						if($aaa == '0' || $aaa == '' || $aaa == 'null'){

							$otkupninaIzbor = "no";

						} else {

							$temp = $temp + $otkupnina;

						}


					}





					$temp1 = $vrijednostPaketa*0.1158;
				
					if ($insuredValue == "yes"){
						
						if ($izborpaketa==1){
							$a=$arr[8];
						}else{
							$a=$arr[3];
						}
						
						
						/*ALERT 
						    if (round($temp1)>$a){
							$dozvola=round($a*8.6339);
							alert('Dozvoljena vrijednost je '+dozvola+' kn');
							return false;
						}*/
						
						//alert(vrijednostpismou*0.1158/65*4);
						if (round($temp1)<=$a){
							$dts=561.594;
							if (($vrijednostPaketa % $dts)>0){
								$mod=$vrijednostPaketa % $dts;
								$vrijednostPaketa = $vrijednostPaketa-$mod+$dts;
							
							}

							$temp = $temp+( $vrijednostPaketa * 0.1158/65*4);
							$temp= $temp+18;
						}

					}
					

					$temp2 = ($temp*50/100);
					
					//if (x.dop4mp.checked) temp=temp+temp2;
					
					$lomglo=18;
					
					if($tezpaketam<=10){
						$lomglo=14.4;
					}
					

					if ($fragile == "yes") $temp=$temp+$lomglo;
					if ($cumbersome == "yes") $temp=$temp+$lomglo;
					
					if ($fragile == "yes" && $cumbersome == "yes") $temp= $temp- $lomglo;
					
					$temp3 = ($temp*50/100);
					
					//if (x.dop7mp.checked) temp=temp+temp3;
					
					$temp = round($temp*100)/100;
					
					$pointPosition = strpos($temp, ".");

					

				

					if($pointPosition === false){
						$temp = $temp + ".00";
					} else {
					   $b= $this->Mid($temp,$pointPosition+1,2);
					   if($b < 10 && $pointPosition >0 && strlen($b) < 2){
					   	$temp = $temp+"0";
					   }
					}


					return  round($temp,2);
					
					
				}

				protected function Mid($str, $start, $len){
		                // Make sure start and len are within proper bounds
		                if ($start < 0 || $len < 0) return "";

		                $iEnd;
		                $string = (string)$str;
		                $iLen = strlen($string);

		                if ($start + $len > $iLen){

		                	$iEnd = $iLen;

		                }                        
		                else {

		                	$iEnd = $start + $len;

		                }
		                        

		                return substr($string, $start, $iEnd);
		        }

			}
		}
	}

	add_action( 'woocommerce_shipping_init', 'ibenic_wc_hp_shipping' );
