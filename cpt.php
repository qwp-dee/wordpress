<?php
 function Memberss() {
$labels = array(
    'name'                => _x( 'Members', 'Post Type General Name', 'text_domain' ),
    'singular_name'       => _x( 'Member', 'Post Type Singular Name', 'text_domain' ),
    'menu_name'           => __( 'Member', 'text_domain' ),
    'parent_item_colon'   => __( 'Parent Members', 'text_domain' ),
    'all_items'           => __( 'All Members', 'text_domain' ),
    'view_item'           => __( 'View Members', 'text_domain' ),
    'add_new_item'        => __( 'Add New Member', 'text_domain' ),
    'add_new'             => __( 'New Member', 'text_domain' ),
    'edit_item'           => __( 'Edit Member', 'text_domain' ),
    'update_item'         => __( 'Update Member', 'text_domain' ),
    'search_items'        => __( 'Search Members', 'text_domain' ),
    'not_found'           => __( 'No Members found', 'text_domain' ),
    'not_found_in_trash'  => __( 'No Members found in Trash', 'text_domain' ),
);
$rewrite = array(
    'slug'                => 'Member',
    'with_front'          => true,
    'pages'               => true,
    'feeds'               => true,
);
$args = array(
    'label'               => __( 'Members', 'text_domain' ),
    'description'         => __( 'Member information pages', 'text_domain' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes', ),
    'taxonomies'          => array( 'category', 'post_tag' ),
    'hierarchical'        => true,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 5,
    'menu_icon'           => '',
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'query_var'           => 'Member',
    'rewrite'             => $rewrite,
    'capability_type'     => 'page',
);
register_post_type( 'Members', $args );
}
add_action( 'init', 'Memberss', 0 );



// To displaying custome post 
// questions/18762065/
$args = array( 'post_type' => 'Members', 'posts_per_page' => 10 );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
    the_title();
    echo '<div class="entry-content">';
    the_content();
    echo '</div>';
endwhile;


?>