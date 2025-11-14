<?php
// fvSlider の投稿を取得
$slider_posts = get_posts(array(
    'post_type' => 'faq',
    'posts_per_page' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC'
));
?>
<?php if ($slider_posts) : ?>
    <div class="price faqIndex">
        <div class="priceLxn faqIndexLxn">
            <section class="titleTopPrice">
                <h2 class="cl_282828 t_center fw_800 h2TopPrice">よくあるご質問</h2>
                <div class="bg_282828 brdTopPrice"></div>
                <p class="cl_282828 t_center fw_800 en rybyTopPrice">FAQ</p>
            </section>

            <ul class="ulFaq">
                <?php foreach ($slider_posts as $post) : setup_postdata($post); ?>
                    <li class="liFaq">
                        <div class="bg_325530 btnFaq jsbtnFaq off">
                            <section class="d_flex j_between ali_center jsbtnFaqFx btnFaqFx off">
                                <h2 class="cl_fff fw_800 h2btnFaq"><?php echo get_the_title($post->ID); ?></h2>
                                <div class="pore brdBtnFaq off">
                                    <span class="bg_fff brdBtmBtnFaq brdBtmBtnFaq01"></span>
                                    <span class="bg_fff brdBtmBtnFaq brdBtmBtnFaq02"></span>
                                </div>
                            </section>
                        </div>
                        <div class="faqDelitleiLxn jsFaqLxn">
                            <div class="cntFaq">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </li>
                <?php endforeach;
                wp_reset_postdata(); ?>
            </ul>
        </div>


    </div>
<?php endif; ?>