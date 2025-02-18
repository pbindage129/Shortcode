<?php 

add_shortcode('zy-sustainability-slides','display_slides');

function display_slides(){
	global $post;
	ob_start();
	$args = array('post_type'=>'sustainability_slide',
					'numberposts' => -1,	
				  	'orderby'  => 'date',
				  	'order'    => 'ASC',
				);
	$posts = get_posts($args);
	$cnt = 0;

	echo '<div class="ast-row sustainability-wrapper swiper-container">';
	echo '<div class="swiper-wrapper">';
	foreach($posts as $post){
		$cnt++;
		setup_postdata($post);
		echo '<div class="swiper-slide">';
			echo '<div class="ast-col-xl-7 ast-col-lg-12 ast-col-md-12 ast-col-sm-12 sustainability-content">';
				echo '<div class="swiper-pagination"></div>';
					echo '<div class="slider-title">';
						echo '<h3>';
							echo get_the_title($post->ID);
						echo '</h3>';
					echo '</div>';
				echo '<div class="slider-content">';
					the_content();
				echo '</div>';
			echo '</div>';
			echo '<div class="ast-col-xl-5 ast-col-lg-12 ast-col-md-12 ast-col-sm-12 sustainability-img">';
				echo get_the_post_thumbnail($post->ID,'full');
			echo '</div>';	
		echo '</div>';	
	}
	echo '</div>';
	echo '</div>';
	wp_reset_postdata();
	$output = ob_get_contents();
	ob_get_clean();
	return $output;
	

}