<div class=" pore menuGenre">
    <div class="bg_FBEBEC btnMenuGenre jsbtnMenuGenre off">
        <section class="d_flex j_between btnMenuGenreFx">
            <h2 class="cl_EB53A2 fw_800 h2btnMenuGenre">
                <?php echo esc_html('メニューをジャンルで選ぶ'); ?>
            </h2>
            <div class="pore brdBtnMenuGenre">
                <span class="bg_EB53A2 brdBtmBtnMenuGenre brdBtmBtnMenuGenre01"></span>
                <span class="bg_EB53A2 brdBtmBtnMenuGenre brdBtmBtnMenuGenre02"></span>
            </div>
        </section>
    </div>

    <div class="bg_fff menuGenreLxn jsmenuGenreLxn">
        <?php $terms = get_terms(['taxonomy' => 'menu_category', 'hide_empty' => false]); ?>
        <div class="menuGenreLxnBx">
            <ul class="ulMenuGenreLxnBx">
                <?php foreach ($terms as $term): ?>
                <li class="liMenuGenreLxnBx">
                    <div class="d_flex j_between ali_center c_pointer btnMenuGenreLxnBx jsbtnMenuGenreLxnBx off">
                        <h2 class="cl_E9483E fw_700 h2BtnMenuGenreLxnBx">
                            ■<?php echo esc_html($term->name); ?>
                        </h2>
                        <div class="pore brdMenuGenreLxnBx">
                            <span class="bg_E9483E brdbrdMenuGenreLxnBx brdbrdMenuGenreLxnBx01"></span>
                            <span class="bg_E9483E brdbrdMenuGenreLxnBx brdbrdMenuGenreLxnBx02"></span>
                        </div>
                    </div>

                    <?php
                        $args = [
                            'post_type'      => 'menu',
                            'orderby'        => 'menu_order',
                            'order'          => 'ASC',
                            'posts_per_page' => -1,
                            'no_found_rows'  => true,
                            'tax_query'      => [
                                [
                                    'taxonomy' => 'menu_category',
                                    'field'    => 'term_id',
                                    'terms'    => $term->term_id,
                                ],
                            ],
                        ];
                        $query1 = new WP_Query($args);
                        ?>

                    <?php if ($query1->have_posts()): ?>
                    <nav class="navSubMenuGenreLxn jsulSubMenuGenreLxn">
                        <ul class="d_flex j_between row ulSubMenuGenreLxn">
                            <?php while ($query1->have_posts()): $query1->the_post(); ?>
                            <li class="liSubMenuGenreLxn">
                                <a class="d_flex j_between ali_center undernone btnSubMenuGenreLxn" href="<?php echo esc_url(get_permalink()); ?>">
                                    <p class="cl_282828 fw_500 txtBtnSubMenuGenreLxn">
                                        <?php echo esc_html(get_the_title()); ?>
                                    </p>
                                    <figure class="iconBtnSubMenuGenreLxn">
                                        <img loading="lazy" src="<?php echo esc_url(get_template_directory_uri() . '/img/iconBtnSubMenuGenreLxn.svg'); ?>" alt="<?php echo esc_attr(get_the_title() . 'のアイコン'); ?>" width="24" height="24">
                                    </figure>
                                </a>
                            </li>

                            <?php endwhile;
                                    wp_reset_postdata(); ?>
                        </ul>
                    </nav>
                    <?php endif; ?>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>