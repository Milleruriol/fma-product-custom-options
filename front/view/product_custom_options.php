<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
require_once FMEPCO_PLUGIN_DIR . 'front/class-fme-product-custom-option-front.php';
$custom_options = new FME_Product_Custom_Options_Front();



$ProductOptions = $custom_options->getProductOptions($post->ID);

$currency = get_woocommerce_currency();
$string = get_woocommerce_currency_symbol( $currency );
$proprice = get_post_meta($post->ID, "_price", true);
$product_image =get_the_post_thumbnail($post->ID);
$temp_slug= get_post_field('post_name');


?>

    			 


<!--<div class="custom_options">-->

	

	<!-- Product Options Start-->

	<?php if($ProductOptions!='') { ?>
	<?php foreach ($ProductOptions as $global_option) { ?>
	
			
       			
	<?php 
		$title = strtolower(str_replace(' ', '_', $global_option->option_title));

		if(isset($_POST['product_options'][$title]) && $_POST['product_options'][$title]!='') {
			$val_post = $_POST['product_options'][$title];
		} else { $val_post = ''; }

	?>



 
    

	<!--<div class="fmecustomgroup">	-->








<?php $var=str_replace(' ', '-', $global_option->option_title);
echo '<div class="panel panel-default" id="opt_'.$var.'_top">

	<div class="panel-heading" role="tab" id="heading'.$var.'">';?>
<div class="row">
		<div class="col-sm-6">
     				 <h4 class="panel-title"><?php $var=str_replace(' ', '-', $global_option->option_title);?>
      					<?php echo'<a role="button" data-toggle="collapse" data-parent="#accordionb" id="opt_'.$var.'" href="#collapse'.$var.'" aria-expanded="false" aria-controls="collapse'.$var.'">';?>
						<p><i class="fa fa-bars" aria-hidden="true"></i>
								<span class="name" ><?php echo stripslashes($global_option->option_title); ?> 
								<?php if($global_option->option_is_required == 'yes') { ?>
									<!--<span class="required">*</span>-->
								<?php } ?>
								<!-- :- -->
								<?php if($global_option->option_price != '') { ?>
									<?php if($global_option->option_price_type == 'percent') { ?>
										<span class="price">(
											<?php
												echo wc_price($proprice*$global_option->option_price/100, array(
												    'ex_tax_label'       => false,
												    'currency'           => '',
												    'decimal_separator'  => wc_get_price_decimal_separator(),
												    'thousand_separator' => wc_get_price_thousand_separator(),
												    'decimals'           => wc_get_price_decimals(),
												    'price_format'       => get_woocommerce_price_format()
												) );											
											?>
										)</span></span><!-- end of price div-->
									<?php } else { ?>
										<span class="price">(
											<?php 


												echo wc_price($global_option->option_price, array(
												    'ex_tax_label'       => false,
												    'currency'           => '',
												    'decimal_separator'  => wc_get_price_decimal_separator(),
												    'thousand_separator' => wc_get_price_thousand_separator(),
												    'decimals'           => wc_get_price_decimals(),
												    'price_format'       => get_woocommerce_price_format()
												) );



											 ?>
										)</span> </span><!-- end of price div-->
									<?php } ?>
								<?php } ?>
							</p>
		<?php echo "</a></h4></div> <div class=\"col-sm-6\">
<p><strong>Name: </strong><span class=\"opt_".$var."_a\"></span> <strong><br></strong><span class=\"opt_".$var."_b\"></span></p>
     				</div> </div></div><!--panel-heading-->"; 
		//$args = array('post__in' => array(1094,1097));

$posts = get_posts( array(
    'include'   => '2325,2433,2446,2689,2691,2699,2701,2705,6194,6199,6203,6218,7469',
    'post_type' => 'page',
    'orderby'   => 'post__in',
) );

echo '<div id="collapse'.$var.'"  class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading'.$var.'"><div class="panel-body" >';
switch($var){
	case"Protective-Aluminum-Hood":
	$my_id = 2325;
	foreach($posts as $p):
		if($p->ID==$my_id):
			echo $p->post_content;
		endif;
		endforeach;
	break;
	case"Mount":
	if ($temp_slug =='suncover-1000'){ $my_id = 6218; }
	else{ $my_id = 2433;}
	foreach($posts as $p):
		if($p->ID==$my_id):
			echo $p->post_content;
		endif;
		endforeach;
	break;

	// Valance Height
	case"Valance-Height":
	if ($temp_slug =='replacement-fabric'){ echo "The valance slides into a track on the front bar and measures typically 8 inches long. Any valance over 8 inches tall will add to the cost as listed. <div class='' style='text-align: center; color: #d'> <a class='panel-title' type='button' data-toggle='collapse' data-target='#vaunit' aria-expanded='false' aria-controls='collapseExample'> <span><svg xmlns='https://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24'><path d='M24 12c0-6.627-5.373-12-12-12s-12 5.373-12 12 5.373 12 12 12 12-5.373 12-12zm-17 1h4v-8h2v8h4l-5 6-5-6z'></path></svg></span><strong>Choose an option</strong></a></div>"; }
	foreach($posts as $p):
		if($p->ID==$my_id):
			echo $p->post_content;
		endif;
		endforeach;
	
	break;
	// End Valance Height

	case"Frame-Color":
	if ($temp_slug =='suncover-1000'){ $my_id = 6194; }
	elseif ($temp_slug =='suncover-4000'){ $my_id = 7469; }
	else{ $my_id = 2446;}
	foreach($posts as $p):
		if($p->ID==$my_id):
			echo $p->post_content;
		endif;
		endforeach;
	
	break;

	case"Drive-Option":
		if ($temp_slug =='suncover-1000'){ $my_id = 6199; }
	else{ $my_id = 2689;}
	
	foreach($posts as $p):
		if($p->ID==$my_id):
			echo $p->post_content;
		endif;
		endforeach;
	break;

	case"Crank-Length":
	if ($temp_slug =='suncover-1000'){ $my_id = 6203; }
	else{ $my_id = 2691; }
	foreach($posts as $p):
		if($p->ID==$my_id):
			echo $p->post_content;
		endif;
		endforeach;
	break;
	/*case"Fabric":
	$my_id = 2699;
	foreach($posts as $p):
		if($p->ID==$my_id):
			echo $p->post_content;
		endif;
		endforeach;
	break;*/
		/*case"Valance-Type":
	$my_id = 2701;
	foreach($posts as $p):
		if($p->ID==$my_id):
			echo $p->post_content;
		endif;
		endforeach;
	break;*/
	case"Valance-Type":
	if ($temp_slug =='suncover-4000'){
		echo do_shortcode( '[gallery link="none" ids="3004" itemtag="div" icontag="span" captiontag="p"]' );
	}
	else if ($temp_slug =='suncover-5000'){
		echo do_shortcode( '[gallery link="none" ids="3000,3001,3002,3003,3004,2993" itemtag="div" icontag="span" captiontag="p"]' );
	}
	else if ($temp_slug =='replacement-fabric'){
		echo do_shortcode( '[gallery link="none" ids="3000,3001,3002,3003,3004,2993" itemtag="div" icontag="span" captiontag="p"]' );
	}
	else if ($temp_slug =='suncover-1000'){
		echo do_shortcode( '[gallery link="none" ids="2993" itemtag="div" icontag="span" captiontag="p"]' );
	}
		echo '

<div class="">
<div class="" style="text-align: center; color: #4eb14d;">
		<a class="panel-title" type="button" data-toggle="collapse" data-target="#vaunit" aria-expanded="false" aria-controls="collapseExample">
		<span><svg xmlns="https://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"><path d="M24 12c0-6.627-5.373-12-12-12s-12 5.373-12 12 5.373 12 12 12 12-5.373 12-12zm-17 1h4v-8h2v8h4l-5 6-5-6z"/></svg></span><strong> Valance Description</strong></a>
	</div>
<div id="vaunit" class="collapse"><div class="panel">
	<p>The valance is located on the front of the awning which provides additional solar protection. The fabric is the same as the main body.  All the stripes and seams will line up with the main cover. You can select from several styles shown here.</p></div>


</div>';
	
echo '</div>';
break;
		
		/*case"Braid-Color":
	$my_id = 2705;
	foreach($posts as $p):
		if($p->ID==$my_id):
			echo $p->post_content;
		endif;
		endforeach;
	break;
	*/

	case"Braid-Color":
		if ($temp_slug =='suncover-4000'){
		echo do_shortcode('[gallery link="none" ids="3136" itemtag="div" icontag="span" captiontag="p"]'  );
	}
		else if ($temp_slug =='suncover-5000'){					
			echo do_shortcode( '[gallery link="none" ids="3136,2941,2942,2940,2939,2938,2943,2944,2950,2951,2947,2946,2945,2937,2936,2927,2928,2926,2929,2930,2935,2933,2932,2931" itemtag="div" icontag="span" captiontag="p"]' );
		}
		else if ($temp_slug =='replacement-fabric'){					
			echo do_shortcode( '[gallery link="none" ids="3136,2941,2942,2940,2939,2938,2943,2944,2950,2951,2947,2946,2945,2937,2936,2927,2928,2926,2929,2930,2935,2933,2932,2931" itemtag="div" icontag="span" captiontag="p"]' );
		}
		else if ($temp_slug =='suncover-1000'){					
			echo do_shortcode( '[gallery link="none" ids="3136" itemtag="div" icontag="span" captiontag="p"]' );
		}
							echo '

<div class="">
<div class="">
<div id="heading1" class="" style="text-align: center; color: #4eb14d;" role="tab"><a class="panel-title" type="button" data-toggle="collapse" data-target="#braunit" aria-expanded="false" aria-controls="collapseExample">
<span><svg xmlns="https://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"><path d="M24 12c0-6.627-5.373-12-12-12s-12 5.373-12 12 5.373 12 12 12 12-5.373 12-12zm-17 1h4v-8h2v8h4l-5 6-5-6z"/></svg></span><strong> Braid Color Description</strong></a></div>
<div id="braunit" class="collapse">

<p>The braid, which is the finished edging on the bottom edge of the valance, is also 100% acrylic and is guaranteed not to fade. The braid is stitched onto the valance.</p><a href="/wp-content/uploads/2018/11/DIY-Braid-Color-Options.pdf" style="text-align: center;" target="_blank">More Info</a> 


</div>
</div>';
	
echo '</div>';
break;

	case"Fabric":
	////////




	//////
/*
		echo ' 
   <label class="switch">
    	<input class="switch-input" type="checkbox" checked>
    	<span class="switch-label" data-on="Stripes" data-off="Solids"></span> 
    	<span class="switch-handle"></span> 
    </label>';*/
							///gallery
		echo '<div id="lightbox">';
	// display image gallery
if ($temp_slug =='suncover-4000'){
	$args = array('order'=>'ASC', 'post_type'=>'attachment', 'include'   => '3007,3008,3009,3010,3011,3012', 'post_mime_type'=>'image', 'post_status'=>null, 'numberposts'=>9); 
}
else if ($temp_slug =='suncover-5000'){
	$args = array('order'=>'ASC', 'post_type'=>'attachment', 'include'   => '3007,3008,3009,3010,3011,3012,3013,3014,3015,3016,3017,3018,3019,3020,3021,3022,3023,3024,3025,3026,3027,3028,3029,3030,3031,3032,3033,3034,3035,3036,3037,3038,3039,3040,3041,3042,3043,3044,3045,3046,3047,3048,3049,3050,3051,3052,3053,3054,3055,3056,3057,3058,3059,3060,3061,3062,3063,3064,9183,9501,9502,9503,9504,9505,9506,9507,9508,9509,9510,9511,9512,9513,9514,9515,9516', 'post_mime_type'=>'image', 'post_status'=>null, 'numberposts'=>9); 
}
else if ($temp_slug =='replacement-fabric'){
	$args = array('order'=>'ASC', 'post_type'=>'attachment', 'include'   => '3007,3008,3009,3010,3011,3012,3013,3014,3015,3016,3017,3018,3019,3020,3021,3022,3023,3024,3025,3026,3027,3028,3029,3030,3031,3032,3033,3034,3035,3036,3037,3038,3039,3040,3041,3042,3043,3044,3045,3046,3047,3048,3049,3050,3051,3052,3053,3054,3055,3056,3057,3058,3059,3060,3061,3062,3063,3064', 'post_mime_type'=>'image', 'post_status'=>null, 'numberposts'=>9); 
}
	$items = get_posts($args);
	/*echo'<pre>';
	print_r($items);
	echo'</pre>';*/
	if ($items) {
		foreach ($items as $item) {
			$atts = wp_get_attachment_image_src($item->ID, 'full');
			$title = get_the_title($item->ID);
			 $image_caption = $item->post_excerpt;
			 $image_link = get_permalink($item->ID);
			 $image_alt      = get_post_meta( $item->ID, '_wp_attachment_image_alt', true );
			$title_truncated = substr($title, 0, 18);
			if (strlen($title) > 18) {
				$title_display = $title_truncated . '..';
			} else {
				$title_display = $title_truncated . '';	
			} ?>

			<div class="gallery-item col-md-4 solid">
				<span class="gallery-icon landscape" rel="gallery" href="<?php echo wp_get_attachment_url($item->ID); ?>" title="Image #<?php echo get_the_title($item->ID); ?>">
			<div class="wfm">
				<img class="attachment-thumbnail size-thumbnail" src="<?php echo $atts[0]; ?>" width="<?php echo $atts[1]; ?>" height="<?php echo $atts[2]; ?>"  alt="<?php echo $image_alt ?>">
				</div>
				<div class="block"><div class="col-md-6 col-xs-6 b-select">
					<i class="fa fa-square-o fa-2" aria-hidden="true"></i><br>Select</div>
					<div class="col-md-6 col-xs-6 b-zoom"><a class="ajax-popup-link" href="<?php echo $image_link; ?>"><i class="fa fa-eye fa-2" aria-hidden="true"></i></a><br>zoom</div></div>
				</span>
				<p class="wp-caption-text gallery-caption"><?php  echo $image_caption; ?><!--<a href="<?php the_permalink(); ?>" > <?php echo $image_caption; ?>
				</a>--></p>
			</div>
			
		<?php }
	} 
//echo'</div><!--end of lightbox-->';

		/// end gallery



							//echo '</div></div></div>';
			//echo'				';

					///gallery
		//echo '<div id="lightbox">';
	// display image gallery
if ($temp_slug =='suncover-4000'){
	$args = array('order'=>'ASC', 'post_type'=>'attachment', 'include'   => '3065,3066,3067,3068,3069,3070', 'post_mime_type'=>'image', 'post_status'=>null, 'numberposts'=>9); 
}
else if ($temp_slug =='suncover-5000'){
	$args = array('order'=>'ASC', 'post_type'=>'attachment', 'include'   => '3065,3066,3067,3068,3069,3070,3071,3072,3073,3074,3075,3076,3077,3078,3079,3080,3081,3082,3083,3084,3085,3086,3087,3088,3089,3090,3091,3092,3093,3094,3095,3096,3097,3098,3099,3100,3101,3102,3103,3104,3105,3106,3107,3108,3109,3110,3111,3112,3113,3114,3115,3116,3117,3118,3119,3120,3121,3122,3123,3124,3125,3126,3127,3128,3129,3130', 'post_mime_type'=>'image', 'post_status'=>null, 'numberposts'=>9);
}
else if ($temp_slug =='replacement-fabric'){
	$args = array('order'=>'ASC', 'post_type'=>'attachment', 'include'   => '3065,3066,3067,3068,3069,3070,3071,3072,3073,3074,3075,3076,3077,3078,3079,3080,3081,3082,3083,3084,3085,3086,3087,3088,3089,3090,3091,3092,3093,3094,3095,3096,3097,3098,3099,3100,3101,3102,3103,3104,3105,3106,3107,3108,3109,3110,3111,3112,3114,3115,3116,3117,3118,3119,3120,3121,3122,3123,3124,3125,3126,3127,3128,3129,3130', 'post_mime_type'=>'image', 'post_status'=>null, 'numberposts'=>9);
}
	$items = get_posts($args);
/*	echo'<pre>';
	print_r($items);
	echo'</pre>';*/
	if ($items) {
		foreach ($items as $item) {
			$atts = wp_get_attachment_image_src($item->ID, 'full');
			$title = get_the_title($item->ID);
			 $image_caption = $item->post_excerpt;
			 $image_link = get_permalink($item->ID);
			 $image_alt      = get_post_meta( $item->ID, '_wp_attachment_image_alt', true );
			$title_truncated = substr($title, 0, 18);
			if (strlen($title) > 18) {
				$title_display = $title_truncated . '..';
			} else {
				$title_display = $title_truncated . '';	
			} ?>

			<div class="gallery-item col-md-4 stripe">
				<span class="gallery-icon landscape" rel="gallery" href="<?php echo wp_get_attachment_url($item->ID); ?>" title="Image #<?php echo get_the_title($item->ID); ?>">
			<div class="wfm">
				<img class="attachment-thumbnail size-thumbnail" src="<?php echo $atts[0]; ?>" width="<?php echo $atts[1]; ?>" height="<?php echo $atts[2]; ?>" alt="<?php echo $image_alt ?>" >
			</div>	
				<div class="block"><div class="col-md-6 col-xs-6 b-select">
					<i class="fa fa-square-o fa-2" aria-hidden="true"></i><br>Select</div>
					<div class="col-md-6 col-xs-6 b-zoom"><a class="ajax-popup-link" href="<?php echo $image_link; ?>"><i class="fa fa-eye fa-2" aria-hidden="true"></i></a><br>zoom</div></div>
				</span>
				<p class="wp-caption-text gallery-caption"><?php echo substr($image_caption,0,12); ?><!--<a href="<?php the_permalink(); ?>" > <?php echo $image_caption; ?>
				</a>--></p>
			</div>
			
		<?php }
	} 
echo  '</div><!--end of lightbox-->
	<div class="fabric-desc">
		<div class="" style="text-align: center; color: #4eb14d;">
			<a class="panel-title" type="button" data-toggle="collapse" data-target="#vaunit-fabric" aria-expanded="false" aria-controls="collapseExample">
				<span>
					<svg xmlns="https://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"><path d="M24 12c0-6.627-5.373-12-12-12s-12 5.373-12 12 5.373 12 12 12 12-5.373 12-12zm-17 1h4v-8h2v8h4l-5 6-5-6z"></path></svg>
				</span>
				<strong> Fabric Description</strong>
			</a>
		</div>
		<div id="vaunit-fabric" class="collapse"><div class="panel">
			<p>
				We use only first grade, 100% acrylic Shade and marine grade fabric from Sunbrella.  This fabric carries an 8 full year warranty from rot, mildew and excessive fading.  The panels are sewn with GORE Tenera thread which carries the same 8 year warranty.
			</p>
		</div>
	</div></div>';
		/// end gallery
/*

							echo do_shortcode( '[gallery link="none" ids="3065,3066,3067,3068,3069,3070,3071,3072,3073,3074,3075,3076,3077,3078,3079,3080,3081,3082,3083,3084,3085,3086,3087,3088,3089,3090,3091,3092,3093,3094,3095,3096,3097,3098,3099,3100,3101,3102,3103,3104,3105,3106,3107,3108,3109,3110,3111,3112,3113,3114,3115,3116,3117,3118,3119,3120,3121,3122,3123,3124,3125,3126,3127,3128,3129,3130" itemtag="div" icontag="span" captiontag="p"],' );*/
							//echo '</div></div>';
	
	
//echo '</div>';
break;
	
	

}
//print_r($posts);
//echo $posts->$my_id;
echo '</div>';
		?>




    			

		<?php if($global_option->option_field_type == 'field') { ?>
			<input data-price="<?php if($global_option->option_price_type == 'percent') { echo $proprice*$global_option->option_price/100; } else { echo $global_option->option_price; }  ?>" class="fmeop fmeinput" type="text" maxlength="<?php echo $global_option->option_maxchars; ?>" value="<?php if( ! empty($val_post) ){ echo $val_post; } ?>" name="product_options[<?php echo strtolower(str_replace(' ', '_', $global_option->option_title)); ?>]"></div></div> <!--select after price input-->
		<?php } else if($global_option->option_field_type == 'area') { ?>
			<textarea data-price="<?php if($global_option->option_price_type == 'percent') { echo $proprice*$global_option->option_price/100; } else { echo $global_option->option_price; }  ?>" class="fmeop fmeinput" maxlength="<?php echo $global_option->option_maxchars; ?>" name="product_options[<?php echo strtolower(str_replace(' ', '_', $global_option->option_title)); ?>]"><?php if( ! empty($val_post) ){ echo $val_post; } ?></textarea>
		<?php } else if($global_option->option_field_type == 'drop_down') { ?> 
			<select type="select" class="fma fmeop fmeinput" name="product_options[<?php echo strtolower(str_replace(' ', '_', $global_option->option_title)); ?>]">
				<?php $RowOptions = $this->getRowOptions($global_option->id) ?>
				<?php foreach($RowOptions as $option_row) { ?>
					<option <?php selected($val_post,$option_row->option_row_title); ?> data-price="<?php if($option_row->option_row_price_type == 'percent') { echo $proprice*$option_row->option_row_price/100; } else { echo $option_row->option_row_price; }  ?>" value="<?php echo $option_row->option_row_title; ?>">
					<?php echo $option_row->option_row_title; ?>   
					<?php if($option_row->option_row_price != '') { ?>
						<?php if($option_row->option_row_price_type == 'percent') { ?>
							-  <span class="price">(
								<?php 


							echo wc_price($proprice*$option_row->option_row_price/100, array(
							    'ex_tax_label'       => false,
							    'currency'           => '',
							    'decimal_separator'  => wc_get_price_decimal_separator(),
							    'thousand_separator' => wc_get_price_thousand_separator(),
							    'decimals'           => wc_get_price_decimals(),
							    'price_format'       => get_woocommerce_price_format()
							) );


							 ?>
							)</span>
						<?php } else { ?>
							-  <span class="price">(
								<?php 



								echo wc_price($option_row->option_row_price, array(
								    'ex_tax_label'       => false,
								    'currency'           => '',
								    'decimal_separator'  => wc_get_price_decimal_separator(),
								    'thousand_separator' => wc_get_price_thousand_separator(),
								    'decimals'           => wc_get_price_decimals(),
								    'price_format'       => get_woocommerce_price_format()
								) );


								 ?>
							)</span>
						<?php } ?>
					<?php } ?>
					</option>
				<?php } ?>
			</select></div></div><!--select after price 1-->	
		<?php } else if($global_option->option_field_type == 'multiple') { ?> 
			<select type="mselect" multiple = "multiple" class="fmm fmeop fmeinput multi" name="product_options[<?php echo strtolower(str_replace(' ', '_', $global_option->option_title)); ?>][]">
				<?php $RowOptions = $this->getRowOptions($global_option->id) ?>
				<?php foreach($RowOptions as $option_row) { ?>
					<?php 
						$title = strtolower(str_replace(' ', '_', $global_option->option_title));

						if(isset($_POST['product_options'][$title]) && $_POST['product_options'][$title]!='') {
							$val_post2 = $_POST['product_options'][$title];
						} else { $val_post2 = ''; } 

					?>
					<option <?php if($val_post2!='') { foreach ($val_post2 as $valp) { selected($valp,$option_row->option_row_title); } } ?> data-price="<?php if($option_row->option_row_price_type == 'percent') { echo $proprice*$option_row->option_row_price/100; } else { echo $option_row->option_row_price; }  ?>" value="<?php echo $option_row->option_row_title; ?>">
					<?php echo $option_row->option_row_title; ?>   
					<?php if($option_row->option_row_price != '') { ?>
						<?php if($option_row->option_row_price_type == 'percent') { ?>
							-  <span class="price">(
								<?php 


								echo wc_price($proprice*$option_row->option_row_price/100, array(
								    'ex_tax_label'       => false,
								    'currency'           => '',
								    'decimal_separator'  => wc_get_price_decimal_separator(),
								    'thousand_separator' => wc_get_price_thousand_separator(),
								    'decimals'           => wc_get_price_decimals(),
								    'price_format'       => get_woocommerce_price_format()
								) );

								 ?>
							)</span>
						<?php } else { ?>
							-  <span class="price">(
								<?php 

								echo wc_price($option_row->option_row_price, array(
								    'ex_tax_label'       => false,
								    'currency'           => '',
								    'decimal_separator'  => wc_get_price_decimal_separator(),
								    'thousand_separator' => wc_get_price_thousand_separator(),
								    'decimals'           => wc_get_price_decimals(),
								    'price_format'       => get_woocommerce_price_format()
								) );

								 ?>
							)</span>
						<?php } ?>
					<?php } ?>
					</option>
				<?php } ?>
			</select></div><!-- .select 2--><!--panel panel-default-->	
		<?php } ?>
		
	
	<?php } ;?>
	<?php } ?>

