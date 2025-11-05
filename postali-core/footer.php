<?php
/**
 * Theme footer
 *
 * @package Postali Child
 * @author Postali LLC
**/
?>
<footer>

    <section class="footer">
        <div class="container">
            <div class="columns">
                <div class="column-full">
                    <?php if(get_field('footer_alt_logo','options')) { ?>
                        <?php 
                        $image = get_field('footer_alt_logo','options');
                        if( !empty( $image ) ): ?>
                        <a href="/" class="footer-logo-link" rel="home" aria-current="page">
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        </a>                            
                        <?php endif; ?>
                    <?php } else { ?>
                        <?php the_custom_logo(); ?>
                    <?php } ?>
                </div>
                <div class="spacer-60"></div>
                <div class="column-25 block">
                    <p><strong>Contact Us</strong><br>
                    <a href="tel:<?php the_field('phone_number','options'); ?>" title="Call Today"><?php the_field('phone_number','options'); ?></a><br>
                    <a href="mailto:<?php the_field('email_address','options'); ?>" title="Email Today"><?php the_field('email_address','options'); ?></a>
                    </p>
                </div>
                <div class="column-25 address-map">
                    <div class="footer-address">
                        <p><strong>Mailing Address</strong><br>
                        <?php the_field('address','options'); ?><br>
                        </p>
                    </div>
                </div>
                <div class="column-20 block menu">
                    <p><strong>Site Navigation</strong></p>
                    <nav role="navigation">
                    <?php
                        $args = array(
                            'container' => false,
                            'theme_location' => 'footer-nav'
                        );
                        wp_nav_menu( $args );
                    ?>	
                    </nav>	
                </div>
                <div class="spacer-60"></div>
                <div class="footer-social">
                    <?php if(get_field('social_facebook','options')) { ?>
                        <a class="social-link" href="<?php the_field('social_facebook','options'); ?>" title="Facebook" target="blank"><span class="icon-social-facebook"></span></a>
                    <?php } ?>
                    <?php if(get_field('social_instagram','options')) { ?>
                        <a class="social-link" href="<?php the_field('social_instagram','options'); ?>" title="Instagram" target="blank"><span class="icon-social-instagram"></span></a>
                    <?php } ?>
                    <?php if(get_field('social_linkedin','options')) { ?>
                        <a class="social-link" href="<?php the_field('social_linkedin','options'); ?>" title="LinkedIn" target="blank"><span class="icon-social-linkedin"></span></a>
                    <?php } ?>
                    <?php if(get_field('social_twitter','options')) { ?>
                        <a class="social-link" href="<?php the_field('social_twitter','options'); ?>" title="Twitter" target="blank"><span class="icon-social-twitter"></span></a>
                    <?php } ?>
                    <?php if(get_field('social_youtube','options')) { ?>
                        <a class="social-link" href="<?php the_field('social_youtube','options'); ?>" title="YouTube" target="blank"><span class="icon-social-youtube"></span></a>
                    <?php } ?>
                </div>
                <div class="footer-utility">
                    <div class="utility">
                    <?php if ( have_rows('utility_links','options') ): ?>
                    <?php while ( have_rows('utility_links','options') ): the_row(); ?>  
                        <a href="<?php the_sub_field('utility_page_link'); ?>"><?php the_sub_field('utility_link_text'); ?></a>
                    <?php endwhile; ?>
                    <?php endif; ?> 
                    </div>
                    <div class="disclaimer">
                        <p class="small"><?php the_field('disclaimer_text','options'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</footer>

    <script>
    jQuery(document).ready(function(){
        // Target your .container, .wrapper, .post, etc.
        jQuery(".video").fitVids();
    });
    </script>

<?php wp_footer(); ?>

</body>
</html>


