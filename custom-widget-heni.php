<?php
/*
 * Plugin Name: Customer Widget For SiteOrigin Page Builder
 * Description: Plugin for Siteorigin page builder widgets
 * Version: 0.5
 * Author: Madan
 */
//single style style file for all widgets on dev-env
// as siteorigin has to reactive widget to recompilee less file to css
function less_compile_development()
{
    wp_enqueue_style('custom-bootgrid-style', plugins_url('/style/style.css', __FILE__ ), array(), null, 'all');
}
add_action('wp_enqueue_scripts', 'less_compile_development');
//will check subfolders of this folder for PHP files. If it finds any PHP files with a metadata header containing a Widget Name field, it will list them as a widget which can be activated and used anywhere widgets may normally be used.
function add_my_custom_widget_for_site_origin($folders){
    $folders[] = plugin_dir_path(__FILE__).'widgets/';
    return $folders;
}
add_filter('siteorigin_widgets_widget_folders',  'add_my_custom_widget_for_site_origin');