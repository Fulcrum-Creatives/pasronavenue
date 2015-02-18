<?php get_header(); ?>

<section class="main-wrapper">
	
	<?php
	$post_counter = 0;
	$query = new WP_Query(array(
	  					'post_type'			=>'post',
						'posts_per_page' 		=> '6',
						));
	if (have_posts()) : while ($query->have_posts()) : $query->the_post();
	$post_counter++;
	?>
	<?php if(! $paged || $paged < 2): ?>

		<?php if($post_counter == 1): ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('entry-post entry-post-1'); ?>>
				<?php get_template_part( 'template-parts/loop', 'first-post' ); ?>
			</article>
		<?php endif; ?>

		<?php if($post_counter == 2 || $post_counter == 3): ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('entry-post entry-post-2 post-'.$post_counter.''); ?>>
				<?php get_template_part( 'template-parts/loop', 'mid-post' ); ?>
			</article>
		<?php endif; ?>
		<?php if($post_counter >= 4): ?>
			<article id="post-<?php the_ID(); ?>" <?php if( $post_counter == count( $posts ) ) post_class('entry-post entry-post-3 last-post'); else post_class('entry-post entry-post-3'); ?>>
				<?php get_template_part( 'template-parts/loop', 'bottom-post' ); ?>
			</article>
		<?php endif; ?>

	<?php else: ?>
		<article id="post-<?php the_ID(); ?>" <?php if( $post_counter == count( $posts ) ) post_class('entry-post entry-post-3 last-post'); else post_class('entry-post entry-post-3'); ?>>
			<?php get_template_part( 'template-parts/loop', 'bottom-post' ); ?>
		</article>
	<?php endif; ?>

	<?php if ( is_search() ) : ?>

		<?php get_template_part( 'template-parts/loop', 'bottom-post' ); ?>

	<?php endif; ?>

	<?php endwhile; ?>

	<?php endif; wp_reset_postdata(); ?>

</section>

<?php get_sidebar('sidebar'); ?>

<?php get_footer(); ?>