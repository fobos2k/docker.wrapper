<?php
/**
* Recommended plugins options
*
* @package PrimeWP WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function primewp_recomm_plugin_options($wp_customize) {

    // Customizer Section: Recommended Plugins
    $wp_customize->add_section( 'primewp_section_recommended_plugins', array( 'title' => esc_html__( 'Recommended Plugins', 'primewp' ), 'panel' => 'primewp_main_options_panel', 'priority' => 880 ));

    $wp_customize->add_setting( 'primewp_options[recommended_plugins]', array( 'type' => 'option', 'capability' => 'install_plugins', 'sanitize_callback' => 'primewp_sanitize_recommended_plugins' ) );

    $wp_customize->add_control( new PrimeWP_Customize_Recommended_Plugins( $wp_customize, 'primewp_recommended_plugins_control', array( 'label' => esc_html__( 'Recommended Plugins', 'primewp' ), 'section' => 'primewp_section_recommended_plugins', 'settings' => 'primewp_options[recommended_plugins]', 'type' => 'tdna-recommended-wpplugins', 'capability' => 'install_plugins' ) ) );

}