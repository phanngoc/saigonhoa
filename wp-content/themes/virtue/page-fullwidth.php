<?php
/*
Template Name: Fullwidth
*/
?>
	<div id="pageheader" class="titleclass">
		<div class="container">
			<?php get_template_part('templates/page', 'header'); ?>
		</div><!--container-->
	</div><!--titleclass-->
	
    <div id="content" class="container">
   		<div class="row">
     		<div class="main <?php echo kadence_main_class(); ?>" role="main">
				<?php get_template_part('templates/content', 'page'); ?>
				<?php global $virtue; if(isset($virtue['page_comments']) && $virtue['page_comments'] == '1') { comments_template('/templates/comments.php');} ?>
		</div><!-- /.main -->