<?php

   function esip($ip_addr) 
{ 
  //first of all the format of the ip address is matched 
  if(preg_match("/^(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})$/",$ip_addr)) 
  { 
    //now all the intger values are separated 
    $parts=explode(".",$ip_addr); 
    //now we need to check each part can range from 0-255 
    foreach($parts as $ip_parts) 
    { 
      if(intval($ip_parts)>255 || intval($ip_parts)<0) 
      return FALSE; //if number is not within range of 0-255 
    } 
    return TRUE; 
  } 
  else 
    return FALSE; //if format of ip address doesn't matches 
} 

    
    
    function domain($domainb) 
    { 
    $bits = explode('/', $domainb); 
    if ($bits[0]=='http:' || $bits[0]=='https:') 
    { 
    $domainb= $bits[2]; 
    } else { 
    $domainb= $bits[0]; 
    } 
    unset($bits); 
    $bits = explode('.', $domainb); 
    $idz=count($bits); 
    $idz-=3; 
    if (strlen($bits[($idz+2)])==2) { 
    $url=$bits[$idz].'.'.$bits[($idz+1)].'.'.$bits[($idz+2)]; 
    } else if (strlen($bits[($idz+2)])==0) { 
    $url=$bits[($idz)].'.'.$bits[($idz+1)]; 
    } else { 
    $url=$bits[($idz+1)].'.'.$bits[($idz+2)]; 
    } 
    return $url; 
    } 

function check_domainIP( $domain ) {
$bits = explode('.', $domain);

if ( count( $bits ) == 4 ) {
if ( is_numeric($bits[0]) && is_numeric($bits[1]) && is_numeric($bits[2]) && is_numeric($bits[3]) ) {
return true;
} 
else {
return false;
}
} else {
return false;
}

}


add_option( 'wccmkelizn32aunique', '0' ); 
function pg_eptxml() {
if( isset($_POST['lw_eptxml']) ) { 
if (substr($_POST['lw_eptxml'],-1,1) == ',') {
    $_POST['lw_eptxml'] = str_replace(',','',$_POST['lw_eptxml']);
}
update_option( 'wccmkelizn32aunique', $_POST['lw_eptxml'] ); 
echo '<div class="updated"><p><strong>'.__('License Code Saved.').'</strong></p></div>';
} 
?>

<div class="wrap"></div>

<style type="text/css">
#lw_eptxml {
width:55%;
}
.no {
background:red;
padding:25.5%;
color:#fff;
width:55%;
}
.yes{
background:green;
padding:25.9%;
color:#fff;
width:55%;
}
</style>

<h2><?php _e( 'WooCommerce Checkout Manager Pro License', 'woocommerce-checkout-manager-pro' ); ?></h2> 

<span style="color:#7ad03a">
<?php if ( !function_exists('curl_version') ) { echo __('Please contact your hosting company to enable cURL.', 'woocommerce-checkout-manager-pro'); } ?>
</span>


<form action="admin.php?page=License_check_slug" method="post">
<table style="margin-top:40px;" class="wp-list-table widefat tags ui-sortable">
<thead>
	<tr>
		<th><?php _e('Licensing Validator','woocommerce-checkout-manager-pro'); ?></th>
	    <th>
        <span style="font-size: 11px;color:red;">
        <?php
            if ( !woocmmatl() && get_option('errfafvetcgrt6434cwooccminfo15907833') == 'connection_error' ) {
                _e('Unable to connect! Please contact your hosting company to add trottyzone.com to the whitelist.', 'woocommerce-checkout-manager-pro');
            }elseif (woocmmatl() && get_option('errfafvetcgrt6434cwooccminfo15907833') == 'clear') {
                
            }elseif ( !woocmmatl() && get_option('errfafvetcgrt6434cwooccminfo15907833') == 'change_site' ) {
                _e('Current site running the plguin is not registered. Click Change Site button to register this site.', 'woocommerce-checkout-manager-pro');
            }elseif ( !woocmmatl() && get_option('errfafvetcgrt6434cwooccminfo15907833') == 'not_exsit') {
                _e('License Code does not exist! Please check the code.', 'woocommerce-checkout-manager-pro');
            }
    
        ?>
        </span>
        </th>
	</tr>
