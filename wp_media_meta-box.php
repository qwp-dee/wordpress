<?php
/*
Template Name: Wp Media upload  metabox Template

*/


/*---------------------------------------------------------------------------------------------
* Display fornt-end image metabox values.

		$display_image	=	get_post_meta(get_the_ID(),'aw_custom_image',true); ?>
			<img src="<?php echo($display_image); ?>">

*----------------------------------------------------------------------------------------------- */


/*---------------------------------------------------------------------------------------------
* Create Wp-media image upload custom metabox. 
*----------------------------------------------------------------------------------------------- */

if (!function_exists('custom_meta_boxes')) :
		function custom_meta_boxes( $post_type, $post ) {
   			 add_meta_box(
    		    'aw-meta-box',         // Matabox Id 
   			     __( 'Custom Image' ), // Matabox Title 
    		    'render_aw_meta_box',  // Callback Function
   	 		    array('post', 'page'), // Post types here
     			'normal',
      			'high'
   			 );
		}
endif;
add_action( 'add_meta_boxes', 'custom_meta_boxes', 10, 2 );

/*---------------------------------------------------------------------------------------------
* Metabox Callback function. 
*-----------------------------------------------------------------------------------------------
*/

if (!function_exists('render_aw_meta_box')) :
		function render_aw_meta_box($post) {
   		 $image = get_post_meta($post->ID, 'aw_custom_image', true); ?>
    <table>
        <tr>
            <td><a href="#" class="aw_upload_image_button button button-secondary"><?php _e('Upload Image'); ?></a></td>
            <td><input type="text" name="aw_custom_image" id="aw_custom_image" value="<?php echo $image; ?>" style="width:500px;" /></td>
        </tr>
    </table>
    <?php
}
endif;

/*---------------------------------------------------------------------------------------------
* Wp-media include scripts  
*----------------------------------------------------------------------------------------------- */
if (function_exists('aw_include_script')) :
	function aw_include_script() {
    	if ( ! did_action( 'wp_enqueue_media' ) ) {
       		 wp_enqueue_media();
   		}
    wp_enqueue_script( 'awscript', get_stylesheet_directory_uri() . '/assets/js/awscript.js', array('jquery'), null, false );
	}	
endif;
add_action( 'admin_enqueue_scripts', 'aw_include_script' );

/*---------------------------------------------------------------------------------------------
* Save/update metabox values . 
*----------------------------------------------------------------------------------------------- */
if (!function_exists('aw_save_postdata')) :
	function aw_save_postdata($post_id){
   	 if (array_key_exists('aw_custom_image', $_POST)) {
        update_post_meta( $post_id, 'aw_custom_image', $_POST['aw_custom_image'] );
      }
	}

endif;
add_action('save_post', 'aw_save_postdata');

/*---------------------------------------------------------------------------------------------
* JavaScripts file for wp-media-script  /assets/js/awscript.js
*----------------------------------------------------------------------------------------------- 
*/
?>
<script type="text/javascript">

	jQuery(function($){
	    $('body').on('click', '.aw_upload_image_button', function(e){
	        e.preventDefault();
	  
	        var button = $(this),
	        aw_uploader = wp.media({
	            title: 'Custom image',
	            library : {
	                uploadedTo : wp.media.view.settings.post.id,
	                type : 'image'
	            },
	            button: {
	                text: 'Use this image'
	            },
	            multiple: false
	        }).on('select', function() {
	            var attachment = aw_uploader.state().get('selection').first().toJSON();
	            $('#aw_custom_image').val(attachment.url);
	        })
	        .open();
	    });
	});

</script>