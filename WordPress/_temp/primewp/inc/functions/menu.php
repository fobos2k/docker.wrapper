<?php
/**
* Menu Functions
*
* @package PrimeWP WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

// Get our wp_nav_menu() fallback, wp_page_menu(), to show a "Home" link as the first item
function primewp_page_menu_args( $args ) {
    $args['show_home'] = true;
    return $args;
}
add_filter( 'wp_page_menu_args', 'primewp_page_menu_args' );

function primewp_top_fallback_menu() {
   wp_page_menu( array(
        'sort_column'  => 'menu_order, post_title',
        'menu_id'      => 'primewp-menu-secondary-navigation',
        'menu_class'   => 'primewp-secondary-nav-menu primewp-menu-secondary',
        'container'    => 'ul',
        'echo'         => true,
        'link_before'  => '',
        'link_after'   => '',
        'before'       => '',
        'after'        => '',
        'item_spacing' => 'discard',
        'walker'       => '',
    ) );
}

function primewp_fallback_menu() {
   wp_page_menu( array(
        'sort_column'  => 'menu_order, post_title',
        'menu_id'      => 'primewp-menu-primary-navigation',
        'menu_class'   => 'primewp-primary-nav-menu primewp-menu-primary',
        'container'    => 'ul',
        'echo'         => true,
        'link_before'  => '',
        'link_after'   => '',
        'before'       => '',
        'after'        => '',
        'item_spacing' => 'discard',
        'walker'       => '',
    ) );
}

function primewp_secondary_menu_area() {
if ( !(primewp_get_option('disable_secondary_menu')) ) { ?>
<div class="primewp-container primewp-secondary-menu-container clearfix">
<div class="primewp-secondary-menu-container-inside clearfix">
<nav class="primewp-nav-secondary" id="primewp-secondary-navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation" aria-label="<?php esc_attr_e( 'Secondary Menu', 'primewp' ); ?>">
<div class="primewp-outer-wrapper">
<button class="primewp-secondary-responsive-menu-icon" aria-controls="primewp-menu-secondary-navigation" aria-expanded="false"><?php esc_html_e( 'Menu', 'primewp' ); ?></button>
<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_id' => 'primewp-menu-secondary-navigation', 'menu_class' => 'primewp-secondary-nav-menu primewp-menu-secondary', 'fallback_cb' => 'primewp_top_fallback_menu', 'container' => '', ) ); ?>
</div>
</nav>
</div>
</div>
<?php }
}
add_action('primewp_before_footer', 'primewp_secondary_menu_area', 10 );

/**
 * Add a search button to primary menu
 *
 * @since 4.0
 */
function primewp_add_menu_search_button( $items, $args ) {

    // Only used for the main menu
    if ( 'primary' != $args->theme_location ) {
        return $items;
    }

    $social_button = '';
    if ( !(primewp_get_option('hide_header_social_buttons')) ) {
        $social_button = '<li class="primewp-header-icon-social-item"><a href="' . esc_url( '#primewp-header-bottom-content-2' ) . '" aria-label="'.esc_attr__('Header Social Button','primewp').'" class="primewp-header-icon-social primewp-header-tab-link"><i class="fas fa-heart" aria-hidden="true" title="'.esc_attr__('Social Links','primewp').'"></i></a></li>';
    }

    $search_button = '';
    if ( !(primewp_get_option('hide_header_search_button')) ) {
        $search_button = '<li class="primewp-header-icon-search-item"><a href="' . esc_url( '#primewp-header-bottom-content-1' ) . '" aria-label="'.esc_attr__('Header Search Button','primewp').'" class="primewp-header-icon-search primewp-header-tab-link"><i class="fas fa-search" aria-hidden="true" title="'.esc_attr__('Search','primewp').'"></i></a></li>';
    }

    $items = $items . $social_button . $search_button;
    return $items;

}
add_filter( 'wp_nav_menu_items', 'primewp_add_menu_search_button', 10, 2 );