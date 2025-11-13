<?php

add_filter('big_image_size_threshold', '__return_false');
//jetpackで読まれているCSSを削除
add_filter('jetpack_implode_frontend_css', '__return_false');

/* インラインスタイル削除 */

function remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
}

add_action('widgets_init', 'remove_recent_comments_style');
add_theme_support('post-thumbnails'); //サムネイルをサポートさせる。

//勝手に読み込まれるJSを削除


function dequeue_css_header()
{
    wp_dequeue_style('wp-pagenavi');
    wp_dequeue_style('bodhi-svgs-attachment');
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('dashicons');
    wp_dequeue_style('addtoany');
}

add_action('wp_enqueue_scripts', 'dequeue_css_header');

//CSSファイルをフッターに出力
function enqueue_css_footer() {}

add_action('wp_footer', 'enqueue_css_footer');

if (is_admin()) {
} else {

    function my_delete_local_jquery()
    {
        wp_deregister_script('jquery');
    }

    add_action('wp_enqueue_scripts', 'my_delete_local_jquery');
}

//レンダリングをブロックするのを止めましょう。
if (!(is_admin())) {

    function add_defer_to_enqueue_script($url)
    {
        if (FALSE === strpos($url, '.js'))
            return $url;
        if (strpos($url, 'jquery.min.js'))
            return $url;
        return "$url' defer charset='UTF-8";
    }

    add_filter('clean_url', 'add_defer_to_enqueue_script', 11, 1);
}

remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');

//子カテゴリーも親カテゴリーと同様の設定を行う
add_filter('category_template', 'my_category_template');

function my_category_template($template)
{
    $category = get_queried_object();
    if (
        $category->parent != 0 &&
        ($template == "" || strpos($template, "category.php") !== false)
    ) {
        $templates = array();
        while ($category->parent) {
            $category = get_category($category->parent);
            if (!isset($category->slug))
                break;
            $templates[] = "category-{$category->slug}.php";
            $templates[] = "category-{$category->term_id}.php";
        }
        $templates[] = "category.php";
        $template = locate_template($templates);
    }
    return $template;
}

//子カテゴリーで抽出を行う方法
function post_is_in_descendant_category($cats, $_post = null)
{
    foreach ((array) $cats as $cat) {
        $descendants = get_term_children((int) $cat, 'category');
        if ($descendants && in_category($descendants, $_post))
            return true;
    }
    return false;
}

//アクセス数の取得
function get_post_views($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');

        return "0 views";
    }

    return $count . '';
}

//アクセス数の保存
function set_post_views($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

add_filter('wp_kses_allowed_html', 'my_wp_kses_allowed_html', 10, 2);

function my_wp_kses_allowed_html($tags, $context)
{
    $tags['img']['srcset'] = true;
    $tags['source']['srcset'] = true;
    $tags['source']['data-srcset'] = true;
    return $tags;
}

function get_post_thumbsdata($postID)
{
    $thumbnail_id = get_post_thumbnail_id($postID); //アタッチメントIDの取得
    $image = wp_get_attachment_image_src($thumbnail_id, 'full');
    return $image;
}

function get_post_custom_thumbsdata($thumbnail_id)
{
    $image = wp_get_attachment_image_src($thumbnail_id, 'full');
    return $image;
}

function get_scf_img_url($name)
{
    $cf_sample = SCF::get($name);
    $cf_sample = wp_get_attachment_image_src($cf_sample, 'full');
    return $cf_sample;
}

function get_scf_img_loop_url($name)
{
    $cf_sample = wp_get_attachment_image_src($name, 'full');
    return $cf_sample;
}

function get_scf_img_url_id($name, $post_id)
{
    $cf_sample = SCF::get($name);
    $cf_sample = wp_get_attachment_image_src($cf_sample, 'full');
    return $cf_sample;
}

function get_scf_img_loop_url_id($name)
{
    $cf_sample = wp_get_attachment_image_src($name, 'full');
    return $cf_sample;
}

function get_thumb_url($size = 'full', $post_id = null)
{
    $post_id = ($post_id) ? $post_id : get_the_ID();  //第2引数が指定されていればそれを、指定がなければ現在の投稿IDをセット
    if (!has_post_thumbnail($post_id))
        return false;  //指定した投稿がアイキャッチ画像を持たない場合、falseを返す
    $thumb_id = get_post_thumbnail_id($post_id);      // 指定した投稿のアイキャッチ画像の画像IDを取得
    $thumb_img = wp_get_attachment_image_src($thumb_id, $size);  // 画像の情報を配列で取得
    return $thumb_img;           //URLを返す
}

function stringOverFlow($strings, $length)
{
    $output = strip_tags($strings);
    $output = stripslashes($output);
    $output = preg_replace('/(\s\s|　)/', '', $output);
    $output = preg_replace("/^\xC2\xA0/", "", $output);
    $output = str_replace("&nbsp;", '', $output);
    $output = mb_strimwidth($output, 0, $length, "...", "UTF-8");
    return $output;
}

function category_id_class($classes)
{
    global $post;
    foreach (get_the_category($post->ID) as $category) {
        $classes[] = $category->category_nicename;
    }
    return $classes;
}

add_filter('post_class', 'category_id_class');
add_filter('body_class', 'category_id_class');


$TODAY = strtotime(date('Y-m-d'));
function check_new_post($date)
{
    global $TODAY;
    $date = strtotime($date);
    $dayDiff = abs($TODAY - $date) / 86400; //(60 * 60 * 24)
    return ($dayDiff < 7);
}
function get_new_flug($date)
{
    if (check_new_post($date)) {
        echo '<span class="cl_FF0000 fw_500 newTopAppivalTop">NEW!</span>';
    }
}
function getNewIndexStrong($date)
{
    if (check_new_post($date)) {
        echo '<span class="bg_D23737 cl_fff fw_400 d_flex j_center ali_center txtset iconTopNews">NEW</span>';
    }
}

function getNewsSingle($date)
{
    if (check_new_post($date)) {
        echo '<span class="bg_CB644A cl_fff fw_400 txtset iconNewsSingle">NEW</span>';
    }
}

function getNewSingleColumn($date)
{
    if (check_new_post($date)) {
        echo '<span class="bg_CB644A cl_fff fw_400 d_felx j_center ali_center en txtset iconSingleColumn">NEW!</span>';
    }
}

/**
 * 管理画面：menu の投稿一覧で menu_category で絞り込みを追加
 */
add_action('restrict_manage_posts', function ($post_type) {
    if ($post_type === 'menu') {
        $taxonomy = 'menu_category';
        $taxonomy_obj = get_taxonomy($taxonomy);
        wp_dropdown_categories([
            'show_option_all' => $taxonomy_obj->labels->all_items,
            'taxonomy'        => $taxonomy,
            'name'            => $taxonomy,
            'orderby'         => 'name',
            'selected'        => isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '',
            'hierarchical'    => true,
            'show_count'      => false,
            'hide_empty'      => false,
        ]);
    }
});

/**
 * 絞り込みが実際に効くようにする
 */
add_filter('parse_query', function ($query) {
    global $pagenow;
    $taxonomy = 'menu_category';
    $q_vars = &$query->query_vars;
    if ($pagenow === 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] === 'menu' && isset($_GET[$taxonomy]) && is_numeric($_GET[$taxonomy]) && $_GET[$taxonomy] != 0) {
        $term = get_term_by('id', $_GET[$taxonomy], $taxonomy);
        $q_vars[$taxonomy] = $term->slug;
    }
});

