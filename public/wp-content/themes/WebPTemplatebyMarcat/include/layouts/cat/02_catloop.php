<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'post_type' => 'post',
    'cat' => $cat,
    'posts_per_page' => 10,
    'order' => 'ASC',
    'orderby' => 'menu_order',
    'paged' => $paged
);
$query1 = new WP_Query($args);
?>
<ul class="d_flex j_between newsTab">
    <li class="liNewsTab01">
        <a class="undernone cl_fff bg_EC5EA5 btnliNewsTab <?php echo ($cat === 3) ? 'active' : ''; ?>" href="<?php echo esc_url(get_category_link(3)); ?>">
            <?php echo esc_html('イベント'); ?>
        </a>
    </li>
    <li class="liNewsTab01">
        <a class="undernone cl_fff bg_EC5EA5 btnliNewsTab <?php echo ($cat === 4) ? 'active' : ''; ?>" href="<?php echo esc_url(get_category_link(4)); ?>">
            <?php echo esc_html('お休み'); ?>
        </a>
    </li>
    <li class="liNewsTab01">
        <a class="undernone cl_fff bg_EC5EA5 btnliNewsTab <?php echo ($cat === 12) ? 'active' : ''; ?>" href="<?php echo esc_url(get_category_link(12)); ?>">
            <?php echo esc_html('値段変更'); ?>
        </a>
    </li>
    <li class="liNewsTab01">
        <a class="undernone cl_fff bg_EC5EA5 btnliNewsTab <?php echo ($cat === 1) ? 'active' : ''; ?>" href="<?php echo esc_url(get_category_link(1)); ?>">
            <?php echo esc_html('すべて'); ?>
        </a>
    </li>
</ul>

<div class="bg_fff catNewsLxn">
    <ul class="ulTopNewsLoop">
        <?php while ($query1->have_posts()) : $query1->the_post(); ?>
        <li class="liTopNewsLoop">
            <?php
                $nowcats = get_the_category();
                $img = get_post_thumbsdata(get_the_ID());
                ?>
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

    <div class="d_flex j_center Mochiy pagerNewsLoop">
        <?php wp_pagenavi(array('query' => $query1)); ?>
    </div>
</div>