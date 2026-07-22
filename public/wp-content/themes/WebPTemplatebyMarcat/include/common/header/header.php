<!DOCTYPE html>
<html>

<head>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Restaurant",
        "name": "ボムナルチキン",
        "url": "https://bomnalchicken.machimusubi.com",
        "image": "https://bomnalchicken.machimusubi.com/wp-content/uploads/2025/11/Frame-5-2.jpg",
        "description": "兵庫・明石市のテイクアウト専門店「ボムナルチキン」公式サイト。ヤンニョムチキン・ハニーバターチキン・サクサクフライドなど韓国人気メニューを持ち帰りOK。ランチや夕食、お土産にもぴったり。Instagramでも最新メニュー＆キャンペーン発信中！",
        "servesCuisine": "Korean Chicken",
        "sameAs": [
            "https://www.instagram.com/bomnalchicken/?hl=ja"
        ],
        "address": {
            "@type": "PostalAddress",
            "addressLocality": "明石市",
            "addressCountry": "JP"
        }
    }
    </script>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta content="text/css" http-equiv="Content-Style-Type" />
    <meta content="text/javascript" http-equiv="Content-Script-Type" />
    <meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta http-equiv="expires" content="86400">
    <meta http-equiv="Content-Language" content="<?php bloginfo('language'); ?>">
    <?php $user = get_user_by('id', 1); ?>
    <?php if (!empty($user->first_name)): ?>
    <meta name="Author" content="<?php echo $user->first_name . $user->last_name; ?>">
    <?php endif; ?>
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="copyright" content="<?php bloginfo('name'); ?>" />
    <meta name="viewport" content="viewport-fit=cover,width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta name="thumbnail" content="<?php echo esc_url(get_bloginfo('template_url')); ?>/img/thumbs.png" />
    <!--
  <PageMap>
    <DataObject type="thumbnail">
      <Attribute name="src" value="<?php echo esc_url(get_bloginfo('template_url')); ?>/img/thumbs.png"/>
      <Attribute name="width" value="100"/>
      <Attribute name="height" value="100"/>
    </DataObject>
  </PageMap>
-->
    <?php //タイトルの設定。【トップページ】カスタマイザーのSEOタイトル　【下層】ページタイトル｜カスタマイザーのSEOタイトル　
    ?>
    <?php wp_head(); ?>
    <title><?php echo get_the_site_title(get_php_customzer('seo_title')); ?></title>

    <?php if (is_single()): ?>
    <?php
        $the_content = get_post(get_the_ID())->post_content;
        $the_content = strip_tags($the_content);
        $the_content = stripslashes($the_content);
        $the_content = preg_replace('/(\s\s|　)/', '', $the_content);
        $the_content = preg_replace("/^\xC2\xA0/", "", $the_content);
        $the_content = str_replace("&nbsp;", '', $the_content);
        $img = get_post_thumbsdata(get_the_ID());
        $ogthumbs = get_aioseo_global_og_image();
        if (!empty($img)) {
            $ogthumbs = $img[0];
        } else {
            $ogthumbs = $ogthumbs;
        }
        ?>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "BlogPosting",
        "headline": "<?php echo get_the_title(get_the_ID()); ?>",
        "description": "<?php echo $the_content; ?>",
        "author": {
            "@type": "Person",
            "name": "<?php echo esc_html(get_bloginfo('name')); ?>"
        },
        "publisher": {
            "@type": "Organization",
            "name": "<?php echo esc_html(get_bloginfo('name')); ?>",
            "logo": {
                "@type": "ImageObject",
                "url": "<?php echo $ogthumbs; ?>"
            }
        },
        "mainEntityOfPage": {
            "@type": "WebPage",
            "@id": "<?php echo home_url('/'); ?>"
        },
        "datePublished": "<?php echo get_the_date('y-m-d'); ?>",
        "dateModified": "<?php echo get_the_date('y-m-d'); ?>"
    }
    </script>
    <?php endif; ?>



    <script>
    var home_url = "<?php echo home_url('/'); ?>";
    var theme_url = "<?php echo esc_url(get_bloginfo('template_url')); ?>";
    var rest_url = "<?php echo home_url('/wp-json/wp/v2/'); ?>";
    var calendar_y = "<?php echo date('Y'); ?>";
    var calendar_m = "<?php echo date('m'); ?>";
    /*
        <?php foreach (scf::get('eventdates', 226) as $fields): ?>
            <?php $result[] = '"' . date("md", strtotime($fields['eventdate'])) . '"'; ?>
        <?php endforeach; ?>
        */
    <?php if (!empty($result[0])): ?>
    var holiday = [<?php echo implode(',', $result); ?>];
    <?php else: ?>
    var holiday = [""];
    <?php endif; ?>
    </script>
</head>

<body id="body">
    <div id="scrolltop" class="bgbase wap">




        <div class="wapper pageWap">
            <div class="cntPageLxn bgCntPageLxn">
                <!--
      bg:../bgCntPageLxn.png
    -->
                <p class="t_center bg_A01D10 cl_fff fw_500 h1PageTop">西新町駅より徒歩3分｜韓国チキン テイクアウト専門店</p>
                <header id="scrolltop" class="bg_A01D10 baseheader" data-lenis-prevent>
                    <?php get_template_part('include/common/header/00_header'); ?>
                </header>