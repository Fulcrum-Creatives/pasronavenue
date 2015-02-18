	</section>

</div>

<footer id="site-footer" class="site-footer site-wrapper" role="contentinfo">
	<div id="site-footer-header" class="site-footer-header">
		<div class="florish-left"></div>
		<div class="header-text"><?php _e('Funding and Support Provided By:', DOMAIN); ?></div>
		<div class="florish-right"></div>
	</div>
	<div class="site-footer-sponsors">
		<ul>
			<?php
			$query = new WP_Query(array(
			  					'post_type'			=>'sponsor',
								'posts_per_page' 		=> -1
								));
			if (have_posts()) : while ($query->have_posts()) : $query->the_post();
			$title = get_the_title();
			$name = strtolower(str_replace(' ', '-', $title));
			?>

			<li class="sponsor-image <?php echo $name; ?>">
				<?php if( get_field('sponsor_image') ): ?>
				<a href="<?php the_field('sponsor_url'); ?>" title="<?php the_title(); ?>">
					<img src="<?php the_field('sponsor_image'); ?>" alt="<?php the_title(); ?>" />
				</a>
				<?php else: ?>
					<a href="<?php the_field('sponsor_url'); ?>">
						<?php the_title(); ?>
					</a>
				<?php endif; ?>
			</li>
			<?php endwhile; endif; wp_reset_query(); ?>
		</ul>
	</div>
	<div class="site-footer-logo-wrapper"><div class="site-footer-logo"></div></div>
</footer>

<?php wp_footer(); ?>

</body>
</html>