<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
	<div class="entry-content">
        <?php if(get_field('name_animal')):
		    the_field('name_animal'); ?>
            <img src="<?php the_field('image_animal'); ?>" />
            <p><?php the_field('age'); ?></p>
           <?php echo the_terms($post->ID, 'taxonomy'); ?>
        <?php endif; ?>
	</div><!-- .entry-content -->

    <?php twentyseventeen_entry_footer(); ?>

</article><!-- #post-## -->


