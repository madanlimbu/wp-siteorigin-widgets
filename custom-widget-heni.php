<?php
/*
 * Plugin Name: Customer Widget For SiteOrigin Page Builder
 * Description: Plugin for Siteorigin page builder widgets
 * Version: 0.5
 * Author: Madan
 */
//single style style file for all widgets on dev-env
// as siteorigin has to reactive widget to recompilee less file to css
function less_compile_development()
{
    wp_enqueue_style('custom-bootgrid-style', plugins_url('/style/style.css', __FILE__ ), array(), null, 'all');
}
add_action('wp_enqueue_scripts', 'less_compile_development');
//will check subfolders of this folder for PHP files. If it finds any PHP files with a metadata header containing a Widget Name field, it will list them as a widget which can be activated and used anywhere widgets may normally be used.
function add_my_custom_widget_for_site_origin($folders){
    $folders[] = plugin_dir_path(__FILE__).'widgets/';
    return $folders;
}
add_filter('siteorigin_widgets_widget_folders',  'add_my_custom_widget_for_site_origin');




/*** Ajax aaction initalised only once for widget-archive-page-load-all ***/
try{
    add_action('wp_ajax_ajax_pagination_widget', 'ajax_pagination_widget');
    add_action('wp_ajax_nopriv_ajax_pagination_widget', 'ajax_pagination_widget');

    function ajax_pagination_widget(){
        $query_offset = stripslashes($_POST['offset']);
        $query_total = stripslashes($_POST['total']);
        $query_post_type = stripslashes($_POST['post_type']);
        $query_orderby = stripslashes($_POST['orderby']);
        $query_order = stripslashes($_POST['order']);
        $query_sub_title = stripslashes($_POST['sub_title']);

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
                $temp_array['post_url'] = get_permalink($post->ID);
                $temp_array['sub_title'] = $query_sub_title;
                array_push($json_reply, $temp_array);
            }
        endif;
        wp_send_json(array('posts' => $json_reply));
        die();
    }
}catch (Exception $e){

}