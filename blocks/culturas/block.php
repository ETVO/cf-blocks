<?php

function render_block_culturas($attributes, $content)
{
    $title = "Cultura da CF Negócios Imobiliários";

    ob_start(); // Start HTML buffering
    ?>

        <section class="cf-culturas mb-5">
            <div class="col-12 col-sm-11 col-md-11 col-lg-10 col-xl-9 px-2 py-4 mx-auto">
                <div class="block-title text-center">
                    <h2>
                        <?php echo $title; ?>
                    </h2>
                </div>
                
                <div class="items row g-3 py-4 justify-content-center">
                    <?php echo $content; ?>
                </div>
            </div>
        </section>

    <?php

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}