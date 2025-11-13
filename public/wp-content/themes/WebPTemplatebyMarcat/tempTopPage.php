<?php

/**
 * Template Name: トップページ
 * Template Post Type: page
 */
?>
<?php get_template_part('include/common/header/header'); ?>
<main class="mainIndex">
    <?php if (have_posts()) while (have_posts()) : the_post();  ?>
        <script>

        </script>

        <?php get_template_part('include/layouts/index/01_topFv'); ?>
        <?php get_template_part('include/layouts/index/02_topNews'); ?>
        <?php get_template_part('include/layouts/index/03_topAbout'); ?>
        <?php get_template_part('include/layouts/index/04_topFloor'); ?>
        <?php get_template_part('include/layouts/index/05_topCalendar'); ?>
        <?php get_template_part('include/layouts/index/06_topPriceN'); ?>
        <?php get_template_part('include/layouts/index/07_topInstagram'); ?>

    <?php endwhile; ?>

</main>
<?php get_template_part('include/layouts/index/100_faq'); ?>
<?php get_template_part('include/layouts/index/99_booking'); ?>
<?php get_template_part('include/layouts/index/08_topAccess'); ?>
<?php get_template_part('include/layouts/index/09_topCopy'); ?>
<?php get_template_part('include/layouts/index/10_snsFixed'); ?>
<?php get_template_part('include/common/footer/footer'); ?>