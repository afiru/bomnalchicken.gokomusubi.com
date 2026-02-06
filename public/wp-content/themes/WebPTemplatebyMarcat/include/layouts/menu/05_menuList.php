<?php $terms = get_terms(array('taxonomy' => 'menu_category', 'get' => 'all')); ?>
<div class="menuAllList">
    <div class="menuAllListBx">
        <ul class="ulmenuAllListBx">
            <?php foreach ($terms as $term): ?>
            <li id="limenuAllListBx<?php echo esc_attr($term->term_id); ?>" class="bg_fff limenuAllListBx">
                <section class="seclimenuAllListBx">
                    <h2 class="cl_E9483E fw_700 h2BtnmenuAllListBx">■<?php echo esc_html($term->name); ?></h2>

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
                    <ul class="d_flex j_between row ulSubmenuAllList">
                        <?php while ($query1->have_posts()): $query1->the_post(); ?>
                        <?php $img = get_post_thumbsdata(get_the_ID()); ?>
                        <li class="liSubmenuAllList">
                            <a class="d_flex j_between ali_center undernone btnSubmenuAllList" href="<?php echo esc_url(get_permalink()); ?>">
                                <figure class="thumbsSubmenuAllList">
                                    <?php if (!empty($img[0])): ?>
                                    <img loading="lazy" src="<?php echo esc_url($img[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" width="<?php echo esc_attr($img[1]); ?>" height="<?php echo esc_attr($img[2]); ?>">
                                    <?php else: ?>
                                    <img loading="lazy" src="<?php echo esc_url(get_template_directory_uri() . '/img/nonthumbs.png'); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" width="<?php echo esc_attr($img[1]); ?>" height="<?php echo esc_attr($img[2]); ?>">
                                    <?php endif; ?>
                                </figure>
                                <section class="secSubmenuAllList">
                                    <h3 class="cl_EE952D fw_800 txtBtnSubmenuAllList">
                                        <?php echo esc_html(get_the_title()); ?>
                                    </h3>
                                    <?php if (!empty(scf::get('tdMenu'))): ?>
                                    <p class="cl_282828 fw_500 priceBtnSubmenuAllList">
                                        お値段：<?php echo esc_html(scf::get('tdMenu')); ?>
                                    </p>
                                    <?php endif; ?>
                                    <p class="cl_282828 fw_500 tyusyakuBtnSubmenuAllList">
                                        <?php echo esc_html(scf::get('alertMenu')); ?>
                                    </p>
                                </section>

                                <figure class="iconBtnSubmenuAllList">
                                    <img loading="lazy" src="<?php echo esc_url(get_template_directory_uri() . '/img/iconBtnSubMenuGenreLxn.svg'); ?>" alt="" width="24" height="24">
                                </figure>
                            </a>
                        </li>
                        <?php endwhile; ?>
                    </ul>
                    <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                </section>

            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>