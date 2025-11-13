<?php if (have_posts()) while (have_posts()) : the_post();  ?>
    <?php $img = get_post_thumbsdata($post->ID); ?>
    <div class="menuSingle">
        <div class="menuDetailSingle">
            <div class="d_flex j_between ali_center titleMenuDetailSingle">
                <h2 class="cl_282828 fw_800 h2TitleMenuDetailSingle"><?php echo get_the_title($post->ID); ?></h2>
            </div>

            <figure class="thumbsDetailSingle">
                <?php if (!empty($img[0])): ?>
                    <img loading="lazy" src="<?php echo $img[0]; ?>" alt="<?php echo get_the_title($post->ID); ?>" width="<?php echo $img[1]; ?>" height="<?php echo $img[2]; ?>">
                <?php else: ?>
                    <img loading="lazy" src="<?php echo get_bloginfo('template_url'); ?>/img/nonthumbs.svg" alt="<?php echo get_the_title($post->ID); ?>" width="<?php echo $img[1]; ?>" height="<?php echo $img[2]; ?>">
                <?php endif; ?>
            </figure>

            <?php if (!empty(scf::get('tdMenu'))): ?>
                <p class="cl_282828 fw_400 txtset alertMenu">
                    お値段：<?php echo scf::get('tdMenu'); ?>
                </p>
            <?php endif; ?>

            <?php if (!empty(scf::get('alertMenu'))): ?>
                <p class="cl_282828 fw_400 txtset alertMenu">
                    <?php echo scf::get('alertMenu'); ?>
                </p>
            <?php endif; ?>

            <?php the_content(); ?>

            <ul class="d_flex j_between row photosMenuDetailSingle">
                <?php foreach (scf::get('imgsPriceMenu') as $fields): ?>
                    <?php $img = get_scf_img_loop_url_id($fields['imgPriceMenu']); ?>
                    <?php if (!empty($img[0])): ?>
                        <li class="liPhotosMenuDetailSingle">
                            <a class="btnPhotosMenuDetailSingle" href="<?php echo $img[0]; ?>" data-lightbox="image-1" data-title="<?php echo $fields['txtPriceMenu']; ?> ">
                                <img loading="lazy" src="<?php echo $img[0]; ?>" alt="<?php echo $fields['txtPriceMenu']; ?>についての画像" width="<?php echo $img[1]; ?>" height="<?php echo $img[2]; ?>">
                                <figure class="iconPhotosMenuDetailSingle">
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


        </div>
    </div>
<?php endwhile; // end of the loop.
?>
<?php
$prev = get_adjacent_custom_post(true, '', true, 'menu_category', 'menu');
$next = get_adjacent_custom_post(true, '', false, 'menu_category', 'menu');
?>
<div class="mincho infoSinglePager">
    <div class="d_flex j_center ali_center pagerTopicsMainSingle">

        <div class="prevSinglePagerWap">
            <?php if (!empty($prev)): ?>
                <a class="maru d_flex j_between ali_center cl_241A08 fw_400 undernone txtset prevSinglePager" href="<?php echo get_permalink($prev->ID); ?>">
                    ＜ 前のメニュー
                </a>
            <?php endif; ?>
        </div>

        <div class="t_center moreTopicsArchive">
            <a class="cl_241A08 fw_400 txtset undernone btnMoreTopicsArchive" href="<?php echo home_url('/menu/'); ?>">
                <span class="maru iconMoreTopicsArchive">一覧に戻る</span>
            </a>
        </div>

        <div class="nextSinglePagerWap">
            <?php if (!empty($next)): ?>
                <a class="maru d_flex j_between ali_center cl_241A08 fw_400 undernone txtset nextSinglePager" href="<?php echo get_permalink($next->ID); ?>">
                    次のメニュー ＞
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>