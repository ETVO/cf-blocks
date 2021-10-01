<?php

function render_block_sobre($attributes)
{
    $image_url = $attributes['image'];
    $desc = $attributes['desc'];

    ob_start(); // Start HTML buffering
    ?>

        <section class="cf-sobre py-5 mt-4">
            <div class="container col-md-11 col-lg-11 col-xl-8 py-5 mx-auto">
                <div class="row w-100 p-0">
                    <div class="image col-12 col-lg-6 d-flex">
                        <img class="m-auto" src="<?php echo $image_url; ?>" alt="">
                    </div>
                    <div class="desc col-12 col-md-10 col-lg-6 col-xl-5 mx-auto">
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