<?php
/**
* Upgrade to pro options
*
* @package PrimeWP WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license licennse URI, for example : http://www.gnu.org/licenses/gpl-2.0.html
* @author ThemesDNA <themesdna@gmail.com>
*/

function primewp_upgrade_to_pro($wp_customize) {

    $wp_customize->add_section( 'primewp_section_upgrade', array( 'title' => esc_html__( 'Upgrade to Pro Version', 'primewp' ), 'priority' => 400 ) );
    
    $wp_customize->add_setting( 'primewp_options[upgrade_text]', array( 'default' => '', 'sanitize_callback' => '__return_false', ) );
    
    $wp_customize->add_control( new PrimeWP_Customize_Static_Text_Control( $wp_customize, 'primewp_upgrade_text_control', array(
        'label'       => esc_html__( 'PrimeWP Pro', 'primewp' ),
        'section'     => 'primewp_section_upgrade',
        'settings' => 'primewp_options[upgrade_text]',
        'description' => esc_html__( 'Do you enjoy PrimeWP? Upgrade to PrimeWP Pro now and get:', 'primewp' ).
            '<ul class="primewp-customizer-pro-features">' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'Color Options', 'primewp' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'Font Options', 'primewp' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'Built-in Posts Views Counter System', 'primewp' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'Built-in Posts Likes System', 'primewp' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( '10+ Layout Options for Posts/Pages', 'primewp' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( '10+ Layout Options for Non-Singular Pages', 'primewp' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'Width Change capability of Full Site/Main Content/Left Sidebar/Right Sidebar', 'primewp' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( '10+ Custom Page Templates', 'primewp' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( '10+ Custom Post Templates', 'primewp' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( '10+ Different Posts Styles', 'primewp' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'Slider Widget (Recent/Category/Tag based) - It can display posts according to Likes/Views/Comments/Dates/... and there are many options.', 'primewp' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( '18 Featured Posts Widgets (Recent/Category/Tag based) - Each widget can display posts according to Likes/Views/Comments/Dates/... and there are many options.', 'primewp' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'News Ticker (Recent/Category/Tag based) - It can display posts according to Likes/Views/Comments/Dates/... and there are many options.', 'primewp' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'Tabbed Widget (Recent/Category/Tag based) - It can display posts according to Likes/Views/Comments/Dates/... and there are many options.', 'primewp' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'Social Profiles Widget and About Me Widget', 'primewp' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'Header Layouts (full-width header or logo+primary menu) with Width options', 'primewp' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'Footer with Layout Options (1/2/3/4/5 columns)', 'primewp' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'Post Share Buttons with Options', 'primewp' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'Related Posts (Category/Tag based) with Thumbnails with Options', 'primewp' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'Custom Post Meta Box to Control Options in Each Post', 'primewp' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'Author Bio Box with Social Buttons', 'primewp' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'Advanced Post Navigation with Thumbnails', 'primewp' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'Random Posts Button in Header', 'primewp' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'Sticky Header/Sticky Sidebars with enable/disable capability', 'primewp' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'More Widget Areas', 'primewp' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'Built-in Contact Form', 'primewp' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'WooCommerce Support', 'primewp' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'Search Engine Optimized', 'primewp' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'Full RTL Language Support', 'primewp' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'More Customizer options', 'primewp' ) . '</li>' .
                '<li><i class="fas fa-check" aria-hidden="true"></i> ' . esc_html__( 'More Features...', 'primewp' ) . '</li>' .
            '</ul>'.
            '<strong><a href="'.PRIMEWP_PROURL.'" class="button button-primary" target="_blank"><i class="fas fa-shopping-cart" aria-hidden="true"></i> ' . esc_html__( 'Upgrade To PrimeWP PRO', 'primewp' ) . '</a></strong>'
    ) ) ); 

}