<div class="title-and-text-container widget-seperator">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-and-text-inner-container">
                    <style>
                        .title-and-text-inner-container h2:after{
                            border-bottom-color: <?php echo $instance['title_underline_color']; ?>;
                        }
                    </style>
                    <h2>
                        <?php echo $instance['title']; ?>
                    </h2>
                    <div class="text-container">
                        <?php echo $instance['long_texts']; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>