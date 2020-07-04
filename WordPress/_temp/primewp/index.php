<?php
/**
* The main template file.
*
* This is the most generic template file in a WordPress theme
* and one of the two required files for a theme (the other being style.css).
* It is used to display a page when nothing more specific matches a query.
* E.g., it puts together the home page when no home.php file exists.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package PrimeWP WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

get_header(); ?>

<div class="primewp-main-wrapper clearfix" id="primewp-main-wrapper" itemscope="itemscope" itemtype="http://schema.org/Blog" role="main">
<div class="theiaStickySidebar">
<div class="primewp-main-wrapper-inside clearfix">

<?php primewp_before_main_content(); ?>

<div class="primewp-posts-wrapper" id="primewp-posts-wrapper">
<div class="primewp-posts primewp-box">
<div class="primewp-box-inside">

<?php if ( !(primewp_get_option('hide_posts_heading')) ) { ?>
<?php if(is_home() && !is_paged()) { ?>
<?php if ( primewp_get_option('posts_heading') ) : ?>
<div class="primewp-posts-header"><h2 class="primewp-posts-heading"><span><?php echo esc_html( primewp_get_option('posts_heading') ); ?></span></h2></div>
<?php else : ?>
<div class="primewp-posts-header"><h2 class="primewp-posts-heading"><span><?php esc_html_e( 'Recent Posts', 'primewp' ); ?></span></h2></div>
<?php endif; ?>
<?php } ?>
<?php } ?>

<div class="primewp-posts-content">

<?php if (have_posts()) : ?>

    <div class="primewp-posts-container">
    <?php $primewp_total_posts = $wp_query->post_count; ?>
    <?php $primewp_post_counter=1; while (have_posts()) : the_post(); ?>

        <?php get_template_part( 'template-parts/content', primewp_post_style() ); ?>

    <?php $primewp_post_counter++; endwhile; ?>
    </div>
    <div class="clear"></div>

    <?php primewp_posts_navigation(); ?>

<?php else : ?>

  <?php get_template_part( 'template-parts/content', 'none' ); ?>

<?php endif; ?>

</div>

</div>
</div>
</div><!--/#primewp-posts-wrapper -->

<?php primewp_after_main_content(); ?>

</div>
</div>
</div><!-- /#primewp-main-wrapper -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>