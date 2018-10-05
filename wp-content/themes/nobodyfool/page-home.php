<?php
/**
 * Template Name: Home Page
 *
 *
 * @package NobodyFoolTheme
 * @since NobodyFoolTheme 1.0
 */
?>

<?php get_header(); ?>

    <div class="owl-carousel owl-theme">
        <div class="item">
            <div class="container">
                <div class="item-caption">
                    <h2>Your title can be long and descriptive</h2>
                    <p>Cursuspenatisaccum ut curabitur nulla tellus tor ames a in curabitur pede. Idet mollisi eros dis orci congue elis et curabitur.</p>
                    <a href="#">Read More</a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="container">
                <div class="item-caption">
                    <h2>Your title can be long and descriptive</h2>
                    <p>Cursuspenatisaccum ut curabitur nulla tellus tor ames a in curabitur pede. Idet mollisi eros dis orci congue elis et curabitur.</p>
                    <a href="#">Read More</a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="container">
                <div class="item-caption">
                    <h2>Your title can be long and descriptive</h2>
                    <p>Cursuspenatisaccum ut curabitur nulla tellus tor ames a in curabitur pede. Idet mollisi eros dis orci congue elis et curabitur.</p>
                    <a href="#">Read More</a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="container">
                <div class="item-caption">
                    <h2>Your title can be long and descriptive</h2>
                    <p>Cursuspenatisaccum ut curabitur nulla tellus tor ames a in curabitur pede. Idet mollisi eros dis orci congue elis et curabitur.</p>
                    <a href="#">Read More</a>
                </div>
            </div>
        </div>
    </div>

    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 main-content-img">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/section_posts_bg.jpg" alt="posts">
                </div>
                <div class="col-md-6 main-content-posts">
                    <ul>
                        <?php
                            $args = array( 'numberposts' => '4' );
                            $recent_posts = wp_get_recent_posts( $args );
                            $recent_posts = array_reverse($recent_posts);
                            foreach( $recent_posts as $recent ){
                                echo '<li><a href="' . get_permalink($recent["ID"]) . '">'. get_the_post_thumbnail($recent["ID"],'thumbnail') . '<p class="main-content-posts-title">'. $recent["post_title"] . '</p><p class="main-content-posts-content">' . $recent["post_content"] . '</p></a></li> ';
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>


<?php get_footer(); ?>