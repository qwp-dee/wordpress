<?php

/* Thems Stylesheets*/
if (!function_exists('wp_load_themes_scripts')) :

	function wp_load_themes_scripts(){
     
    /*--Template Stylesheet--*/
    wp_enqueue_style( 'wp-themes_stlesheet', wp_THEME_URI. '/assets/css/style.css', array(), wp_VERSION );

    wp_enqueue_style( 'theme-style', HTN_THEME_URI . '/assets/css/style.css',false, HTN_THEME_VERSION,'all');

    wp_enqueue_style( 'mega-menu', HTN_THEME_URI. '/assets/css/mega_menu.css' , array(), '' );

    /*--Google Font---*/
    wp_enqueue_style('wp-fonts','https://fonts.googleapis.com/css2?family=Lato&family=Oswald:wght@200;300;400&display=swap');
    
    /*--CSS Libraries --*/
    wp_enqueue_style( 'wp-fonts-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css' );
    wp_enqueue_style( 'wp-animation', wp_THEME_URI. '/assets/lib/animate/animate.min.css', array(), wp_VERSION ); 
    wp_enqueue_style( 'wp-owl-carousel', wp_THEME_URI. '/assets/lib/owlcarousel/assets/owl.carousel.min.css', array(), null ); 
    
   
    wp_enqueue_script( 'jquery' ); 

    wp_enqueue_script( 'wp-wow-min', wp_THEME_URI. '/assets/js/wow.min.js', array(), wp_VERSION, false );
    /* JavaScript Libraries */
    
    wp_enqueue_script( 'wp-bootstrap-bundle', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js', array(), wp_VERSION, true );

    wp_enqueue_script( 'wp-easing-min', wp_THEME_URI.'/assets/lib/easing/easing.min.js', array(), null, true );

    wp_enqueue_script( 'wp-main-js', wp_THEME_URI.'/assets/js/main.js', false, wp_VERSION, true );

    wp_enqueue_script('jquery-scroll', wp_THEME_URI . '/js/jquery-1.3.2.js', array(), '', true);

    // Register the load-more script

    wp_register_script( 'loadmore-script', HTN_THEME_URI. '/assets/js/loadmore.js', array('jquery'), false, true );

    // Localize the script with new data

    $script_data_array = array('ajaxurl' => admin_url( 'admin-ajax.php' ),'security' => wp_create_nonce( 'load_more_posts' ),);

    wp_localize_script( 'loadmore-script', 'HTNAjax', $script_data_array );

    // Enqueued script with localized data.

    wp_enqueue_script( 'loadmore-script' );
    

	}
add_action( 'wp_enqueue_scripts', 'wp_load_themes_scripts');
endif; //End thems stylesheet



/* After theme setup support fetured*/
if (!function_exists('wp_theme_setup')) :
    function wp_theme_setup(){
      
    	add_theme_support( 'responsive-embeds' );
	    add_theme_support( 'custom-line-height' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'menus' );
        add_theme_support( 'widgets' );
        add_theme_support( 'align-wide' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'image_format', array( 'jxl','webp', 'jpeg','png','gif' ) );

        load_theme_textdomain( 'wp', get_template_directory() . '/languages' );

        add_image_size( 'post', 540, 360, true ); // post-thumbnile
        add_image_size( 'single-post', 1200, 628, true ); // Single-thumbnile
        add_image_size( 'breadcumb-header', 1958, 745, true );
        add_image_size( 'page-hader-image', 1900, 560, true ); // page-header-image
        
        add_theme_support('html5', array('comment-form','comment-list','gallery','caption','style','script','navigation-widgets',));
        add_theme_support('custom-background',array('default-color' => 'fffffff',));
        add_theme_support( 'post-thumbnails', array( 'post', 'page' ));
        add_theme_support( 'custom-logo', array(
                                                'height'               => 80,
                                                'width'                => 200,
                                                'flex-height'          => true,
                                                'flex-width'           => true,
                                                'header-text'          => array( 'site-title', 'site-description' ),
                                                'unlink-homepage-logo' => true, 
                                             ));
       $defaults = array(
                            'default-image'          => '',
                            'default-preset'         => 'default', 
                            'default-position-x'     => 'left',   
                            'default-position-y'     => 'top',  
                            'default-size'           => 'auto',   
                            'default-repeat'         => 'repeat', 
                            'default-attachment'     => 'scroll',
                            'default-color'          => '',
                            'wp-head-callback'       => '_custom_background_cb',
                            'admin-head-callback'    => '',
                            'admin-preview-callback' => '',
                        );
        add_theme_support( 'custom-background', $defaults );
        add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );
        add_theme_support( 'customize-selective-refresh-widgets' );
        add_theme_support( 'editor-styles' );
        add_theme_support('editor-font-sizes');
        add_theme_support('widgets-block-editor');
        load_theme_textdomain( 'wp' );
        
        add_theme_support( 'custom-header', $args );
        $args = array(
                    'default-image'      => '',
                    'default-text-color' => '000',
                    'width'              => 1000,
                    'height'             => 250,
                    'flex-width'         => true,
                    'flex-height'        => true,
                    );
        
        /*Menu*/
        register_nav_menus( array(
            'top_menu' => __( 'Top Menu', 'wp' ),
            'primary_menu' => __( 'Header Menu', 'wp' ),
            'footer_menu'  => __( 'Footer Menu', 'wp' ),
        ) );
        
	    // Add custom menu
	    register_nav_menu('header', __('Main header menu', 'wp'));
    	// Add theme support for selective refresh for widgets.
	    add_theme_support( 'customize-selective-refresh-widgets' );
    	// Load regular editor styles into the new block-based editor.
	    add_theme_support( 'editor-styles' );
    	// Load default block styles.
	    add_theme_support( 'wp-block-styles' );
	    // Add support for responsive embeds.
	    add_theme_support( 'responsive-embeds' );
        
        // Add theme support woocommerce
        add_theme_support( 'woocommerce' );
        //To enable the gallery in your theme, you can declare support like this:
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );

        add_theme_support( 'woocommerce', array(
            'thumbnail_image_width' => 150,
            'single_image_width'    => 300,
    
            'product_grid'          => array(
                'default_rows'    => 3,
                'min_rows'        => 2,
                'max_rows'        => 8,
                'default_columns' => 4,
                'min_columns'     => 2,
                'max_columns'     => 5,
            ),
        ) );
    


        
    }
