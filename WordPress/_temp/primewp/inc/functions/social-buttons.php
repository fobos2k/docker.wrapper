<?php
/**
* Social buttons
*
* @package PrimeWP WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function primewp_header_social_buttons() { ?>

<div class='primewp-top-social-icons'>
    <?php if ( primewp_get_option('twitterlink') ) : ?>
            <a href="<?php echo esc_url( primewp_get_option('twitterlink') ); ?>" target="_blank" rel="nofollow" class="primewp-social-icon-twitter" aria-label="<?php esc_attr_e('Twitter Button','primewp'); ?>"><i class="fab fa-twitter" aria-hidden="true" title="<?php esc_attr_e('Twitter','primewp'); ?>"></i></a><?php endif; ?>
    <?php if ( primewp_get_option('facebooklink') ) : ?>
            <a href="<?php echo esc_url( primewp_get_option('facebooklink') ); ?>" target="_blank" rel="nofollow" class="primewp-social-icon-facebook" aria-label="<?php esc_attr_e('Facebook Button','primewp'); ?>"><i class="fab fa-facebook-f" aria-hidden="true" title="<?php esc_attr_e('Facebook','primewp'); ?>"></i></a><?php endif; ?>
    <?php if ( primewp_get_option('googlelink') ) : ?>
            <a href="<?php echo esc_url( primewp_get_option('googlelink') ); ?>" target="_blank" rel="nofollow" class="primewp-social-icon-google-plus" aria-label="<?php esc_attr_e('Google Plus Button','primewp'); ?>"><i class="fab fa-google-plus-g" aria-hidden="true" title="<?php esc_attr_e('Google Plus','primewp'); ?>"></i></a><?php endif; ?>
    <?php if ( primewp_get_option('pinterestlink') ) : ?>
            <a href="<?php echo esc_url( primewp_get_option('pinterestlink') ); ?>" target="_blank" rel="nofollow" class="primewp-social-icon-pinterest" aria-label="<?php esc_attr_e('Pinterest Button','primewp'); ?>"><i class="fab fa-pinterest" aria-hidden="true" title="<?php esc_attr_e('Pinterest','primewp'); ?>"></i></a><?php endif; ?>
    <?php if ( primewp_get_option('linkedinlink') ) : ?>
            <a href="<?php echo esc_url( primewp_get_option('linkedinlink') ); ?>" target="_blank" rel="nofollow" class="primewp-social-icon-linkedin" aria-label="<?php esc_attr_e('Linkedin Button','primewp'); ?>"><i class="fab fa-linkedin-in" aria-hidden="true" title="<?php esc_attr_e('Linkedin','primewp'); ?>"></i></a><?php endif; ?>
    <?php if ( primewp_get_option('instagramlink') ) : ?>
            <a href="<?php echo esc_url( primewp_get_option('instagramlink') ); ?>" target="_blank" rel="nofollow" class="primewp-social-icon-instagram" aria-label="<?php esc_attr_e('Instagram Button','primewp'); ?>"><i class="fab fa-instagram" aria-hidden="true" title="<?php esc_attr_e('Instagram','primewp'); ?>"></i></a><?php endif; ?>
    <?php if ( primewp_get_option('flickrlink') ) : ?>
            <a href="<?php echo esc_url( primewp_get_option('flickrlink') ); ?>" target="_blank" rel="nofollow" class="primewp-social-icon-flickr" aria-label="<?php esc_attr_e('Flickr Button','primewp'); ?>"><i class="fab fa-flickr" aria-hidden="true" title="<?php esc_attr_e('Flickr','primewp'); ?>"></i></a><?php endif; ?>
    <?php if ( primewp_get_option('youtubelink') ) : ?>
            <a href="<?php echo esc_url( primewp_get_option('youtubelink') ); ?>" target="_blank" rel="nofollow" class="primewp-social-icon-youtube" aria-label="<?php esc_attr_e('Youtube Button','primewp'); ?>"><i class="fab fa-youtube" aria-hidden="true" title="<?php esc_attr_e('Youtube','primewp'); ?>"></i></a><?php endif; ?>
    <?php if ( primewp_get_option('vimeolink') ) : ?>
            <a href="<?php echo esc_url( primewp_get_option('vimeolink') ); ?>" target="_blank" rel="nofollow" class="primewp-social-icon-vimeo" aria-label="<?php esc_attr_e('Vimeo Button','primewp'); ?>"><i class="fab fa-vimeo-v" aria-hidden="true" title="<?php esc_attr_e('Vimeo','primewp'); ?>"></i></a><?php endif; ?>
    <?php if ( primewp_get_option('soundcloudlink') ) : ?>
            <a href="<?php echo esc_url( primewp_get_option('soundcloudlink') ); ?>" target="_blank" rel="nofollow" class="primewp-social-icon-soundcloud" aria-label="<?php esc_attr_e('SoundCloud Button','primewp'); ?>"><i class="fab fa-soundcloud" aria-hidden="true" title="<?php esc_attr_e('SoundCloud','primewp'); ?>"></i></a><?php endif; ?>
    <?php if ( primewp_get_option('lastfmlink') ) : ?>
            <a href="<?php echo esc_url( primewp_get_option('lastfmlink') ); ?>" target="_blank" rel="nofollow" class="primewp-social-icon-lastfm" aria-label="<?php esc_attr_e('Lastfm Button','primewp'); ?>"><i class="fab fa-lastfm" aria-hidden="true" title="<?php esc_attr_e('Lastfm','primewp'); ?>"></i></a><?php endif; ?>
    <?php if ( primewp_get_option('githublink') ) : ?>
            <a href="<?php echo esc_url( primewp_get_option('githublink') ); ?>" target="_blank" rel="nofollow" class="primewp-social-icon-github" aria-label="<?php esc_attr_e('Github Button','primewp'); ?>"><i class="fab fa-github" aria-hidden="true" title="<?php esc_attr_e('Github','primewp'); ?>"></i></a><?php endif; ?>
    <?php if ( primewp_get_option('bitbucketlink') ) : ?>
            <a href="<?php echo esc_url( primewp_get_option('bitbucketlink') ); ?>" target="_blank" rel="nofollow" class="primewp-social-icon-bitbucket" aria-label="<?php esc_attr_e('Bitbucket Button','primewp'); ?>"><i class="fab fa-bitbucket" aria-hidden="true" title="<?php esc_attr_e('Bitbucket','primewp'); ?>"></i></a><?php endif; ?>
    <?php if ( primewp_get_option('tumblrlink') ) : ?>
            <a href="<?php echo esc_url( primewp_get_option('tumblrlink') ); ?>" target="_blank" rel="nofollow" class="primewp-social-icon-tumblr" aria-label="<?php esc_attr_e('Tumblr Button','primewp'); ?>"><i class="fab fa-tumblr" aria-hidden="true" title="<?php esc_attr_e('Tumblr','primewp'); ?>"></i></a><?php endif; ?>
    <?php if ( primewp_get_option('digglink') ) : ?>
            <a href="<?php echo esc_url( primewp_get_option('digglink') ); ?>" target="_blank" rel="nofollow" class="primewp-social-icon-digg" aria-label="<?php esc_attr_e('Digg Button','primewp'); ?>"><i class="fab fa-digg" aria-hidden="true" title="<?php esc_attr_e('Digg','primewp'); ?>"></i></a><?php endif; ?>
    <?php if ( primewp_get_option('deliciouslink') ) : ?>
            <a href="<?php echo esc_url( primewp_get_option('deliciouslink') ); ?>" target="_blank" rel="nofollow" class="primewp-social-icon-delicious" aria-label="<?php esc_attr_e('Delicious Button','primewp'); ?>"><i class="fab fa-delicious" aria-hidden="true" title="<?php esc_attr_e('Delicious','primewp'); ?>"></i></a><?php endif; ?>
    <?php if ( primewp_get_option('stumblelink') ) : ?>
            <a href="<?php echo esc_url( primewp_get_option('stumblelink') ); ?>" target="_blank" rel="nofollow" class="primewp-social-icon-stumbleupon" aria-label="<?php esc_attr_e('Stumbleupon Button','primewp'); ?>"><i class="fab fa-stumbleupon" aria-hidden="true" title="<?php esc_attr_e('Stumbleupon','primewp'); ?>"></i></a><?php endif; ?>
    <?php if ( primewp_get_option('redditlink') ) : ?>
            <a href="<?php echo esc_url( primewp_get_option('redditlink') ); ?>" target="_blank" rel="nofollow" class="primewp-social-icon-reddit" aria-label="<?php esc_attr_e('Reddit Button','primewp'); ?>"><i class="fab fa-reddit" aria-hidden="true" title="<?php esc_attr_e('Reddit','primewp'); ?>"></i></a><?php endif; ?>
    <?php if ( primewp_get_option('dribbblelink') ) : ?>
            <a href="<?php echo esc_url( primewp_get_option('dribbblelink') ); ?>" target="_blank" rel="nofollow" class="primewp-social-icon-dribbble" aria-label="<?php esc_attr_e('Dribbble Button','primewp'); ?>"><i class="fab fa-dribbble" aria-hidden="true" title="<?php esc_attr_e('Dribbble','primewp'); ?>"></i></a><?php endif; ?>
    <?php if ( primewp_get_option('behancelink') ) : ?>
            <a href="<?php echo esc_url( primewp_get_option('behancelink') ); ?>" target="_blank" rel="nofollow" class="primewp-social-icon-behance" aria-label="<?php esc_attr_e('Behance Button','primewp'); ?>"><i class="fab fa-behance" aria-hidden="true" title="<?php esc_attr_e('Behance','primewp'); ?>"></i></a><?php endif; ?>
    <?php if ( primewp_get_option('vklink') ) : ?>
            <a href="<?php echo esc_url( primewp_get_option('vklink') ); ?>" target="_blank" rel="nofollow" class="primewp-social-icon-vk" aria-label="<?php esc_attr_e('VK Button','primewp'); ?>"><i class="fab fa-vk" aria-hidden="true" title="<?php esc_attr_e('VK','primewp'); ?>"></i></a><?php endif; ?>
    <?php if ( primewp_get_option('codepenlink') ) : ?>
            <a href="<?php echo esc_url( primewp_get_option('codepenlink') ); ?>" target="_blank" rel="nofollow" class="primewp-social-icon-codepen" aria-label="<?php esc_attr_e('Codepen Button','primewp'); ?>"><i class="fab fa-codepen" aria-hidden="true" title="<?php esc_attr_e('Codepen','primewp'); ?>"></i></a><?php endif; ?>
    <?php if ( primewp_get_option('jsfiddlelink') ) : ?>
            <a href="<?php echo esc_url( primewp_get_option('jsfiddlelink') ); ?>" target="_blank" rel="nofollow" class="primewp-social-icon-jsfiddle" aria-label="<?php esc_attr_e('JSFiddle Button','primewp'); ?>"><i class="fab fa-jsfiddle" aria-hidden="true" title="<?php esc_attr_e('JSFiddle','primewp'); ?>"></i></a><?php endif; ?>
    <?php if ( primewp_get_option('stackoverflowlink') ) : ?>
            <a href="<?php echo esc_url( primewp_get_option('stackoverflowlink') ); ?>" target="_blank" rel="nofollow" class="primewp-social-icon-stackoverflow" aria-label="<?php esc_attr_e('Stack Overflow Button','primewp'); ?>"><i class="fab fa-stack-overflow" aria-hidden="true" title="<?php esc_attr_e('Stack Overflow','primewp'); ?>"></i></a><?php endif; ?>
    <?php if ( primewp_get_option('stackexchangelink') ) : ?>
            <a href="<?php echo esc_url( primewp_get_option('stackexchangelink') ); ?>" target="_blank" rel="nofollow" class="primewp-social-icon-stackexchange" aria-label="<?php esc_attr_e('Stack Exchange Button','primewp'); ?>"><i class="fab fa-stack-exchange" aria-hidden="true" title="<?php esc_attr_e('Stack Exchange','primewp'); ?>"></i></a><?php endif; ?>
    <?php if ( primewp_get_option('bsalink') ) : ?>
            <a href="<?php echo esc_url( primewp_get_option('bsalink') ); ?>" target="_blank" rel="nofollow" class="primewp-social-icon-buysellads" aria-label="<?php esc_attr_e('BuySellAds Button','primewp'); ?>"><i class="fab fa-buysellads" aria-hidden="true" title="<?php esc_attr_e('BuySellAds','primewp'); ?>"></i></a><?php endif; ?>
    <?php if ( primewp_get_option('slidesharelink') ) : ?>
            <a href="<?php echo esc_url( primewp_get_option('slidesharelink') ); ?>" target="_blank" rel="nofollow" class="primewp-social-icon-slideshare" aria-label="<?php esc_attr_e('SlideShare Button','primewp'); ?>"><i class="fab fa-slideshare" aria-hidden="true" title="<?php esc_attr_e('SlideShare','primewp'); ?>"></i></a><?php endif; ?>
    <?php if ( primewp_get_option('skypeusername') ) : ?>
            <a href="skype:<?php echo esc_html( primewp_get_option('skypeusername') ); ?>?chat" class="primewp-social-icon-skype" aria-label="<?php esc_attr_e('Skype Button','primewp'); ?>"><i class="fab fa-skype" aria-hidden="true" title="<?php esc_attr_e('Skype','primewp'); ?>"></i></a><?php endif; ?>
    <?php if ( primewp_get_option('emailaddress') ) : ?>
            <a href="mailto:<?php echo esc_html( primewp_get_option('emailaddress') ); ?>" class="primewp-social-icon-email" aria-label="<?php esc_attr_e('Email Us Button','primewp'); ?>"><i class="far fa-envelope" aria-hidden="true" title="<?php esc_attr_e('Email Us','primewp'); ?>"></i></a><?php endif; ?>
    <?php if ( primewp_get_option('rsslink') ) : ?>
            <a href="<?php echo esc_url( primewp_get_option('rsslink') ); ?>" target="_blank" rel="nofollow" class="primewp-social-icon-rss" aria-label="<?php esc_attr_e('RSS Button','primewp'); ?>"><i class="fas fa-rss" aria-hidden="true" title="<?php esc_attr_e('RSS','primewp'); ?>"></i></a><?php endif; ?>
    <?php if ( !(primewp_get_option('hide_header_login_button')) ) { ?><?php if (is_user_logged_in()) : ?><a href="<?php echo esc_url( wp_logout_url( get_permalink() ) ); ?>" aria-label="<?php esc_attr_e( 'Logout Button', 'primewp' ); ?>" class="primewp-social-icon-login"><i class="fas fa-sign-out-alt" aria-hidden="true" title="<?php esc_attr_e('Logout','primewp'); ?>"></i></a><?php else : ?><a href="<?php echo esc_url( wp_login_url( get_permalink() ) ); ?>" aria-label="<?php esc_attr_e( 'Login / Register Button', 'primewp' ); ?>" class="primewp-social-icon-login"><i class="fas fa-sign-in-alt" aria-hidden="true" title="<?php esc_attr_e('Login / Register','primewp'); ?>"></i></a><?php endif;?><?php } ?>
</div>

<?php }