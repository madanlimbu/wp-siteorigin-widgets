<div class="full-page-image-widget">
    <div class="full-page-image-container">
            <div class="full-page-image-background" style="background-image: url(<?php echo wp_get_attachment_url(wp_kses_post($instance['some_media'])); ?>)" class="full-page-image-contents">

              <div class="full-page-image-title-button-container">
                <h1>
                   <span> <?php echo $instance['a_section']['title']; ?> </span>
                </h1>
                <div class="button-widget">
                    <a style="background-color:<?php echo wp_kses_post($instance['a_section']['button_color']); ?>;"
                       href="<?php echo sow_esc_url($instance['a_section']['button_url']); ?>" >
                        <?php echo $instance['a_section']['button_text']; ?>
                    </a>                </div>
                </div><!-- .full-page-image-title-button-container -->

                <div class="scroll-down-arrow">
                    <a href="#"></a>
                    <img src="<?php echo  plugins_url('/image/arrow_down.png', __FILE__ ) ?>" alt="Scroll Down">
                </div> <!-- .scroll-down-arrow -->

             </div><!-- .full-page-image-backgroundr -->
    </div> <!-- .full-page-image-container -->
    <?php if($instance['header_id']){ ?>
    <script>
        document.addEventListener("DOMContentLoaded", function(){
            var headerHeight = document.getElementById('<?php echo $instance['header_id']; ?>').scrollHeight;
            console.log(headerHeight);
            document.getElementsByClassName('full-page-image-background')[0].style.height = 'calc(100vh - '+headerHeight+'px)';
        });
    </script>
    <?php } ?>
</div>