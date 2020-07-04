<?php
/**
* Register widget area.
*
* @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
*
* @package PrimeWP WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function primewp_widgets_init() {

register_sidebar(array(
    'id' => 'primewp-sidebar-one',
    'name' => esc_html__( 'Sidebar 1', 'primewp' ),
    'description' => esc_html__( 'This sidebar is normally located on the left-hand side of web page.', 'primewp' ),
    'before_widget' => '<div id="%1$s" class="primewp-side-widget widget primewp-box %2$s"><div class="primewp-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="primewp-widget-header"><h2 class="primewp-widget-title"><span>',
    'after_title' => '</span></h2></div>'));

register_sidebar(array(
    'id' => 'primewp-sidebar-two',
    'name' => esc_html__( 'Sidebar 2', 'primewp' ),
    'description' => esc_html__( 'This sidebar is normally located on the right-hand side of web page.', 'primewp' ),
    'before_widget' => '<div id="%1$s" class="primewp-side-widget widget primewp-box %2$s"><div class="primewp-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="primewp-widget-header"><h2 class="primewp-widget-title"><span>',
    'after_title' => '</span></h2></div>'));

register_sidebar(array(
    'id' => 'primewp-home-fullwidth-widgets',
    'name' => esc_html__( 'Top Full Width Widgets (Home Page Only)', 'primewp' ),
    'description' => esc_html__( 'This full-width widget area is located at the top of homepage.', 'primewp' ),
    'before_widget' => '<div id="%1$s" class="primewp-main-widget primewp-box widget %2$s"><div class="primewp-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="primewp-widget-header"><h2 class="primewp-widget-title"><span>',
    'after_title' => '</span></h2></div>'));

register_sidebar(array(
    'id' => 'primewp-fullwidth-widgets',
    'name' => esc_html__( 'Top Full Width Widgets (Every Page)', 'primewp' ),
    'description' => esc_html__( 'This full-width widget area is located at the top of every page.', 'primewp' ),
    'before_widget' => '<div id="%1$s" class="primewp-main-widget primewp-box widget %2$s"><div class="primewp-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="primewp-widget-header"><h2 class="primewp-widget-title"><span>',
    'after_title' => '</span></h2></div>'));

register_sidebar(array(
    'id' => 'primewp-home-top-widgets',
    'name' => esc_html__( 'Top Widgets (Home Page Only)', 'primewp' ),
    'description' => esc_html__( 'This widget area is located at the top of homepage.', 'primewp' ),
    'before_widget' => '<div id="%1$s" class="primewp-main-widget widget primewp-box %2$s"><div class="primewp-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="primewp-widget-header"><h2 class="primewp-widget-title"><span>',
    'after_title' => '</span></h2></div>'));

register_sidebar(array(
    'id' => 'primewp-top-widgets',
    'name' => esc_html__( 'Top Widgets (Every Page)', 'primewp' ),
    'description' => esc_html__( 'This widget area is located at the top of every page.', 'primewp' ),
    'before_widget' => '<div id="%1$s" class="primewp-main-widget widget primewp-box %2$s"><div class="primewp-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="primewp-widget-header"><h2 class="primewp-widget-title"><span>',
    'after_title' => '</span></h2></div>'));

register_sidebar(array(
    'id' => 'primewp-home-bottom-widgets',
    'name' => esc_html__( 'Bottom Widgets (Home Page Only)', 'primewp' ),
    'description' => esc_html__( 'This widget area is located at the bottom of homepage.', 'primewp' ),
    'before_widget' => '<div id="%1$s" class="primewp-main-widget widget primewp-box %2$s"><div class="primewp-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="primewp-widget-header"><h2 class="primewp-widget-title"><span>',
    'after_title' => '</span></h2></div>'));

register_sidebar(array(
    'id' => 'primewp-bottom-widgets',
    'name' => esc_html__( 'Bottom Widgets (Every Page)', 'primewp' ),
    'description' => esc_html__( 'This widget area is located at the bottom of every page.', 'primewp' ),
    'before_widget' => '<div id="%1$s" class="primewp-main-widget widget primewp-box %2$s"><div class="primewp-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="primewp-widget-header"><h2 class="primewp-widget-title"><span>',
    'after_title' => '</span></h2></div>'));

register_sidebar(array(
    'id' => 'primewp-single-post-bottom-widgets',
    'name' => esc_html__( 'Post Bottom Widgets', 'primewp' ),
    'description' => esc_html__( 'This widget area is located at the bottom of single post. before the comments', 'primewp' ),
    'before_widget' => '<div id="%1$s" class="primewp-main-widget widget primewp-box %2$s"><div class="primewp-box-inside">',
    'after_widget' => '</div></div>',
    'before_title' => '<div class="primewp-widget-header"><h2 class="primewp-widget-title"><span>',
    'after_title' => '</span></h2></div>'));

register_sidebar(array(
    'id' => 'primewp-top-footer',
    'name' => esc_html__( 'Footer Top', 'primewp' ),
    'description' => esc_html__( 'This sidebar is located on the top of the footer.', 'primewp' ),
    'before_widget' => '<div id="%1$s" class="primewp-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="primewp-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'primewp-footer-1',
    'name' => esc_html__( 'Footer 1', 'primewp' ),
    'description' => esc_html__( 'This sidebar is located on the left bottom of web page.', 'primewp' ),
    'before_widget' => '<div id="%1$s" class="primewp-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="primewp-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'primewp-footer-2',
    'name' => esc_html__( 'Footer 2', 'primewp' ),
    'description' => esc_html__( 'This sidebar is located on the middle bottom of web page.', 'primewp' ),
    'before_widget' => '<div id="%1$s" class="primewp-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="primewp-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'primewp-footer-3',
    'name' => esc_html__( 'Footer 3', 'primewp' ),
    'description' => esc_html__( 'This sidebar is located on the middle bottom of web page.', 'primewp' ),
    'before_widget' => '<div id="%1$s" class="primewp-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="primewp-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'primewp-footer-4',
    'name' => esc_html__( 'Footer 4', 'primewp' ),
    'description' => esc_html__( 'This sidebar is located on the right bottom of web page.', 'primewp' ),
    'before_widget' => '<div id="%1$s" class="primewp-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="primewp-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'primewp-footer-5',
    'name' => esc_html__( 'Footer 5', 'primewp' ),
    'description' => esc_html__( 'This sidebar is located on the right bottom of web page.', 'primewp' ),
    'before_widget' => '<div id="%1$s" class="primewp-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="primewp-widget-title"><span>',
    'after_title' => '</span></h2>'));

register_sidebar(array(
    'id' => 'primewp-bottom-footer',
    'name' => esc_html__( 'Footer Bottom', 'primewp' ),
    'description' => esc_html__( 'This sidebar is located on the bottom of the footer.', 'primewp' ),
    'before_widget' => '<div id="%1$s" class="primewp-footer-widget widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="primewp-widget-title"><span>',
    'after_title' => '</span></h2>'));

}
add_action( 'widgets_init', 'primewp_widgets_init' );


function primewp_sidebar_one_widgets() {
    dynamic_sidebar( 'primewp-sidebar-one' );
}

function primewp_sidebar_two_widgets() {
    dynamic_sidebar( 'primewp-sidebar-two' );
}

function primewp_top_wide_widgets() { ?>

<?php if ( is_active_sidebar( 'primewp-home-fullwidth-widgets' ) || is_active_sidebar( 'primewp-fullwidth-widgets' ) ) : ?>
<div class="primewp-top-wrapper-outer clearfix">
<div class="primewp-featured-posts-area primewp-top-wrapper clearfix">
<?php if ( is_front_page() && is_home() && !is_paged() ) { ?>
<?php dynamic_sidebar( 'primewp-home-fullwidth-widgets' ); ?>
<?php } ?>

<?php dynamic_sidebar( 'primewp-fullwidth-widgets' ); ?>
</div>
</div>
<?php endif; ?>

<?php }


function primewp_top_widgets() { ?>

<?php if ( is_active_sidebar( 'primewp-home-top-widgets' ) || is_active_sidebar( 'primewp-top-widgets' ) ) : ?>
<div class="primewp-featured-posts-area primewp-featured-posts-area-top clearfix">
<?php if ( is_front_page() && is_home() && !is_paged() ) { ?>
<?php dynamic_sidebar( 'primewp-home-top-widgets' ); ?>
<?php } ?>

<?php dynamic_sidebar( 'primewp-top-widgets' ); ?>
</div>
<?php endif; ?>

<?php }


function primewp_bottom_widgets() { ?>

<?php if ( is_active_sidebar( 'primewp-home-bottom-widgets' ) || is_active_sidebar( 'primewp-bottom-widgets' ) ) : ?>
<div class='primewp-featured-posts-area primewp-featured-posts-area-bottom clearfix'>
<?php if ( is_front_page() && is_home() && !is_paged() ) { ?>
<?php dynamic_sidebar( 'primewp-home-bottom-widgets' ); ?>
<?php } ?>

<?php dynamic_sidebar( 'primewp-bottom-widgets' ); ?>
</div>
<?php endif; ?>

<?php }


function primewp_post_bottom_widgets() { ?>

<?php if ( is_active_sidebar( 'primewp-single-post-bottom-widgets' ) ) : ?>
<div class="primewp-featured-posts-area clearfix">
<?php dynamic_sidebar( 'primewp-single-post-bottom-widgets' ); ?>
</div>
<?php endif; ?>

<?php }