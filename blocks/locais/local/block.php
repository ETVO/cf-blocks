<?php

function render_block_local($attributes, $content)
{
    $name = $attributes['name'];
    $region = $attributes['region'];
    $image_url = $attributes['image'];

    ob_start(); // Start HTML buffering
    ?>

        <div class="cf-local col-12 col-sm-6 col-md-3 col-lg-3">
            <div class="local-inner">
                <div class="bg-image">
                    <img src="<?php echo $image_url; ?>" alt="">
                </div>
                <div class="content">
                    <div class="text">
                        <h6 class="name">
                            <?php echo $name; ?>
                        </h6>
                        <small class="region">
                            <?php echo $region ?>
                        </small>
                    </div>
                </div>
            </div>
        </div>

    <?php

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}