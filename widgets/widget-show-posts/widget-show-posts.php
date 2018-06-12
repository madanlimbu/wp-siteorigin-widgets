<?php
/*
 * Widget Name: Widget Show Posts
 * Description: Widget to create full page image
 * Version: 0.2
 * Author: Madan
 */
class Widget_Show_Posts extends SiteOrigin_Widget{
    function __construct() {
        $form_options = array(
            'title' => array(
                'type' => 'text',
                'label' => __('Title in this widget block', 'widget-form-fields-text-domain')
            ),
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
            'show-posts-widget',
            __('Show posts in the widget', 'widget-form-fields-text-domain'),
            array(
                'description' => __('Show posts in the widgets', 'widget-form-fields-text-domain'),
            ),
            array(),
            $form_options,
            plugin_dir_path(__FILE__)
        );
    }

    function get_template_name($instance) {
        return 'show-posts-template';
    }
    function get_template_dir($instance) {
        return 'show-posts-templates';
    }
}
siteorigin_widget_register('show-posts-widget', __FILE__, 'Widget_Show_Posts');