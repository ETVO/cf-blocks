<?php

function render_block_cta($attributes, $content)
{

    $auto_slide = true;
    $interval = 5000;

    $block_id = 'cfCTA' . rand(0, 100);

    ob_start(); // Start HTML buffering
    ?>

        <section class="cf-cta carousel slide"
            data-bs-ride="<?php echo ($auto_slide) ? "carousel" : "false" ?>" 
            <?php echo ($auto_slide) ? 'data-bs-interval="'.$interval.'"' : ""; ?>" 
            data-bs-pause="false"
            data-custom-indicators="false"
            id="<?php echo $block_id; ?>">

            <div class="carousel-inner">
                <?php echo $content ?>
            </div>
        </section>

    <?php

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}