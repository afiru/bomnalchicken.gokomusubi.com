<section class="secBomCafePrice">
    <h2 class="t_center cl_A01D10 fw_800 d_flex j_center ali_center h2BomCafePrice">
        <spna class="iconH2BomCafePrice"><?php echo scf::get('titlePriceBomCafe'); ?></spna>
        <!--bg:../img/about/iconH2BomCafePrice.svg-->
    </h2>

    <div class="bg_265278 cl_fff d_flex j_between ali_center thBomCafePrice">
        <h3 class="cl_fff fw_800 t_center h3ThBomCafePrice">コース</h3>
        <h3 class="cl_fff fw_800 t_center h3ThBomCafePrice">時間</h3>
        <h3 class="cl_fff fw_800 t_center h3ThBomCafePrice">料金</h3>
    </div>
    <?php foreach (scf::get('tablePriceBomCafe') as $fields): ?>
        <div class="bg_fff cl_282828 d_flex j_between ali_center tdBomCafePrice">
            <div class="d_flex j_center ali_center coseBomCafePrice">
                <section class="secTdeBomCafePrice">
                    <?php if (!empty($fields['coseBaseTitle'])): ?>
                        <p class="cl_282828 fw_500 t_center mainTdeBomCafePrice"><?php echo $fields['coseBaseTitle']; ?></p>
                    <?php endif; ?>
                    <?php if (!empty($fields['coseBaseSubTitle'])): ?>
                        <p class="cl_282828 fw_500 t_center subTdeBomCafePrice"><?php echo $fields['coseBaseSubTitle']; ?></p>
                    <?php endif; ?>
                </section>
            </div>
            <div class="d_flex j_center ali_center timeBomCafePrice">
                <section class="secTdeBomCafePrice">
                    <?php if (!empty($fields['timeBaseTitle'])): ?>
                        <p class="cl_282828 fw_500 t_center mainTdeBomCafePrice"><?php echo $fields['coseBaseTitle']; ?></p>
                    <?php endif; ?>
                    <?php if (!empty($fields['timeSubBaseSubTitle'])): ?>
                        <p class="cl_282828 fw_500 t_center subTdeBomCafePrice"><?php echo $fields['coseBaseSubTitle']; ?></p>
                    <?php endif; ?>
                </section>
            </div>
            <div class="d_flex j_center ali_center enBomCafePrice">
                <section class="secTdeBomCafePrice">
                    <?php if (!empty($fields['priceMain'])): ?>
                        <p class="cl_282828 fw_500 t_center mainTdeBomCafePrice"><?php echo $fields['coseBaseTitle']; ?></p>
                    <?php endif; ?>
                    <?php if (!empty($fields['priceSub'])): ?>
                        <p class="cl_282828 fw_500 t_center subTdeBomCafePrice"><?php echo $fields['coseBaseSubTitle']; ?></p>
                    <?php endif; ?>
                </section>
            </div>
        </div>

    <?php endforeach; ?>

</section>