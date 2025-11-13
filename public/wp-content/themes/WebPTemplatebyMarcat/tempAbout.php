<?php

/**
 * Template Name: ボムカフェについて
 * Template Post Type: page
 */
?>
<?php get_template_part('include/common/header/header'); ?>
<main class="bg_fff mainAbout">
    <?php if (have_posts()) while (have_posts()) : the_post();  ?>
        <?php get_template_part('include/layouts/bomcafe/01_bomcafefv'); ?>
        <?php get_template_part('include/layouts/bomcafe/02_bomcafeAbout'); ?>
        <?php get_template_part('include/layouts/bomcafe/03_bomcafeDate'); ?>
        <?php get_template_part('include/layouts/bomcafe/04_bomcafePrice'); ?>
        <?php get_template_part('include/layouts/bomcafe/05_bomcafePrace'); ?>
        <?php get_template_part('include/layouts/bomcafe/06_bomcafeTyui'); ?>
    <?php endwhile; ?>
</main>
<?php get_template_part('include/layouts/index/05_topCalendar'); ?>
<?php get_template_part('include/layouts/index/07_topInstagram'); ?>
<?php get_template_part('include/layouts/index/100_faq'); ?>
<?php get_template_part('include/layouts/index/99_booking'); ?>
<?php get_template_part('include/layouts/index/08_topAccess'); ?>
<?php get_template_part('include/layouts/index/09_topCopy'); ?>
<?php get_template_part('include/layouts/index/10_snsFixed'); ?>
<?php get_template_part('include/common/footer/footer'); ?>