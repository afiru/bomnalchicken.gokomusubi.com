<section class="bg_fff nowNewsCnt jsnowNewsCnt">
    <h2 class="t_center cl_EE945C Mochiy fw_400 h2NowNewsCnt"></h2>
    <p class="t_center cl_020202 fw_400 txtNowNewsCntTop"></p>

    <h2 class="t_center cl_fff fw_800 h2NowNewsCnt h2NowNewsCnt02"></h2>
    <time class="d_block t_center cl_fff fw_400 txtNowNewsCnt"></time>
    <ul class="d_flex j_center ali_center ulNowNewsCnt">
        <li class="d_flex j_start ali_center liNowNewsCnt">
            <h3 class="cl_fff fw_600 h3liNowNewsCnt"></h3>
            <p class="cl_fff fw_400 txtliNowNewsCnt"><span class="fw_800"></span></p>
        </li>
        <li class="d_flex j_start ali_center liNowNewsCnt">
            <h3 class="cl_fff fw_600 h3liNowNewsCnt"></h3>
            <p class="cl_fff fw_400 txtliNowNewsCnt"><span class="fw_800"></span></p>
        </li>
        <li class="d_flex j_start ali_center liNowNewsCnt">
            <h3 class="cl_fff fw_600 h3liNowNewsCnt"></h3>
            <p class="cl_fff fw_400 txtliNowNewsCnt"><span class="fw_800"></span></p>
        </li>
    </ul>
</section>

<?php
$args = [
    'post_type' => 'post',
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'cat' => 1,
    'posts_per_page' => 5,
    'no_found_rows' => true,
];

$query1 = new WP_Query($args);
?>

<?php if ($query1->have_posts()): ?>
    <div id="news" class="bg_fff topNews">
        <section class="topNewsTitle">
            <h2 class="t_center cl_EE952D Mochiy fw_800 h2TopNews"><?php echo esc_html('新着情報'); ?></h2>
            <div class="bg_B1B1B1 brdTopNews"></div>
            <p class="t_center cl_E9483E fw_800 en rybyTopNews"><?php echo esc_html('NEWS'); ?></p>
        </section>

        <nav class="topNewsLoop">
            <ul class="ulTopNewsLoop">
                <?php while ($query1->have_posts()): $query1->the_post(); ?>
                    <?php
                    $nowcats = get_the_category(get_the_ID());
                    $img = get_post_thumbsdata(get_the_ID());
                    ?>
                    <li class="liTopNewsLoop">
                        <a class="d_flex j_between undernone btnTopNewsLoop" href="<?php echo esc_url(get_the_permalink()); ?>">
                            <figure class="iconbtnTopNewsLoop">
                                <?php if (!empty($img[0])): ?>
                                    <img loading="lazy" src="<?php echo esc_url($img[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" width="<?php echo esc_attr($img[1]); ?>" height="<?php echo esc_attr($img[2]); ?>">
                                <?php else: ?>
                                    <img loading="lazy" src="<?php echo esc_url(get_template_directory_uri() . '/img/nonthumbs.svg'); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" width="<?php echo esc_attr($img[1]); ?>" height="<?php echo esc_attr($img[2]); ?>">
                                <?php endif; ?>
                            </figure>

                            <section class="secBtnTopNewsLoop">
                                <div class="d_flex j_start ali_center Mochiy dateTopNewsLoop">
                                    <time class="cl_241A08 Mochiy fw_500 mincho timeTopNewsLoop"><?php echo esc_html(get_the_date('Y.m.d')); ?></time>
                                    <p class="cl_241A08 Mochiy fw_500 mincho catTopNewsLoop"><?php echo esc_html($nowcats[0]->name ?? ''); ?></p>
                                    <?php get_new_flug(get_the_date('Y-m-d')); ?>
                                </div>
                                <h3 class="cl_241A08 Mochiy fw_500 h3TopNewsLoop"><?php echo esc_html(get_the_title()); ?></h3>
                            </section>
                        </a>
                    </li>
                <?php endwhile;
                wp_reset_postdata(); ?>
            </ul>

            <div class="readmoneTopNewsLoop">
                <a class="d_flex j_center ali_center fw_800 cl_EB53A2 bg_FBEBEC Mochiy btnReadmoneTopNewsLoop" href="<?php echo esc_url(get_category_link(1)); ?>">
                    <?php echo esc_html('もっと見る'); ?>
                </a>
            </div>
        </nav>
    </div>
<?php endif; ?>