function get_aioseo_global_og_image()
{
    $json = get_option('aioseo_options');

    // JSONをデコード（配列に変換）
    $aioseo = json_decode($json, true);
    if (!is_array($aioseo)) {
        return false;
    }

    // Facebookデフォルト画像をチェック
    if (
        isset($aioseo['social']['facebook']['general']['defaultImagePosts'])
        && !empty($aioseo['social']['facebook']['general']['defaultImagePosts'])
    ) {
        return esc_url($aioseo['social']['facebook']['general']['defaultImagePosts']);
    }

    // Twitter側も確認（同じ画像設定があるため）
    if (
        isset($aioseo['social']['twitter']['general']['defaultImagePosts'])
        && !empty($aioseo['social']['twitter']['general']['defaultImagePosts'])
    ) {
        return esc_url($aioseo['social']['twitter']['general']['defaultImagePosts']);
    }

    return false;
}

add_action('wp_head', function () {
    if (is_category('news')) { // ニュースカテゴリページだけ
        global $wp_query;

        $paged = max(1, get_query_var('paged')); // 現在ページ番号
        $posts_per_page = get_query_var('posts_per_page'); // 1ページの記事数
        $start_position = ($paged - 1) * $posts_per_page + 1;

        $itemList = [];
        $position = $start_position;

        if (have_posts()) :
            while (have_posts()) : the_post();
                // アイキャッチ画像
                if (has_post_thumbnail()) {
                    $image = get_the_post_thumbnail_url(get_the_ID(), 'full');
                } else {
                    if (function_exists('get_aioseo_global_og_image')) {
                        $image = get_aioseo_global_og_image();
                    } else {
                        $image = '';
                    }
                }

                $itemList[] = [
                    "@type" => "ListItem",
                    "position" => $position,
                    "url" => get_permalink(),
                    "name" => get_the_title(),
                    "image" => $image,
                    "datePublished" => get_the_date('c') // ISO 8601形式
                ];
                $position++;
            endwhile;
            wp_reset_postdata();
        endif;

        $jsonld = [
            "@context" => "https://schema.org",
            "@type" => "ItemList",
            "itemListElement" => $itemList
        ];

        echo '<script type="application/ld+json">' . wp_json_encode($jsonld, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) . '</script>';
    }
});


