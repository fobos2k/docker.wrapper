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

<div id="post-<?php the_ID(); ?>" class="primewp-fp09-post primewp-item-post">

    <?php if ( has_post_thumbnail() ) { ?>
    <?php if ( !(primewp_get_option('hide_thumbnail')) ) { ?>
    <div class="primewp-fp09-post-thumbnail">
        <a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php /* translators: %s: post title. */ echo esc_attr( sprintf( __( 'Permanent Link to %s', 'primewp' ), the_title_attribute( 'echo=0' ) ) ); ?>" class="primewp-fp09-post-thumbnail-link"><?php the_post_thumbnail('primewp-675w-autoh-image', array('class' => 'primewp-fp09-post-thumbnail-img', 'title' => the_title_attribute('echo=0'))); ?></a>
    </div>
    <?php } ?>
    <?php } ?>

    <?php if((has_post_thumbnail()) && !(primewp_get_option('hide_thumbnail'))) { ?><div class="primewp-fp09-post-details"><?php } ?>
    <?php if(!(has_post_thumbnail()) || (primewp_get_option('hide_thumbnail'))) { ?><div class="primewp-fp09-post-details-full"><?php } ?>

    <?php if ( !(primewp_get_option('hide_post_categories_home')) ) { ?><?php primewp_style_9_cats(); ?><?php } ?>

    <?php the_title( sprintf( '<h3 class="primewp-fp09-post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>

    <?php primewp_style_9_postmeta(); ?>

    <div class="primewp-fp09-post-snippet clearfix">
    <?php
    the_content( sprintf(
        wp_kses(
            /* translators: %s: Name of current post. Only visible to screen readers */
            __( 'Continue reading<span class="screen-reader-text"> "%s"</span> <span class="meta-nav">&rarr;</span>', 'primewp' ),
            array(
                'span' => array(
                    'class' => array(),
                ),
            )
        ),
        get_the_title()
    ) );

    wp_link_pages( array(
     'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'primewp' ) . '</span>',
     'after'       => '</div>',
     'link_before' => '<span>',
     'link_after'  => '</span>',
     'separator'   => '',
     ) );
    ?>
    </div>

    <?php if ( !(primewp_get_option('hide_post_tags_home')) ) { ?>
    <footer class="primewp-fp09-post-footer">
        <?php primewp_post_tags(); ?>
    </footer>
    <?php } ?>

    <?php if(!(has_post_thumbnail()) || (primewp_get_option('hide_thumbnail'))) { ?></div><?php } ?>
    <?php if((has_post_thumbnail()) && !(primewp_get_option('hide_thumbnail'))) { ?></div><?php } ?>

</div>