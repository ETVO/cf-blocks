<?php

function render_block_present($attributes, $content)
{
    $title = $attributes['title'] ?? null;
    $description = $attributes['description'] ?? null;
    $showContacts = $attributes['showContacts'] ?? false;

    if($showContacts){
        // Phone
        $phone = get_theme_mod('cf_phone');

        $phone_no = get_theme_mod('cf_phone_number');
        $phone_no = preg_replace('/[^0-9]/', '', $phone_no);

        $phone_link = "tel:$phone_no";

        // WhatsApp
        $whatsapp = get_theme_mod('cf_whatsapp');

        $whatsapp_no = get_theme_mod('cf_whatsapp_number');
        $whatsapp_no = preg_replace('/[^0-9]/', '', $whatsapp_no);

        $whatsapp_link = "https://wa.me/$whatsapp_no";

        $contacts = array(
            array(
                'show' => $phone,
                'number' => $phone_no,
                'link' => $phone_link,
                'icon' => 'telephone-fill',
            ),
            array(
                'show' => $whatsapp,
                'number' => $whatsapp_no,
                'link' => $whatsapp_link,
                'icon' => 'whatsapp',
            )
        );
    }

    ob_start(); // Start HTML buffering
    ?>

        <section class="cf-present">
            <div class="container col-lg-11 col-xl-9 px-3">
                <div class="d-inline d-lg-flex m-auto">
                    <?php if($title): ?>
                        <div class="title m-auto text-center text-lg-start">
                            <h1 class="m-0">
                                <?php echo $title; ?>
                            </h1>
                        </div>
                    <?php endif; ?>
                    <?php if($description): ?>
                        <div class="description my-auto">
                            <p class="m-0">
                                <?php echo $description; ?>
                            </p>
                        </div>
                    <?php endif; ?>
                </div>
                <?php if($showContacts && count($contacts) > 0): ?>
                    <div class="d-flex mt-4">
                        <div class="contacts m-auto d-flex flex-column flex-sm-row ">
                            
                            <?php foreach ($contacts as $contact) : ?>
                                <div class="list-item my-1 my-sm-0 mx-sm-2 d-flex d-sm-block">
                                    <div class="d-flex mx-auto">
                                        <a class="icon me-2" href="<?php echo $contact['link'] ?>" target="_blank" alt="<?php echo $contact['number']; ?>">
                                            <span class="bi bi-<?php echo $contact['icon'] ?>"></span>
                                        </a>
                                        <a class="text" href="<?php echo $contact['link'] ?>" target="_blank" alt="<?php echo $contact['number']; ?>">
                                            <span><?php echo $contact['show']; ?></span>
                                        </a>
                                    </div>
                                </div>

                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </section>

    <?php

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}