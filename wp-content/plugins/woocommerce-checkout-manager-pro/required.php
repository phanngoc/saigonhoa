<?php 

// =============================== BILLING =================================
add_filter( 'woocommerce_billing_fields', 'required_fields_override_billing' );
function required_fields_override_billing( $fields ) {
$options = get_option( 'wccs_settings' );

// ======================== Positioning =========================
if (  !empty ($options['checkness']['positionb1'] ) ) {
$fields['billing_first_name']['class'] = array(''.$options['checkness']['positionb1'].'');
}
if (  !empty($options['checkness']['positionb2'] ) ) {
$fields['billing_last_name']['class'] = array(''.$options['checkness']['positionb2'].'');
}
if ( !empty ($options['checkness']['positionb3'] ) ) {
$fields['billing_phone']['class'] = array(''.$options['checkness']['positionb3'].'');
}
if ( !empty($options['checkness']['positionb4'] ) ) {
$fields['billing_email']['class'] = array(''.$options['checkness']['positionb4'].'');
}
if ( !empty ($options['checkness']['positionb5'] ) ) {
$fields['billing_company']['class'] = array(''.$options['checkness']['positionb5'].'');
}
if ( !empty($options['checkness']['positionb7'] ) ) {
$fields['billing_country']['class'] = array(''.$options['checkness']['positionb7'].'');
}
if ( !empty($options['checkness']['positionb8']) ) {
$fields['billing_address_1']['class'] = array(''.$options['checkness']['positionb8'].'');
}
if ( !empty($options['checkness']['positionb9']) ) {
$fields['billing_address_2']['class'] = array(''.$options['checkness']['positionb9'].'');
}
if ( !empty($options['checkness']['positionb10']) ) {
$fields['billing_city']['class'] = array(''.$options['checkness']['positionb10'].'');
}
if ( !empty($options['checkness']['positionb11']) ) {
$fields['billing_postcode']['class'] = array(''.$options['checkness']['positionb11'].'');
}
if ( !empty($options['checkness']['positionb12']) ) {
$fields['billing_state']['class'] = array(''.$options['checkness']['positionb12'].'');
}

// ======================= Clear =================================
if (  !empty ($options['checkness']['wccs_clear1'] ) ) {
$fields['billing_first_name']['clear'] = $options['checkness']['wccs_clear1'];
}
if (  !empty($options['checkness']['wccs_clear2'] ) ) {
$fields['billing_last_name']['clear'] = $options['checkness']['wccs_clear2'];
}
if ( !empty ($options['checkness']['wccs_clear3'] ) ) {
$fields['billing_phone']['clear'] = $options['checkness']['wccs_clear3'];
}
if ( !empty($options['checkness']['wccs_clear4'] ) ) {
$fields['billing_email']['clear'] = $options['checkness']['wccs_clear4'];
}
if ( !empty ($options['checkness']['wccs_clear5'] ) ) {
$fields['billing_company']['clear'] = $options['checkness']['wccs_clear5'];
}
if ( !empty($options['checkness']['wccs_clear7'] ) ) {
$fields['billing_country']['clear'] = $options['checkness']['wccs_clear7'];
}
if ( !empty($options['checkness']['wccs_clear8']) ) {
$fields['billing_address_1']['clear'] = $options['checkness']['wccs_clear8'];
}
if ( !empty($options['checkness']['wccs_clear9']) ) {
$fields['billing_address_2']['clear'] = $options['checkness']['wccs_clear9'];
}
if ( !empty($options['checkness']['wccs_clear10']) ) {
$fields['billing_city']['clear'] = $options['checkness']['wccs_clear10'];
}
if ( !empty($options['checkness']['wccs_clear11']) ) {
$fields['billing_postcode']['clear'] = $options['checkness']['wccs_clear11'];
}
if ( !empty($options['checkness']['wccs_clear12']) ) {
$fields['billing_state']['clear'] = $options['checkness']['wccs_clear12'];
}
// ===============================================================
if (  !empty ($options['checkness']['wccs_rq_1'] ) ) {
$fields['billing_first_name']['required'] = false;
}
if (  !empty($options['checkness']['wccs_rq_2'] ) ) {
$fields['billing_last_name']['required'] = false;
}
if ( !empty($options['checkness']['wccs_rq_4']) ) {
$fields['billing_address_1']['required'] = false;
}
if ( !empty($options['checkness']['wccs_rq_5']) ) {
$fields['billing_address_2']['required'] = false;
}
if ( !empty($options['checkness']['wccs_rq_6']) ) {
$fields['billing_city']['required'] = false;
}
if ( !empty($options['checkness']['wccs_rq_7']) ) {
$fields['billing_postcode']['required'] = false;
}
if ( !empty($options['checkness']['wccs_rq_8'] ) ) {
$fields['billing_country']['required'] = false;
}
if ( !empty($options['checkness']['wccs_rq_9']) ) {
$fields['billing_state']['required'] = false;
}
if ( !empty($options['checkness']['wccs_rq_11'] ) ) {
$fields['billing_email']['required'] = false;
}
if ( !empty ($options['checkness']['wccs_rq_10'] ) ) {
$fields['billing_phone']['required'] = false;
}
if ( !empty( $options['replace']['placeholder4'] ) ) {
$fields['billing']['billing_email']['placeholder'] = wpml_string_wccm($options['replace']['placeholder4']);
}
if ( !empty( $options['replace']['label4'] ) ) {
$fields['billing']['billing_email']['label'] = wpml_string_wccm($options['replace']['label4']);
}
if ( !empty( $options['replace']['label3'] ) ) {
$fields['billing']['billing_phone']['label'] = wpml_string_wccm($options['replace']['label3']);
}
if ( !empty( $options['replace']['placeholder3'] ) ) {
$fields['billing']['billing_phone']['placeholder'] = wpml_string_wccm($options['replace']['placeholder3']);
}
if ( !empty( $options['replace']['label1'] ) ) {
$fields['billing']['billing_last_name']['label'] = wpml_string_wccm($options['replace']['label1']);
}
if ( !empty( $options['replace']['placeholder1'] ) ) {
$fields['billing']['billing_last_name']['placeholder'] = wpml_string_wccm($options['replace']['placeholder1']);
}
if ( !empty( $options['replace']['label'] ) ) {
$fields['billing']['billing_first_name']['label'] = wpml_string_wccm($options['replace']['label']); 
}
if ( !empty( $options['replace']['placeholder'] ) ) {
$fields['billing']['billing_first_name']['placeholder'] = wpml_string_wccm($options['replace']['placeholder']);
}
if ( !empty( $options['replace']['label5'] ) ) {
$fields['billing']['billing_company']['label'] = wpml_string_wccm($options['replace']['label5']);
}
if ( !empty( $options['replace']['placeholder2'] ) ) {
$fields['billing']['billing_company']['placeholder'] = wpml_string_wccm($options['replace']['placeholder2']);
}

return $fields;
}

