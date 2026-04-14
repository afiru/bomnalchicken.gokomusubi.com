<div class="bg_fff singleMenuLxn">
    <div class="menuSingle">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php
                $url_encode   = urlencode(get_permalink());
                $title_encode = urlencode(get_the_title());
                $nowcats      = get_the_category();
                ?>
        <div class="singleNews">
            <div class="d_flex j_start ali_center dateCatNewsLoop">
                <time class="cl_241A08 fw_500 mincho timeCatNewsLoop">
                    <?php echo esc_html(get_the_date('Y.m.d')); ?>
                </time>
                <p class="cl_241A08 fw_500 mincho catCatNewsLoop">
                    <?php echo esc_html($nowcats[0]->name ?? ''); ?>
                </p>
                <?php get_new_flug(get_the_date('Y-m-d')); ?>
            </div>

            <h1 class="cl_241A08 Mochiy fw_500 h3CatNewsLoop">
                <?php echo esc_html(get_the_title()); ?>
            </h1>

            <div class="brdSingleCat"></div>

            <div class="cl_241A08 cntSingleCat">
                <?php the_content(); ?>
            </div>


            <ul class="d_flex j_end ulShareSingleNewsBoxFx">
                <li class="liShareSingleNewsBox">
                    <a class="btnSingleColumnSnS" target="_blank" rel="noopener noreferrer" href="<?php echo esc_url('https://line.me/R/msg/text/?' . $title_encode . '%0A' . $url_encode); ?>">
                        <img loading="lazy" src="<?php echo esc_url(get_template_directory_uri() . '/img/snsLine.svg'); ?>" alt="Lineでシェア" width="20" height="20">
                    </a>
                </li>
                <li class="liShareSingleNewsBox">
                    <a class="btnSingleColumnSnS" target="_blank" rel="noopener noreferrer" href="<?php echo esc_url('https://www.facebook.com/share.php?u=' . $url_encode); ?>">
                        <img loading="lazy" src="<?php echo esc_url(get_template_directory_uri() . '/img/snsFaceBook.svg'); ?>" alt="Facebookでシェア" width="20" height="20">
                    </a>
                </li>
                <li class="liShareSingleNewsBox">
                    <a class="btnSingleColumnSnS" target="_blank" rel="noopener noreferrer" href="<?php echo esc_url('https://twitter.com/share?url=' . $url_encode . '&text=' . $title_encode); ?>">
                        <img loading="lazy" src="<?php echo esc_url(get_template_directory_uri() . '/img/snsX.svg'); ?>" alt="Xでシェア" width="20" height="20">
                    </a>
                </li>
            </ul>
        </div>
        <?php endwhile; endif; ?>
    </div>
    <?php
    $prev = get_adjacent_post(true, '', true, 'category');
    $next = get_adjacent_post(true, '', false, 'category');
    ?>
    <div class="mincho infoSinglePager">
        <div class="d_flex j_between ali_center pagerTopicsMainSingle">

            <p class="prevSinglePagerWap">
                <?php if (!empty($prev)): ?>
                <a class="maru d_flex j_between ali_center cl_EE952D fw_500 undernone txtset prevSinglePager" href="<?php echo esc_url(get_permalink($prev->ID)); ?>">
                    前のお知らせ
                </a>
                <?php endif; ?>
            </p>

            <div class="t_center moreTopicsArchive">
                <a class="cl_EE952D fw_500 txtset undernone btnMoreTopicsArchive" href="<?php echo esc_url(home_url('/news/')); ?>">
                    <p class="maru iconMoreTopicsArchive">一覧に戻る</p>
                </a>
            </div>

            <p class="nextSinglePagerWap">
                <?php if (!empty($next)): ?>
                <a class="maru d_flex j_between ali_center cl_EE952D fw_500 undernone txtset nextSinglePager" href="<?php echo esc_url(get_permalink($next->ID)); ?>">
                    次のお知らせ
                </a>
                <?php endif; ?>
            </p>
        </div>
    </div>
</div>

<?php
$args = [
    'post_type'      => 'post',
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
    'cat'            => 1,
    'posts_per_page' => 3,
    'no_found_rows'  => true,
];
$query1 = new WP_Query($args);
?>

<?php if ($query1->have_posts()) : ?>
<div id="news" class="bg_fff topNews otherSingleNews">
    <nav class="topNewsLoop">
        <ul class="ulTopNewsLoop">
            <?php while ($query1->have_posts()) : $query1->the_post(); ?>
            <?php
                    $nowcats = get_the_category();
                    $img = get_post_thumbsdata(get_the_ID());
                    ?>
            <li class="liTopNewsLoop">
                <a class="d_flex j_between undernone btnTopNewsLoop" href="<?php echo esc_url(get_the_permalink()); ?>">
                    <figure class="iconbtnTopNewsLoop">
                        <?php if (!empty($img[0])) : ?>
                        <img loading="lazy" src="<?php echo esc_url($img[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" width="<?php echo esc_attr($img[1]); ?>" height="<?php echo esc_attr($img[2]); ?>">
                        <?php else : ?>
                        <img loading="lazy" src="<?php echo esc_url(get_template_directory_uri() . '/img/nonthumbs.svg'); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" width="<?php echo esc_attr($img[1]); ?>" height="<?php echo esc_attr($img[2]); ?>">
                        <?php endif; ?>
                    </figure>

                    <section class="secBtnTopNewsLoop">
                        <div class="d_flex j_start ali_center dateTopNewsLoop">
                            <time class="cl_241A08 fw_500 mincho timeTopNewsLoop">
                                <?php echo esc_html(get_the_date('Y.m.d')); ?>
                            </time>
                            <p class="cl_241A08 fw_500 mincho catTopNewsLoop">
                                <?php echo esc_html($nowcats[0]->name ?? ''); ?>
                            </p>
                            <?php get_new_flug(get_the_date('Y-m-d')); ?>
                        </div>
                        <h3 class="cl_241A08 Mochiy fw_500 h3TopNewsLoop">
                            <?php echo esc_html(get_the_title()); ?>
                        </h3>
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