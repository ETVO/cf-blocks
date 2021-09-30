<?php

function render_block_locais($attributes, $content)
{
    $title = "Invista em um dos locais mais visitados de Santa Catarina";

    ob_start(); // Start HTML buffering
    ?>

        <section class="cf-locais">
            <div class="col-12 col-sm-11 col-md-11 col-lg-10 col-xl-9 px-2 py-5 mx-auto">
                <div class="title text-center">
                    <h4 class="muted">
                        <?php echo $title; ?>
                    </h4>
                </div>
                
                <div class="items row g-3 pt-4 pb-5 justify-content-center">
                    <?php echo $content; ?>
                </div>
            </div>
        </section>

    <?php

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}