<?php

function render_block_coluna($attributes, $content)
{
    $title = $attributes['title'];

    ob_start(); // Start HTML buffering
    ?>

        <div class="cf-coluna col-12 col-md-6 col-lg-4 d-flex">
            <div class="coluna-inner mx-auto">
                <div class="coluna-title">
                    <h6>
                        <?php echo $title; ?>
                    </h6>
                </div>
                <div class="coluna-content">
                    <?php echo $content; ?>
                </div>
            </div>
        </div>

    <?php

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}