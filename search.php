<?php get_header(); ?>

<?php if (  $wp_query->max_num_pages > 1 ) : ?>
	<nav id="post-navigation" class="nav-above">
		<div class="nav-previous">
			<?php next_posts_link( __( '&larr; Older', DOMAIN ) ); ?>
		</div>
		<div class="nav-next">
			<?php previous_posts_link( __( 'Newer &rarr;', DOMAIN ) ); ?>
		</div>
	</nav><!-- #nav-below -->
<?php endif; ?>

<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts( array('post_type'=>array(
							'post',
							),
					'paged'=>$paged ) );
if (have_posts()) : while (have_posts()) : the_post(); 
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php get_template_part( 'template-parts/loop', 'search' ); ?>
</article><!-- #post-{ID} -->

<?php endwhile; ?>

<?php if (  $wp_query->max_num_pages > 1 ) : ?>
	<nav id="post-navigation" class="nav-below">
		<div class="nav-previous">
			<?php next_posts_link( __( '&larr; Older', DOMAIN ) ); ?>
		</div>
		<div class="nav-next">
			<?php previous_posts_link( __( 'Newer &rarr;', DOMAIN ) ); ?>
		</div>
	</nav><!-- #nav-below -->
<?php endif; ?>

<?php else : ?>

<?php get_template_part( 'template-parts/no', 'entry' ); ?>

<?php endif; wp_reset_query(); ?>

<?php get_sidebar('sidebar'); ?>

<?php get_footer(); ?>