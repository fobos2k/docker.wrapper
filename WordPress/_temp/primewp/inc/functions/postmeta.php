<?php
/**
* Post meta functions
*
* @package PrimeWP WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

if ( ! function_exists( 'primewp_post_tags' ) ) :
/**
 * Prints HTML with meta information for the tags.
 */
function primewp_post_tags() {
    if ( 'post' == get_post_type() ) {
        /* translators: used between list items, there is a space after the comma */
        $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'primewp' ) );
        if ( $tags_list ) {
            /* translators: 1: list of tags. */
            printf( '<span class="primewp-tags-links"><i class="fas fa-tags" aria-hidden="true"></i> ' . esc_html__( 'Tagged %1$s', 'primewp' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        }
    }
}
endif;


if ( ! function_exists( 'primewp_style_9_cats' ) ) :
function primewp_style_9_cats() {
    if ( 'post' == get_post_type() ) {
        /* translators: used between list items, there is a space */
        $categories_list = get_the_category_list( esc_html__( '&nbsp;', 'primewp' ) );
        if ( $categories_list ) {
            /* translators: 1: list of categories. */
            printf( '<div class="primewp-fp09-post-categories">' . __( '<span class="screen-reader-text">Posted in </span>%1$s', 'primewp' ) . '</div>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        }
    }
}
endif;


if ( ! function_exists( 'primewp_style_9_postmeta' ) ) :
function primewp_style_9_postmeta() { ?>
    <?php if ( !(primewp_get_option('hide_post_author_home')) || !(primewp_get_option('hide_posted_date_home')) || !(primewp_get_option('hide_comments_link_home')) ) { ?>
    <div class="primewp-fp09-post-footer">
    <?php if ( !(primewp_get_option('hide_post_author_home')) ) { ?><span class="primewp-fp09-post-author primewp-fp09-post-meta"><i class="far fa-user-circle" aria-hidden="true"></i>&nbsp;<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a></span><?php } ?>
    <?php if ( !(primewp_get_option('hide_posted_date_home')) ) { ?><span class="primewp-fp09-post-date primewp-fp09-post-meta"><i class="far fa-clock" aria-hidden="true"></i>&nbsp;<?php echo get_the_date(); ?></span><?php } ?>
    <?php if ( !(primewp_get_option('hide_comments_link_home')) ) { ?><?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) { ?>
    <span class="primewp-fp09-post-comment primewp-fp09-post-meta"><i class="far fa-comments" aria-hidden="true"></i>&nbsp;<?php comments_popup_link( sprintf( wp_kses( /* translators: %s: post title */ __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'primewp' ), array( 'span' => array( 'class' => array(), ), ) ), get_the_title() ) ); ?></span>
    <?php } ?><?php } ?>
    </div>
    <?php } ?>
<?php }
endif;



if ( ! function_exists( 'primewp_style_4_cats' ) ) :
function primewp_style_4_cats() {
    if ( 'post' == get_post_type() ) {
        /* translators: used between list items, there is a space */
        $categories_list = get_the_category_list( esc_html__( '&nbsp;', 'primewp' ) );
        if ( $categories_list ) {
            /* translators: 1: list of categories. */
            printf( '<div class="primewp-fp04-post-categories">' . __( '<span class="screen-reader-text">Posted in </span>%1$s', 'primewp' ) . '</div>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        }
    }
}
endif;


if ( ! function_exists( 'primewp_style_4_postmeta' ) ) :
function primewp_style_4_postmeta() { ?>
    <?php if ( !(primewp_get_option('hide_post_author_home')) || !(primewp_get_option('hide_posted_date_home')) || !(primewp_get_option('hide_comments_link_home')) ) { ?>
    <div class="primewp-fp04-post-footer">
    <?php if ( !(primewp_get_option('hide_post_author_home')) ) { ?><span class="primewp-fp04-post-author primewp-fp04-post-meta"><i class="far fa-user-circle" aria-hidden="true"></i>&nbsp;<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a></span><?php } ?>
    <?php if ( !(primewp_get_option('hide_posted_date_home')) ) { ?><span class="primewp-fp04-post-date primewp-fp04-post-meta"><i class="far fa-clock" aria-hidden="true"></i>&nbsp;<?php echo get_the_date(); ?></span><?php } ?>
    <?php if ( !(primewp_get_option('hide_comments_link_home')) ) { ?><?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) { ?>
    <span class="primewp-fp04-post-comment primewp-fp04-post-meta"><i class="far fa-comments" aria-hidden="true"></i>&nbsp;<?php comments_popup_link( sprintf( wp_kses( /* translators: %s: post title */ __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'primewp' ), array( 'span' => array( 'class' => array(), ), ) ), get_the_title() ) ); ?></span>
    <?php } ?><?php } ?>
    </div>
    <?php } ?>
<?php }
endif;


