<section class="entry-featured">
	<?php if (has_post_thumbnail()): ?>
		<div class="featured-image">
			<?php the_post_thumbnail('small');?>
		</div>
		<?php endif; ?>
</section>

<header class="entry-header header-2">
	<h3 class="entry-title">
		<a href="<?php the_permalink(); ?>" 
		   title="<?php printf( esc_attr__( 'Permalink to %s', DOMAIN ), the_title_attribute( 'echo=0' ) ); ?>" 
		   rel="bookmark">
			<?php the_title(); ?>
		</a>
	</h3>
</header>

<section class="entry-content">
	<?php the_excerpt(); ?>
	<div class="read-more-link">
		<a href="<?php the_permalink(); ?>" 
		   title="<?php printf( esc_attr__( 'Permalink to %s', DOMAIN ), the_title_attribute( 'echo=0' ) ); ?>" 
		   rel="bookmark">
		   <?php _e('[read more]', DOMAIN); ?>
		</a>
	</div>
</section>