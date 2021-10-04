<?php

function render_block_venha($attributes)
{
    $title = $attributes['title'];
    $subtitle = $attributes['subtitle'];
    $address = $attributes['address'];
    $text = $attributes['text'];

    $single_line_address = strip_tags($address);
    $map_address = str_replace(' ', '+', $single_line_address);

    $map_url = "https://maps.google.com/maps?q=" . $map_address
    . "&t=m&mrt=yp&z=14&output=embed&iwloc=addr&msa=0";

    ob_start(); // Start HTML buffering
    ?>

        <section class="cf-venha">
            <div class="row w-100 h-100 m-0">
                <div class="map col-12 col-lg-6 px-2 ps-lg-0">
                    <iframe class="w-100 h-100"
                    frameborder="0" scrolling="yes" marginheight="0" marginwidth="0" 
                    src="<?php echo $map_url; ?>" 
                    title="<?php echo $single_line_address; ?>" 
                    aria-label="<?php echo $single_line_address; ?>">
                    </iframe>
                </div>
                <div class="content col-12 col-lg-6 m-auto">
                    <div class="content-inner">
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
                        <div class="address">
                            <span class="bi bi-geo-alt"></span>
                            <span><?php echo $address; ?></span>
                        </div>
                        <div class="separator mt-3 mb-4">

                        </div>
                        <div class="text">
                            <?php echo $text; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}