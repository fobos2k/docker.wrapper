<?php
/**
* More Custom Functions
*
* @package PrimeWP WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

// Get custom-logo URL
function primewp_custom_logo() {
    if ( ! has_custom_logo() ) {return;}
    $primewp_custom_logo_id = get_theme_mod( 'custom_logo' );
    $primewp_logo = wp_get_attachment_image_src( $primewp_custom_logo_id , 'full' );
    return $primewp_logo[0];
}

// Site Title
function primewp_site_title() {
    if ( is_front_page() && is_home() ) { ?>
            <h1 class="primewp-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php if ( !(primewp_get_option('hide_tagline')) ) { ?><p class="primewp-site-description"><span><?php bloginfo( 'description' ); ?></span></p><?php } ?>
    <?php } elseif ( is_home() ) { ?>
            <h1 class="primewp-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php if ( !(primewp_get_option('hide_tagline')) ) { ?><p class="primewp-site-description"><span><?php bloginfo( 'description' ); ?></span></p><?php } ?>
    <?php } elseif ( is_singular() ) { ?>
            <p class="primewp-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <?php if ( !(primewp_get_option('hide_tagline')) ) { ?><p class="primewp-site-description"><span><?php bloginfo( 'description' ); ?></span></p><?php } ?>
    <?php } elseif ( is_category() ) { ?>
            <p class="primewp-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <?php if ( !(primewp_get_option('hide_tagline')) ) { ?><p class="primewp-site-description"><span><?php bloginfo( 'description' ); ?></span></p><?php } ?>
    <?php } elseif ( is_tag() ) { ?>
            <p class="primewp-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <?php if ( !(primewp_get_option('hide_tagline')) ) { ?><p class="primewp-site-description"><span><?php bloginfo( 'description' ); ?></span></p><?php } ?>
    <?php } elseif ( is_author() ) { ?>
            <p class="primewp-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <?php if ( !(primewp_get_option('hide_tagline')) ) { ?><p class="primewp-site-description"><span><?php bloginfo( 'description' ); ?></span></p><?php } ?>
    <?php } elseif ( is_archive() && !is_category() && !is_tag() && !is_author() ) { ?>
            <p class="primewp-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <?php if ( !(primewp_get_option('hide_tagline')) ) { ?><p class="primewp-site-description"><span><?php bloginfo( 'description' ); ?></span></p><?php } ?>
    <?php } elseif ( is_search() ) { ?>
            <p class="primewp-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <?php if ( !(primewp_get_option('hide_tagline')) ) { ?><p class="primewp-site-description"><span><?php bloginfo( 'description' ); ?></span></p><?php } ?>
    <?php } elseif ( is_404() ) { ?>
            <p class="primewp-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <?php if ( !(primewp_get_option('hide_tagline')) ) { ?><p class="primewp-site-description"><span><?php bloginfo( 'description' ); ?></span></p><?php } ?>
    <?php } else { ?>
            <h1 class="primewp-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php if ( !(primewp_get_option('hide_tagline')) ) { ?><p class="primewp-site-description"><span><?php bloginfo( 'description' ); ?></span></p><?php } ?>
    <?php }
}

function primewp_read_more_text() {
       $readmoretext = esc_html__( 'Continue Reading', 'primewp' );
        if ( primewp_get_option('read_more_text') ) {
                $readmoretext = primewp_get_option('read_more_text');
        }
       return $readmoretext;
}

// Category ids in post class
function primewp_category_id_class($classes) {
        global $post;
        foreach((get_the_category($post->ID)) as $category) {
            $classes [] = 'wpcat-' . $category->cat_ID . '-id';
        }
        return $classes;
}
add_filter('post_class', 'primewp_category_id_class');

// Change excerpt length
function primewp_excerpt_length($length) {
    if ( is_admin() ) {
        return $length;
    }
    $read_more_length = 25;
    if ( primewp_get_option('read_more_length') ) {
        $read_more_length = primewp_get_option('read_more_length');
    }
    return $read_more_length;
}
add_filter('excerpt_length', 'primewp_excerpt_length');

// Change excerpt more word
function primewp_excerpt_more($more) {
       if ( is_admin() ) {
         return $more;
       }
       return '...';
}
add_filter('excerpt_more', 'primewp_excerpt_more');

// Adds custom classes to the array of body classes.
function primewp_body_classes( $classes ) {
    // Adds a class of group-blog to blogs with more than 1 published author.
    if ( is_multi_author() ) {
        $classes[] = 'primewp-group-blog';
    }

    if ( get_header_image() ) {
        $classes[] = 'primewp-header-image-active';
    }

    if ( has_custom_logo() ) {
        $classes[] = 'primewp-custom-logo-active';
    }

    if ( is_page_template( array( 'template-full-width-page.php', 'template-full-width-post.php' ) ) ) {
       $classes[] = 'primewp-layout-full-width';
    }

    if ( is_404() ) {
        $classes[] = 'primewp-layout-full-width';
    }

    $classes[] = 'primewp-header-menu-active';

    if ( primewp_get_option('hide_tagline') ) {
        $classes[] = 'primewp-tagline-inactive';
    }

    if ( !(primewp_get_option('disable_primary_menu')) ) {
        $classes[] = 'primewp-primary-menu-active';
    }
    if ( !(primewp_get_option('disable_secondary_menu')) ) {
        $classes[] = 'primewp-secondary-menu-active';
    }

    return $classes;
}
add_filter( 'body_class', 'primewp_body_classes' );


function primewp_post_style() {
       $post_style = 'style-4';
        if ( primewp_get_option('post_style') ) {
                $post_style = primewp_get_option('post_style');
        }
       return $post_style;
}


function primewp_footer_grid_cols() {
       $footer_column = 'primewp-footer-5-col';
       return $footer_column;
}


/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function primewp_pingback_header() {
        if ( is_singular() && pings_open() ) {
                echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
        }
}
add_action( 'wp_head', 'primewp_pingback_header' );


if ( ! function_exists( 'wp_body_open' ) ) :
    /**
     * Fire the wp_body_open action.
     *
     * Added for backwards compatibility to support pre 5.2.0 WordPress versions.
     */
    function wp_body_open() { // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedFunctionFound
        /**
         * Triggered after the opening <body> tag.
         */
        do_action( 'wp_body_open' ); // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedHooknameFound
    }
endif;