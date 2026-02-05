<section class="bg_fff secBomCafePrice">
    <div class="secBomCafePriceLxn">
        <h2 class="t_center cl_EB53A2 fw_800 d_flex j_center ali_center h2BomCafePrice">
            <span class="iconH2BomCafePrice"><?php echo esc_html(scf::get('titlePriceBomCafe')); ?></span>
            <!--bg:../img/about/iconH2BomCafePrice.svg-->
        </h2>

        <div class="bg_EB53A2 cl_fff d_flex j_between ali_center thBomCafePrice">
            <h3 class="cl_fff fw_800 t_center h3ThBomCafePrice">コース</h3>
            <h3 class="cl_fff fw_800 t_center h3ThBomCafePrice">時間</h3>
            <h3 class="cl_fff fw_800 t_center h3ThBomCafePrice">料金</h3>
        </div>

        <?php foreach (scf::get('tablePriceBomCafe') as $fields): ?>
            <div class="bg_fff cl_282828 d_flex j_between ali_center tdBomCafePrice">

                <!-- コース -->
                <div class="d_flex j_center ali_center coseBomCafePrice">
                    <section class="secTdeBomCafePrice">
                        <?php if (!empty($fields['coseBaseTitle'])): ?>
                            <p class="cl_282828 fw_500 t_center mainTdeBomCafePrice">
                                <?php echo esc_html($fields['coseBaseTitle']); ?>
                            </p>
                        <?php endif; ?>
                        <?php if (!empty($fields['coseBaseSubTitle'])): ?>
                            <p class="cl_282828 fw_500 t_center subTdeBomCafePrice">
                                <?php echo esc_html($fields['coseBaseSubTitle']); ?>
                            </p>
                        <?php endif; ?>
                    </section>
                </div>

                <!-- 時間 -->
                <div class="d_flex j_center ali_center timeBomCafePrice">
                    <section class="secTdeBomCafePrice">
                        <?php if (!empty($fields['timeBaseTitle'])): ?>
                            <p class="cl_282828 fw_500 t_center mainTdeBomCafePrice">
                                <?php echo esc_html($fields['timeBaseTitle']); ?>
                            </p>
                        <?php endif; ?>
                        <?php if (!empty($fields['timeSubBaseSubTitle'])): ?>
                            <p class="cl_282828 fw_500 t_center subTdeBomCafePrice">
                                <?php echo esc_html($fields['timeSubBaseSubTitle']); ?>
                            </p>
                        <?php endif; ?>
                    </section>
                </div>

                <!-- 料金 -->
                <div class="d_flex j_center ali_center enBomCafePrice">
                    <section class="secTdeBomCafePrice">
                        <?php if (!empty($fields['priceMain'])): ?>
                            <p class="cl_282828 fw_500 t_center mainTdeBomCafePrice">
                                <?php echo esc_html($fields['priceMain']); ?>
                            </p>
                        <?php endif; ?>
                        <?php if (!empty($fields['priceSub'])): ?>
                            <p class="cl_282828 fw_500 t_center subTdeBomCafePrice">
                                <?php echo esc_html($fields['priceSub']); ?>
                            </p>
                        <?php endif; ?>
                    </section>
                </div>

            </div>
        <?php endforeach; ?>
    </div>
</section>