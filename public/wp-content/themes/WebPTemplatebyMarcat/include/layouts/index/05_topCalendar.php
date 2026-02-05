<div id="price" class="bg_fff price">
    <div class="priceLxn">
        <section class="titleTopPrice">
            <h2 class="cl_EE952D Mochiy fw-800 h2TopPrice"><?php echo esc_html('人気メニュー'); ?></h2>
            <div class="bg_F4DB17 brdTopPrice"></div>
            <p class="cl_E9483E fw-800 en rybyTopPrice"><?php echo esc_html('MENU'); ?></p>
        </section>

        <?php
        $menus = get_unique_random_menu_price_items_with_image();
        ?>
        <ul class="topFeadMenu">
            <?php $i = 1;
            foreach ($menus as $key => $val): ?>
                <li class="liTopFeadMenu liTopFeadMenu<?php echo $i; ?>">
                    <a class="btnliTopFeadMenu" href="<?php echo $val['permalink']; ?>">
                        <img src="<?php echo esc_url($val['img_url']); ?>" alt="<?php echo esc_html($val['text']); ?>">
                    </a>
                </li>
            <?php $i++;
            endforeach; ?>
        </ul>

        <div class="btnMenuTopLxn">
            <a class="d_flex j_center ali_center fw_800 cl_EB53A2 bg_FBEBEC Mochiy btnbtnMenuTop" href="<?php echo esc_url(get_category_link(1)); ?>">
                <?php echo esc_html('もっとメニューを見る！'); ?>
            </a>
        </div>
    </div>
</div>

<section id="event" class="bg_fff calendarLxn">
    <!--bg:../img/bgcalendarLxn.png-->
    <div class="calendarLxnL">
        <section class="titleTopPrice">
            <h2 class="cl_EE952D Mochiy fw-800 h2TopPrice"><?php echo esc_html('カレンダー'); ?></h2>
            <div class="bg_F4DB17 brdTopPrice"></div>
            <p class="cl_E9483E fw-800 en rybyTopPrice"><?php echo esc_html('CALENDAR'); ?></p>
        </section>

        <div class="main_sidebar_eventcalendar_lxc">
            <div class="d_flex j_center ali_center title_main_sidebar_eventcalendar_lxc">
                <span class="js_prev_sidebar_eventcalendar cl_282828 Mochiy prev_sidebar_eventcalendar">&#9664&nbsp;<?php echo esc_html('前月'); ?></span>
                <h2 class="cl_EE952D Mochiy momtheventcalendar js_title_main_sidebar_eventcalendar_lxc">
                    <span class="js_eventcalendar_now_year"><?php echo esc_html(date('Y')); ?></span>年
                    <span class="js_eventcalendar_now_month"><?php echo esc_html(date('m')); ?></span>月
                </h2>
                <span class="js_next_sidebar_eventcalendar cl_282828 Mochiy  next_sidebar_eventcalendar"><?php echo esc_html('次月'); ?>&nbsp;&#9654;</span>
            </div>
            <div class="main_sidebar_eventcalendar_cnt">
                <div class="js_main_sidebar_eventcalendar main_sidebar_eventcalendar">
                    <!-- カレンダーJS -->
                </div>
            </div>
        </div>
        <p class="Mochiy cl_282828 fw_400 text_justify txtCalendarLxnBtm">
            <?php echo nl2br(esc_html(scf::get('txtCalendarBtm', 32))); ?>
        </p>
    </div>
</section>