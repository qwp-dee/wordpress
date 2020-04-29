
/* ---------------------------------------------------------------------------
 *  Contact- Form-7 Displaying Title in Dropdown list
 * --------------------------------------------------------------------------- */


function mjmeurope_post_title() {
    wpcf7_add_shortcode( 'mjmeurope_post_title', 'mjmeurope_views_post_title_shortcode_handler' );
}
add_action( 'wpcf7_init', 'mjmeurope_post_title' );


function mjmeurope_views_post_title_shortcode_handler( $tag ) {
	$curr_id = get_the_ID();
  //print_r($curr_id);
    global $post;
    $args = array( 'post_type' => 'career' );
    $myposts = get_posts( $args );
    $output = '<select name="lstdate" id="fleet" onchange="document.getElementById(\'fleet\').value=this.value;"><option>Select Jobs</option>';
    foreach ( $myposts as $post ) : setup_postdata($post);
       $title = get_the_title();
       $selected_jobs = '';
       if ($curr_id == $post->ID ) { $selected_jobs = 'selected'; }
       $output .= '<option value="'. $title .'"'.$selected_jobs.' >'. $title .' </option>';
       //$output .= '<option value="'. $post->ID .'">'. $title .' </option>';
    endforeach;
    $output .= "</select>";
    return $output; // Displaying career-post title in Dropdownlist
}

// Put shortcode in contact form - [mjmeurope_post_title]
