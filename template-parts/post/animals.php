<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
	<div class="entry-content">
        <?php if(get_field('name_animal')):
		    the_field('name_animal'); ?>
            <img src="<?php the_field('image_animal'); ?>" />
            <p><?php the_field('age'); ?></p>
            <p><?php //var_dump(get_tags()); ?></p>
            <?php //print_r(get_the_terms( $post->ID, 'taxonomy'));
            //var_dump($tax);
            $tax = get_the_terms( $post->ID, 'taxonomy');
            echo $tax[0]->name; ?>
            <?php //get_query_var('breed'); ?>
           <?php //the_tags('breed'); ?>
            <?php the_tags(); ?>
        <?php endif; ?>
	</div><!-- .entry-content -->

    <?php twentyseventeen_entry_footer(); ?>

</article><!-- #post-## -->
