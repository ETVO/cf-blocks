<?php

function render_block_item($attributes)
{
    $text = $attributes['text'];
    $image_url = $attributes['image'];

    ob_start(); // Start HTML buffering
    if ($image_url) : 
    ?>
        <div class="cf-item carousel-item" style="background-image: url('<?php echo $image_url; ?>');">
            <div class="overlay position-absolute top-0 w-100 h-100 d-flex">
                <div class="banner-content my-auto text-center">
                    <div class="text cf-cursive">
                        <?php echo $text; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php 
    endif;

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}