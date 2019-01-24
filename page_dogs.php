<?php
/**
 Template name: dogs profile
 Template post type: page
 */

get_header(); ?>
    <div class="wrap">
       <?php $query = new WP_Query( array('post_type' => array( 'dogs_profile' )) ); ?>

        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">

                <?php if ( $query->have_posts() ) : ?>
                    <?php
                    /* Start the Loop */
                    while ( $query->have_posts() ) : $query->the_post();

                        get_template_part( 'template-parts/post/animals' );

                    endwhile;

                    the_posts_pagination( array(
                        'prev_text' => twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
                        'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span>' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ),
                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
                    ) );

                endif; ?>

            </main><!-- #main -->
        </div><!-- #primary -->
     <?php get_sidebar(); ?>
    </div><!-- .wrap -->

<?php get_footer();
