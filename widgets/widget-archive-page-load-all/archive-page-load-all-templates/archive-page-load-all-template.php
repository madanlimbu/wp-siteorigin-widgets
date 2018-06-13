<div class="archive-page-load-all-widget">
    <?php
    $order = $instance['order'];
    $orderby = $instance['orderby'];
    $post_type = $instance['post_type'];
    $total = $instance['total']; //how many page to get on every ajax;
    $offset = $instance['offset']; //how many page to skip , always increment as the number of page loaded increases in front end;


    $query = array(
        'post_type' => $post_type,
        'post_status' => 'publish',
        'orderby' => $orderby,
        'order' => $order,
        'posts_per_page' => $total
    );

    $query_result = new WP_Query($query);

    if($query_result->have_posts()) :
        ?>
    <div class="archive-page-load-all show-posts-widget widget-seperator">
    <div class="container">
        <div class="row archive-page-load-all-widget-posts">
            <?php while($query_result->have_posts()) : $query_result->the_post(); ?>

            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="show-posts-container">
                    <?php
                    if( has_post_thumbnail() ) : ?>
                        <div class="thumbnails-container">
                            <a href="<?php the_permalink() ?>">
                                <?php the_post_thumbnail()?>
                            </a>
                        </div><!-- .thumbnails-container -->
                    <?php endif; ?>
                    <div class="absolute-text-container">
                        <div class="text-container">
                            <h5><?php if(has_excerpt()) : echo get_the_excerpt(); endif; ?></h5>
                            <h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
                            <div class="text">
                            <p><?php if(has_excerpt()) : echo get_the_excerpt(); endif; ?></p>
                            </div>
                        </div><!-- .absolute-text-container -->
                    </div><!-- .text-container -->
                </div>
            </div>
            <?php endwhile; ?>
        </div>
            <div class="row button-row">
             <div class="col-lg-12">
                    <div class="cta">
                        <span id="load-more-archive-widget" class="cta-button"
                           href="#"
                           data-total="<?php echo $total; ?>"
                           data-offset="<?php echo $offset; ?>"
                           data-post_type="<?php echo $post_type; ?>"
                           data-order="<?php echo $order; ?>"
                           data-orderby="<?php echo $orderby; ?>"

                        >Load More</span>
                    </div>
             </div><!-- .button-row -->
        </div>
    </div>
    </div>
    <?php
    endif;
    wp_reset_postdata();
    ?>
</div>






<script>
    jQuery(document).ready(function($){
        (function(){
            var widget_archive_page_load_all = function (element_id) {
                var ajax_url = '/wp-admin/admin-ajax.php';
                var load_more = $(element_id);
                var post_type = load_more.data('post_type');
                var order = load_more.data('order');
                var orderby = load_more.data('orderby');
                var total = function(){ return load_more.data('total'); }
                var offset = function(){ return load_more.data('offset'); }
                var sendToServer = function(data){
                    $.post(ajax_url, data, function (response) {
                        console.log('respond from server');
                        load_more.data('total', total() + offset());
                        load_new_posts(response);
                    })
                }

                var load_new_posts = function(response){
                    console.log(response.posts);
                    if(response.posts.length > 0){
                        $.each(response.posts, function (key, value) {
                            // noinspection JSAnnotator
                            $('.archive-page-load-all-widget-posts').append(`
                                <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="show-posts-container">
                        <div class="thumbnails-container">
                            <a href="#">` +
                                value.image
                                    + `
                            </a>
                        </div>
                                <div class="absolute-text-container">
                                <div class="text-container">
                                <h5>`+value.post_excerpt+`</h5>
                                <h3><a href="`+`">`+value.title+`</a></h3>
                                </div>
                                </div>
                                </div>

                                </div>
                                `);
                        });
                        if(response.posts.length<offset()) {
                            load_more.css('display', 'none');
                        }
                    }else{
                         load_more.css('display', 'none');
                    }
                }


                load_more.on('click', function (e) {
                    console.log('flight begun');
                    var data ={
                        'action': 'ajax_pagination_widget',
                        'total': offset(),
                        'offset': total(),
                        'post_type': post_type,
                        'orderby': orderby,
                        'order': order
                    }
                    sendToServer(data);
                })
            };

            widget_archive_page_load_all('#load-more-archive-widget');
        })();
        });
</script>


