<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function virtue_child_left_sidebar() {
    register_sidebar( array(
        'name' => __( 'Left Sidebar', 'left-sidebar' ),
        'id' => 'sidebar-left',
        'description' => __( 'Widgets in left area will be shown category.', 'left-sidebar' ),
        'before_title' => '<h1>',
        'after_title' => '</h1>',
    ) );
    register_sidebar( array(
        'name' => __( 'Footer top Sidebar', 'footer-sidebar' ),
        'id' => 'sidebar-footer',
        'description' => __( 'Widgets in bottom area will be show.', 'sidebar-footer' ),
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ) );
}
add_action( 'widgets_init', 'virtue_child_left_sidebar' );


add_action( 'widgets_init', 'override_woocommerce_widgets_product_category', 15 );
 
function override_woocommerce_widgets_product_category() {
  // Ensure our parent class exists to avoid fatal error (thanks Wilgert!)
 
  if ( class_exists( 'WC_Widget_Product_Categories' ) ) {
    unregister_widget( 'WC_Widget_Product_Categories' );
 
    include_once( 'widgets/Custom_WC_widget_product_categories.php' );
 
    register_widget( 'Custom_WC_Widget_Product_Categories' );
  }
}

function virtue_child_display_top_menu()
{
    ?>
    <script type="text/javascript">
        ( function( $ ) {
            $( document ).ready(function() {
            // Cache the elements we'll need
            var menu = $('#cssmenu');
            var menuList = menu.find('ul:first');
            var listItems = menu.find('li').not('#responsive-tab');

            // Create responsive trigger
            menuList.prepend('<li id="responsive-tab"><a href="#">Menu</a></li>');

            // Toggle menu visibility
            menu.on('click', '#responsive-tab', function(){
                    listItems.slideToggle('fast');
                    listItems.addClass('collapsed');
            });
            });
            } )( jQuery );

    </script>
    <div id='cssmenu'>
    <ul >
        <li><a href="http://localhost/saigonhoa" target="_self"><span>Home</span></a></li>
        <?php 
         $taxonomies = array( 
                'product_cat',
            );

            $args = array(
                'orderby'           => 'name', 
                'order'             => 'ASC',
                'hide_empty'        => true, 
                'exclude'           => array(), 
                'exclude_tree'      => array(), 
                'include'           => array(),
                'number'            => '', 
                'fields'            => 'all', 
                'slug'              => '',
                'name'              => '',
                'parent'            => 0,
                'hierarchical'      => true, 
                'child_of'          => 0, 
                'get'               => '', 
                'name__like'        => '',
                'description__like' => '',
                'pad_counts'        => false, 
                'offset'            => '', 
                'search'            => '', 
                'cache_domain'      => 'core'
            ); 
            $output = '';
            $terms = get_terms($taxonomies, $args);
            foreach ($terms as $term_key => $term_value) {
                $term_link = get_term_link($term_value);
                if ( is_wp_error( $term_link ) ) {
                        continue;
                }
                if($term_value->parent == 0)
                {
                    $taxonomy_name = 'product_cat';
                    $termchildren = get_term_children( $term_value->term_id, $taxonomy_name);
                    if(!empty($termchildren))
                    {
                        $output .= '<li class="has-sub"><a href="'.esc_url( $term_link ).'"><span>'.$term_value->name.'</span></a>';
                        $output .= '<ul>';
                        foreach ( $termchildren as $child ) {
                                $term = get_term_by( 'id', $child, $taxonomy_name );
                                $output.= '<li><a href="' . get_term_link( $child, $taxonomy_name ) . '"><span>' . $term->name . '</span></a></li>';
                        }
                        $output.='</ul>';
                    }
                    else
                    {
                        $output .= '<li><a href="'.esc_url( $term_link ).'"><span>'.$term_value->name.'</span></a>';
                    }
                    $output.='</li>';
                }
            }
            echo $output;
        ?>
    </ul>
    </div>    
    <?php
}
if ( ! function_exists( 'virtue_woocommerce_breadcrumb' ) ) {

/**
 * Output the WooCommerce Breadcrumb
 *
 * @access public
 * @return void
 */
function virtue_woocommerce_breadcrumb( $args = array() ) {

$defaults = array(
    'delimiter'  => '',
    'wrap_before'  => '<ul class="woocommerce-breadcrumb">',
    'wrap_after' => '</ul>',
    'before'   => '<li>',
    'after'   => '</li>',
    'home'    => 'Home',
);

$args = wp_parse_args( $args, $defaults  );

woocommerce_get_template( 'global/breadcrumb.php', $args );
}
}
function display_area_login()
{
        if(is_user_logged_in())
         {
            global $current_user;
            get_currentuserinfo();
            echo "<div class='itemlogin'>";
            echo get_avatar( get_the_author_meta( 'ID' ), 40 );
            echo "<div class='name-user'>";
            echo "<p>".$current_user->user_login."</p>";
            echo "<a href='".wp_logout_url(site_url())."'>Logout</a>";
            echo "</div></div>";
        }
        else 
        {
        ?>
            <div class="itemlogin"><a title="login" href="<?php echo site_url('/?page_id=7');?>">Đăng nhập</a></div>      
        <?php 
        }
    
}

