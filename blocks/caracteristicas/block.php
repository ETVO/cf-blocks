<?php

function render_block_caracteristicas($attributes, $content)
{
    $title = $attributes['title'];
    $desc = $attributes['desc'];

    ob_start(); // Start HTML buffering
    ?>

        <div class="cf-caracteristicas py-5">
            <div class="container col-xl-9 py-5">
                <div class="row g-3 w-100 m-0">
                    <div class="col-12 col-lg-4 side-content m-auto">
                        <div class="title">
                            <h2>
                                <?php echo $title; ?>
                            </h2>
                        </div>
                        <div class="desc">
                            <?php echo $desc; ?>
                        </div>
                    </div>
                    <?php echo $content; ?>
                </div>
            </div>
        </div>

    <?php

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}