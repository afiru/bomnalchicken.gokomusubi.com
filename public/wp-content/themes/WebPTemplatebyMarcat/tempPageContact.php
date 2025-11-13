<?php

/**
 * Template Name: お問い合わせ（確認画面）
 * Template Post Type: page
 */
?>
<?php get_template_part('include/common/header/header'); ?>
<main class="bg_fff mainIndex">
    <div class="d_flex j_center ali_center catFv">
        <!--
    bg:../img/catFv.jpg
    -->
        <section class="secCatFv">
            <h2 class="cl_282828 fw_800 h2SecCatFv">ご予約</h2>
            <div class="bg_282828 brdSecCatFv"></div>
            <h3 class="cl_282828 fw_800 en h3SecCatFv">BOOKING</h3>
        </section>
        <figure class="iconCatFv">
            <img loading="lazy" src="<?php echo get_bloginfo('template_url'); ?>/img/iconCatFv.svg" alt="" width="74" height="60">
        </figure>
    </div>
    <?php if (have_posts()) while (have_posts()) : the_post();  ?>
        <div id="bookingconfirm" class="bookingConfirm">
            <section class="secBooking">
                <h2 class="t_center cl_000 fw_800 h2Booking">ご予約【確認】</h2>
                <div class="formBooking">
                    <?php the_content(); ?>
                </div>
            </section>
        </div>
    <?php endwhile;  ?>
    <?php get_template_part('include/layouts/top/08_access'); ?>
</main>
<?php get_template_part('include/layouts/top/09_copy'); ?>
<?php get_template_part('include/layouts/top/10_sns'); ?>
<?php get_template_part('include/common/footer/footer'); ?>