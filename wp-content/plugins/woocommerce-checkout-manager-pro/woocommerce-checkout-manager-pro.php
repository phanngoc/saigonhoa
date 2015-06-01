<?php
/*

Plugin Name: WooCommerce Checkout Manager Pro
Plugin URI: http://www.trottyzone.com/product/woocommerce-checkout-manager-pro
Description: Advancely Manages WooCommerce Checkout fields,Nulled by ~Curt~
Version: 3.0
Author: Ephrain Marchan
Author URI: http://www.trottyzone.com
*/

/*
------------------------------------------------------------------------------
WooCommerce Checkout Manager Pro, Copyright (C) 2013 Ephrain Marchan, TrottyZone
-------------------------------------------------------------------------------

-------------------------------------------------------------------------------
--------------------------- NOTICE!!!!!!!!!!!!!!!!!! -------------------------
-------------------------------------------------------------------------------

Please do not edit woocommerce-checkout-manager-pro.php file or any other files of
WooCommerce Checkout Manager Pro. If you do, we are not responsible if your site shuts down,
or any other consequences of such actions.

This plugin may not be copy, distributed, transmitted, publicly display,
publicly perform, reproduce, edit, translate and reformat any way and
should ONLY be used on per domain of purchase.

Please respect our wishes granted that alot of effort has been
put into this plugin to help you have a better experience.

Should you have any questions or concerns, please do contact us at
http://www.trottyzone.com/contact-us/

-------------------------------------------------------------------------------
-------------------------------------------------------------------------------
*/

if ( ! defined( 'ABSPATH' ) ) die();



if ( is_admin() ){ 
	update_option('errfafvetcgrt6434cwooccminfo15907833', 'clear');
	update_option('wccmkelizn32aunique','RGVkaWNhdGVkVG85NkRvd24=');
	add_action( 'admin_menu', 'wccs_admin_menu' );
    add_action('admin_menu', 'wccm_admin_menu'); 
    add_filter( 'plugin_action_links_'.plugin_basename(__FILE__), 'wccs_admin_plugin_actions', -10);
    add_action( 'admin_init', 'wccs_register_setting' );
} 

if ( wccs_positioning_wrkb1() ) {
    add_action('woocommerce_before_checkout_shipping_form', 'wccs_custom_checkout_field');
    add_action('woocommerce_before_checkout_shipping_form', 'scripts_enhanced');
}

if ( wccs_positioning_wrk1() ) {
    add_action('woocommerce_after_checkout_shipping_form', 'wccs_custom_checkout_field');
    add_action('woocommerce_after_checkout_shipping_form', 'scripts_enhanced');
}

if ( wccs_positioning_wrkb2() ) {
    add_action('woocommerce_before_checkout_billing_form', 'wccs_custom_checkout_field');
    add_action('woocommerce_before_checkout_billing_form', 'scripts_enhanced');
}

if ( wccs_positioning_wrk2() ) {
    add_action('woocommerce_after_checkout_billing_form', 'wccs_custom_checkout_field');
    add_action('woocommerce_after_checkout_billing_form', 'scripts_enhanced');
}

if ( wccs_positioning_wrk3() ) {
    add_action('woocommerce_after_order_notes', 'wccs_custom_checkout_field');
    add_action('woocommerce_after_order_notes', 'scripts_enhanced');
}

if ( validator_changename() ) {
    add_action('woocommerce_before_cart', 'wccm_before_checkout');
    add_action('woocommerce_admin_order_data_after_order_details', 'wccm_before_checkout');
    add_action('woocommerce_before_my_account', 'wccm_before_checkout');
    add_action('woocommerce_email_header', 'wccm_before_checkout');
    add_action('woocommerce_before_checkout_form', 'wccm_before_checkout');
    
    add_action('woocommerce_after_cart', 'wccm_after_checkout');
    add_action('woocommerce_admin_order_data_after_shipping_address', 'wccm_after_checkout');
    add_action('woocommerce_after_my_account', 'wccm_after_checkout');
    add_action('woocommerce_email_footer', 'wccm_after_checkout');
    add_action('woocommerce_after_checkout_form', 'wccm_after_checkout');
    
    add_action( 'woocommerce_order_details_after_order_table', 'string_replacer_wccs');

}

if ( enable_auto_complete_wccs()) {
    add_action( 'woocommerce_before_checkout_form', 'retain_field_values_wccm' );
}

add_action( 'wp_enqueue_scripts', 'jquery_wccs_emit' );
add_action( 'plugins_loaded', 'wooccm_load_textdomain' );
add_action( 'admin_init', 'wccs_install' );
add_action( 'admin_head', 'add_menu_icons_styles' );
add_action( 'woocommerce_email_after_order_table', 'add_payment_method_to_new_order', 15 );
add_action('woocommerce_checkout_update_order_meta', 'wccs_custom_checkout_field_update_order_meta');
add_action('woocommerce_checkout_process', 'wccs_custom_checkout_field_process');
add_action('woocommerce_order_details_after_order_table', 'wccs_custom_checkout_details');
add_action('woocommerce_checkout_after_customer_details','wccm_checkout_text_after');
add_action('woocommerce_checkout_before_customer_details','wccm_checkout_text_before');
add_action( 'woocommerce_admin_order_data_after_billing_address', 'delta_wccs_custom_checkout_details', 10, 1 );
add_filter('woocommerce_checkout_fields','remove_fields_filter',15);
add_filter('woocommerce_checkout_fields','remove_fields_filter3',1);
add_action('wp_head','display_front_wccs');
add_action('run_color_innerpicker','run_color_inner');
add_action('woocommerce_before_checkout_billing_form', 'echo_override_style');
add_action('woocommerce_before_checkout_form', 'override_this_wccs');

include(plugin_dir_path( __FILE__ ).'main_upload.php');
include(plugin_dir_path( __FILE__ ).'update.php');
include(plugin_dir_path( __FILE__ ).'field_filters.php');
include(plugin_dir_path( __FILE__ ).'required.php');



function wooccm_load_textdomain() {
    $options = get_option( 'wccs_settings' );
        if( !empty($options['checkness']['admin_translation']) ) {
            load_plugin_textdomain('woocommerce-checkout-manager-pro', false, dirname(plugin_basename(__FILE__)) . '/languages/'); 
        }
}


function wccs_install() {
    $options = get_option( 'wccs_settings' );
        if (empty($options['checkness']['wooccm_notification_email'])) {
            $options['checkness']['wooccm_notification_email'] = get_option('admin_email');
        }
        
        if (empty($options['checkness']['rq_company'])) {
            $options['checkness']['rq_company'] = '1';
        }
        
        if (empty($options['checkness']['wccs_rqo_12'])) {
            $options['checkness']['wccs_rqo_12'] = '1';
        }
        
        if (empty($options['check']['rq_company1'])){
            $options['check']['rq_company1'] = '1';
        }
        
        if ( empty($options['checkness']['position3']) && empty($options['checkness']['position2']) && empty($options['checkness']['position1']) && empty($options['checkness']['beforebilling']) && empty($options['checkness']['beforeshipping']) ) {
            $options['checkness']['position3'] = '1';
        }
        
        if ( empty($options['checkness']['payment_method_d']) ) {
            $options['checkness']['payment_method_d'] = 'Payment Method';
        }

        if ( empty($options['checkness']['time_stamp_title']) ) {
            $options['checkness']['time_stamp_title'] = 'Order Time';
        }

        if ( empty($options['checkness']['payment_method_t']) ) {
            $options['checkness']['payment_method_t'] = '1';
        }

        if ( empty($options['checkness']['shipping_method_d']) ) {
            $options['checkness']['shipping_method_d'] = 'Shipping Method';
        }

        if ( empty($options['checkness']['shipping_method_t']) ) {
            $options['checkness']['shipping_method_t'] = '1';
        }

    foreach( $options['buttons'] as $i => $btn ) :
        $mysecureop = explode( '||', $btn['option_array']);

        if ( !empty($btn['option_a']) ) {
            array_push($mysecureop, $btn['option_a'] );
        }
        if ( !empty($btn['option_b']) ) {
            array_push($mysecureop, $btn['option_b'] );
        }


    for( $ix = 1; $ix <= 50; $ix++ ) :
        if (!empty($btn['option_'.$ix.'']) ) :
        array_push($mysecureop, $btn['option_'.$ix.''] );
    endif;
    endfor;

        $uniqueThevalues = array_unique($mysecureop);

        $options['buttons'][$i]['option_array'] = implode( '||', $uniqueThevalues);

    endforeach;



    if ( !empty($options['change']['add_info']) ) {
        $opt['label'] = $options['change']['add_info'];
        $opt['cow'] = str_replace(' ', '', sanitize_text_field($options['change']['add_info']));
        $opt['type'] = 'heading';
        $opt['position'] = 'form-row-wide';

    if ( empty($options['checkness']['checkbox1']) ) {
    $opt['deny_receipt'] = 1;
    }


    array_push($options['buttons'], $opt );

    }


    update_option( 'wccs_settings', $options );

}



function jquery_wccs_emit() {
    global $woocommerce;
        if ( is_checkout() ) {
            $current_language = ICL_LANGUAGE_CODE;
            
            if ( function_exists( 'icl_register_string' ) && ICL_LANGUAGE_CODE == $current_language && ICL_LANGUAGE_CODE !== 'en') {
                wp_register_script('jquery.ui.datepicker-'.$current_language.'', plugins_url('woocommerce-checkout-manager-pro/add-on/di18n/jquery.ui.datepicker-'.$current_language.'.js', dirname(__FILE__)));
                wp_enqueue_script('jquery.ui.datepicker-'.$current_language.'');
            }
            
            wp_enqueue_script('jquery-ui-datepicker');
            wp_enqueue_style('jquery-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');


            // http://fgelinas.com/code/timepicker/
            wp_enqueue_script('jquery-ui-timepicker', plugins_url('woocommerce-checkout-manager-pro/add-on/jquery.ui.timepicker.js') );
            wp_enqueue_style('jquery-ui-timepicker', plugins_url('woocommerce-checkout-manager-pro/add-on/jquery.ui.timepicker.css') );
            wp_enqueue_style('jquery-ui-timepicker-min', plugins_url('woocommerce-checkout-manager-pro/add-on/include/ui-1.10.0/ui-lightness/jquery-ui-1.10.0.custom.min.css') );
            
            
            // load the style and script for farbtastic
            wp_enqueue_style( 'farbtastic' );
            wp_enqueue_script( 'farbtastic', site_url('/wp-admin/js/farbtastic.js') );
        }
}




// add dashboard icon
function add_menu_icons_styles(){
        wp_enqueue_style('wooccm-admin-icon', plugins_url('woocommerce-checkout-manager-pro/add-on/css/admin_icon.css') );
}



function wccs_admin_menu() {
        add_menu_page( __('WooCCM', 'woocommerce-checkout-manager-pro'), __('WooCCM', 'woocommerce-checkout-manager-pro'), 'manage_options', __FILE__ , 'wccs__options_page', '', 58);
}


function wccm_admin_menu() { 
        add_submenu_page(__FILE__, 'License', 'License', 'manage_options', 'License_check_slug', 'pg_eptxml'); 
}


function wccs_register_setting() {
        register_setting( 'wccs_options', 'wccs_settings', 'wccs_options_validate' );
} 


