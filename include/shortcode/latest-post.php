<?php 
function display_lastest_posts(){
		global $post;
	ob_start();
	$args = array('post_type'=>'post',
				  'orderby'  => 'date',
				  'order'    => 'DSC',
				  'numberposts'=> 2,
				);
	$posts = get_posts($args);

	echo '<div class="lastest_posts_wrapper">';
	echo '<div class="lastest_posts_content">';
	foreach($posts as $post){
		setup_postdata($post);
		$post_link = get_permalink( $post->ID );
		echo '<div class="ast-col-md-6">';
		echo '<a href="'.$post_link.'">';
			echo get_the_post_thumbnail( $post->ID, array( 362, 318) );
		echo '</a>';
		echo '<p class="post-date">';
				echo get_the_date( 'F j, Y' );;
		echo '</p>';
		echo '<h3 class="post-title">';
			echo '<a href="'.$post_link.'">';
				echo get_the_title($post->ID);
			echo '</a>';
		echo '</h3>';
		echo '<p class="post-excerpt">';
				echo get_the_excerpt();;
		echo '</p>';
		echo '</div>';
	}
	echo '</div>';
	echo '</div>';
	wp_reset_postdata();
	$output = ob_get_contents();
	ob_get_clean();
	return $output;
}

add_shortcode('display-lastest-posts','display_lastest_posts');