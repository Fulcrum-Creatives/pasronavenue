<?php
$facebook = get_the_author_meta('facebook');
$twitter = get_the_author_meta('twitter');
$linkedin = get_the_author_meta('linkedin');
$googleplus = get_the_author_meta('googleplus');
?>
<aside class="aside-wrapper sidebar" role="complementary">
	<div class="sidebar-logo-wrapper">
		<div class="sidebar-logo-image"></div>
	</div>
	<div class="social-links-wrapper">
		<ul class="social-links-list">
			<li class="social-links-list-item">
				<a href="<?php echo $facebook; ?>">
					<?php _e('facebook', DOMAIN); ?>
				</a>
			</li>
			<li class="social-links-list-item">
				<a href="<?php echo $twitter; ?>">
					<?php _e('twitter', DOMAIN); ?>
				</a>
			</li>
			<li class="social-links-list-item">
				<a href="<?php echo $linkedin; ?>">
					<?php _e('linkedin', DOMAIN); ?>
				</a>
			</li>
			<li class="social-links-list-item">
				<a href="<?php echo $googleplus; ?>">
					<?php _e('google+', DOMAIN); ?>
				</a>
			</li>
		</ul>
	</div>
	<ul class="widget-area">
		<!-- Add Sidebar ID -->
		<?php if (!dynamic_sidebar('main-sidebar')) : ?>
		<?php endif; ?>
	</ul>
	<div class="sidebar-contact-wrapper">
		<div class="sibebar-contact-header">
			<div class="sidbar-header-inner">
				<h3 class="contect-header">
					<?php _e('Contact Us', DOMAIN); ?>
				</h3>
			</div>
		</div>
		<div class="sidebar-contact-form">
			<?php echo gravity_form(1 , false, false, false, '', true); ?>
		</div>
	</div>
</aside><!-- .secondary -->