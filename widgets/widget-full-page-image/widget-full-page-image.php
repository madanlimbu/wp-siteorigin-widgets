<?php
/*
 * Widget Name: Full Page Image
 * Description: Widget to create full page image
 * Version: 0.2
 * Author: Madan
 */
class Widget_Full_Page_Image extends SiteOrigin_Widget{
    function __construct() {
        $form_options = array(
            'some_media' => array(
                'type' => 'media',
                'label' => __( 'Choose a Image for Full Page Background', 'widget-form-fields-text-domain' ),
                'choose' => __( 'Choose image', 'widget-form-fields-text-domain' ),
                'update' => __( 'Set image', 'widget-orm-fields-text-domain' ),
                'library' => 'image',//'image', 'audio', 'video', 'file'
                'fallback' => true
            ),
            'header_id' => array(
                'type' => 'text',
                'label' => __('If Minus Element Length Put Element ID', 'widget-form-fields-text-domain'),
                'default' => 'masthead'
            ),
            'a_section' => array(
                'type' => 'section',
                'label' => __( 'Centre Title and button ' , 'widget-form-fields-text-domain' ),
                'hide' => true,
                'fields' => array(
                    'title' => array(
                        'type' => 'text',
                        'label' => __('Title', 'widget-form-fields-text-domain')
                    ),
                    'button_text' => array(
                        'type' => 'text',
                        'label' => __( 'Button Text', 'widget-form-fields-text-domain' )
                    ),
                    'button_url' => array(
                        'type' => 'link',
                        'label' => __( 'Destination URL', 'widget-form-fields-text-domain' )
                    ),
                    'button_color' => array(
                        'type' => 'color',
                        'label' => __( 'Choose a color for button', 'widget-form-fields-text-domain' ),
                        'default' => '#cf102d'
                    ),
                )
            )
        );

        parent::__construct(
            'full-page-image-widget',
            __('Full Page Background Image Widget', 'widget-form-fields-text-domain'),
            array(
                'description' => __('full page background image.', 'widget-form-fields-text-domain'),
            ),
            array(),
            $form_options,
            plugin_dir_path(__FILE__)
        );
    }

    function get_template_name($instance) {
        return 'full-page-image-template';
    }
    function get_template_dir($instance) {
        return 'full-page-image-templates';
    }
}
siteorigin_widget_register('full-page-image-widget', __FILE__, 'Widget_Full_Page_Image');