add_action( 'after_setup_theme', 'wp_theme_setup');   
endif;

/*Them Sidebar and footer widgets. */

if ( ! function_exists('wp_them_widgetsSetup')) :
    function wp_them_widgetsSetup(){
    
           register_sidebar(
                array(
                    'name'          => esc_html__( 'Blog Sidebar', 'wp' ),
                    'id'            => 'blog_sidebar',
                    'before_widget' => '<section id="%1$s" class="widget %2$s">',
                    'after_widget'  => '</section>',
                    'before_title'  => '<h2 class="widget-title">',
                    'after_title'   => '</h2>',
                )
            );
            register_sidebar( 
                array(
                    'name'          => esc_html__( 'Footer 1', 'wp' ),
                    'id'            => 'footer1',
                    'before_widget' => '<section id="%1$s" class="widget %2$s">',
                    'after_widget'  => '</section>',
                    'before_title'  => '<h2 class="widget-title">',
                    'after_title'   => '</h2>',
                )
            );
    
}
add_action( 'widgets_init', 'wp_them_widgetsSetup' );
endif; //End wp Widgets

/* ACF Theme options */

if( function_exists('acf_add_options_page') ) :
    acf_add_options_page(array(
        'page_title'    => 'Theme Option',
        'menu_title'    => 'Theme Option',
        'menu_slug'     => 'theme-option',
        'capability'    => 'edit_posts',
        'redirect'      => true
    ));
    
    acf_add_options_sub_page(array(
        'page_title'    => 'General settings',
        'menu_title'    => 'General settings',
        'parent_slug'   => 'theme-option',
    ));     
