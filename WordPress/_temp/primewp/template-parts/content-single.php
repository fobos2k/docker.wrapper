<?php
/**
* Template part for displaying single posts.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package PrimeWP WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/
?>

<?php primewp_before_single_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('primewp-post-singular primewp-box'); ?>>
<div class="primewp-box-inside">

    <header class="entry-header">
    <div class="entry-header-inside">
        <?php if ( !(primewp_get_option('hide_post_categories')) ) { ?><?php primewp_single_cats(); ?><?php } ?>

        <?php the_title( sprintf( '<h1 class="post-title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

        <?php primewp_single_postmeta(); ?>
    </div>
    </header><!-- .entry-header -->

    <?php primewp_after_single_post_title(); ?>

    <div class="entry-content clearfix">
            <?php
            if ( has_post_thumbnail() ) {
                if ( !(primewp_get_option('hide_thumbnail')) ) {
                    if ( !(primewp_get_option('hide_thumbnail_single')) ) {
                        if ( primewp_get_option('thumbnail_link') == 'no' ) { ?>
                            <div class="primewp-post-thumbnail-single">
                            <?php
                            if ( is_page_template( array( 'template-full-width-post.php' ) ) ) {
                                the_post_thumbnail('primewp-1226w-autoh-image', array('class' => 'primewp-post-thumbnail-single-img', 'title' => the_title_attribute('echo=0')));
                            } else {
                                the_post_thumbnail('primewp-675w-autoh-image', array('class' => 'primewp-post-thumbnail-single-img', 'title' => the_title_attribute('echo=0')));
                            }
                            ?>
                            </div>
                        <?php } else { ?>
                            <div class="primewp-post-thumbnail-single">
                            <?php if ( is_page_template( array( 'template-full-width-post.php' ) ) ) { ?>
                                <a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php /* translators: %s: post title. */ echo esc_attr( sprintf( __( 'Permanent Link to %s', 'primewp' ), the_title_attribute( 'echo=0' ) ) ); ?>" class="primewp-post-thumbnail-single-link"><?php the_post_thumbnail('primewp-1226w-autoh-image', array('class' => 'primewp-post-thumbnail-single-img', 'title' => the_title_attribute('echo=0'))); ?></a>
                            <?php } else { ?>
                                <a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php /* translators: %s: post title. */ echo esc_attr( sprintf( __( 'Permanent Link to %s', 'primewp' ), the_title_attribute( 'echo=0' ) ) ); ?>" class="primewp-post-thumbnail-single-link"><?php the_post_thumbnail('primewp-675w-autoh-image', array('class' => 'primewp-post-thumbnail-single-img', 'title' => the_title_attribute('echo=0'))); ?></a>
                            <?php } ?>
                            </div>
                <?php   }
                    }
                }
            }

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
             ) );
             ?>
    </div><!-- .entry-content -->

    <?php primewp_after_single_post_content(); ?>

    <?php if ( !(primewp_get_option('hide_post_tags')) ) { ?>
    <footer class="entry-footer">
        <?php primewp_post_tags(); ?>
    </footer><!-- .entry-footer -->
    <?php } ?>

    <?php if ( !(primewp_get_option('hide_author_bio_box')) ) { echo wp_kses_post( force_balance_tags( primewp_add_author_bio_box() ) ); } ?>
</div>
</article>

<?php primewp_after_single_post(); ?>