//カレンダー（ここから今回追加）
add_action('init', 'calendar_init');
function calendar_init()
{
    $labels = array(
        'name'               => _x('カレンダー', 'post type general name', 'your-plugin-textdomain'),
        'singular_name'      => _x('カレンダー', 'post type singular name', 'your-plugin-textdomain'),
        'menu_name'          => _x('カレンダー', 'your-plugin-textdomain'),
        'name_admin_bar'     => _x('カレンダー', 'add new on admin bar', 'your-plugin-textdomain'),
        'add_new'            => _x('カレンダーを新規登録', 'blog', 'your-plugin-textdomain'),
        'add_new_item'       => __('カレンダーを新規登録', 'your-plugin-textdomain'),
        'new_item'           => __('カレンダーを新規登録', 'your-plugin-textdomain'),
        'edit_item'          => __('カレンダーを編集', 'your-plugin-textdomain'),
        'view_item'          => __('カレンダーを見る', 'your-plugin-textdomain'),
        'all_items'          => __('すべてのカレンダー', 'your-plugin-textdomain'),
        'search_items'       => __('カレンダーを探す', 'your-plugin-textdomain'),
        'parent_item_colon'  => __('Parent カレンダー:', 'your-plugin-textdomain'),
        'not_found'          => __('No books found.', 'your-plugin-textdomain'),
        'not_found_in_trash' => __('No books found in Trash.', 'your-plugin-textdomain')
    );
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'calendar'),
        'capability_type'    => 'post',
        'show_in_rest' => true,
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 4,
        'supports'           => array('title', 'thumbnail')
    );
    register_post_type('calendar', $args);
}
function create_calendar_taxonomy()
{
    register_taxonomy(
        'calendar_category',
        'calendar',
        array(
            'show_in_rest' => true,
            'label' => __('カレンダー区分'), //管理画面に表示されるラベル
            'hierarchical' => true //trueだとカテゴリー、falseだとタグ
        )
    );
}

//スライダー

add_action('init', 'create_calendar_taxonomy');

class MarcatCalendarsAPI
{
    private $year;
    private $month;
    private $year_month;
    private $year_month_posts;
    private $post_data;
    private $start_year_month;
    private $end_year_month;
    private $json;
    public function __construct()
    {
        add_action('rest_api_init',  array($this, 'MarcatCalendarsAPISetting'));
    }
    public function MarcatCalendarsAPISetting()
    {
        register_rest_route('wp/v2', '/MarcatCalendarsAPI/', array(
            'methods' => 'GET',
            'callback' => array($this, 'MarcatCalendarsAPIFc'),
            'args' => array(
                'year' => array(
                    'required' => true,
                ),
                'month' => array(
                    'required' => true,
                ),
            ),
        ));
    }
    public function MarcatCalendarsAPIFc($data)
    {
        $this->year = htmlspecialchars(esc_attr($data['year']));
        $this->month = htmlspecialchars(esc_attr($data['month']));
        $this->year_month = $this->year . '-' . $this->month;
        $this->start_year_month = $this->year . '-' . $this->month . '-01';
        $this->end_year_month = $this->year . '-' . $this->month . '-31';
        $this->year_month_posts = $this->GetMarcatCalendarsPosts();
        $html = $this->SetCalendars();
        $setdate = $this->year . '-' . sprintf('%02d', $this->month) . '-01  -1 month';
        $this->json['prev']['y'] = date('Y', strtotime($setdate));
        $this->json['prev']['m'] = date('m', strtotime($setdate));
        $setdate = $this->year . '-' . sprintf('%02d', $this->month) . '-01  +1 month';
        $this->json['next']['y'] = date('Y', strtotime($setdate));
        $this->json['next']['m'] = date('m', strtotime($setdate));
        $this->json['title'] = $this->year . '年' . $this->month . '月';
        $this->json['html'] = $html;
        $this->json['sql'] = $this->NowSQL();
        return $this->json;
    }
    public function NowSQL()
    {
        global $wpdb;
        $sql = "SELECT post_id,meta_key,meta_value,post_status FROM `" . $wpdb->postmeta . "` INNER JOIN " . $wpdb->posts . " ON `" . $wpdb->postmeta . "`.post_id = `" . $wpdb->posts . "`.ID WHERE `" . $wpdb->posts . "`.`post_status` = 'publish' AND `" . $wpdb->postmeta . "`.`meta_value` BETWEEN '" . $this->start_year_month . "' AND '" . $this->end_year_month . "'  AND `" . $wpdb->postmeta . "`.`meta_key` = 'eventdate' ORDER BY `" . $wpdb->posts . "`.`menu_order` ASC";
        return $sql;
    }
    public function GetMarcatCalendarsPosts()
    {
        global $wpdb;
        $sql = "SELECT post_id,meta_key,meta_value,post_status FROM `" . $wpdb->postmeta . "` INNER JOIN " . $wpdb->posts . " ON `" . $wpdb->postmeta . "`.post_id = `" . $wpdb->posts . "`.ID WHERE `" . $wpdb->posts . "`.`post_status` = 'publish' AND `" . $wpdb->postmeta . "`.`meta_value` BETWEEN '" . $this->start_year_month . "' AND '" . $this->end_year_month . "'  AND `" . $wpdb->postmeta . "`.`meta_key` = 'eventdate' ORDER BY `" . $wpdb->posts . "`.`menu_order` ASC";
        $posts = $wpdb->get_results($sql);

        foreach ($posts as $post) {
            $post_id = $post->post_id;
            $post_data[$post->meta_value][] = $post_id;
        }
        if (empty($post_data)) {
            $post_data = "";
        } else {
            $post_data = $post_data;
        }
        $this->json['posts'] = $post_data;
        return $post_data;
    }