// ========================== SHIPPING ===============================
add_filter( 'woocommerce_shipping_fields', 'required_fields_override_shipping' );
function required_fields_override_shipping( $fields ) {
$options = get_option( 'wccs_settings' );

// ======================== Positioning =========================
if (  !empty ($options['checkness']['positionb13'] ) ) {
$fields['billing_first_name']['class'] = array(''.$options['checkness']['positionb13'].'');
}
if (  !empty($options['checkness']['positionb14'] ) ) {
$fields['billing_last_name']['class'] = array(''.$options['checkness']['positionb14'].'');
}
if ( !empty ($options['checkness']['positionb15'] ) ) {
$fields['billing_company']['class'] = array(''.$options['checkness']['positionb15'].'');
}
if ( !empty($options['checkness']['positionb16'] ) ) {
$fields['billing_country']['class'] = array(''.$options['checkness']['positionb16'].'');
}
if ( !empty($options['checkness']['positionb17']) ) {
$fields['billing_address_1']['class'] = array(''.$options['checkness']['positionb17'].'');
}
if ( !empty($options['checkness']['positionb18']) ) {
$fields['billing_address_2']['class'] = array(''.$options['checkness']['positionb18'].'');
}
if ( !empty($options['checkness']['positionb19']) ) {
$fields['billing_city']['class'] = array(''.$options['checkness']['positionb19'].'');
}
if ( !empty($options['checkness']['positionb20']) ) {
$fields['billing_postcode']['class'] = array(''.$options['checkness']['positionb20'].'');
}
if ( !empty($options['checkness']['positionb21']) ) {
$fields['billing_state']['class'] = array(''.$options['checkness']['positionb21'].'');
}

// ======================= Clear =================================
if (  !empty ($options['checkness']['wccs_clear13'] ) ) {
$fields['billing_first_name']['clear'] = $options['checkness']['wccs_clear13'];
}
if (  !empty($options['checkness']['wccs_clear14'] ) ) {
$fields['billing_last_name']['clear'] = $options['checkness']['wccs_clear14'];
}
if ( !empty ($options['checkness']['wccs_clear15'] ) ) {
$fields['billing_company']['clear'] = $options['checkness']['wccs_clear15'];
}
if ( !empty($options['checkness']['wccs_clear16'] ) ) {
$fields['billing_country']['clear'] = $options['checkness']['wccs_clear16'];
}
if ( !empty($options['checkness']['wccs_clear17']) ) {
$fields['billing_address_1']['clear'] = $options['checkness']['wccs_clear17'];
}
if ( !empty($options['checkness']['wccs_clear18']) ) {
$fields['billing_address_2']['clear'] = $options['checkness']['wccs_clear18'];
}
if ( !empty($options['checkness']['wccs_clear19']) ) {
$fields['billing_city']['clear'] = $options['checkness']['wccs_clear19'];
}
if ( !empty($options['checkness']['wccs_clear20']) ) {
$fields['billing_postcode']['clear'] = $options['checkness']['wccs_clear20'];
}
if ( !empty($options['checkness']['wccs_clear21']) ) {
$fields['billing_state']['clear'] = $options['checkness']['wccs_clear21'];
}
// ===============================================================
if (  !empty ($options['check']['wccs_rq_1_s'] ) ) {
$fields['shipping_first_name']['required'] = false;
}
if (  !empty ($options['check']['wccs_rq_2_s'] ) ) {
$fields['shipping_last_name']['required'] = false;
}
if ( !empty($options['check']['wccs_rq_4_s']) ) {
$fields['shipping_address_1']['required'] = false;
}
if ( !empty($options['check']['wccs_rq_5_s']) ) {
$fields['shipping_address_2']['required'] = false;
}
if ( !empty($options['check']['wccs_rq_6_s']) ) {
$fields['shipping_city']['required'] = false;
}
if ( !empty($options['check']['wccs_rq_7_s']) ) {
$fields['shipping_postcode']['required'] = false;
}
if ( !empty($options['check']['wccs_rq_9_s']) ) {
$fields['shipping_state']['required'] = false;
}
if ( !empty( $options['replace']['label_s'] ) ) {
$fields['shipping']['shipping_first_name']['label'] = wpml_string_wccm($options['replace']['label_s']);
}
if ( !empty( $options['replace']['placeholder_s'] ) ) {
$fields['shipping']['shipping_first_name']['placeholder'] = wpml_string_wccm($options['replace']['placeholder_s']);
}
if ( !empty( $options['replace']['label_s1'] ) ) {
$fields['shipping']['shipping_last_name']['label'] = wpml_string_wccm($options['replace']['label_s1']);
}
if ( !empty( $options['replace']['placeholder_s1'] ) ) {
$fields['shipping']['shipping_last_name']['placeholder'] = wpml_string_wccm($options['replace']['placeholder_s1']);
}
if ( !empty( $options['replace']['label_s2'] ) ) {
$fields['shipping']['shipping_company']['label'] = wpml_string_wccm($options['replace']['label_s2']);
}
if ( !empty( $options['replace']['placeholder_s2'] ) ) {
$fields['shipping']['shipping_company']['placeholder'] = wpml_string_wccm($options['replace']['placeholder_s2']);
}

return $fields;
}


