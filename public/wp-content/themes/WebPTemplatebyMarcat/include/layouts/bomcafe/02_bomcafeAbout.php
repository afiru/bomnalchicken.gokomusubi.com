<section class="secAboutBomCafe">
    <h2 class="t_center cl_265278 fw_800 h2AboutBomCafe">
        <?php echo scf::get('titleBomCafe'); ?>
    </h2>
    <h3 class="t_center cl_467BBE fw_500 h3AboutBomCafe">
        <?php echo scf::get('enTitleBomCafe'); ?>
    </h3>

    <ul class="pointAboutBomCafe">
        <?php foreach (scf::get('pointsBomCafe') as $fields): ?>
            <?php if (!empty($fields['txtPointsBomCafe'])): ?>
                <li class="d_flex j_between ali_center liPointAboutBomCafe">
                    <figure class="iconPointAboutBomCafe">
                        <?php $img = get_scf_img_loop_url_id($fields['imgPointsBomCafe']); ?>
                        <img loading="lazy" src="<?php echo $img[0]; ?>" alt="" width="<?php echo $img[1]; ?>" height="<?php echo $img[2]; ?>">
                    </figure>
                    <p class="cl_282828 fw_500 text_justify txtPointAboutBomCafe">
                        <?php echo $fields['txtPointsBomCafe']; ?>
                    </p>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>


    <div class="pore d_flex j_center ali_center zehiBomCafe">
        <figure class="poab iconPointAboutBomCafeLT">
            <img loading="lazy" src="<?php echo get_bloginfo('template_url'); ?>/img/about/iconPointAboutBomCafeLT.svg" alt="" width="12.56" height="12.56">
        </figure>
        <figure class="poab iconPointAboutBomCafeRB">
            <img loading="lazy" src="<?php echo get_bloginfo('template_url'); ?>/img/about/iconPointAboutBomCafeRb.svg" alt="" width="12.56" height="12.56">
        </figure>
        <section class="secZehiBomCafe">
            <h3 class="cl_A01D10 fw_800 t_center h3ZehiBomCafe">そんな方はぜひ！</h3>
            <p class="t_center cl_A01D10 fw_800 txtZehiBomCafe">
                <span class="bigTxtZehiBomCafe">ボムカフェ</span>
                に！
            </p>
        </section>
    </div>
</section>