    public function SetCalendars()
    {
        $year = date($this->year);
        $month = date($this->month);
        //月末日を取得
        //月末日を取得
        $end_month = date('t', strtotime($year . $month . '01'));
        //1日の曜日を取得
        $first_week = date('w', strtotime($year . $month . '01'));
        //月末日の曜日を取得
        $last_week = date('w', strtotime($year . $month . $end_month));

        $aryCalendar = [];
        $j = 0;

        //1日開始曜日までの穴埋め
        for ($i = 0; $i < $first_week; $i++) {
            $aryCalendar[$j][] = '';
        }

        //1日から月末日までループ
        for ($i = 1; $i <= $end_month; $i++) {
            //日曜日まで進んだら改行
            if (isset($aryCalendar[$j]) && count($aryCalendar[$j]) === 7) {
                $j++;
            }
            $aryCalendar[$j][] = $i;
        }

        //月末曜日の穴埋め
        for ($i = count($aryCalendar[$j]); $i < 7; $i++) {
            $aryCalendar[$j][] = '';
        }

        $aryWeek = ['日', '月', '火', '水', '木', '金', '土'];

        $Calendar  =    '<table class="calendar">';
        $Calendar .=    '<tr>';
        foreach ($aryWeek as $week) {
            if ($week === '日') {
                $Calendar .= '<th class="sun">' . $week . '</th>';
            } elseif ($week === '土') {
                $Calendar .= '<th class="sat">' . $week . '</th>';
            } else {
                $Calendar .= '<th>' . $week . '</th>';
            }
        }
        $Calendar .=    '</tr>';
        foreach ($aryCalendar as $tr) {
            $Calendar .=    '<tr>';
            foreach ($tr as $td) {
                $Calendar .= '<td class="date">';
                $Calendar .= $td;
                $Calendar .= $this->SetCalendarPosts($year, $month, $td);
                $Calendar .= '</td>';
            }
            $Calendar .=    '</tr>';
        }
        $Calendar .=    '</table>';
        return $Calendar;
    }

    public function SetCalendarPosts($year = 0, $month = 0, $date = 0)
    {
        $date = sprintf('%02d', $date);

        $date = $year . '-' . $month . '-' . $date;

        if (!empty($this->year_month_posts[$date])) {
            $events = '<div class="display_flex_stretch display_row">';
            foreach ($this->year_month_posts[$date] as $id) {
                $myfield = get_post_thumbsdata($id);
                $posttype = get_post_type($id);
                if ($posttype === "post") {
                    $events .= '<a href="' . get_permalink($id) . '">';
                    if (!empty($myfield[0])) {
                        $events .= '<img src="' . $myfield[0] . '" width="' . $myfield[1] . '" height="' . $myfield[2] . '" alt="' . $posttype . get_the_title($id) . '">';
                        $events .= '<p class="cl_FF0000 fw_400 t_center titleCalendarPosts">イベント！</p>';
                    }
                    $events .= '</a>';
                } elseif ($id == 350) {
                    if (!empty($myfield[0])) {
                        $events .= '<img class="logokyujitu jstitleCalendarPosts"  data-opendetail=".bgcalendaridLxn' . $date . '" src="' . $myfield[0] . '" width="' . $myfield[1] . '" height="' . $myfield[2] . '" alt="' . $posttype . get_the_title($id) . '">';
                    }
                    if (!empty(scf::get('timeEvents', $id))) {
                        $events .= '<p class="cl_FF0000 fw_400 t_center titleCalendarPosts jstitleCalendarPosts" data-opendetail=".bgcalendaridLxn' . $date . '" >' . get_the_title($id) . '</p>';
                        $events .= '<div class="bgCalendarLxn jsbgCalendarLxn bgcalendaridLxn' . $date . '">';
                        $events .= '<div class="bgCalendar jsbgCalendar">';
                        $events .= '<div class="closeCalenda jsCloseCalendar">';
                        $events .= '<img class="" loading="lazy" src="' . get_bloginfo('template_url') . '/img/close.svg" alt="" width="" height="">';
                        $events .= '</div>';
                        $events .= '<p class="bg_fff t_center cl_241A08 txtCalendartime">';
                        $events .= date("Y年m月d日", strtotime($date)) . 'のボムカフェは<br>' . $this->SetCalendarsTime($id, $date) . 'です。';
                        $events .= 'ボムカフェについては<a href="' . get_permalink(352) . '">こちら</a>';
                        $events .= '</p>';
                        $events .= '</div>';
                        $events .= '</div>';
                    } else {
                        $events .= '<p class="cl_FF0000 fw_400 t_center titleCalendarPosts">' . get_the_title($id) . '</p>';
                    }
                } else {
                    if (!empty($myfield[0])) {
                        $events .= '<img class="logokyujitu jstitleCalendarPosts"  data-opendetail=".bgcalendaridLxn' . $date . '" src="' . $myfield[0] . '" width="' . $myfield[1] . '" height="' . $myfield[2] . '" alt="' . $posttype . get_the_title($id) . '">';
                    }
                    if (!empty(scf::get('timeEvents', $id))) {
                        $events .= '<p class="cl_FF0000 fw_400 t_center titleCalendarPosts jstitleCalendarPosts" data-opendetail=".bgcalendaridLxn' . $date . '" >' . get_the_title($id) . '</p>';
                        $events .= '<div class="bgCalendarLxn jsbgCalendarLxn bgcalendaridLxn' . $date . '">';
                        $events .= '<div class="bgCalendar jsbgCalendar">';
                        $events .= '<div class="closeCalenda jsCloseCalendar">';
                        $events .= '<img class="" loading="lazy" src="' . get_bloginfo('template_url') . '/img/close.svg" alt="" width="" height="">';
                        $events .= '</div>';
                        $events .= '<p class="bg_fff t_center cl_241A08 txtCalendartime">';
                        $events .= date("Y年m月d日", strtotime($date)) . 'の営業時間は<br>' . $this->SetCalendarsTime($id, $date) . 'です。';
                        $events .= '</p>';
                        $events .= '</div>';
                        $events .= '</div>';
                    } else {
                        $events .= '<p class="cl_FF0000 fw_400 t_center titleCalendarPosts">' . get_the_title($id) . '</p>';
                    }
                }
            }
            $events .= '</div>';
        } else {
            $events = "";
        }
        return $events;
    }
    function SetCalendarsTime($id, $date)
    {
        foreach (scf::get('eventdates', $id) as $key => $fields) {
            if ($fields['eventdate'] === $date) {
                $times = $fields['timeEvents'];
                break;
            } else {
                $times = $id . '--' . $date . ' ' . $fields['eventdate'];
            }
        }
        return $times;
    }
}
$MarcatCalendarsAPI = new MarcatCalendarsAPI();

