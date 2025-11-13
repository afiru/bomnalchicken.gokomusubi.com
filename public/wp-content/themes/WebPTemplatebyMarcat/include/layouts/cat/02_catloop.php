<?php
$paged = (get_query_var('page')) ? get_query_var('page') : 1;
$args = array(
    'post_type' => 'post',
    'cat' => $cat,
    'posts_per_page' => 10,
    'order' => 'ASC',
    'orderby' => 'menu_order',
    'paged' => get_query_var('paged')
);
$query1 = new WP_Query($args);
?>
<ul class="d_flex j_between newsTab">
    <li class="liNewsTab01">
        <a class="undernone cl_fff bg_A01D10 btnliNewsTab <?php if ($cat === 3) {
                                                                echo 'active';
                                                            } ?>" href="<?php echo get_category_link(3); ?>">イベント</a>
    </li>
    <li class="liNewsTab01">
        <a class="undernone cl_fff bg_A01D10 btnliNewsTab <?php if ($cat === 4) {
                                                                echo 'active';
                                                            } ?>" href="<?php echo get_category_link(4); ?>">お休み</a>
    </li>
    <li class="liNewsTab01">
        <a class="undernone cl_fff bg_A01D10 btnliNewsTab <?php if ($cat === 12) {
                                                                echo 'active';
                                                            } ?>" href="<?php echo get_category_link(12); ?>">値段変更</a>
    </li>
    <li class="liNewsTab01">
        <a class="undernone cl_fff bg_A01D10 btnliNewsTab <?php if ($cat === 1) {
                                                                echo 'active';
                                                            } ?>" href="<?php echo get_category_link(1); ?>">すべて</a>
    </li>
</ul>
<ul class="ulTopNewsLoop">
    <?php while ($query1->have_posts()): ?>
        <?php $query1->the_post(); ?>
        <li class="liTopNewsLoop">
            <?php
            $nowcats = get_the_category($post->ID);
            $img = get_post_thumbsdata($post->ID);
            ?>
            <a class="d_flex j_between undernone btnTopNewsLoop" href="<?php echo get_the_permalink($post->ID); ?>">
                <figure class="iconbtnTopNewsLoop">
                    <?php if (!empty($img[0])): ?>
                        <img loading="lazy" src="<?php echo $img[0]; ?>" alt="<?php echo get_the_title($post->ID); ?>" width="<?php echo $img[1]; ?>" height="<?php echo $img[2]; ?>">
                    <?php else: ?>
                        <img loading="lazy" src="<?php echo get_bloginfo('template_url'); ?>/img/nonthumbs.svg" alt="<?php echo get_the_title($post->ID); ?>" width="<?php echo $img[1]; ?>" height="<?php echo $img[2]; ?>">
                    <?php endif; ?>
                </figure>

                <section class="secBtnTopNewsLoop">
                    <div class="d_flex j_start ali_center dateTopNewsLoop">
                        <time class="cl_241A08 fw_500 mincho timeTopNewsLoop"><?php echo get_the_date('Y.m.d', $post->ID); ?></time>
                        <p class="cl_241A08 fw_500 mincho catTopNewsLoop"><?php echo $nowcats[0]->name; ?></p>
                        <?php get_new_flug(get_the_date('Y-m-d', $post->ID)); ?>
                    </div>
                    <h3 class="cl_241A08 fw_500 h3TopNewsLoop"><?php echo get_the_title($post->ID); ?></h3>
                </section>

            </a>
        </li>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
</ul>

<div class="d_flex j_center pagerNewsLoop">
    <?php wp_pagenavi(array('query' => $query1)); ?>
</div>