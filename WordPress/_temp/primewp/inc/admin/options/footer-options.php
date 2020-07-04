<?php
/**
* Footer options
*
* @package PrimeWP WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function primewp_footer_options($wp_customize) {

    $wp_customize->add_section( 'primewp_section_footer', array( 'title' => esc_html__( 'Footer', 'primewp' ), 'panel' => 'primewp_main_options_panel', 'priority' => 440 ) );

    $wp_customize->add_setting( 'primewp_options[footer_text]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'primewp_sanitize_html', ) );

    $wp_customize->add_control( 'primewp_footer_text_control', array( 'label' => esc_html__( 'Footer copyright notice', 'primewp' ), 'section' => 'primewp_section_footer', 'settings' => 'primewp_options[footer_text]', 'type' => 'text', ) );

    $wp_customize->add_setting( 'primewp_options[hide_footer_widgets]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'primewp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'primewp_hide_footer_widgets_control', array( 'label' => esc_html__( 'Hide Footer Widgets', 'primewp' ), 'section' => 'primewp_section_footer', 'settings' => 'primewp_options[hide_footer_widgets]', 'type' => 'checkbox', ) );

}