//緊急なおしらせ
// ------------------------------
// ダッシュボードウィジェット
// ------------------------------
add_action('wp_dashboard_setup', function () {
    wp_add_dashboard_widget(
        'gokomusubi_status_widget',
        '今日の店舗ステータス',
        'gokomusubi_status_widget_render'
    );
});

function gokomusubi_status_widget_render()
{
    if (!current_user_can('administrator') && !current_user_can('editor')) {
        echo '権限がありません';
        return;
    }

    // 保存処理
    if (isset($_POST['gokomusubi_status_nonce']) && wp_verify_nonce($_POST['gokomusubi_status_nonce'], 'gokomusubi_status_save')) {
        $menu = sanitize_textarea_field($_POST['gokomusubi_menu'] ?? '');
        $status = sanitize_text_field($_POST['gokomusubi_open_status'] ?? '開店中');
        $counter = intval($_POST['gokomusubi_counter'] ?? 0);
        $table2 = intval($_POST['gokomusubi_table2'] ?? 0);
        $table4 = intval($_POST['gokomusubi_table4'] ?? 0);

        $chargetimeth01 = sanitize_textarea_field($_POST['chargetimeth01'] ?? '');
        $chargetimetd01 = sanitize_textarea_field($_POST['chargetimetd01'] ?? '');

        $chargetimeth02 = sanitize_textarea_field($_POST['chargetimeth02'] ?? '');
        $chargetimetd02 = sanitize_textarea_field($_POST['chargetimetd02'] ?? '');

        $updated = current_time('mysql');

        update_option('gokomusubi_status', [
            'menu' => $menu,
            'status' => $status,
            'counter' => $counter,
            'table2' => $table2,
            'table4' => $table4,
            'updated' => $updated,

            'chargetimeth01' => $chargetimeth01,
            'chargetimetd01' => $chargetimetd01,
            'chargetimeth02' => $chargetimeth02,
            'chargetimetd02' => $chargetimetd02
        ]);

        echo '<div class="updated notice"><p>保存しました</p></div>';
    }

    // 現在値取得
    $data = get_option('gokomusubi_status', [
        'menu' => '',
        'status' => '開店中',
        'counter' => 0,
        'table2' => 0,
        'table4' => 0,
        'updated' => '',
        'chargetimeth01' => '',
        'chargetimetd01' => '',
        'chargetimeth02' => '',
        'chargetimetd02' => '',
    ]);

?>
    <form method="post">
        <?php wp_nonce_field('gokomusubi_status_save', 'gokomusubi_status_nonce'); ?>
        <p>
            <label>今日のおすすめメニュー:<br>
                <textarea name="gokomusubi_menu" rows="4" style="width:100%;"><?php echo esc_textarea($data['menu']); ?></textarea>
            </label>
        </p>
        <p>
            <label>ステータス:<br>
                <select name="gokomusubi_open_status">
                    <?php
                    $statuses = ['開店中', 'もうすぐ閉店', '閉店'];
                    foreach ($statuses as $s) {
                        $selected = ($data['status'] === $s) ? 'selected' : '';
                        echo "<option value='$s' $selected>$s</option>";
                    }
                    ?>
                </select>
            </label>
        </p>
        <p>
            <label>カウンター席:<br>
                <input type="number" name="gokomusubi_counter" value="<?php echo intval($data['counter']); ?>">
            </label>
        </p>
        <p>
            <label>2人テーブル席:<br>
                <input type="number" name="gokomusubi_table2" value="<?php echo intval($data['table2']); ?>">
            </label>
        </p>
        <p>
            <label>4人テーブル席:<br>
                <input type="number" name="gokomusubi_table4" value="<?php echo intval($data['table4']); ?>">
            </label>
        </p>

        <p>
            <label>チャージ時間(1):<br>
                <input type="text" name="chargetimeth01" value="<?php if (!empty($data['chargetimeth01'])) {
                                                                    echo $data['chargetimeth01'];
                                                                } ?>">
            </label>
        </p>
        <p>
            <label>チャージ時間(1)金額:<br>
                <input type="text" name="chargetimetd01" value="<?php if (!empty($data['chargetimetd01'])) {
                                                                    echo $data['chargetimetd01'];
                                                                } ?>">
            </label>
        </p>

        <p>
            <label>チャージ時間(2):<br>
                <input type="text" name="chargetimeth02" value="<?php if (!empty($data['chargetimeth02'])) {
                                                                    echo $data['chargetimeth02'];
                                                                } ?>">
            </label>
        </p>
        <p>
            <label>チャージ時間(2)金額:<br>
                <input type="text" name="chargetimetd02" value="<?php if (!empty($data['chargetimetd02'])) {
                                                                    echo $data['chargetimetd02'];
                                                                } ?>">
            </label>
        </p>

        <p>
            <input type="submit" class="button-primary" value="保存">
        </p>
    </form>
    <p>最終更新: <?php echo esc_html($data['updated']); ?></p>
