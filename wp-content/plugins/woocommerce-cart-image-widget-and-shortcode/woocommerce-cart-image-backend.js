/**
 * @author WPShowCase <admin@wpshowcase.net>
 * @copyright Copyright (c) 2014, WPShowCase.net
 */
 
 jQuery(document).ready(function($){
	$('.cart-image-color-picker').wpColorPicker();
	$('.cart-image-color-picker').load(function() {
		$('.cart-image-color-picker').wpColorPicker();
	});
});