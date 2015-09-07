<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Modality
 */
$modality_theme_options = modality_get_options( 'modality_theme_options' );
get_header(); ?>
    <div id="main" class="<?php echo esc_attr($modality_theme_options['layout_settings']);?>">
        <?php
        // Start the Loop.
        while ( have_posts() ) : the_post();

            get_template_part( 'content', 'test');

        endwhile;
        ?>
        <h1>hello</h1>
    </div><!--main-->
<?php if ($modality_theme_options['social_section_on'] == '1') {
    get_template_part( 'social', 'section' );
}
get_footer(); ?>