<?php
/**
 * The template for displaying the sidebar
 *
 *
 * @package NobodyFoolTheme
 * @since NobodyFoolTheme 1.0
 */
?>

<?php if ( is_active_sidebar('sidebar-1') ) : ?>
    <?php dynamic_sidebar('sidebar-1'); ?>
<?php endif; ?>