// ======================================== ORDER COMMENTS ======================================
add_filter( 'woocommerce_checkout_fields' , 'order_comments_wccs_override' );

function order_comments_wccs_override($fields) {
$options = get_option( 'wccs_settings' );

if ( !empty( $options['replace']['label11'] ) ) {
$fields['order']['order_comments']['label'] = wpml_string_wccm($options['replace']['label11']);
}
if ( !empty( $options['replace']['placeholder11'] ) ) {
$fields['order']['order_comments']['placeholder'] = wpml_string_wccm($options['replace']['placeholder11']);
}

return $fields;
}

function wccm_removefields_unset($fields) {
$options = get_option( 'wccs_settings' );

if (  !empty ($options['checkness']['wccs_opt_1'] ) ) {
unset($fields['billing']['billing_first_name']);
}
if (  !empty ($options['checkness']['wccs_opt_2'] ) ) {
unset($fields['billing']['billing_last_name']); 
}
if (  !empty ($options['checkness']['wccs_opt_3'] ) ) {
unset($fields['billing']['billing_company']);
}
if (  !empty ($options['checkness']['wccs_opt_4'] ) ) {
unset($fields['billing']['billing_address_1']); 
}
if (  !empty ($options['checkness']['wccs_opt_5'] ) ) {
unset($fields['billing']['billing_address_2']); 
}
if (  !empty ($options['checkness']['wccs_opt_6'] )  ) {
unset($fields['billing']['billing_city']);
}
if (  !empty ($options['checkness']['wccs_opt_7'] )  ) {
unset($fields['billing']['billing_postcode']);
}
if (  !empty ($options['checkness']['wccs_opt_8'] ) ) {
unset($fields['billing']['billing_country']);
}
if (  !empty ($options['checkness']['wccs_opt_9'] ) ) {
unset($fields['billing']['billing_state']);
}
if (  !empty ($options['checkness']['wccs_opt_10'] ) ) {
unset($fields['billing']['billing_phone']);
}
if (  !empty ($options['checkness']['wccs_opt_11'] ) ) {
unset($fields['billing']['billing_email']);
}
if (  !empty ($options['checkness']['wccs_opt_12'] ) ) {
unset($fields['order']['order_comments']);
}


// ================== CLEAR ==========================
if (  !empty ($options['check']['wccs_opt_1_s'] ) ) {
unset($fields['shipping']['shipping_first_name']);
}
if (  !empty ($options['check']['wccs_opt_2_s'] ) ) {
unset($fields['shipping']['shipping_last_name']); 
}
if (  !empty ($options['check']['wccs_opt_3_s'] ) ) {
unset($fields['shipping']['shipping_company']);
}
if (  !empty ($options['check']['wccs_opt_4_s'] ) ) {
unset($fields['shipping']['shipping_address_1']); 
}
if (  !empty ($options['check']['wccs_opt_5_s'] ) ) {
unset($fields['shipping']['shipping_address_2']); 
}
if (  !empty ($options['check']['wccs_opt_6_s'] )  ) {
unset($fields['shipping']['shipping_city']);
}
if (  !empty ($options['check']['wccs_opt_7_s'] )  ) {
unset($fields['shipping']['shipping_postcode']);
}
if (  !empty ($options['check']['wccs_opt_8_s'] ) ) {
unset($fields['shipping']['shipping_country']);
}
if (  !empty ($options['check']['wccs_opt_9_s'] ) ) {
unset($fields['shipping']['shipping_state']);
}
if (  !empty ($options['check']['wccs_opt_10_s'] ) ) {
unset($fields['shipping']['shipping_phone']);
}
if (  !empty ($options['check']['wccs_opt_11_s'] ) ) {
unset($fields['shipping']['shipping_email']);
}


return $fields;
}
add_filter( 'woocommerce_checkout_fields' , 'wccm_removefields_unset' );


