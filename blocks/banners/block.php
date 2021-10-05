<?php

function render_block_banners($attributes, $content)
{

    $auto_slide = true;
    $interval = 5000;

    $id = 'cfBanners' . rand(0, 100);

    $logo = get_field('logomarca');
    $post_title = get_the_title();

    ob_start(); // Start HTML buffering
    ?>

        <section class="cf-banners carousel slide"
            data-bs-ride="<?php echo ($auto_slide) ? "carousel" : "false" ?>" 
            <?php echo ($auto_slide) ? 'data-bs-interval="'.$interval.'"' : ""; ?>" 
            data-bs-pause="false"
            id="<?php echo $id; ?>">

            <div class="stamp">
                <div class="container">
                    <img src="<?php echo $logo['url']; ?>" alt="<?php echo $post_title; ?>">
                </div>
            </div>

            <div class="carousel-inner">
                <?php echo $content ?>
            </div>

            <button class="carousel-control-prev" type="button" 
            data-bs-target="#<?php echo $id; ?>" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" 
            data-bs-target="#<?php echo $id; ?>" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Próximo</span>
            </button>
        </section>

    <?php

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}