<?php
/**
* Getting started options
*
* @package PrimeWP WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function primewp_getting_started($wp_customize) {

    $wp_customize->add_section( 'primewp_section_getting_started', array( 'title' => esc_html__( 'Getting Started', 'primewp' ), 'description' => esc_html__( 'Thanks for your interest in PrimeWP! If you have any questions or run into any trouble, please visit us the following links. We will get you fixed up!', 'primewp' ), 'panel' => 'primewp_main_options_panel', 'priority' => 5, ) );

    $wp_customize->add_setting( 'primewp_options[documentation]', array( 'default' => '', 'sanitize_callback' => '__return_false', ) );

    $wp_customize->add_control( new PrimeWP_Customize_Button_Control( $wp_customize, 'primewp_documentation_control', array( 'label' => esc_html__( 'Documentation', 'primewp' ), 'section' => 'primewp_section_getting_started', 'settings' => 'primewp_options[documentation]', 'type' => 'button', 'button_tag' => 'a', 'button_class' => 'button button-primary', 'button_href' => 'https://themesdna.com/primewp-wordpress-theme/', 'button_target' => '_blank', ) ) );

    $wp_customize->add_setting( 'primewp_options[contact]', array( 'default' => '', 'sanitize_callback' => '__return_false', ) );

    $wp_customize->add_control( new PrimeWP_Customize_Button_Control( $wp_customize, 'primewp_contact_control', array( 'label' => esc_html__( 'Contact Us', 'primewp' ), 'section' => 'primewp_section_getting_started', 'settings' => 'primewp_options[contact]', 'type' => 'button', 'button_tag' => 'a', 'button_class' => 'button button-primary', 'button_href' => 'https://themesdna.com/contact/', 'button_target' => '_blank', ) ) );

}