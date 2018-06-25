<?php


/* function for creating specific type of buttons */
function createLinkedinButton(){
    ?>
    <a target="_blank" href="https://www.linkedin.com/sharing/share-offsite?mini=true&url=<?php echo get_permalink()?>">
        <img src="<?php echo  plugins_url('/image/linkedin_red.svg', __FILE__ ) ?>">
    </a>
    <?php
}

function createPrinterButton(){
    ?>
    <a href="#" onclick="window.print()">
        <img src="<?php echo  plugins_url('/image/print_red.svg', __FILE__ ) ?>">
    </a>
    <?php
}

function createMailToButton($mailto_subject, $mailto_body){
    ?>
    <a href="mailto:?subject=<?php echo $mailto_subject; ?>&body=<?php echo $mailto_body; ?>" >
        <img src="<?php echo  plugins_url('/image/mail_red.svg', __FILE__ ) ?>" >
    </a>
    <?php
}

?>

<!-- Main body of share buttons -->
<div class="container social-share-widget">
    <div class="row">
        <div class="col-lg-12">
            <div class="social-share-container">
            <?php

            foreach( $instance['ordering'] as $item ) {
                if($item == 'stop'){
                    break;
                }else{
                    ?>
                    <div class="icon-share-buttons" >
                        <?php
                         if($item == 'linkedin'){
                           createLinkedinButton();
                          }else if($item == 'printer'){
                                createPrinterButton();
                         }else if($item == 'mailto') {
                             //set variable for mailto button
                             $mailto_subject = get_the_title();
                             $mailto_body = 'Check Out This Link ' . get_permalink();
                             //check if to use user set value or defaults
                             if($instance['mailto_subject'] != ''){
                                 $mailto_subject = $instance['mailto_subject'];
                             }
                             if($instance['mailto_body'] != ''){
                                 $mailto_body = $instance['mailto_body'];
                             }
                             createMailToButton($mailto_subject, $mailto_body);
                         }
                       ?>
                 </div>
                    <?php
                    continue;
                }
            }

            ?>
            </div> <!-- .social-share-container -->
        </div> <!-- .col-lg-12 -->
    </div> <!-- .row -->
</div> <!-- .container -->
