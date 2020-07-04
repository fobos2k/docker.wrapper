<?php
/**
* The file for displaying the search form
*
* @package PrimeWP WordPress Theme
* @copyright Copyright (C) 2020 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/
?>

<form role="search" method="get" class="primewp-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
<label>
    <span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'primewp' ); ?></span>
    <input type="search" class="primewp-search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'primewp' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
</label>
<input type="submit" class="primewp-search-submit" value="&#xf002;" />
</form>