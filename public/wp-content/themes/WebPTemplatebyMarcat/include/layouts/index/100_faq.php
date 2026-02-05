<?php
// FAQ の投稿を取得
$faq_posts = get_posts([
    'post_type'      => 'faq',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
]);
?>

<?php if ($faq_posts) : ?>
    <div class="bg_fff faqIndex">
        <!--bg:../img/faq.png-->
        <div class="priceLxn faqIndexLxn">
            <section class="titleTopPrice">
                <h2 class="cl_EE952D Mochiy fw_400 h2TopPrice"><?php echo esc_html('よくあるご質問'); ?></h2>
                <div class="bg_F4DB17 brdTopPrice"></div>
                <p class="cl_E9483E fw-800 en rybyTopPrice"><?php echo esc_html('FAQ'); ?></p>
            </section>

            <ul class="ulFaq">
                <?php foreach ($faq_posts as $post) : setup_postdata($post); ?>
                    <li class="liFaq">
                        <div class="bg_FBEBEC btnFaq jsbtnFaq off">
                            <section class="d_flex j_between ali_center jsbtnFaqFx btnFaqFx off">
                                <h2 class="cl_EB53A2 fw-800 h2btnFaq"><?php echo esc_html(get_the_title($post->ID)); ?></h2>
                                <div class="pore brdBtnFaq off">
                                    <span class="bg_EB53A2 brdBtmBtnFaq brdBtmBtnFaq01"></span>
                                    <span class="bg_EB53A2 brdBtmBtnFaq brdBtmBtnFaq02"></span>
                                </div>
                            </section>
                        </div>
                        <div class="faqDelitleiLxn jsFaqLxn">
                            <div class="cntFaq">
                                <?php echo wp_kses_post(get_the_content(null, false, $post->ID)); ?>
                            </div>
                        </div>
                    </li>
                <?php endforeach;
                wp_reset_postdata(); ?>
            </ul>
        </div>
    </div>
<?php endif; ?>