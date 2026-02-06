<div class="bg_EB53A2 snsFooter" data-lenis-prevent>
    <div class="d_flex j_between ali_center snsFooterLxn">
        <div class="d_flex j_between btnSnsFooterLxn">
            <a class="d_flex j_center ali_center bg_FBEBEC cl_EB53A2 Mochiy fw_400 btnSnsFooter" href="<?php echo esc_url(scf::get('urlGoogleMap', 32)); ?>" target="_blank" rel="noopener noreferrer">
                <?php echo esc_html('ナビを起動'); ?>
            </a>
            <a class="cl_EB53A2 bg_FBEBEC d_flex j_center ali_center Mochiy fw_400 btnSnsFooter" href="https://liff.line.me/1645278921-kWRPP32q/?accountId=048mzzer" target="_blank" rel="noopener noreferrer">
                <?php echo esc_html('ご予約'); ?>
            </a>
        </div>

        <nav class="d_flex j_between ali_center snsCheack">
            <ul class="d_flex j_end ulSnsCheack">
                <?php foreach (scf::get('snsLinks', 32) as $fields): ?>
                    <?php $img = get_scf_img_loop_url_id($fields['imgSns']); ?>
                    <li class="liSnsCheack">
                        <a class="undernone d_block btnSnsCheack" href="<?php echo esc_url($fields['urlSns']); ?>" target="_blank" rel="noopener noreferrer">
                            <img loading="lazy" src="<?php echo esc_url($img[0]); ?>" alt="" width="<?php echo esc_attr($img[1]); ?>" height="<?php echo esc_attr($img[2]); ?>">
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>
</div>