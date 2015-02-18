<!DOCTYPE html>
<?php get_template_part( 'template-parts/head' ); echo "\n" ?>
<body id="<?php do_action('init', 'getBodyID'); ?>page" <?php body_class(); ?>>
<?php get_template_part( 'template-parts/assistive', 'text' ); echo "\n" ?>

<div id="page" class="site-wrapper bg-fade">

		<header id="site-header" class="site-header">

			<div class="row">

				<div id="site-header-logo" class="site-header-logo" role="banner">
					<h1 class="header-logo-heading">
						<a href="<?php echo home_url(); ?>">
							<span class="ir">
								<?php echo bloginfo('name'); ?>
							</span>
						</a>
					</h1>
				</div>

				<div id="site-header-search" class="site-header-search aside-wrapper">
					<?php get_search_form(); ?>
				</div>

			</div>

			<nav id="site-header-navigation" class="site-header-navigation" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav>

		</header>

		<!-- Page Post Archive -->
		<section id="main" class="container wrapper" role="main">