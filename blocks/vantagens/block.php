<?php

function render_block_vantagens($attributes, $content)
{
    $title = "Principais vantagens";

    ob_start(); // Start HTML buffering
    ?>

        <section class="cf-vantagens mb-5 py-5">
            <div class="container col-xl-10">
                <div class="block-title text-center mb-3">
                    <h2>
                        <?php echo $title; ?>
                    </h2>
                </div>
                <div class="row g-3 w-100 p-0 m-0">
                    <?php echo $content; ?>
                </div>
            </div>
        </section>

    <?php

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}