<?php
/**
* Custom Hooks
*
* @package PrimeWP WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function primewp_before_header() {
    do_action('primewp_before_header');
}

function primewp_after_header() {
    do_action('primewp_after_header');
}

function primewp_before_main_content() {
    do_action('primewp_before_main_content');
}
add_action('primewp_before_main_content', 'primewp_top_widgets', 20 );

function primewp_after_main_content() {
    do_action('primewp_after_main_content');
}
add_action('primewp_after_main_content', 'primewp_bottom_widgets', 10 );

function primewp_sidebar_one() {
    do_action('primewp_sidebar_one');
}
add_action('primewp_sidebar_one', 'primewp_sidebar_one_widgets', 10 );

function primewp_sidebar_two() {
    do_action('primewp_sidebar_two');
}
add_action('primewp_sidebar_two', 'primewp_sidebar_two_widgets', 10 );

function primewp_before_single_post() {
    do_action('primewp_before_single_post');
}

function primewp_before_single_post_title() {
    do_action('primewp_before_single_post_title');
}

function primewp_after_single_post_title() {
    do_action('primewp_after_single_post_title');
}

function primewp_after_single_post_content() {
    do_action('primewp_after_single_post_content');
}

function primewp_after_single_post() {
    do_action('primewp_after_single_post');
}

function primewp_before_single_page() {
    do_action('primewp_before_single_page');
}

function primewp_before_single_page_title() {
    do_action('primewp_before_single_page_title');
}

function primewp_after_single_page_title() {
    do_action('primewp_after_single_page_title');
}

function primewp_after_single_page_content() {
    do_action('primewp_after_single_page_content');
}

function primewp_after_single_page() {
    do_action('primewp_after_single_page');
}

function primewp_before_comments() {
    do_action('primewp_before_comments');
}

function primewp_after_comments() {
    do_action('primewp_after_comments');
}

function primewp_before_footer() {
    do_action('primewp_before_footer');
}

function primewp_after_footer() {
    do_action('primewp_after_footer');
}