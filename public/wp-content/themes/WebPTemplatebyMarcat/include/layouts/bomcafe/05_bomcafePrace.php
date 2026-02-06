<section class="bg_fff secBomCafePrace">
    <div class="secBomCafePraceLxn">
        <h2 class="t_center cl_EB53A2 fw_800 d_flex j_center ali_center h2BomCafePrace">
            <span class="iconH2BomCafePrace"><?php echo esc_html(scf::get('titleBomCafePrace')); ?></span>
            <!--bg:../img/about/iconH2BomCafePrace.svg-->
        </h2>
        <h3 class="t_center cl_EE952D fw_800 h3BomCafePrace">
            <?php echo esc_html(scf::get('txtBomCafePrace')); ?>
        </h3>

        <div class="ggmapBomCafePrace">
            <?php
            echo wp_kses(
                scf::get('googlemapiframe'),
                array(
                    'iframe' => array(
                        'src' => array(),
                        'width' => array(),
                        'height' => array(),
                        'style' => array(),
                        'allowfullscreen' => array(),
                        'loading' => array(),
                        'referrerpolicy' => array(),
                        'frameborder' => array(),
                    ),
                )
            );
            ?>
        </div>

        <p class="cl_282828 fw_500 txtBomCafePrace">
            <?php echo esc_html(scf::get('txtBtmBomCafePrace')); ?>
        </p>
    </div>
</section>