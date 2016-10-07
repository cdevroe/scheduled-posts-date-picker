<?php
/**
 * @package Scheduled Posts Date Picker
 */
/*
Plugin Name: Scheduled Posts Date Picker
Plugin URI: http://cdevroe.com/wp-spdp
Description: Replaces the default scheduled post date picker with an easier to understand one.
Version: 0.2.1
Author: Colin Devroe
Author URI: http://cdevroe.com
License: GPLv2 or later
Text Domain: scheduled-posts-date-picker
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/
function cdevroe_add_scheduled_posts_date_picker() {
  global $pagenow;
  if ( is_admin() && ($pagenow == 'post-new.php' || $pagenow == 'post.php') ) : // Only load these scripts on the post editor
    wp_register_style( 'scheduled_post_date_picker_css', plugins_url() . '/scheduled-posts-date-picker/datepicker/css/datepicker.css', false, '1.0.0' );
    wp_register_style( 'scheduled_post_date_picker_custom_css', plugins_url() . '/scheduled-posts-date-picker/scheduled-posts-date-picker.css', array('scheduled_post_date_picker_css'), '0.2.0' );
    wp_enqueue_style( 'scheduled_post_date_picker_css' );
    wp_enqueue_style( 'scheduled_post_date_picker_custom_css' );

    wp_enqueue_script( 'scheduled_post_date_picker_js', plugins_url() . '/scheduled-posts-date-picker/datepicker/js/datepicker.js', array('jquery') );
    wp_enqueue_script( 'scheduled_post_date_picker_eye_js', plugins_url() . '/scheduled-posts-date-picker/datepicker/js/eye.js', array('scheduled_post_date_picker_js') );
    wp_enqueue_script( 'scheduled_post_date_picker_utils_js', plugins_url() . '/scheduled-posts-date-picker/datepicker/js/utils.js', array('scheduled_post_date_picker_js') );
    wp_enqueue_script( 'scheduled_post_date_picker_layout_js', plugins_url() . '/scheduled-posts-date-picker/datepicker/js/layout.js', array('scheduled_post_date_picker_js') );

    // Pretty much the Plugin
    wp_enqueue_script( 'scheduled_post_date_picker_plugin_js', plugins_url() . '/scheduled-posts-date-picker/scheduled-posts-date-picker.js', array('scheduled_post_date_picker_layout_js'), '0.2.1' );
  endif;
}
add_action( 'admin_enqueue_scripts', 'cdevroe_add_scheduled_posts_date_picker' );
