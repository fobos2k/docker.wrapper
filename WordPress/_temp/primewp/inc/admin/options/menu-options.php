<?php
/**
* Menu options
*
* @package PrimeWP WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function primewp_menu_options($wp_customize) {

    $wp_customize->add_section( 'primewp_section_menu_options', array( 'title' => esc_html__( 'Menu Options', 'primewp' ), 'panel' => 'primewp_main_options_panel', 'priority' => 224 ) );

    $wp_customize->add_setting( 'primewp_options[disable_primary_menu]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'primewp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'primewp_disable_primary_menu_control', array( 'label' => esc_html__( 'Disable Primary Menu', 'primewp' ), 'section' => 'primewp_section_menu_options', 'settings' => 'primewp_options[disable_primary_menu]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'primewp_options[disable_secondary_menu]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'primewp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'primewp_disable_secondary_menu_control', array( 'label' => esc_html__( 'Disable Secondary Menu', 'primewp' ), 'section' => 'primewp_section_menu_options', 'settings' => 'primewp_options[disable_secondary_menu]', 'type' => 'checkbox', ) );

}