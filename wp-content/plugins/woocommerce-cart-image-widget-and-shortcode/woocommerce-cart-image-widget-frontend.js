/**
 * @author WPShowCase <admin@wpshowcase.net>
 * @copyright Copyright (c) 2014, WPShowCase.net
 */

jQuery(document).ready(function($) {

	function updateCartImageText() {
		var data = {
			action: 'get_number_of_items_in_cart'
		};
		$.post(woocommerceCartWidget.ajaxurl, data, function(response) {
			$('.woocommerce-cart-image-text').html(response);
			if(response == '0') {
				$('.woocommerce-cart-image-text').hide(1000);
			} else {
				$('.woocommerce-cart-image-text').show(1000);
			}
			setTimeout(updateCartImageText, 1000);
		});
	}

	if($('.woocommerce-cart-image-text').length>0) {
		updateCartImageText();
	}
  
});