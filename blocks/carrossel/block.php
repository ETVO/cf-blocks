<?php

function render_block_carrossel($attributes, $content)
{
    $images = $attributes['images'];

    $id = 'cfCarousel' . rand(0, 100);

    ob_start(); // Start HTML buffering
    ?>

        <section class="cf-carrossel carousel slide indicators" id="<?php echo $id; ?>"
        data-bs-ride="carousel"
        data-custom-indicators="true">

            <div class="carousel-inner">
                <?php
                for($i = 0; $i < count($images); $i++):
                    $image = $images[$i];

                    ?>

                    <div class="carousel-item <?php if($i == 0) echo "active"; ?>">
                        <div class="d-block">
                            <img class="d-block w-100" src="<?php echo $image['url']; ?>" alt="">
                        </div>
                    </div>

                    <?php

                endfor;
                ?>
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