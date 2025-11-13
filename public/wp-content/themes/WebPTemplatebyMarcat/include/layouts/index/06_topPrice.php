<div id="price" class="bg_FBEBEC price">
    <!--
    bg:../img/bgPrice.png
    -->
    <div class="priceLxn">
        <section class="titleTopPrice">
            <h2 class="cl_fff fw_800 h2TopPrice">人気メニュー</h2>
            <div class="bg_B1B1B1 brdTopPrice"></div>
            <p class="cl_fff fw_800 en rybyTopPrice">Price</p>
        </section>

        <ul class="ulPriceTop">
            <?php foreach (scf::get('priceCats') as $fields): ?>
                <?php $term = get_term($fields);  ?>
                <li class="liPriceTop">
                    <h3 class="cl_fff fw_800 h3PriceTop">■&nbsp;<?php echo esc_html($term->name); ?></h3>
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
                                'terms'    => $fields,   // ← タームIDを配列または単体で渡す
                            ],
                        ],
                    ];
                    ?>
                    <?php $query1 = new WP_Query($args); ?>
                    <?php if ($query1->have_posts()): ?>


                        <?php while ($query1->have_posts()): ?>
                            <?php $query1->the_post(); ?>
                            <section class="secMainPrice">
                                <h4 class="cl_fff fw_800 h4MainPrice">-&nbsp;<?php echo get_the_title($post->ID); ?></h4>
                                <ul class="d_flex j_between row ulMainPriceSingle">
                                    <?php foreach (scf::get('menuContents') as $fields): ?>
                                        <?php if (!empty($fields['thMenu'])): ?>
                                            <li class="d_flex j_between liMainPrice">
                                                <h5 class="cl_fff fw_400 h5MainPrice"><?php echo $fields['thMenu']; ?></h5>
                                                <div class="cl_fff fw_400 dottoMainPrice">：</div>
                                                <p class="cl_fff fw_400 t_right tdMainPrice"><?php echo $fields['tdMenu']; ?></p>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                                <?php if (!empty(scf::get('alertMenu'))): ?>
                                    <p class="cl_fff fw_400 text_justify txtalertMenu">
                                        <?php echo scf::get('alertMenu'); ?>
                                    </p>
                                <?php endif; ?>
                                <ul class="d_flex j_start row ulPriceBtm">
                                    <?php foreach (scf::get('imgsPriceMenu') as $fields): ?>
                                        <?php $img = get_scf_img_loop_url_id($fields['imgPriceMenu']); ?>
                                        <?php if (!empty($img[0])): ?>
                                            <li class="liPriceBtm">
                                                <a class="btnPriceBtm" href="<?php echo $img[0]; ?>" data-lightbox="image-1" data-title="<?php echo $fields['txtPriceMenu']; ?> ">
                                                    <img loading="lazy" src="<?php echo $img[0]; ?>" alt="<?php echo $fields['txtPriceMenu']; ?>についての画像" width="<?php echo $img[1]; ?>" height="<?php echo $img[2]; ?>">
                                                    <figure class="iconPriceBtm">
                                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <mask id="mask0_1320_1840" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="20" height="20">
                                                                <rect width="20" height="20" fill="#D9D9D9" />
                                                            </mask>
                                                            <g mask="url(#mask0_1320_1840)">
                                                                <rect width="20" height="20" fill="white" />
                                                                <path d="M3.33398 16.6668V12.5002H4.16732V15.2437L7.16732 12.2437L7.75711 12.8335L4.75711 15.8335H7.50065V16.6668H3.33398ZM12.5007 16.6668V15.8335H15.2442L12.2442 12.8335L12.834 12.2437L15.834 15.2437V12.5002H16.6673V16.6668H12.5007ZM7.16732 7.75662L4.16732 4.75662V7.50016H3.33398V3.3335H7.50065V4.16683H4.75711L7.75711 7.16683L7.16732 7.75662ZM12.834 7.75662L12.2442 7.16683L15.2442 4.16683H12.5007V3.3335H16.6673V7.50016H15.834V4.75662L12.834 7.75662ZM10.0007 11.106C9.69662 11.106 9.43628 10.9977 9.21961 10.7812C9.00308 10.5645 8.89482 10.3042 8.89482 10.0002C8.89482 9.69614 9.00308 9.43579 9.21961 9.21912C9.43628 9.00259 9.69662 8.89433 10.0007 8.89433C10.3047 8.89433 10.565 9.00259 10.7817 9.21912C10.9982 9.43579 11.1065 9.69614 11.1065 10.0002C11.1065 10.3042 10.9982 10.5645 10.7817 10.7812C10.565 10.9977 10.3047 11.106 10.0007 11.106Z" fill="#282828" />
                                                            </g>
                                                        </svg>
                                                    </figure>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            </section>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>

                    <?php endif; ?>

                    <?php if (!empty(scf::get('alertMenu'))): ?>
                        <p class="cl_fff fw_400 text_justify txtBtmMainPrice">
                            <?php echo scf::get('alertMenu'); ?>
                        </p>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>


    </div>
</div>