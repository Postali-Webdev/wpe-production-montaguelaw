<?php
/**
 * Template Name: Front Page
 * @package Postali Child
 * @author Postali LLC
**/
get_header();?>

<div class="body-container">

    <section class="banner" id="hp-banner" style="background-image:url(<?php the_field('banner_background_image'); ?>);">
        <div class="container">
            <div class="columns">
                <div class="column-full">
                    <h1><?php the_field('banner_h1'); ?></h1>
                </div>
                <div class="spacer-30"></div>
                <div class="column-50">
                    <div class="subhead"><?php the_field('banner_subhead'); ?></div>
                </div>
                <div class="column-50 buttons">
                    <a href="/contact/" class="btn">Contact Us</a>
                    <a href="/industries/" class="btn">INDUSTRIES<br>WE SERVE</a>
                </div>
            </div>
        </div>
    </section>

    <section id="section_1">
        <div class="container">
            <div class="columns">
                <div class="column-50">
                    <h2><?php the_field('panel_1_left_headline'); ?></h2>
                </div>
                <div class="column-50">
                    <?php the_field('panel_1_right_copy'); ?>
                </div>
            </div>
        </div>
    </section>

    <section id="section_2">
        <div class="container">
            <div class="columns">
                <div class="column-50">
                    <?php the_field('panel_2_left_column'); ?>
                </div>
                <div class="column-50 steps">
                <?php $n=1 ?>
                <?php if( have_rows('panel_2_right_column') ): ?>
                <?php while( have_rows('panel_2_right_column') ): the_row(); ?>  
                    <div class="step">
                        <span class="step-number">Step #<?php echo $n; ?></span>
                        <p><strong><?php the_sub_field('step'); ?></strong></p>
                    </div>
                    <?php $n++; ?>
                <?php endwhile; ?>
                <?php endif; ?> 
                </div>
            </div>
        </div>
    </section>

    <?php if(get_field('include_awards','options')) : ?>
        <?php get_template_part('block','awards'); ?>
    <?php endif; ?>

    <section id="section_3">
        <div class="container">
            <div class="columns">
                <div class="column-50 centered center">
                    <span class="pre-headline"><?php the_field('panel_3_pre_headline'); ?></span>
                    <h2><?php the_field('panel_3_headline'); ?></h2>
                    <?php the_field('panel_3_body_copy'); ?>
                </div>
                <div class="spacer-30"></div>
                <div class="column-full centered center">
                <?php if( have_rows('panel_3_practice_areas') ): ?>
                <?php while( have_rows('panel_3_practice_areas') ): the_row(); ?>
                    <?php $post_object = get_sub_field('practice_area'); ?>
                    <?php if( $post_object ): ?>
                        <?php // override $post
                        $post = $post_object;
                        setup_postdata( $post );
                        ?>
                            <a class="pa-box" href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                                <?php $background = get_field('banner_background_image'); ?>
                                <div class="background" style="background:url('<?php echo $background['url']; ?>');"></div>
                            </a>
                        <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                    <?php endif; ?>
                <?php endwhile; ?>
                <?php endif; ?>
                <div class="spacer-60"></div>
                <a href="/practice-areas/" class="btn">VIEW ALL</a>
                </div>
            </div>
        </div>
    </section>

    <section id="section_4">
        <div class="container">
            <div class="columns">
                <div class="column-50">
                    <?php the_field('panel_4_left_column'); ?>
                </div>
                <div class="column-50 block">
                    <?php the_field('panel_4_right_column'); ?>
                </div>
            </div>
        </div>
    </section>

</div><!-- #front-page -->

<?php get_footer();?>