add_filter( 'dynamic_sidebar_params', 'custom_widget_recently_viewed' );
  function  custom_widget_recently_viewed( $params )
    {
       // target a sidebar id:
       if( isset( $params[0]['id'] ) && 'sidebar-footer' === $params[0]['id'])
       {    
           // target a widget name:
        
               if( isset( $params[0]['widget_id'] ) && 'woocommerce_recently_viewed_products' === $params[0]['widget_id'] )
               {
                   // Append text before widget:
                   if( isset( $params[0]['before_widget'] ) )
                   { 
                       $params[0]['before_widget'] .= 'before-widget hehehe';
                   }
               }
         }
         return $params;
    }

add_action( 'widgets_init', 'override_woocommerce_widgets_recently_viewed', 15 );
 
function override_woocommerce_widgets_recently_viewed() {
  // Ensure our parent class exists to avoid fatal error (thanks Wilgert!)
 
  if ( class_exists( 'WC_Widget_Recently_Viewed' ) ) {
    unregister_widget( 'WC_Widget_Recently_Viewed' );
 
    include_once( 'widgets/Custom_WC_widget_recently_viewed.php' );
 
    register_widget( 'Custom_WC_widget_recently_viewed' );
  }
}

add_filter( 'woocommerce_get_sections_products', 'wcslider_add_section' );
function wcslider_add_section( $sections ) {
	
	$sections['wcslider'] = __( 'WC Slider', 'text-domain' );
	return $sections;
	
}

add_filter( 'woocommerce_get_settings_products', 'wcslider_all_settings', 10, 2 );
function wcslider_all_settings( $settings, $current_section ) {

	/**
	 * Check the current section is what we want
	 **/

	if ( $current_section == 'wcslider' ) {

		$settings_slider = array();

		// Add Title to the Settings
		$settings_slider[] = array( 'name' => __( 'WC Slider Settings', 'text-domain' ), 'type' => 'title', 'desc' => __( 'The following options are used to configure WC Slider', 'text-domain' ), 'id' => 'wcslider' );

		// Add first checkbox option
		$settings_slider[] = array(

			'name'     => __( 'Auto-insert into single product page', 'text-domain' ),
			'desc_tip' => __( 'This will automatically insert your slider into the single product page', 'text-domain' ),
			'id'       => 'wcslider_auto_insert',
			'type'     => 'checkbox',
			'css'      => 'min-width:300px;',
			'desc'     => __( 'Enable Auto-Insert', 'text-domain' ),

		);

		// Add second text field option
		$settings_slider[] = array(

			'name'     => __( 'Slider Title', 'text-domain' ),
			'desc_tip' => __( 'This will add a title to your slider', 'text-domain' ),
			'id'       => 'wcslider_title',
			'type'     => 'text',
			'desc'     => __( 'Any title you want can be added to your slider with this option!', 'text-domain' ),

		);
		
		$settings_slider[] = array( 'type' => 'sectionend', 'id' => 'wcslider' );

		return $settings_slider;
	
	/**
	 * If not, return the standard settings
	 **/

	} else {

		return $settings;

	}
}

function log_me($message) {
    if ( WP_DEBUG === true ) {
        if ( is_array($message) || is_object($message) ) {
            error_log( print_r($message, true) );
        } else {
            error_log( $message );
        }
    }
}

add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
 
function custom_override_checkout_fields( $fields ) {
    //unset($fields['billing']['billing_first_name']);
    log_me($fields['billing']);
    unset($fields['billing']['billing_last_name']);
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_country']);
    unset($fields['billing']['billing_state']);
    unset($fields['billing']['billing_phone']);
    unset($fields['order']['order_comments']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_last_name']);
    unset($fields['billing']['billing_email']);
    unset($fields['billing']['billing_city']);

    return $fields;
}
/*
add_filter( 'woocommerce_billing_fields', 'custom_woocommerce_billing_fields' );

function custom_woocommerce_billing_fields( $fields ) {

   $fields['billing_first_name']	= array(
      'label'          => __('Name ne', 'woothemes'),
      'placeholder'    => __('Name ne', 'woothemes'),
      'required'       => true,
      'class'          => array('billing-first-name')
   );

   $fields['billing_phone']	= array(
      'label'          => __('Phone', 'woothemes'),
      'placeholder'    => __('Phone', 'woothemes'),
      'required'       => false,
      'class'          => array('billing-phone')
   );

 return $fields;
}
*/

