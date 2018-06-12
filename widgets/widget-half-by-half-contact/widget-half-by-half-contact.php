<?php
/*
 * Widget Name: Half By Half Contact
 * Description: Widget to create full page image
 * Version: 0.2
 * Author: Madan
 */
class Widget_Half_By_Half_Contact extends SiteOrigin_Widget{
    function __construct() {
        $form_options = array(
            'title' => array(
                'type' => 'text',
                'label' => __('Title', 'widget-form-fields-text-domain')
            ),
            'header_id' => array(
                'type' => 'text',
                'label' => __('If Minus Element Length Put Element ID', 'widget-form-fields-text-domain'),
                'default' => 'masthead'
            ),
            'left_section' => array(
                'type' => 'section',
                'label' => __( 'Left Contact Details' , 'widget-form-fields-text-domain' ),
                'hide' => true,
                'fields' => array(
             /*       'image' => array(
                        'type' => 'media',
                        'label' => __( 'Choose a Image Icon', 'widget-form-fields-text-domain' ),
                        'choose' => __( 'Choose image', 'widget-form-fields-text-domain' ),
                        'update' => __( 'Set image', 'widget-orm-fields-text-domain' ),
                        'library' => 'image',//'image', 'audio', 'video', 'file'
                        'fallback' => true
                    ),
             */
                    'phone_number' => array(
                        'type' => 'text',
                        'label' => __('Phone Number ', 'widget-form-fields-text-domain')
                    ),
                    'email' => array(
                        'type' => 'text',
                        'label' => __('Email ', 'widget-form-fields-text-domain')
                    )
                )
            ),
            'right_section' => array(
                'type' => 'section',
                'label' => __( 'Right Contact Details' , 'widget-form-fields-text-domain' ),
                'hide' => true,
                'fields' => array(
             /*       'image' => array(
                        'type' => 'media',
                        'label' => __( 'Choose a Image Icon', 'widget-form-fields-text-domain' ),
                        'choose' => __( 'Choose image', 'widget-form-fields-text-domain' ),
                        'update' => __( 'Set image', 'widget-orm-fields-text-domain' ),
                        'library' => 'image',//'image', 'audio', 'video', 'file'
                        'fallback' => true
                    ),
             */
                    'address' => array(
                        'type' => 'tinymce',
                        'label' => __('Address', 'widget-form-fields-text-domain'),
                        'default_editor' => 'tinymce'
                    ),
                    'google_map_url' => array(
                        'type' => 'text',
                        'label' => __('Google Map URL ', 'widget-form-fields-text-domain')
                    )
                )
            ),
            'instagram_url' => array(
                'type' => 'text',
                'label' => __('Instagram URL', 'widget-form-fields-text-domain')
            ),
            'twitter_url' => array(
                'type' => 'text',
                'label' => __('Twitter URL', 'widget-form-fields-text-domain')
            )
        );

        parent::__construct(
            'half-by-half-contact-widget',
            __('Half By Half Contact Page Widget', 'widget-form-fields-text-domain'),
            array(
                'description' => __('Half By Half Contact Page', 'widget-form-fields-text-domain'),
            ),
            array(),
            $form_options,
            plugin_dir_path(__FILE__)
        );
    }

    function get_template_name($instance) {
        return 'half-by-half-contact-template';
    }
    function get_template_dir($instance) {
        return 'half-by-half-contact-templates';
    }
}
siteorigin_widget_register('half-by-half-contact-widget', __FILE__, 'Widget_Half_By_Half_Contact');