<?php
}

// ------------------------------
// REST API
// ------------------------------
add_action('rest_api_init', function () {
    register_rest_route('gokomusubi/v1', '/status', [
        'methods' => 'GET',
        'callback' => function () {
            return get_option('gokomusubi_status', [
                'menu' => '',
                'status' => '開店中',
                'counter' => 0,
                'table2' => 0,
                'table4' => 0,
                'updated' => ''
            ]);
        },
        'permission_callback' => '__return_true'
    ]);
});

// ------------------------------
// ショートコード（自動更新表示）
// ------------------------------
add_shortcode('gokomusubi_status_auto', function () {
    ob_start();
?>
    <div id="gokomusubi-status">読み込み中...</div>
    <script>
        async function updateStatus() {
            try {
                const res = await fetch('/wp-json/gokomusubi/v1/status');
                const data = await res.json();
                document.getElementById('gokomusubi-status').innerHTML = `
                <strong>おすすめメニュー:</strong><br>${data.menu.replace(/\n/g,'<br>')}<br>
                <strong>ステータス:</strong> ${data.status}<br>
                <strong>カウンター席:</strong> ${data.counter}席<br>
                <strong>2人テーブル席:</strong> ${data.table2}卓<br>
                <strong>4人テーブル席:</strong> ${data.table4}卓<br>
                <em>最終更新: ${data.updated}</em>
            `;
            } catch (err) {
                console.error(err);
            }
        }
        updateStatus();
        setInterval(updateStatus, 60000); // 60秒ごとに更新
    </script>
<?php
    return ob_get_clean();
});


//予約フォーム用
function send_discord_reservation_notification($Data)
{

    $name        = $Data->get('お名前');
    $kana        = $Data->get('ふりがな');
    $phone       = $Data->get('電話番号');
    $lineid       = $Data->get('ラインID');
    $date        = $Data->get('予約日');
    $time        = $Data->get('予約時間');
    $int        = $Data->get('予約人数');
    $mail        = $Data->get('メールアドレス');
    $bikou      = $Data->get('備考');


    $message = "新規予約が入りました*\n"
        . "━━━━━━━━━━━━━━\n"
        . "お名前：{$name}\n"
        . "ふりがな：{$kana}\n"
        . "電話番号：{$phone} 名\n"
        . "予約日：{$date}\n"
        . "予約時間：{$time}\n"
        . "予約人数：{$phone}\n"
        . "人数：{$int} 名\n"
        . "メールアドレス：{$mail}\n"
        . "備考：\n{$bikou}\n"
        . "━━━━━━━━━━━━━━";

    $payload = json_encode(['content' => $message], JSON_UNESCAPED_UNICODE);

    $args = [
        'body'    => $payload,
        'headers' => [
            'Content-Type' => 'application/json',
        ],
    ];

    foreach (scf::get('discodeids', 217) as $fields):
        wp_remote_post($fields['discodeid'], $args);
    endforeach;
}
add_action('mwform_after_send_mw-wp-form-217', 'send_discord_reservation_notification', 10, 1);


//スライダー
add_action('init', 'fvSlider_init');
function fvSlider_init()
{
    $labels = array(
        'name'               => _x('スライダー', 'post type general name', 'your-plugin-textdomain'),
        'singular_name'      => _x('スライダー', 'post type singular name', 'your-plugin-textdomain'),
        'menu_name'          => _x('スライダー', 'your-plugin-textdomain'),
        'name_admin_bar'     => _x('スライダー', 'add new on admin bar', 'your-plugin-textdomain'),
        'add_new'            => _x('スライダーを新規登録', 'blog', 'your-plugin-textdomain'),
        'add_new_item'       => __('スライダーを新規登録', 'your-plugin-textdomain'),
        'new_item'           => __('スライダーを新規登録', 'your-plugin-textdomain'),
        'edit_item'          => __('スライダーを編集', 'your-plugin-textdomain'),
        'view_item'          => __('スライダーを見る', 'your-plugin-textdomain'),
        'all_items'          => __('すべてのfvSlider', 'your-plugin-textdomain'),
        'search_items'       => __('スライダーを探す', 'your-plugin-textdomain'),
        'parent_item_colon'  => __('Parent スライダー:', 'your-plugin-textdomain'),
        'not_found'          => __('No books found.', 'your-plugin-textdomain'),
        'not_found_in_trash' => __('No books found in Trash.', 'your-plugin-textdomain')
    );
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'fvSlider'),
        'capability_type'    => 'post',
        'show_in_rest' => true,
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 4,
        'supports'           => array('title', 'thumbnail')
    );
    register_post_type('fvSlider', $args);
}
function create_fvSlider_taxonomy()
{
    register_taxonomy(
        'fvSlider_category',
        'fvSlider',
        array(
            'show_in_rest' => true,
            'label' => __('スライダー区分'), //管理画面に表示されるラベル
            'hierarchical' => true //trueだとカテゴリー、falseだとタグ
        )
    );
}
/**
 * 全ての menu 投稿から imgsPriceMenu を取得し、
 * 画像があるものだけを対象、同一画像は重複排除、
 * シャッフルして最大12件返す。
 *
 * @param int $limit 返す件数（デフォルト12件）
 * @return array
 */
