<?php
/*
 * Widget Name: Widget Archive Page
 * Description: Widget to create full page image
 * Version: 0.2
 * Author: Madan
 */
class Widget_Archive_Page extends SiteOrigin_Widget{
    function __construct() {
        $form_options = array(
            'posts' => array(
                'type' => 'posts',
                'label' => __('Show some of the posts from the posts type', 'widget-form-fields-text-domain'),
            ),
            'button' => array(
                'type' => 'section',
                'label' => __( 'Button At bottom' , 'widget-form-fields-text-domain' ),
                'hide' => true,
                'fields' => array(
                    'button_text' => array(
                        'type' => 'text',
                        'label' => __('Button Text ', 'widget-form-fields-text-domain')
                    ),
                    'button_url' => array(
                        'type' => 'text',
                        'label' => __('Button URL ', 'widget-form-fields-text-domain')
                    )
                )
            )
        );

        parent::__construct(
            'archive-page-widget',
            __('Show Archive page from a posts in the widget', 'widget-form-fields-text-domain'),
            array(
                'description' => __('Show Archive Page from a post', 'widget-form-fields-text-domain'),
            ),
            array(),
            $form_options,
            plugin_dir_path(__FILE__)
        );
    }

    function get_template_name($instance) {
        return 'archive-page-template';
    }
    function get_template_dir($instance) {
        return 'archive-page-templates';
    }
}
siteorigin_widget_register('archive-page-widget', __FILE__, 'Widget_Archive_Page');