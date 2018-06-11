<?php
/*
 * Widget Name: Title And Text
 * Description: Widget to create full page image
 * Version: 0.2
 * Author: Madan
 */
class Widget_Title_And_Text extends SiteOrigin_Widget{
    function __construct() {
        $form_options = array(
            'title' => array(
                'type' => 'text',
                'label' => __( 'Title Text', 'widget-form-fields-text-domain' )
            ),
            'title_underline_color' => array(
                'type' => 'color',
                'label' => __( 'Choose a color for title underline', 'widget-form-fields-text-domain' ),
                'default' => '#cf102d'
            ),
            'long_texts' => array(
                'type' => 'tinymce',
                'label' => __( 'Visually edit, richly.', 'widget-form-fields-text-domain' ),
                'default' => '',
                'rows' => 10,
                'default_editor' => 'tinymce'
            )
        );

        parent::__construct(
            'title-and-text-widget',
            __('Title And Text', 'widget-form-fields-text-domain'),
            array(
                'description' => __('Title and Text in Centre with Underline', 'widget-form-fields-text-domain'),
            ),
            array(),
            $form_options,
            plugin_dir_path(__FILE__)
        );
    }

    function get_template_name($instance) {
        return 'title-and-text-template';
    }
    function get_template_dir($instance) {
        return 'title-and-text-templates';
    }
}
siteorigin_widget_register('title-and-text-widget', __FILE__, 'Widget_Title_And_Text');