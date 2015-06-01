<?php
/**
 * @author WPShowCase <admin@wpshowcase.net>
 * @copyright Copyright (c) 2014, WPShowCase.net
 */
 
if (!defined('ABSPATH')) exit;

class WooCommerce_Image_Cart_Widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
				'woocommerce_image_cart_widget',
				__('WooCommerce Cart Image Widget', 'cartwidgetlang'),
				array('description' => __('A widget that displays a cart image and the number of items in the cart.',
					'cartwidgetlang'),)
		);
		add_action('admin_enqueue_scripts', array($this, 'backend_scripts'));
	}

	function dir() {
		return dirname(str_replace($this->change_slashes(WP_CONTENT_DIR),
						$this->change_slashes(WP_CONTENT_URL), $this->change_slashes(__FILE__)));
	}

	function change_slashes($string) {
		return str_replace('\\', '/', str_replace('\\\\', '/', $string));
	}

	function backend_scripts() {
		wp_enqueue_script('wp-color-picker');
		wp_enqueue_style('wp-color-picker');
		wp_enqueue_script('woocommerce-cart-image-backend',
				$this->dir() . '/woocommerce-cart-image-backend.js',
				array('jquery', 'wp-color-picker'), false, true);
	}

	public function widget($args, $instance) {
		global $woocommerce;
		$src = $this->dir() . '/woocommerce-cart-image.png';
		if (isset($instance['upload_woocommerce_cart_image'])) {
			$src = $instance['upload_woocommerce_cart_image'];
		}

		$text_background_color = '#ff0000';
		if (isset($instance['text_background_color'])) {
			$text_background_color = $instance['text_background_color'];
		}

		$text_color = '#ffffff';
		if (isset($instance['text_color'])) {
			$text_color = $instance['text_color'];
		}
		print $args['before_widget'];
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
		print $args['after_widget'];
	}

	public function form($instance) {
		$src = $this->dir() . '/woocommerce-cart-image.png';
		if (isset($instance['upload_woocommerce_cart_image'])) {
			$src = $instance['upload_woocommerce_cart_image'];
		}

		$text_background_color = '#ff0000';
		if (isset($instance['text_background_color'])) {
			$text_background_color = $instance['text_background_color'];
		}

		$text_color = '#ffffff';
		if (isset($instance['text_color'])) {
			$text_color = $instance['text_color'];
		}
		?>


		<label class="upload_woocommerce_cart_image_label">
			<img src="<?php print $src; ?>" class="upload_woocommerce_cart_image_img" style="max-width:250px;" />
		    <input class="upload_woocommerce_cart_image" type="hidden" name="<?php print $this->get_field_name('upload_woocommerce_cart_image'); ?>" value="<?php print $src; ?>" /> 
		    <input class="upload_woocommerce_cart_image_button" class="button" type="button" value="<?php _e('Choose/Upload Image',
				'cartwidgetlang'); ?>" />
		    <br />
		</label>
		<br />
		<label>
			<?php
			_e('Please choose a background color for the number of items in the cart:',
					'cartwidgetlang');
			?>
			<br />
			<input name="<?php print $this->get_field_name('text_background_color'); ?>" class="cart-image-color-picker" value="<?php print $text_background_color; ?>" />
		</label>
		<br />
		<br />
		<label>
		<?php
		_e('Please choose a text color for the number of items in the cart:', 'cartwidgetlang');
		?>
			<br />
			<input name="<?php print $this->get_field_name('text_color'); ?>" class="cart-image-color-picker" value="<?php print $text_color; ?>" />	
		</label>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$('.cart-image-color-picker').wpColorPicker();
				var custom_uploader = null;


				$('.upload_woocommerce_cart_image_button').click(function(e) {
					var parent = $(this).closest('.upload_woocommerce_cart_image_label');
					e.preventDefault();

					if (custom_uploader != null) {
						custom_uploader.open();
						return;
					}

					custom_uploader = wp.media.frames.file_frame = wp.media({
						title: 'Choose Image',
						button: {
							text: 'Choose Image'
						},
						multiple: false
					});

					custom_uploader.on('select', function() {
						attachment = custom_uploader.state().get('selection').first().toJSON();
						parent.find('.upload_woocommerce_cart_image').val(attachment.url);
						parent.find('.upload_woocommerce_cart_image_img').attr('src', attachment.url);
					});

					custom_uploader.open();
				});
			});
		</script>
		<?php
	}

	public function update($new_instance, $old_instance) {
		$instance = array();
		$instance['upload_woocommerce_cart_image'] = esc_url($new_instance['upload_woocommerce_cart_image']);
		$instance['text_background_color'] = $this->sanitize_color($new_instance['text_background_color']);
		$instance['text_color'] = $this->sanitize_color($new_instance['text_color']);
		return $instance;
	}

	function sanitize_color($color) {
		if ('' === $color) return '';

		if (preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color)) return $color;

		return null;
	}

}

function register_woocommerce_image_cart_widget() {
	register_widget('WooCommerce_Image_Cart_Widget');
}

add_action('widgets_init', 'register_woocommerce_image_cart_widget');
?>