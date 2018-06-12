<div class="half-by-half-container widget-seperator">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="half-by-half-inner-container">
                <h3>
                    <?php echo wp_kses_post($instance['a_section']['title']); ?>
                </h3>
                <div class="text-container">
                    <?php echo wp_kses_post($instance['a_section']['long_texts']); ?>
                </div> <!-- .text-container -->
                 <div class="button-widget">
                    <a style="background-color:<?php echo wp_kses_post($instance['a_section']['button_color']); ?>;"
                            href="<?php echo sow_esc_url($instance['a_section']['button_url']); ?>" >
                        <?php echo $instance['a_section']['button_text']; ?>
                    </a>
                 </div><!-- .button-widget -->
                </div><!-- .half-by-half-inner-container -->
            </div><!-- col-lg-6-->
            <div class="col-lg-6">
                   <div class="half-by-half-inner-container">
                    <?php echo wp_get_attachment_image(wp_kses_post($instance['some_media']), medium); ?>
                   </div><!-- .half-by-half-inner-container -->
                </div> <!-- col-lg-6-->
        </div><!-- row -->
    </div><!-- .container -->

</div><!-- .half-by-half-container -->
