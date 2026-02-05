<?php
if (is_home() or is_front_page()) {
    $homeurl = "";
} else {
    $homeurl = home_url('/');
} ?>
<div class="header">
    <div class="headerBaseTopFxLxn">
        <div class="d_flex j_between ali_center headerBaseFx">
            <a class="logoHeaderBase" href="<?php echo home_url('/'); ?>">
                <img loading="lazy" src="<?php echo esc_url(get_bloginfo('template_url')); ?>/img/logoHeaderBase.png" alt="<?php bloginfo('name'); ?>" width="250" height="36">
            </a>
            <div class="menuHeaderPc jsmenuHeaderPc off">
                <div class="menuHeaderPcIn">
                    <span class="brdmenuHeaderPc brdmenuHeaderPc01"></span>
                    <span class="brdmenuHeaderPc brdmenuHeaderPc02"></span>
                    <span class="brdmenuHeaderPc brdmenuHeaderPc03"></span>
                </div>
                <span class="en txtMenuHeader">MENU</span>
            </div>
        </div>
    </div>

    <div class="navHeaderBase bgnavHeaderBase">
        <div class="bg_fff navHeaderBaseLxn bgNavHeaderBaseLxn">
            <!--
            bg:../img/bgNavHeaderBaseLxn.png
            -->
            <nav class="navHeaderBaseMain">
                <ul class="ulNavHeaderBase">
                    <li class="liNavHeaderBase">
                        <a class="d_flex j_between ali_center undernone btnNavHeaderBase" href="<?php echo $homeurl; ?>#scrolltop">
                            <!--bg:../img/btnNavHeaderBase.svg-->
                            <section class="secNavHeaderBase">
                                <h2 class="cl_EE945C Mochiy fw_400 h2NavHeaderBase">ホーム</h2>
                                <p class="en cl_282828 fw_500 rubyNavHeaderBase">HOME</p>
                            </section>
                        </a>
                    </li>

                    <li class="liNavHeaderBase">
                        <a class="d_flex j_between ali_center undernone btnNavHeaderBase" href="<?php echo get_category_link(1); ?>">
                            <section class="secNavHeaderBase">
                                <h2 class="cl_EE945C Mochiy fw_400 h2NavHeaderBase">新着情報</h2>
                                <p class="en cl_282828 fw_500 rubyNavHeaderBase">HOME</p>
                            </section>
                        </a>
                    </li>

                    <li class="liNavHeaderBase">
                        <a class="d_flex j_between ali_center undernone btnNavHeaderBase" href="<?php echo $homeurl; ?>#about">
                            <section class="secNavHeaderBase">
                                <h2 class="cl_EE945C Mochiy fw_400 h2NavHeaderBase">お店について</h2>
                                <p class="en cl_282828 fw_500 rubyNavHeaderBase">ABOUT</p>
                            </section>
                        </a>
                    </li>

                    <li class="liNavHeaderBase">
                        <a class="d_flex j_between ali_center undernone btnNavHeaderBase" href="<?php echo $homeurl; ?>#floor">
                            <section class="secNavHeaderBase">
                                <h2 class="cl_EE945C Mochiy fw_400 h2NavHeaderBase">お店の雰囲気</h2>
                                <p class="en cl_282828 fw_500 rubyNavHeaderBase">FLOOR</p>
                            </section>
                        </a>
                    </li>

                    <li class="liNavHeaderBase">
                        <a class="d_flex j_between ali_center undernone btnNavHeaderBase" href="<?php echo $homeurl; ?>#event">
                            <section class="secNavHeaderBase">
                                <h2 class="cl_EE945C Mochiy fw_400 h2NavHeaderBase">イベント</h2>
                                <p class="en cl_282828 fw_500 rubyNavHeaderBase">event</p>
                            </section>
                        </a>
                    </li>

                    <li class="liNavHeaderBase">
                        <a class="d_flex j_between ali_center undernone btnNavHeaderBase" href="<?php echo home_url('/menu/'); ?>">
                            <section class="secNavHeaderBase">
                                <h2 class="cl_EE945C Mochiy fw_400 h2NavHeaderBase">イベント</h2>
                                <p class="en cl_282828 fw_500 rubyNavHeaderBase">event</p>
                            </section>
                        </a>
                    </li>

                    <li class="liNavHeaderBase">
                        <a class="d_flex j_between ali_center undernone btnNavHeaderBase" href="<?php echo home_url('/menu/'); ?>">
                            <section class="secNavHeaderBase">
                                <h2 class="cl_EE945C Mochiy fw_800 h2NavHeaderBase">メニュー</h2>
                                <p class="en cl_282828 fw_500 rubyNavHeaderBase">MENU</p>
                            </section>
                        </a>
                    </li>

                    <li class="liNavHeaderBase">
                        <a class="d_flex j_between ali_center undernone btnNavHeaderBase" href="<?php echo get_permalink(352); ?>">
                            <section class="secNavHeaderBase">
                                <h2 class="cl_EE945C Mochiy fw_800 h2NavHeaderBase">ボムカフェについて</h2>
                                <p class="en cl_282828 fw_500 rubyNavHeaderBase">BomCafe</p>
                            </section>
                        </a>
                    </li>

                    <li class="liNavHeaderBase">
                        <a class="d_flex j_between ali_center undernone btnNavHeaderBase" href="https://liff.line.me/1645278921-kWRPP32q/?accountId=048mzzer" target="_blank">
                            <section class="secNavHeaderBase">
                                <h2 class="cl_EE945C Mochiy fw_800 h2NavHeaderBase">ご予約</h2>
                                <p class="en cl_282828 fw_500 rubyNavHeaderBase">BOOKING</p>
                            </section>
                        </a>
                    </li>

                    <li class="liNavHeaderBase">
                        <a class="d_flex j_between ali_center undernone btnNavHeaderBase" href="<?php echo $homeurl; ?>#access">
                            <section class="secNavHeaderBase">
                                <h2 class="cl_EE945C Mochiy fw_800 h2NavHeaderBase">アクセス</h2>
                                <p class="en cl_282828 fw_500 rubyNavHeaderBase">Access</p>
                            </section>
                        </a>
                    </li>
                    <li class="liNavHeaderBase">
                        <a class="d_flex j_between ali_center undernone btnNavHeaderBase" href="<?php echo $homeurl; ?>#faq">
                            <section class="secNavHeaderBase">
                                <h2 class="cl_EE945C Mochiy fw_800 h2NavHeaderBase">よくあるご質問</h2>
                                <p class="en cl_282828 fw_500 rubyNavHeaderBase">FAQ</p>
                            </section>
                        </a>
                    </li>
                </ul>
            </nav>


            <section class="secBtmNavHeader">
                <h2 class="Mochiy cl_fff h2BtmNavHeader">
                    <img loading="lazy" src="<?php echo esc_url(get_bloginfo('template_url')); ?>/img/logoHeaderBase.png" alt="<?php bloginfo('name'); ?>" width="250" height="36">
                </h2>
                <ul class="addressBtmNavHeader">
                    <?php foreach (scf::get('tableAccess', 32) as $fields): ?>
                        <li class="d_flex j_between row liAddressBtmNavHeader">
                            <h3 class="cl_fff fw_500 maru h3LiAddressBtmNavHeader"><?php echo $fields['thAccess']; ?></h3>
                            <p class="cl_fff fw_500 maru txtLiAddressBtmNavHeader"><?php echo $fields['tdAccess']; ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <div class="mapAddressBtmNavHeader">
                    <?php echo scf::get('googlemapIframe', 32); ?>
                </div>

                <div class="btnAddressBtmNavHeadeLxn">
                    <a class="d_flex j_center ali_center bg_FBEBEC cl_EB53A2 fw_800 Mochiy btnAddressBtmNavHeade" href="<?php echo scf::get('urlGoogleMap', 32); ?>" target="_blank">
                        <span class="fw_800 iconBtnAddressBtmNavHeade">店舗までの経路はこちら</span>
                    </a>
                </div>
            </section>

            <section class="secBtmNavHeader secBtmNavHeader02">
                <h2 class="Mochiy cl_fff t_center h2BtmNavHeader">最新の情報をSNSでもチェック！</h2>
                <ul class="snSNavHeader">
                    <?php foreach (scf::get('snsLinks', 32) as $fields): ?>
                        <?php $img = get_scf_img_loop_url_id($fields['imgSns']); ?>
                        <li class="liSnSNavHeader">
                            <a class="undernone d_block btnSnSNavHeader" href="<?php echo $fields['urlSns']; ?> " target="_blank">
                                <img loading="lazy" src="<?php echo esc_url($img[0]); ?>" alt="" width="<?php echo esc_attr($img[1]); ?>" height="<?php echo esc_attr($img[2]); ?>">
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </section>
        </div>

    </div>


</div>