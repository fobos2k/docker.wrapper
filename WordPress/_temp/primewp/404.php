<?php
/**
* The template for displaying 404 pages (not found).
*
* @link https://codex.wordpress.org/Creating_an_Error_404_Page
*
* @package PrimeWP WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

get_header(); ?>

<div class='primewp-main-wrapper clearfix' id='primewp-main-wrapper' itemscope='itemscope' itemtype='http://schema.org/Blog' role='main'>
<div class='theiaStickySidebar'>
<div class="primewp-main-wrapper-inside clearfix">

<div class='primewp-posts-wrapper' id='primewp-posts-wrapper'>

<div class='primewp-posts primewp-box'>
<div class="primewp-box-inside">

<div class="primewp-page-header-outside">
<header class="primewp-page-header">
<div class="primewp-page-header-inside">
    <h1 class="page-title"><?php esc_html_e( 'Oops! That page can not be found.', 'primewp' ); ?></h1>
</div>
</header><!-- .primewp-page-header -->
</div>

<div class='primewp-posts-content'>

    <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'primewp' ); ?></p>

    <?php get_search_form(); ?>

    <?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

    <div>
        <h2><?php esc_html_e( 'Most Used Categories', 'primewp' ); ?></h2>
        <ul>
        <?php
                wp_list_categories( array(
                        'orderby'    => 'count',
                        'order'      => 'DESC',
                        'show_count' => 1,
                        'title_li'   => '',
                        'number'     => 10,
                ) );
        ?>
        </ul>
    </div>

    <?php
        /* translators: %1$s: smiley */
        $primewp_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'primewp' ), convert_smilies( ':)' ) ) . '</p>';
        the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$primewp_archive_content" );
    ?>

    <?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>

</div>

</div>
</div>

</div><!--/#primewp-posts-wrapper -->

</div>
</div>
</div><!-- /#primewp-main-wrapper -->

<?php get_footer(); ?>