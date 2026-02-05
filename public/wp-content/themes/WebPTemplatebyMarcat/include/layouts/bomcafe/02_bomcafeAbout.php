<div class="bg_fff aboutBom">
    <h2 class="t_center cl_EB53A2 Mochiy fw_800 h2AboutBomCafe">
        <?php echo esc_html(scf::get('titleBomCafe')); ?>
    </h2>

    <ul class="d_flex j_between row pointAboutBomCafe">
        <?php foreach (scf::get('pointsBomCafe') as $fields): ?>
            <?php if (!empty($fields['txtPointsBomCafe'])): ?>
                <li class="liPointAboutBomCafe">
                    <figure class="iconPointAboutBomCafe">
                        <?php
                        $img = get_scf_img_loop_url_id($fields['imgPointsBomCafe']);
                        if (!empty($img[0])):
                        ?>
                            <img loading="lazy" src="<?php echo esc_url($img[0]); ?>" alt="<?php echo esc_attr($fields['txtPointsBomCafe']); ?>" width="<?php echo esc_attr($img[1]); ?>" height="<?php echo esc_attr($img[2]); ?>">
                        <?php endif; ?>
                    </figure>
                    <p class="cl_282828 fw_500 text_justify txtPointAboutBomCafe">
                        <?php echo esc_html($fields['txtPointsBomCafe']); ?>
                    </p>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>

    <section class="secZehiBomCafe">
        <h3 class="cl_E9483E fw_800 t_center h3ZehiBomCafe">
            <?php echo esc_html('そんな方はぜひ！'); ?>
        </h3>
        <p class="d_flex j_center ali_center cl_E9483E fw_800 txtZehiBomCafe">
            <span class="bigTxtZehiBomCafe"><?php echo esc_html('ボムカフェ'); ?></span>
            <span class="littleTxtZehiBomCafe"><?php echo esc_html('に！'); ?></span>
        </p>
    </section>
</div>