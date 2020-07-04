<?php
/**
* Social profiles options
*
* @package PrimeWP WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function primewp_social_profiles($wp_customize) {

    $wp_customize->add_section( 'primewp_section_social', array( 'title' => esc_html__( 'Social Links', 'primewp' ), 'panel' => 'primewp_main_options_panel', 'priority' => 400, ));

    $wp_customize->add_setting( 'primewp_options[twitterlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'primewp_twitterlink_control', array( 'label' => esc_html__( 'Twitter URL', 'primewp' ), 'section' => 'primewp_section_social', 'settings' => 'primewp_options[twitterlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'primewp_options[facebooklink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'primewp_facebooklink_control', array( 'label' => esc_html__( 'Facebook URL', 'primewp' ), 'section' => 'primewp_section_social', 'settings' => 'primewp_options[facebooklink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'primewp_options[googlelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) ); 

    $wp_customize->add_control( 'primewp_googlelink_control', array( 'label' => esc_html__( 'Google Plus URL', 'primewp' ), 'section' => 'primewp_section_social', 'settings' => 'primewp_options[googlelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'primewp_options[pinterestlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'primewp_pinterestlink_control', array( 'label' => esc_html__( 'Pinterest URL', 'primewp' ), 'section' => 'primewp_section_social', 'settings' => 'primewp_options[pinterestlink]', 'type' => 'text' ) );
    
    $wp_customize->add_setting( 'primewp_options[linkedinlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'primewp_linkedinlink_control', array( 'label' => esc_html__( 'Linkedin Link', 'primewp' ), 'section' => 'primewp_section_social', 'settings' => 'primewp_options[linkedinlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'primewp_options[instagramlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'primewp_instagramlink_control', array( 'label' => esc_html__( 'Instagram Link', 'primewp' ), 'section' => 'primewp_section_social', 'settings' => 'primewp_options[instagramlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'primewp_options[vklink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'primewp_vklink_control', array( 'label' => esc_html__( 'VK Link', 'primewp' ), 'section' => 'primewp_section_social', 'settings' => 'primewp_options[vklink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'primewp_options[flickrlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'primewp_flickrlink_control', array( 'label' => esc_html__( 'Flickr Link', 'primewp' ), 'section' => 'primewp_section_social', 'settings' => 'primewp_options[flickrlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'primewp_options[youtubelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'primewp_youtubelink_control', array( 'label' => esc_html__( 'Youtube URL', 'primewp' ), 'section' => 'primewp_section_social', 'settings' => 'primewp_options[youtubelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'primewp_options[vimeolink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'primewp_vimeolink_control', array( 'label' => esc_html__( 'Vimeo URL', 'primewp' ), 'section' => 'primewp_section_social', 'settings' => 'primewp_options[vimeolink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'primewp_options[soundcloudlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'primewp_soundcloudlink_control', array( 'label' => esc_html__( 'Soundcloud URL', 'primewp' ), 'section' => 'primewp_section_social', 'settings' => 'primewp_options[soundcloudlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'primewp_options[lastfmlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'primewp_lastfmlink_control', array( 'label' => esc_html__( 'Lastfm URL', 'primewp' ), 'section' => 'primewp_section_social', 'settings' => 'primewp_options[lastfmlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'primewp_options[githublink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'primewp_githublink_control', array( 'label' => esc_html__( 'Github URL', 'primewp' ), 'section' => 'primewp_section_social', 'settings' => 'primewp_options[githublink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'primewp_options[bitbucketlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'primewp_bitbucketlink_control', array( 'label' => esc_html__( 'Bitbucket URL', 'primewp' ), 'section' => 'primewp_section_social', 'settings' => 'primewp_options[bitbucketlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'primewp_options[tumblrlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'primewp_tumblrlink_control', array( 'label' => esc_html__( 'Tumblr URL', 'primewp' ), 'section' => 'primewp_section_social', 'settings' => 'primewp_options[tumblrlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'primewp_options[digglink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'primewp_digglink_control', array( 'label' => esc_html__( 'Digg URL', 'primewp' ), 'section' => 'primewp_section_social', 'settings' => 'primewp_options[digglink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'primewp_options[deliciouslink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'primewp_deliciouslink_control', array( 'label' => esc_html__( 'Delicious URL', 'primewp' ), 'section' => 'primewp_section_social', 'settings' => 'primewp_options[deliciouslink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'primewp_options[stumblelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'primewp_stumblelink_control', array( 'label' => esc_html__( 'Stumbleupon Link', 'primewp' ), 'section' => 'primewp_section_social', 'settings' => 'primewp_options[stumblelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'primewp_options[redditlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'primewp_redditlink_control', array( 'label' => esc_html__( 'Reddit Link', 'primewp' ), 'section' => 'primewp_section_social', 'settings' => 'primewp_options[redditlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'primewp_options[dribbblelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'primewp_dribbblelink_control', array( 'label' => esc_html__( 'Dribbble Link', 'primewp' ), 'section' => 'primewp_section_social', 'settings' => 'primewp_options[dribbblelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'primewp_options[behancelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'primewp_behancelink_control', array( 'label' => esc_html__( 'Behance Link', 'primewp' ), 'section' => 'primewp_section_social', 'settings' => 'primewp_options[behancelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'primewp_options[codepenlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'primewp_codepenlink_control', array( 'label' => esc_html__( 'Codepen Link', 'primewp' ), 'section' => 'primewp_section_social', 'settings' => 'primewp_options[codepenlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'primewp_options[jsfiddlelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'primewp_jsfiddlelink_control', array( 'label' => esc_html__( 'JSFiddle Link', 'primewp' ), 'section' => 'primewp_section_social', 'settings' => 'primewp_options[jsfiddlelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'primewp_options[stackoverflowlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'primewp_stackoverflowlink_control', array( 'label' => esc_html__( 'Stack Overflow Link', 'primewp' ), 'section' => 'primewp_section_social', 'settings' => 'primewp_options[stackoverflowlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'primewp_options[stackexchangelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'primewp_stackexchangelink_control', array( 'label' => esc_html__( 'Stack Exchange Link', 'primewp' ), 'section' => 'primewp_section_social', 'settings' => 'primewp_options[stackexchangelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'primewp_options[bsalink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'primewp_bsalink_control', array( 'label' => esc_html__( 'BuySellAds Link', 'primewp' ), 'section' => 'primewp_section_social', 'settings' => 'primewp_options[bsalink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'primewp_options[slidesharelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'primewp_slidesharelink_control', array( 'label' => esc_html__( 'SlideShare Link', 'primewp' ), 'section' => 'primewp_section_social', 'settings' => 'primewp_options[slidesharelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'primewp_options[skypeusername]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_text_field' ) );

    $wp_customize->add_control( 'primewp_skypeusername_control', array( 'label' => esc_html__( 'Skype Username', 'primewp' ), 'section' => 'primewp_section_social', 'settings' => 'primewp_options[skypeusername]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'primewp_options[emailaddress]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'primewp_sanitize_email' ) );

    $wp_customize->add_control( 'primewp_emailaddress_control', array( 'label' => esc_html__( 'Email Address', 'primewp' ), 'section' => 'primewp_section_social', 'settings' => 'primewp_options[emailaddress]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'primewp_options[rsslink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'primewp_rsslink_control', array( 'label' => esc_html__( 'RSS Feed URL', 'primewp' ), 'section' => 'primewp_section_social', 'settings' => 'primewp_options[rsslink]', 'type' => 'text' ) );

}