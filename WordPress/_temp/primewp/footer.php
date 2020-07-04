<?php
/**
* The template for displaying the footer
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package PrimeWP WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/
?>

</div>

</div><!--/#primewp-content-wrapper -->
</div><!--/#primewp-wrapper -->

<?php primewp_before_footer(); ?>

<?php if ( !(primewp_get_option('hide_footer_widgets')) ) { ?>
<?php if ( is_active_sidebar( 'primewp-footer-1' ) || is_active_sidebar( 'primewp-footer-2' ) || is_active_sidebar( 'primewp-footer-3' ) || is_active_sidebar( 'primewp-footer-4' ) || is_active_sidebar( 'primewp-footer-5' ) || is_active_sidebar( 'primewp-top-footer' ) || is_active_sidebar( 'primewp-bottom-footer' ) ) : ?>
<div class='clearfix' id='primewp-footer-blocks' itemscope='itemscope' itemtype='http://schema.org/WPFooter' role='contentinfo'>
<div class='primewp-container clearfix'>
<div class="primewp-outer-wrapper">

<?php if ( is_active_sidebar( 'primewp-top-footer' ) ) : ?>
<div class='clearfix'>
<div class='primewp-top-footer-block'>
<?php dynamic_sidebar( 'primewp-top-footer' ); ?>
</div>
</div>
<?php endif; ?>

<?php if ( is_active_sidebar( 'primewp-footer-1' ) || is_active_sidebar( 'primewp-footer-2' ) || is_active_sidebar( 'primewp-footer-3' ) || is_active_sidebar( 'primewp-footer-4' ) || is_active_sidebar( 'primewp-footer-5' ) ) : ?>
<div class='primewp-footer-block-cols clearfix'>

<div class="primewp-footer-block-col <?php echo esc_attr( primewp_footer_grid_cols() ); ?>" id="primewp-footer-block-1">
<?php dynamic_sidebar( 'primewp-footer-1' ); ?>
</div>

<div class="primewp-footer-block-col <?php echo esc_attr( primewp_footer_grid_cols() ); ?>" id="primewp-footer-block-2">
<?php dynamic_sidebar( 'primewp-footer-2' ); ?>
</div>

<div class="primewp-footer-block-col <?php echo esc_attr( primewp_footer_grid_cols() ); ?>" id="primewp-footer-block-3">
<?php dynamic_sidebar( 'primewp-footer-3' ); ?>
</div>

<div class="primewp-footer-block-col <?php echo esc_attr( primewp_footer_grid_cols() ); ?>" id="primewp-footer-block-4">
<?php dynamic_sidebar( 'primewp-footer-4' ); ?>
</div>

<div class="primewp-footer-block-col <?php echo esc_attr( primewp_footer_grid_cols() ); ?>" id="primewp-footer-block-5">
<?php dynamic_sidebar( 'primewp-footer-5' ); ?>
</div>

</div>
<?php endif; ?>

<?php if ( is_active_sidebar( 'primewp-bottom-footer' ) ) : ?>
<div class='clearfix'>
<div class='primewp-bottom-footer-block'>
<?php dynamic_sidebar( 'primewp-bottom-footer' ); ?>
</div>
</div>
<?php endif; ?>

</div>
</div>
</div><!--/#primewp-footer-blocks-->
<?php endif; ?>
<?php } ?>


<div class='clearfix' id='primewp-footer'>
<div class='primewp-foot-wrap primewp-container'>
<div class="primewp-outer-wrapper">

<?php if ( primewp_get_option('footer_text') ) : ?>
  <p class='primewp-copyright'><?php echo esc_html(primewp_get_option('footer_text')); ?></p>
<?php else : ?>
  <p class='primewp-copyright'><?php /* translators: %s: Year and site name. */ printf( esc_html__( 'Copyright &copy; %s', 'primewp' ), esc_html(date_i18n(__('Y','primewp'))) . ' ' . esc_html(get_bloginfo( 'name' ))  ); ?></p>
<?php endif; ?>
<p class='primewp-credit'><a href="<?php echo esc_url( 'https://themesdna.com/' ); ?>"><?php /* translators: %s: Theme author. */ printf( esc_html__( 'Design by %s', 'primewp' ), 'ThemesDNA.com' ); ?></a></p>

</div>
</div>
</div><!--/#primewp-footer -->

<?php primewp_after_footer(); ?>

<button class="primewp-scroll-top" title="<?php esc_attr_e('Scroll to Top','primewp'); ?>"><i class="fas fa-arrow-up" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e('Scroll to Top', 'primewp'); ?></span></button>

<?php wp_footer(); ?>
</body>
</html>