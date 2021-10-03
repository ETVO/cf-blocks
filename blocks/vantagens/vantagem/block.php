<?php

function render_block_vantagem($attributes, $content)
{
    $icon_url = $attributes['icon'];
    $title = $attributes['title'];
    $desc = $attributes['desc'];

    ob_start(); // Start HTML buffering
    ?>

        <section class="cf-vantagem col-12 col-md-6 col-lg-4">
            <div class="vantagem-inner text-center p-sm-2">
                <div class="icon">
                    <img src="<?php echo $icon_url; ?>" alt="">
                </div>
                <div class="title mt-4 mb-3">
                    <h5 class="mb-0">
                        <?php echo $title; ?>
                    </h5>
                </div>
                <div class="desc">
                    <?php echo $desc; ?>
                </div>
            </div>
        </section>

    <?php

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}