<?php  global $virtue; 
			if(isset($virtue['mobile_switch'])) {$mobile_slider = $virtue['mobile_switch']; } else { $mobile_slider = '0';}
			if(isset($virtue['choose_slider'])) {$slider = $virtue['choose_slider'];} else {$slider = 'mock_flex';}
			if($mobile_slider == '1') {
		 		$mslider = $virtue['choose_mobile_slider'];
				if ($mslider == "flex") {
					get_template_part('templates/mobile_home/mobileflex', 'slider');
				} else if ($mslider == "video") {
					get_template_part('templates/mobile_home/mobilevideo', 'block');
				} 
			}
			if ($slider == "flex") {
					get_template_part('templates/home/flex', 'slider');
				}
				else if ($slider == "thumbs") {
					get_template_part('templates/home/thumb', 'slider');
				}
				else if ($slider == "latest") {
					get_template_part('templates/home/latest', 'slider');
				}
				else if ($slider == "carousel") {
					get_template_part('templates/home/carousel', 'slider');
				}
				else if ($slider == "video") {
					get_template_part('templates/home/video', 'block');
				}
				else if ($slider == "mock_flex") {
					get_template_part('templates/home/mock', 'flex');
			}
$show_pagetitle = false;
if(isset($virtue['homepage_layout']['enabled'])){
		$i = 0;
		foreach ($virtue['homepage_layout']['enabled'] as $key=>$value) {
			if($key == "block_one") {
				$show_pagetitle = true;
			}
			$i++;
			if($i==2) break;
		}
	} 
	if($show_pagetitle == true) {
		?>
                <div id="homeheader" class="welcomeclass">
			<div class="container">
                            <?php get_template_part('templates/page', 'header'); ?>
			</div>
		</div><!--titleclass-->
	<?php } ?>
	
    <div id="content" class="container homepagecontent">
   		<div class="row">
          <div class="main <?php echo kadence_main_class(); ?>" role="main">

      	<?php 
        if(isset($virtue['homepage_layout']['enabled'])) 
            { 
                $layout = $virtue['homepage_layout']['enabled']; 
            } 
            else 
            {
                $layout = array("block_twenty" => "block_twenty", "block_five" => "block_five");  
            }
            print_r($layout);
            echo get_page_template();
				if ($layout):

				foreach ($layout as $key=>$value) {

				    switch($key) {

				    	case 'block_one':?>
						   <?php if($show_pagetitle == false) {?>
                                                        <div id="homeheader" class="welcomeclass">
									<?php get_template_part('templates/page', 'header'); ?>
							</div><!--titleclass-->
							<?php }?>
					    <?php 
					    break;
						case 'block_four': ?>
                                                        <h2>test <?php var_dump(is_home());?></h2>
							<?php if(is_home()) { ?>
							<?php if(kadence_display_sidebar()) {$display_sidebar = true; $fullclass = '';} else {$display_sidebar = false; $fullclass = 'fullwidth';} ?>
							<?php global $virtue; if(isset($virtue['home_post_summery']) and ($virtue['home_post_summery'] == 'full')) {$summery = "full"; $postclass = "single-article fullpost";} else {$summery = "summery"; $postclass = "postlist";} ?>
								<div class="homecontent <?php echo $fullclass; ?>  <?php echo $postclass; ?> clearfix home-margin"> 
                                                                     
							<?php while (have_posts()) : the_post(); ?>
                                                                   
							  <?php  if($summery == 'full') {
											if($display_sidebar){
												get_template_part('templates/content', 'fullpost'); 
											} else {
												get_template_part('templates/content', 'fullpostfull');
											}
									} else {
											if($display_sidebar){
											 	get_template_part('templates/content', get_post_format()); 
											 } else {
											 	get_template_part('templates/content', 'fullwidth');
											 }
									}?>
							<?php endwhile; ?>
							<?php if ($wp_query->max_num_pages > 1) : ?>
						        <?php $bignumber = 999999999;
						        $pagargs = array(
						          'base' => str_replace( $bignumber, '%#%', esc_url( get_pagenum_link( $bignumber ) ) ),
						          'format'       => '?page=%#%',
						          'total' => $wp_query->max_num_pages,
						          'current' => max( 1, get_query_var('paged') ),
						          'prev_next'    => True,
						          'prev_text'    => '«',
						          'next_text'    => '»',
						          'type'         => 'plain',
						        ); ?>
						        <div class="wp-pagenavi">
						        <?php echo paginate_links( $pagargs ); ?>
						        </div>
						        
						        <?php endif; ?>
							</div> 
						<?php } else { ?>
                                                          <h2>vao else</h2>
                                                        <div class="homecontent clearfix home-margin"> 
                                                                <?php get_template_part('templates/content', 'page'); ?>
                                                        </div>
						<?php 	}
						break;
						case 'block_five':
								get_template_part('templates/home/blog', 'home'); 
						break;
						case 'block_six':
								get_template_part('templates/home/portfolio', 'carousel');		 
						break; 
						case 'block_seven':
								get_template_part('templates/home/icon', 'menu');		 
						break;
						case 'block_twenty':
								get_template_part('templates/home/icon', 'menumock');		 
						break;  
					    }

}
endif; ?>   


</div><!-- /.main -->