if ( ! function_exists( 'primewp_style_3_cats' ) ) :
function primewp_style_3_cats() {
    if ( 'post' == get_post_type() ) {
        /* translators: used between list items, there is a space */
        $categories_list = get_the_category_list( esc_html__( '&nbsp;', 'primewp' ) );
        if ( $categories_list ) {
            /* translators: 1: list of categories. */
            printf( '<div class="primewp-fp03-post-categories">' . __( '<span class="screen-reader-text">Posted in </span>%1$s', 'primewp' ) . '</div>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        }
    }
}
endif;


if ( ! function_exists( 'primewp_style_3_postmeta' ) ) :
function primewp_style_3_postmeta() { ?>
    <?php if ( !(primewp_get_option('hide_post_author_home')) || !(primewp_get_option('hide_posted_date_home')) || !(primewp_get_option('hide_comments_link_home')) ) { ?>
    <div class="primewp-fp03-post-footer">
    <?php if ( !(primewp_get_option('hide_post_author_home')) ) { ?><span class="primewp-fp03-post-author primewp-fp03-post-meta"><i class="far fa-user-circle" aria-hidden="true"></i>&nbsp;<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a></span><?php } ?>
    <?php if ( !(primewp_get_option('hide_posted_date_home')) ) { ?><span class="primewp-fp03-post-date primewp-fp03-post-meta"><i class="far fa-clock" aria-hidden="true"></i>&nbsp;<?php echo get_the_date(); ?></span><?php } ?>
    <?php if ( !(primewp_get_option('hide_comments_link_home')) ) { ?><?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) { ?>
    <span class="primewp-fp03-post-comment primewp-fp03-post-meta"><i class="far fa-comments" aria-hidden="true"></i>&nbsp;<?php comments_popup_link( sprintf( wp_kses( /* translators: %s: post title */ __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'primewp' ), array( 'span' => array( 'class' => array(), ), ) ), get_the_title() ) ); ?></span>
    <?php } ?><?php } ?>
    </div>
    <?php } ?>
<?php }
endif;


if ( ! function_exists( 'primewp_single_cats' ) ) :
function primewp_single_cats() {
    if ( 'post' == get_post_type() ) {
        /* translators: used between list items, there is a space */
        $categories_list = get_the_category_list( esc_html__( ', ', 'primewp' ) );
        if ( $categories_list ) {
            /* translators: 1: list of categories. */
            printf( '<div class="primewp-entry-meta-single primewp-entry-meta-single-top"><span class="primewp-entry-meta-single-cats"><i class="far fa-folder-open" aria-hidden="true"></i>&nbsp;' . __( '<span class="screen-reader-text">Posted in </span>%1$s', 'primewp' ) . '</span></div>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        }
    }
}
endif;


if ( ! function_exists( 'primewp_single_postmeta' ) ) :
function primewp_single_postmeta() { ?>
    <?php global $post; ?>
    <?php if ( !(primewp_get_option('hide_post_author')) || !(primewp_get_option('hide_posted_date')) || !(primewp_get_option('hide_comments_link')) || !(primewp_get_option('hide_post_edit')) ) { ?>
    <div class="primewp-entry-meta-single">
    <?php if ( !(primewp_get_option('hide_post_author')) ) { ?><span class="primewp-entry-meta-single-author"><i class="far fa-user-circle" aria-hidden="true"></i>&nbsp;<span class="author vcard" itemscope="itemscope" itemtype="http://schema.org/Person" itemprop="author"><a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a></span></span><?php } ?>
    <?php if ( !(primewp_get_option('hide_posted_date')) ) { ?><span class="primewp-entry-meta-single-date"><i class="far fa-clock" aria-hidden="true"></i>&nbsp;<?php echo get_the_date(); ?></span><?php } ?>
    <?php if ( !(primewp_get_option('hide_comments_link')) ) { ?><?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) { ?>
    <span class="primewp-entry-meta-single-comments"><i class="far fa-comments" aria-hidden="true"></i>&nbsp;<?php comments_popup_link( sprintf( wp_kses( /* translators: %s: post title */ __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'primewp' ), array( 'span' => array( 'class' => array(), ), ) ), get_the_title() ) ); ?></span>
    <?php } ?><?php } ?>
    <?php if ( !(primewp_get_option('hide_post_edit')) ) { ?><?php edit_post_link( sprintf( wp_kses( /* translators: %s: Name of current post. Only visible to screen readers */ __( 'Edit<span class="screen-reader-text"> %s</span>', 'primewp' ), array( 'span' => array( 'class' => array(), ), ) ), get_the_title() ), '<span class="edit-link">&nbsp;&nbsp;<i class="far fa-edit" aria-hidden="true"></i> ', '</span>' ); ?><?php } ?>
    </div>
    <?php } ?>
<?php }
endif;