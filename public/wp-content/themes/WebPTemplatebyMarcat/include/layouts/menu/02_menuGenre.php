<div class="pore menuGenre">
    <div class="bg_A01D10 btnMenuGenre jsbtnMenuGenre off">
        <section class="d_flex j_between btnMenuGenreFx">
            <h2 class="cl_fff fw_800 h2btnMenuGenre">メニューをジャンルで選ぶ！</h2>
            <div class="pore brdBtnMenuGenre">
                <span class="bg_fff brdBtmBtnMenuGenre brdBtmBtnMenuGenre01"></span>
                <span class="bg_fff brdBtmBtnMenuGenre brdBtmBtnMenuGenre02"></span>
            </div>
        </section>
    </div>

    <div class="bg_FBEBEC menuGenreLxn jsmenuGenreLxn">
        <?php $terms = get_terms('menu_category', 'get=all'); ?>
        <div class="menuGenreLxnBx">
            <ul class="ulMenuGenreLxnBx">
                <?php foreach ($terms as $term): ?>
                    <li class="liMenuGenreLxnBx">
                        <div class="d_flex j_between ali_center c_pointer btnMenuGenreLxnBx jsbtnMenuGenreLxnBx off">
                            <h2 class="cl_282828 fw_700 h2BtnMenuGenreLxnBx">■<?php echo $term->name; ?></h2>
                            <div class="pore brdMenuGenreLxnBx">
                                <span class="bg_fff brdbrdMenuGenreLxnBx brdbrdMenuGenreLxnBx01"></span>
                                <span class="bg_fff brdbrdMenuGenreLxnBx brdbrdMenuGenreLxnBx02"></span>
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
                                    'field'    => 'term_id', // ← タームIDで絞り込む！
                                    'terms'    => $term->term_id,   // ← タームIDを配列または単体で渡す
                                ],
                            ],
                        ];
                        ?>
                        <?php $query1 = new WP_Query($args); ?>
                        <?php if ($query1->have_posts()): ?>
                            <ul class="d_flex j_between row ulSubMenuGenreLxn jsulSubMenuGenreLxn">
                                <?php while ($query1->have_posts()): ?>
                                    <?php $query1->the_post(); ?>
                                    <li class="liSubMenuGenreLxn">
                                        <a class="d_flex j_between ali_center undernone btnSubMenuGenreLxn" href="<?php echo get_permalink($post->ID); ?>">
                                            <p class="cl_282828 fw_500 txtBtnSubMenuGenreLxn">
                                                -&nbsp;<?php echo get_the_title($post->ID); ?>
                                            </p>
                                            <figure class="iconBtnSubMenuGenreLxn">
                                                <img loading="lazy" src="<?php echo get_bloginfo('template_url'); ?>/img/iconBtnSubMenuGenreLxn.svg" alt="" width="24" height="24">
                                            </figure>
                                        </a>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                            <?php wp_reset_postdata(); ?>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>