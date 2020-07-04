<?php
/**
* The header for PrimeWP theme.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package PrimeWP WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class('primewp-animated primewp-fadein'); ?> id="primewp-site-body" itemscope="itemscope" itemtype="http://schema.org/WebPage">
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#primewp-posts-wrapper"><?php esc_html_e( 'Skip to content', 'primewp' ); ?></a>

<?php primewp_before_header(); ?>

<div class="primewp-site-header primewp-container" id="primewp-header" itemscope="itemscope" itemtype="http://schema.org/WPHeader" role="banner">
<div class="primewp-head-content clearfix" id="primewp-head-content">

<?php if ( !(primewp_get_option('hide_header_content')) ) { ?>
<div class="primewp-header-inside clearfix">
<div class="primewp-header-inside-content clearfix">
<div class="primewp-outer-wrapper">

<div class="primewp-logo">
<?php if ( has_custom_logo() ) : ?>
    <div class="site-branding">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="primewp-logo-img-link">
        <img src="<?php echo esc_url( primewp_custom_logo() ); ?>" alt="" class="primewp-logo-img"/>
    </a>
    <div class="primewp-custom-logo-info"><?php primewp_site_title(); ?></div>
    </div>
<?php else: ?>
    <div class="site-branding">
      <?php primewp_site_title(); ?>
    </div>
<?php endif; ?>
</div>

<div class="primewp-header-right">
<?php if ( !(primewp_get_option('disable_primary_menu')) ) { ?>
<div class="primewp-container primewp-primary-menu-container clearfix">
<div class="primewp-primary-menu-container-inside clearfix">

<?php if ( !(primewp_get_option('hide_header_social_buttons')) ) { ?><a href="<?php echo esc_url( '#primewp-header-bottom-content-2' ); ?>" aria-label="<?php esc_attr_e('Mobile Header Social Button','primewp'); ?>" class="primewp-header-icon-social primewp-header-icon-social-mobile primewp-header-tab-link"><i class="fas fa-heart" aria-hidden="true" title="<?php esc_attr_e('Social Links','primewp'); ?>"></i></a><?php } ?>
<?php if ( !(primewp_get_option('hide_header_search_button')) ) { ?><a href="<?php echo esc_url( '#primewp-header-bottom-content-1' ); ?>" aria-label="<?php esc_attr_e('Mobile Header Search Button','primewp'); ?>" class="primewp-header-icon-search primewp-header-icon-search-mobile primewp-header-tab-link"><i class="fas fa-search" aria-hidden="true" title="<?php esc_attr_e('Search','primewp'); ?>"></i></a><?php } ?>

<nav class="primewp-nav-primary" id="primewp-primary-navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'primewp' ); ?>">
<button class="primewp-primary-responsive-menu-icon" aria-controls="primewp-menu-primary-navigation" aria-expanded="false"><?php esc_html_e( 'Menu', 'primewp' ); ?></button>
<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primewp-menu-primary-navigation', 'menu_class' => 'primewp-primary-nav-menu primewp-menu-primary', 'fallback_cb' => 'primewp_fallback_menu', 'container' => '', ) ); ?>
</nav>

</div>
</div>
<?php } ?>
</div>

</div>
</div>
</div>
<?php } else { ?>
<div class="primewp-no-header-content">
  <?php primewp_site_title(); ?>
</div>
<?php } ?>

<?php if ( !(primewp_get_option('hide_header_search_button')) ) { ?>
<div class="primewp-header-bottom-content" id="primewp-header-bottom-content-1">
<div class="primewp-outer-wrapper">
<?php get_search_form(); ?>
</div>
</div>
<?php } ?>

<?php if ( !(primewp_get_option('hide_header_social_buttons')) ) { ?>
<div class="primewp-header-bottom-content" id="primewp-header-bottom-content-2">
<div class="primewp-outer-wrapper">
<?php primewp_header_social_buttons(); ?>
</div>
</div>
<?php } ?>

</div><!--/#primewp-head-content -->
</div><!--/#primewp-header -->

<?php primewp_after_header(); ?>

<?php if ( get_header_image() ) : ?>
<div class="primewp-header-image clearfix">
<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="primewp-header-img-link">
    <img src="<?php header_image(); ?>" width="<?php echo esc_attr(get_custom_header()->width); ?>" height="<?php echo esc_attr(get_custom_header()->height); ?>" alt="" class="primewp-header-img"/>
</a>
<?php if ( !(primewp_get_option('hide_header_image_title')) ) { ?>
<div class="primewp-header-image-info">
<div class="primewp-header-image-info-inside">
    <p class="primewp-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
    <?php if ( !(primewp_get_option('hide_tagline')) ) { ?><p class="primewp-site-description"><span><?php bloginfo( 'description' ); ?></span></p><?php } ?>
</div>
</div>
<?php } ?>
</div>
<?php endif; ?>

<div class="primewp-outer-wrapper">
<?php primewp_top_wide_widgets(); ?>
</div>

<div class="primewp-outer-wrapper" id="primewp-wrapper-outside">

<div class="primewp-container clearfix" id="primewp-wrapper">
<div class="primewp-content-wrapper clearfix" id="primewp-content-wrapper">