<?php get_header(); ?>

<?php if (is_category()) { ?>
	<h2><?php _e("Posts Categorized:", DOMAIN); single_cat_title(); ?></h2>
<?php } elseif (is_tag()) { ?>
	<h2><?php _e("Posts Tagged:", DOMAIN); single_tag_title(); ?></h2>
<?php } elseif (is_author()) {
	global $post;
	$author_id = $post->post_author;
?>
	<h2><?php _e("Posts By:", DOMAIN); the_author_meta('display_name', $author_id); ?></h2>
<?php } elseif (is_day()) { ?>
	<h2><?php _e("Daily Archives:", DOMAIN);  the_time('l, F j, Y'); ?></h2>

<?php } elseif (is_month()) { ?>
	<h2><?php _e("Monthly Archives:", DOMAIN); the_time('F Y'); ?></h2>

<?php } elseif (is_year()) { ?>
	<h2><?php _e("Yearly Archives:", DOMAIN); the_time('Y'); ?></h2>
<?php } ?>

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
	<?php get_template_part( 'template-parts/loop', 'archive' ); ?>
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