add_action('woocommerce_before_checkout_form','abbr_remove_just_inCase');
function abbr_remove_just_inCase() {
$options = get_option( 'wccs_settings' );

echo '<style type="text/css">';
if ( !empty($options['checkness']['wccs_rq_4']) ) {
echo '#billing_address_1_field label abbr {display:none;}';
}
if ( !empty($options['checkness']['wccs_rq_5']) ) {
echo '#billing_address_2_field label abbr {display:none;}';
}
if ( !empty($options['checkness']['wccs_rq_6']) ) {
echo '#billing_city_field label abbr {display:none;}';
}
if ( !empty($options['checkness']['wccs_rq_7']) ) {
echo '#billing_postcode_field label abbr {display:none;}';
}
if ( !empty($options['checkness']['wccs_rq_9']) ) {
echo '#billing_state_field label abbr {display:none;}';
}
if ( !empty($options['check']['wccs_rq_4_s']) ) {
echo '#shipping_address_1_field label abbr {display:none;}';
}
if ( !empty($options['check']['wccs_rq_5_s']) ) {
echo '#shipping_address_2_field label abbr {display:none;}';
}
if ( !empty($options['check']['wccs_rq_6_s']) ) {
echo '#shipping_city_field label abbr {display:none;}';
}
if ( !empty($options['check']['wccs_rq_7_s']) ) {
echo '#shipping_postcode_field label abbr {display:none;}';
}
if ( !empty($options['check']['wccs_rq_9_s']) ) {
echo '#shipping_state_field label abbr {display:none;}';
}
echo '</style>';

}