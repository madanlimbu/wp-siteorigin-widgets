<?php
    $post_selector_pseudo_query = $instance['posts'];
    $processed_query = siteorigin_widget_post_selector_process_query($post_selector_pseudo_query);
    $query_result = new WP_Query($processed_query);

    if($query_result->have_posts()) :
?>
        <?php while($query_result->have_posts()) : $query_result->the_post(); ?>
<div class="archive-page-widget ">
    <div class="featured-image-container" style="background-image: url(<?php if( has_post_thumbnail() ) : the_post_thumbnail_url('full');  endif; ?>);" >
        <div class="texts-container">
        <!--    <h4><span><?php ?></span></h4> -->
            <h1><span><?php the_title() ?></span></h1>
            <div class="button-holder">
                <a class="button-invert" href="<?php the_permalink() ?>">
                    <?php echo $instance['button']['button_text'] ?>
                </a>
            </div>
        </div>
    </div>
</div>
    <?php endwhile; wp_reset_postdata(); ?>

<?php endif; ?>