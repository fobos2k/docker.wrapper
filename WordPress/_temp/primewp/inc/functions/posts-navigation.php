<?php
/**
* Posts navigation functions
*
* @package PrimeWP WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

if ( ! function_exists( 'primewp_wp_pagenavi' ) ) :
function primewp_wp_pagenavi() {
    ?>
    <nav class="navigation posts-navigation clearfix" role="navigation">
        <?php wp_pagenavi(); ?>
    </nav><!-- .navigation -->
    <?php
}
endif;


if ( ! function_exists( 'primewp_posts_navigation' ) ) :
function primewp_posts_navigation() {
    if ( function_exists( 'wp_pagenavi' ) ) {
        primewp_wp_pagenavi();
    } else {
        if ( primewp_get_option('posts_navigation_type') === 'normalnavi' ) {
            the_posts_navigation(array('prev_text' => esc_html__( '&larr; Older posts', 'primewp' ), 'next_text' => esc_html__( 'Newer posts &rarr;', 'primewp' )));
        } else {
            the_posts_pagination(array('mid_size' => 2, 'prev_text' => esc_html__( '&larr; Older posts', 'primewp' ), 'next_text' => esc_html__( 'Newer posts &rarr;', 'primewp' )));
        }
    }
}
endif;


if ( ! function_exists( 'primewp_post_navigation' ) ) :
function primewp_post_navigation() {
    if ( !(primewp_get_option('hide_post_navigation')) ) {
        the_post_navigation(array('prev_text' => esc_html__( '&larr; %title', 'primewp' ), 'next_text' => esc_html__( '%title &rarr;', 'primewp' )));
    }
}
endif;