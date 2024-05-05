<?php

    //add css files
function tech_world_add_style(){
    //add bootstrab style 
    wp_enqueue_style( 'bootstarb-style', get_template_directory_uri() . '/css/bootstrab_css/bootstrap.css' );
    //add custom style
    wp_enqueue_style( 'custom-css', get_template_directory_uri() . '/css/main.css' );

}
    add_action("wp_enqueue_scripts", "tech_world_add_style");

    //add js files
    function tech_world_add_script(){
        //remove jquery registration
        wp_deregister_script( "jquery" );
        //register jquery in footer
        wp_register_script( "jquery", includes_url( "js/jquery/jquery.js" ), array (), false ,true );

        //add bootstrab js
        wp_enqueue_script( 'bootstarp-bundle',  get_template_directory_uri() . '/js/bootstrab_js/bootstrap.bundle.min.js', array('jquery'), false ,true );

        //add custom js
        wp_enqueue_script( 'main-script',  get_template_directory_uri() . '/js/main.js', array(), false ,true );
    
        // add bootstrab html5shiv and respond in condition
        wp_enqueue_script( 'html5shiv',  get_template_directory_uri() . '/js/bootstrab_js/html5shiv.min.js');
        wp_script_add_data( "html5shiv", "conditional", "lt IE 9" );
        wp_enqueue_script( 'respond',  get_template_directory_uri() . '/js/bootstrab_js/respond.min.js');
        wp_script_add_data( "respond", "conditional", "lt IE 9" );
    
    
    }
    add_action("wp_enqueue_scripts", "tech_world_add_script");



// Theme Options

add_theme_support('custom-logo', array(
    // 'height' => get_theme_mod('tech_world_logo_height', 120), 
));

add_theme_support('menus');
add_theme_support('post-thumbnails');
  

// Nav Menus Locations

register_nav_menus(
    array(
        'top-menu' => 'Top Menu',
        'footer-menu' => 'Footer Menu'
    )
);


//Products (Custom Post Type)

function tech_world_products() {
    $args = array(
        'public' => true, 
        'label'  => 'Products', 
        'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ), 
        'rewrite' => array( 'slug' => 'products' ), 
        'register_meta_box_cb' => 'tech_world_product_meta_box' 
    );
    register_post_type( 'product', $args ); 
}
add_action( 'init', 'tech_world_products' );

// add price
function tech_world_product_meta_box() {
    add_meta_box(
        'product_meta_box', 
        'Product Price', 
        'tech_world_product_meta_box_callback', 
        'product', 
        'normal', 
        'default' 
    );
}

// add in admin side
function tech_world_product_meta_box_callback( $post ) {

    $price = get_post_meta( $post->ID, '_price', true );
    ?>
    <label for="price">Price:</label>
    <input type="text" id="price" name="price" value="<?php echo esc_attr( $price ); ?>">
    <?php
}

// save price
function tech_world_save_product_price( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( isset( $_POST['price'] ) ) {
        update_post_meta( $post_id, '_price', sanitize_text_field( $_POST['price'] ) );
    }
}
add_action( 'save_post_product', 'tech_world_save_product_price' );


//Posts per Page in Blog Page
function custom_posts_per_page( $query ) {
    if ( $query->is_home() && $query->is_main_query() ) {
        $query->set( 'posts_per_page', 3 );
    }
}
add_action( 'pre_get_posts', 'custom_posts_per_page' );


/*Change Clasess */

// function custom_menu_classes($classes, $item, $args) {
//     $classes[] = 'nav-item-li-class';

//     $classes[] = 'nav-link-a-class';

//     return $classes;
// }
// add_filter('nav_menu_css_class', 'custom_menu_classes', 10, 3);

function custom_nav_menu_item_css_class( $classes, $item, $args, $depth ) {
    if ( $args->theme_location == 'top-menu' ) {
        $classes =array();
        $classes[] = 'nav-item'; 
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'custom_nav_menu_item_css_class', 10, 4 );

function custom_nav_menu_link_attributes( $atts, $item, $args, $depth ) {
    if ( $args->theme_location == 'top-menu' ) {
        $atts['class'] = 'nav-link'; 
    }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'custom_nav_menu_link_attributes', 10, 4 );
