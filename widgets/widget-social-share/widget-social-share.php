<?php
/*
 * Widget Name: Social Share
 * Description: Widget to create social share links
 * Version: 0.2
 * Author: Madan
 */
class Widget_Social_Share extends SiteOrigin_Widget{
    function __construct() {
        $form_options = array(
            'ordering' => array(
                'type' => 'order',
                'label' => __( 'Element Order', 'widget-form-fields-text-domain' ),
                'options' => array(
                    'linkedin' => __( 'Linkedin', 'widget-form-fields-text-domain' ),
                    'printer' => __( 'Print Page', 'widget-form-fields-text-domain' ),
                    'mailto' => __( 'Mail To with subject and body', 'widget-form-fields-text-domain' ),
                    'stop' => __( 'Stop any remaining links/buttons from displaying', 'widget-form-fields-text-domain' ),
                ),
                'default' => array( 'linkedin', 'printer', 'mailto', 'stop' ),
            ),
            'mailto_subject' => array(
                'type' => 'text',
                'label' => __('Set Mail To Subject (defaults = Title of post)', 'widget-form-fields-text-domain'),
            ),
            'mailto_body' => array(
                'type' => 'text',
                'label' => __('Set Mail To Body (defaults = "Check Out This Link and URL of Post")', 'widget-form-fields-text-domain'),
            ),
        );

        parent::__construct(
            'social-share-widget',
            __('Social Share Widget', 'widget-form-fields-text-domain'),
            array(
                'description' => __('Share widget for Social links', 'widget-form-fields-text-domain'),
            ),
            array(),
            $form_options,
            plugin_dir_path(__FILE__)
        );
    }

    function get_template_name($instance) {
        return 'social-share-template';
    }
    function get_template_dir($instance) {
        return 'social-share-templates';
    }
}
siteorigin_widget_register('social-share-widget', __FILE__, 'Widget_Social_Share');