endif; //End ACF Theme options


/*Load theme menu and filter customization */

/*Disable the Gutenberg */
add_filter('use_block_editor_for_post', '__return_false', 10);


/* Adding menu li anchor class */
add_filter( 'nav_menu_link_attributes', function($atts) {
        $atts['class'] = "nav-item nav-link";
        
        return $atts;
}, 100, 1 );

/* Adding perant menu dropdown menu class */
function wp_nav_menu_submenu_css_class( $classes ) {
    $classes[] = 'dropdown-menu';
    return $classes;
}
add_filter( 'nav_menu_submenu_css_class', 'wp_nav_menu_submenu_css_class' );


function menu_set_dropdown( $sorted_menu_items, $args ) {
    $last_top = 0;
    foreach ( $sorted_menu_items as $key => $obj ) {
        // it is a top lv item?
        if ( 0 == $obj->menu_item_parent ) {
            // set the key of the parent
            $last_top = $key;
        } else {
            $sorted_menu_items[$last_top]->classes['dropdown'] = 'nav-item dropdown';
        }
    }
    return $sorted_menu_items;
}
add_filter( 'wp_nav_menu_objects', 'menu_set_dropdown', 10, 2 );


/*Dropdown menu class */
add_filter( 'nav_menu_link_attributes', 'add_class_to_items_link', 10, 3 );

function add_class_to_items_link( $atts, $item, $args ) {
  // check if the item has children
  $hasChildren = (in_array('menu-item-has-children', $item->classes));
  if ($hasChildren) {
    // add the desired attributes:
    $atts['class'] ='nav-link dropdown-toggle';
    $atts['data-toggle'] = 'dropdown';
    $atts['data-target'] = '#';
  }
  return $atts;
}

/* End Dropdown menu class */

/*Adding menu class*/

if (! function_exists('HTNnav_class')) :

	function HTNnav_class ($classes, $item) {

    if (in_array('current-page-ancestor', $classes) || in_array('current-menu-item', $classes) ){

        $classes[] = 'current ';

    }

    return $classes;

}

add_filter('nav_menu_css_class' , 'HTNnav_class' , 10 , 2);

endif; //HTNnav_class


// custom menu function

/* stokedagency theme menu customizations.. */
if (!function_exists('stokedagency_theme_menu_fn')) :
	function stokedagency_theme_menu_fn(){
	   wp_nav_menu(
			  array(
				    'theme_location'  => 'header',
				    'menu'            => '',
				    'container'       => 'div',
				    'container_class' => 'menu-{menu slug}-container',
				    'container_id'    => '',
				    'menu_class'      => 'menu',
				    'menu_id'         => '',
				    'echo'            => true,
				    'fallback_cb'     => 'wp_page_menu',
				    'before'          => '',
				    'after'           => '',
				    'link_before'     => '',
				    'link_after'      => '<span></span>',
				    'items_wrap'      => '<ul class="nav--items">%3$s</ul>',
				    'depth'           => 0,
				    'add_li_class'  => 'nav--item',
				    'walker'          => ''
				)
		);
	}
endif; /* End stokedagency theme menu customizations.. */

/*Allow SVG image upload*/
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

  global $wp_version;
  if ( $wp_version !== '4.7.1' ) {
     return $data;
  }

  $filetype = wp_check_filetype( $filename, $mimes );
      return [
          'ext'             => $filetype['ext'],
          'type'            => $filetype['type'],
          'proper_filename' => $data['proper_filename']
        ];

}, 10, 4 );

if (!function_exists('stokedagency_mime_types')) :

    function stokedagency_mime_types( $mimes ){
      $mimes['svg'] = 'image/svg+xml';
      return $mimes;
    }
    add_filter( 'upload_mimes', 'stokedagency_mime_types' );

