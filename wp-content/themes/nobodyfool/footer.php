<?php
/**
 * The template for displaying the footer
 *
 *
 * @package NobodyFoolTheme
 * @since NobodyFoolTheme 1.0
 */
?>
<div class="contact-us">
    <div class="container">
        <div class="col-md-7 contact-us-text">
            <h2>Lorem ipsum dolor sit amet elit !</h2>
            <p>Why not try our services today, you won’t regret your choice !</p>
        </div>
        <div class="col-md-offset-1 col-md-4 contact-us-btn">
            <a class="popup-with-form" href="#wpforms-65">
                Contact us today
            </a>
        </div>
    </div>
</div>
<footer id="site-footer">
    <div class="top-footer">
        <div class="container">
            <div class="col-md-3 footer-about-us">
                <h3>About us</h3>
                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about-us.png" alt="about us">
                </a>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc non diam erat. In fringilla massa ut nisi
                    ullamcorper pellentesque. Quisque non luctus sem. Nullam non magna vel nisi posuere bibendum vitae sed
                    dui.</p>
                <a href="#" class=".footer-about-us-btn">Read More</a>
            </div>
            <div class="col-md-3 footer-quick-links">
                <h3>Quicklinks</h3>
                <ul>
                    <li><a href="#">Lorem ipsum dolor sit</a></li>
                    <li><a href="#">Amet consectetur</a></li>
                    <li><a href="#">Praesent vel sem id</a></li>
                    <li><a href="#">Curabitur hendrerit est</a></li>
                    <li><a href="#">Aliquam eget erat nec sapien</a></li>
                    <li><a href="#">Cras id augue nunc</a></li>
                    <li><a href="#">In nec justo non</a></li>
                    <li><a href="#">Vivamus mollis enim ut</a></li>
                    <li><a href="#">Curabitur hendrerit est</a></li>
                    <li><a href="#">Sed a nulla urna</a></li>
                </ul>
            </div>
            <div class="col-md-3 footer-latest-blog-posts">
                <h3>Latest Blog Posts</h3>
                <ul>
                    <?php
                    $args = array( 'numberposts' => '2' );
                    $recent_posts = wp_get_recent_posts( $args );
                    foreach( $recent_posts as $recent ){
                        echo '<li><a href="' . get_permalink($recent["ID"]) . '"><p class="footer-latest-blog-posts-title">'. $recent["post_title"] . '</p><p class="footer-latest-blog-posts-content">' . $recent["post_content"] . '</p><a class="footer-latest-blog-posts read-more-btn" href="' . get_permalink($recent["ID"]) . '">Read More</a></a></li> ';
                    }
                    ?>
                </ul>
            </div>
            <div class="col-md-3 footer-contact-us">
                <h3>Contact us</h3>
                <?php echo do_shortcode('[wpforms id="68"]'); ?>
            </div>
        </div>
    </div>
    <div class="bottom-footer">
        <div class="container">
            <div class="col-md-6 bottom-footer-left">
                <a href="#">Copyright © 2013 Domain Name - All Rights Reserved</a>
            </div>
            <div class="col-md-6 bottom-footer-right">
                <a href="#">Template by OS Templates</a>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
<?php echo do_shortcode('[wpforms id="65"]'); ?>
</body>
</html>