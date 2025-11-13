<div class="bg_fff menuAllList">
    <?php $terms = get_terms('menu_category', 'get=all'); ?>
    <nav class="menuAllListNavs">
        <ul class="d_flex j_start ali_center nowap ulMenuAllListNavs">
            <?php foreach ($terms as $term): ?>
                <li class="liMenuAllListNavs">
                    <a class="undernone bg_A01D10 cl_fff fw_700 btnMenuAllListNavs" href="#limenuAllListBx<?php echo $term->term_id; ?>"><?php echo $term->name; ?></a>
                </li>
            <?php endforeach; ?>
        </ul>

    </nav>

    <div class="menuAllListBx">
        <ul class="ulmenuAllListBx">
            <?php foreach ($terms as $term): ?>
                <li id="limenuAllListBx<?php echo $term->term_id; ?>" class="limenuAllListBx">
                    <h2 class="cl_282828 fw_700 h2BtnmenuAllListBx"><?php echo $term->name; ?></h2>

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
                        <ul class="d_flex j_between row ulSubmenuAllList">
                            <?php while ($query1->have_posts()): ?>
                                <?php $query1->the_post(); ?>
                                <?php $img = get_post_thumbsdata($post->ID); ?>
                                <li class="liSubmenuAllList">
                                    <a class="d_flex j_between ali_center undernone btnSubmenuAllList" href="<?php echo get_permalink($post->ID); ?>">
                                        <figure class="thumbsSubmenuAllList">
                                            <?php if (!empty($img[0])): ?>
                                                <img loading="lazy" src="<?php echo $img[0]; ?>" alt="<?php echo get_the_title($post->ID); ?>" width="<?php echo $img[1]; ?>" height="<?php echo $img[2]; ?>">
                                            <?php else: ?>
                                                <img loading="lazy" src="<?php echo get_bloginfo('template_url'); ?>/img/nonthumbs.png" alt="<?php echo get_the_title($post->ID); ?>" width="<?php echo $img[1]; ?>" height="<?php echo $img[2]; ?>">
                                            <?php endif; ?>
                                        </figure>
                                        <section class="secSubmenuAllList">
                                            <p class="cl_282828 fw_500 txtBtnSubmenuAllList">
                                                <?php echo get_the_title($post->ID); ?>
                                            </p>
                                            <p class="cl_282828 fw_500 priceBtnSubmenuAllList">
                                                <?php echo scf::get('tdMenu'); ?>
                                            </p>
                                            <p class="cl_282828 fw_500 tyusyakuBtnSubmenuAllList">
                                                <?php echo scf::get('alertMenu'); ?>
                                            </p>
                                        </section>

                                        <figure class="iconBtnSubmenuAllList">
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