<?php ?>

	<!-- Product Options End-->




<?php 
				
			$product = get_product( $post->ID );
				
			if ( is_object( $product ) ) {
				
				$tax_display_mode = get_option( 'woocommerce_tax_display_shop' );
				
				$d_price    = $tax_display_mode == 'incl' ? $product->get_price_including_tax() : $product->get_price_excluding_tax();
			
			} else {
				
				$d_price    = '';
				
			}

?>
<div class="price_total">
	<div id="product_options_total" product-type="<?php echo $product->product_type;  ?>" product-price="<?php echo $d_price; ?>"></div>
</div>

<script type="text/javascript">
	jQuery( document ).ready( function($) {
	
	$(this).on( 'change', 'input:text, select, textarea, input.qty', function() {

		ProductCustomOptions();
		
	});
	
	ProductCustomOptions();
	
	function ProductCustomOptions() {
	
		var option_total = 0;
		
		var product_price = $('#product_options_total').attr( 'product-price' );
		
		var product_total_price = 0;
		
		var final_total = 0;
		
		$('.fmeop').each( function() {
			
			var option_price = 0;
			if($(this).attr('type') == 'select') {

				option_price = $("option:selected", this).attr('data-price');

			} else if($(this).attr('type') == 'mselect') {
					
					var sum = option_price;
				    $( "option:selected", this ).each(function() {
				      str = parseFloat($( this ).attr('data-price'));
				      sum = str+sum;
				    });
				    option_price = sum;

			} else {
			
				option_price = $(this).attr('data-price');
			}
			var value_entered =  $(this).val();
			
			if(value_entered != '' || option_price == 0)
			{
				option_total = parseFloat( option_total ) + parseFloat( option_price );
			}
			
		});
		
		
		var qty = $('.qty').val();
		
		if ( option_total > 0 && qty > 0 ) {
			
			option_total = parseFloat( option_total * qty );

			var price_form = "<?php echo get_option( 'woocommerce_currency_pos' ); ?>";
			var op_price = '';
			
			if(price_form == 'left') {
				op_price = accounting.formatMoney(option_total, { symbol: "<?php echo $string; ?>",  format: "%s%v" }, "<?php echo wc_get_price_decimals(); ?>", "<?php echo wc_get_price_thousand_separator(); ?>", "<?php echo wc_get_price_decimal_separator(); ?>"); // €4.999,99
			} else if(price_form == 'left_space') {
				op_price = accounting.formatMoney(option_total, { symbol: "<?php echo $string; ?>",  format: "%s %v" }, "<?php echo wc_get_price_decimals(); ?>", "<?php echo wc_get_price_thousand_separator(); ?>", "<?php echo wc_get_price_decimal_separator(); ?>"); // €4.999,99
			} else if(price_form == 'right') {
				op_price = accounting.formatMoney(option_total, { symbol: "<?php echo $string; ?>",  format: "%v%s" }, "<?php echo wc_get_price_decimals(); ?>", "<?php echo wc_get_price_thousand_separator(); ?>", "<?php echo wc_get_price_decimal_separator(); ?>"); // €4.999,99
			} else if(price_form == 'right_space') {
				op_price = accounting.formatMoney(option_total, { symbol: "<?php echo $string; ?>",  format: "%v %s" }, "<?php echo wc_get_price_decimals(); ?>", "<?php echo wc_get_price_thousand_separator(); ?>", "<?php echo wc_get_price_decimal_separator(); ?>"); // €4.999,99
			}
			

			if ( product_price ) {

				product_total_price = parseFloat( product_price * qty );
				

			}
			
			final_total = option_total + product_total_price;

			var fi_price = '';
			
			if(price_form == 'left') {
				fi_price = accounting.formatMoney(final_total, { symbol: "<?php echo $string; ?>",  format: "%s%v" }, "<?php echo wc_get_price_decimals(); ?>", "<?php echo wc_get_price_thousand_separator(); ?>", "<?php echo wc_get_price_decimal_separator(); ?>"); // €4.999,99
			} else if(price_form == 'left_space') {
				fi_price = accounting.formatMoney(final_total, { symbol: "<?php echo $string; ?>",  format: "%s %v" }, "<?php echo wc_get_price_decimals(); ?>", "<?php echo wc_get_price_thousand_separator(); ?>", "<?php echo wc_get_price_decimal_separator(); ?>"); // €4.999,99
			} else if(price_form == 'right') {
				fi_price = accounting.formatMoney(final_total, { symbol: "<?php echo $string; ?>",  format: "%v%s" }, "<?php echo wc_get_price_decimals(); ?>", "<?php echo wc_get_price_thousand_separator(); ?>", "<?php echo wc_get_price_decimal_separator(); ?>"); // €4.999,99
			} else if(price_form == 'right_space') {
				fi_price = accounting.formatMoney(final_total, { symbol: "<?php echo $string; ?>",  format: "%v %s" }, "<?php echo wc_get_price_decimals(); ?>", "<?php echo wc_get_price_thousand_separator(); ?>", "<?php echo wc_get_price_decimal_separator(); ?>"); // €4.999,99
			}

			html = '';
			
			
				html = html + '<div class="tprice"><div class="leftprice"><?php echo _e("Options Total:","fmepco") ?></div><div class="rightprice optionprice">'+op_price+'</div></div>';
			
			
			if ( final_total ) {
				
				
					html = html + '<div class="tprice"><div class="leftprice"><?php echo _e("Final Total:","fmepco") ?></div><div class="rightprice finalprice">'+fi_price+'</div></div>';
				

			}

			html = html + '</dl>';

			$('#product_options_total').html( html );
				
		} else {
			
			$('#product_options_total').html( '' );
		}
	}	
		
});



</script>

<script>
    var URL = "<?php echo FMEPCO_URL; ?>";
</script>

