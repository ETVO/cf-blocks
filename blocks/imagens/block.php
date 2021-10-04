<?php

function render_block_imagens($attributes, $content)
{
    $title = $attributes['title'];
    $subtitle = $attributes['subtitle'];
    $images = $attributes['images'];

    $slides_xl = 3;
    $slides_lg = 2;
    $slides_xs = 1;

    $id = 'cfImagens' . rand(0, 100);

    $image_count = count($images);

    ob_start(); // Start HTML buffering
    ?>

        <section class="cf-imagens pb-5">
            <div class="container col-xl-9 py-5">
                <div class="heading text-center mb-4">
                    <div class="title">
                        <h2>
                            <?php echo $title; ?>
                        </h2>
                    </div>
                    <div class="subtitle">
                        <h5>
                            <?php echo $subtitle; ?>
                        </h5>
                    </div>
                </div>
                <div class="carousel slide" 
                data-bs-ride="carousel"
                data-bs-interval="false" 
                data-custom-indicators="false" 
                id="<?php echo $id; ?>">
                    <?php 
                        generate_slider_inner($images, $slides_xl, ':xl');
                        generate_slider_inner($images, $slides_lg, ':lg.xl');
                        generate_slider_inner($images, $slides_xs, '.lg'); 
                    ?>

                    <?php 
                        // generate_slider_indicators($id, $image_count, $slides_xl, ':xl');
                        // generate_slider_indicators($id, $image_count, $slides_lg, ':lg.xl');
                        // generate_slider_indicators($id, $image_count, $slides_xs, '.lg');
                    ?>

                    <div class="controls">
                        <button class="carousel-control-prev me-1" type="button" data-bs-target="#<?php echo $id; ?>" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden"><?php echo __("Anterior"); ?></span>
                        </button>
                        <button class="carousel-control-next ms-1" type="button" data-bs-target="#<?php echo $id; ?>" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden"><?php echo __("Próximo"); ?></span>
                        </button>
                    </div>
                </div>
            </div>
        </section>

    <?php

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}

function generate_slider_inner($images, $slide_count, $bp)
{
    $matches = []; 
    $start = '';
    preg_match('/:([a-z]{2})*/', $bp, $matches);
    $start = $matches[1];
    
    $matches = []; 
    $stop = '';
    preg_match('/\.([a-z]{2})*/', $bp, $matches);
    $stop = $matches[1];

    $display_class = '';

    if(trim($start) != '') {
        $display_class = "d-toggle";
        $display_class .= " d-none";
        $display_class .= " d-$start-block";

        if(trim($stop) != '') {
            $display_class .= " d-$stop-none";
        }
    }
    else if(trim($stop) != '') {
        $display_class = "d-toggle";
        $display_class .= " d-block";
        $display_class .= " d-$stop-none";
    }

    ?>
    <div class="carousel-inner <?php echo $display_class; ?>">
    <?php

    $each = 0;
    for ($i = 0; $i < count($images); $i++) {
        if ($each == 0) {
            ?>
            <div class="carousel-item <?php if ($i == 0) echo "active"; ?>">
                <div class="m-0 row w-100 h-100 justify-content-center">
            <?php
        }

        $image = get_image_props($images, $i);

        ?>
        <div class="item-inner col-lg-<?php echo round(12 / $slide_count); ?>">
            <img class="slide-img" src="<?php echo $image['url'] ?>" alt="">
        </div>
        <?php


        if ($each == $slide_count - 1) {
            $each = 0;
            ?>
                </div>
            </div>
            <?php
        } else {
            $each++;
        }
    }

    if ($each > 0) {
        $each = 0;
        ?>
            </div>
        </div>
        <?php
    }

    ?>
    </div>
    <?php
}


function generate_slider_indicators($target_id, $image_count, $slide_count, $bp)
{
    $matches = []; 
    $start = '';
    preg_match('/:([a-z]{2})*/', $bp, $matches);
    $start = $matches[1];
    
    $matches = []; 
    $stop = '';
    preg_match('/\.([a-z]{2})*/', $bp, $matches);
    $stop = $matches[1];

    $display_class = '';

    if(trim($start) != '') {
        $display_class = "d-toggle";
        $display_class .= " d-none";
        $display_class .= " d-$start-block";

        if(trim($stop) != '') {
            $display_class .= " d-$stop-none";
        }
    }
    else if(trim($stop) != '') {
        $display_class = "d-toggle";
        $display_class .= " d-block";
        $display_class .= " d-$stop-none";
    }

    ?>
    <div class="carousel-indicators <?php echo $display_class; ?>">
        <div class="indicators-wrap">
            <div class="indicators-inner">
        
    <?php

    $each = 0;
    $slide = 0;
    for ($i = 0; $i < $image_count; $i++) {
        if ($each == 0) {
            ?>
                <button type="button" 
                data-bs-target="#<?php echo $target_id; ?>" 
                data-bs-slide-to="<?php echo $slide; ?>" 
                class="<?php if ($i == 0) echo "active"; ?>" 
                aria-current="<?php if ($i == 0) echo "true"; else echo "false"; ?>" 
                aria-label="Slide <?php echo ($slide + 1); ?>">
            <?php
            $slide++;
        }


        if ($each == $slide_count - 1) {
            $each = 0;
            ?>
                </button>
            <?php
        } else {
            $each++;
        }
    }

    if ($each > 0) {
        $each = 0;
        ?>
            </button>
        <?php
    }

    ?>
            </div>
        </div>
    </div>
    <?php
}