<?php

function render_block_banner($attributes)
{
    $title = $attributes['title'];
    $subtitle = $attributes['subtitle'];
    $action = $attributes['action'];
    $image_url = $attributes['image'];
    $order = $attributes['order'];
    $align = $attributes['align'];

    ob_start(); // Start HTML buffering
    if ($image_url) : 
    ?>
        <div class="cf-banner carousel-item" style="background-image: url('<?php echo $image_url; ?>');">
            <div class="overlay position-absolute top-0 w-100 h-100 d-flex">
                <div class="banner-content my-auto text-center <?php if($align) echo 'invert-align'; ?>">
                    <div class="titles">
                        <?php if($order) { ?>
                            <h5 class="subtitle"><?php echo $subtitle; ?></h5>
                            <h1 class="title"><?php echo $title; ?></h1>
                        <?php } else { ?>
                            <h1 class="title"><?php echo $title; ?></h1>
                            <h5 class="subtitle"><?php echo $subtitle; ?></h5>
                        <?php } ?>
                    </div>
                    <?php if($action): ?>
                    <div class="action mt-5">
                        <a href="<?php echo $action; ?>">Saber Mais</a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php 
    endif;

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}