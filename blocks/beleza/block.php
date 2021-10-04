<?php

function render_block_beleza($attributes, $content)
{
    $title = $attributes['title'];
    $subtitle = $attributes['subtitle'];
    $text = $attributes['text'];
    $show_separator = $attributes['showSeparator'];
    $image_url = $attributes['image'];
    $image_order = $attributes['imageOrder'];
    if(empty($image_order) || $image_order == '') $image_order = 'first';

    
    ob_start(); // Start HTML buffering

    ?>

        <section class="cf-beleza <?php echo "order-img-$image_order"; ?>">
            <div class="row w-100 m-0 g-0 mb-5 mb-lg-0">
                <div class="image col-lg-6 px-3 px-lg-0 order-first <?php echo "order-lg-$image_order"; ?>">
                    <img class="w-100" src="<?php echo $image_url; ?>" alt="">
                </div>
                <div class="content col-lg-6 m-auto">
                    <div class="subtitle">
                        <h4>
                            <?php echo $subtitle; ?>
                        </h4>
                    </div>
                    <div class="title">
                        <h2 class="cf-cursive">
                            <?php echo $title; ?>
                        </h2>
                    </div>
                    
                    <?php if($show_separator): ?>
                    <div class="separator mt-3"></div>
                    <?php endif; ?>

                    <div class="text mt-4">
                        <?php echo $text; ?>
                    </div>
                </div>
            </div>
        </section>

    <?php

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}