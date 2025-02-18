<?php
function display_product_table($atts){
    global $post;
	ob_start();

	$attr = shortcode_atts(array(
						'cat'=>''
					),$atts);
   
    $post_args = array('post_type' => 'products',
    					'numberposts'=> -1,
    					'orderby' => 'date',
        				'order' => 'ASC',
					  'tax_query' => array(
        								array(
												'taxonomy' => 'product_categories',
												'field'    => 'slug',
												'terms'    =>  $attr['cat'],
											),
    							),
					  );

	$posts = get_posts($post_args);
	if( wp_is_mobile() ){
		echo '<div class="product-table-wrapper pmain-heading">';
			foreach($posts as $post){
				setup_postdata($post);
				$characteristics 	= get_field('specific_characterstics');
				$automotive 		= get_field('automotive_&_transport');
				$railways 			= get_field('railways');
				$medical_devices 	= get_field('medical_devices');
				$agriculture 		= get_field('agriculture_&_animal');
				$building 			= get_field('building_&_construction');
				$packaging 			= get_field('packaging_&_mtrl_handling');
				$appliances 		= get_field('appliances');
				$industrial 		= get_field('_industrial');

				echo '<h3 class="product-headings product-heading1">grades &  material : ';
				echo '<span class="table-content">'.get_the_title().'</span>';
				echo '</h3>';
				if($characteristics){
					echo '<h3 class="product-headings">other specific characteristics : </h3>';
					echo '<span class="table-content product-char">'.$characteristics.'</span>';
				}
				echo '<h3 class="product-headings">applications across : </h3>';
				echo '<span class="table-content">';
					if( $automotive == 'Yes' ){
						echo '<img data-toggle="tooltip" data-placement="auto" title="Automotive & Transport" src="'.get_stylesheet_directory_uri().'/assets/images/taxi.png">';
					}
					if( $railways == 'Yes' ){
						echo '<img data-toggle="tooltip" data-placement="auto" title="Railways" src="'.get_stylesheet_directory_uri().'/assets/images/train.png">';
					}
					if( $medical_devices == 'Yes' ){
						echo '<img data-toggle="tooltip" data-placement="auto" title="Medical Devices" src="'.get_stylesheet_directory_uri().'/assets/images/doctor.png">';
					}
					if( $agriculture == 'Yes' ){
						echo '<img data-toggle="tooltip" data-placement="auto" title="Agriculture & Animal" src="'.get_stylesheet_directory_uri().'/assets/images/Planting.png">';
					}
					if( $building == 'Yes' ){
						echo '<img data-toggle="tooltip" data-placement="auto" title="Building & Construction" src="'.get_stylesheet_directory_uri().'/assets/images/crane.png">';
					}
					if( $packaging == 'Yes' ){
						echo '<img data-toggle="tooltip" data-placement="auto" title="Packaging and MTRL Handling" src="'.get_stylesheet_directory_uri().'/assets/images/box.png">';
					}
					if( $appliances == 'Yes' ){
						echo '<img data-toggle="tooltip" data-placement="auto" title="Appliances" src="'.get_stylesheet_directory_uri().'/assets/images/user.png">';
					}
					if( $industrial == 'Yes' ){
						echo '<img data-toggle="tooltip" data-placement="auto" title="Industrial" src="'.get_stylesheet_directory_uri().'/assets/images/factory.png">';
					}
				echo '</span>';
				echo '<h3 class="product-headings datasheets">datasheet download : ';
					echo '<span><a class="popup-with-form" href="#datasheet-form">';
						echo '<img class="product-img" src="'.get_stylesheet_directory_uri().'/assets/images/pdf.svg">';
					echo '</a></span>';
				echo '</h3>';
			}
		echo '</div>';
	}else{
		echo '<div class="product-table-wrapper">';
		echo '<div class="ast-row pmain-heading">';
		if( is_page( array('compspectm-7000-series-rigid-tpo-sheets','compspectm-3000-series-flexible-tpo-sheets') ) ){
			echo '<div class="ast-col-md-3">';
			echo '</div>';
			echo '<div class="ast-col-md-9">';
				echo '<h3>APPLICATIONS ACROSS</h3>';
			echo '</div>';
		}else {
			echo '<div class="ast-col-md-6">';
			echo '</div>';
			echo '<div class="ast-col-md-6">';
				echo '<h3>APPLICATIONS ACROSS</h3>';
			echo '</div>';
		}
		echo '</div>';
		echo '<table class="product-table">';
			echo '<tr class="psub-heading">';
				echo '<th>grades &  material</th>';
				if( !is_page( array('compspectm-7000-series-rigid-tpo-sheets','compspectm-3000-series-flexible-tpo-sheets') ) ){
					echo '<th>other specific characteristics</th>';
				}
				echo '<th>';
					echo '<img data-toggle="tooltip" data-placement="auto" title="Automotive & Transport" src="'.get_stylesheet_directory_uri().'/assets/images/taxi.png">';
				echo '</th>';
				echo '<th>';
				echo '<img data-toggle="tooltip" data-placement="auto" title="Railways" src="'.get_stylesheet_directory_uri().'/assets/images/train.png">';
				echo '</th>';
				echo '<th>';
				echo '<img data-toggle="tooltip" data-placement="auto" title="Medical Devices" src="'.get_stylesheet_directory_uri().'/assets/images/doctor.png">';
				echo '</th>';
				echo '<th>';
				echo '<img data-toggle="tooltip" data-placement="auto" title="Agriculture & Animal" src="'.get_stylesheet_directory_uri().'/assets/images/Planting.png">';
				echo '</th>';
				echo '<th>';
				echo '<img data-toggle="tooltip" data-placement="auto" title="Building & Construction" src="'.get_stylesheet_directory_uri().'/assets/images/crane.png">';
				echo '</th>';
				echo '<th>';
				echo '<img data-toggle="tooltip" data-placement="auto" title="Packaging and MTRL Handling" src="'.get_stylesheet_directory_uri().'/assets/images/box.png">';
				echo '</th>';
				echo '<th>';
				echo '<img data-toggle="tooltip" data-placement="auto" title="Appliances" src="'.get_stylesheet_directory_uri().'/assets/images/user.png">';
				echo '</th>';
				echo '<th>';
				echo '<img data-toggle="tooltip" data-placement="auto" title="Industrial" src="'.get_stylesheet_directory_uri().'/assets/images/factory.png">';
				echo '</th>';
				echo '<th>datasheets</th>';
			echo '</tr>';
			foreach($posts as $post){
				setup_postdata($post);
				$characteristics 	= get_field('specific_characterstics');
				$automotive 		= get_field('automotive_&_transport');
				$railways 			= get_field('railways');
				$medical_devices 	= get_field('medical_devices');
				$agriculture 		= get_field('agriculture_&_animal');
				$building 			= get_field('building_&_construction');
				$packaging 			= get_field('packaging_&_mtrl_handling');
				$appliances 		= get_field('appliances');
				$industrial 		= get_field('_industrial');

				echo '<tr>';
					echo '<td>';
						echo '<p>';
							the_title();
						echo '</p>';
					echo '</td>';
					if( !is_page( array('compspectm-7000-series-rigid-tpo-sheets','compspectm-3000-series-flexible-tpo-sheets') )){
						echo '<td>';
							if( $characteristics){
								echo $characteristics;
							}
						echo '</td>';
					}
					if( $automotive == 'Yes' ){
						echo '<td class="product-checked">';
						echo '</td>';
					}else{
						echo '<td>';
						echo '</td>';
					}
					if( $railways == 'Yes' ){
						echo '<td class="product-checked">';
						echo '</td>';
					}else{
						echo '<td>';
						echo '</td>';
					}
					if( $medical_devices == 'Yes' ){
						echo '<td class="product-checked">';
						echo '</td>';
					}else{
						echo '<td>';
						echo '</td>';
					}
					if( $agriculture == 'Yes' ){
						echo '<td class="product-checked">';
						echo '</td>';
					}else{
						echo '<td>';
						echo '</td>';
					}
					if( $building == 'Yes' ){
						echo '<td class="product-checked">';
						echo '</td>';
					}else{
						echo '<td>';
						echo '</td>';
					}
					if( $packaging == 'Yes' ){
						echo '<td class="product-checked">';
						echo '</td>';
					}else{
						echo '<td>';
						echo '</td>';
					}
					if( $appliances == 'Yes' ){
						echo '<td class="product-checked">';
						echo '</td>';
					}else{
						echo '<td>';
						echo '</td>';
					}
					if( $industrial == 'Yes' ){
						echo '<td class="product-checked">';
						echo '</td>';
					}else{
						echo '<td>';
						echo '</td>';
					}
					echo '<td class="datasheets">';
						echo '<a class="popup-with-form" href="#datasheet-form"></a>';
					echo '</td>';
				echo '</tr>';
			}
		echo '</table>';
		echo '</div>';
	}
	echo '<div class="white-popup-block  mfp-hide" id="datasheet-form">';
		echo '<p>Please fill out the form below</p>';
		echo do_shortcode( '[contact-form-7 id="1511" title="Product popup form"]' );
	echo '</div>';
	wp_reset_postdata();
	$output = ob_get_contents();
	ob_get_clean();
	return $output;
	
}
add_shortcode('product-table','display_product_table');