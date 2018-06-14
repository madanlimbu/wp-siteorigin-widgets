<?php
/*
 * Widget Name: Widget Archive Page Load All
 * Description: Widget to create full page image Load All
 * Version: 0.2
 * Author: Madan
 */
class Widget_Archive_Page_Load_All extends SiteOrigin_Widget{
    function __construct() {
        $form_options = array(
            'post_type' => array(
                'type' => 'text',
                'label' => __('Post Type ', 'widget-form-fields-text-domain'),
                'default' => 'post'
            ),
            'total' => array(
                'type' => 'text',
                'label' => __('Post Per Page (Initial)', 'widget-form-fields-text-domain'),
                'default' => '4'
            ),
            'offset' => array(
                'type' => 'text',
                'label' => __('Number of Post to load on each Load More', 'widget-form-fields-text-domain'),
                'default' => '4'
            ),
            'orderby' => array(
                'type' => 'text',
                'label' => __('How To Order Post eg. date', 'widget-form-fields-text-domain'),
                'default' => 'date'
            ),
            'order' => array(
                'type' => 'text',
                'label' => __('Order Post (DESC or ASC)', 'widget-form-fields-text-domain'),
                'default' => 'DESC'
            ),
            'post_sub_title' => array(
                'type' => 'text',
                'label' => __('Post sub-title to display', 'widget-form-fields-text-domain')
            )
        );







        parent::__construct(
            'archive-page-load-all-widget',
            __('Show Archive page from a posts in the widget Load all', 'widget-form-fields-text-domain'),
            array(
                'description' => __('Show Archive Page from a post Load all', 'widget-form-fields-text-domain'),
            ),
            array(),
            $form_options,
            plugin_dir_path(__FILE__)
        );
    }

    function get_template_name($instance) {
        return 'archive-page-load-all-template';
    }
    function get_template_dir($instance) {
        return 'archive-page-load-all-templates';
    }
}
siteorigin_widget_register('archive-page-load-all-widget', __FILE__, 'Widget_Archive_Page_Load_All');