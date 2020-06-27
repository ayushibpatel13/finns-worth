<?php
/**
 * Enqueues scripts and styles.
 */
define( 'TEMPLATE_URI', get_template_directory_uri() );
define( 'ADDRESS', sanitize_textarea_field( get_theme_mod( 'Address' ) ) );
define( 'ADDRESS_URL', esc_url( get_theme_mod( 'Address_Url' ) ) );
define( 'EMAIL', sanitize_email( get_theme_mod( 'Email' ) ) );
define( 'MOBILE', sanitize_text_field( get_theme_mod( 'Mobile' ) ) );
define( 'FACEBOOK', esc_url( get_theme_mod( 'facebook-url' ) ) );
define( 'TWITTER', esc_url( get_theme_mod( 'twitter-url' ) ) );
define( 'INSTAGRAM', esc_url( get_theme_mod( 'instagram-url' ) ) );
define( 'LOGO_URL', esc_url( get_theme_mod( 'footer_logo' ) ) );
function finns_worth_register_styles() {
    $theme_version = wp_get_theme()->get( 'Version' );
    //css
    wp_enqueue_style( 'finns-worth-style', get_stylesheet_uri(), array(), $theme_version );
    wp_enqueue_style( 'googleapis','https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700&display=swap' );
    wp_enqueue_style( 'bootstrap-min', TEMPLATE_URI.'/css/bootstrap.min.css' );
    wp_enqueue_style( 'animate', TEMPLATE_URI.'/css/animate.css' );
    wp_enqueue_style( 'font-awesome', TEMPLATE_URI.'/fonts/awesome/css/font-awesome.css' );
    wp_enqueue_style( 'theme-style', TEMPLATE_URI.'/css/style.css' );
    wp_enqueue_style( 'theme-media', TEMPLATE_URI.'/css/media.css' );
    wp_enqueue_style( 'developer', TEMPLATE_URI.'/css/developer.css' );


    //js
    wp_enqueue_script('popper-min-js', TEMPLATE_URI.'/js/popper.min.js', array('jquery'),'',true);
    wp_enqueue_script('bootstrap-min-js', TEMPLATE_URI.'/js/bootstrap.min.js', array('jquery'),'',true);
    wp_enqueue_script('slick-min-js', TEMPLATE_URI.'/js/slick.min.js', array('jquery'),'',true);
    wp_enqueue_script('wow-min-js', TEMPLATE_URI.'/js/wow.min.js', array('jquery'),'',true);
    wp_enqueue_script('theme-custom-js', TEMPLATE_URI.'/js/custom.js', array('jquery'),'',true);
    wp_enqueue_script('developer', get_template_directory_uri() . '/js/developer.js', array('jquery'),'',false);
    wp_localize_script( 'developer', 'FINNS', array(
        'thank_url' => site_url( '/thank-you' ),
        'ajaxurl' => admin_url('admin-ajax.php'),
        'security' => wp_create_nonce( 'load_more_posts' ),
    )
    );     
}
add_action( 'wp_enqueue_scripts', 'finns_worth_register_styles' );
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function finns_worth_theme_support() {

    load_theme_textdomain( 'finns-worth' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'finns-worth-featured-image', 2000, 1200, true );
    add_image_size( 'finns-worth-thumbnail-avatar', 100, 100, true );
    $GLOBALS['content_width'] = 525;
    register_nav_menus(
        array(
            'header' => __( 'Header Menu', 'finns-worth' ),
            'footer' => __( 'Footer Menu', 'finns-worth' ),
        )
    );

    add_theme_support(
        'html5',
        array(
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'script',
            'style',
        )
    );

    add_theme_support(
        'post-formats',
        array(
            'aside',
            'image',
            'video',
            'quote',
            'link',
            'gallery',
            'audio',
        )
    );
    add_theme_support(
        'custom-logo',
        array(
            'width' => 300,
            'height' => 76,
            'flex-width' => true
        )
    );
    add_theme_support( 'customize-selective-refresh-widgets' );
    add_theme_support( 'responsive-embeds' );
}
add_action( 'after_setup_theme', 'finns_worth_theme_support' );

/**
* define the finns_worth_nav_class 
* Giving Class If the menu is Active
*
* @param Object $classes Class Name
* @param Object $item Menu Item
*/
function finns_worth_nav_class ( $classes, $item ) {
  if ( in_array( 'current-menu-item' , $classes ) ) :
    $classes[] = 'active ';
  endif;
  if( is_singular( 'products' ) ) :
        if ( in_array( 'product' , $classes ) ) :
                 $classes[] = 'active' ;
        endif;
  endif;
  return $classes;
}
add_filter('nav_menu_css_class' , 'finns_worth_nav_class' , 10 , 2);

/**
* define the wpcf7_posted_data callback
* Adding - if the non required field is empty
*
* @param $array  Data of Contact Form 7
*/
function finns_worth_action_wpcf7_posted_data( $array ) {
    if( empty( $array[ "text-38" ] ) ) {
        $array[ "text-38" ]  = "-";
    }
    return $array;
}
add_action( 'wpcf7_posted_data', 'finns_worth_action_wpcf7_posted_data', 10, 1 );

/**
* define finns_worth_remove_default_post_type
* Remove Default Post Type
*
*/
function finns_worth_remove_default_post_type() {
    remove_menu_page( 'edit.php' );
}
add_action( 'admin_menu', 'finns_worth_remove_default_post_type' );

/**
* define finns_worth_my_remove_admin_menus
* Remove Default Commnets
*
*/
function finns_worth_my_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_init', 'finns_worth_my_remove_admin_menus' );


add_action( 'wp_ajax_nopriv_load_posts_by_ajax' , 'load_posts_by_ajax_callback' );
add_action( 'wp_ajax_load_posts_by_ajax' , 'load_posts_by_ajax_callback' );
function load_posts_by_ajax_callback() {
    check_ajax_referer( 'load_more_posts' , 'security' );
    $paged = $_POST[ 'page' ];
    $args = array(
        'post_type'         => 'products',
        'post_status'       => 'publish',
        'posts_per_page'    => '8',
        'paged'             => $paged,
    );
    $blog_posts = new WP_Query( $args ); ?>
    <?php $op[ 'data' ] = array();
    $op[ 'data' ] = ''; ?>
    <?php if ( $blog_posts->have_posts() ) : ?>
        <?php while ( $blog_posts->have_posts() ) : $blog_posts->the_post(); ?>
            <?php 
            $op['data'] .=  '<div class="col-lg-3 col-md-6"><div class="product-box wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s"><div class="img-wrap">
                <a href="'.get_the_permalink().'">'.get_the_post_thumbnail().'</a></div>
                <div class="product-text"><div class="name"><a href="'.get_the_permalink().'">'.get_the_title().'</a><br><span>'.get_field( 'products_available' ).'</div><div class="product-cta"><a href='.get_the_permalink().'">'.__( 'More Details', 'finns-worth' ).'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><path d="M0 0h24v24H0z" fill="none"/><path d="M21 11H6.83l3.58-3.59L9 6l-6 6 6 6 1.41-1.41L6.83 13H21z"/>
                    </svg></a></div></div></div></div>' ?>
        <?php endwhile; ?>
        <?php endif;
    echo json_encode($op);
    wp_die();
}

require get_parent_theme_file_path( '/inc/theme-option.php' );