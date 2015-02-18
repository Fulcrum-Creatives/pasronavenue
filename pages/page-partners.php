<?php
/*
Template Name: Partners Template
*/
?>
<?php get_header(); ?>

<section class="main-wrapper">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('entry-post'); ?>>

	<header class="entry-header">
		<h3 class="entry-title">
			<?php the_title(); ?>
		</h3>
	</header>

	<section class="entry-content">
        <?php if (has_post_thumbnail()): ?>
            <div class="featured-image">
                <?php the_post_thumbnail();?>
            </div>
        <?php endif; ?>
		<?php the_content(); ?>
	</section>

</article><!-- #post-{ID} -->

<?php endwhile; endif; wp_reset_query(); ?>

<!-- Partners Query -->

			<?php
			$query = new WP_Query(array(
			  					'post_type'			=>'partner',
								'posts_per_page' 		=> -1
								));
			if (have_posts()) : while ($query->have_posts()) : $query->the_post();
			$title = get_the_title();
			$name = strtolower(str_replace(' ', '-', $title));
			?>

  <article id="post-<?php the_ID(); ?>" <?php if( $post_counter == count( $posts ) ) post_class('entry-post entry-post-3 last-post'); else post_class('entry-post entry-post-3'); ?>>

			
			<!-- working below -->
			
			
<section class="entry-featured">
<div class="img_cont">
<?php if( get_field('sponsor_image') ): ?>
				<a href="<?php the_field('sponsor_url'); ?>" title="<?php the_title(); ?>">
					<img src="<?php the_field('sponsor_image'); ?>" alt="<?php the_title(); ?>" />
				</a>
				<?php else: ?>
					<a href="<?php the_field('sponsor_url'); ?>">
						<?php the_title(); ?>
					</a>
				<?php endif; ?>
</div>
</section>

<div class="content_cont">
<header class="entry-header header-2">
	<h3 class="entry-title">
		<a href="<?php the_field('sponsor_url'); ?>" title="<?php the_title(); ?>" 
		   title="<?php printf( esc_attr__( 'Permalink to %s', DOMAIN ), the_title_attribute( 'echo=0' ) ); ?>" 
		   rel="bookmark">
			<?php the_title(); ?>
		</a>
	</h3>
</header>

<section class="entry-content">
	<?php the_excerpt(); ?>
</section>
</div>
			
			</article>
			<!-- above -->			
			
			
			<?php endwhile; endif; wp_reset_query(); ?>




</section>

<?php get_sidebar('sidebar'); ?>

<?php get_footer(); ?>