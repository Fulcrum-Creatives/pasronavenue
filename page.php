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

</section>

<?php get_sidebar('sidebar'); ?>

<?php get_footer(); ?>