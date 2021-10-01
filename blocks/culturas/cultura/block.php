<?php

function render_block_cultura($attributes)
{
    $title = $attributes['title'];
    $desc = $attributes['desc'];

    ob_start(); // Start HTML buffering
    ?>

        <div class="cf-cultura col-12 col-sm-6 col-lg-4">
            <div class="cultura-inner">
                <div class="content">
                    <div class="title mb-3">
                        <h3 class="cf-cursive">
                            <?php echo $title; ?>
                        </h3>
                    </div>
                    <div class="desc">
                        <?php echo $desc; ?>
                    </div>
                </div>
            </div>
        </div>

    <?php

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}