function get_unique_random_menu_price_items_with_image($limit = 12)
{

    $args = [
        'post_type'      => 'menu',
        'posts_per_page' => -1,
    ];

    $query = new WP_Query($args);
    $items = [];
    $used_img_ids = []; // ←重複防止用

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $post_id   = get_the_ID();
            $title     = get_the_title();
            $permalink = get_permalink();

            $priceMenus = SCF::get('imgsPriceMenu', $post_id);

            if (!empty($priceMenus) && is_array($priceMenus)) {
                foreach ($priceMenus as $menu) {

                    $img_id = $menu['imgPriceMenu'];

                    // 画像なし → スキップ
                    if (empty($img_id)) continue;

                    // 重複画像IDならスキップ
                    if (in_array($img_id, $used_img_ids, true)) continue;

                    $img_url = wp_get_attachment_image_url($img_id, 'medium');

                    // URL取得できない画像は除外
                    if (!$img_url) continue;

                    // 重複チェックリストに追加
                    $used_img_ids[] = $img_id;

                    $items[] = [
                        'post_id'    => $post_id,
                        'post_title' => $title,
                        'permalink'  => $permalink,
                        'img_id'     => $img_id,
                        'img_url'    => $img_url,
                        'text'       => $menu['txtPriceMenu'],
                    ];
                }
            }
        }
    }
    wp_reset_postdata();

    if (!empty($items)) {
        shuffle($items);
        $items = array_slice($items, 0, $limit);
    }

    return $items;
}
//編集者権限拡張
add_action('admin_menu', function () {
    $current_user = wp_get_current_user();

    if ($current_user->ID !== 2) {
        return;
    }

    global $menu, $submenu;

    // 消したいメニュー（pageパラメータ・投稿タイプスラッグ）
    $remove = [
        // 前回までのリスト
        'wsal-auditlog',
        'wsal-wsal-views-premium-features',
        'wsal-notifications',
        'wsal-settings',
        'wsal-togglealerts',
        'wsal-help',
        'stats',
        'my-jetpack',
        'jetpack-social',
        'akismet-key-config',
        'jetpack-forms-admin',
        'jetpack-search',
        'jetpack',
        'edit.php?post_type=mw-wp-form',
        'login-customizer',
        'themes.php',
        'plugins.php',
        'tools.php',
        'options-general.php',
        'aioseo',
        'edit.php?post_type=smart-custom-fields',
        'MarcatGiaSettingTop',
        'really-simple-security',
        // 新規追加分
        'edit-comments.php',           // コメント
        'WPvivid',                     // WPvividバックアップ
        'siteguard',                   // SiteGuard
        'wpfastestcacheoptions',       // WP Fastest Cache
        'aiowpsec',                     // AIOSセキュリティ
        'sbi-feed-builder',
        'sbi-settings',
        'sbi-oembeds-manager',
        'sbi-about-us',
        'Instagram Feed',
    ];

    // メインメニュー削除
    foreach ($menu as $index => $item) {
        if (in_array($item[2], $remove)) {
            unset($menu[$index]);
        }
    }

    // サブメニュー削除
    foreach ($submenu as $parent => $subitems) {
        foreach ($subitems as $subindex => $subitem) {
            if (in_array($subitem[2], $remove)) {
                unset($submenu[$parent][$subindex]);
            }
        }
    }
}, 9999);

add_action('admin_bar_menu', function ($wp_admin_bar) {
    $current_user = wp_get_current_user();

    // ユーザーID=2 の場合のみ実行
    if ($current_user->ID !== 2) {
        return;
    }

    // WordPress アイコン（左上ロゴ）を削除
    $wp_admin_bar->remove_node('wp-logo');
}, 999);

add_action('admin_init', function () {
    $current_user = wp_get_current_user();

    // ユーザーID=2 の場合のみ実行
    if ($current_user->ID !== 2) {
        return;
    }

    // 編集禁止の投稿IDリスト
    $blocked_posts = [220, 221];

    // 現在の画面情報を取得
    $screen = get_current_screen();
    if ($screen && $screen->base === 'post' && isset($_GET['post'])) {
        $post_id = intval($_GET['post']);
        if (in_array($post_id, $blocked_posts)) {
            // 編集画面に入ろうとしたら投稿一覧へリダイレクト
            wp_redirect(admin_url('edit.php'));
            exit;
        }
    }
});
add_action('admin_init', function () {
    $current_user = wp_get_current_user();

    // ユーザーID=2 の場合のみ制御
    if ($current_user->ID !== 2) {
        return;
    }

    // 編集禁止の固定ページIDリスト
    $blocked_pages = [220, 221]; // ここに対象の固定ページIDを入れる

    // 現在の画面情報を取得
    $screen = get_current_screen();
    if ($screen && $screen->base === 'post' && $screen->post_type === 'page') {
        $page_id = intval($_GET['post'] ?? 0);
        if (in_array($page_id, $blocked_pages)) {
            // 編集画面に入ろうとしたら固定ページ一覧にリダイレクト
            wp_redirect(admin_url('edit.php?post_type=page'));
            exit;
        }
    }
});

