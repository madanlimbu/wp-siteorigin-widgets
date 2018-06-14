<?php
if ( ! empty( $instance['social_links'] ) ) {
    $repeater_items = $instance['social_links'];
    ?>
<div style="<?php echo $instance['position'] ?>:0;background-color: <?php echo $instance['background_color'] ?>;" class="widget-social-floating floating-social-bar">
    <?php
        foreach( $repeater_items as $index => $repeater_item ) {
            $social_link = $repeater_item['social_url'];
            ?>
            <div class="link-social-float">
                <a target="_blank" href="<?php echo $social_link ?>">
                    <?php echo wp_get_attachment_image(wp_kses_post($repeater_item['social_icon'])); ?>
                </a>
            </div>
        <?php
        }
        ?>
</div>
<?php
    }
?>
