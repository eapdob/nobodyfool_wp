<?php
/**
 * The template for displaying the index page
 *
 *
 * @package NobodyFoolTheme
 * @since NobodyFoolTheme 1.0
 */
?>

<?php get_header(); ?>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php if ( have_posts() ) : ?>

                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())),'</a></h2>'); ?>
                        <?php the_content(); ?>

                    <?php endwhile; ?>

                <?php endif; ?>
            </div>
            <div class="col-md-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>