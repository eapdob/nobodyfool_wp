<?php
/**
 * Nobody Fool functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Nobody_Fool
 * @since 1.0
 */

// Register hooks
add_action( 'wp_enqueue_scripts', 'enqueue_nobodyfool_styles' );
add_action( 'after_setup_theme', 'nobodyfool_setup' );
add_action( 'widgets_init', 'nobodyfool_widgets' );
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 116, 103);

// Register shortcode
add_shortcode('one_third', 'custom_shortcode');

// Load custom stylesheet
function enqueue_nobodyfool_styles() {
    wp_enqueue_script('bootstrap-js', '//stackpath.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js', array('jquery') );
    wp_enqueue_script('owlcarousel-js', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js');
    wp_enqueue_script('magnific-popup-js', 'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js');
    wp_enqueue_script( 'nobodyfool-script', get_template_directory_uri() . '/assets/js/functions.js', array( 'jquery' ), '20181004', true );
    wp_enqueue_style('bootstrap-css', '//stackpath.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css');
    wp_enqueue_style('fontawesome-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('fontawesome-fonts', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/fonts/fontawesome-webfont.ttf');
    wp_enqueue_style('owlcarousel-css', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css');
    wp_enqueue_style('owlcarousel-theme-css', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css');
    wp_enqueue_style('magnific-popup-css', 'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css');
    wp_enqueue_style('fonts', get_template_directory_uri() . '/assets/fonts/Georgia/stylesheet.css');
    wp_enqueue_style('nobodyfool-style', get_stylesheet_uri() );
}

// Theme setup
function nobodyfool_setup() {

    // Register a custom primary navigation menu
    register_nav_menus( array(
        "primary" => __("Primary Menu", "nobodyfool")
    ));

    // Register a custom primary navigation menu
    register_nav_menus( array(
        "secondary" => __("Secondary Menu", "nobodyfool")
    ));

    // Add theme support for document Title tag
    add_theme_support('title-tag' );
}

// Widget setup
function nobodyfool_widgets() {
    register_sidebar( array(
        'name'          => __('Sidebar', 'nobodyfool'),
        'id'            => 'sidebar-1',
        'description'   => __( 'Add widgets here to appear in the sidebar', 'nobodyfool' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>'
    ) );
}

// Load custom shortcode
if ( !function_exists('custom_shortcode') ) :
    function custom_shortcode($atts, $content = null) {
        return '<div class="col-sm-4">' . $content . '</div>';
    }
endif;

if ( !function_exists( 'nobodyfool_edit_link' ) ) :
    /**
     * Returns an accessibility-friendly link to edit a post or page.
     *
     * This also gives us a little context about what exactly we're editing
     * (post or page?) so that users understand a bit more where they are in terms
     * of the template hierarchy and their content. Helpful when/if the single-page
     * layout with multiple posts/pages shown gets confusing.
     */
    function nobodyfool_edit_link() {
        edit_post_link(
            sprintf(
            /* translators: %s: Name of current post */
                __( 'Edit<span class="screen-reader-text"> "%s"</span>', 'nobodyfool' ),
                get_the_title()
            ),
            '<span class="edit-link">',
            '</span>'
        );
    }
endif;

/**
 * Return SVG markup.
 *
 * @param array $args {
 *     Parameters needed to display an SVG.
 *
 *     @type string $icon  Required SVG icon filename.
 *     @type string $title Optional SVG title.
 *     @type string $desc  Optional SVG description.
 * }
 * @return string SVG markup.
 */
function nobodyfool_get_svg( $args = array() ) {
    // Make sure $args are an array.
    if ( empty( $args ) ) {
        return __( 'Please define default parameters in the form of an array.', 'nobodyfool' );
    }

    // Define an icon.
    if ( false === array_key_exists( 'icon', $args ) ) {
        return __( 'Please define an SVG icon filename.', 'nobodyfool' );
    }

    // Set defaults.
    $defaults = array(
        'icon'        => '',
        'title'       => '',
        'desc'        => '',
        'fallback'    => false,
    );

    // Parse args.
    $args = wp_parse_args( $args, $defaults );

    // Set aria hidden.
    $aria_hidden = ' aria-hidden="true"';

    // Set ARIA.
    $aria_labelledby = '';

    /*
     * Twenty Seventeen doesn't use the SVG title or description attributes; non-decorative icons are described with .screen-reader-text.
     *
     * However, child themes can use the title and description to add information to non-decorative SVG icons to improve accessibility.
     *
     * Example 1 with title: <?php echo nobodyfool_get_svg( array( 'icon' => 'arrow-right', 'title' => __( 'This is the title', 'textdomain' ) ) ); ?>
     *
     * Example 2 with title and description: <?php echo nobodyfool_get_svg( array( 'icon' => 'arrow-right', 'title' => __( 'This is the title', 'textdomain' ), 'desc' => __( 'This is the description', 'textdomain' ) ) ); ?>
     *
     * See https://www.paciellogroup.com/blog/2013/12/using-aria-enhance-svg-accessibility/.
     */
    if ( $args['title'] ) {
        $aria_hidden     = '';
        $unique_id       = uniqid();
        $aria_labelledby = ' aria-labelledby="title-' . $unique_id . '"';

        if ( $args['desc'] ) {
            $aria_labelledby = ' aria-labelledby="title-' . $unique_id . ' desc-' . $unique_id . '"';
        }
    }

    // Begin SVG markup.
    $svg = '<svg class="icon icon-' . esc_attr( $args['icon'] ) . '"' . $aria_hidden . $aria_labelledby . ' role="img">';

    // Display the title.
    if ( $args['title'] ) {
        $svg .= '<title id="title-' . $unique_id . '">' . esc_html( $args['title'] ) . '</title>';

        // Display the desc only if the title is already set.
        if ( $args['desc'] ) {
            $svg .= '<desc id="desc-' . $unique_id . '">' . esc_html( $args['desc'] ) . '</desc>';
        }
    }

    /*
     * Display the icon.
     *
     * The whitespace around `<use>` is intentional - it is a work around to a keyboard navigation bug in Safari 10.
     *
     * See https://core.trac.wordpress.org/ticket/38387.
     */
    $svg .= ' <use href="#icon-' . esc_html( $args['icon'] ) . '" xlink:href="#icon-' . esc_html( $args['icon'] ) . '"></use> ';

    // Add some markup to use as a fallback for browsers that do not support SVGs.
    if ( $args['fallback'] ) {
        $svg .= '<span class="svg-fallback icon-' . esc_attr( $args['icon'] ) . '"></span>';
    }

    $svg .= '</svg>';

    return $svg;
}

if ( !function_exists( 'nobodyfool_time_link' ) ) :
    /**
     * Gets a nicely formatted string for the published date.
     */
    function nobodyfool_time_link() {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf( $time_string,
            get_the_date( DATE_W3C ),
            get_the_date(),
            get_the_modified_date( DATE_W3C ),
            get_the_modified_date()
        );

        // Wrap the time string in a link, and preface it with 'Posted on'.
        return sprintf(
        /* translators: %s: post date */
            __( '<span class="screen-reader-text">Posted on</span> %s', 'nobodyfool' ),
            '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
        );
    }
endif;

//remove_filter('the_content', 'wpautop');
?>