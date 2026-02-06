<!-- 開催日セクション -->
<section class="bg_fff secBomCafeDate">
    <div class="secBomCafeDateLxn">
        <h2 class="t_center cl_EB53A2 fw_800 d_flex j_center ali_center h2BomCafeDate">
            <span class="iconH2BomCafeDate"><?php echo esc_html(scf::get('titleDateBomCafe')); ?></span>
            <!--bg:../img/about/iconH2BomCafeDate.svg-->
        </h2>
        <h3 class="t_center cl_EE952D fw_800 h3BomCafeDate">
            <?php echo esc_html('開催は'); ?>
            <span class="bigBomCafeDate">
                <?php echo esc_html(scf::get('kikanDateBomCafe')); ?>
            </span>
            <?php echo esc_html('です。'); ?>
        </h3>
        <p class="cl_282828 fw_500 text_justify txtBomCafeDate">
            <?php echo esc_html(scf::get('annaiDateBomCafe')); ?>
        </p>
    </div>
</section>