<?php

/**
 * Template Name: お問い合わせ（完了画面）
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
                <h2 class="cl_000 fw_800 h2Booking">ご予約賜わりました。</h2>
                <p class="cl_000 txtBooking txtBookingThanks">
                    ご予約ありがとうございました。<br>
                    いただきましたご予約を確認し、返答させていただきますので今しばらくお待ちください。
                </p>
                <div class="readmoneTopNewsLoop">
                    <a class="d_flex j_center ali_center fw_700 cl_fff bg_000 kaisei btnReadmoneTopNewsLoop btnReadmoneTopThnksLoop" href="<?php echo home_url('/'); ?>">トップページに戻る</a>
                </div>
                <div class="formBooking">
                    <?php the_content(); ?>
                </div>
            </section>
        </div>
    <?php endwhile;  ?>
</main>
<?php get_template_part('include/layouts/index/08_topAccess'); ?>
<?php get_template_part('include/layouts/index/09_topCopy'); ?>
<?php get_template_part('include/layouts/index/10_snsFixed'); ?>
<?php get_template_part('include/common/footer/footer'); ?>