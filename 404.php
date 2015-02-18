<?php get_header(); ?>

<!-- No Entry -->
<article class="error-404">

	<!-- Entry Header -->
	<header class="entry-header">
		<h1><?php _e("Page Not Found!", DOMAIN); ?></h1>
	</header><!-- .entry-header -->

	<!-- Entry Content -->
	<section class="entry-content">
		<?php _e('Sorry, but the page you were trying to view does not exist.', DOMAIN); ?>
	</section><!-- .entry-content -->

	<!-- Entry Search -->
	<section class="entry-search">
		<?php get_search_form(); ?>
	</section><!-- .entry-search -->										

	<!-- Entry Footer -->
	<footer class="entry-footer">

	</footer><!-- .entry-footer -->

</article><!-- .no-entry -->

<?php get_footer(); ?>