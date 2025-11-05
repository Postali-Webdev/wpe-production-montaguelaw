<?php
/**
 * Search results template.
 *
 * @package Postali Parent
 * @author Postali LLC
 */

get_header(); ?>

<div class="body-container">

    <?php get_template_part('block','banner'); ?>

    <section class="main-content">
        <div class="container">
            <div class="columns">
                <div class="column-66 block">
                <?php if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <article>
                            <a href="<?php the_permalink(); ?>" rel="bookmark">
                                <h2 class="post-title"><?php the_title(); ?></h2>

                                <?php if(empty(get_the_excerpt())) { ?>
                                    <p><?php the_field('banner_value_proposition'); ?></p>
                                <?php } else { ?>
                                    <?php the_excerpt(); ?>
                                <?php } ?>
                                
                            </a>
                        </article>
                    <?php endwhile; ?>
                    <?php the_posts_pagination(); ?>
                <?php else : ?>
                    <p><?php printf( esc_html__( 'Our apologies but there\'s nothing that matches your search for "%s"', 'postali' ), get_search_query() ); ?></p>
                <?php endif; ?>
                </div>
                <div class="column-33 sidebar-block block">
                    <?php get_template_part('block','sidebar'); ?>
                </div>
            </div>
        </div>
    </section>

</div>

<?php get_footer();
