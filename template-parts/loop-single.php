<section class="entry-featured">
	<?php if(get_field('featured_video')): ?>
		<!-- <video id="player1" preload="none">
		    <source type="video/youtube" src="<?php echo get_field('featured_video'); ?>" />
		</video> -->
		<div class="video-container">
			<iframe src="//www.youtube.com/embed/<?php echo get_field('featured_video'); ?>" frameborder="0" allowfullscreen></iframe>
		</div>
	<?php else : ?>
		<?php if (has_post_thumbnail()): ?>
		<div class="featured-image">
			<?php the_post_thumbnail();?>
		</div>
		<?php endif; ?>
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
	<?php the_content(); ?>
</section>