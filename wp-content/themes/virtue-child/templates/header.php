<header class="banner headerclass" role="banner">

<?php global $virtue; if(isset($virtue['logo_layout'])) {
  if($virtue['logo_layout'] == 'logocenter') {$logocclass = 'col-md-12'; $menulclass = 'col-md-12';}
  else if($virtue['logo_layout'] == 'logohalf') {$logocclass = 'col-md-6'; $menulclass = 'col-md-6';}
  else {$logocclass = 'col-md-4'; $menulclass = 'col-md-8';} 
} else {$logocclass = 'col-md-4'; $menulclass = 'col-md-8'; }?>
    <style type="text/css">
        a > img{
            display : block;
            width : 100%;
            height : 100%;
        }
    </style>
  <div class="container">
    <div class="row">
           <a class="brand logofont col-md-9" href="<?php echo home_url(); ?>/" style="display: block;" >
               <img src="http://phanngocebs.tk/saigonhoa/wp-content/uploads/2015/01/bg960x1201.jpg" width="100%" height="100%"/>
           </a>
            <div class="col-md-3">
                  <div class="topbarmenu clearfix">
                    <?php if (has_nav_menu('topbar_navigation')) :
                        wp_nav_menu(array('theme_location' => 'topbar_navigation', 'menu_class' => 'sf-menu'));
                      endif;?>
                      <?php if(kadence_display_topbar_icons()) : ?>
                      <div class="topbar_social">
                        <ul>
                          <?php global $virtue; $top_icons = $virtue['topbar_icon_menu'];
                          foreach ($top_icons as $top_icon) {
                            if(!empty($top_icon['target']) && $top_icon['target'] == 1) {$target = '_blank';} else {$target = '_self';}
                            echo '<li><a href="'.$top_icon['link'].'" target="'.$target.'" title="'.esc_attr($top_icon['title']).'" data-toggle="tooltip" data-placement="bottom" data-original-title="'.esc_attr($top_icon['title']).'">';
                            if($top_icon['url'] != '') echo '<img src="'.$top_icon['url'].'"/>' ; else echo '<i class="'.$top_icon['icon_o'].'"></i>';
                            echo '</a></li>';
                          } ?>
                        </ul>
                      </div>
                    <?php endif; ?>
                      <?php global $virtue; if(isset($virtue['show_cartcount'])) {
                         if($virtue['show_cartcount'] == '1') { 
                          if (class_exists('woocommerce')) {
                            global $woocommerce; ?>
                            <ul class="kad-cart-total">
                                <li>
                                <a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php esc_attr_e('View your shopping cart', 'woocommerce'); ?>">
                                    <i class="icon-shopping-cart" style="padding-right:5px;"></i> <span class="kad-cart-dash">-</span> <?php echo $woocommerce->cart->get_cart_total(); ?>
                                </a>
                                </li>
                            </ul>
                          <?php } } }?>
                    </div>
                <div class="botbarmenu clearfix">
                    <?php display_area_login(); ?>
                </div>
            </div>
    </div> <!-- Close Row -->
    <?php if (has_nav_menu('mobile_navigation')) : ?>
           <div id="mobile-nav-trigger" class="nav-trigger">
              <a class="nav-trigger-case mobileclass collapsed" rel="nofollow" data-toggle="collapse" data-target=".kad-nav-collapse">
                <div class="kad-navbtn"><i class="icon-reorder"></i></div>
                <div class="kad-menu-name"><?php echo __('Menu', 'virtue'); ?></div>
              </a>
            </div>
            <div id="kad-mobile-nav" class="kad-mobile-nav">
              <div class="kad-nav-inner mobileclass">
                <div class="kad-nav-collapse">
                 <?php wp_nav_menu( array('theme_location' => 'mobile_navigation','items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>', 'menu_class' => 'kad-mnav')); ?>
               </div>
            </div>
          </div>   
          <?php  endif; ?> 
  </div> <!-- Close Container -->
  <?php if (kadence_display_topbar()) : ?>
  <section id="topbar" class="topclass">
    <div class="container">
      <div class="row">
        <div class="col-md-10 virtue_menu_main">
              <?php virtue_child_display_top_menu();?>
        </div>  
        <div class="col-md-2 col-sm-2 kad-topbar-right">
          <div id="topbar-search" class="topbar-widget">
            <?php if(kadence_display_topbar_widget()) { if(is_active_sidebar('topbarright')) { dynamic_sidebar('topbarright'); } 
              } else { if(kadence_display_top_search()) {get_search_form();} 
          } ?>
        </div>
        </div> <!-- close col-md-6-->
      </div> <!-- Close Row -->
    </div> <!-- Close Container -->
  </section>
<?php endif; ?>
  
  
  
  <?php
    if (has_nav_menu('secondary_navigation')) : ?>
        <section id="cat_nav" class="navclass">
            <div class="container">
             <nav id="nav-second" class="clearfix" role="navigation">
                <?php wp_nav_menu(array('theme_location' => 'secondary_navigation', 'menu_class' => 'sf-menu')); ?>
             </nav>
            </div><!--close container-->
        </section>
    <?php endif; ?> 
     <?php global $virtue; if (!empty($virtue['virtue_banner_upload']['url'])) { ?> <div class="container"><div class="virtue_banner"><img src="<?php echo esc_url($virtue['virtue_banner_upload']['url']); ?>" /></div></div> <?php } ?>
</header>
