<?php
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');
if ( post_password_required() ) { ?>
	<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
<?php
	return;
}
?>
<?php if ( comments_open() ) : if ( have_comments() ) : ?>

<?php else : if ( comments_open() ) : else : ?>
<p class="nocomments">Comments are closed.</p>
<?php endif; endif; ?>
<!-- End the comments -->
<!-- Comment Form Section -->
<?php
$default_comment_form = false;
if($default_comment_form == true){
	comment_form();
} else {
?>
<div id="comments" class="comments-area">
	<section id="respond" class="comment-form">
	<!-- Comment Form Header -->
	<header class="comments-form-header">
		<h3 role="heading"><?php comment_form_title( 'Leave a Comment', 'Leave a Comment to %s' ); ?></h3>
		<div class="cancel-comment-reply">
			<?php cancel_comment_reply_link(); ?>
		</div>
	</header><!-- .comment-form-header -->

	<!-- Comment Form -->
	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" role="form">

		<p class="comment-form-author">
			<label for="author"><?php _e('Name', DOMAIN) . ($req ? ' <span class="required">*</span>' : '' ); ?></label>
			<br/>
		    <input id="author" name="author" type="text" <?php $aria_req; ?> />
		 </p>

		<p class="comment-form-email">
			<label for="email"><?php _e('Email', DOMAIN) . ( $req ? ' <span class="required">*</span>' : '' ); ?></label>
			<br/>
		    <input id="email" name="email" <?php ( $html5 ? 'type="email"' : 'type="text"' ); ?>  <?php $aria_req; ?> />
		</p>

		<p class="comment-form-comment">
			<label for="comment"><?php _e('Comment', DOMAIN) . ( $req ? ' <span class="required">*</span>' : '' ); ?></label> 
			<textarea id="comment" name="comment"  aria-required="true"></textarea>
		</p>

		<div class="form-submit">
			<input name="submit" type="submit" id="submit" value="Submit" role="button"/>
			<?php comment_id_fields(); ?>
		</div>

		<?php do_action('comment_form', $post->ID); ?>
		
	</form>

</section>

<div>

<!-- the comments -->
<section class="entry-comment">
	<ol class="commentlist">
		<?php wp_list_comments('type=comment&callback=custom_comments'); ?>
	</ol>
</section>

<nav class="comment-navigation">
	<div class="older"><?php previous_comments_link() ?></div>
	<div class="newer"><?php next_comments_link('More Comments >>') ?></div>
</nav>
<?php }; endif; // if you delete this the sky will fall on your head ?>