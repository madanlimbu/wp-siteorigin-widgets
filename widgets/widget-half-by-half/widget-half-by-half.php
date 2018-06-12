<?php
/*
 * Widget Name: Half By Half
 * Description: Widget to create full page image
 * Version: 0.2
 * Author: Madan
 */
class Widget_Half_By_Half extends SiteOrigin_Widget{
    function __construct() {
        $form_options = array(
            'some_media' => array(
                'type' => 'media',
                'label' => __( 'Choose a Image for Right Side', 'widget-form-fields-text-domain' ),
                'choose' => __( 'Choose image', 'widget-form-fields-text-domain' ),
                'update' => __( 'Set image', 'widget-orm-fields-text-domain' ),
                'library' => 'image',//'image', 'audio', 'video', 'file'
                'fallback' => true
            ),
            'a_section' => array(
                'type' => 'section',
                'label' => __( 'Left side of col ' , 'widget-form-fields-text-domain' ),
                'hide' => true,
                'fields' => array(
                    'title' => array(
                        'type' => 'text',
                        'label' => __('Title', 'widget-form-fields-text-domain')
                    ),
                    'long_texts' => array(
                        'type' => 'tinymce',
                        'label' => __( 'Visually edit, richly.', 'widget-form-fields-text-domain' ),
                        'default' => '',
                        'rows' => 10,
                        'default_editor' => 'tinymce'
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
            'half-by-half-widget',
            __('Col 6 by 6 Text and Image', 'widget-form-fields-text-domain'),
            array(
                'description' => __('col 6 by 6 on a row with image and text.', 'widget-form-fields-text-domain'),
            ),
            array(),
            $form_options,
            plugin_dir_path(__FILE__)
        );
    }

    function get_template_name($instance) {
        return 'half-by-half-template';
    }
    function get_template_dir($instance) {
        return 'half-by-half-templates';
    }
}
siteorigin_widget_register('half-by-half-widget', __FILE__, 'Widget_Half_By_Half');