add_action('pre_get_posts', function ($query) {
    $current_user = wp_get_current_user();

    // ユーザーID=2 の場合のみ
    if ($current_user->ID !== 2) {
        return;
    }

    // 管理画面かつ固定ページの一覧
    if (is_admin() && $query->is_main_query() && $query->get('post_type') === 'page') {
        $blocked_pages = [220, 221]; // 非表示にしたい固定ページID
        $query->set('post__not_in', $blocked_pages);
    }
});

add_action('admin_init', function () {
    $current_user = wp_get_current_user();

    // ユーザーID=2 の場合のみ制御
    if ($current_user->ID !== 2) {
        return;
    }

    // 編集禁止のユーザーIDリスト
    $blocked_users = [1]; // ここに編集禁止のユーザーIDを入れる

    // user-edit.php にアクセスしているかチェック
    if (isset($_GET['user_id']) && basename($_SERVER['PHP_SELF']) === 'user-edit.php') {
        $edit_user_id = intval($_GET['user_id']);
        if (in_array($edit_user_id, $blocked_users)) {
            // ユーザー一覧にリダイレクト
            wp_redirect(admin_url('users.php'));
            exit;
        }
    }
});

// 不要な画像サイズの自動生成を停止
function disable_default_image_sizes()
{
    // デフォルトのサイズを削除
    remove_image_size('thumbnail');
    remove_image_size('medium');
    remove_image_size('medium_large');
    remove_image_size('large');
    remove_image_size('1536x1536');
    remove_image_size('2048x2048');

    // 追加登録されているサイズを削除（プラグインやテーマによるもの）
    foreach (get_intermediate_image_sizes() as $size) {
        remove_image_size($size);
    }
}
add_action('init', 'disable_default_image_sizes');

//よくあるご質問
add_action('init', 'faq_init');
function faq_init()
{
    $labels = array(
        'name'               => _x('よくあるご質問', 'post type general name', 'your-plugin-textdomain'),
        'singular_name'      => _x('よくあるご質問', 'post type singular name', 'your-plugin-textdomain'),
        'menu_name'          => _x('よくあるご質問', 'your-plugin-textdomain'),
        'name_admin_bar'     => _x('よくあるご質問', 'add new on admin bar', 'your-plugin-textdomain'),
        'add_new'            => _x('よくあるご質問を新規登録', 'blog', 'your-plugin-textdomain'),
        'add_new_item'       => __('よくあるご質問を新規登録', 'your-plugin-textdomain'),
        'new_item'           => __('よくあるご質問を新規登録', 'your-plugin-textdomain'),
        'edit_item'          => __('よくあるご質問を編集', 'your-plugin-textdomain'),
        'view_item'          => __('よくあるご質問を見る', 'your-plugin-textdomain'),
        'all_items'          => __('すべてのfaq', 'your-plugin-textdomain'),
        'search_items'       => __('よくあるご質問を探す', 'your-plugin-textdomain'),
        'parent_item_colon'  => __('Parent よくあるご質問:', 'your-plugin-textdomain'),
        'not_found'          => __('No books found.', 'your-plugin-textdomain'),
        'not_found_in_trash' => __('No books found in Trash.', 'your-plugin-textdomain')
    );
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'faq'),
        'capability_type'    => 'post',
        'show_in_rest' => true,
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 4,
        'supports'           => array('title', 'editor', 'thumbnail')
    );
    register_post_type('faq', $args);
}
function create_faq_taxonomy()
{
    register_taxonomy(
        'faq_category',
        'faq',
        array(
            'show_in_rest' => true,
            'label' => __('よくあるご質問区分'), //管理画面に表示されるラベル
            'hierarchical' => true //trueだとカテゴリー、falseだとタグ
        )
    );
}
//メニューで次や前を取得
function get_adjacent_custom_post($in_same_term = false, $excluded_terms = '', $previous = true, $taxonomy = 'menu_category', $post_type = 'menu')
{
    global $post;

    $current_post_date = $post->post_date;
    $current_post_id = $post->ID;

    $args = array(
        'post_type'      => $post_type,
        'posts_per_page' => 1,
        'orderby'        => 'post_date',
        'order'          => $previous ? 'DESC' : 'ASC',
        'post_status'    => 'publish',
        'date_query'     => $previous
            ? array(array('before' => $current_post_date))
            : array(array('after' => $current_post_date)),
    );

    if ($in_same_term) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => $taxonomy,
                'field'    => 'term_id',
                'terms'    => wp_get_post_terms($current_post_id, $taxonomy, array('fields' => 'ids')),
            ),
        );
    }

    $adjacent = get_posts($args);
    return $adjacent ? $adjacent[0] : null;
}
