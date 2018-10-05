<?php
/**
 * The template for displaying the header
 *
 *
 * @package NobodyFoolTheme
 * @since NobodyFoolTheme 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<nav class="navbar gradient-bg top-custom-nav">
    <div class="container">
        <div class="navbar-header">
            <button type="button"
                    class="navbar-toggle collapsed"
                    data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-2"
                    aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
            <ul class="nav navbar-nav navbar-left top-links">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'secondary',
                    'menu_class'     => 'secondary-menu',
                    'container'      => false,
                    'items_wrap'     => '%3$s'
                ) );
                ?>
            </ul>
            <ul class="nav navbar-nav navbar-right socials">
                <li><a href="https://linkedin.com"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="https://twitter.com"><i class="fa fa-twitter"></i></a></li>
                <li><a href="https://pinterest.com"><i class="fa fa-pinterest"></i></a></li>
                <li><a href="https://googleplus.com"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="/feed/"><i class="fa fa-rss"></i></a></li>
            </ul>
        </div>
        <span class="navigation-toggle">
            <i class="fa fa-minus"></i>
        </span>
    </div><!-- .container -->
</nav>
<nav class="navbar gradient-bg main-custom-nav">
    <div class="container">
        <div class="navbar-header">
            <button type="button"
                    class="navbar-toggle collapsed"
                    data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1"
                    aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-left">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'menu_class'     => 'primary-menu',
                    'container'      => false,
                    'items_wrap'     => '%3$s'
                ) );
                ?>
            </ul>
        </div>
    </div><!-- .container -->
</nav>
<header>
    <div class="container">
        <div class="col-md-6">
            <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                <span class="navbar-brand-title">NobodyFool</span>
                <span class="navbar-brand-subtitle">Free PSD Website Template</span>
            </a>
        </div>
        <div class="col-md-6">
            <?php get_sidebar(); ?>
        </div>
    </div>
</header>