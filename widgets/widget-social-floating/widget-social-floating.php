<?php
/*
 * Widget Name: Social Floating
 * Description: Widget to create full page image
 * Version: 0.2
 * Author: Madan
 */
class Widget_Social_Floating extends SiteOrigin_Widget{
    function __construct() {
        $form_options = array(
            'position' => array(
                'type' => 'text',
                'label' => __('Socail Link Position in Screen (Left or Right)', 'widget-form-fields-text-domain'),
                'default' => 'right'
            ),
            'background_color' => array(
              'type' => 'text',
              'label' => __('Background color of social linke (eg. black, transparent, pink)', 'widget-form-fields-text-domain'),
                'default' => 'black'
            ),
            'social_links' => array(
                'type' => 'repeater',
                'label' => __( 'Add Social Links and Image Icons' , 'widget-form-fields-text-domain' ),
                'item_name'  => __( 'Social Bars', 'siteorigin-widgets' ),
                'fields' => array(
                    'social_url' => array(
                        'type' => 'text',
                        'label' => __( 'A text field in a repeater item.', 'widget-form-fields-text-domain' )
                    ),
                    'social_icon' => array(
                        'type' => 'media',
                        'label' => __( 'Social Icons', 'widget-form-fields-text-domain' ),
                        'choose' => __( 'Choose image', 'widget-form-fields-text-domain' ),
                        'update' => __( 'Set image', 'widget-orm-fields-text-domain' ),
                        'library' => 'image',
                        'fallback' => true
                    )
                )
            )
        );

        parent::__construct(
            'social-floating-widget',
            __('Social Floating Widget', 'widget-form-fields-text-domain'),
            array(
                'description' => __('Floating widget for Social links', 'widget-form-fields-text-domain'),
            ),
            array(),
            $form_options,
            plugin_dir_path(__FILE__)
        );
    }

    function get_template_name($instance) {
        return 'social-floating-template';
    }
    function get_template_dir($instance) {
        return 'social-floating-templates';
    }
}
siteorigin_widget_register('social-floating-widget', __FILE__, 'Widget_Social_Floating');