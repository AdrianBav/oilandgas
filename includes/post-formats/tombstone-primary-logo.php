<?php
	// Image settings
	$post_image_before 	= '';
	$post_image_after  	= '';
	$thumb				= get_post_thumbnail_id(); 					//get img ID
	$img_url      		= wp_get_attachment_url($thumb, 'full'); 	//get img URL
	$img_width    		= '250';
	$img_height   		= '71';
	$figure_class 		= 'business-logo';
	$img_attr 			= (of_get_option('load_image') == 'false' || of_get_option('load_image')=="")?'src="':'src="//" data-src="';

	// Resize & crop img
	$image = $img_attr.aq_resize($img_url, $img_width, $img_height, true).'"';

	// Image markup
	echo '<figure class="'.$figure_class.'">'.$post_image_before.'<img '.$image.' alt="'.get_the_title().'" >'.$post_image_after.'</figure>';
?>