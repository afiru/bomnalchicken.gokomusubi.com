<div class="d_flex j_center ali_center catFv">
    <!--
    bg:../img/catFv.jpg
    -->
    <section class="secCatFv">
        <h2 class="cl_282828 fw_800 h2SecCatFv">ボムカフェについて</h2>
        <div class="bg_282828 brdSecCatFv"></div>
        <h3 class="cl_282828 fw_800 en h3SecCatFv">ABOUT</h3>
    </section>
    <figure class="iconCatFv">
        <img loading="lazy" src="<?php echo get_bloginfo('template_url'); ?>/img/iconCatFv.svg" alt="" width="74" height="60">
    </figure>
</div>

<?php $img = get_scf_img_url('bomcafefv'); ?>
<?php if (!empty($img[0])): ?>
    <figure class="photoBomcafefv">
        <img loading="lazy" src="<?php echo $img[0]; ?>" alt="" width="<?php echo $img[1]; ?>" height="<?php echo $img[2]; ?>">
    </figure>
<?php endif; ?>