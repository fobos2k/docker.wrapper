<?php
/**
* Header options
*
* @package PrimeWP WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function primewp_header_options($wp_customize) {

    // Header
    $wp_customize->add_section( 'primewp_section_header', array( 'title' => esc_html__( 'Header Options', 'primewp' ), 'panel' => 'primewp_main_options_panel', 'priority' => 240 ) );

    $wp_customize->add_setting( 'primewp_options[hide_tagline]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'primewp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'primewp_hide_tagline_control', array( 'label' => esc_html__( 'Hide Tagline', 'primewp' ), 'section' => 'primewp_section_header', 'settings' => 'primewp_options[hide_tagline]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'primewp_options[enable_sticky_mobile_header]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'primewp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'primewp_enable_sticky_mobile_header_control', array( 'label' => esc_html__( 'Enable Sticky Header on Small Screen', 'primewp' ), 'section' => 'primewp_section_header', 'settings' => 'primewp_options[enable_sticky_mobile_header]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'primewp_options[hide_header_content]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'primewp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'primewp_hide_header_content_control', array( 'label' => esc_html__( 'Hide Header Content', 'primewp' ), 'section' => 'primewp_section_header', 'settings' => 'primewp_options[hide_header_content]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'primewp_options[hide_header_image_title]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'primewp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'primewp_hide_header_image_title_control', array( 'label' => esc_html__( 'Hide Site Title and Description from Header Image', 'primewp' ), 'section' => 'header_image', 'settings' => 'primewp_options[hide_header_image_title]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'primewp_options[hide_header_search_button]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'primewp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'primewp_hide_header_search_button_control', array( 'label' => esc_html__( 'Hide Header Search Button', 'primewp' ), 'section' => 'primewp_section_header', 'settings' => 'primewp_options[hide_header_search_button]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'primewp_options[hide_header_social_buttons]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'primewp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'primewp_hide_header_social_buttons_control', array( 'label' => esc_html__( 'Hide Header Social Buttons', 'primewp' ), 'section' => 'primewp_section_header', 'settings' => 'primewp_options[hide_header_social_buttons]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'primewp_options[hide_header_login_button]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'primewp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'primewp_hide_header_login_button_control', array( 'label' => esc_html__( 'Hide Header Login Button', 'primewp' ), 'section' => 'primewp_section_header', 'settings' => 'primewp_options[hide_header_login_button]', 'type' => 'checkbox', ) );

}