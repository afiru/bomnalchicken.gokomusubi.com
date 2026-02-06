<section class="pore instagram">
    <section class="titleTopPrice">
        <h2 class="cl_EE952D Mochiy fw_400 h2TopPrice"><?php echo esc_html('インスタグラム'); ?></h2>
        <div class="bg_F4DB17 brdTopPrice"></div>
        <p class="cl_E9483E fw-800 en rybyTopPrice"><?php echo esc_html('INSTAGRAM'); ?></p>
    </section>

    <figure class="poab iconInstagram">
        <img loading="lazy" src="<?php echo esc_url(get_bloginfo('template_url')); ?>/img/iconInstagram.svg" alt="" width="87" height="87">
    </figure>


    <div class="instagramLxn">
        <?php echo do_shortcode('[instagram-feed feed=1]'); ?>
    </div>
</section>