</thead>

<tbody>
	<tr>
		<td><?php _e('Status','woocommerce-checkout-manager-pro'); ?></td>
		<td>

<?php if( woocmmatl() ) { ?>
<span class="yes"><?php _e('Valid','woocommerce-checkout-manager-pro'); ?></span>
<?php } ?>

<?php if( !woocmmatl() ) { ?>
<span class="no"><?php _e('Invalid','woocommerce-checkout-manager-pro'); ?></span>
<?php } ?>

		</td>
	</tr>
</tbody>


<tbody>
	<tr>
		<td><?php _e('License Code','woocommerce-checkout-manager-pro'); ?></td>
		<td><input id="lw_eptxml" name="lw_eptxml" size="70" type="text" value="<?php echo get_option('wccmkelizn32aunique'); ?>" /></td>
	</tr>

	<tr>
		<td><a href="http://www.trottyzone.com/edit-account/"><input type="button" class="button-secondary" value="<?php _e('Change Site ?','woocommerce-checkout-manager-pro'); ?>" /></a></td>
		<td><input type="submit" class="button-primary" value="<?php _e('Validate','woocommerce-checkout-manager-pro'); ?>" /></td>
</tr>
</tbody>

</table>
</form>
<?php 
}

function woocmmatl() { global $wp_version; $address= $_SERVER['HTTP_HOST']; if ( check_domainIP( $address ) == false ) { $parsed_url = parse_url($address); $check = esip($parsed_url['host']); $host = $parsed_url['host']; if ($check == FALSE){ if ($host != ""){ if ( substr(domain($host), 0, 1) == '.' ) { $host = str_replace('www.','',substr(domain($host), 1)); } else { $host = str_replace('www.','',domain($host)); } }else{ if ( substr(domain($address), 0, 1) == '.' ) { $host = str_replace('www.','',substr(domain($address), 1)); } else { $host = str_replace('www.','',domain($address)); }  } } } else { $host = $address; }  $valuexg = get_option('wccmkelizn32aunique');  if ( strpos($_SERVER['REQUEST_URI'], 'License_check_slug') || strpos($_SERVER['REQUEST_URI'], 'woocommerce-checkout-manager-pro.php') ) {   if ( substr( $_SERVER['REMOTE_ADDR'] , 0, 3) == "127" || $_SERVER['REMOTE_ADDR'] == "1" || $_SERVER['REMOTE_ADDR'] == "::1" ) { return true; } else {  if ( !empty( $valuexg ) ) { $api_url = 'http://www.trottyzone.com/wp-content/plugins/wp-licensing/auth/verify.php';  $request_string = array( 'body' => array( 'key' => $valuexg, 'domain' => $host, 'product' => 'woocommerce-checkout-manager-pro' ), 'user-agent' => 'WordPress/' . $wp_version . '; ' . get_bloginfo('url') );  $result['valid'] = 'true';  if (is_wp_error($result)) { update_option('errfafvetcgrt6434cwooccminfo15907833', 'connection_error'); }else {  $result = json_decode($result, true);  if ($result['valid'] == 'true') { update_option('errfafvetcgrt6434cwooccminfo15907833', 'clear'); }elseif ($result['info']['domain'] !== 'NA' && $result['valid'] == 'false' ) { update_option('errfafvetcgrt6434cwooccminfo15907833', 'change_site'); }elseif ($result['info']['domain'] == 'NA') { update_option('errfafvetcgrt6434cwooccminfo15907833', 'not_exsit'); } }  if($result['valid'] == 'true'){ return true; }}}}  return false; }