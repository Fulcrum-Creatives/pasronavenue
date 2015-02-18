<?php
/*
Template Name: Features Template
*/
?>
<?php get_header(); ?>

<section class="main-wrapper">
    
    <?php
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $post_counter = 0;
    $wp_query = new WP_Query(array(
                        'post_type'         =>'post',
                        'posts_per_page'    => '6',
                        'paged'             => $paged
                        ));
    while ($wp_query->have_posts()) : $wp_query->the_post();
    $post_counter++;
    ?>

        <article id="post-<?php the_ID(); ?>" <?php if( $post_counter == count( $posts ) ) post_class('entry-post entry-post-3 last-post'); else post_class('entry-post entry-post-3'); ?>>
            <?php get_template_part( 'template-parts/loop', 'bottom-post' ); ?>
        </article>


    <?php endwhile; ?>

    <?php if (  $wp_query->max_num_pages > 1 ) : ?>
        <nav class="nav-below test">
            <div class="nav-previous">
                <?php next_posts_link( __( '&larr; Older Posts', DOMAIN ) ); ?>
            </div>
            <div class="nav-next">
                <?php previous_posts_link( __( 'Newer Posts &rarr;', DOMAIN ) ); ?>
            </div>
        </nav>
    <?php endif; wp_reset_query();?>

</section>

<?php get_sidebar('sidebar'); ?>

<?php get_footer(); ?>