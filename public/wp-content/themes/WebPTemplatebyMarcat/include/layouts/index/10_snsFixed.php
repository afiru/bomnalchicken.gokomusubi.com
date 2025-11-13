<div class="bg_A01D10 snsFooter" data-lenis-prevent>
    <div class="d_flex j_between ali_center snsFooterLxn">
        <div class=" d_flex j_between btnSnsFooterLxn">
            <a class="d_flex j_center ali_center bg_FBEBEC cl_282828 fw_800 kaisei btnSnsFooter" href="<?php echo scf::get('urlGoogleMap', 32); ?>" target="_blank">
                ナビを起動
            </a>
            <a class="cl_282828 bg_FBEBEC d_flex j_center ali_center bg_FBEBEC cl_fff fw_800 kaisei btnSnsFooter" href="https://liff.line.me/1645278921-kWRPP32q/?accountId=048mzzer" target="_blank">
                ご予約
            </a>
        </div>
        <nav class="d_flex j_between ali_center snsCheack">
            <ul class="d_flex j_end ulSnsCheack">
                <?php foreach (scf::get('snsLinks', 32) as $fields): ?>
                    <?php $img = get_scf_img_loop_url_id($fields['imgSns']); ?>
                    <li class="liSnsCheack">
                        <a class="undernone d_block btnSnsCheack" href="<?php echo $fields['urlSns']; ?> " target="_blank">
                            <img loading="lazy" src="<?php echo $img[0]; ?>" alt="" width="<?php echo $img[1]; ?>" height="<?php echo $img[2]; ?>">
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>
</div>