<?php

function render_block_comentario($attributes)
{
    $image_url = $attributes['image'];
    $desc = $attributes['desc'];

    ob_start(); // Start HTML buffering
    ?>

        <section class="cf-comentario py-5 my-5">
            <div class="row w-100 m-0">
                <div class="image col-12 col-lg-6 px-2 px-lg-0 d-flex">
                    <img class="w-100 m-auto" src="<?php echo $image_url; ?>" alt="">
                </div>
                <div class="col-12 col-md-10 col-lg-6 m-auto">
                    <div class="desc px-2 pe-lg-0 ps-lg-5">
                        <?php echo $desc; ?>
                    </div>
                </div>
            </div>
        </section>

    <?php

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}