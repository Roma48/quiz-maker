<?php 
/**
 * @package Modality
 */
?>
<div class="content-posts-wrap">
	<div id="content-box">
		<div id="post-body">
			<div <?php post_class('post-single'); ?>>
				<h1 id="post-title" <?php post_class('entry-title'); ?>><?php the_title(); ?> </h1>
			<?php 
			$modality_theme_options = modality_get_options( 'modality_theme_options' );
			if ($modality_theme_options['breadcrumbs'] == '1') { ?>
				<div class="breadcrumbs">
					<div class="breadcrumbs-wrap"> 
						<?php get_template_part( 'breadcrumbs'); ?>
					</div><!--breadcrumbs-wrap-->
				</div><!--breadcrumbs-->
			<?php } ?>
				<?php if ($modality_theme_options['post_info'] == 'above') { get_template_part('post','info');}

					if ( has_post_thumbnail() ) { 
 
						if ($modality_theme_options['featured_img_post'] == '1') {?>
							<div class="thumb-wrapper">
								<?php the_post_thumbnail('full'); ?>
							</div><!--thumb-wrapper-->
							<?php
						} 
					} 			
				?>
				<div id="article">
					<?php the_content();
                        $arrs = get_post_meta( get_the_ID(), '_my_meta_value_key', true );
                        foreach ($arrs as $question) : ?>
                        <h1><?php echo $question; ?></h1>
                    <?php endforeach; ?>


				</div><!--article-->
			</div><!--post-single-->
				<?php get_template_part('post','sidebar'); ?>
		</div><!--post-body-->
	</div><!--content-box-->
	<div class="sidebar-frame">
		<div class="sidebar">
			<?php get_sidebar(); ?>
		</div><!--sidebar-->
	</div><!--sidebar-frame-->
</div><!--content-posts-wrap-->
