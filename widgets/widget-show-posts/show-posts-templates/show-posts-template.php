<?php
    $post_selector_pseudo_query = $instance['posts'];
    $processed_query = siteorigin_widget_post_selector_process_query($post_selector_pseudo_query);
    $query_result = new WP_Query($processed_query);

    if($query_result->have_posts()) :
?>

<div class="show-posts-widget">
    <div class="container">
            <div class="row">
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
                        </div><!-- .absolute-text-container -->
                        </div><!-- .text-container -->
                        </div>
                </div>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</div>

<?php endif; ?>