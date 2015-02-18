<?php

add_action( 'widgets_init', 'percentage_widget' );
function percentage_widget() {
	register_widget( 'Percentage_Widget' );
}

class Percentage_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
	 		'percentage_widget', // Base ID
			'Percentage', // Name
			array( 'description' => __( 'The Percentage', DOMAIN ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		extract( $args );

		$percaentage_query = new WP_Query(array(
			'post_type'			=>'numbers',
			'posts_per_page' 		=> -1
		));

		echo $before_widget;
		echo '<div class="percentage-wrapper">';
		echo '<h3 class="percentage-heading">The Numbers</h3>';
		if (have_posts()) : while ($percaentage_query->have_posts()) : $percaentage_query->the_post();
		echo '<div class="percantage-number">';
		echo get_field('percentage') . '<sup class="percent">%</sup>';
		echo '</div>';
		echo '<div class="percantage-text">';
		echo '<p>'. get_field('percentage_text') .'</p>';
		echo '</div>';
		endwhile; endif; wp_reset_query();
		echo '</div>';
		echo $after_widget;
	}



} // class Foo_Widget
?>