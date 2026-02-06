<section class="bg_fff secBomCafePrace">
    <div class="secBomCafePraceLxn">
        <h2 class="t_center cl_EB53A2 fw_800 d_flex j_center ali_center h2BomCafePrace">
            ■注意事項
        </h2>

        <ul class="pointBomCafePrace">
            <?php foreach (scf::get('bomcafeTyuis') as $fields): ?>
            <li class="d_flex j_start liPointBomCafePrace">
                <span class="cl_282828 fw_500 dottoPointBomCafePrace">●</span>
                <p class="cl_282828 fw_500 text_justify txtPointBomCafePrace">
                    <?php echo esc_html($fields['txtBomcafeTyuis']); ?>
                </p>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>