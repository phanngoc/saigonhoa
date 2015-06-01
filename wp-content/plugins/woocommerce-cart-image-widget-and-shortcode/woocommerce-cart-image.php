<?php
/**
 * Plugin Name: WooCommerce Cart Image - Widget and Shortcode - Wordpress Sidebar and Posts Plugin
 * Plugin URI: http://codecanyon.net/item/woocommerce-distance-rate-shipping/5586711?ref=WPShowCase
 * Description: WooCommerce Cart Image is a fantastic plugin that displays a cart image and item in cart count that links to your shopping cart.
 * Version: 1.0
 * Author: WooCommerce and Wordpress Plugins
 * Author URI: http://codecanyon.net/user/WPShowCase/portfolio?ref=WPShowCase
 * Text Domain: cartwidgetlang
 * Domain Path: /languages
 * Copyright 2014
 */
if ( !defined( 'ABSPATH' ) ) exit;

if ( !class_exists( "WooCommerce_Cart_Widget" ) ) {
	
	load_plugin_textdomain( 'cartwidgetlang', false,
			dirname( plugin_basename( __FILE__ ) ) . '/languages' );
	require_once 'woocommerce-cart-image-widget.php';

	class WooCommerce_Cart_Widget {

		var $all_wp_pages = array();

		function __construct() {
			add_action( 'wp_ajax_get_number_of_items_in_cart',
					array( $this, 'ajax_get_number_of_items_in_cart' ) );
			add_action( 'wp_ajax_nopriv_get_number_of_items_in_cart',
					array( $this, 'ajax_get_number_of_items_in_cart' ) );
			$plugin = plugin_basename( __FILE__ );
			add_filter( "plugin_action_links_$plugin", array( $this, 'plugins_link' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'frontend_scripts' ) );
			add_action( 'init', array( $this, 'add_shortcodes' ) );
		}

		function add_shortcodes() {
			add_shortcode( 'cartimage', array( $this, 'cart_image_shortcode' ) );
		}

		function dir() {
			return dirname( str_replace( $this->change_slashes( WP_CONTENT_DIR ),
							$this->change_slashes( WP_CONTENT_URL ), $this->change_slashes( __FILE__ ) ) );
		}

		function change_slashes( $string ) {
			return str_replace( '\\', '/', str_replace( '\\\\', '/', $string ) );
		}

		function frontend_scripts() {
			global $woocommerce;
			wp_enqueue_script( 'woocommerce-cart-image-widget-frontend',
					$this->dir() . '/woocommerce-cart-image-widget-frontend.js',
					array( 'jquery' ), false, true );
			$localize_array = array(
				'cartUrl' => $woocommerce->cart->get_cart_url(),
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
			);
			wp_localize_script( 'woocommerce-cart-image-widget-frontend',
					'woocommerceCartWidget', $localize_array );
			wp_register_style( 'woocommerce-cart-image-widget-frontend-css',
					$this->dir() . '/woocommerce-cart-image-widget-frontend.css' );
			wp_enqueue_style( 'woocommerce-cart-image-widget-frontend-css' );
		}

		function ajax_get_number_of_items_in_cart() {
			global $woocommerce;
			print $woocommerce->cart->cart_contents_count;
			die();
		}

		function cart_image_shortcode( $atts ) {
			global $woocommerce;
			$src = $this->dir() . '/woocommerce-cart-image.png';
			if ( isset( $atts['upload_woocommerce_cart_image'] ) ) {
				$src = $atts['upload_woocommerce_cart_image'];
			}

			$text_background_color = '#ff0000';
			if ( isset( $atts['text_background_color'] ) ) {
				$text_background_color = $atts['text_background_color'];
			}

			$text_color = '#ffffff';
			if ( isset( $atts['text_color'] ) ) {
				$text_color = $atts['text_color'];
			}
			?>
			<div class="woocommerce-cart-image-widget">
				<a href="<?php print $woocommerce->cart->get_cart_url(); ?>">
					<img src="<?php print $src; ?>" />
					<span class="woocommerce-cart-image-text" style="color:<?php print $text_color; ?>;background-color:<?php print $text_background_color; ?>;">
			<?php
			print $woocommerce->cart->cart_contents_count;
			?></span>
				</a>
			</div>
			<?php
		}

		public function plugins_link( $links ) {
			$settings = '<a href="widgets.php">' . __( 'Widgets Page (to add/edit this widget)',
							'cartwidgetlang' ) . '</a>';
			array_unshift( $links, $settings );
			return $links;
		}

	}

	$woocommerce_cart_widget = new WooCommerce_Cart_Widget();
}
?>