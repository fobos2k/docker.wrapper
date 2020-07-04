<?php
/**
* The template for displaying all single posts.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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

<?php while (have_posts()) : the_post();

    get_template_part( 'template-parts/content', 'single' );

    primewp_post_navigation();

    primewp_post_bottom_widgets();

    // If comments are open or we have at least one comment, load up the comment template
    if ( comments_open() || get_comments_number() ) :
            comments_template();
    endif;

endwhile; ?>

<div class="clear"></div>
</div><!--/#primewp-posts-wrapper -->

<?php primewp_after_main_content(); ?>

</div>
</div>
</div><!-- /#primewp-main-wrapper -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>