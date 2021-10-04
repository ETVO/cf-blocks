<?php

function render_block_andamento($attributes, $content)
{
    $title = "Andamento da Construção";
    $image_url = $attributes['image'];

    ob_start(); // Start HTML buffering
?>

    <section class="cf-andamento py-3">
        <div class="title text-center mb-5 w-100">
            <h2><?php echo $title; ?></h2>
        </div>
        <div class="row w-100 m-0">
            <div class="image col-12 col-lg-6 ms-0 px-2 px-lg-0">
                <img class="w-100" src="<?php echo $image_url; ?>">
            </div>
            <div class="content-wrap col-12 col-lg-6 my-auto">
                <div class="content">         
                    <?php echo $content; ?>
                </div>
            </div>
        </div>

    </section>

<?php

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}