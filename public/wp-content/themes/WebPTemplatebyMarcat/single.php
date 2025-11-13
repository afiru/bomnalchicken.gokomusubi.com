<?php if (in_category(1) || post_is_in_descendant_category(1)): ?>
    <?php get_template_part('include/common/header/header'); ?>
    <main class="bg_fff mainIndex">
        <?php get_template_part('include/layouts/cat/01_fv'); ?>
        <?php get_template_part('include/layouts/single/01_mainSingle'); ?>
        <?php get_template_part('include/layouts/top/05_calendar'); ?>
        <?php get_template_part('include/layouts/top/07_instagram'); ?>
    </main>
    <?php get_template_part('include/layouts/index/05_topCalendar'); ?>
    <?php get_template_part('include/layouts/index/07_topInstagram'); ?>
    <?php get_template_part('include/layouts/index/100_faq'); ?>
    <?php get_template_part('include/layouts/index/99_booking'); ?>
    <?php get_template_part('include/layouts/index/08_topAccess'); ?>
    <?php get_template_part('include/layouts/index/09_topCopy'); ?>
    <?php get_template_part('include/layouts/index/10_snsFixed'); ?>
<?php else: ?>
    <?php
    header("Location:" . home_url('/'));
    exit();
    ?>
<?php endif; ?>