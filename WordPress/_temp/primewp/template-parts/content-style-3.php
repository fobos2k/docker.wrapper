<?php
/**
* Template part for displaying posts.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package PrimeWP WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/
?>

<div id="post-<?php the_ID(); ?>" class="primewp-fp03-post primewp-item-post">

    <?php if ( has_post_thumbnail() ) { ?>
    <?php if ( !(primewp_get_option('hide_thumbnail')) ) { ?>
    <div class="primewp-fp03-post-thumbnail">
        <a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php /* translators: %s: post title. */ echo esc_attr( sprintf( __( 'Permanent Link to %s', 'primewp' ), the_title_attribute( 'echo=0' ) ) ); ?>" class="primewp-fp03-post-thumbnail-link"><?php the_post_thumbnail('primewp-675w-360h-image', array('class' => 'primewp-fp03-post-thumbnail-img', 'title' => the_title_attribute('echo=0'))); ?></a>
    </div>
    <?php } ?>
    <?php } ?>

    <?php if((has_post_thumbnail()) && !(primewp_get_option('hide_thumbnail'))) { ?><div class="primewp-fp03-post-details"><?php } ?>
    <?php if(!(has_post_thumbnail()) || (primewp_get_option('hide_thumbnail'))) { ?><div class="primewp-fp03-post-details-full"><?php } ?>

    <?php if ( !(primewp_get_option('hide_post_categories_home')) ) { ?><?php primewp_style_3_cats(); ?><?php } ?>

    <?php the_title( sprintf( '<h3 class="primewp-fp03-post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>

    <?php primewp_style_3_postmeta(); ?>

    <?php if ( !(primewp_get_option('hide_post_snippet')) ) { ?><div class="primewp-fp03-post-snippet"><?php the_excerpt(); ?></div><?php } ?>

    <?php if ( !(primewp_get_option('hide_post_tags_home')) ) { ?>
    <footer class="primewp-fp03-post-footer">
        <?php primewp_post_tags(); ?>
    </footer>
    <?php } ?>

    <?php if ( !(primewp_get_option('hide_read_more_button')) ) { ?><div class='primewp-fp03-post-read-more'><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( primewp_read_more_text() ); ?></a></div><?php } ?>

    <?php if(!(has_post_thumbnail()) || (primewp_get_option('hide_thumbnail'))) { ?></div><?php } ?>
    <?php if((has_post_thumbnail()) && !(primewp_get_option('hide_thumbnail'))) { ?></div><?php } ?>

</div>