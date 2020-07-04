<?php
/**
* The template for displaying comments
*
* This is the template that displays the area of the page that contains both the current comments
* and the comment form.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package PrimeWP WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area primewp-box">
<div class="primewp-box-inside">

    <?php
    // You can start editing here -- including this comment!
    if ( have_comments() ) : ?>
        <h2 class="comments-title">
            <?php
            $primewp_comment_count = get_comments_number();
            if ( 1 === $primewp_comment_count ) {
                printf(
                    /* translators: 1: title. */
                    esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'primewp' ),
                    '<span>' . get_the_title() . '</span>' /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */
                );
            } else {
                printf(
                    /* translators: 1: comment count number, 2: title. */
                    esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $primewp_comment_count, 'comments title', 'primewp' ) ),
                    number_format_i18n( $primewp_comment_count ), /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */
                    '<span>' . get_the_title() . '</span>' /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */
                );
            }
            ?>
        </h2><!-- .comments-title -->

        <?php the_comments_navigation(); ?>

        <ol class="comment-list">
            <?php
                wp_list_comments( array(
                    'style'      => 'ol',
                    'short_ping' => true,
                ) );
            ?>
        </ol><!-- .comment-list -->

        <?php the_comments_navigation();

        // If comments are closed and there are comments, let's leave a little note, shall we?
        if ( ! comments_open() ) : ?>
            <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'primewp' ); ?></p>
        <?php
        endif;

    endif; // Check for have_comments().

    comment_form();
    ?>

</div>
</div><!-- #comments -->