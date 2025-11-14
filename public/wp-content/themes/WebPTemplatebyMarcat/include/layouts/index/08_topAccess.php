<div id="access" class="bg_FBEBEC access">
    <!--
    bg:../img/access.jpg
    -->
    <div class="accessLxn">
        <div class="d_flex j_between topAccessInfo">
            <section class="titleTopAccess">
                <h2 class="cl_282828 fw_800 h2TopAccess">店舗情報</h2>
                <div class="bg_B1B1B1 brdTopAccess"></div>
                <p class="cl_282828 fw_800 rybyTopAccess">Access</p>
            </section>
            <ul class="d_flex j_end row ulTopAccess">
                <?php foreach (scf::get('snsLinks', 32) as $fields): ?>
                    <?php $img = get_scf_img_loop_url_id($fields['imgSns']); ?>
                    <li class="liTopAccess">
                        <a class="undernone d_block btnTopAccess" href="<?php echo $fields['urlSns']; ?> " target="_blank">
                            <img loading="lazy" src="<?php echo $img[0]; ?>" alt="" width="<?php echo $img[1]; ?>" height="<?php echo $img[2]; ?>">
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <section class="secAccessMain">
            <h2 class="cl_282828 fw_800 h2AccessMain">
                <img loading="lazy" src="<?php echo get_bloginfo('template_url'); ?>/img/h2AccessMain.png" alt="" width="248" height="30">
            </h2>
            <ul class="addressAccessMain">
                <?php foreach (scf::get('tableAccess', 32) as $fields): ?>
                    <li class="d_flex j_between row liAddressAccessMain">
                        <h3 class="cl_282828 fw_500 maru h3LiAddressAccessMain"><?php echo $fields['thAccess']; ?></h3>
                        <p class="cl_282828 fw_500 maru txtLiAddressAccessMain"><?php echo $fields['tdAccess']; ?></p>
                    </li>
                <?php endforeach; ?>
            </ul>

            <div class="mapAddressAccessMain">
                <?php echo scf::get('googlemapIframe', 32); ?>
            </div>

            <div class="btnAddressBtmNavHeadeLxn">
                <a class="d_flex j_center ali_center bg_241A08 cl_282828 fw_800 kaisei btnAddressBtmNavHeade" href="<?php echo scf::get('urlGoogleMap', 32); ?>" target="_blank">
                    <span class="iconBtnAddressBtmNavHeade">店舗までの経路はこちら</span>
                </a>
            </div>
        </section>
    </div>
</div>