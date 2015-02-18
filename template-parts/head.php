<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7 ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9 ]>    <html <?php language_attributes(); ?> class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE,chrome=1" />
<title><?php  
if (is_page('home')) {
    bloginfo('name');
}
if (is_single()) {
    bloginfo('name') ?> | <?php the_title();
}
if (is_page() && !is_page('home')) {
    bloginfo('name') ?> | <?php the_title();
}
if (is_404() && !is_page('home')) {
    bloginfo('name') ?> | Page Not Found <?php
} 
?></title>
<link href="<?php echo get_template_directory_uri(); ?>/favicon.ico" rel="icon" type="image/x-icon" />
<link href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon.png" rel="apple-touch-icon" />
<link type="text/css" rel="stylesheet" href="http://fast.fonts.net/cssapi/e242d790-0a93-4ad3-bc66-29c747424624.css"/>
<link  href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" rel="stylesheet" media="screen" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php echo '<link rel="canonical" href="' . home_url() . '" />'; echo "\n" ?>
<?php wp_head(); echo "\n"?>
</head>