if( woocmmatl() ){ 
function wccs__options_page() {
        if ( !current_user_can('manage_options') ) { 
            wp_die( __('You do not have sufficient permissions to access this page.', 'woocommerce-checkout-manager-pro') ); 
        }

 
$upload_dir = wp_upload_dir();
$hidden_field_name = 'mccs_submit_hidden';
$hidden_wccs_reset = "my_new_field_reset";
$options = get_option( 'wccs_settings' );


        if( isset($_POST[ $hidden_wccs_reset ]) && $_POST[ $hidden_wccs_reset ] == 'Y' ) {
            delete_option('wccs_settings');

            $defaults = array(
                'buttons' => array( array ( 
                                    'label' => 'My New Label', 
                                    'cow' => 'myfield1' 
                                    ) 
                                ),
                'check' => array ( 'rq_company1' => true ),
                'checkness' => array(
                                    'position2' => true ,
                                    'wooccm_notification_email' => ''.get_option('admin_email').'',
                                    'wccs_rqo_12' => true,
                                    'payment_method_t' => true,
                                    'shipping_method_t' => true,
                                    'payment_method_d' => __('Payment Method','woocommerce-checkout-manager-pro'),
                                    'shipping_method_d' => __('Shipping Method','woocommerce-checkout-manager-pro'),
                                    'time_stamp_title' => __('Order Time','woocommerce-checkout-manager-pro'),
                                    'rq_company' => true 
                                ),
            
                );

            add_option( 'wccs_settings' , $defaults );
	    echo '<script type="text/javascript">window.location.href="'.$_SERVER['PHP_SELF'].'?page='.plugin_basename( __FILE__ ).'";</script><noscript><meta http-equiv="refresh" content="0;url='.$_SERVER['PHP_SELF'].'?page='.plugin_basename( __FILE__ ).'" /></noscript>';exit; 
		
        }


	    // display error
	    settings_errors();

            // Now display the settings editing screen
            echo '<div class="wrap"></div>';
            
            // header
            echo '<div style="clear:both;">
                    <h2 class="nav-tab-wrapper add_tip_wrap">
                        <span class="wooccm_name_heading">' . __( 'WooCommerce Checkout Manager Pro', 'woocommerce-checkout-manager-pro' ) . '</span>
                            <a class="nav-tab general-tab nav-tab-active">General</a>
                            <a class="nav-tab billing-tab">Billing</a>
                            <a class="nav-tab shipping-tab">Shipping</a>
                            <a class="nav-tab additional-tab">Additional</a>
                            <a class="nav-tab" href="http://www.trottyzone.com/woocommerce-checkout-manager-pro-documentation/">Docs</a>
                            <a class="nav-tab" href="http://www.trottyzone.com/store/">More Plugins</a>
                      </h2>
                    </div>';
            
            
            wp_enqueue_script( 'script_wccs', plugins_url( 'script_wccs.js', __FILE__ ), array( 'jquery' ), '1.2' );
            
            if( !wp_script_is('jquery-ui-sortable', 'queue') ){
                    wp_enqueue_script('jquery-ui-sortable');
            }
?>


            <div class="updated wccs_notice">
                <p><?php _e('This is what PRO looks like! Should you have any questions or concerns find us on'); ?> <a href="http://www.trottyzone.com/forums/forum/wordpress-plugins/"><?php _e('Forum.'); ?></a></p>
            </div>
            
            
            <?php wp_enqueue_style('wooccm-backend-css', plugins_url('woocommerce-checkout-manager-pro/add-on/css/backend_css.css') ); ?>



            <form name="reset_form" class="reset_form" method="post" action="">
                <input type="hidden" name="<?php echo $hidden_wccs_reset; ?>" value="Y">
                <input type="submit" name="submit" id="wccs_reset_submit" class="button-secondary" value="Reset">
            </form>



            <?php require(plugin_dir_path( __FILE__ ).'import.php'); ?>


            <form name="form" method="post" action="options.php" id="frm1">

                <?php settings_fields( 'wccs_options' ); ?>


                <input type="submit" name="Submit" class="wccs_submit_button button-primary" value="<?php _e( 'Save Changes', 'woocommerce-checkout-manager-pro' ); ?>" />


<input type="hidden" name="hidden_shit" id="hidden_shit" value="y" />


                <?php do_action('run_color_innerpicker'); ?>
                
                <div id="general-semi-nav">
                
                <div id="main-nav-left">
                	    <ul>
                    	  <li class="upload_class current"><a title="Upload">Upload</a></li>
                    	  <li class="address_fields_class"><a title="Address Fields">Address Fields</a></li>
                    	  <li class="checkout_notice_class"><a title="Checkout Notice">Checkout Notice</a></li>
                    	  <li class="switches_class"><a title="Switches">Switches</a></li>
                    	  <li class="custom_css_class"><a title="Custom CSS">Custom CSS</a></li>
                	    </ul>
                </div>
                

                <div id="content-nav-right" class="general-vibe">
                
                <?php
                    // file upload options section
                    require(plugin_dir_path( __FILE__ ).'/wccm_file_upload.php'); 
                ?>


                <table class="widefat billing-semi" border="1" style="display:none;">
                
                    <thead>
                        <tr>
                            <th><?php _e('Field Name', 'woocommerce-checkout-manager-pro');  ?></th>
                            <th><?php _e('Remove Field', 'woocommerce-checkout-manager-pro');  ?></th>
                            <th><?php _e('Remove Required', 'woocommerce-checkout-manager-pro');  ?></th>
                            <th><?php _e('Position', 'woocommerce-checkout-manager-pro');  ?></th>
                            <th><?php _e('Clear', 'woocommerce-checkout-manager-pro');  ?></th>
                            <th class="wccs_replace"><?php _e('Replace Label Name', 'woocommerce-checkout-manager-pro');  ?></th>
                            <th class="wccs_replace"><?php _e('Replace Placeholder Name', 'woocommerce-checkout-manager-pro');  ?></th>
                        </tr>
                    </thead>


                    <tbody>
                        <tr>
                            <td><?php _e('First Name', 'woocommerce-checkout-manager-pro');  ?></td>
                            <td><input name="wccs_settings[checkness][wccs_opt_1]" type="checkbox" class="rm" value="1" <?php if (  !empty ($options['checkness']['wccs_opt_1']) ) echo 'checked="checked"'; ?>   /></td>
                            <td><input name="wccs_settings[checkness][wccs_rq_1]" type="checkbox" class="rq" value="1" <?php if (  !empty ($options['checkness']['wccs_rq_1'])) echo "checked='checked'"; ?> /></td>
                            <td>
                                <select name="wccs_settings[checkness][positionb1]" >  <!--Call run() function-->
                                    <option value="" <?php selected( $options[checkness]['positionb21'], '' ); ?>><?php _e('Default','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-first" <?php selected( $options[checkness]['positionb1'], 'form-row-first' ); ?>><?php _e('Left','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-last" <?php selected( $options[checkness]['positionb1'], 'form-row-last' ); ?>><?php _e('Right','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-wide" <?php selected( $options[checkness]['positionb1'], 'form-row-wide' ); ?>><?php _e('Center','woocommerce-checkout-manager-pro'); ?></option>
                                </select>
                            </td>
                            <td><input name="wccs_settings[checkness][wccs_clear1]" type="checkbox" class="rq" value="true" <?php if (  !empty ($options['checkness']['wccs_clear1'])) echo "checked='checked'"; ?> /></td>                            
                            <td><input type="text" name="wccs_settings[replace][label]" value="<?php echo esc_attr( $options['replace']['label'] ); ?>" /></td>
                            <td><input type="text" name="wccs_settings[replace][placeholder]" value="<?php echo $options['replace']['placeholder']; ?>" /></td>
                        </tr>
                    </tbody>


                    <tbody>
                        <tr>
                            <td><?php _e('Phone', 'woocommerce-checkout-manager-pro');  ?></td>
                            <td><input name="wccs_settings[checkness][wccs_opt_10]" type="checkbox" class="rm" value="1" <?php if (  !empty ($options['checkness']['wccs_opt_10'])) echo "checked='checked'"; ?> /></td>
                            <td><input name="wccs_settings[checkness][wccs_rq_10]" type="checkbox" class="rq" value="1" <?php if (  !empty ($options['checkness']['wccs_rq_10'])) echo "checked='checked'"; ?> /></td>
                            <td>
                                <select name="wccs_settings[checkness][positionb3]" >  <!--Call run() function-->
                                    <option value="" <?php selected( $options[checkness]['positionb21'], '' ); ?>><?php _e('Default','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-first" <?php selected( $options[checkness]['positionb3'], 'form-row-first' ); ?>><?php _e('Left','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-last" <?php selected( $options[checkness]['positionb3'], 'form-row-last' ); ?>><?php _e('Right','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-wide" <?php selected( $options[checkness]['positionb3'], 'form-row-wide' ); ?>><?php _e('Center','woocommerce-checkout-manager-pro'); ?></option>
                                </select>
                            </td>
                            <td><input name="wccs_settings[checkness][wccs_clear3]" type="checkbox" class="rq" value="true" <?php if (  !empty ($options['checkness']['wccs_clear3'])) echo "checked='checked'"; ?> /></td>
                            <td><input type="text" name="wccs_settings[replace][label3]" value="<?php echo esc_attr( $options['replace']['label3'] ); ?>" /></td>
                            <td><input type="text" name="wccs_settings[replace][placeholder3]" value="<?php echo $options['replace']['placeholder3']; ?>" /></td>
                        </tr>
                    </tbody>

                    <tbody>
                        <tr>
                            <td><?php _e('Email', 'woocommerce-checkout-manager-pro');  ?></td>
                            <td><input name="wccs_settings[checkness][wccs_opt_11]" type="checkbox" class="rm" value="1" <?php if (  !empty ($options['checkness']['wccs_opt_11'])) echo "checked='checked'"; ?> /></td>
                            <td><input name="wccs_settings[checkness][wccs_rq_11]" type="checkbox" class="rq" value="1" <?php if (  !empty ($options['checkness']['wccs_rq_11'])) echo "checked='checked'"; ?> /></td>
                            <td>
                                <select name="wccs_settings[checkness][positionb4]" >  <!--Call run() function-->
                                    <option value="" <?php selected( $options[checkness]['positionb21'], '' ); ?>><?php _e('Default','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-first" <?php selected( $options[checkness]['positionb4'], 'form-row-first' ); ?>><?php _e('Left','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-last" <?php selected( $options[checkness]['positionb4'], 'form-row-last' ); ?>><?php _e('Right','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-wide" <?php selected( $options[checkness]['positionb4'], 'form-row-wide' ); ?>><?php _e('Center','woocommerce-checkout-manager-pro'); ?></option>
                                </select>
                            </td>
                            <td><input name="wccs_settings[checkness][wccs_clear4]" type="checkbox" class="rq" value="true" <?php if (  !empty ($options['checkness']['wccs_clear4'])) echo "checked='checked'"; ?> /></td>
                            <td><input type="text" name="wccs_settings[replace][label4]" value="<?php echo esc_attr( $options['replace']['label4'] ); ?>" /></td>
                            <td><input type="text" name="wccs_settings[replace][placeholder4]" value="<?php echo $options['replace']['placeholder4']; ?>" /></td>
                        </tr>
                    </tbody>


                    <tbody>
                        <tr>
                            <td><?php _e('Company', 'woocommerce-checkout-manager-pro');  ?></td>
                            <td><input name="wccs_settings[checkness][wccs_opt_3]" type="checkbox" class="rm" value="1" <?php if (  !empty ($options['checkness']['wccs_opt_3'])) echo "checked='checked'"; ?> /></td>
                            <td><input name="wccs_settings[checkness][rq_company]" type="checkbox" class="rq" value="1" <?php if (  !empty ($options['checkness']['rq_company'])) echo "checked='checked'"; ?> /></td>
                            <td>
                                <select name="wccs_settings[checkness][positionb5]" >  <!--Call run() function-->
                                    <option value="" <?php selected( $options[checkness]['positionb21'], '' ); ?>><?php _e('Default','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-first" <?php selected( $options[checkness]['positionb5'], 'form-row-first' ); ?>><?php _e('Left','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-last" <?php selected( $options[checkness]['positionb5'], 'form-row-last' ); ?>><?php _e('Right','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-wide" <?php selected( $options[checkness]['positionb5'], 'form-row-wide' ); ?>><?php _e('Center','woocommerce-checkout-manager-pro'); ?></option>
                                </select>
                            </td>
                            <td><input name="wccs_settings[checkness][wccs_clear5]" type="checkbox" class="rq" value="true" <?php if (  !empty ($options['checkness']['wccs_clear5'])) echo "checked='checked'"; ?> /></td>
                            <td><input type="text" name="wccs_settings[replace][label5]" value="<?php echo esc_attr( $options['replace']['label5'] ); ?>" /></td>
                            <td><input type="text" name="wccs_settings[replace][placeholder5]" value="<?php echo $options['replace']['placeholder5']; ?>" /></td>
                        </tr>
                    </tbody>



                    <tbody>
                        <tr>
                            <td><?php _e('Order Notes', 'woocommerce-checkout-manager-pro');  ?></td>
                            <td><input name="wccs_settings[checkness][wccs_opt_12]" type="checkbox" class="rm" value="1" <?php if (  !empty ($options['checkness']['wccs_opt_12'])) echo "checked='checked'"; ?> /></td>
                            <td><input name="wccs_settings[checkness][wccs_rqo_12]" type="checkbox" class="rq" value="1" <?php if (  !empty ($options['checkness']['wccs_rqo_12'])) echo "checked='checked'"; ?> /></td>
                            <td>
                                <select name="wccs_settings[checkness][positionb6]" >  <!--Call run() function-->
                                    <option value="" <?php selected( $options[checkness]['positionb21'], '' ); ?>><?php _e('Default','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-first" <?php selected( $options[checkness]['positionb6'], 'form-row-first' ); ?>><?php _e('Left','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-last" <?php selected( $options[checkness]['positionb6'], 'form-row-last' ); ?>><?php _e('Right','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-wide" <?php selected( $options[checkness]['positionb6'], 'form-row-wide' ); ?>><?php _e('Center','woocommerce-checkout-manager-pro'); ?></option>
                                </select>
                            </td>
                            <td><input name="wccs_settings[checkness][wccs_clear6]" type="checkbox" class="rq" value="true" <?php if (  !empty ($options['checkness']['wccs_clear6'])) echo "checked='checked'"; ?> /></td>
                            <td><input type="text" name="wccs_settings[replace][label11]" value="<?php echo esc_attr( $options['replace']['label11'] ); ?>" /></td>
                            <td><input type="text" name="wccs_settings[replace][placeholder11]" value="<?php echo $options['replace']['placeholder11']; ?>" /></td>
                        </tr>
                    </tbody>


                    <tbody>
                        <tr>
                            <input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">
                            <td><?php _e('Country', 'woocommerce-checkout-manager-pro');  ?></td>
                            <td><input name="wccs_settings[checkness][wccs_opt_8]" type="checkbox" class="rm" value="1" <?php if (  !empty ($options['checkness']['wccs_opt_8'])) echo "checked='checked'"; ?> /></td>
                            <td><input name="wccs_settings[checkness][wccs_rq_8]" type="checkbox" class="rq" value="1" <?php if (  !empty ($options['checkness']['wccs_rq_8'])) echo "checked='checked'"; ?> /></td>
                            <td>
                                <select name="wccs_settings[checkness][positionb7]" >  <!--Call run() function-->
                                    <option value="" <?php selected( $options[checkness]['positionb21'], '' ); ?>><?php _e('Default','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-first" <?php selected( $options[checkness]['positionb7'], 'form-row-first' ); ?>><?php _e('Left','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-last" <?php selected( $options[checkness]['positionb7'], 'form-row-last' ); ?>><?php _e('Right','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-wide" <?php selected( $options[checkness]['positionb7'], 'form-row-wide' ); ?>><?php _e('Center','woocommerce-checkout-manager-pro'); ?></option>
                                </select>
                            </td>
                            <td><input name="wccs_settings[checkness][wccs_clear7]" type="checkbox" class="rq" value="true" <?php if (  !empty ($options['checkness']['wccs_clear7'])) echo "checked='checked'"; ?> /></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>


                    <tbody>
                        <tr>
                            <td><?php _e('Address 1', 'woocommerce-checkout-manager-pro');  ?></td>
                            <td><input name="wccs_settings[checkness][wccs_opt_4]" type="checkbox" class="rm" value="1" <?php if (  !empty ($options['checkness']['wccs_opt_4'])) echo "checked='checked'"; ?></td>
                            <td><input name="wccs_settings[checkness][wccs_rq_4]" type="checkbox" class="rq" value="1" <?php if (  !empty ($options['checkness']['wccs_rq_4'])) echo "checked='checked'"; ?></td>
                            <td>
                                <select name="wccs_settings[checkness][positionb8]" >  <!--Call run() function-->
                                    <option value="" <?php selected( $options[checkness]['positionb21'], '' ); ?>><?php _e('Default','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-first" <?php selected( $options[checkness]['positionb8'], 'form-row-first' ); ?>><?php _e('Left','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-last" <?php selected( $options[checkness]['positionb8'], 'form-row-last' ); ?>><?php _e('Right','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-wide" <?php selected( $options[checkness]['positionb8'], 'form-row-wide' ); ?>><?php _e('Center','woocommerce-checkout-manager-pro'); ?></option>
                                </select>
                            </td>
                            <td><input name="wccs_settings[checkness][wccs_clear8]" type="checkbox" class="rq" value="true" <?php if (  !empty ($options['checkness']['wccs_clear8'])) echo "checked='checked'"; ?> /></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                    
                    
                    <tbody>
                        <tr>
                            <td><?php _e('Address 2', 'woocommerce-checkout-manager-pro');  ?></td>
                            <td><input name="wccs_settings[checkness][wccs_opt_5]" type="checkbox" class="rm" value="1" <?php if (  !empty ($options['checkness']['wccs_opt_5'])) echo "checked='checked'"; ?> /></td>
                            <td><input name="wccs_settings[checkness][wccs_rq_5]" type="checkbox" class="rq" value="1" <?php if (  !empty ($options['checkness']['wccs_rq_5'])) echo "checked='checked'"; ?> /></td>
                            <td>
                                <select name="wccs_settings[checkness][positionb9]" >  <!--Call run() function-->
                                    <option value="" <?php selected( $options[checkness]['positionb21'], '' ); ?>><?php _e('Default','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-first" <?php selected( $options[checkness]['positionb9'], 'form-row-first' ); ?>><?php _e('Left','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-last" <?php selected( $options[checkness]['positionb9'], 'form-row-last' ); ?>><?php _e('Right','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-wide" <?php selected( $options[checkness]['positionb9'], 'form-row-wide' ); ?>><?php _e('Center','woocommerce-checkout-manager-pro'); ?></option>
                                </select>
                            </td>
                            <td><input name="wccs_settings[checkness][wccs_clear9]" type="checkbox" class="rq" value="true" <?php if (  !empty ($options['checkness']['wccs_clear9'])) echo "checked='checked'"; ?> /></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                    
                    
                    <tbody>
                        <tr>
                            <td><?php _e('City', 'woocommerce-checkout-manager-pro');  ?></td>
                            <td><input name="wccs_settings[checkness][wccs_opt_6]" type="checkbox" class="rm" value="1" <?php if (  !empty ($options['checkness']['wccs_opt_6'])) echo "checked='checked'"; ?> /></td>
                            <td><input name="wccs_settings[checkness][wccs_rq_6]" type="checkbox" class="rq" value="1" <?php if (  !empty ($options['checkness']['wccs_rq_6'])) echo "checked='checked'"; ?> /></td>
                            <td>
                                <select name="wccs_settings[checkness][positionb10]" >  <!--Call run() function-->
                                    <option value="" <?php selected( $options[checkness]['positionb21'], '' ); ?>><?php _e('Default','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-first" <?php selected( $options[checkness]['positionb10'], 'form-row-first' ); ?>><?php _e('Left','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-last" <?php selected( $options[checkness]['positionb10'], 'form-row-last' ); ?>><?php _e('Right','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-wide" <?php selected( $options[checkness]['positionb10'], 'form-row-wide' ); ?>><?php _e('Center','woocommerce-checkout-manager-pro'); ?></option>
                                </select>
                            </td>
                            <td><input name="wccs_settings[checkness][wccs_clear10]" type="checkbox" class="rq" value="true" <?php if (  !empty ($options['checkness']['wccs_clear10'])) echo "checked='checked'"; ?> /></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                    
                    
                    <tbody>
                        <tr>
                            <input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">
                            <td><?php _e('Postal Code', 'woocommerce-checkout-manager-pro');  ?></td>
                            <td><input name="wccs_settings[checkness][wccs_opt_7]" type="checkbox" class="rm" value="1" <?php if (  !empty ($options['checkness']['wccs_opt_7'])) echo "checked='checked'"; ?> /></td>
                            <td><input name="wccs_settings[checkness][wccs_rq_7]" type="checkbox" class="rq" value="1" <?php if (  !empty ($options['checkness']['wccs_rq_7'])) echo "checked='checked'"; ?> /></td>
                            <td>
                                <select name="wccs_settings[checkness][positionb11]" >  <!--Call run() function-->
                                    <option value="" <?php selected( $options[checkness]['positionb21'], '' ); ?>><?php _e('Default','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-first" <?php selected( $options[checkness]['positionb11'], 'form-row-first' ); ?>><?php _e('Left','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-last" <?php selected( $options[checkness]['positionb11'], 'form-row-last' ); ?>><?php _e('Right','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-wide" <?php selected( $options[checkness]['positionb11'], 'form-row-wide' ); ?>><?php _e('Center','woocommerce-checkout-manager-pro'); ?></option>
                                </select>
                            </td>
                            <td><input name="wccs_settings[checkness][wccs_clear11]" type="checkbox" class="rq" value="true" <?php if (  !empty ($options['checkness']['wccs_clear11'])) echo "checked='checked'"; ?> /></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                    
                    
                    
                    <tbody>
                        <tr>
                            <td><?php _e('State', 'woocommerce-checkout-manager-pro');  ?></td>
                            <td><input name="wccs_settings[checkness][wccs_opt_9]" type="checkbox" class="rm" value="1" <?php if (  !empty ($options['checkness']['wccs_opt_9'])) echo "checked='checked'"; ?> /></td>
                            <td><input name="wccs_settings[checkness][wccs_rq_9]" type="checkbox" class="rq" value="1" <?php if (  !empty ($options['checkness']['wccs_rq_9'])) echo "checked='checked'"; ?> /></td>
                            <td>
                                <select name="wccs_settings[checkness][positionb12]" >  <!--Call run() function-->
                                    <option value="" <?php selected( $options[checkness]['positionb21'], '' ); ?>><?php _e('Default','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-first" <?php selected( $options[checkness]['positionb12'], 'form-row-first' ); ?>><?php _e('Left','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-last" <?php selected( $options[checkness]['positionb12'], 'form-row-last' ); ?>><?php _e('Right','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-wide" <?php selected( $options[checkness]['positionb12'], 'form-row-wide' ); ?>><?php _e('Center','woocommerce-checkout-manager-pro'); ?></option>
                                </select>
                            </td>
                            <td><input name="wccs_settings[checkness][wccs_clear12]" type="checkbox" class="rq" value="true" <?php if (  !empty ($options['checkness']['wccs_clear12'])) echo "checked='checked'"; ?> /></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                    
            </table>
                    
                    
                    
            <table class="widefat shipping-semi" border="1" style="display:none;">
                    
                    <thead>
                        <tr>
                            <th><?php _e('Field Name', 'woocommerce-checkout-manager-pro');  ?></th>
                            <th><?php _e('Remove Field', 'woocommerce-checkout-manager-pro');  ?></th>
                            <th><?php _e('Remove Required', 'woocommerce-checkout-manager-pro');  ?></th>
                            <th><?php _e('Position', 'woocommerce-checkout-manager-pro');  ?></th>
                            <th><?php _e('Clear', 'woocommerce-checkout-manager-pro');  ?></th>
                            <th class="wccs_replace"><?php _e('Replace Label Name', 'woocommerce-checkout-manager-pro');  ?></th>
                            <th class="wccs_replace"><?php _e('Replace Placeholder Name', 'woocommerce-checkout-manager-pro');  ?></th>
                        </tr>
                    </thead>
                    
                    
                    <tbody>
                        <tr>
                            <td><?php _e('First Name', 'woocommerce-checkout-manager-pro');  ?></td>
                            <td><input name="wccs_settings[check][wccs_opt_1_s]" type="checkbox" class="rm_s" value="1" <?php if (  !empty ($options['check']['wccs_opt_1_s']) ) echo 'checked="checked"'; ?>   /></td>
                            <td><input name="wccs_settings[check][wccs_rq_1_s]" type="checkbox" class="rq_s" value="1" <?php if (  !empty ($options['check']['wccs_rq_1_s'])) echo "checked='checked'"; ?> /></td>
                            <td>
                                <select name="wccs_settings[checkness][positionb13]" >  <!--Call run() function-->
                                    <option value="" <?php selected( $options[checkness]['positionb21'], '' ); ?>><?php _e('Default','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-first" <?php selected( $options[checkness]['positionb13'], 'form-row-first' ); ?>><?php _e('Left','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-last" <?php selected( $options[checkness]['positionb13'], 'form-row-last' ); ?>><?php _e('Right','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-wide" <?php selected( $options[checkness]['positionb13'], 'form-row-wide' ); ?>><?php _e('Center','woocommerce-checkout-manager-pro'); ?></option>
                                </select>
                            </td>
                            <td><input name="wccs_settings[checkness][wccs_clear13]" type="checkbox" class="rq" value="true" <?php if (  !empty ($options['checkness']['wccs_clear13'])) echo "checked='checked'"; ?> /></td>
                            <td><input type="text" name="wccs_settings[replace][label_s]" value="<?php echo esc_attr( $options['replace']['label_s'] ); ?>" /></td>
                            <td><input type="text" name="wccs_settings[replace][placeholder_s]" value="<?php echo $options['replace']['placeholder_s']; ?>" /></td>
                        </tr>
                    </tbody>
                    
                    
                    <tbody>
                        <tr>
                            <td><?php _e('Last Name', 'woocommerce-checkout-manager-pro');  ?></td>
                            <td><input name="wccs_settings[check][wccs_opt_2_s]" type="checkbox" class="rm_s" value="1" <?php if (  !empty ($options['check']['wccs_opt_2_s'])) echo "checked='checked'"; ?> /></td>
                            <td><input name="wccs_settings[check][wccs_rq_2_s]" type="checkbox" class="rq_s" value="1" <?php if (  !empty ($options['check']['wccs_rq_2_s'])) echo "checked='checked'"; ?> /></td>
                            <td>
                                <select name="wccs_settings[checkness][positionb14]" >  <!--Call run() function-->
                                    <option value="" <?php selected( $options[checkness]['positionb21'], '' ); ?>><?php _e('Default','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-first" <?php selected( $options[checkness]['positionb14'], 'form-row-first' ); ?>><?php _e('Left','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-last" <?php selected( $options[checkness]['positionb14'], 'form-row-last' ); ?>><?php _e('Right','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-wide" <?php selected( $options[checkness]['positionb14'], 'form-row-wide' ); ?>><?php _e('Center','woocommerce-checkout-manager-pro'); ?></option>
                                </select>
                            </td>
                            <td><input name="wccs_settings[checkness][wccs_clear14]" type="checkbox" class="rq" value="true" <?php if (  !empty ($options['checkness']['wccs_clear14'])) echo "checked='checked'"; ?> /></td>
                            <td><input type="text" name="wccs_settings[replace][label_s1]" value="<?php echo esc_attr( $options['replace']['label_s1'] ); ?>" /></td>
                            <td><input type="text" name="wccs_settings[replace][placeholder_s1]" value="<?php echo $options['replace']['placeholder_s1']; ?>" /></td>
                        </tr>
                    </tbody>
                    
                    
                    <tbody>
                        <tr>
                            <td><?php _e('Company', 'woocommerce-checkout-manager-pro');  ?></td>
                            <td><input name="wccs_settings[check][wccs_opt_3_s]" type="checkbox" class="rm_s" value="1" <?php if (  !empty ($options['check']['wccs_opt_3_s'])) echo "checked='checked'"; ?> /></td>
                            <td><input name="wccs_settings[check][rq_company1]" type="checkbox" class="rq_s" value="1" <?php if (  !empty ($options['check']['rq_company1'])) echo "checked='checked'"; ?> /></td>
                            <td>
                                <select name="wccs_settings[checkness][positionb15]" >  <!--Call run() function-->
                                    <option value="" <?php selected( $options[checkness]['positionb21'], '' ); ?>><?php _e('Default','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-first" <?php selected( $options[checkness]['positionb15'], 'form-row-first' ); ?>><?php _e('Left','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-last" <?php selected( $options[checkness]['positionb15'], 'form-row-last' ); ?>><?php _e('Right','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-wide" <?php selected( $options[checkness]['positionb15'], 'form-row-wide' ); ?>><?php _e('Center','woocommerce-checkout-manager-pro'); ?></option>
                                </select>
                            </td>
                            <td><input name="wccs_settings[checkness][wccs_clear15]" type="checkbox" class="rq" value="true" <?php if (  !empty ($options['checkness']['wccs_clear15'])) echo "checked='checked'"; ?> /></td>
                            <td><input type="text" name="wccs_settings[replace][label_s2]" value="<?php echo esc_attr( $options['replace']['label_s2'] ); ?>" /></td>
                            <td><input type="text" name="wccs_settings[replace][placeholder_s2]" value="<?php echo $options['replace']['placeholder_s2']; ?>" /></td>
                        </tr>
                    </tbody>
                    
                    
                    <tbody>
                        <tr>
                            <td><?php _e('Country', 'woocommerce-checkout-manager-pro');  ?></td>
                            <td><input name="wccs_settings[check][wccs_opt_8_s]" type="checkbox" class="rm_s" value="1" <?php if (  !empty ($options['check']['wccs_opt_8_s'])) echo "checked='checked'"; ?></td>
                            <td><input name="wccs_settings[check][wccs_rq_8_s]" type="checkbox" class="rq_s" value="1" <?php if (  !empty ($options['check']['wccs_rq_8_s'])) echo "checked='checked'"; ?> /></td>
                            <td>
                                <select name="wccs_settings[checkness][positionb16]" >  <!--Call run() function-->
                                    <option value="" <?php selected( $options[checkness]['positionb21'], '' ); ?>><?php _e('Default','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-first" <?php selected( $options[checkness]['positionb16'], 'form-row-first' ); ?>><?php _e('Left','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-last" <?php selected( $options[checkness]['positionb16'], 'form-row-last' ); ?>><?php _e('Right','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-wide" <?php selected( $options[checkness]['positionb16'], 'form-row-wide' ); ?>><?php _e('Center','woocommerce-checkout-manager-pro'); ?></option>
                                </select>
                            </td>
                            <td><input name="wccs_settings[checkness][wccs_clear16]" type="checkbox" class="rq" value="true" <?php if (  !empty ($options['checkness']['wccs_clear16'])) echo "checked='checked'"; ?> /></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                    
                    
                    <tbody>
                        <tr>
                            <td><?php _e('Address 1', 'woocommerce-checkout-manager-pro');  ?></td>
                            <td><input name="wccs_settings[check][wccs_opt_4_s]" type="checkbox" class="rm_s" value="1" <?php if (  !empty ($options['check']['wccs_opt_4_s'])) echo "checked='checked'"; ?></td>
                            <td><input name="wccs_settings[check][wccs_rq_4_s]" type="checkbox" class="rq_s" value="1" <?php if (  !empty ($options['check']['wccs_rq_4_s'])) echo "checked='checked'"; ?> /></td>
                            <td>
                                <select name="wccs_settings[checkness][positionb17]" >  <!--Call run() function-->
                                    <option value="" <?php selected( $options[checkness]['positionb21'], '' ); ?>><?php _e('Default','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-first" <?php selected( $options[checkness]['positionb17'], 'form-row-first' ); ?>><?php _e('Left','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-last" <?php selected( $options[checkness]['positionb17'], 'form-row-last' ); ?>><?php _e('Right','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-wide" <?php selected( $options[checkness]['positionb17'], 'form-row-wide' ); ?>><?php _e('Center','woocommerce-checkout-manager-pro'); ?></option>
                                </select>
                            </td>
                            <td><input name="wccs_settings[checkness][wccs_clear17]" type="checkbox" class="rq" value="true" <?php if (  !empty ($options['checkness']['wccs_clear17'])) echo "checked='checked'"; ?> /></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                    
                    
                    <tbody>
                        <tr>
                            <td><?php _e('Address 2', 'woocommerce-checkout-manager-pro');  ?></td>
                            <td><input name="wccs_settings[check][wccs_opt_5_s]" type="checkbox" class="rm_s" value="1" <?php if (  !empty ($options['check']['wccs_opt_5_s'])) echo "checked='checked'"; ?> /></td>
                            <td><input name="wccs_settings[check][wccs_rq_5_s]" type="checkbox" class="rq_s" value="1" <?php if (  !empty ($options['check']['wccs_rq_5_s'])) echo "checked='checked'"; ?> /></td>
                            <td>
                                <select name="wccs_settings[checkness][positionb18]" >  <!--Call run() function-->
                                    <option value="" <?php selected( $options[checkness]['positionb21'], '' ); ?>><?php _e('Default','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-first" <?php selected( $options[checkness]['positionb18'], 'form-row-first' ); ?>><?php _e('Left','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-last" <?php selected( $options[checkness]['positionb18'], 'form-row-last' ); ?>><?php _e('Right','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-wide" <?php selected( $options[checkness]['positionb18'], 'form-row-wide' ); ?>><?php _e('Center','woocommerce-checkout-manager-pro'); ?></option>
                                </select>
                            </td>
                            <td><input name="wccs_settings[checkness][wccs_clear18]" type="checkbox" class="rq" value="true" <?php if (  !empty ($options['checkness']['wccs_clear18'])) echo "checked='checked'"; ?> /></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                    
                    
                    <tbody>
                        <tr>
                            <td><?php _e('City', 'woocommerce-checkout-manager-pro');  ?></td>
                            <td><input name="wccs_settings[check][wccs_opt_6_s]" type="checkbox" class="rm_s" value="1" <?php if (  !empty ($options['check']['wccs_opt_6_s'])) echo "checked='checked'"; ?> /></td>
                            <td><input name="wccs_settings[check][wccs_rq_6_s]" type="checkbox" class="rq_s" value="1" <?php if (  !empty ($options['check']['wccs_rq_6_s'])) echo "checked='checked'"; ?> /></td>
                            <td>
                                <select name="wccs_settings[checkness][positionb19]" >  <!--Call run() function-->
                                    <option value="" <?php selected( $options[checkness]['positionb21'], '' ); ?>><?php _e('Default','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-first" <?php selected( $options[checkness]['positionb19'], 'form-row-first' ); ?>><?php _e('Left','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-last" <?php selected( $options[checkness]['positionb19'], 'form-row-last' ); ?>><?php _e('Right','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-wide" <?php selected( $options[checkness]['positionb19'], 'form-row-wide' ); ?>><?php _e('Center','woocommerce-checkout-manager-pro'); ?></option>
                                </select>
                            </td>
                            <td><input name="wccs_settings[checkness][wccs_clear19]" type="checkbox" class="rq" value="true" <?php if (  !empty ($options['checkness']['wccs_clear19'])) echo "checked='checked'"; ?> /></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                    
                    
                    <tbody>
                        <tr>
                            <td><?php _e('Postal Code', 'woocommerce-checkout-manager-pro');  ?></td>
                            <td><input name="wccs_settings[check][wccs_opt_7_s]" type="checkbox" class="rm_s" value="1" <?php if (  !empty ($options['check']['wccs_opt_7_s'])) echo "checked='checked'"; ?> /></td>
                            <td><input name="wccs_settings[check][wccs_rq_7_s]" type="checkbox" class="rq_s" value="1" <?php if (  !empty ($options['check']['wccs_rq_7_s'])) echo "checked='checked'"; ?> /></td>
                            <td>
                                <select name="wccs_settings[checkness][positionb20]" >  <!--Call run() function-->
                                    <option value="" <?php selected( $options[checkness]['positionb21'], '' ); ?>><?php _e('Default','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-first" <?php selected( $options[checkness]['positionb20'], 'form-row-first' ); ?>><?php _e('Left','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-last" <?php selected( $options[checkness]['positionb20'], 'form-row-last' ); ?>><?php _e('Right','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-wide" <?php selected( $options[checkness]['positionb20'], 'form-row-wide' ); ?>><?php _e('Center','woocommerce-checkout-manager-pro'); ?></option>
                                </select>
                            </td>
                            <td><input name="wccs_settings[checkness][wccs_clear20]" type="checkbox" class="rq" value="true" <?php if (  !empty ($options['checkness']['wccs_clear20'])) echo "checked='checked'"; ?> /></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                    
                    
                    <tbody>
                        <tr>
                            <td><?php _e('State', 'woocommerce-checkout-manager-pro');  ?></td>
                            <td><input name="wccs_settings[check][wccs_opt_9_s]" type="checkbox" class="rm_s" value="1" <?php if (  !empty ($options['check']['wccs_opt_9_s'])) echo "checked='checked'"; ?> /></td>
                            <td><input name="wccs_settings[check][wccs_rq_9_s]" type="checkbox" class="rq_s" value="1" <?php if (  !empty ($options['check']['wccs_rq_9_s'])) echo "checked='checked'"; ?> /></td>
                            <td>
                                <select name="wccs_settings[checkness][positionb21]" >  <!--Call run() function-->
                                    <option value="" <?php selected( $options[checkness]['positionb21'], '' ); ?>><?php _e('Default','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-first" <?php selected( $options[checkness]['positionb21'], 'form-row-first' ); ?>><?php _e('Left','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-last" <?php selected( $options[checkness]['positionb21'], 'form-row-last' ); ?>><?php _e('Right','woocommerce-checkout-manager-pro'); ?></option>
                                    <option value="form-row-wide" <?php selected( $options[checkness]['positionb21'], 'form-row-wide' ); ?>><?php _e('Center','woocommerce-checkout-manager-pro'); ?></option>
                                </select>
                            </td>
                            <td><input name="wccs_settings[checkness][wccs_clear21]" type="checkbox" class="rq" value="true" <?php if (  !empty ($options['checkness']['wccs_clear21'])) echo "checked='checked'"; ?> /></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                    
                    
            </table>
                    
                    
                    
            <div class="widefat general-semi address_fields" border="1" style="display:none;">
                    
                    <div class="section">
                        <h3 class="heading"><?php _e('Disable Address fields: ', 'woocommerce-checkout-manager-pro');  ?></h3>
                    
                        <div class="option">
                            <input type="text" name="wccs_settings[option][productssave]" style="width: 100%;" value="<?php echo $options['option']['productssave']; ?>" />
                            <h3 class="heading address"><div class="info-of"><?php _e('To get product number, goto the listing of WooCoommerce Products then hover over each product and you will see ID. Example', 'woocommerce-checkout-manager-pro'); ?> "ID: 3651"</div></h3>
                        </div>
                    </div>
                    
            </div>
                    
                    
            <div class="widefat general-semi custom_css" border="1" style="display:none;">
                    
                    <div class="section">
                        <h3 class="heading"><?php _e('Custom CSS','woocommerce-checkout-manager-pro'); ?></strong></h3>
                    
                        <h3 class="heading checkbox">
                        
                            <div class="option">
                                <div class="info-of">
                                    <?php _e('CSS language stands for Cascading Style Sheets which is used to style html content. You can change the fonts size, colours, margins of content, which lines to show or input, adjust height, width, background images etc.','woocommerce-checkout-manager-pro'); ?>
                                    <?php _e('Get help in our', 'woocommerce-checkout-manager-pro');  ?> <a href="http://www.trottyzone.com/forums/forum/wordpress-plugins/"><?php _e('Support Forum', 'woocommerce-checkout-manager-pro');  ?></a>.
                                </div>
                            </div>
                        </h3>
                    
                        <textarea type="text" name="wccs_settings[option][custom_css_w]" style="height:200px;width: 100%;"><?php echo $options['option']['custom_css_w']; ?></textarea>
                    </div>
            </div>
                    
                    
                    
                   
                   
            <div class="widefat general-semi checkout_notices" border="1" style="display:none;" >
                    
                    <div class="section">
                        <h3 class="heading"><?php _e('Position for notification one', 'woocommerce-checkout-manager-pro');  ?></h3>
                    
                        <h3 class="heading checkbox">
                            <div class="option">
                                <input style="float:left;" name="wccs_settings[notice][checkbox1]" type="checkbox" value="true" <?php if (  !empty ($options['notice']['checkbox1'])) echo "checked='checked'"; ?> />
                                <div class="info-of"><?php _e('Before Customer Address Fields', 'woocommerce-checkout-manager-pro');  ?></div>
                            </div>
                        </h3>
                    
                    
                        <h3 class="heading checkbox">
                            <div class="option">
                                 <input style="float:left;" name="wccs_settings[notice][checkbox2]" type="checkbox" value="true" <?php if (  !empty ($options['notice']['checkbox2'])) echo "checked='checked'"; ?> />
                                 <div class="info-of"><?php _e('Before Order Summary', 'woocommerce-checkout-manager-pro');  ?></div>
                            </div>
                        </h3>
                    
                        <div class="option">
                            <div class="info-of"><?php _e('Notification text area: You can use class', 'woocommerce-checkout-manager-pro');  ?> "woocommerce-info" <?php _e('for the same design as WooCommerce Coupon.', 'woocommerce-checkout-manager-pro');  ?></div>
                            <textarea style="width:100%;height:150px;" name="wccs_settings[notice][text1]" type="textarea"><?php echo esc_attr( $options['notice']['text1'] ); ?></textarea>
                        </div>
                        
                    </div>
                    
                    
                    
                    <div class="section">
                        <h3 class="heading"><?php _e('Position for notification two', 'woocommerce-checkout-manager-pro');  ?></h3>
                        
                        <h3 class="heading checkbox">
                            <div class="option">
                                <input style="float:left;" name="wccs_settings[notice][checkbox3]" type="checkbox" value="true" <?php if (  !empty ($options['notice']['checkbox3'])) echo "checked='checked'"; ?> /></th>
                                <div class="info-of"><?php _e('Before Customer Address Fields', 'woocommerce-checkout-manager-pro');  ?></div>
                            </div>
                        </h3>
                        
                        <h3 class="heading checkbox">
                            <div class="option">
                                <input style="float:left;" name="wccs_settings[notice][checkbox4]" type="checkbox" value="true" <?php if (  !empty ($options['notice']['checkbox4'])) echo "checked='checked'"; ?> /></th>
                                <div class="info-of"><?php _e('Before Order Summary', 'woocommerce-checkout-manager-pro');  ?></div>
                            </div>
                        </h3>
                        
                        <div class="option">
                            <div class="info-of"><?php _e('Notification text area: You can use class', 'woocommerce-checkout-manager-pro');  ?> "woocommerce-info" <?php _e('for the same design as WooCommerce Coupon.', 'woocommerce-checkout-manager-pro');  ?></div>
                            <textarea style="width:100%;height:150px;" name="wccs_settings[notice][text2]" type="textarea"><?php echo esc_attr( $options['notice']['text2'] ); ?></textarea>
                        </div>
                    </div>    
            </div>
                    
                    
                    
                    
                    
                    
            <div class="widefat general-semi switches" border="1" style="display:none;">
                    
                    
                    <div class="section">
                        <h3 class="heading checkbox">  
                            <div class="option">
                                <input name="wccs_settings[checkness][additional_info]" type="checkbox" value="true" <?php if (  !empty ($options['checkness']['additional_info'])) echo "checked='checked'"; ?> />
                                <div class="info-of"><?php _e('Remove Additional Information title', 'woocommerce-checkout-manager-pro');  ?></div>
                            </div>
                        </h3>
                    </div>
                    
                    
                    
                    <div class="section">
                        <h3 class="heading checkbox">
                            <div class="option">
                                <input name="wccs_settings[checkness][admin_translation]" type="checkbox" value="true" <?php if (  !empty ($options['checkness']['admin_translation'])) echo "checked='checked'"; ?> />
                                <div class="info-of"><?php _e('Translate WooCCM Options Panel', 'woocommerce-checkout-manager-pro');  ?></div>
                            </div>
                        </h3>
                    </div>
                    
                    
                    
                    <div class="section">
                        <h3 class="heading checkbox">
                            <div class="option">
                                <input name="wccs_settings[checkness][auto_create_wccm_account]" type="checkbox" value="true" <?php if (  !empty ($options['checkness']['auto_create_wccm_account'])) echo "checked='checked'"; ?> />
                                <div class="info-of"><?php _e('Auto Create User account', 'woocommerce-checkout-manager-pro');  ?></div>
                            </div>
                        </h3>
                    </div>
                    
                    
                    <div class="section">
                        <h3 class="heading checkbox">
                            <div class="option">
                                <input name="wccs_settings[checkness][retainval]" type="checkbox" value="true" <?php if (  !empty ($options['checkness']['retainval'])) echo "checked='checked'"; ?> />
                                <div class="info-of"><?php _e('Retain Fields Information', 'woocommerce-checkout-manager-pro');  ?></div>
                            </div>
                        </h3>
                    </div>
                    
                    
                    <div class="section">
                        <h3 class="heading checkbox">
                            <div class="option">
                                <input name="wccs_settings[checkness][beforeshipping]" type="checkbox" value="true" <?php if (  !empty ($options['checkness']['beforeshipping'])) echo "checked='checked'"; ?> />
                                <div class="info-of"><?php _e('Before Shipping Form', 'woocommerce-checkout-manager-pro');  ?></div>
                            </div>
                        </h3>
                    </div>
                    
                    
                    <div class="section">
                        <h3 class="heading checkbox">
                            <div class="option">
                                <input name="wccs_settings[checkness][position1]" type="checkbox" value="true" <?php if (  !empty ($options['checkness']['position1'])) echo "checked='checked'"; ?> />
                                <div class="info-of"><?php _e('After Shipping Form', 'woocommerce-checkout-manager-pro');  ?></div>
                            </div>
                        </h3>
                    </div>
                    
                    
                    <div class="section">
                        <h3 class="heading checkbox">
                            <div class="option">
                                <input name="wccs_settings[checkness][beforebilling]" type="checkbox" value="true" <?php if (  !empty ($options['checkness']['beforebilling'])) echo "checked='checked'"; ?> />
                                <div class="info-of"><?php _e('Before Billing Form', 'woocommerce-checkout-manager-pro');  ?></div>
                            </div>
                        </h3>
                    </div>
                    
                    
                    <div class="section">
                        <h3 class="heading checkbox">
                            <div class="option">
                                <input name="wccs_settings[checkness][position2]" type="checkbox" value="true" <?php if (  !empty ($options['checkness']['position2'])) echo "checked='checked'"; ?> />
                                <div class="info-of"><?php _e('After Billing Form', 'woocommerce-checkout-manager-pro');  ?></div>
                            </div>
                        </h3>
                    </div>
                    
                    
                    <div class="section">
                        <h3 class="heading checkbox">
                            <div class="option">
                                <input name="wccs_settings[checkness][position3]" type="checkbox" value="true" <?php if (  !empty ($options['checkness']['position3'])) echo "checked='checked'"; ?> />
                                <div class="info-of"><?php _e('After Order Notes', 'woocommerce-checkout-manager-pro');  ?></div>
                            </div>
                        </h3>
                    </div>
                    
                    
                    
                    <div class="section">
                        <h3 class="heading"><?php _e('Time order was purchased', 'woocommerce-checkout-manager-pro');  ?></h3>
                        
                        <div style="float:left;width: 40%;">
                            <input style="width: 100%;clear:both;" name="wccs_settings[checkness][time_stamp_title]" type="text" value="<?php echo $options['checkness']['time_stamp_title']; ?>" />
                            <div class="info-of" style="font-weight:700;margin-top:5px;text-align:center;"><?php _e('Order time title', 'woocommerce-checkout-manager-pro');  ?></div>
                        </div>
                        
                        <div style="float:left;width: 40%;margin-left:20px;">
                            <input style="width: 100%;clear:both;" name="wccs_settings[checkness][set_timezone]" type="text" value="<?php echo $options['checkness']['set_timezone']; ?>" />
                            <div class="info-of" style="font-weight:700;margin-top:5px;text-align:center;"><?php _e('Set TimeZone', 'woocommerce-checkout-manager-pro');  ?></div>
                        </div>
                        
                        <h3 class="heading checkbox" style="clear:both;">
                            <div class="option">
                                <input name="wccs_settings[checkness][time_stamp]" type="checkbox" value="true" <?php if (  !empty ($options['checkness']['time_stamp'])) echo "checked='checked'"; ?> />
                                <div class="info-of"><?php _e('Enable display of order time.', 'woocommerce-checkout-manager-pro');  ?></div>
                            </div>
                        </h3>
                    </div>
                    
                    
                    
                    
                    <div class="section">
                        <h3 class="heading"><?php _e('Payment method used by customer', 'woocommerce-checkout-manager-pro');  ?></h3>
                        
                        <input style="width: 50%;" name="wccs_settings[checkness][payment_method_d]" type="text" value="<?php echo $options['checkness']['payment_method_d']; ?>" />
                        <h3 class="heading checkbox">
                            <div class="option">
                                <input name="wccs_settings[checkness][payment_method_t]" type="checkbox" value="true" <?php if (  !empty ($options['checkness']['payment_method_t'])) echo "checked='checked'"; ?> />
                                <div class="info-of"><?php _e('Enable display of payment method.', 'woocommerce-checkout-manager-pro');  ?></div>
                            </div>
                        </h3>
                    </div>
                    
                    
                    
                    
                    <div class="section">
                        <h3 class="heading"><?php _e('Shipping method used by customer', 'woocommerce-checkout-manager-pro');  ?></h3>
                        
                        <input style="width: 50%;" name="wccs_settings[checkness][shipping_method_d]" type="text" value="<?php echo $options['checkness']['shipping_method_d']; ?>" />
                        <h3 class="heading checkbox">
                            <div class="option">
                                <input name="wccs_settings[checkness][shipping_method_t]" type="checkbox" value="true" <?php if (  !empty ($options['checkness']['shipping_method_t'])) echo "checked='checked'"; ?> />
                                <div class="info-of"><?php _e('Enable display of shipping method.', 'woocommerce-checkout-manager-pro');  ?></div>
                             </div>
                        </h3>
                    </div>
                    
                    
                    
                    <div class="section">
                        <h3 class="heading"><?php _e('Default sate code for checkout.', 'woocommerce-checkout-manager-pro');  ?></h3>
                        
                        <input placeholder="ND" style="width: 50%;" name="wccs_settings[checkness][per_state]" type="text" value="<?php echo $options['checkness']['per_state']; ?>" />
                        
                        <h3 class="heading checkbox">
                            <div class="option">
                                <input name="wccs_settings[checkness][per_state_check]" type="checkbox" value="true" <?php if (  !empty ($options['checkness']['per_state_check'])) echo "checked='checked'"; ?> />
                                <div class="info-of"><?php _e('Enable default sate code.', 'woocommerce-checkout-manager-pro');  ?></div>
                            </div>
                        </h3>
                    </div>
                    
            </div>
                    
                    
                    
                    
                    
            <table class="widefat wccs-table additional-semi" style="display:none;" border="1">
                    
                <thead>
                    <tr>
                        <th style="width:1%;" class="wccs-order" title="<?php esc_attr_e( 'Change order' , 'woocommerce-checkout-manager-pro' ); ?>"></th>
                        
                        <th class="more_toggler1c" style="display:none;width: 5%;"><?php _e('More' , 'woocommerce-checkout-manager-pro' ); ?></th>
                        
                        <th class="more_toggler1c" style="display:none;width: 17%;"><?php _e('Hide Field from Product' , 'woocommerce-checkout-manager-pro' ); ?></th>
                        
                        <th class="more_toggler1c" style="display:none;width: 17%;"><?php _e('Show Field for Product' , 'woocommerce-checkout-manager-pro' ); ?></th>
                        
                        <th class="more_toggler1c" style="display:none;width: 20%;"><?php _e('Hide Field from Category' , 'woocommerce-checkout-manager-pro' ); ?></th>
                        
                        <th class="more_toggler1c" style="display:none;width: 20%;"><?php _e('Show Field for Category' , 'woocommerce-checkout-manager-pro' ); ?></th>
                        
                        <th class="hide_stuff_time" style="display:none;width: 16%;"><?php _e('Start Hour' , 'woocommerce-checkout-manager-pro' ); ?></th>
                        
                        <th class="hide_stuff_time" style="display:none;width: 16%;"><?php _e('End Hour' , 'woocommerce-checkout-manager-pro' ); ?></th>
                        
                        <th class="hide_stuff_time" style="display:none;width: 16%;"><?php _e('Interval Min.' , 'woocommerce-checkout-manager-pro' ); ?></th>
                        
                        <th class="hide_stuff_time" style="display:none;width: 16%;"><?php _e('Manual Min.' , 'woocommerce-checkout-manager-pro' ); ?></th>
                        
                        <th class="hide_stuff_color hide_stuff_days" style="display:none;width: 16%;"><?php _e('Date Format' , 'woocommerce-checkout-manager-pro' ); ?></th>
                        
                        <th class="hide_stuff_color hide_stuff_days" style="display:none;width: 5%;"><?php _e('Days before' , 'woocommerce-checkout-manager-pro' ); ?></th> 
                        
                        <th class="hide_stuff_color hide_stuff_days" style="display:none;width: 5%;"><?php _e('Days After' , 'woocommerce-checkout-manager-pro' ); ?></th> 
                        
                        <th class="hide_stuff_color daoo" style="display:none;width: 7%;"><?php _e('Days Enabler' , 'woocommerce-checkout-manager-pro' ); ?></th>
                        
                        <th class="hide_stuff_days" style="display:none;width: 7%;"><?php _e('Sundays' , 'woocommerce-checkout-manager-pro' ); ?></th>
                        
                        <th class="hide_stuff_days" style="display:none;width: 7%;"><?php _e('Mondays' , 'woocommerce-checkout-manager-pro' ); ?></th>
                        
                        <th class="hide_stuff_days" style="display:none;width: 7%;"><?php _e('Tuesdays' , 'woocommerce-checkout-manager-pro' ); ?></th>
                        
                        <th class="hide_stuff_days" style="display:none;width: 7%;"><?php _e('Wednesdays' , 'woocommerce-checkout-manager-pro' ); ?></th>
                        
                        <th class="hide_stuff_days" style="display:none;width: 7%;"><?php _e('Thursdays' , 'woocommerce-checkout-manager-pro' ); ?></th>
                        
                        <th class="hide_stuff_days" style="display:none;width: 7%;"><?php _e('Fridays' , 'woocommerce-checkout-manager-pro' ); ?></th>
                        
                        <th class="hide_stuff_days" style="display:none;width: 7%;"><?php _e('Satudays' , 'woocommerce-checkout-manager-pro' ); ?></th>
                        
                        <th class="hide_stuff_color separator hide_stuff_days" style="display:none;" width="3%"><?php _e('' , 'woocommerce-checkout-manager-pro' ); ?></th>
                        
                        <th class="hide_stuff_color hide_stuff_days" style="display:none;text-align:center;" width="5%"><?php _e('YY' , 'woocommerce-checkout-manager-pro' ); ?></th>
                        
                        <th class="hide_stuff_color hide_stuff_days" style="display:none;" width="4%"><?php _e('MM' , 'woocommerce-checkout-manager-pro' ); ?></th>
                        
                        <th class="hide_stuff_color hide_stuff_days" style="display:none;" width="4%"><?php _e('DD' , 'woocommerce-checkout-manager-pro' ); ?></th>
                        
                        <th class="hide_stuff_color separator hide_stuff_days" style="display:none;" width="3%"><?php _e('' , 'woocommerce-checkout-manager-pro' ); ?></th>
                        
                        <th class="hide_stuff_color hide_stuff_days" style="display:none;text-align:center;" width="5%"><?php _e('YY' , 'woocommerce-checkout-manager-pro' ); ?></th>
                        
                        <th class="hide_stuff_color hide_stuff_days" style="display:none;" width="4%"><?php _e('MM' , 'woocommerce-checkout-manager-pro' ); ?></th>
                        
                        <th class="hide_stuff_color hide_stuff_days" style="display:none;" width="4%"><?php _e('DD' , 'woocommerce-checkout-manager-pro' ); ?></th>
                        
                        <th class="more_toggler1" width="8%"><?php _e('Required' , 'woocommerce-checkout-manager-pro' ); ?></th>
                        
                        <th class="more_toggler1" width="5%"><?php _e('Position' , 'woocommerce-checkout-manager-pro' ); ?></th>
                        
                        <th class="more_toggler1" width="5%"><?php _e('Clear' , 'woocommerce-checkout-manager-pro' ); ?></th>
                        
                        <th class="add_amount_field condition_tick hide_stuff_time hide_stuff_change hide_stuff_opcheck hide_stuff_op hide_stuff_color more_toggler1 more_toggler1c" style="display:none;" width="5%"><?php _e('Deny Checkout' , 'woocommerce-checkout-manager-pro' ); ?></th>
                        
                        <th class="add_amount_field condition_tick hide_stuff_time hide_stuff_change hide_stuff_opcheck hide_stuff_op hide_stuff_color more_toggler1 more_toggler1c" style="display:none;" width="5%"><?php _e('Remove Tax' , 'woocommerce-checkout-manager-pro' ); ?></th>
                        
                        <th class="add_amount_field condition_tick hide_stuff_time hide_stuff_change hide_stuff_opcheck hide_stuff_op hide_stuff_color more_toggler1 more_toggler1c" style="display:none;" width="5%"><?php _e('Deny Receipt' , 'woocommerce-checkout-manager-pro' ); ?></th>
                        
                        <th class="condition_tick hide_stuff_change hide_stuff_time hide_stuff_opcheck hide_stuff_op hide_stuff_color more_toggler1 more_toggler1c add_amount" style="display:none;" width="5%"><?php _e('Add Amount' , 'woocommerce-checkout-manager-pro' ); ?></th>
                        
                        <th class="add_amount_field" style="display:none;" width="5%"><?php _e('Amount Name' , 'woocommerce-checkout-manager-pro' ); ?></th>
                        
                        <th class="add_amount_field" style="display:none;" width="5%"><?php _e('Enter Amount' , 'woocommerce-checkout-manager-pro' ); ?></th>
                        
                        <th class="add_amount_field hide_stuff_change hide_stuff_time hide_stuff_opcheck hide_stuff_op hide_stuff_color more_toggler1 more_toggler1c apply_tick" style="display:none;" width="9%"><?php _e('Conditional Field On' , 'woocommerce-checkout-manager-pro' ); ?></th>
                        
                        <th class="condition_tick" style="display:none;" width="9%"><?php _e('Conditional Parent' , 'woocommerce-checkout-manager-pro' ); ?></th>
                        
                        <th class="more_toggler1"><?php _e('Label' , 'woocommerce-checkout-manager-pro' ); ?></th>
                        
                        <th class="more_toggler1"><?php _e('Placeholder' , 'woocommerce-checkout-manager-pro' ); ?></th>
                        
                        <th style="display:none; width: 10%;" class="condition_tick"><?php _e('Chosen Value' , 'woocommerce-checkout-manager-pro' ); ?></th>
                        
                        <th style="display:none;" class="condition_tick" width="16%"><?php _e('Conditional Tie' , 'woocommerce-checkout-manager-pro' ); ?></th>
                        
                        <th style="display:none;" class="add_amount_field hide_stuff_time hide_stuff_change hide_stuff_opcheck hide_stuff_op hide_stuff_color more_toggler1 more_toggler1c condition_tick add_amount_field" width="12%"><?php _e('Default Color' , 'woocommerce-checkout-manager-pro' ); ?></th>
                        
                        <th class="hide_stuff_change" style="display:none;"><?php _e('Input Name' , 'woocommerce-checkout-manager-pro' ); ?></th>
                        
                        <th class="hide_stuff_change" style="display:none;"><?php _e('Change Name to' , 'woocommerce-checkout-manager-pro' ); ?></th>
                        
                        <th class="hide_stuff_opcheck" style="display:none;" ><?php _e('Checked Value' , 'woocommerce-checkout-manager-pro' ); ?></th>
                        
                        <th class="hide_stuff_opcheck" style="display:none;" ><?php _e('Not Checked Value' , 'woocommerce-checkout-manager-pro' ); ?></th>
                        
                        <th class="hide_stuff_op wccm1" style="display:none;" width="10%"><?php _e('Force Title' , 'woocommerce-checkout-manager-pro' ); ?></th>
                        
                        <th class="hide_stuff_op wccm1" style="display:none;" width="60%"><?php _e('List of Options (Separated by ' , 'woocommerce-checkout-manager-pro' ); ?><span class="toggle_shower current_opener">||</span> )</th>
                        
                        <th style="cursor:pointer;text-align:center;font-size:30px;display:none;" class="add_amount_field condition_tick hide_stuff_change hide_stuff_time hide_stuff_opcheck hide_stuff_tog hide_stuff_color more_toggler1 more_toggler1c" width="2%"><span class="toggle_shower">&equiv;</span></th>
                        
                        <th style="cursor:pointer;text-align:center;font-size:30px;display:none;" class="add_amount_field condition_tick hide_stuff_change hide_stuff_time hide_stuff_color hide_stuff_op hide_stuff_togcheck more_toggler1 more_toggler1c" width="2%"><span class="toggle_shower">&equiv;</span></th>
                        
                        <th style="cursor:pointer;text-align:center;font-size:30px;display:none;" class="add_amount_field condition_tick hide_stuff_opcheck hide_stuff_time hide_stuff_op hide_stuff_change_tog hide_stuff_color more_toggler1 more_toggler1c" width="2%"><span class="toggle_shower">&equiv;</span></th>
                        
                        <th style="cursor:pointer;text-align:center;font-size:30px;display:none;" class="add_amount_field condition_tick hide_stuff_opcheck hide_stuff_op hide_stuff_change hide_stuff_time_tog hide_stuff_color more_toggler1 more_toggler1c" width="2%"><span class="toggle_shower">&equiv;</span></th>
                        
                        <th style="cursor:pointer;text-align:center;font-size:30px;display:none;" class="add_amount_field hide_stuff_time condition_tick hide_stuff_change hide_stuff_opcheck hide_stuff_days hide_stuff_color_tog hide_stuff_op more_toggler1 more_toggler1c" width="2%"><span class="toggle_shower">&equiv;</span></th>
                        
                        <th style="display:none;cursor:pointer;text-align:center;font-size:30px;" class="add_amount_field condition_tick hide_stuff_change hide_stuff_opcheck hide_stuff_time hide_stuff_op hide_stuff_color more_toggler1 more_toggler1a" width="2%"><span class="toggle_shower">&equiv;</span></th>
                        
                        <th style="cursor:pointer;text-align:center;font-size:30px;" class="add_amount_field hide_stuff_time condition_tick hide_stuff_change hide_stuff_opcheck hide_stuff_color more_toggler hide_stuff_op more_toggler1c" width="2%"><span class="toggle_shower">&equiv;</span></th>
                        
                        <th class="more_toggler1" style="width:10%;"><?php _e('Choose Type' , 'woocommerce-checkout-manager-pro' ); ?></th>
                        
                        <th class="more_toggler1" style="width:5%"><?php _e('Abbreviation' , 'woocommerce-checkout-manager-pro' ); ?></th>
                        
                        <th width="1%" scope="col" title="<?php esc_attr_e( 'Remove button', 'woocommerce-checkout-manager-pro' ); ?>"><!-- remove --></th>
                    </tr>
                </thead>
                    
                    
                    
                <tbody>
                    
                    <?php
                    if ( isset ( $options['buttons'] ) ) :
                    
                        for ( $i = 0; $i < count( $options['buttons'] ); $i++ ) :
                    
                            if ( ! isset( $options['buttons'][$i] ) )
                            break;
                    
                            if ( empty($options['buttons'][$i]['colorpickerd'])) {
                            $options['buttons'][$i]['colorpickerd'] = "#000";
                            }
                    
                    ?>
                    
                    <tr valign="top" class="wccs-row">
                        <td class="wccs-order" title="<?php esc_attr_e( 'Change order', 'woocommerce-checkout-manager-pro' ); ?>"><?php echo $i + 1; ?></td>
                        
                        <td style="display:none;text-align:center;" class="more_toggler1c"><input name="wccs_settings[buttons][<?php echo $i; ?>][more_content]" type="checkbox" value="1" <?php if (  !empty ($options['buttons'][$i]['more_content'])) echo "checked='checked'"; ?> /></td>
                        
                        <td style="display:none;" class="more_toggler1c"><input type="text" name="wccs_settings[buttons][<?php echo $i; ?>][single_p]" placeholder="<?php _e('Product ID(s) e.g 1674||1233','woocommerce-checkout-manager-pro'); ?>" value="<?php echo $options['buttons'][$i]['single_p']; ?>" /></td>
                        
                        <td style="display:none;" class="more_toggler1c"><input type="text" name="wccs_settings[buttons][<?php echo $i; ?>][single_px]" placeholder="<?php _e('Product ID(s) e.g 1674||1233','woocommerce-checkout-manager-pro'); ?>" value="<?php echo $options['buttons'][$i]['single_px']; ?>" /></td>
                        
                        <td style="display:none;" class="more_toggler1c"><input type="text" name="wccs_settings[buttons][<?php echo $i; ?>][single_p_cat]" placeholder="<?php _e('Category Slug(s) e.g my-cat||my-cat2','woocommerce-checkout-manager-pro'); ?>" value="<?php echo $options['buttons'][$i]['single_p_cat']; ?>" /></td>
                        
                        <td style="display:none;" class="more_toggler1c"><input type="text" name="wccs_settings[buttons][<?php echo $i; ?>][single_px_cat]" placeholder="<?php _e('Category Slug(s) e.g my-cat||my-cat2','woocommerce-checkout-manager-pro'); ?>" value="<?php echo $options['buttons'][$i]['single_px_cat']; ?>" /></td>
                        
                        <td style="display:none;" class="hide_stuff_time"><input type="text" placeholder="6" name="wccs_settings[buttons][<?php echo $i; ?>][start_hour]" value="<?php echo $options['buttons'][$i]['start_hour']; ?>" /></td>
                        
                        <td style="display:none;" class="hide_stuff_time"><input type="text" placeholder="9" name="wccs_settings[buttons][<?php echo $i; ?>][end_hour]" value="<?php echo $options['buttons'][$i]['end_hour']; ?>" /></td>
                        
                        <td style="display:none;" class="hide_stuff_time"><input type="text" placeholder="15" name="wccs_settings[buttons][<?php echo $i; ?>][interval_min]" value="<?php echo $options['buttons'][$i]['interval_min']; ?>" /></td>
                        
                        <td style="display:none;" class="hide_stuff_time"><input type="text" placeholder="0, 10, 20, 30, 40" name="wccs_settings[buttons][<?php echo $i; ?>][manual_min]" value="<?php echo $options['buttons'][$i]['manual_min']; ?>" /></td>
                        
                        <td style="display:none;" class="hide_stuff_color hide_stuff_days"><input type="text" placeholder="dd-mm-yy" name="wccs_settings[buttons][<?php echo $i; ?>][format_date]" value="<?php echo $options['buttons'][$i]['format_date']; ?>" /></td>
                        
                        <td style="display:none;" class="hide_stuff_color hide_stuff_days"><input type="text" placeholder="+3" name="wccs_settings[buttons][<?php echo $i; ?>][min_before]" value="<?php echo $options['buttons'][$i]['min_before']; ?>" /></td>
                        
                        <td style="display:none;" class="hide_stuff_color hide_stuff_days"><input type="text" placeholder="3" name="wccs_settings[buttons][<?php echo $i; ?>][max_after]" value="<?php echo $options['buttons'][$i]['max_after']; ?>" /></td>
                        
                        <td style="display:none;text-align:center;" class="hide_stuff_color daoo"><input name="wccs_settings[buttons][<?php echo $i; ?>][days_disabler]" type="checkbox" value="true" <?php if (  !empty ($options['buttons'][$i]['days_disabler'])) echo "checked='checked'"; ?> /></td>
                        
                        <td style="display:none;text-align:center;" class="hide_stuff_days"><input name="wccs_settings[buttons][<?php echo $i; ?>][days_disabler0]" type="checkbox" value="1" <?php if (  !empty ($options['buttons'][$i]['days_disabler0'])) echo "checked='checked'"; ?> /></td>
                        
                        <td style="display:none;text-align:center;" class="hide_stuff_days"><input name="wccs_settings[buttons][<?php echo $i; ?>][days_disabler1]" type="checkbox" value="1" <?php if (  !empty ($options['buttons'][$i]['days_disabler1'])) echo "checked='checked'"; ?> /></td>
                        
                        <td style="display:none;text-align:center;" class="hide_stuff_days"><input name="wccs_settings[buttons][<?php echo $i; ?>][days_disabler2]" type="checkbox" value="1" <?php if (  !empty ($options['buttons'][$i]['days_disabler2'])) echo "checked='checked'"; ?> /></td>
                        
                        <td style="display:none;text-align:center;" class="hide_stuff_days"><input name="wccs_settings[buttons][<?php echo $i; ?>][days_disabler3]" type="checkbox" value="1" <?php if (  !empty ($options['buttons'][$i]['days_disabler3'])) echo "checked='checked'"; ?> /></td>
                        
                        <td style="display:none;text-align:center;" class="hide_stuff_days"><input name="wccs_settings[buttons][<?php echo $i; ?>][days_disabler4]" type="checkbox" value="1" <?php if (  !empty ($options['buttons'][$i]['days_disabler4'])) echo "checked='checked'"; ?> /></td>
                        
                        <td style="display:none;text-align:center;" class="hide_stuff_days"><input name="wccs_settings[buttons][<?php echo $i; ?>][days_disabler5]" type="checkbox" value="1" <?php if (  !empty ($options['buttons'][$i]['days_disabler5'])) echo "checked='checked'"; ?> /></td>
                        
                        <td style="display:none;text-align:center;" class="hide_stuff_days"><input name="wccs_settings[buttons][<?php echo $i; ?>][days_disabler6]" type="checkbox" value="1" <?php if (  !empty ($options['buttons'][$i]['days_disabler6'])) echo "checked='checked'"; ?> /></td>
                        
                        <td style="display:none;" class="hide_stuff_color hide_stuff_days"><span class="spongagge"><?php _e( 'Min Date', 'woocommerce-checkout-manager-pro' ); ?></span></td>
                        
                        <td style="display:none;" class="hide_stuff_color hide_stuff_days"><input type="text" name="wccs_settings[buttons][<?php echo $i; ?>][single_yy]" placeholder="<?php _e('2013','woocommerce-checkout-manager-pro'); ?>" title="<?php esc_attr_e( 'yy', 'woocommerce-checkout-manager-pro' ); ?>" value="<?php echo $options['buttons'][$i]['single_yy']; ?>" /></td>
                        
                        <td style="display:none;" class="hide_stuff_color hide_stuff_days"><input type="text" name="wccs_settings[buttons][<?php echo $i; ?>][single_mm]" placeholder="<?php _e('10','woocommerce-checkout-manager-pro'); ?>" title="<?php esc_attr_e( 'mm', 'woocommerce-checkout-manager-pro' ); ?>" value="<?php echo $options['buttons'][$i]['single_mm']; ?>" /></td>
                        
                        <td style="display:none;" class="hide_stuff_color hide_stuff_days"><input type="text" name="wccs_settings[buttons][<?php echo $i; ?>][single_dd]" placeholder="<?php _e('25','woocommerce-checkout-manager-pro'); ?>" title="<?php esc_attr_e( 'dd', 'woocommerce-checkout-manager-pro' ); ?>" value="<?php echo $options['buttons'][$i]['single_dd']; ?>" /></td>
                        
                        <td style="display:none;" class="hide_stuff_color hide_stuff_days"><span class="spongagge"><?php _e( 'Max Date', 'woocommerce-checkout-manager-pro' ); ?></span></td>
                        
                        <td style="display:none;" class="hide_stuff_color hide_stuff_days"><input type="text" name="wccs_settings[buttons][<?php echo $i; ?>][single_max_yy]" placeholder="<?php _e('2013','woocommerce-checkout-manager-pro'); ?>" title="<?php esc_attr_e( 'yy', 'woocommerce-checkout-manager-pro' ); ?>" value="<?php echo $options['buttons'][$i]['single_max_yy']; ?>" /></td>
                        
                        <td style="display:none;" class="hide_stuff_color hide_stuff_days"><input type="text" name="wccs_settings[buttons][<?php echo $i; ?>][single_max_mm]" placeholder="<?php _e('10','woocommerce-checkout-manager-pro'); ?>" title="<?php esc_attr_e( 'mm', 'woocommerce-checkout-manager-pro' ); ?>" value="<?php echo $options['buttons'][$i]['single_max_mm']; ?>" /></td>
                        
                        <td style="display:none;" class="hide_stuff_color hide_stuff_days"><input type="text" name="wccs_settings[buttons][<?php echo $i; ?>][single_max_dd]" placeholder="<?php _e('25','woocommerce-checkout-manager-pro'); ?>" title="<?php esc_attr_e( 'dd', 'woocommerce-checkout-manager-pro' ); ?>" value="<?php echo $options['buttons'][$i]['single_max_dd']; ?>" /></td>
                        
                        <td class="more_toggler1" style="text-align:center;"><input name="wccs_settings[buttons][<?php echo $i; ?>][checkbox]" type="checkbox" value="true" <?php if (  !empty ($options['buttons'][$i]['checkbox'])) echo "checked='checked'"; ?> /></td>
                        
                        
                        <td class="more_toggler1" style="text-align:center;">
                            <select name="wccs_settings[buttons][<?php echo $i; ?>][position]" >  <!--Call run() function-->
                                <option value="form-row-first" <?php selected( $options['buttons'][$i]['position'], 'form-row-first' ); ?>><?php _e('Left','woocommerce-checkout-manager-pro'); ?></option>
                                <option value="form-row-last" <?php selected( $options['buttons'][$i]['position'], 'form-row-last' ); ?>><?php _e('Right','woocommerce-checkout-manager-pro'); ?></option>
                                <option value="form-row-wide" <?php selected( $options['buttons'][$i]['position'], 'form-row-wide' ); ?>><?php _e('Center','woocommerce-checkout-manager-pro'); ?></option>
                            </select>
                        </td>
                        
                        <td class="more_toggler1" style="text-align:center;"><input name="wccs_settings[buttons][<?php echo $i; ?>][clear_row]" type="checkbox" value="true" <?php if (  !empty ($options['buttons'][$i]['clear_row'])) echo "checked='checked'"; ?> /></td>
                        
                        <td class="add_amount_field condition_tick hide_stuff_change hide_stuff_time hide_stuff_opcheck hide_stuff_op hide_stuff_color more_toggler1 more_toggler1c" style="display:none;text-align:center;"><input name="wccs_settings[buttons][<?php echo $i; ?>][deny_checkout]" type="checkbox" value="true" <?php if (  !empty ($options['buttons'][$i]['deny_checkout'])) echo "checked='checked'"; ?> /></td>
                        
                        <td class="add_amount_field condition_tick hide_stuff_change hide_stuff_time hide_stuff_opcheck hide_stuff_op hide_stuff_color more_toggler1 more_toggler1c" style="display:none;text-align:center;"><input name="wccs_settings[buttons][<?php echo $i; ?>][tax_remove]" type="checkbox" value="true" <?php if (  !empty ($options['buttons'][$i]['tax_remove'])) echo "checked='checked'"; ?> /></td>
                        
                        <td class="add_amount_field condition_tick hide_stuff_change hide_stuff_time hide_stuff_opcheck hide_stuff_op hide_stuff_color more_toggler1 more_toggler1c" style="display:none;text-align:center;"><input name="wccs_settings[buttons][<?php echo $i; ?>][deny_receipt]" type="checkbox" value="true" <?php if (  !empty ($options['buttons'][$i]['deny_receipt'])) echo "checked='checked'"; ?> /></td>
                        
                        <td class="condition_tick hide_stuff_change hide_stuff_time hide_stuff_opcheck hide_stuff_op hide_stuff_color more_toggler1 more_toggler1c" style="display:none;text-align:center;"><input name="wccs_settings[buttons][<?php echo $i; ?>][add_amount]" type="checkbox" value="true" <?php if (  !empty ($options['buttons'][$i]['add_amount'])) echo "checked='checked'"; ?> /></td>
                        
                        <td class="add_amount_field" style="display:none;text-align:center;"><input name="wccs_settings[buttons][<?php echo $i; ?>][fee_name]" type="text" value="<?php echo $options['buttons'][$i]['fee_name']; ?>" placeholder="<?php _e('My Custom Charge','woocommerce-checkout-manager-pro'); ?>" /></td>
                        
                        <td class="add_amount_field" style="display:none;text-align:center;"><input name="wccs_settings[buttons][<?php echo $i; ?>][add_amount_field]" type="text" value="<?php echo $options['buttons'][$i]['add_amount_field']; ?>" placeholder="50" /></td>
                        
                        <td class="add_amount_field hide_stuff_change hide_stuff_opcheck hide_stuff_op hide_stuff_time hide_stuff_color more_toggler1 more_toggler1c" style="display:none;text-align:center;"><input name="wccs_settings[buttons][<?php echo $i; ?>][conditional_parent_use]" type="checkbox" value="true" <?php if (  !empty ($options['buttons'][$i]['conditional_parent_use'])) echo "checked='checked'"; ?> /></td>
                        
                        <td class="condition_tick" style="display:none;text-align:center;"><input name="wccs_settings[buttons][<?php echo $i; ?>][conditional_parent]" type="checkbox" value="true" <?php if (  !empty ($options['buttons'][$i]['conditional_parent'])) echo "checked='checked'"; ?> /></td>
                        
                        <td class="more_toggler1"><input type="text" name="wccs_settings[buttons][<?php echo $i; ?>][label]" placeholder="<?php _e('My Field Name','woocommerce-checkout-manager-pro'); ?>" value="<?php echo esc_attr( $options['buttons'][$i]['label'] ); ?>" /></td>
                        
                        <td class="more_toggler1"><input type="text" name="wccs_settings[buttons][<?php echo $i; ?>][placeholder]" placeholder="<?php _e('Example red','woocommerce-checkout-manager-pro'); ?>" value="<?php echo $options['buttons'][$i]['placeholder']; ?>" /></td>
                        
                        <td style="display:none;" class="condition_tick"><input type="text" name="wccs_settings[buttons][<?php echo $i; ?>][chosen_valt]" placeholder="<?php _e('Yes','woocommerce-checkout-manager-pro'); ?>" value="<?php echo $options['buttons'][$i]['chosen_valt']; ?>" /></td>
                        
                        <td style="display:none;" class="condition_tick"><input type="text" name="wccs_settings[buttons][<?php echo $i; ?>][conditional_tie]" placeholder="<?php _e('Parent Abbr. Name','woocommerce-checkout-manager-pro'); ?>" value="<?php echo $options['buttons'][$i]['conditional_tie']; ?>" /></td>
                        
                        <td style="display:none;" class="add_amount_field hide_stuff_time hide_stuff_change hide_stuff_opcheck hide_stuff_op hide_stuff_color more_toggler1 more_toggler1c condition_tick add_amount_field"><input type="text" name="wccs_settings[buttons][<?php echo $i; ?>][colorpickerd]" id="colorpic<?php echo $i; ?>" placeholder="<?php _e('#000','woocommerce-checkout-manager-pro'); ?>" value="<?php echo $options['buttons'][$i]['colorpickerd']; ?>" /></td>
                        
                        <td class="hide_stuff_change" style="display:none;"><input type="text" name="wccs_settings[buttons][<?php echo $i; ?>][changenamep]" placeholder="<?php _e('Billing Address','woocommerce-checkout-manager-pro'); ?>" value="<?php echo $options['buttons'][$i]['changenamep']; ?>" /></td>
                        
                        <td class="hide_stuff_change" style="display:none;" ><input type="text" name="wccs_settings[buttons][<?php echo $i; ?>][changename]" placeholder="<?php _e('Bill Form','woocommerce-checkout-manager-pro'); ?>" value="<?php echo $options['buttons'][$i]['changename']; ?>" /></td>
                        
                        <td class="hide_stuff_opcheck" style="display:none;"><input type="text" name="wccs_settings[buttons][<?php echo $i; ?>][check_1]"  placeholder="<?php _e('Yes apple','woocommerce-checkout-manager-pro'); ?>" value="<?php echo $options['buttons'][$i]['check_1']; ?>" /></td>
                        
                        <td class="hide_stuff_opcheck" style="display:none;"><input type="text" name="wccs_settings[buttons][<?php echo $i; ?>][check_2]"  placeholder="<?php _e('No apple','woocommerce-checkout-manager-pro'); ?>" value="<?php echo $options['buttons'][$i]['check_2']; ?>" /></td>
                        
                        <td class="hide_stuff_op wccm1" style="display:none;"><input type="text" name="wccs_settings[buttons][<?php echo $i; ?>][force_title2]" placeholder="<?php _e('Name Guide','woocommerce-checkout-manager-pro'); ?>" value="<?php echo $options['buttons'][$i]['force_title2']; ?>" /></td>
                        
                        <td class="hide_stuff_op wccm1" style="display:none;"><input type="text" name="wccs_settings[buttons][<?php echo $i; ?>][option_array]" placeholder="Option 1 || Option 2 || Option 3 || Option 4" value="<?php echo $options['buttons'][$i]['option_array']; ?>" /></td>
                        
                        <td class="add_amount_field hide_stuff_time condition_tick hide_stuff_change hide_stuff_opcheck hide_stuff_color more_toggler1 more_toggler1c" style="display:none;"><?php _e('Options Toggler', 'woocommerce-checkout-manager-pro' ); ?></td>
                        
                        <td class="add_amount_field hide_stuff_time condition_tick hide_stuff_change hide_stuff_op hide_stuff_color more_toggler1 more_toggler1c" style="display:none;"><?php _e('Checkbox Toggler', 'woocommerce-checkout-manager-pro' ); ?></td>
                        
                        <td class="add_amount_field hide_stuff_time condition_tick hide_stuff_opcheck hide_stuff_op hide_stuff_color more_toggler1 more_toggler1c" style="display:none;"><?php _e('Swapper Toggler', 'woocommerce-checkout-manager-pro' ); ?></td>
                        
                        <td class="add_amount_field condition_tick hide_stuff_change hide_stuff_timef hide_stuff_opcheck hide_stuff_op hide_stuff_color more_toggler1 more_toggler1c" style="display:none;"><?php _e('Time Toggler', 'woocommerce-checkout-manager-pro' ); ?></td>
                        
                        <td class="add_amount_field hide_stuff_time condition_tick hide_stuff_change hide_stuff_opcheck hide_stuff_op more_toggler1 more_toggler1c hide_stuff_days" style="display:none;"><?php _e('Date Toggler', 'woocommerce-checkout-manager-pro' ); ?></td>
                        
                        <td style="display:none;" class="add_amount_field hide_stuff_time condition_tick hide_stuff_change hide_stuff_opcheck hide_stuff_op hide_stuff_color more_toggler1"><?php _e('Hidden Toggler', 'woocommerce-checkout-manager-pro' ); ?></td>
                        
                        <td class="add_amount_field condition_tick hide_stuff_time hide_stuff_change hide_stuff_opcheck hide_stuff_color hide_stuff_op more_toggler more_toggler1c"><?php _e('More Toggler', 'woocommerce-checkout-manager-pro' ); ?></td>
                        
                        <td class="more_toggler1">
                            <select name="wccs_settings[buttons][<?php echo $i; ?>][type]" >  <!--Call run() function-->
                                <option value="text" <?php selected( $options['buttons'][$i]['type'], 'text' ); ?>><?php _e('Text Input','woocommerce-checkout-manager-pro'); ?></option>
                                <option value="textarea" <?php selected( $options['buttons'][$i]['type'], 'textarea' ); ?>><?php _e('Text Area','woocommerce-checkout-manager-pro'); ?></option>
                                <option value="password" <?php selected( $options['buttons'][$i]['type'], 'password' ); ?>><?php _e('Password','woocommerce-checkout-manager-pro'); ?></option>
                                <option value="radio" <?php selected( $options['buttons'][$i]['type'], 'radio' ); ?>><?php _e('Radio Button','woocommerce-checkout-manager-pro'); ?></option>
                                <option value="checkbox" <?php selected( $options['buttons'][$i]['type'], 'checkbox' ); ?>><?php _e('Check Box','woocommerce-checkout-manager-pro'); ?></option>
                                <option value="select" <?php selected( $options['buttons'][$i]['type'], 'select' ); ?>><?php _e('Select Options','woocommerce-checkout-manager-pro'); ?></option>
                                <option value="date" <?php selected( $options['buttons'][$i]['type'], 'date' ); ?>><?php _e('Date Picker','woocommerce-checkout-manager-pro'); ?></option>
                                <option value="time" <?php selected( $options['buttons'][$i]['type'], 'time' ); ?>><?php _e('Time Picker','woocommerce-checkout-manager-pro'); ?></option>
                                <option value="changename" <?php selected( $options['buttons'][$i]['type'], 'changename' ); ?>><?php _e('Text/ Html Swapper','woocommerce-checkout-manager-pro'); ?></option>
                                <option value="colorpicker" <?php selected( $options['buttons'][$i]['type'], 'colorpicker' ); ?>><?php _e('Color Picker','woocommerce-checkout-manager-pro'); ?></option>
                                <option value="heading" <?php selected( $options['buttons'][$i]['type'], 'heading' ); ?>><?php _e('Heading','woocommerce-checkout-manager-pro'); ?></option>
                                <option value="multiselect" <?php selected( $options['buttons'][$i]['type'], 'multiselect' ); ?>><?php _e('Multi-Select','woocommerce-checkout-manager-pro'); ?></option>
                                <option value="multicheckbox" <?php selected( $options['buttons'][$i]['type'], 'multicheckbox' ); ?>><?php _e('Multi-Checkbox','woocommerce-checkout-manager-pro'); ?></option>
                            </select>
                        </td>
                        
                        <td class="more_toggler1"><input type="text" name="wccs_settings[buttons][<?php echo $i; ?>][cow]" placeholder="MyField" value="<?php echo $options['buttons'][$i]['cow']; ?>" /></td>
                        
                        <td class="wccs-remove"><a class="wccs-remove-button" href="javascript:;" title="<?php esc_attr_e( 'Remove Field' , 'woocommerce-checkout-manager-pro' ); ?>">&times;</a></td>
                        
                    </tr>
                    
                    <?php endfor; endif; ?>
                    <!-- Empty -->
                    
                    <?php $i = 999; ?>
                    
                    <tr valign="top" class="wccs-clone" >
                    
                        <td class="wccs-order" title="<?php esc_attr_e( 'Change order' , 'woocommerce-checkout-manager-pro' ); ?>"><?php echo $i; ?></td>
                        
                        <td style="display:none;text-align:center;" class="more_toggler1c"><input type="checkbox" name="wccs_settings[buttons][<?php echo $i; ?>][more_content]" title="<?php esc_attr_e( 'More than two content', 'woocommerce-checkout-manager-pro' ); ?>" value="" /></td>
                        
                        <td style="display:none;" class="more_toggler1c"><input type="text" name="wccs_settings[buttons][<?php echo $i; ?>][single_p]" placeholder="<?php _e('Product ID(s) e.g 1674||1233','woocommerce-checkout-manager-pro'); ?>" title="<?php esc_attr_e( 'Hide field from this Products Only', 'woocommerce-checkout-manager-pro' ); ?>" value="" /></td>
                        
                        <td style="display:none;" class="more_toggler1c"><input type="text" name="wccs_settings[buttons][<?php echo $i; ?>][single_px]" placeholder="<?php _e('Product ID(s) e.g 1674||1233','woocommerce-checkout-manager-pro'); ?>" title="<?php esc_attr_e( 'Display Field for these Products Only', 'woocommerce-checkout-manager-pro' ); ?>" value="" /></td>
                        
                        <td style="display:none;" class="more_toggler1c"><input type="text" name="wccs_settings[buttons][<?php echo $i; ?>][single_p_cat]" placeholder="<?php _e('Category Slug(s) e.g my-cat||my-cat2','woocommerce-checkout-manager-pro'); ?>" title="<?php esc_attr_e( 'Hide field from Category', 'woocommerce-checkout-manager-pro' ); ?>" value="" /></td>
                        
                        <td style="display:none;" class="more_toggler1c"><input type="text" name="wccs_settings[buttons][<?php echo $i; ?>][single_px_cat]" placeholder="<?php _e('Category Slug(s) e.g my-cat||my-cat2','woocommerce-checkout-manager-pro'); ?>" title="<?php esc_attr_e( 'Show Field for Category', 'woocommerce-checkout-manager-pro' ); ?>" value="" /></td>
                        
                        <td style="display:none;" class="hide_stuff_time"><input type="text" placeholder="6" name="wccs_settings[buttons][<?php echo $i; ?>][start_hour]" value="" /></td>
                        
                        <td style="display:none;" class="hide_stuff_time"><input type="text" placeholder="9" name="wccs_settings[buttons][<?php echo $i; ?>][end_hour]" value="" /></td>
                        
                        <td style="display:none;" class="hide_stuff_time"><input type="text" placeholder="15" name="wccs_settings[buttons][<?php echo $i; ?>][interval_min]" value="" /></td>
                        
                        <td style="display:none;" class="hide_stuff_time"><input type="text" placeholder="0, 10, 20, 30, 40" name="wccs_settings[buttons][<?php echo $i; ?>][manual_min]" value="" /></td>
                        
                        <td style="display:none;" class="hide_stuff_color hide_stuff_days"><input type="text" name="wccs_settings[buttons][<?php echo $i; ?>][format_date]" placeholder="dd-mm-yy" title="dd-mm-yy" value="" /></td>
                        
                        <td style="display:none;" class="hide_stuff_color hide_stuff_days"><input type="text" name="wccs_settings[buttons][<?php echo $i; ?>][min_before]" placeholder="+3" title="Days Before" value="" /></td>
                        
                        <td style="display:none;" class="hide_stuff_color hide_stuff_days"><input type="text" name="wccs_settings[buttons][<?php echo $i; ?>][max_after]" placeholder="3" title="Days After" value="" /></td>
                        
                        <td style="display:none;text-align:center;" class="hide_stuff_color daoo"><input name="wccs_settings[buttons][<?php echo $i; ?>][days_disabler]" type="checkbox" value="" /></td>
                        
                        <td style="display:none;text-align:center;" class="hide_stuff_days"><input name="wccs_settings[buttons][<?php echo $i; ?>][days_disabler0]" type="checkbox" value="" /></td>
                        
                        <td style="display:none;text-align:center;" class="hide_stuff_days"><input name="wccs_settings[buttons][<?php echo $i; ?>][days_disabler1]" type="checkbox" value="" /></td>
                        
                        <td style="display:none;text-align:center;" class="hide_stuff_days"><input name="wccs_settings[buttons][<?php echo $i; ?>][days_disabler2]" type="checkbox" value="" /></td>
                        
                        <td style="display:none;text-align:center;" class="hide_stuff_days"><input name="wccs_settings[buttons][<?php echo $i; ?>][days_disabler3]" type="checkbox" value="" /></td>
                        
                        <td style="display:none;text-align:center;" class="hide_stuff_days"><input name="wccs_settings[buttons][<?php echo $i; ?>][days_disabler4]" type="checkbox" value="" /></td>
                        
                        <td style="display:none;text-align:center;" class="hide_stuff_days"><input name="wccs_settings[buttons][<?php echo $i; ?>][days_disabler5]" type="checkbox" value="" /></td>
                        
                        <td style="display:none;text-align:center;" class="hide_stuff_days"><input name="wccs_settings[buttons][<?php echo $i; ?>][days_disabler6]" type="checkbox" value="" /></td>
                        
                        <td style="display:none;" class="hide_stuff_color hide_stuff_days" title="<?php esc_attr_e( 'Min Date', 'woocommerce-checkout-manager-pro' ); ?>"><span class="spongagge"><?php _e( 'Min Date', 'woocommerce-checkout-manager-pro' ); ?></span></td>
                        
                        <td style="display:none;" class="hide_stuff_color hide_stuff_days"><input type="text" name="wccs_settings[buttons][<?php echo $i; ?>][single_yy]" placeholder="<?php _e('2013','woocommerce-checkout-manager-pro'); ?>" title="<?php esc_attr_e( 'yy', 'woocommerce-checkout-manager-pro' ); ?>" value="" /></td>
                        
                        <td style="display:none;" class="hide_stuff_color hide_stuff_days"><input type="text" name="wccs_settings[buttons][<?php echo $i; ?>][single_mm]" placeholder="<?php _e('10','woocommerce-checkout-manager-pro'); ?>" title="<?php esc_attr_e( 'mm', 'woocommerce-checkout-manager-pro' ); ?>" value="" /></td>
                        
                        <td style="display:none;" class="hide_stuff_color hide_stuff_days"><input type="text" name="wccs_settings[buttons][<?php echo $i; ?>][single_dd]" placeholder="<?php _e('25','woocommerce-checkout-manager-pro'); ?>" title="<?php esc_attr_e( 'dd', 'woocommerce-checkout-manager-pro' ); ?>" value="" /></td>
                        
                        <td style="display:none;" class="hide_stuff_color hide_stuff_days" title="<?php esc_attr_e( 'Max Date', 'woocommerce-checkout-manager-pro' ); ?>"><span class="spongagge"><?php _e( 'Max Date', 'woocommerce-checkout-manager-pro' ); ?></span></td>
                        
                        <td style="display:none;" class="hide_stuff_color hide_stuff_days"><input type="text" name="wccs_settings[buttons][<?php echo $i; ?>][single_max_yy]" placeholder="<?php _e('2013','woocommerce-checkout-manager-pro'); ?>" title="<?php esc_attr_e( 'yy', 'woocommerce-checkout-manager-pro' ); ?>" value="" /></td>
                        
                        <td style="display:none;" class="hide_stuff_color hide_stuff_days"><input type="text" name="wccs_settings[buttons][<?php echo $i; ?>][single_max_mm]" placeholder="<?php _e('10','woocommerce-checkout-manager-pro'); ?>" title="<?php esc_attr_e( 'mm', 'woocommerce-checkout-manager-pro' ); ?>" value="" /></td>
                        
                        <td style="display:none;" class="hide_stuff_color hide_stuff_days"><input type="text" name="wccs_settings[buttons][<?php echo $i; ?>][single_max_dd]" placeholder="<?php _e('25','woocommerce-checkout-manager-pro'); ?>" title="<?php esc_attr_e( 'dd', 'woocommerce-checkout-manager-pro' ); ?>" value="" /></td>
                        
                        <td class="more_toggler1" style="text-align:center;"><input name="wccs_settings[buttons][<?php echo $i; ?>][checkbox]" type="checkbox" title="<?php esc_attr_e( 'Add/Remove Required Attribute', 'woocommerce-checkout-manager-pro' ); ?>" value=" " /></td>
                        
                        <td class="more_toggler1" style="text-align:center;">
                            <select name="wccs_settings[buttons][<?php echo $i; ?>][position]" >  <!--Call run() function-->
                                <option value="form-row-first" ><?php _e('Left','woocommerce-checkout-manager-pro'); ?></option>
                                <option value="form-row-last" ><?php _e('Right','woocommerce-checkout-manager-pro'); ?></option>
                                <option value="form-row-wide" ><?php _e('Center','woocommerce-checkout-manager-pro'); ?></option>
                            </select>
                        </td>
                        
                        <td class="more_toggler1" style="text-align:center;"><input name="wccs_settings[buttons][<?php echo $i; ?>][clear_row]" type="checkbox" title="<?php esc_attr_e( 'Clear Row', 'woocommerce-checkout-manager-pro' ); ?>" value=" " /></td>
                        
                        <td class="add_amount_field condition_tick hide_stuff_change hide_stuff_opcheck hide_stuff_time hide_stuff_op hide_stuff_color more_toggler1 more_toggler1c" style="display:none;text-align:center;"><input name="wccs_settings[buttons][<?php echo $i; ?>][deny_checkout]" type="checkbox" title="<?php esc_attr_e( 'Deny Checkout', 'woocommerce-checkout-manager-pro' ); ?>" value=" " /></td>
                        
                        <td class="add_amount_field condition_tick hide_stuff_change hide_stuff_opcheck hide_stuff_time hide_stuff_op hide_stuff_color more_toggler1 more_toggler1c" style="display:none;text-align:center;"><input name="wccs_settings[buttons][<?php echo $i; ?>][tax_remove]" type="checkbox" title="<?php esc_attr_e( 'Remove tax', 'woocommerce-checkout-manager-pro' ); ?>" value=" " /></td>
                        
                        <td class="add_amount_field condition_tick hide_stuff_change hide_stuff_opcheck hide_stuff_time hide_stuff_op hide_stuff_color more_toggler1 more_toggler1c" style="display:none;text-align:center;"><input name="wccs_settings[buttons][<?php echo $i; ?>][deny_receipt]" type="checkbox" title="<?php esc_attr_e( 'Deny Receipt', 'woocommerce-checkout-manager-pro' ); ?>" value=" " /></td>
                        
                        <td class="condition_tick hide_stuff_change hide_stuff_time hide_stuff_opcheck hide_stuff_op hide_stuff_color more_toggler1 more_toggler1c" style="display:none;text-align:center;"><input name="wccs_settings[buttons][<?php echo $i; ?>][add_amount]" type="checkbox" title="<?php esc_attr_e( 'Add Amount', 'woocommerce-checkout-manager-pro' ); ?>" value=" " /></td>
                        
                        <td class="add_amount_field" style="display:none;text-align:center;"><input name="wccs_settings[buttons][<?php echo $i; ?>][fee_name]" type="text" title="<?php esc_attr_e( 'Amount Name', 'woocommerce-checkout-manager-pro' ); ?>" value="" placeholder="<?php _e('My Custom Charge','woocommerce-checkout-manager-pro'); ?>" /></td>
                        
                        <td class="add_amount_field" style="display:none;text-align:center;"><input name="wccs_settings[buttons][<?php echo $i; ?>][add_amount_field]" type="text" title="<?php esc_attr_e( 'Add Amount Field', 'woocommerce-checkout-manager-pro' ); ?>" value="" placeholder="50" /></td>
                        
                        <td class="add_amount_field hide_stuff_change hide_stuff_opcheck hide_stuff_op hide_stuff_time hide_stuff_color more_toggler1 more_toggler1c" style="display:none;text-align:center;"><input name="wccs_settings[buttons][<?php echo $i; ?>][conditional_parent_use]" type="checkbox" title="<?php esc_attr_e( 'Conditional Field On', 'woocommerce-checkout-manager-pro' ); ?>" value=" " /></td>
                        
                        <td class="condition_tick" style="display:none;text-align:center;"><input name="wccs_settings[buttons][<?php echo $i; ?>][conditional_parent]" type="checkbox" title="<?php esc_attr_e( 'Conditional Parent', 'woocommerce-checkout-manager-pro' ); ?>" value=" " /></td>
                        
                        <td class="more_toggler1"><input placeholder="<?php _e('My Field Name','woocommerce-checkout-manager-pro'); ?>" type="text" name="wccs_settings[buttons][<?php echo $i; ?>][label]" title="<?php esc_attr_e( 'Label of the New Field', 'woocommerce-checkout-manager-pro' ); ?>" value="" /></td>
                        
                        <td class="more_toggler1"><input type="text" name="wccs_settings[buttons][<?php echo $i; ?>][placeholder]" placeholder="<?php _e('Example red','woocommerce-checkout-manager-pro'); ?>" title="<?php esc_attr_e( 'Placeholder - Preview of Data to Input', 'woocommerce-checkout-manager-pro' ); ?>" value="" /></td>
                        
                        <td style="display:none;" class="condition_tick"><input type="text" name="wccs_settings[buttons][<?php echo $i; ?>][chosen_valt]" placeholder="<?php _e('Yes','woocommerce-checkout-manager-pro'); ?>" title="<?php esc_attr_e( 'Chosen value for conditional', 'woocommerce-checkout-manager-pro' ); ?>" value="" /></td>
                        
                        <td style="display:none;" class="condition_tick"><input type="text" name="wccs_settings[buttons][<?php echo $i; ?>][conditional_tie]" placeholder="<?php _e('Parent Abbr. Name','woocommerce-checkout-manager-pro'); ?>" title="<?php esc_attr_e( 'Parent Abbr. Name', 'woocommerce-checkout-manager-pro' ); ?>" value="" /></td>
                        
                        <td style="display:none;" class="add_amount_field hide_stuff_change hide_stuff_time hide_stuff_opcheck hide_stuff_op hide_stuff_color more_toggler1 more_toggler1c condition_tick add_amount_field"><input type="text" name="wccs_settings[buttons][<?php echo $i; ?>][colorpickerd]" id="colorpic<?php echo $i; ?>" placeholder="<?php _e('#000','woocommerce-checkout-manager-pro'); ?>" title="<?php esc_attr_e( 'Default Color', 'woocommerce-checkout-manager-pro' ); ?>" value="" /></td>
                        
                        <td class="hide_stuff_change" style="display:none;" ><input type="text" name="wccs_settings[buttons][<?php echo $i; ?>][changenamep]" placeholder="<?php _e('Billing Address', 'woocommerce-checkout-manager-pro' ); ?>" title="<?php esc_attr_e( 'Input Name', 'woocommerce-checkout-manager-pro' ); ?>" value="" /></td>
                        
                        <td class="hide_stuff_change" style="display:none;"><input type="text" name="wccs_settings[buttons][<?php echo $i; ?>][changename]" placeholder="<?php _e('Bill Form','woocommerce-checkout-manager-pro'); ?>" title="<?php esc_attr_e( 'Change Name to', 'woocommerce-checkout-manager-pro' ); ?>" value="" /></td>
                        
                        <td class="hide_stuff_opcheck" style="display:none;"><input type="text" name="wccs_settings[buttons][<?php echo $i; ?>][check_1]" value="" placeholder="<?php _e('Yes apple','woocommerce-checkout-manager-pro'); ?>" /></td>
                        
                        <td class="hide_stuff_opcheck" style="display:none;"><input type="text" name="wccs_settings[buttons][<?php echo $i; ?>][check_2]" value="" placeholder="<?php _e('No apple','woocommerce-checkout-manager-pro'); ?>" /></td>
                        
                        <td class="hide_stuff_op wccm1" style="display:none;"><input type="text" name="wccs_settings[buttons][<?php echo $i; ?>][force_title2]" value="" placeholder="<?php _e('Name Guide','woocommerce-checkout-manager-pro'); ?>" /></td>
                        
                        <td class="hide_stuff_op wccm1" style="display:none;"><input type="text" name="wccs_settings[buttons][<?php echo $i; ?>][option_array]" value="" placeholder="Option 1 || Option 2 || Option 3 || Option 4" /></td>
                        
                        <td class="add_amount_field hide_stuff_time condition_tick hide_stuff_change hide_stuff_opcheck hide_stuff_color more_toggler1 more_toggler1c" style="display:none;"><?php _e('Options Toggler', 'woocommerce-checkout-manager-pro' ); ?></td>
                        
                        <td class="add_amount_field hide_stuff_time condition_tick hide_stuff_change hide_stuff_op hide_stuff_color more_toggler1 more_toggler1c" style="display:none;"><?php _e('Checkbox Toggler', 'woocommerce-checkout-manager-pro' ); ?></td>
                        
                        <td class="add_amount_field hide_stuff_time condition_tick hide_stuff_opcheck hide_stuff_op hide_stuff_color more_toggler1 more_toggler1c" style="display:none;"><?php _e('Swapper Toggler', 'woocommerce-checkout-manager-pro' ); ?></td>
                        
                        <td class="add_amount_field condition_tick hide_stuff_change hide_stuff_timef hide_stuff_opcheck hide_stuff_op hide_stuff_color more_toggler1 more_toggler1c" style="display:none;"><?php _e('Time Toggler', 'woocommerce-checkout-manager-pro' ); ?></td>
                        
                        <td class="add_amount_field hide_stuff_time condition_tick hide_stuff_change hide_stuff_opcheck hide_stuff_op more_toggler1 more_toggler1c hide_stuff_days" style="display:none;"><?php _e('Date Toggler', 'woocommerce-checkout-manager-pro' ); ?></td>
                        
                        <td style="display:none;" class="add_amount_field hide_stuff_time condition_tick hide_stuff_change hide_stuff_opcheck hide_stuff_op hide_stuff_color more_toggler1"><?php _e('Hidden Toggler', 'woocommerce-checkout-manager-pro' ); ?></td>
                        
                        <td class="add_amount_field condition_tick hide_stuff_time hide_stuff_change hide_stuff_opcheck hide_stuff_color hide_stuff_op more_toggler more_toggler1c"><?php _e('More Toggler', 'woocommerce-checkout-manager-pro' ); ?></td>
                        
                        <td class="more_toggler1">
                            <select name="wccs_settings[buttons][<?php echo $i; ?>][type]" >  <!--Call run() function-->
                                <option value="text" ><?php _e('Text Input','woocommerce-checkout-manager-pro'); ?></option>
                                <option value="textarea" ><?php _e('Text Area','woocommerce-checkout-manager-pro'); ?></option>
                                <option value="password" ><?php _e('Password','woocommerce-checkout-manager-pro'); ?></option>
                                <option value="radio" ><?php _e('Radio Button','woocommerce-checkout-manager-pro'); ?></option>
                                <option value="checkbox" ><?php _e('Check Box','woocommerce-checkout-manager-pro'); ?></option>
                                <option value="select" ><?php _e('Select Options','woocommerce-checkout-manager-pro'); ?></option>
                                <option value="date" ><?php _e('Date Picker','woocommerce-checkout-manager-pro'); ?></option>
                                <option value="time" ><?php _e('Time Picker','woocommerce-checkout-manager-pro'); ?></option>
                                <option value="changename" ><?php _e('Text/ Html Swapper','woocommerce-checkout-manager-pro'); ?></option>
                                <option value="colorpicker" ><?php _e('Color Picker','woocommerce-checkout-manager-pro'); ?></option>
                                <option value="heading" ><?php _e('Heading','woocommerce-checkout-manager-pro'); ?></option>
                                <option value="multiselect" ><?php _e('Multi-Select','woocommerce-checkout-manager-pro'); ?></option>
                                <option value="multicheckbox" ><?php _e('Multi-Checkbox','woocommerce-checkout-manager-pro'); ?></option>
                            </select>
                        </td>
                        
                        <td class="more_toggler1"><input type="text" name="wccs_settings[buttons][<?php echo $i; ?>][cow]" placeholder="MyField" title="<?php esc_attr_e( 'Abbreviation (No spaces)', 'woocommerce-checkout-manager-pro' ); ?>" value="" /></td>
                        
                        <td class="wccs-remove"><a class="wccs-remove-button" href="javascript:;" title="<?php esc_attr_e( 'Remove Field' , 'woocommerce-checkout-manager-pro' ); ?>">&times;</a></td>
                        
                    </tr>
                </tbody>      
            </table>
                    
                    
            <div class="wccs-table-footer additional-semi" style="display:none;">
                <a href="javascript:;" id="wccs-add-button" class="button-secondary"><?php _e( '+ Add New Field' , 'woocommerce-checkout-manager-pro' ); ?></a>
            </div>
                    
                    
            </div>
            </div>       
            </form>
                    <?php }}else{function wccs__options_page(){ ?><div style="margin-top:3%;" class="error"><p><h2><?php _e('Your License Code is invalid for WooCommerce Checkout Manager Pro. Click ','woocommerce-checkout-manager-pro'); ?><a href="admin.php?page=License_check_slug"><?php _e('here','woocommerce-checkout-manager-pro'); ?></a> <?php _e('to update.','woocommerce-checkout-manager-pro'); ?></h2></p></div>
                    <?php }}
                    
                    
                    
                    
function wccs_admin_plugin_actions($links) {
            $wccs_plugin_links = array(
                    '<a href="admin.php?page=woocommerce-checkout-manager-pro/woocommerce-checkout-manager-pro.php">'.__('Settings').'</a>',
                    '<a href="http://www.trottyzone.com/forums/forum/wordpress-plugins/">'.__('Support').'</a>',
                    );
            return array_merge( $wccs_plugin_links, $links );
}




function add_payment_method_to_new_order( $order ) {
    $options = get_option( 'wccs_settings' );

            if ( count( $options['buttons'] ) > 0 ) :
            $i = 0;
                foreach ( $options['buttons'] as $btn ) :

                    $label = ( isset( $btn['label'] ) ) ? $btn['label'] : '';

                    if ( (''.get_post_meta( $order->id , ''.wooccm_clean($btn['label']).'', true).'' !== '') && !empty( $btn['label'] ) && empty($btn['deny_receipt']) && ($btn['type'] !== 'heading') && ($btn['type'] !== 'multiselect') && ($btn['type'] !== 'multicheckbox') ) {
                        echo '<p><strong>'.wpml_string_wccm($btn['label']).':</strong> '.nl2br(get_post_meta( $order->id , ''.wooccm_clean($btn['label']).'', true)).'</p>';
                    
                    } elseif ( !empty( $btn['label'] ) && empty($btn['deny_receipt']) && ($btn['type'] == 'heading') && ($btn['type'] !== 'multiselect') && ($btn['type'] !== 'multicheckbox') ) {
                        echo '<h2>'.wpml_string_wccm($btn['label']).'</h2>';
                    
                    } elseif ( (''.get_post_meta( $order->id , ''.wooccm_clean($btn['label']).'', true).'' !== '') && !empty( $btn['label'] ) && empty($btn['deny_receipt']) && ($btn['type'] !== 'heading') && (($btn['type'] == 'multiselect') || ($btn['type'] == 'multicheckbox')) ) {

                        $strings = unserialize(get_post_meta( $order->id , ''.wooccm_clean($btn['label']).'', true));
                        $iww = 0;
                        $len = count($strings);
                        
                            echo '<p><strong>'.wpml_string_wccm($btn['label']).':</strong> ';
                                foreach($strings as $key ) {
                                    if ($iww == $len - 1) {
                                            echo ''.$key.'';
                                        } else {
                                                        echo ''.$key.', ';
                                    }
                                    $iww++;
                                }
                            echo '</p>';
                    }


                     $i++;
                	endforeach;
                endif;


                if ( !empty($options['checkness']['set_timezone']) ) {
                    date_default_timezone_set(''.$options['checkness']['set_timezone'].'');
                }
                
                if ( $options['checkness']['time_stamp'] == true ) {
                    echo '<p><strong>'.$options['checkness']['time_stamp_title'].':</strong> ' . date("g:i a") . '</p>';
                }
                if ( $order->payment_method_title && $options['checkness']['payment_method_t'] == true ) {
                    echo '<p><strong>'.$options['checkness']['payment_method_d'].':</strong> ' . $order->payment_method_title . '</p>';
                }
                if ( $order->shipping_method_title && ($options['checkness']['shipping_method_t'] == true)) {
                    echo '<p><strong>'.$options['checkness']['shipping_method_d'].':</strong> ' . $order->shipping_method_title . '</p>';
                }
}




function wccs_custom_checkout_field( $checkout ) {
    $options = get_option( 'wccs_settings' );

            if ( count( $options['buttons'] ) > 0 ) : 
            $i = 0;

	            foreach ( $options['buttons'] as $btn ) :

                    if ( ! empty( $btn['label'] ) &&  ($btn['type'] == 'heading') && empty($btn['deny_checkout']) ) {
                        echo '<h3 class="form-row '.$btn['position'].'" id="'.$btn['cow'].'_field">' . wpml_string_wccm(''.$btn['label'].'') . '</h3>';
                    }


                    if ( ! empty( $btn['label'] ) &&  ($btn['type'] == 'text') ) {
                        woocommerce_form_field( ''.$btn['cow'].'' , array(
                            'type'          => 'text',
                            'class'         => array(''.$btn['position'].' '.$btn['conditional_tie'].''),
                            'label'         =>  wpml_string_wccm(''.$btn['label'].''),
                            'required'  => ''.$btn['checkbox'].'',
                            'clear'  => ''.$btn['clear_row'].'',
                            'placeholder'       => wpml_string_wccm(''.$btn['placeholder'].''),
                            
                            ), $checkout->get_value( ''.$btn['cow'].'' ));
                    }


                    if ( ! empty( $btn['label'] ) &&  ($btn['type'] == 'textarea') ) {
                        woocommerce_form_field( ''.$btn['cow'].'' , array(
                            'type'          => 'textarea',
                            'class'         => array(''.$btn['position'].' wccs-form-row-wide '.$btn['conditional_tie'].''),
                            'label'         =>  wpml_string_wccm(''.$btn['label'].''),
                            'required'  => ''.$btn['checkbox'].'',
                            'clear'  => ''.$btn['clear_row'].'',
                            'placeholder'       => wpml_string_wccm(''.$btn['placeholder'].''),
                            
                            ), $checkout->get_value( ''.$btn['cow'].'' ));
                    }
                    
                    
                    
                    if ( ! empty( $btn['label'] ) &&  ($btn['type'] == 'colorpicker') ) {
                        woocommerce_form_field( ''.$btn['cow'].'' , array(
                            'type'          => 'colorpicker',
                            'class'         => array(''.$btn['position'].' '.$btn['conditional_tie'].' wccs_colorpicker'),
                            'label'         =>  wpml_string_wccm(''.$btn['label'].''),
                            'required'  => ''.$btn['checkbox'].'',
                            'clear'  => ''.$btn['clear_row'].'',
                            'placeholder'       => wpml_string_wccm(''.$btn['placeholder'].''),
                            'default_color' => ''.$btn['colorpickerd'].''
                            
                            ), $checkout->get_value( ''.$btn['cow'].'' ));
                    }
                    
                    
                    if ( ! empty( $btn['label'] ) &&  ($btn['type'] == 'date') ) {
                        woocommerce_form_field( ''.$btn['cow'].'' , array(
                            'type'          => 'text',
                            'class'         => array(''.$btn['position'].' MyDate'.$btn['cow'].' wccs-form-row-wide '.$btn['conditional_tie'].''),
                            'label'         =>  wpml_string_wccm(''.$btn['label'].''),
                            'required'  => ''.$btn['checkbox'].'',
                            'clear'  => ''.$btn['clear_row'].'',
                            'placeholder'       => wpml_string_wccm(''.$btn['placeholder'].''),
                            
                            ), $checkout->get_value( ''.$btn['cow'].'' ));
                    }
                    
                    
                    if ( ! empty( $btn['label'] ) &&  ($btn['type'] == 'time') ) {
                        woocommerce_form_field( ''.$btn['cow'].'' , array(
                            'type'          => 'text',
                            'class'         => array(''.$btn['position'].' MyTime'.$btn['cow'].' wccs-form-row-wide '.$btn['conditional_tie'].''),
                            'label'         =>  wpml_string_wccm(''.$btn['label'].''),
                            'required'  => ''.$btn['checkbox'].'',
                            'clear'  => ''.$btn['clear_row'].'',
                            'placeholder'       => wpml_string_wccm(''.$btn['placeholder'].''),
                            
                            ), $checkout->get_value( ''.$btn['cow'].'' ));
                    }
                    
                    
                    if ( ! empty( $btn['label'] ) &&  ($btn['type'] == 'checkbox') ) {
                        woocommerce_form_field( ''.$btn['cow'].'' , array(
                            'type'          => 'checkbox_wccm',
                            'class'         => array(''.$btn['position'].' '.$btn['conditional_tie'].''),
                            'label'         =>  wpml_string_wccm(''.$btn['label'].''),
                            'required'  => ''.$btn['checkbox'].'',
                            'clear'  => ''.$btn['clear_row'].'',
                            'options'       => array(''.wpml_string_wccm(''.$btn['check_1'].'').'',''.wpml_string_wccm(''.$btn['check_2'].'').''),
                            
                            ), $checkout->get_value( ''.$btn['cow'].'' ));
                    }
                    
                    
                    if ( ! empty( $btn['label'] ) &&  ($btn['type'] == 'password') ) {
                        woocommerce_form_field( ''.$btn['cow'].'' , array(
                            'type'          => 'password',
                            'class'         => array(''.$btn['position'].' '.$btn['conditional_tie'].''),
                            'label'         =>  wpml_string_wccm(''.$btn['label'].''),
                            'required'  => ''.$btn['checkbox'].'',
                            'clear'  => ''.$btn['clear_row'].'',
                            'placeholder'       => ''.$btn['placeholder'].'',
                            
                            ), $checkout->get_value( ''.$btn['cow'].'' ));
                    }
                    
                    
                    if ( ! empty( $btn['label'] ) &&  ($btn['type'] == 'radio') ) {
                        woocommerce_form_field( ''.$btn['cow'].'' , array(
                            'type'          => 'radio',
                            'class'         => array(''.$btn['position'].' '.$btn['conditional_tie'].''),
                            'label'         =>  wpml_string_wccm(''.$btn['label'].''),
                            'required'  => ''.$btn['checkbox'].'',
                            'default' => ''.$btn['force_title2'].'',
                            'clear'  => ''.$btn['clear_row'].'',
                            'options'       => ''.$btn['option_array'].'',
                            
                            ), $checkout->get_value( ''.$btn['cow'].'' ));
                    }
                    
                    
                    if ( ! empty( $btn['label'] ) &&  ($btn['type'] == 'multiselect') ) {
                        woocommerce_form_field( ''.$btn['cow'].'' , array(
                            'type'          => 'multiselect',
                            'class'         => array(''.$btn['position'].' '.$btn['conditional_tie'].''),
                            'label'         =>  wpml_string_wccm(''.$btn['label'].''),
                            'required'  => ''.$btn['checkbox'].'',
                            'clear'  => ''.$btn['clear_row'].'',
                            'options'       => ''.$btn['option_array'].'',
                            
                            ), $checkout->get_value( ''.$btn['cow'].'' ));
                    }
                    
                    
                    if ( ! empty( $btn['label'] ) &&  ($btn['type'] == 'multicheckbox') ) {
                        woocommerce_form_field( ''.$btn['cow'].'' , array(
                            'type'          => 'multicheckbox',
                            'class'         => array(''.$btn['position'].' '.$btn['conditional_tie'].''),
                            'label'         =>  wpml_string_wccm(''.$btn['label'].''),
                            'required'  => ''.$btn['checkbox'].'',
                            'clear'  => ''.$btn['clear_row'].'',
                            'options'       => ''.$btn['option_array'].'',
                            
                            ), $checkout->get_value( ''.$btn['cow'].'' ));
                    }
                    
                    
                    
                    
                    if ( ! empty( $btn['label'] ) &&  ($btn['type'] == 'select') ) {
                        woocommerce_form_field( ''.$btn['cow'].'' , array(
                            'type'          => 'select_wccm',
                            'class'         => array(''.$btn['position'].' '.$btn['conditional_tie'].''),
                            'label'         =>  wpml_string_wccm(''.$btn['label'].''),
                            'required'  => ''.$btn['checkbox'].'',
                            'clear'  => ''.$btn['clear_row'].'',
                            'default' => ''.$btn['force_title2'].'',
                            'options'       => ''.$btn['option_array'].'',
                            
                            ), $checkout->get_value( ''.$btn['cow'].'' ));
                    }
                    
                    
                    
                $i++;
                endforeach;
            endif;
}




function wccs_positioning_wrkb1() {
    $options = get_option( 'wccs_settings' );
        if ( !empty($options['checkness']['beforeshipping']) ) {
            return true;
        } else {
            return false;
        }
}
    
function wccs_positioning_wrk1() {
    $options = get_option( 'wccs_settings' );
        if ( !empty($options['checkness']['position1']) ) {
            return true;
        } else {
            return false;
        }
}
    
function wccs_positioning_wrkb2() {
    $options = get_option( 'wccs_settings' );
        if ( !empty($options['checkness']['beforebilling']) ) {
            return true;
        } else {
            return false;
        }
}
    
function wccs_positioning_wrk2() {
    $options = get_option( 'wccs_settings' );
        if ( !empty($options['checkness']['position2']) ) {
            return true;
        } else {
            return false;
        }
}

function wccs_positioning_wrk3() {
    $options = get_option( 'wccs_settings' );
        if ( !empty($options['checkness']['position3']) ) {
            return true;
        } else {
            return false;
        }
}



function wccs_custom_checkout_field_update_order_meta( $order ) {
    $options = get_option( 'wccs_settings' );
        if ( count( $options['buttons'] ) > 0 ) :
        $i = 0;
            foreach ( $options['buttons'] as $btn ) :
                $label = ( isset( $btn['label'] ) ) ? $btn['label'] : '';

                if ( ! empty( $btn['label'] ) && ($btn['type'] !== 'multiselect') && ($btn['type'] !== 'multicheckbox') ) {
                    if ( $_POST[ ''.$btn['cow'].'' ]) {
                        update_post_meta( $order, ''.wooccm_clean($btn['label']).'' , $_POST[ ''.$btn['cow'].'' ] );
                    }
                } elseif ( ! empty( $btn['label'] ) && (($btn['type'] == 'multiselect') || ($btn['type'] == 'multicheckbox')) ) {
                    
                    if ( $_POST[ ''.$btn['cow'].'' ]) {
                        update_post_meta( $order, ''.wooccm_clean($btn['label']).'' , serialize( $_POST[ ''.$btn['cow'].'' ] ));
                    }
                }


        $i++;
            endforeach;
        endif;
}



function wccs_custom_checkout_field_process() {
global $woocommerce;
    $options = get_option( 'wccs_settings' );
        if ( count( $options['buttons'] ) > 0 ) :
        $i = 0;

            foreach ( $options['buttons'] as $btn ) :
            $label = ( isset( $btn['label'] ) ) ? $btn['label'] : '';
            

                if ( empty($btn['single_px_cat']) && empty($btn['single_p_cat']) && empty($btn['single_px']) && empty($btn['single_p']) && !empty ($btn['checkbox']) && !empty( $btn['label'] ) && $btn['type'] !== 'changename' && ($btn['type'] !== 'heading') ) {
                    if (!$_POST[''.$btn['cow'].''] ) {
                        $woocommerce->add_error( '<strong>'.$btn['label'].'</strong> '. __('is a required field.', 'woocommerce' ) . ' ');
                    }
                }
                
                if ( empty($btn['single_px_cat']) && empty($btn['single_p_cat']) && empty($btn['single_px']) && empty($btn['single_p']) && $btn['type'] == 'checkbox' && !empty( $btn['label'] ) && $btn['type'] !== 'changename' && ($btn['type'] !== 'heading') ) {
                    if ( ($_POST[ ''.$btn['cow'].'' ] == ''.$btn['check_2'].'')  && (!empty ($btn['checkbox']) ) ) {
                        $woocommerce->add_error( '<strong>'.$btn['label'].'</strong> '. __('is a required field.', 'woocommerce' ) . ' ');
                    }               
                }
        $i++;
                endforeach;
            endif;
}



function wccs_options_validatew() {
    $options = get_option( 'wccs_settings' );
        if ( empty( $options['replace']['label'] ) )
            unset( $options['replace']['label'] );
}



function wccs_options_validate( $input ) {


        foreach( $input['buttons'] as $i => $btn ) :
        
            if( strpos($btn['single_p'],',') || strpos($btn['single_px'],',') || strpos($btn['single_p_cat'],',') || strpos($btn['single_px_cat'],',') ) {
                $input['buttons'][$i]['single_p'] = str_replace(',','||',$btn['single_p']);
                $input['buttons'][$i]['single_px'] = str_replace(',','||',$btn['single_px']);
                $input['buttons'][$i]['single_p_cat'] = str_replace(',','||',$btn['single_p_cat']);
                $input['buttons'][$i]['single_px_cat'] = str_replace(',','||',$btn['single_px_cat']);
            }
        
            if( function_exists( 'icl_register_string' ) ) {
                
            	icl_register_string('WooCommerce Checkout Manager', ''.$btn['label'].'', ''.$btn['label'].'');
            	icl_register_string('WooCommerce Checkout Manager', ''.$btn['placeholder'].'', ''.$btn['placeholder'].'');
            	icl_register_string('WooCommerce Checkout Manager', ''.$btn['check_1'].'', ''.$btn['check_1'].'');
            	icl_register_string('WooCommerce Checkout Manager', ''.$btn['check_2'].'', ''.$btn['check_2'].'');
             }
             
            if( empty( $btn['label'] ) ) { 
                 unset( $input['buttons'][$i], $btn );
	     } 

		if ( !empty( $btn['label'] ) ) {

                    if ( empty( $btn['cow'] ) ) {
				$newNum = $i + 1;
                	       $input['buttons'][$i]['cow'] = 'myfield'.$newNum.'';
                    } else {
                	       $input['buttons'][$i]['cow'] = wooccm_clean($btn['cow']);
                    } 

                }


        endforeach;
        
        
        if ( !empty( $input['replace'] ) ) {
		foreach( $input['replace'] as $type => $value ) :
				
			if( function_exists( 'icl_register_string' ) ) {
				if(!empty($value) && $value!=''){
					icl_register_string('WooCommerce Checkout Manager', ''.$value.'', ''.$value.'');
				}
			}  		
		endforeach;
        }
        
        
        $input['buttons'] = array_values( $input['buttons'] );
        
        
    return $input;
}




function wccs_custom_checkout_details( $order) {
    $options = get_option( 'wccs_settings' );
        if ( count( $options['buttons'] ) > 0 ) :
        $i = 0;
        
            foreach ( $options['buttons'] as $btn ) :
            $label = ( isset( $btn['label'] ) ) ? $btn['label'] : '';

                if (  (''.get_post_meta( $order->id , ''.wooccm_clean($btn['label']).'', true).'' !== '') && !empty( $btn['label'] ) && empty( $btn['deny_receipt'] ) && ($btn['type'] !== 'heading') && ($btn['type'] !== 'multiselect') && ($btn['type'] !== 'multicheckbox') ) {
                    echo '<dl><dt>'.wpml_string_wccm($btn['label']).':</dt> <dd>'.nl2br(get_post_meta( $order->id , ''.wooccm_clean($btn['label']).'', true)).'</dd></dl>';
                
                } elseif ( !empty( $btn['label'] ) && empty( $btn['deny_receipt'] ) && ($btn['type'] == 'heading') && ($btn['type'] !== 'multiselect') && ($btn['type'] !== 'multicheckbox') ) {
                    echo '<h2>' .wpml_string_wccm($btn['label']). '</h2>';
                
                } elseif (  (''.get_post_meta( $order->id , ''.wooccm_clean($btn['label']).'', true).'' !== '') && !empty( $btn['label'] ) && empty( $btn['deny_receipt'] ) && ($btn['type'] !== 'heading') && (($btn['type'] == 'multiselect') || ($btn['type'] == 'multicheckbox')) ) {
                    $strings = unserialize(get_post_meta( $order->id , ''.wooccm_clean($btn['label']).'', true));
                    echo '<dl><dt>'.wpml_string_wccm($btn['label']).':</dt>';
        
                    foreach($strings as $key ) {
                        echo '<dd>'.$key.'</dd>';
                    }
                    echo '</dl>';
                }
        $i++;
             endforeach;
        endif;
}



function wccm_checkout_text_after(){
    $options = get_option( 'wccs_settings' );
    
        if ( !empty($options['notice']['text2']) ) {
            if ( $options['notice']['checkbox3'] == true || $options['notice']['checkbox4'] == true ) {
                if ( $options['notice']['checkbox4'] == true ) {
                    echo ''.$options['notice']['text2'].'';
        }}}
        
        if ( !empty($options['notice']['text1']) ) {
            if ( $options['notice']['checkbox1'] == true || $options['notice']['checkbox2'] == true ) {
                if ( $options['notice']['checkbox2'] == true ) {
                    echo ''.$options['notice']['text1'].'';
        }}}
}


        
function wccm_checkout_text_before(){
    $options = get_option( 'wccs_settings' );
    
        if ( !empty($options['notice']['text2']) ) {
            if ( $options['notice']['checkbox3'] == true || $options['notice']['checkbox4'] == true ) {
                if ( $options['notice']['checkbox3'] == true ) {
                    echo ''.$options['notice']['text2'].'';
        }}}
        
        if ( !empty($options['notice']['text1']) ) {
            if ( $options['notice']['checkbox1'] == true || $options['notice']['checkbox2'] == true ) {
                if ( $options['notice']['checkbox1'] == true ) {
                    echo ''.$options['notice']['text1'].'';
        }}}
}


function delta_wccs_custom_checkout_details( $order ) {
    global $post;
    
?> <style type="text/css">#order_data .order_data_column strong { display: block; }</style> <?php

        $options = get_option( 'wccs_settings' );

            if ( count( $options['buttons'] ) > 0 ) :
            $i = 0;
                foreach ( $options['buttons'] as $btn ) :
                $label = ( isset( $btn['label'] ) ) ? $btn['label'] : '';

                    if ( (''.get_post_meta( $order->id , ''.wooccm_clean($btn['label']).'', true).'' !== '') && !empty( $btn['label'] ) && ($btn['type'] !== 'heading') && ($btn['type'] !== 'multiselect') && ($btn['type'] !== 'multicheckbox') ) {
                        echo '<p><strong>'.wpml_string_wccm($btn['label']).':</strong> '.nl2br(get_post_meta( $order->id , ''.wooccm_clean($btn['label']).'', true)).'</p>';
                    
                    } elseif  ( !empty( $btn['label'] ) && ($btn['type'] == 'heading') && ($btn['type'] !== 'multiselect') && ($btn['type'] !== 'multicheckbox') ) {
                        echo '<h4>' .wpml_string_wccm($btn['label']). '</h4>';

                    } elseif ( (''.get_post_meta( $order->id , ''.wooccm_clean($btn['label']).'', true).'' !== '') && !empty( $btn['label'] ) && ($btn['type'] !== 'heading') && (($btn['type'] == 'multiselect') || ($btn['type'] == 'multicheckbox')) ) {

                        $strings = unserialize(get_post_meta( $order->id , ''.wooccm_clean($btn['label']).'', true));
                        $iww = 0;
                        $len = count($strings);

                        echo '<p><strong>'.wpml_string_wccm($btn['label']).':</strong> ';
                            foreach($strings as $key ) {
                                if ($iww == $len - 1) {
                                        echo ''.$key.'';
                                    } else {
                                                    echo ''.$key.', ';
                                }
                            $iww++;
                            }
                            echo '</p>';
                    }
            $i++;
                    endforeach;
                endif;
}



function remove_fields_filter($fields){
    global $woocommerce;
        $options = get_option( 'wccs_settings' );
    
            foreach ($woocommerce->cart->cart_contents as $key => $values ) {
            
                $multiCategoriesx = $options['option']['productssave'];
                $multiCategoriesArrayx = explode(',',$multiCategoriesx);
                
                if(in_array($values['product_id'],$multiCategoriesArrayx) && ($woocommerce->cart->cart_contents_count < 2) ){
                    unset($fields['billing']['billing_address_1']);
                    unset($fields['billing']['billing_address_2']);
                    unset($fields['billing']['billing_phone']);
                    unset($fields['billing']['billing_country']);
                    unset($fields['billing']['billing_city']);
                    unset($fields['billing']['billing_postcode']);
                    unset($fields['billing']['billing_state']);
                    break;
                }
            }
                
    return $fields;
}



function remove_fields_filter3($fields){
    global $woocommerce;
        $options = get_option( 'wccs_settings' );
        
            foreach ($woocommerce->cart->cart_contents as $key => $values ) {
            
                $multiCategoriesx = $options['option']['productssave'];
                $multiCategoriesArrayx = explode(',',$multiCategoriesx);
                $_product = $values['data'];
                
                if( ($woocommerce->cart->cart_contents_count > 1) && ($_product->needs_shipping()) ){
                    remove_filter('woocommerce_checkout_fields','remove_fields_filter',15);
                    break;
                }
            }
    return $fields;
}



if ( validator_changename() ) {
function wccm_before_checkout() {
    $options = get_option( 'wccs_settings' );
        if ( count( $options['buttons'] ) > 0 ) :
        $i = 0;
        
            foreach ( $options['buttons'] as $btn ) :
                $label = ( isset( $btn['label'] ) ) ? $btn['label'] : '';
                    ob_start();
            $i++;
            endforeach;
        endif;
}


function wccm_after_checkout() {
    $options = get_option( 'wccs_settings' );
        if ( count( $options['buttons'] ) > 0 ) :
        $i = 0;
            
            foreach ( $options['buttons'] as $btn ) :
                $label = ( isset( $btn['label'] ) ) ? $btn['label'] : '';
                
                if ( $btn['type'] == 'changename' ) {
                    $content = ob_get_clean();
                    echo str_replace( ''.$btn['changenamep'].'', ''.$btn['changename'].'', $content);                   
                }
                $i++;
            endforeach;
        endif;
}
}



function display_front_wccs() {
    $options = get_option( 'wccs_settings' );

        if (!empty($options['checkness']['additional_info'])) {
            echo '<style type="text/css">.woocommerce-shipping-fields h3:first-child { display: none; }</style>';
        }

        echo '<style type="text/css">'.$options['option']['custom_css_w'].' .wccs_colorpicker input { border-radius: 12px; max-width: 35%; } .spec_shootd { margin-left: 17%; } </style>';
}




function scripts_enhanced() {
    global $woocommerce;
        $options = get_option( 'wccs_settings' );
    
            if ( count( $options['buttons'] ) > 0 ) :
            $i = 0;

                foreach ( $options['buttons'] as $btn ) :
                $label = ( isset( $btn['label'] ) ) ? $btn['label'] : '';


                    if ( $btn['type'] == 'date' ) {
                        echo '<script type="text/javascript">jQuery(document).ready(function() { var today = new Date(); jQuery("input#'.$btn['cow'].'").datepicker({';
                                if ( empty($btn['format_date']) ) {
                                    echo 'dateFormat : "dd-mm-yy",'; 
                                }
                                if ( !empty($btn['format_date']) ) {
                                    echo 'dateFormat : "'.str_replace( ' ', '', $btn['format_date'] ).'",'; 
                                }
                                if ( !empty($btn['single_yy']) ) {
                                    echo 'minDate: new Date( '.$btn['single_yy'].', '.$btn['single_mm'].' - 1, '.$btn['single_dd'].'),';
                                }
                                if ( !empty($btn['min_before']) ) {
                                    echo 'minDate: '.$btn['min_before'].',';
                                }
                                if ( !empty($btn['single_max_yy']) ) {
                                    echo 'maxDate: new Date( '.$btn['single_max_yy'].', '.$btn['single_max_mm'].' - 1, '.$btn['single_max_dd'].'),';
                                }
                                if ( !empty($btn['max_after']) ) {
                                    echo 'maxDate: '.$btn['max_after'].',';
                                }
                                if ( !empty($btn['days_disabler']) ) {
                                    echo 'beforeShowDay: function(date) { var day = date.getDay(); return [(';
                                
                                    if ( !empty($btn['days_disabler0']) ) {
                                        echo 'day == 0';
                                    } else { echo 'day == "x"'; }
                                    if ( !empty($btn['days_disabler1']) ) {
                                        echo ' || day == 1';
                                    }
                                    if ( !empty($btn['days_disabler2']) ) {
                                        echo ' || day == 2';
                                    }
                                    if ( !empty($btn['days_disabler3']) ) {
                                        echo ' || day == 3';
                                    }
                                    if ( !empty($btn['days_disabler4']) ) {
                                        echo ' || day == 4';
                                    }
                                    if ( !empty($btn['days_disabler5']) ) {
                                        echo ' || day == 5';
                                    }
                                    if ( !empty($btn['days_disabler6']) ) {
                                        echo '|| day == 6';
                                    }

                                    echo ')]; }';
                                }
                                echo '}); }); </script>';
                        } 


                        if ( $btn['type'] == 'time' ) {
                            echo '<script type="text/javascript">jQuery(document).ready(function() { jQuery("#'.$btn['cow'].'_field input#'.$btn['cow'].'").timepicker({ showPeriod: true,';
                            
                                if ( !empty($btn['start_hour']) ) {
                                    echo 'hours: { starts: '.$btn['start_hour'].', ends: '.$btn['end_hour'].' },';
                                }
                                if ( !empty($btn['interval_min']) ) {
                                    echo 'minutes: {interval: '.$btn['interval_min'].', manual: ['.$btn['manual_min'].'] },';
                                }
                            
                            echo 'showLeadingZero: true }); }); </script>';
                        }
                        

                        if ( $btn['type'] == 'password' ) {
                            echo '<script type="text/javascript">jQuery(document).ready(function() { jQuery("p#'.$btn['cow'].'_field").css("display"); }); </script>';
                        }



                        if ( ! empty( $btn['label'] ) && $btn['type'] == 'colorpicker' ) { ?>
                            <div id="<?php echo $btn['cow']; ?>_colorpickerdiv" class="spec_shootd"></div>
                            <script type="text/javascript">
                                jQuery(document).ready(function($) {
                                jQuery('#<?php echo $btn['cow']; ?>_colorpickerdiv').hide();
                                jQuery('#<?php echo $btn['cow']; ?>_colorpickerdiv').farbtastic("#<?php echo $btn['cow']; ?>_colorpicker");
                                jQuery("#<?php echo $btn['cow']; ?>_colorpicker").click(function(){jQuery('#<?php echo $btn['cow']; ?>_colorpickerdiv').slideToggle()});
                                
                                });
                            </script>
                        <?php }
                        


// ============================== radio button & checkbox ===========================================
                        if ( ($btn['type'] == 'radio' || $btn['type'] == 'checkbox') && !empty( $btn['tax_remove'] ) ) {  ?>
                            <script type="text/javascript">
                                jQuery(document).ready(function($) {
                                
                                jQuery('#<?php echo $btn['cow']; ?>_field input').click(function() {
                                
                                $( 'form.checkout' ).block({ message: null, overlayCSS: { background: '#fff url(' + wc_checkout_params.ajax_loader_url + ') no-repeat center', backgroundSize: '16px 16px', opacity: 0.6 } });
                                
                                
                                	var ajaxurl = '<?php echo admin_url('/admin-ajax.php'); ?>';
                                		data = {
                                		action: 'remove_tax_wccm',
                                		tax_remove_aj: jQuery('#<?php echo $btn['cow']; ?>_field input[name=<?php echo $btn['cow']; ?>]:checked').val()     
                                	};
                                
                                	jQuery.post(ajaxurl, data, function(response) {
                                	$( 'body' ).trigger( 'update_checkout' );
                                	jQuery('form.checkout').unblock();	
                                	});
                                
                                }); });
                            </script>
                        <?php }
                        
                        
                        
                        if ( ($btn['type'] == 'radio' || $btn['type'] == 'checkbox') && !empty( $btn['add_amount'] ) && !empty( $btn['fee_name'] ) && !empty( $btn['add_amount_field'] ) ) { ?>
                            <script type="text/javascript">
                                jQuery(document).ready(function($) {
                                
                                jQuery('#<?php echo $btn['cow']; ?>_field input').click(function() {
                                
                                $( 'form.checkout' ).block({ message: null, overlayCSS: { background: '#fff url(' + wc_checkout_params.ajax_loader_url + ') no-repeat center', backgroundSize: '16px 16px', opacity: 0.6 } });
                                
                                	var ajaxurl = '<?php echo admin_url('/admin-ajax.php'); ?>';
                                		data = {
                                		action: 'remove_tax_wccm',
                                		add_amount_aj: jQuery('#<?php echo $btn['cow']; ?>_field input[name=<?php echo $btn['cow']; ?>]:checked').val()
                                	};
                                
                                	jQuery.post(ajaxurl, data, function(response) {
                                	$( 'body' ).trigger( 'update_checkout' );
                                	jQuery('form.checkout').unblock();
                                	});
                                
                                }); });
                            </script>
                        <?php }





// =========================================== select options =========================================
                        if ( ($btn['type'] == 'select') && !empty( $btn['tax_remove'] ) ) { ?>
                            <script type="text/javascript">
                                jQuery(document).ready(function($) {
                                
                                jQuery('#<?php echo $btn['cow']; ?>_field select').change(function() {
                                
                                $( 'form.checkout' ).block({ message: null, overlayCSS: { background: '#fff url(' + wc_checkout_params.ajax_loader_url + ') no-repeat center', backgroundSize: '16px 16px', opacity: 0.6 } });
                                
                                	var ajaxurl = '<?php echo admin_url('/admin-ajax.php'); ?>';
                                		data = {
                                		action: 'remove_tax_wccm',
                                		tax_remove_aj: jQuery('#<?php echo $btn['cow']; ?> option:selected').val()     
                                
                                	};
                                
                                	jQuery.post(ajaxurl, data, function(response) {
                                	$( 'body' ).trigger( 'update_checkout' );
                                	jQuery('form.checkout').unblock();	
                                	});
                                
                                }); });
                            </script>
                        <?php }
                        
                        
                        
                        if ( ($btn['type'] == 'select') && !empty( $btn['add_amount'] ) && !empty( $btn['fee_name'] ) && !empty( $btn['add_amount_field'] ) ) { ?>
                            <script type="text/javascript">
                                jQuery(document).ready(function($) {
                                
                                jQuery('#<?php echo $btn['cow']; ?>_field select').change(function() {
                                
                                $( 'form.checkout' ).block({ message: null, overlayCSS: { background: '#fff url(' + wc_checkout_params.ajax_loader_url + ') no-repeat center', backgroundSize: '16px 16px', opacity: 0.6 } });
                                
                                
                                	var ajaxurl = '<?php echo admin_url('/admin-ajax.php'); ?>';
                                		data = {
                                		action: 'remove_tax_wccm',
                                		add_amount_aj: jQuery('#<?php echo $btn['cow']; ?> option:selected').val()     
                                	};
                                
                                	jQuery.post(ajaxurl, data, function(response) {
                                	$( 'body' ).trigger( 'update_checkout' );
                                	jQuery('form.checkout').unblock();	
                                	});
                                
                                }); });
                            </script>
                        <?php }






// =========================================== add apply button ==========================================

                        if ( ($btn['type'] == 'text') && !empty( $btn['add_amount'] ) && !empty( $btn['fee_name'] ) && empty( $btn['add_amount_field'] ) ) { ?>
                            <script type="text/javascript">
                                jQuery(document).ready(function() {
                                jQuery( "#<?php echo $btn['cow']; ?>_field" ).append( '<span id="<?php echo $btn['cow']; ?>_applynow"><?php _e('Apply','woocommerce-checkout-manager-pro'); ?></span>' );
                                });
                                
                                jQuery(document).ready(function($) {
                                
                                jQuery('#<?php echo $btn['cow']; ?>_field #<?php echo $btn['cow']; ?>_applynow').click(function() {
                                
                                $( 'form.checkout' ).block({ message: null, overlayCSS: { background: '#fff url(' + wc_checkout_params.ajax_loader_url + ') no-repeat center', backgroundSize: '16px 16px', opacity: 0.6 } });
                                
                                	var ajaxurl = '<?php echo admin_url('/admin-ajax.php'); ?>';
                                		data = {
                                		action: 'remove_tax_wccm',
                                		add_amount_faj: jQuery('input#<?php echo $btn['cow']; ?>').val()     
                                	};
                                
                                	jQuery.post(ajaxurl, data, function(response) {
                                	$( 'body' ).trigger( 'update_checkout' );
                                	jQuery('form.checkout').unblock();	
                                	});
                                
                                }); });
                            </script>
                        <?php }
                        
                        
                        

// =====================================================

                        if ( $btn['type'] == 'checkbox' ) { ?>
                            <script type="text/javascript">
                                jQuery(document).ready(function() {
                                jQuery('#<?php echo $btn['cow']; ?>_checkbox').change(function(){
                                if(jQuery(this).is(':checked')){
                                jQuery("#<?php echo $btn['cow']; ?>_checkboxhiddenfield").prop("disabled", true);
                                }else{
                                jQuery("#<?php echo $btn['cow']; ?>_checkboxhiddenfield").prop("disabled", false);
                                }
                                });
                                });
                            </script>
                        <?php }

        $i++;
            endforeach;
        endif;
}



// --------------------------------------------------------
// --------------------------------------------------------
// --------------------------------------------------------
function run_color_inner() {
    global $wpdb, $post;
        $options = get_option( 'wccs_settings' );
            wp_enqueue_style( 'farbtastic' );
            wp_enqueue_script( 'farbtastic', site_url('/wp-admin/js/farbtastic.js') );

            if ( count( $options['buttons'] ) > 0 ) {
            $i = 0;
                foreach ( $options['buttons'] as $btn ) { ?>

                    <div id="colorpickerdiv<?php echo $i; ?>" style="position: absolute;top: 41%;left: 46%;z-index:1;" class="colorpicker-semi"></div>
                    <script type="text/javascript">
                        jQuery(document).ready(function($) {
                        jQuery('#colorpickerdiv<?php echo $i; ?>').hide();
                        jQuery('#colorpickerdiv<?php echo $i; ?>').farbtastic("#colorpic<?php echo $i; ?>");
                        jQuery("#colorpic<?php echo $i; ?>").click(function(){jQuery('#colorpickerdiv<?php echo $i; ?>').slideToggle()});
                        });
                    </script>

        <?php $i++; }}
}


// -----------------------------------------------------------
// -----------------------------------------------------------
// -----------------------------------------------------------
// -----------------------------------------------------------
function echo_override_style() {
    $options = get_option( 'wccs_settings' );
        
        if ( !empty($options['checkness']['wccs_rq_4']) || !empty($options['checkness']['wccs_rq_5']) || !empty($options['checkness']['wccs_rq_6']) || !empty($options['checkness']['wccs_rq_7']) || !empty($options['checkness']['wccs_rq_9']) ) { ?>
        
        <style type="text/css">
            <?php 
            if ( $options['checkness']['wccs_rq_4'] == 1 ) { 
                echo '.form-row.address_1 abbr.required { display: none; }';
            }
            if ( $options['checkness']['wccs_rq_6'] == 1 ) { 
                echo '.form-row.city abbr.required { display: none; }';
            }
            if ( $options['checkness']['wccs_rq_7'] == 1 ) {
                echo '.form-row.postcode abbr.required { display: none; }';
            }
            if ( $options['checkness']['wccs_rq_9'] == 1 ) {
                echo '.form-row.state abbr.required { display: none; }';
            }
            if ( $options['check']['wccs_rq_4_s'] || $options['check']['wccs_rq_5_s'] || $options['check']['wccs_rq_6_s'] || $options['check']['wccs_rq_7_s'] || $options['check']['wccs_rq_9_s'] ) {
            if ( $options['check']['wccs_rq_4_s'] == 1 ) {
                echo '.form-row.address_1_s abbr.required { display: none; }';
            }}
            if ( $options['check']['wccs_rq_6_s'] == 1 ) {
                echo '.form-row.city_s abbr.required { display: none; }';
            }
            if ( $options['check']['wccs_rq_7_s'] == 1 ) {
                echo '.form-row.postcode_s abbr.required { display: none; }';
            }
            if ( $options['check']['wccs_rq_9_s'] == 1 ) {
                echo '.form-row.state_s abbr.required { display: none; }';
            } 
            ?>
        </style>
        <?php }
}




function validator_changename() {
    $options = get_option( 'wccs_settings' );

        if ( count( $options['buttons'] ) > 0 )  :
        $i = 0;
            foreach ( $options['buttons'] as $btn ) :
            $label = ( isset( $btn['label'] ) ) ? $btn['label'] : '';
                if ( $btn['type'] == 'changename' && !empty($btn['label']) ){
                    return true;
                }
        $i++;
            endforeach;
        endif;
}




if ( validator_changename() ) {
function string_replacer_wccs( $order ) {
    $options = get_option( 'wccs_settings' );

        ?>
        <header>
            <h2><?php _e( 'Customer details', 'woocommerce' ); ?></h2>
        </header>
        
        <dl class="customer_details">
            <?php 
            if ($order->billing_email) echo '<dt>'.__( 'Email:', 'woocommerce' ).'</dt><dd>'.$order->billing_email.'</dd>';
            if ($order->billing_phone) echo '<dt>'.__( 'Telephone:', 'woocommerce' ).'</dt><dd>'.$order->billing_phone.'</dd>';
            ?>
        </dl>
        
        <?php if (get_option('woocommerce_ship_to_billing_address_only')=='no') : ?>

            <div class="col2-set addresses">
    
                <div class="col-1">
    
                    <?php endif; ?>
            
                    
                    <header class="title">
                        <h3><?php _e( 'Billing Address', 'woocommerce' ); ?></h3>
                    </header>
                    
                    <address>
                        <p><?php if (!$order->get_formatted_billing_address()) _e( 'N/A', 'woocommerce' ); else echo $order->get_formatted_billing_address(); ?></p>
                    </address>
            
                    <?php if (get_option('woocommerce_ship_to_billing_address_only')=='no') : ?>
    
                </div><!-- /.col-1 -->
    
                <div class="col-2">
                
                    <header class="title">
                        <h3><?php _e( 'Shipping Address', 'woocommerce' ); ?></h3>
                    </header>
                    
                    <address>
                    <p><?php if (!$order->get_formatted_shipping_address()) _e( 'N/A', 'woocommerce' ); else echo $order->get_formatted_shipping_address(); ?></p>
                    </address>
                
                </div><!-- /.col-2 -->
    
            </div><!-- /.col2-set -->

        <?php endif; ?>
        
        

        <div class="clear"></div>

            <script type="text/javascript">
                var array = [];
                <?php
                    if ( count( $options['buttons'] ) > 0 ) :
                    $i = 0;
                    
                        foreach ( $options['buttons'] as $btn ) :
                            $label = ( isset( $btn['label'] ) ) ? $btn['label'] : ''; ?>
                            
                                array.push("<?php echo $btn['changenamep']; ?>" , "<?php echo $btn['changename']; ?>")
                            
                            <?php
                            $i++;
                        endforeach;
                    endif;
                    ?>
                    
                    b(array);
                    
                    function b(array){
                        for(var i = 0; i<(array.length-1); i=i+2) {
                            document.body.innerHTML= document.body.innerHTML.replace(array[i],array[i+1])
                        }
                    }
            </script>

<?php
}}





function override_this_wccs() {
    global $woocommerce;
        $options = get_option( 'wccs_settings' );
            if ( count( $options['buttons'] ) > 0 ) {
            $i = 0;
            
            // css sub-parent hide
            foreach( $options['buttons'] as $btn ) {
                if ( ($btn['type'] == 'text') && !empty( $btn['add_amount'] ) && !empty( $btn['fee_name'] ) && empty( $btn['add_amount_field'] ) ) { 
                    echo '<style type="text/css">#'.$btn['cow'].'_applynow {
                                background: -webkit-gradient(linear,left top,left bottom,from(#ad74a2),to(#96588a));
                                background: -webkit-linear-gradient(#ad74a2,#96588a);
                                background: -moz-linear-gradient(center top,#ad74a2 0,#96588a 100%);
                                background: -moz-gradient(center top,#ad74a2 0,#96588a 100%);
                                border-color: #76456c;
                                color: #fff;
                                text-shadow: 0 -1px 0 rgba(0,0,0,.6);
                                width: 100%;
                                text-align: center;
                                float: right;
                                cursor: pointer;
                                position: relative;
                                }
                                #'.$btn['cow'].'_applynow:active {
                                top: 1px;
                                }
                          </style>';
                            
                }
                if ( !empty($btn['conditional_tie']) && empty($btn['conditional_parent']) && !empty($btn['conditional_parent_use'])) {
                    echo '<style type="text/css">#'.$btn['cow'].'_field.'.$btn['conditional_tie'].' { display: none; }</style>';
                }
            }




// ====================== CHECKBOX =============================
// script when clicked show
// =============================================================
?>
<script type="text/javascript">
        jQuery(document).ready(function($){
        
        <?php
        foreach( $options['buttons'] as $btn ) {
            if ( ! empty( $btn['label'] ) &&  ($btn['type'] == 'checkbox') ) {
        
                if ( !empty($btn['conditional_parent']) && !empty($btn['conditional_parent_use']) && !empty($btn['chosen_valt'])) { ?>
        
                    jQuery("#<?php echo ''.$btn['cow'].'_field.'.$btn['conditional_tie']; ?> input[name=<?php echo $btn['cow']; ?>]").click(function(){
        
                <?php foreach( $options['buttons'] as $btn3 ) {
                if ( empty($btn3['conditional_parent']) && !empty($btn3['conditional_parent_use']) && !empty($btn3['conditional_tie'])) { ?>
                
                            if(jQuery('#<?php echo ''.$btn['cow'].'_field.'.$btn['conditional_tie']; ?> input[name=<?php echo $btn['cow']; ?>]:checked').val() === '<?php echo $btn3['chosen_valt']; ?>' ) {
                            jQuery("#<?php echo ''.$btn3['cow'].'_field.'.$btn['conditional_tie']; ?>").show( "slow" );
                            }
                
                            if(jQuery('#<?php echo ''.$btn['cow'].'_field.'.$btn['conditional_tie']; ?> input[name=<?php echo $btn['cow']; ?>]:checked').val() !== '<?php echo $btn3['chosen_valt']; ?>' ) {
                            jQuery("#<?php echo ''.$btn3['cow'].'_field.'.$btn['conditional_tie']; ?>").hide( "slow" );
                            
                           
                         <?php if ( !empty($btn2['fee_name']) && !empty($btn2['add_amount']) ) { ?>
                
                                $( 'form.checkout' ).block({ message: null, overlayCSS: { background: '#fff url(' + wc_checkout_params.ajax_loader_url + ') no-repeat center', backgroundSize: '16px 16px', opacity: 0.6 } });
                                
                                
                                var ajaxurl = '<?php echo admin_url('/admin-ajax.php'); ?>';
                                		data = {
                                		action: 'remove_tax_wccm',
                                		empty_check_add: 'none'
                                	};
                                	
                                	jQuery.post(ajaxurl, data, function(response) {
                                	$( 'body' ).trigger( 'update_checkout' );
                                	jQuery('form.checkout').unblock();	
                                	});
                            
                            <?php } ?> 
                            
                                }
        
                <?php }} ?>
        
                    });
            <?php }}} ?>
        });
</script>

<?php
// ================================ END!!! =====================================
// =============================================================================



// ====================== SELECT OPTIONS =============================
// script when clicked show
// =============================================================
?>
<script type="text/javascript">
jQuery(document).ready(function($){

        <?php
        foreach( $options['buttons'] as $btn ) {
                if ( ! empty( $btn['label'] ) &&  ($btn['type'] == 'select') ) {
                
                if ( !empty($btn['conditional_parent']) && !empty($btn['conditional_parent_use']) && !empty($btn['chosen_valt'])) { ?>
                
                        jQuery("#<?php echo ''.$btn['cow'].'_field.'.$btn['conditional_tie']; ?> select").change(function(){
                
                            <?php foreach( $options['buttons'] as $btn3 ) {
                            if ( empty($btn3['conditional_parent']) && !empty($btn3['conditional_parent_use']) && !empty($btn3['conditional_tie'])) { ?>
                            
                                    if(jQuery('#<?php echo ''.$btn['cow'].'_field.'.$btn['conditional_tie'].' #'.$btn['cow'].''; ?> option:selected').val() === '<?php echo $btn3['chosen_valt']; ?>' ) {
                                    jQuery("#<?php echo ''.$btn3['cow'].'_field.'.$btn['conditional_tie']; ?>").show( "slow" );
                                    }
                                    
                                    if(jQuery('#<?php echo ''.$btn['cow'].'_field.'.$btn['conditional_tie'].' #'.$btn['cow'].''; ?> option:selected').val() !== '<?php echo $btn3['chosen_valt']; ?>' ) {
                                    jQuery("#<?php echo ''.$btn3['cow'].'_field.'.$btn['conditional_tie']; ?>").hide( "slow" );
                                    
                                <?php if ( !empty($btn2['fee_name']) && !empty($btn2['add_amount']) ) { ?>
                            
                                        $( 'form.checkout' ).block({ message: null, overlayCSS: { background: '#fff url(' + wc_checkout_params.ajax_loader_url + ') no-repeat center', backgroundSize: '16px 16px', opacity: 0.6 } });
                                        
                                        
                                        var ajaxurl = '<?php echo admin_url('/admin-ajax.php'); ?>';
                                        		data = {
                                        		action: 'remove_tax_wccm',
                                        		empty_check_add: 'none'
                                        	};
                                        
                                        	jQuery.post(ajaxurl, data, function(response) {
                                        	$( 'body' ).trigger( 'update_checkout' );
                                        	jQuery('form.checkout').unblock();	
                                        	});
            
                                   <?php } ?> 
                                       }
                            <?php }} ?>
                            });
                <?php }}} ?>
});
</script>


<?php
// ================================ END!!! =====================================
// =============================================================================



// ====================== RADIO BUTTON =============================
// script when clicked show
// =============================================================
?>
<script type="text/javascript">
jQuery(document).ready(function($){

        <?php
        foreach( $options['buttons'] as $btn ) {
        if ( ! empty( $btn['label'] ) &&  ($btn['type'] == 'radio') ) {
        
        if ( !empty($btn['conditional_parent']) && !empty($btn['conditional_parent_use']) && !empty($btn['chosen_valt'])) { ?>
        
                jQuery("#<?php echo ''.$btn['cow'].'_field.'.$btn['conditional_tie']; ?> input").click(function(){
        
                            <?php foreach( $options['buttons'] as $btn3 ) {
                            if ( empty($btn3['conditional_parent']) && !empty($btn3['conditional_parent_use']) && !empty($btn3['conditional_tie'])) { ?>
                            
                                if(jQuery('#<?php echo ''.$btn['cow'].'_field.'.$btn['conditional_tie']; ?> input[name=<?php echo $btn['cow']; ?>]:checked').val() === '<?php echo $btn3['chosen_valt']; ?>' ) {
                                jQuery("#<?php echo ''.$btn3['cow'].'_field.'.$btn['conditional_tie']; ?>").show( "slow" );
                                }
                                
                                if(jQuery('#<?php echo ''.$btn['cow'].'_field.'.$btn['conditional_tie']; ?> input[name=<?php echo $btn['cow']; ?>]:checked').val() !== '<?php echo $btn3['chosen_valt']; ?>' ) {
                                jQuery("#<?php echo ''.$btn3['cow'].'_field.'.$btn['conditional_tie']; ?>").hide( "slow" );
                                
                                        <?php
                                        if ( !empty($btn2['fee_name']) && !empty($btn2['add_amount']) ) {
                                        ?>
                                        $( 'form.checkout' ).block({ message: null, overlayCSS: { background: '#fff url(' + wc_checkout_params.ajax_loader_url + ') no-repeat center', backgroundSize: '16px 16px', opacity: 0.6 } });
                                        
                                        var ajaxurl = '<?php echo admin_url('/admin-ajax.php'); ?>';
                                        		data = {
                                        		action: 'remove_tax_wccm',
                                        		empty_check_add: 'none'
                                        	};
                                        	
                                        	jQuery.post(ajaxurl, data, function(response) {
                                        	$( 'body' ).trigger( 'update_checkout' );
                                        	jQuery('form.checkout').unblock();	
                                        	});
                                        
                                        <?php } ?> 
            
                                    }
        
                            <?php }} ?>
        
                    });
    <?php }}} ?>
});
</script>



<?php
// ================================ END!!! =====================================
// =============================================================================



// ----------------------------- CLEAR ---------------------------------
// ---------------------------------------------------------------------
// ---------------------------------------------------------------------
foreach( $options['buttons'] as $btn ) {
        foreach ($woocommerce->cart->cart_contents as $key => $values ) {

            $multiproductsx = $btn['single_p'];
            $show_field_single = $btn['single_px'];
            $multiproductsx_cat = $btn['single_p_cat'];
            $show_field_single_cat = $btn['single_px_cat'];
            
            
            $productsarraycm[] = $values['product_id'];
            
            // Products
            // hide field
            
            // without more
            if ( !empty($btn['single_p']) && empty($btn['more_content']) ) {
                $multiarrayproductsx = explode(',',$multiproductsx);
                
                if(in_array($values['product_id'],$multiarrayproductsx) && ( count($woocommerce->cart->cart_contents) < 2) ){
                    echo '<style type="text/css">
                    .woocommerce form #customer_details #'.$btn['cow'].'_field,
                    .woocommerce-page form #customer_details #'.$btn['cow'].'_field { 
                    display: none; 
                    }
                    </style>';
            }}
            
            
            // show field without more
            if ( !empty($btn['single_px']) && empty($btn['more_content']) ) {
                $show_field_array = explode('||',$show_field_single);
            
                if(in_array($values['product_id'], $show_field_array) && ( count($woocommerce->cart->cart_contents) < 2) ){
                    echo '<style type="text/css">
                    .woocommerce form #customer_details #'.$btn['cow'].'_field,
                    .woocommerce-page form #customer_details #'.$btn['cow'].'_field { 
                    display: inline; 
                    }
                    </style>';
            }
            
                if(!in_array($values['product_id'], $show_field_array) && ( count($woocommerce->cart->cart_contents) < 2) ){
                    echo '<style type="text/css">
                    .woocommerce form #customer_details #'.$btn['cow'].'_field,
                    .woocommerce-page form #customer_details #'.$btn['cow'].'_field { 
                    display: none; 
                    }
                    </style>';
            }}
            
            
            // Category
            // hide field
            $terms = get_the_terms( $values['product_id'], 'product_cat' );
            if ( !empty($terms) ) {
            foreach ( $terms as $term ) {
            
            $categoryarraycm[] = $term->slug;
            
                // without more
            
                if ( !empty($btn['single_p_cat']) && empty($btn['more_content']) ) {
                $multiarrayproductsx_cat = explode(',',$multiproductsx_cat);
                    if(in_array($term->slug,$multiarrayproductsx_cat) && ( count($woocommerce->cart->cart_contents) < 2) ){
                        echo '<style type="text/css">
                        .woocommerce form #customer_details #'.$btn['cow'].'_field,
                        .woocommerce-page form #customer_details #'.$btn['cow'].'_field { 
                        display: none; 
                        }
                        </style>';
            }}
            
            
            // show field without more
            if ( !empty($btn['single_px_cat']) && empty($btn['more_content']) ) {
                $show_field_array_cat = explode('||',$show_field_single_cat);
                
                if(in_array($term->slug, $show_field_array_cat)  && ( count($woocommerce->cart->cart_contents) < 2)  ){
                    echo '<style type="text/css">
                    .woocommerce form #customer_details #'.$btn['cow'].'_field,
                    .woocommerce-page form #customer_details #'.$btn['cow'].'_field { 
                    display: inline; 
                    }
                    </style>';
            }
            
                if( !in_array($term->slug, $show_field_array_cat)  && ( count($woocommerce->cart->cart_contents) < 2)  ){
                    echo '<style type="text/css">
                    .woocommerce form #customer_details #'.$btn['cow'].'_field,
                    .woocommerce-page form #customer_details #'.$btn['cow'].'_field { 
                    display: none; 
                    }
                    </style>';
            }}
            
            
            
            }} 
            } // end cart
            
            
            
            // ===========================================================================================
            // Products
            // hide field
            
            // with more
            if ( !empty($btn['single_p']) && !empty($btn['more_content']) ) {
                $multiarrayproductsx = explode(',',$multiproductsx);
                
                    if(array_intersect($productsarraycm,$multiarrayproductsx)  ){
                        echo '<style type="text/css">
                        .woocommerce form #customer_details #'.$btn['cow'].'_field,
                        .woocommerce-page form #customer_details #'.$btn['cow'].'_field { 
                        display: none; 
                        }
                        </style>';
            }}
            
            
            // show field with more
            if ( !empty($btn['single_px']) && !empty($btn['more_content']) ) {
                $show_field_array = explode('||',$show_field_single);
                
                if(array_intersect($productsarraycm, $show_field_array) ){
                    echo '<style type="text/css">
                    .woocommerce form #customer_details #'.$btn['cow'].'_field,
                    .woocommerce-page form #customer_details #'.$btn['cow'].'_field { 
                    display: inline; 
                    }
                    </style>';
            }
            
                if(!array_intersect($productsarraycm, $show_field_array)  ){
                    echo '<style type="text/css">
                    .woocommerce form #customer_details #'.$btn['cow'].'_field,
                    .woocommerce-page form #customer_details #'.$btn['cow'].'_field { 
                    display: none; 
                    }
                    </style>';
            }}
            
            
            
            
            // Category
            // hide field
            
            // with more
            if ( !empty($btn['single_p_cat']) && !empty($btn['more_content']) ) {
                $multiarrayproductsx_cat = explode(',',$multiproductsx_cat);
                
                if(array_intersect($categoryarraycm,$multiarrayproductsx_cat) ){
                    echo '<style type="text/css">
                    .woocommerce form #customer_details #'.$btn['cow'].'_field,
                    .woocommerce-page form #customer_details #'.$btn['cow'].'_field { 
                    display: none; 
                    }
                    </style>';
            }}
            
            
            // show field with more
            if ( !empty($btn['single_px_cat']) && !empty($btn['more_content']) ) {
                $show_field_array_cat = explode('||',$show_field_single_cat);
                
                if(array_intersect($categoryarraycm, $show_field_array_cat)  ){
                    echo '<style type="text/css">
                    .woocommerce form #customer_details #'.$btn['cow'].'_field,
                    .woocommerce-page form #customer_details #'.$btn['cow'].'_field { 
                    display: inline; 
                    }
                    </style>';
            }
            
                if( !array_intersect($categoryarraycm, $show_field_array_cat) ){
                    echo '<style type="text/css">
                    .woocommerce form #customer_details #'.$btn['cow'].'_field,
                    .woocommerce-page form #customer_details #'.$btn['cow'].'_field { 
                    display: none; 
                    }
                    </style>';
            }}
            
            
            $categoryarraycm = '';
            $productsarraycm = '';
            
            } // btn cut
            

}}






if ( enable_auto_complete_wccs()) {
    function retain_field_values_wccm() {    ?>

        <script type="text/javascript">
            
            jQuery(document).ready(function() {
            
            window.onload = function() {
            
                <?php if( !is_user_logged_in() ){ ?>
                    document.forms['checkout'].elements['billing_first_name'].value = "<?php echo get_option('billing_first_name-'.$_SERVER['REMOTE_ADDR']); ?>";
                    document.forms['checkout'].elements['billing_last_name'].value = "<?php echo get_option('billing_last_name-'.$_SERVER['REMOTE_ADDR']); ?>";
                    document.forms['checkout'].elements['billing_company'].value = "<?php echo get_option('billing_company-'.$_SERVER['REMOTE_ADDR']); ?>";
                    document.forms['checkout'].elements['billing_address_1'].value = "<?php echo get_option('billing_address_1-'.$_SERVER['REMOTE_ADDR']); ?>";
                    document.forms['checkout'].elements['billing_address_2'].value = "<?php echo get_option('billing_address_2-'.$_SERVER['REMOTE_ADDR']); ?>";
                    document.forms['checkout'].elements['billing_city'].value = "<?php echo get_option('billing_city-'.$_SERVER['REMOTE_ADDR']); ?>";
                    document.forms['checkout'].elements['billing_postcode'].value = "<?php echo get_option('billing_postcode-'.$_SERVER['REMOTE_ADDR']); ?>";
                    document.forms['checkout'].elements['billing_state'].value = "<?php echo get_option('billing_state-'.$_SERVER['REMOTE_ADDR']); ?>";
                    document.forms['checkout'].elements['billing_email'].value = "<?php echo get_option('billing_email-'.$_SERVER['REMOTE_ADDR']); ?>";
                    document.forms['checkout'].elements['billing_phone'].value = "<?php echo get_option('billing_phone-'.$_SERVER['REMOTE_ADDR']); ?>";
                    document.forms['checkout'].elements['shipping_first_name'].value = "<?php echo get_option('shipping_first_name-'.$_SERVER['REMOTE_ADDR']); ?>";
                    document.forms['checkout'].elements['shipping_last_name'].value = "<?php echo get_option('shipping_last_name-'.$_SERVER['REMOTE_ADDR']); ?>";
                    document.forms['checkout'].elements['shipping_company'].value = "<?php echo get_option('shipping_company-'.$_SERVER['REMOTE_ADDR']); ?>";
                    document.forms['checkout'].elements['shipping_address_1'].value = "<?php echo get_option('shipping_address_1-'.$_SERVER['REMOTE_ADDR']); ?>";
                    document.forms['checkout'].elements['shipping_address_2'].value = "<?php echo get_option('shipping_address_2-'.$_SERVER['REMOTE_ADDR']); ?>";
                    document.forms['checkout'].elements['shipping_city'].value = "<?php echo get_option('shipping_city-'.$_SERVER['REMOTE_ADDR']); ?>";
                    document.forms['checkout'].elements['shipping_postcode'].value = "<?php echo get_option('shipping_postcode-'.$_SERVER['REMOTE_ADDR']); ?>";
                    document.forms['checkout'].elements['shipping_state'].value = "<?php echo get_option('shipping_state-'.$_SERVER['REMOTE_ADDR']); ?>";
                <?php } ?>
            
            }
            
            
            <?php $options = get_option( 'wccs_settings' );
                if ( count( $options['buttons'] ) > 0 ) :
                    $i = 0;
                    foreach ( $options['buttons'] as $btn ) :
                        $label = ( isset( $btn['label'] ) ) ? $btn['label'] : '';
                            if ( $btn['type'] !== 'changename' )  { ?>
                                document.forms['checkout'].elements['<?php echo $btn['cow']; ?>'].value = "<?php echo get_option(''.$btn['cow'].'-'.$_SERVER['REMOTE_ADDR']); ?>";
                            
                            <?php }
                    $i++;
                    endforeach;
                endif; ?>
                
                
            });
        </script>





<script type="text/javascript">
jQuery(document).ready(function() {

jQuery('body').change(function() {

var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
data = { action: 'retain_val_wccs',

<?php if(!is_user_logged_in()){ ?>
billing_first_name: jQuery("#billing_first_name").val(),

billing_last_name: jQuery("#billing_last_name").val(),

billing_company: jQuery("#billing_company").val(),

billing_address_1: jQuery("#billing_address_1").val(),

billing_address_2: jQuery("#billing_address_2").val(),

billing_city: jQuery("#billing_city").val(),

billing_postcode: jQuery("#billing_postcode").val(),

billing_state: jQuery("#billing_state").val(),

billing_email: jQuery("#billing_email").val(),

billing_phone: jQuery("#billing_phone").val(),

shipping_first_name: jQuery("#shipping_first_name").val(),

shipping_last_name: jQuery("#shipping_last_name").val(),

shipping_company: jQuery("#shipping_company").val(),

shipping_address_1: jQuery("#shipping_address_1").val(),

shipping_address_2: jQuery("#shipping_address_2").val(),

shipping_city: jQuery("#shipping_city").val(),

shipping_postcode: jQuery("#shipping_postcode").val(),

shipping_state: jQuery("#shipping_state").val(),
<?php } ?>
<?php if ( count( $options['buttons'] ) > 0 ) :
$i = 0;
foreach ( $options['buttons'] as $btn ) :
$label = ( isset( $btn['label'] ) ) ? $btn['label'] : '';
if ( $btn['type'] !== 'changename' ) { ?>
<?php echo $btn['cow']; ?>: jQuery("#<?php echo $btn['cow']; ?>").val(),

<?php }
$i++;
endforeach;
endif;
?>
};
jQuery.post(ajaxurl, data, function(response) {
});
return false;
});
});

</script>
<?php
}

add_action( 'wp_ajax_retain_val_wccs', 'retain_val_wccs_callback' );
add_action('wp_ajax_nopriv_retain_val_wccs', 'retain_val_wccs_callback');


function retain_val_wccs_callback() {
global $wpdb; // this is how you get access to the database

$options = get_option( 'wccs_settings' );

update_option('billing_first_name-'.$_SERVER['REMOTE_ADDR'] ,$_POST['billing_first_name']);
update_option('billing_last_name-'.$_SERVER['REMOTE_ADDR'] ,$_POST['billing_last_name']);
update_option('billing_company-'.$_SERVER['REMOTE_ADDR'] ,$_POST['billing_company']);
update_option('billing_address_1-'.$_SERVER['REMOTE_ADDR'] ,$_POST['billing_address_1']);
update_option('billing_address_2-'.$_SERVER['REMOTE_ADDR'] ,$_POST['billing_address_2']);
update_option('billing_city-'.$_SERVER['REMOTE_ADDR'] ,$_POST['billing_city']);
update_option('billing_postcode-'.$_SERVER['REMOTE_ADDR'] ,$_POST['billing_postcode']);
update_option('billing_state-'.$_SERVER['REMOTE_ADDR'] ,$_POST['billing_state']);
update_option('billing_email-'.$_SERVER['REMOTE_ADDR'] ,$_POST['billing_email']);
update_option('billing_phone-'.$_SERVER['REMOTE_ADDR'] ,$_POST['billing_phone']);
update_option('shipping_first_name-'.$_SERVER['REMOTE_ADDR'] ,$_POST['shipping_first_name']);
update_option('shipping_last_name-'.$_SERVER['REMOTE_ADDR'] ,$_POST['shipping_last_name']);
update_option('shipping_company-'.$_SERVER['REMOTE_ADDR'] ,$_POST['shipping_company']);
update_option('shipping_address_1-'.$_SERVER['REMOTE_ADDR'] ,$_POST['shipping_address_1']);
update_option('shipping_address_2-'.$_SERVER['REMOTE_ADDR'] ,$_POST['shipping_address_2']);
update_option('shipping_city-'.$_SERVER['REMOTE_ADDR'] ,$_POST['shipping_city']);
update_option('shipping_postcode-'.$_SERVER['REMOTE_ADDR'] ,$_POST['shipping_postcode']);
update_option('shipping_state-'.$_SERVER['REMOTE_ADDR'] ,$_POST['shipping_state']);
if ( count( $options['buttons'] ) > 0 ) :
$i = 0;
foreach ( $options['buttons'] as $btn ) :
$label = ( isset( $btn['label'] ) ) ? $btn['label'] : '';
if ( $btn['type'] !== 'changename' ) {
update_option(''.$btn['cow'].'-'.$_SERVER['REMOTE_ADDR'] ,$_POST[''.$btn['cow'].'']);
}
$i++;
endforeach;
endif;

die(); // this is required to return a proper result

}}

add_action('woocommerce_settings_start','update_auto_gen_account_wccm');

function update_auto_gen_account_wccm() {
$options = get_option( 'wccs_settings' );

// =================== apply new state ==========================
if ( !empty($options['checkness']['auto_create_wccm_account']) &&  get_option( 'woocommerce_registration_generate_password') == 'no' ) {
update_option( 'woocommerce_registration_generate_password', 'yes' );
}

if ( !empty($options['checkness']['auto_create_wccm_account']) && get_option( 'woocommerce_registration_generate_username') == 'no' ) {
update_option( 'woocommerce_registration_generate_username', 'yes' );
}

if ( !empty($options['checkness']['auto_create_wccm_account']) && get_option( 'woocommerce_enable_signup_and_login_from_checkout') == 'no' ) {
update_option( 'woocommerce_enable_signup_and_login_from_checkout', 'yes' );
}

// ====================== reset state =============================
if ( empty($options['checkness']['auto_create_wccm_account']) ) {
update_option( 'woocommerce_registration_generate_password', 'no' );
}

if ( empty($options['checkness']['auto_create_wccm_account']) ) {
update_option( 'woocommerce_registration_generate_username', 'no' );
}

if ( empty($options['checkness']['auto_create_wccm_account']) ) {
update_option( 'woocommerce_enable_signup_and_login_from_checkout', 'no' );
}

}

function enable_auto_complete_wccs() {
$options = get_option( 'wccs_settings' );

if ( !empty($options['checkness']['retainval']) ) {
return true;
} else {
return false;
}
}

add_action('woocommerce_checkout_process', 'company_custom_checkout_field_process_wccs');
function company_custom_checkout_field_process_wccs() {
global $woocommerce;
$options = get_option( 'wccs_settings' );

if ( empty($options['checkness']['wccs_opt_3']) && empty($options['checkness']['rq_company']) && !$_POST['billing_company']) {
$woocommerce->add_error( __('<strong>'.__('Company Name','woocommerce').'</strong> '. __('is a required field.', 'woocommerce' ) . '') );
}}

add_action('woocommerce_checkout_process', 'company1_custom_checkout_field_process_wccs');
function company1_custom_checkout_field_process_wccs() {
global $woocommerce;
$options = get_option( 'wccs_settings' );

if ( empty($options['check']['rq_company1']) && !$_POST['shipping_company']) {
$woocommerce->add_error( __('<strong>'.__('Company Name','woocommerce').'</strong> '. __('is a required field.', 'woocommerce' ) . '') );
}}

add_action('woocommerce_checkout_process', 'comments_custom_checkout_field_process_wccs');
function comments_custom_checkout_field_process_wccs() {
global $woocommerce;
$options = get_option( 'wccs_settings' );

if ( empty($options['checkness']['wccs_rqo_12']) && !$_POST['order_comments']) {
$woocommerce->add_error( __('<strong>'.__('Order Notes','woocommerce').'</strong> '. __('is a required field.', 'woocommerce' ) . '') );
}}

add_action( 'woocommerce_before_checkout_form' , 'asterisk_company_wccs' );
function asterisk_company_wccs( $fields ) {
$options = get_option( 'wccs_settings' );
if ( !empty($options['checkness']['auto_create_wccm_account']) ) {
?>
<script type="text/javascript">
jQuery(document).ready(function() {
jQuery( "input#createaccount" ).prop("checked","checked");
});
</script>
<style type="text/css">
.create-account {
display:none;
}
</style>
<?php
}

if ( empty($options['checkness']['wccs_opt_3']) && empty($options['checkness']['rq_company']) ) {
?>
<script type="text/javascript">
jQuery(document).ready(function() {
jQuery( "#billing_company_field" ).addClass( "validate-required wccs_custom_val" );
});
</script>
<style type="text/css">
#billing_company_field label:after {
content: ' *';
color: red;
}
</style>
<?php
}

if ( empty($options['check']['rq_company1']) ) {
?>
<script type="text/javascript">
jQuery(document).ready(function() {
jQuery( "#shipping_company_field" ).addClass( "validate-required wccs_custom_val" );
});
</script>
<style type="text/css">
#shipping_company_field label:after {
content: ' *';
color: red;
}
</style>
<?php } 

if ( empty($options['checkness']['wccs_rqo_12']) ) {
?>
<script type="text/javascript">
jQuery(document).ready(function() {
jQuery( "p#order_comments_field" ).addClass( "validate-required wccs_custom_val" );
});
</script>
<style type="text/css">
p#order_comments_field label:after {
content: ' *';
color: red;
}
.woocommerce-page form .form-row.validate-required.woocommerce-invalid textarea.input-text,
.woocommerce form .form-row.validate-required.woocommerce-invalid textarea.input-text {
border-color: #fb7f88;
}
</style>
<?php
}
}

add_action( 'wp_ajax_remove_tax_wccm', 'remove_tax_wccm' );
add_action( 'wp_ajax_nopriv_remove_tax_wccm', 'remove_tax_wccm' );

function remove_tax_wccm() {
global $wpdb, $post, $woocommerce;
$options = get_option( 'wccs_settings' );

if ( count( $options['buttons'] ) > 0 ) {
$i = 0;
// Loop through each button
foreach ( $options['buttons'] as $btn ) {

if ( !empty( $btn['add_amount'] ) && !empty( $btn['fee_name'] ) ) {
if ( isset($_POST['add_amount_faj']) && !empty($_POST['add_amount_faj']) ) {
update_option('wooccm_addamount453userf', '0');
update_option('wooccm_addamount453userfa', $_POST['add_amount_faj'] );
} else {
update_option('wooccm_addamount453userf', '1');
update_option('wooccm_addamount453userfa', '' );
}
}


if ( ! empty( $btn['chosen_valt'] ) ) {

if ( ! empty( $btn['tax_remove'] ) ) {
if ( isset($_POST['tax_remove_aj']) && !empty($_POST['tax_remove_aj']) && $_POST['tax_remove_aj'] == $btn['chosen_valt'] ) {
update_option('wooccm_tax_save_method', '0');
} else {
update_option('wooccm_tax_save_method', '1');
}
}

if ( ! empty( $btn['add_amount'] ) && !empty( $btn['add_amount_field'] ) ) {
if ( isset($_POST['add_amount_aj']) && !empty($_POST['add_amount_aj']) && $_POST['add_amount_aj'] == $btn['chosen_valt'] ) {
update_option('wooccm_addamount453user', '0');
} else {
update_option('wooccm_addamount453user', '1');
}}

}}}
die();
}

add_action('woocommerce_checkout_order_processed','cart_update_wccm');
function cart_update_wccm( $items) {
update_option('wooccm_tax_save_method', '1');
update_option('wooccm_addamount453user', '1');
update_option('wooccm_addamount453userf', '1');
}

add_action('woocommerce_after_checkout_validation','reupdate_upon_checkout_wccm');
function reupdate_upon_checkout_wccm( $order_id ) {
global $woocommerce, $wpdb;
$options = get_option( 'wccs_settings' );

if ( count( $options['buttons'] ) > 0 ) {
$i = 0;
// Loop through each button
foreach ( $options['buttons'] as $btn ) {

if ( $_POST[ ''.$btn['cow'].'' ]) {
if ( ! empty( $btn['tax_remove'] ) ) {
update_option('wooccm_tax_save_method', '0');
}
if ( ! empty( $btn['add_amount'] ) && !empty( $btn['add_amount_field'] ) ) {
update_option('wooccm_addamount453user', '0');
}
if ( ! empty( $btn['add_amount'] ) && !empty( $btn['fee_name'] ) ) {
update_option('wooccm_addamount453userf', '0');
}
$i++;
}}}
}

add_action( 'woocommerce_calculate_totals', 'remove_tax_for_exempt' );
function remove_tax_for_exempt( $cart ) {
global $woocommerce, $wpdb;

if ( get_option('wooccm_tax_save_method') == '0' ) {
if ( !is_checkout() ) {
update_option('wooccm_tax_save_method', '1');
}
$cart->remove_taxes();
}
return $cart;
}

add_action( 'woocommerce_cart_calculate_fees','wooccm_custom_user_charge_man' );
function wooccm_custom_user_charge_man() {
global $woocommerce, $wpdb;
$options = get_option( 'wccs_settings' );

if ( get_option('wooccm_addamount453user') == '0' ) {
if ( !is_checkout() ) {
update_option('wooccm_addamount453user', '1');
}

if ( count( $options['buttons'] ) > 0 ) {
$i = 0;
// Loop through each button
foreach ( $options['buttons'] as $btn ) {

if ( !empty( $btn['add_amount'] ) && !empty( $btn['add_amount_field'] ) && !empty( $btn['label'] ) && !empty( $btn['fee_name'] ) ) {	

	$woocommerce->cart->add_fee( $btn['fee_name'], $btn['add_amount_field'], false, '' );
	
$i++;
}}}}}

add_action( 'woocommerce_cart_calculate_fees','wooccm_custom_user_charge_manf' );
function wooccm_custom_user_charge_manf() {
global $woocommerce, $wpdb;
$options = get_option( 'wccs_settings' );

if ( get_option('wooccm_addamount453userf') == '0' ) {
if ( !is_checkout() ) {
update_option('wooccm_addamount453userf', '1');
}

if ( count( $options['buttons'] ) > 0 ) {
$i = 0;
// Loop through each button
foreach ( $options['buttons'] as $btn ) {

if ( !empty( $btn['add_amount'] ) && empty( $btn['add_amount_field'] ) && !empty( $btn['label'] ) && !empty( $btn['fee_name'] ) ) {	

	$woocommerce->cart->add_fee( $btn['fee_name'], get_option('wooccm_addamount453userfa'), false, '' );
	
$i++;
}}}}}

add_action('woocommerce_after_cart_totals','update_cart_totalajaxwccm');
function update_cart_totalajaxwccm() {
global $woocommerce, $wpdb;
?>
<script type="text/javascript">
jQuery(document).ready(function($) {

window.onload = function() {
jQuery('div.cart-collaterals').block({message: null, overlayCSS: {background: '#fff url(' + woocommerce_params.plugin_url + '/assets/images/ajax-loader.gif) no-repeat center', opacity: 0.6}});

jQuery('div.cart-collaterals').block({message: null, overlayCSS: {background: '#fff url(' + woocommerce_params.ajax_loader_url + ') no-repeat center', opacity: 0.6}});

$.ajax({
   url: '<?php echo $woocommerce->cart->get_cart_url(); ?>',
   data: {},
   success: function (data) {
      $(".cart-collaterals").html($(data).find(".cart-collaterals"));
	jQuery('div.cart-collaterals').unblock();
   },
   dataType: 'html'
});

}; });
</script>
<?php
}

// -------------- required clear-----------------------------------
add_action('woocommerce_checkout_process', 'wccm_ccfcustomcheckoutprocessnow');
function wccm_ccfcustomcheckoutprocessnow() {
global $woocommerce;
$options = get_option( 'wccs_settings' );
if ( count( $options['buttons'] ) > 0 ) {


foreach( $options['buttons'] as $btn ) {
foreach ($woocommerce->cart->cart_contents as $key => $values ) {


$multiproductsx = $btn['single_p'];
$show_field_single = $btn['single_px'];
$multiproductsx_cat = $btn['single_p_cat'];
$show_field_single_cat = $btn['single_px_cat'];


$productsarraycm[] = $values['product_id'];

// Products
// hide field


// show field without more
if ( !empty($btn['single_px']) && empty($btn['more_content']) ) {
$show_field_array = explode('||',$show_field_single);

if(in_array($values['product_id'], $show_field_array) && ( count($woocommerce->cart->cart_contents) < 2) ){
if ( !empty ($btn['checkbox']) && !empty( $btn['label'] ) && ($btn['type'] !== 'changename')  ) {
if (!$_POST[''.$btn['cow'].''] ) {
$woocommerce->add_error( '<strong>'.wpml_string_wccm($btn['label']).'</strong> '. __('is a required field.', 'woocommerce' ) . ' ');
}}
}

}


// Category
// hide field
$terms = get_the_terms( $values['product_id'], 'product_cat' );
if ( !empty($terms) ) {
foreach ( $terms as $term ) {

$categoryarraycm[] = $term->slug;

// without more

// show field without more
if ( !empty($btn['single_px_cat']) && empty($btn['more_content']) ) {
$show_field_array_cat = explode('||',$show_field_single_cat);

if(in_array($term->slug, $show_field_array_cat)  && ( count($woocommerce->cart->cart_contents) < 2)  ){
if ( !empty ($btn['checkbox']) && !empty( $btn['label'] ) && ($btn['type'] !== 'changename')  ) {
if (!$_POST[''.$btn['cow'].''] ) {
$woocommerce->add_error( '<strong>'.wpml_string_wccm($btn['label']).'</strong> '. __('is a required field.', 'woocommerce' ) . ' ');
}}
}

}

}} 
} // end cart

// ===========================================================================================
// Products
// hide field


// show field with more
if ( !empty($btn['single_px']) && !empty($btn['more_content']) ) {
$show_field_array = explode('||',$show_field_single);

if(array_intersect($productsarraycm, $show_field_array) ){
if ( !empty ($btn['checkbox']) && !empty( $btn['label'] ) && ($btn['type'] !== 'changename')  ) {
if (!$_POST[''.$btn['cow'].''] ) {
$woocommerce->add_error( '<strong>'.wpml_string_wccm($btn['label']).'</strong> '. __('is a required field.', 'woocommerce' ) . ' ');
}}
}
}




// Category
// hide field

// with more


// show field with more
if ( !empty($btn['single_px_cat']) && !empty($btn['more_content']) ) {
$show_field_array_cat = explode('||',$show_field_single_cat);

if(array_intersect($categoryarraycm, $show_field_array_cat)  ){
if ( !empty ($btn['checkbox']) && !empty( $btn['label'] ) && ($btn['type'] !== 'changename')  ) {
if (!$_POST[''.$btn['cow'].''] ) {
$woocommerce->add_error( '<strong>'.wpml_string_wccm($btn['label']).'</strong> '. __('is a required field.', 'woocommerce' ) . ' ');
}}
}

}


$categoryarraycm = '';
$productsarraycm = '';

}}}

function state_defaultSwitchWooccm() {
$options = get_option( 'wccs_settings' );
if( !empty($options['checkness']['per_state']) && !empty($options['checkness']['per_state_check']) ) {
return ''.$options['checkness']['per_state'].''; 
}
}
add_filter( 'default_checkout_state', 'state_defaultSwitchWooccm' );

function wooccm_clean($string) {

$trim_length = 200;  //desired length of text to display

   $string = str_replace('-', '', $string); // Replaces all spaces with hyphens.
   $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
// $string = preg_replace('/\s+/', '', strip_tags($string)); // removes html and spaces
// $string = preg_replace('/\d/', '', $string); // Replaces multiple hyphens with single one.

return rtrim(substr($string,0,$trim_length));
}

function wccm_woocommerce_delivery_notes_compat( $fields, $order ) {
	$options = get_option( 'wccs_settings' );
        $new_fields = array();


if ( count( $options['buttons'] ) > 0 ) : 
					$i = 0;
					// Loop through each button
					foreach ( $options['buttons'] as $btn ) :
					

    if( get_post_meta( $order->id, ''.wooccm_clean($btn['label']).'', true ) && (($btn['type'] !== 'multiselect') || ($btn['type'] !== 'multicheckbox')) && ($btn['type'] !== 'heading') ) {
        $new_fields[''.$btn['cow'].''] = array( 
            'label' => ''.wpml_string_wccm($btn['label']).'',
            'value' => get_post_meta( $order->id, ''.wooccm_clean($btn['label']).'', true )
        );
    }

if( get_post_meta( $order->id, ''.wooccm_clean($btn['label']).'', true )  && (($btn['type'] == 'multiselect') || ($btn['type'] == 'multicheckbox')) && ($btn['type'] !== 'heading')) {
        $new_fields[''.$btn['cow'].'']['label'] = ''.wpml_string_wccm($btn['label']).'';
	$new_fields[''.$btn['cow'].'']['value'] = '';
	$strings = unserialize(get_post_meta( $order->id , ''.wooccm_clean($btn['label']).'', true));	    
	$iww = 0;

foreach( $strings as $key ) {
if ( $iww == count($strings) - 1) {
$new_fields[''.$btn['cow'].'']['value'] .= $key;
} else {
$new_fields[''.$btn['cow'].'']['value'] .= $key.', ';
}

$iww++;
}


}

$i++;
					endforeach;
endif;
 
    return array_merge( $fields, $new_fields );
}
add_filter( 'wcdn_order_info_fields', 'wccm_woocommerce_delivery_notes_compat', 10, 2 );

function wpml_string_wccm($input) {

if (function_exists( 'icl_t' )) {
return icl_t('WooCommerce Checkout Manager', ''.$input.'', ''.$input.'');
} else {
return $input;
}

}