endif;

if (!function_exists('stokedagency_fix_svg')) :
    function stokedagency_fix_svg() {
      echo '<style type="text/css">
            .attachment-266x266, .thumbnail img {
                 width: 100% !important;
                 height: auto !important;
            }
            </style>';
    }
    add_action( 'admin_head', 'stokedagency_fix_svg' );
endif; 
/*Allow SVG image upload */


//

/*tag cloud*/
function all_tag_cloud_widget_parameters($args) {

            $myargs = array(

            'smallest' => 1,

            'largest' => 1,

            'unit' => 'em',

            'format' => 'list',

            'order' => 'ASC',   

            );

$args = wp_parse_args($args, $myargs);

return $args;

}
add_filter('widget_tag_cloud_args','all_tag_cloud_widget_parameters' );

/*end tag cloud*/



/* Wordpress Shortcode */
function shortcode_fn(){

	return "hello";
}
add_shortcode('Product_CTA', 'shortcode_fn'); 

?>

<!-- /*HEDER FILES FUNCTION */ -->

 <title><?php  wp_title(''); ?> | <?php is_front_page() ? bloginfo('description') : bloginfo('name'); ?></title>
	
	<body <?php body_class(); ?>>
       <?php wp_body_open(); ?>

       <!-- Custom logo callback function -->
     <a href="<?php echo home_url();?>"> <?php if( function_exists('the_custom_logo')){  the_custom_logo(); } ?></a>

     <?php wp_nav_menu( array('menu' => 'Main Menu', 'menu_class' => 'navbar-nav m-auto ml-5',  'container' => 'ul') );?>

<!-- End/*HEDER FILES FUNCTION */ -->



<?php

/* ---------------------------------------------------------------------------
* <!-- Custom post type and custom taxonomy -->
* --------------------------------------------------------------------------- */

if (!function_exists('career_post_type')) :
    function career_post_type() {
     
    // Set UI labels for Custom Post Type
        $labels = array(
            'name'                => _x( 'Careers', 'wp' ),
            'singular_name'       => _x( 'Career', 'wp' ),
            'menu_name'           => __( 'Careers', 'wp' ),
            'parent_item_colon'   => __( 'Parent Career', 'wp' ),
            'all_items'           => __( 'All Career', 'wp' ),
            'view_item'           => __( 'View Career', 'wp' ),
            'add_new_item'        => __( 'Add New Career', 'wp' ),
            'add_new'             => __( 'Add New', 'wp' ),
            'edit_item'           => __( 'Edit Career', 'wp' ),
            'update_item'         => __( 'Update Career', 'wp' ),
            'search_items'        => __( 'Search Career', 'wp' ),
            'not_found'           => __( 'Not Found', 'wp' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'wp' ),
        );
         
        $args = array(
            'label'               => __( 'Career', 'wp' ),
            'labels'              => $labels,
            // Features this CPT supports in Post Editor
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', ),
            'taxonomies'          => array( 'category' ),
            'hierarchical'        => true,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 5,
            'menu_icon'           => 'dashicons-awards',
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'post',
            'show_in_rest' => true,
     
        );
         
    // Registering your Custom Post Type
    register_post_type( 'career', $args );


    /*Register custom texnomy*/
    // register taxonomy
    $labels = array(
		'name' => _x( 'Wordpress Services Category', 'taxonomy general name' ),
		'singular_name' => _x( 'Wordpress Service Category', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search Category' ),
		'all_items' => __( 'All Category' ),
		'parent_item' => __( 'Parent Category' ),
		'parent_item_colon' => __( 'Parent Category:' ),
		'edit_item' => __( 'Edit Category' ), 
		'update_item' => __( 'Update Category' ),
		'add_new_item' => __( 'Add New Category' ),
		'new_item_name' => __( 'New Category Name' ),
		'menu_name' => __( 'Wordpress Service Category' ),
	);    

	register_taxonomy('magento-service-cat', array('magento-service'), array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'magento-service-cat' ),
	));

	/*End texonomy*/

 
}
add_action( 'init', 'career_post_type', 0 );

