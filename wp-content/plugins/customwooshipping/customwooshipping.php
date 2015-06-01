<?php
/*
Plugin Name: Your Shipping plugin
Plugin URI: http://woothemes.com/woocommerce
Description: Your shipping method plugin
Version: 1.0.0
Author: WooThemes
Author URI: http://woothemes.com
*/

/**
 * Check if WooCommerce is active
 */
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

	function your_shipping_method_init() {
		if ( ! class_exists( 'WC_Your_Shipping_Method' ) ) {
			class WC_Your_Shipping_Method extends WC_Shipping_Method {
				/**
				 * Constructor for your shipping class
				 *
				 * @access public
				 * @return void
				 */
				public function __construct() {
					$this->id                 = 'your_shipping_method'; // Id for your shipping method. Should be uunique.
					$this->method_title       = __( 'Your Shipping Method' );  // Title shown in admin
					$this->method_description = __( 'Description of your shipping method' ); // Description shown in admin

					$this->enabled            = "yes"; // This can be added as an setting but for this example its forced enabled
					$this->title              = "My Shipping Method"; // This can be added as an setting but for this example its forced.

					$this->init();
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
                                
                                public function init_form_fields() {
                                    
                                        $this->form_fields = array(
                                                'buuchinh' => array(
                                                        'title'             => __( 'Chuyen phat cham', 'woocommerce-integration-demo' ),
                                                        'type'              => 'select',
                                                        'options'           => array(
                                                          'key1'    => 'value1'  ,
                                                          'key2'    => 'value2'  ,  
                                                        ),
                                                        'description'       => __( 'Dung chuyen phat cham', 'woocommerce-integration-demo' ),
                                                        'desc_tip'          => true,
                                                        'default'           => ''
                                                ),
                                                'chuyen_phat_nhanh' => array(
                                                        'title'             => __( 'Chuyen phat nhanh', 'woocommerce-integration-demo' ),
                                                        'type'              => 'checkbox',
                                                        'label'             => __( 'Chuyen phat nhanh', 'woocommerce-integration-demo' ),
                                                        'default'           => 'no',
                                                        'description'       => __( 'Chuyen phat nhanh se duoc nhan hang sau 10 ngay', 'woocommerce-integration-demo' ),
                                                ),
                                        );
                                }
        
				/**
				 * calculate_shipping function.
				 *
				 * @access public
				 * @param mixed $package
				 * @return void
				 */
				public function calculate_shipping( $package ) {
					$rate = array(
						'id' => $this->id,
						'label' => $this->title,
						'cost' => '10.99',
						'calc_tax' => 'per_item'
					);

					// Register the rate
					$this->add_rate( $rate );
				}
                                function admin_options() {
                                ?>
                                    <h2><?php _e('You plugin name','woocommerce'); ?></h2>
                                    <table class="form-table">
                                    <?php $this->generate_settings_html(); ?>
                                    </table> <?php
                                }
			}
		}
	}

	add_action( 'woocommerce_shipping_init', 'your_shipping_method_init' );

        function add_your_shipping_method( $methods ) {
		$methods[] = 'WC_Your_Shipping_Method';
		return $methods;
	}
 
	add_filter( 'woocommerce_shipping_methods', 'add_your_shipping_method' );
        
}