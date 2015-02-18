<?php get_header(); ?>

<section class="main-wrapper">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('entry-post'); ?>>

	<?php get_template_part( 'template-parts/loop', 'single' ); ?>

</article><!-- #post-{ID} -->

<?php comments_template( '', true ); ?>

<?php endwhile; endif; wp_reset_query(); ?>

</section>

<?php get_sidebar('sidebar'); ?>

<?php get_footer(); ?>