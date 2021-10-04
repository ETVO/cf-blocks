<?php

function render_block_caracteristica($attributes)
{
    $icon_url = $attributes['icon'];
    $desc = $attributes['desc'];

    ob_start(); // Start HTML buffering
    ?>

        <div class="cf-caracteristica d-flex my-3">
            <div class="caracteristica-icon me-2 my-auto">
                <img src="<?php echo $icon_url; ?>" alt="">
            </div>
            <div class="caracteristica-desc my-auto">
                <?php echo $desc; ?>
            </div>
        </div>

    <?php

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}