<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	if ( is_sticky() && is_home() ) :
		echo twentyseventeen_get_svg( array( 'icon' => 'thumb-tack' ) );
	endif;
	?>
	<header class="entry-header">
        <a href="<?php the_permalink(); ?>"> <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?></a>
        <?php if ( is_front_page() ) { ?>
            <?php echo "by ";
                the_author_posts_link();
            } ?>
	</header><!-- .entry-header -->



	<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'twentyseventeen-featured-image' ); ?>
			</a>
		</div><!-- .post-thumbnail -->
	<?php endif; ?>

	<div class="entry-content <?php if( in_category('Cats') ) { echo " cats"; } ?> " >

		<?php
		the_content( sprintf(
			__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
			get_the_title()
		) );

		the_tags();
		wp_link_pages( array(
			'before'      => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
			'after'       => '</div>',
			'link_before' => '<span class="page-number">',
			'link_after'  => '</span>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php
        if ( is_single() ) {
            twentyseventeen_entry_footer();
        }
	?>

</article><!-- #post-## -->
