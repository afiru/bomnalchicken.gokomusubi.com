<div id="access" class="bg_fff access">
    <!-- bg:../img/access.png -->
    <div class="accessLxn">
        <div class="d_flex j_between topAccessInfo">
            <section class="titleTopAccess">
                <h2 class="cl_EE952D Mochiy fw_400 h2TopAccess"><?php echo esc_html('店舗情報'); ?></h2>
                <div class="bg_F4DB17 brdTopAccess"></div>
                <p class="cl_E9483E fw_800 en rybyTopAccess"><?php echo esc_html('Access'); ?></p>
            </section>

            <ul class="d_flex j_end row ulTopAccess">
                <?php foreach (scf::get('snsLinks', 32) as $fields): ?>
                    <?php $img = get_scf_img_loop_url_id($fields['imgSns']); ?>
                    <li class="liTopAccess">
                        <a class="undernone d_block btnTopAccess" href="<?php echo esc_url($fields['urlSns']); ?>" target="_blank" rel="noopener noreferrer">
                            <img loading="lazy" src="<?php echo esc_url($img[0]); ?>" alt="" width="<?php echo esc_attr($img[1]); ?>" height="<?php echo esc_attr($img[2]); ?>">
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <section class="secAccessMain">
            <h2 class="cl_282828 fw_800 h2AccessMain">
                <img loading="lazy" src="<?php echo esc_url(get_bloginfo('template_url') . '/img/h2AccessMain.png'); ?>" alt="" width="248" height="30">
            </h2>

            <ul class="addressAccessMain">
                <?php foreach (scf::get('tableAccess', 32) as $fields): ?>
                    <li class="d_flex j_between row liAddressAccessMain">
                        <h3 class="cl_282828 fw_500 maru h3LiAddressAccessMain"><?php echo esc_html($fields['thAccess']); ?></h3>
                        <p class="cl_282828 fw_500 maru txtLiAddressAccessMain"><?php echo esc_html($fields['tdAccess']); ?></p>
                    </li>
                <?php endforeach; ?>
            </ul>

            <div class="mapAddressAccessMain">
                <?php echo scf::get('googlemapIframe', 32); ?>
            </div>

            <div class="btnAddressBtmNavHeadeLxn">
                <a class="d_flex j_center ali_center bg_FBEBEC cl_EB53A2 Mochiy fw_400 btnAddressBtmNavHeade" href="<?php echo esc_url(scf::get('urlGoogleMap', 32)); ?>" target="_blank" rel="noopener noreferrer">
                    <span class="iconBtnAddressBtmNavHeade"><?php echo esc_html('店舗までの経路はこちら'); ?></span>
                </a>
            </div>
        </section>
    </div>
</div>