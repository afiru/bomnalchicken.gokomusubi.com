<div id="price" class="bg_FBEBEC price">
    <!--
    bg:../img/bgPrice.png
    -->
    <div class="priceLxn">
        <section class="titleTopPrice">
            <h2 class="cl_282828 t_center fw_800 h2TopPrice">人気メニュー</h2>
            <div class="bg_282828 brdTopPrice"></div>
            <p class="cl_282828 t_center fw_800 en rybyTopPrice">MENU</p>
        </section>

        <?php
        $menus = get_unique_random_menu_price_items_with_image();
        ?>
        <ul class="topFeadMenu">
            <?php $i = 1;
            foreach ($menus as $menu) : ?>
                <li class="liTopFeadMenu liTopFeadMenu<?php echo $i; ?>">
                    <a class="btnliTopFeadMenu" href="<?php echo $menu['permalink']; ?>">
                        <img src="<?php echo esc_url($menu['img_url']); ?>" alt="<?php echo esc_html($menu['text']); ?>">
                    </a>
                </li>
            <?php $i++;
            endforeach; ?>
        </ul>
        <div class="readmoneTopNewsLoop">
            <a class="d_flex j_center ali_center fw_500 cl_fff bg_000 kaisei btnReadmoneTopNewsLoop" href="<?php echo home_url('/menu/'); ?>">もっとメニューを見る！</a>
        </div>
    </div>
</div>

<?php

?>