endif; /*<!-- End Custom post type and custom taxonomy -->*/



//** *Enable upload for webp image files.*/

function webp_upload_mimes($existing_mimes) {

    $existing_mimes['webp'] = 'image/webp';

    return $existing_mimes;

}

add_filter('mime_types', 'webp_upload_mimes');  

//** * Enable preview / thumbnail for webp image files.*/

function webp_is_displayable($result, $path) {

    if ($result === false) {

        $displayable_image_types = array( IMAGETYPE_WEBP );

        $info = @getimagesize( $path );

        if (empty($info)) {

            $result = false;

        } elseif (!in_array($info[2], $displayable_image_types)) {

            $result = false;

        } else {

            $result = true;

        }

    }

    return $result;

}

add_filter('file_is_displayable_image', 'webp_is_displayable', 10, 2);

//** * End Enable preview / thumbnail for webp image files.*/



/*Wordpress Standder loop*/


 if ( have_posts() ) : while ( have_posts() ) : the_post(); the_title(); the_content(); 
 endwhile; wp_reset_postdata(); endif; 


/*  End wordpress satnaderd loop */


/*Display odd / even style in wp-loop*/

  $i = 1;
  while( have_rows('slider') ): the_row(); 

    if ($i%2==0) { ?>	

    	 <div class="slide-item style-two"></div>

    <?php }else{ ?>	 	

    	<div class="slide-item style-one "></div>
    <?php } ?>

   <?php  $i++;  endwhile; 

/*Display odd / even style in wp-loop*/


/*/ Changing excerpt length*/

function new_excerpt_length($length) { 
	return 24;
}
add_filter('excerpt_length', 'new_excerpt_length');


// Changing excerpt more
function new_excerpt_more($more) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');


//Admin logo update
function my_login_logo_one() { ?>
    <style type="text/css">
        body.login div#login h1 a {
        background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/logo.png);
        height: 130px;
        width: 130px;
        background-size: 130px;
    }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo_one' );

//Admin logo URL update
add_filter( 'login_headerurl', 'custom_loginlogo_url' );
function custom_loginlogo_url($url) {
    return site_url();
}


/*post views*/

function gt_get_post_view() {

    $count = get_post_meta( get_the_ID(), 'post_views_count', true );

    return "$count views";

}

function gt_set_post_view() {

    $key = 'post_views_count';

    $post_id = get_the_ID();

    $count = (int) get_post_meta( $post_id, $key, true );

    $count++;

    update_post_meta( $post_id, $key, $count );

}

function gt_posts_column_views( $columns ) {

    $columns['post_views'] = 'Views';

    return $columns;

}

function gt_posts_custom_column_views( $column ) {

    if ( $column === 'post_views') {

        echo gt_get_post_view();

    }

}

add_filter( 'manage_posts_columns', 'gt_posts_column_views' );

add_action( 'manage_posts_custom_column', 'gt_posts_custom_column_views' );

add_filter( 'widget_posts_args', function( array $args )
{
    add_filter( 'the_title', 'recent_posts_thumbnail', 10, 2 );

    return $args;

} );


function recent_posts_thumbnail( $title, $post_id ){

    static $instance = 0;

    if(  has_post_thumbnail( $post_id ) )

        $title = get_the_post_thumbnail( $post_id ) . $title;

    return $title;

} 

//Removed empty space on content
function remove_empty_p($content) {
    $content = force_balance_tags($content);
    $content = preg_replace('#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content);
    $content = preg_replace('~\s?<p>(\s|&nbsp;)+</p>\s?~', '', $content);
    return $content;
}
add_filter('the_content', 'remove_empty_p', 99, 1);
//End removed empty epace from content.

// Removed spam message on contact form-7
add_filter('wpcf7_spam', '__return_false');
//End spam contact msg contact form-7




