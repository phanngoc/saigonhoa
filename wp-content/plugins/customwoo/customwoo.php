<?php
/**
 * Plugin Name: WooCommerce Integration Demo
 * Plugin URI: https://gist.github.com/BFTrick/091d55feaaef0c5341d8
 * Description: A plugin demonstrating how to add a new WooCommerce integration.
 * Author: Patrick Rauland
 * Author URI: http://speakinginbytes.com/
 * Version: 1.0
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 *
 */

/**
 * Integration Demo Integration.
 *
 * @package  WC_Integration_Demo_Integration
 * @category Integration
 * @author   Patrick Rauland
 */



if ( ! class_exists( 'WC_Integration_Demo' ) ) :

class WC_Integration_Demo {

	/**
	* Construct the plugin.
	*/
	public function __construct() {
		add_action( 'plugins_loaded', array( $this, 'init' ) );
	}

	/**
	* Initialize the plugin.
	*/
	public function init() {

		// Checks if WooCommerce is installed.
		if ( class_exists( 'WC_Integration' ) ) {
			// Include our integration class.
			 include_once 'WC_Integration_Demo_Integration.php';
                      
			// Register the integration.
			 add_filter( 'woocommerce_integrations', array( $this, 'add_integration' ) );
		} else {
			// throw an admin error if you like
		}
	}

	/**
	 * Add a new integration to WooCommerce.
	 */
	public function add_integration( $integrations ) {
		$integrations[] = 'WC_Integration_Demo_Integration';
		return $integrations;
	}

}

$WC_Integration_Demo = new WC_Integration_Demo( __FILE__ );

endif;