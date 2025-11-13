<?php
// fvSlider の投稿を取得
$slider_posts = get_posts(array(
    'post_type' => 'fvSlider',
    'posts_per_page' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC'
));

if ($slider_posts) : ?>
    <div class="swiper">
        <div class="swiper-wrapper">
            <?php foreach ($slider_posts as $post) : setup_postdata($post); ?>
                <?php
                // ファイル取得
                $file = SCF::get('fvSliderCnt', $post->ID);

                // リンク取得
                $link = SCF::get('urlSliderCnt', $post->ID);
                if ($file) {
                    $file_url = wp_get_attachment_url($file); // URL取得
                    $file_path = get_attached_file($file);   // サーバー上のパス
                    $ext = pathinfo($file_url, PATHINFO_EXTENSION); // 拡張子判定
                ?>
                    <div class="swiper-slide">
                        <a href="<?php echo esc_url($link); ?>" target="_blank">
                            <?php if (strtolower($ext) === 'mp4') : ?>
                                <video class="my-video" muted autoplay playsinline preload="metadata" width="100%">
                                    <source src="<?php echo esc_url($file_url); ?>" type="video/mp4">
                                    お使いのブラウザは動画タグに対応していません。
                                </video>
                            <?php else : ?>
                                <img src="<?php echo esc_url($file_url); ?>" alt="" style="width:100%;">
                            <?php endif; ?>
                        </a>
                    </div>
                <?php } ?>
            <?php endforeach;
            wp_reset_postdata(); ?>
        </div>

    </div>
<?php endif; ?>