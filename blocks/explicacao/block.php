<?php

function render_block_explicacao($attributes)
{
    $title = $attributes['title'];
    $text = $attributes['text'];

    ob_start(); // Start HTML buffering
    ?>

        <section class="cf-explicacao py-5 my-5">
            <div class="container col-md-11 col-lg-9 col-xl-6 text-center">
                <div class="title pb-4">
                    <h2>
                        <?php echo $title; ?>
                    </h2>
                </div>
                <div class="text">
                    <?php echo $text; ?>
                </div>
            </div>
        </section>

    <?php

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}