<div id="floor" class="bg_fff topFloor bgTopFloor">
    <div class="pore topFloorLxn">
        <section class="titleTopFloor">
            <h2 class="cl_EE952D t_right Mochiy fw_400 h2TopFloor"><?php echo esc_html('こんな雰囲気です!'); ?></h2>
            <div class="bg_F4DB17 brdTopFloor"></div>
            <p class="cl_E9483E t_right fw_800 en ryshyadow rybyTopFloor"><?php echo esc_html('Floor'); ?></p>
        </section>

        <div class="d_flex j_between topFloorTentyo">
            <figure class="photoFloorTentyo">
                <?php $img = get_scf_img_url('imgFloorMain'); ?>
                <?php if (!empty($img[0])): ?>
                    <img loading="lazy" src="<?php echo esc_url($img[0]); ?>" alt="<?php echo esc_html(get_bloginfo('name')); ?>画像" width="<?php echo esc_attr($img[1]); ?>" height="<?php echo esc_attr($img[2]); ?>">
                <?php endif; ?>
            </figure>
            <section class="secFloorTentyo">
                <p class="cl_282828 text_justify fw_500 txtFloorTentyo">
                    <?php echo nl2br(esc_html(scf::get('txtFloorMain'))); ?>
                </p>
            </section>
        </div>

        <ul class="d_flex j_start row ulFloorTentyo">
            <?php foreach (scf::get('imgFloorsLoop') as $fields): ?>
                <?php $img = get_scf_img_loop_url_id($fields['imgFloorLoop']); ?>
                <?php if (!empty($img[0])): ?>
                    <li class="liFloorTentyo">
                        <a class="btnFloorTentyo" href="<?php echo esc_url($img[0]); ?>" data-lightbox="image-1" data-title="<?php echo esc_attr($fields['txtFloorLoop']); ?>">
                            <img loading="lazy" src="<?php echo esc_url($img[0]); ?>" alt="<?php echo esc_attr($fields['txtFloorLoop']); ?>についての画像" width="<?php echo esc_attr($img[1]); ?>" height="<?php echo esc_attr($img[2]); ?>">
                            <figure class="iconFloorTentyo">
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