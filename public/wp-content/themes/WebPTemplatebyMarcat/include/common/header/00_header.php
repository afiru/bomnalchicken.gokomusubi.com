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
                <img loading="lazy" src="<?php echo get_bloginfo('template_url'); ?>/img/logoHeaderBase.png" alt="<?php bloginfo('name'); ?>" width="250" height="36">
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

    <nav class="bg_A01D10 navHeaderBase">
        <div class="navHeaderBaseLxn">
            <ul class="ulNavHeaderBase">
                <li class="liNavHeaderBase">
                    <a class="d_flex j_between ali_center undernone btnNavHeaderBase" href="<?php echo $homeurl; ?>#scrolltop">
                        <section class="secNavHeaderBase">
                            <h2 class="cl_fff kaisei fw_800 h2NavHeaderBase">ホーム</h2>
                            <p class="en cl_fff fw_500 rubyNavHeaderBase">HOME</p>
                        </section>
                        <figure class="iconNavHeaderBase">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.5289 6.52858C10.2373 6.23705 9.76417 6.23821 9.47397 6.53118C9.18585 6.82205 9.18678 7.29103 9.47605 7.58076L13.2392 11.3499C13.6291 11.7405 13.6289 12.3732 13.2386 12.7635L9.50212 16.5C9.22598 16.7761 9.22598 17.2239 9.50212 17.5C9.77827 17.7761 10.226 17.7761 10.5021 17.5L15.2949 12.7072C15.6855 12.3167 15.6854 11.6834 15.2948 11.2929L10.5289 6.52858Z" fill="white" />
                            </svg>
                        </figure>
                    </a>
                </li>

                <li class="liNavHeaderBase">
                    <a class="d_flex j_between ali_center undernone btnNavHeaderBase" href="<?php echo get_category_link(1); ?>">
                        <section class="secNavHeaderBase">
                            <h2 class="cl_fff kaisei fw_800 h2NavHeaderBase">新着情報</h2>
                            <p class="en cl_fff fw_500 rubyNavHeaderBase">NEWS</p>
                        </section>
                        <figure class="iconNavHeaderBase">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.5289 6.52858C10.2373 6.23705 9.76417 6.23821 9.47397 6.53118C9.18585 6.82205 9.18678 7.29103 9.47605 7.58076L13.2392 11.3499C13.6291 11.7405 13.6289 12.3732 13.2386 12.7635L9.50212 16.5C9.22598 16.7761 9.22598 17.2239 9.50212 17.5C9.77827 17.7761 10.226 17.7761 10.5021 17.5L15.2949 12.7072C15.6855 12.3167 15.6854 11.6834 15.2948 11.2929L10.5289 6.52858Z" fill="white" />
                            </svg>
                        </figure>
                    </a>
                </li>

                <li class="liNavHeaderBase">
                    <a class="d_flex j_between ali_center undernone btnNavHeaderBase" href="<?php echo $homeurl; ?>#about">
                        <section class="secNavHeaderBase">
                            <h2 class="cl_fff kaisei fw_800 h2NavHeaderBase">お店について</h2>
                            <p class="en cl_fff fw_500 rubyNavHeaderBase">ABOUT</p>
                        </section>
                        <figure class="iconNavHeaderBase">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.5289 6.52858C10.2373 6.23705 9.76417 6.23821 9.47397 6.53118C9.18585 6.82205 9.18678 7.29103 9.47605 7.58076L13.2392 11.3499C13.6291 11.7405 13.6289 12.3732 13.2386 12.7635L9.50212 16.5C9.22598 16.7761 9.22598 17.2239 9.50212 17.5C9.77827 17.7761 10.226 17.7761 10.5021 17.5L15.2949 12.7072C15.6855 12.3167 15.6854 11.6834 15.2948 11.2929L10.5289 6.52858Z" fill="white" />
                            </svg>
                        </figure>
                    </a>
                </li>

                <li class="liNavHeaderBase">
                    <a class="d_flex j_between ali_center undernone btnNavHeaderBase" href="<?php echo $homeurl; ?>#floor">
                        <section class="secNavHeaderBase">
                            <h2 class="cl_fff kaisei fw_800 h2NavHeaderBase">お店の雰囲気</h2>
                            <p class="en cl_fff fw_500 rubyNavHeaderBase">FLOOR</p>
                        </section>
                        <figure class="iconNavHeaderBase">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.5289 6.52858C10.2373 6.23705 9.76417 6.23821 9.47397 6.53118C9.18585 6.82205 9.18678 7.29103 9.47605 7.58076L13.2392 11.3499C13.6291 11.7405 13.6289 12.3732 13.2386 12.7635L9.50212 16.5C9.22598 16.7761 9.22598 17.2239 9.50212 17.5C9.77827 17.7761 10.226 17.7761 10.5021 17.5L15.2949 12.7072C15.6855 12.3167 15.6854 11.6834 15.2948 11.2929L10.5289 6.52858Z" fill="white" />
                            </svg>
                        </figure>
                    </a>
                </li>

                <li class="liNavHeaderBase">
                    <a class="d_flex j_between ali_center undernone btnNavHeaderBase" href="<?php echo $homeurl; ?>#event">
                        <section class="secNavHeaderBase">
                            <h2 class="cl_fff kaisei fw_800 h2NavHeaderBase">イベント</h2>
                            <p class="en cl_fff fw_500 rubyNavHeaderBase">Event</p>
                        </section>
                        <figure class="iconNavHeaderBase">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.5289 6.52858C10.2373 6.23705 9.76417 6.23821 9.47397 6.53118C9.18585 6.82205 9.18678 7.29103 9.47605 7.58076L13.2392 11.3499C13.6291 11.7405 13.6289 12.3732 13.2386 12.7635L9.50212 16.5C9.22598 16.7761 9.22598 17.2239 9.50212 17.5C9.77827 17.7761 10.226 17.7761 10.5021 17.5L15.2949 12.7072C15.6855 12.3167 15.6854 11.6834 15.2948 11.2929L10.5289 6.52858Z" fill="white" />
                            </svg>
                        </figure>
                    </a>
                </li>

                <li class="liNavHeaderBase">
                    <a class="d_flex j_between ali_center undernone btnNavHeaderBase" href="<?php echo home_url('/menu/'); ?>">
                        <section class="secNavHeaderBase">
                            <h2 class="cl_fff kaisei fw_800 h2NavHeaderBase">メニュー</h2>
                            <p class="en cl_fff fw_500 rubyNavHeaderBase">MENU</p>
                        </section>
                        <figure class="iconNavHeaderBase">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.5289 6.52858C10.2373 6.23705 9.76417 6.23821 9.47397 6.53118C9.18585 6.82205 9.18678 7.29103 9.47605 7.58076L13.2392 11.3499C13.6291 11.7405 13.6289 12.3732 13.2386 12.7635L9.50212 16.5C9.22598 16.7761 9.22598 17.2239 9.50212 17.5C9.77827 17.7761 10.226 17.7761 10.5021 17.5L15.2949 12.7072C15.6855 12.3167 15.6854 11.6834 15.2948 11.2929L10.5289 6.52858Z" fill="white" />
                            </svg>
                        </figure>
                    </a>
                </li>

                <li class="liNavHeaderBase">
                    <a class="d_flex j_between ali_center undernone btnNavHeaderBase" href="<?php echo get_permalink(352); ?>">
                        <section class="secNavHeaderBase">
                            <h2 class="cl_fff kaisei fw_800 h2NavHeaderBase">ボムカフェについて</h2>
                            <p class="cl_fff fw_500 rubyNavHeaderBase">ABOUT BOMCAFE</p>
                        </section>
                        <figure class="iconNavHeaderBase">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.5289 6.52858C10.2373 6.23705 9.76417 6.23821 9.47397 6.53118C9.18585 6.82205 9.18678 7.29103 9.47605 7.58076L13.2392 11.3499C13.6291 11.7405 13.6289 12.3732 13.2386 12.7635L9.50212 16.5C9.22598 16.7761 9.22598 17.2239 9.50212 17.5C9.77827 17.7761 10.226 17.7761 10.5021 17.5L15.2949 12.7072C15.6855 12.3167 15.6854 11.6834 15.2948 11.2929L10.5289 6.52858Z" fill="white" />
                            </svg>
                        </figure>
                    </a>
                </li>

                <li class="liNavHeaderBase">
                    <a class="d_flex j_between ali_center undernone btnNavHeaderBase" href="https://liff.line.me/1645278921-kWRPP32q/?accountId=048mzzer" target="_blank">
                        <section class="secNavHeaderBase">
                            <h2 class="cl_fff kaisei fw_800 h2NavHeaderBase">ご予約</h2>
                            <p class="cl_fff fw_500 rubyNavHeaderBase">BOOKING</p>
                        </section>
                        <figure class="iconNavHeaderBase">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.5289 6.52858C10.2373 6.23705 9.76417 6.23821 9.47397 6.53118C9.18585 6.82205 9.18678 7.29103 9.47605 7.58076L13.2392 11.3499C13.6291 11.7405 13.6289 12.3732 13.2386 12.7635L9.50212 16.5C9.22598 16.7761 9.22598 17.2239 9.50212 17.5C9.77827 17.7761 10.226 17.7761 10.5021 17.5L15.2949 12.7072C15.6855 12.3167 15.6854 11.6834 15.2948 11.2929L10.5289 6.52858Z" fill="white" />
                            </svg>
                        </figure>
                    </a>
                </li>

                <li class="liNavHeaderBase">
                    <a class="d_flex j_between ali_center undernone btnNavHeaderBase" href="<?php echo $homeurl; ?>#access">
                        <section class="secNavHeaderBase">
                            <h2 class="cl_fff kaisei fw_800 h2NavHeaderBase">アクセス</h2>
                            <p class="cl_fff fw_500 rubyNavHeaderBase">ACCESS</p>
                        </section>
                        <figure class="iconNavHeaderBase">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.5289 6.52858C10.2373 6.23705 9.76417 6.23821 9.47397 6.53118C9.18585 6.82205 9.18678 7.29103 9.47605 7.58076L13.2392 11.3499C13.6291 11.7405 13.6289 12.3732 13.2386 12.7635L9.50212 16.5C9.22598 16.7761 9.22598 17.2239 9.50212 17.5C9.77827 17.7761 10.226 17.7761 10.5021 17.5L15.2949 12.7072C15.6855 12.3167 15.6854 11.6834 15.2948 11.2929L10.5289 6.52858Z" fill="white" />
                            </svg>
                        </figure>
                    </a>
                </li>
            </ul>

            <section class="secBtmNavHeader">
                <h2 class="kaisei cl_fff h2BtmNavHeader">
                    <img loading="lazy" src="<?php echo get_bloginfo('template_url'); ?>/img/logoHeaderBase.svg" alt="<?php bloginfo('name'); ?>" width="250" height="36">
                </h2>
                <ul class="addressBtmNavHeader">
                    <?php foreach (scf::get('tableAccess', 32) as $fields): ?>
                        <li class="d_flex j_between liAddressBtmNavHeader">
                            <h3 class="cl_fff fw_500 maru h3LiAddressBtmNavHeader"><?php echo $fields['thAccess']; ?></h3>
                            <div class="cl_fff fw_500 maru dottoLiAddressBtmNavHeader">：</div>
                            <p class="cl_fff fw_500 maru txtLiAddressBtmNavHeader"><?php echo $fields['tdAccess']; ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <div class="mapAddressBtmNavHeader">
                    <?php echo scf::get('googlemapIframe', 32); ?>
                </div>

                <div class="btnAddressBtmNavHeadeLxn">
                    <a class="d_flex j_center ali_center bg_241A08 cl_fff fw_800 kaisei btnAddressBtmNavHeade" href="<?php echo scf::get('urlGoogleMap', 32); ?>" target="_blank">
                        <span class="fw_800 iconBtnAddressBtmNavHeade">行き方を見る</span>
                    </a>
                </div>
            </section>

            <section class="secBtmNavHeader secBtmNavHeader02">
                <h2 class="kaisei cl_fff t_center h2BtmNavHeader">最新の情報をSNSでもチェック！</h2>
                <ul class="snSNavHeader">
                    <?php foreach (scf::get('snsLinks', 32) as $fields): ?>
                        <?php $img = get_scf_img_loop_url_id($fields['imgSns']); ?>
                        <li class="liSnSNavHeader">
                            <a class="undernone d_block btnSnSNavHeader" href="<?php echo $fields['urlSns']; ?> " target="_blank">
                                <img loading="lazy" src="<?php echo $img[0]; ?>" alt="" width="<?php echo $img[1]; ?>" height="<?php echo $img[2]; ?>">
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </section>
        </div>

    </nav>


</div>