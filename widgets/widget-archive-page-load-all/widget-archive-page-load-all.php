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


        add_action('wp_ajax_ajax_pagination_widget', 'ajax_pagination_widget');
        add_action('wp_ajax_nopriv_ajax_pagination_widget', 'ajax_pagination_widget');

        function ajax_pagination_widget(){
            $query_offset = stripslashes($_POST['offset']);
            $query_total = stripslashes($_POST['total']);
            $query_post_type = stripslashes($_POST['post_type']);
            $query_orderby = stripslashes($_POST['orderby']);
            $query_order = stripslashes($_POST['order']);

            $query = array(
                'post_type' => $query_post_type,
                'post_status' => 'publish',
                'orderby' => $query_orderby,
                'order' => $query_order,
                'posts_per_page' => $query_total,
                'offset' => $query_offset
            );

            $query_result = new WP_Query($query);
            $json_reply = array();
                 if($query_result->have_posts()) :
                     foreach ($query_result->get_posts() as $post) {
                         $temp_array = array();
                         $temp_array['id'] = $post->ID;
                         if(has_post_thumbnail($post->ID)) :
                                $temp_array['image'] = get_the_post_thumbnail($post->ID);
                                $temp_array['image_url'] = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID))[0];
                          endif;
                          $temp_array['title'] = $post->post_title;
                          $temp_array['post_excerpt'] = $post->post_excerpt;
                         array_push($json_reply, $temp_array);
                     }
                endif;
            wp_send_json(array('posts' => $json_reply));
            die();
        }


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