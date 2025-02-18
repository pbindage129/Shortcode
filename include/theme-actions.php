<?php
//Page Slug Body Class
function add_slug_body_class( $classes ) {
	global $post;
	if ( isset( $post ) ) {
		$classes[] = $post->post_name;
	}
	return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );


add_action( 'astra_template_parts_content_top', 'zylog_post_categoires' );
function zylog_post_categoires() {
	
	if( !is_page() && is_home() || is_single('post') || is_archive() ) {

		$taxonomy = get_queried_object();

		$categories = get_categories( array(
			'taxonomy' 		=> 'category',
	  		'hide_empty'	=> false,
		    'order'   		=> 'ASC',
		    'hide_empty' 	=> true,
		) );

		?>
		<ul class="news-updates-wrap">
			<li class="<?php if(is_home()) { echo 'active'; } ?>"><a class="all" data-rel="*" href="<?php echo get_post_type_archive_link( 'post' ); ?>">All</a></li> <?php
			foreach( $categories as $category ) { ?>
				<li class="<?php if($taxonomy->term_id == $category->term_id){ echo 'active'; } ?>"><a href="<?php echo get_category_link($category->term_id); ?> "><?php echo $category->name; ?></a></li> <?php
			} ?>
		</ul> <?php
	}
}


add_action('astra_advanced_header_layout_2_before_title','zylog_breadcums');
function zylog_breadcums() {
	?>
	<div class="ast-advanced-headers-breadcrumb custom-breadcums">
		<?php $id                     = Astra_Ext_Advanced_Headers_Data::get_current_page_header_ids();
			$breadcrumb_old_version = get_post_meta( $id, 'astra-breadcrumb-old', true );

			if ( true === apply_filters( 'astra_addon_advanced_headers_use_astra_breadcrumb_trail', false ) || 'true' !== $breadcrumb_old_version ) {
				astra_get_breadcrumb();
			} else {
				$wpseo_option = get_option( 'wpseo_internallinks' );

				if ( function_exists( 'yoast_breadcrumb' ) && $wpseo_option && true === $wpseo_option['breadcrumbs-enable'] ) {
					yoast_breadcrumb( '<div id="breadcrumbs" >', '</div>' );
				} else {
					astra_breadcrumb();
				}
			} ?>
	</div><!-- .ast-advanced-headers-breadcrumb -->
	<?php
}

// Page Header Title Disable on Post Category Page.
add_filter( 'astra_advanced_header_title', 'page_header_title_disable' ); 

function page_header_title_disable( $title ) { 
	// Add your condition where you don't want the Page Header title. e.g - is_page()
	if ( is_home() || is_category('latest-news') || is_category('old-news') ) {
		$title = 'Read Our Latest Updates';
	}
    return $title;
};

/**
 * Get Post Navigation
 */
if ( ! function_exists( 'astra_single_post_navigation_markup' ) ) {

	/**
	 * Get Post Navigation
	 *
	 * Checks post navigation, if exists return as button.
	 *
	 * @return mixed Post Navigation Buttons
	 */
	function astra_single_post_navigation_markup() {

		$single_post_navigation_enabled = apply_filters( 'astra_single_post_navigation_enabled', true );

		if ( is_single() && $single_post_navigation_enabled ) {

			$post_obj = get_post_type_object( get_post_type() );

			/**
			 * Filter the post pagination markup
			 */
			the_post_navigation(
				apply_filters(
					'astra_single_post_navigation',
					array(
						'prev_text' => __( '< Previous', 'textdomain' ),
						'next_text' => __( 'Next >', 'textdomain' ),
					)
				)
			);

		}
	}
}

add_action( 'astra_entry_after', 'astra_single_post_navigation_markup' );