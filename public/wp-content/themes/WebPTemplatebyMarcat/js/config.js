// config.js
window.addEventListener('load', () => { // DOMContentLoaded から load に変更
    if (typeof Lenis !== 'undefined') {
        lenis = new Lenis({
            autoRaf: true,
        });

        // もし autoRaf が効かない旧バージョンの場合は以下を継続
        function raf(time) {
            lenis.raf(time);
            requestAnimationFrame(raf);
        }
        requestAnimationFrame(raf);
    } else {
        // ここでエラーが出るなら、そもそも lenis.min.js の読み込み自体に失敗しています
    }
});

(function ($) {
    $('.jsmenuHeaderPc').on('click', function () {
        $('.navHeaderBase').slideToggle();
        if ($(this).hasClass('off')) {
            $(this).removeClass('off').addClass('on');
            $(this).find('.txtMenuHeader').text('CLOSE');
        } else {
            $(this).removeClass('on').addClass('off');
            $(this).find('.txtMenuHeader').text('MENU');
        }
    });

    $('.navHeaderBase a').on('click', function () {

        $('.navHeaderBase').slideToggle();
        if ($('.jsmenuHeaderPc').hasClass('off')) {
            $('.jsmenuHeaderPc').removeClass('off').addClass('on');
            $('.jsmenuHeaderPc').find('.txtMenuHeader').text('CLOSE');
        } else {
            $('.jsmenuHeaderPc').removeClass('on').addClass('off');
            $('.jsmenuHeaderPc').find('.txtMenuHeader').text('MENU');
        }
    });

    //スムーススクロール
    // スムーススクロール（Lenis対応）
    $(window).on('load', function () {
        const headerHeight = $('.base_header').outerHeight() || 0;
        const urlHash = location.hash;

        // ページ読み込み時にハッシュがある場合
        if (urlHash && $(urlHash).length) {
            if (lenis) {
                lenis.scrollTo($(urlHash).offset().top - headerHeight - 16, {
                    duration: 1.2
                });
            }
        }

        // ページ内リンククリック時
        $('a[href^="#"]').on('click', function (e) {
            const href = $(this).attr('href');
            if (href === '#' || href === '') return;

            const target = $(href);
            if (target.length) {
                e.preventDefault();
                const position = target.offset().top - headerHeight - 16;
                lenis.scrollTo(position, {
                    duration: 1.2
                });
            }
        });
    });

})(jQuery);


//カレンダー

(function ($) {
    parseInt(calendar_y);
    parseInt(calendar_m);
    get_calendar(calendar_y, calendar_m);
    $('.js_prev_sidebar_eventcalendar').on('click', function () {
        calendar_m--;
        if (calendar_m < 1) {
            calendar_m = 12;
            calendar_y = calendar_y - 1;
        }
        calendar_m = ('00' + calendar_m).slice(-2);
        set_year_month(calendar_y, calendar_m);
        get_calendar(calendar_y, calendar_m);
    });
    $('.js_next_sidebar_eventcalendar').on('click', function () {
        calendar_m++;
        if (calendar_m > 12) {
            calendar_m = 1;
            calendar_y = parseInt(calendar_y) + 1;
        }
        calendar_m = ('00' + calendar_m).slice(-2);
        set_year_month(calendar_y, calendar_m);
        get_calendar(calendar_y, calendar_m);
    });

    function set_year_month(calendar_y, calendar_m) {
        $('.js_eventcalendar_now_year').empty().append(calendar_y);
        $('.js_eventcalendar_now_month').empty().append(calendar_m);
    }

    function get_calendar(calendar_y, calendar_m) {
        urlname = rest_url + "MarcatCalendarsAPI/?year=" + calendar_y + '&month=' + calendar_m;
        $.getJSON(urlname, function (results) {
            $('.js_main_sidebar_eventcalendar').empty();
            setTimeout(() => {
                $('.js_main_sidebar_eventcalendar').append(results.html);
            }, "1000");
        });
    }

    //カレンダークリック時
    let opencalendar;
    $(document).on('click', '.jstitleCalendarPosts', function () {
        $('.jsbgCalendarLxn').fadeOut();
        opencalendar = $(this).data('opendetail');
        $(opencalendar).fadeIn();
    });

    $(document).on('click', '.jsbgCalendarLxn', function () {
        $('.jsbgCalendarLxn').fadeOut();
    });
    $(document).on('click', '.jsCloseCalendar', function () {
        $('.jsbgCalendarLxn').fadeOut();
    });
})(jQuery);



//緊急お知らせ
//緊急お知らせ
(function ($) {

    let counterText;
    let table2Text;
    let table4Text;
    let cntents;
    let nowcnt;

    function nl2br(str) {
        if (!str) return "";
        return String(str).replace(/\r\n|\r|\n/g, "<br>");
    }

    // 初期
    setRestCnt();

    async function setRestCnt() {

        $('.jsnowNewsCnt').empty();

        const nowurl = home_url + '/wp-json/gokomusubi/v1/status';

        const results = await $.getJSON(nowurl);

        counterText = results.counter == 0 ?
            "満席" :
            `残り<span class="fw_800">${results.counter}</span>席`;

        table2Text = results.table2 == 0 ?
            "満席" :
            `残り<span class="fw_800">${results.table2}</span>卓`;

        table4Text = results.table4 == 0 ?
            "満席" :
            `残り<span class="fw_800">${results.table4}</span>卓`;

        const holiday = await getHoliday();

        cntents = '';
        nowcnt = '';

        if (!results['menu']) {

            cntents = '';

        } else {

            cntents =
                '<h2 class="t_center cl_EE945C Mochiy fw_400 h2NowNewsCnt">今日のおすすめメニュー</h2>' +
                '<p class="t_center cl_020202 Mochiy fw_400 txtNowNewsCntTop">' +
                nl2br(results['menu']) +
                'です。</p>';
        }

        if (holiday === true) {

            nowcnt =
                '<h2 class="t_center cl_020202 Mochiy fw_400 h2NowNewsCnt">今日は　<span class="gigh2NowNewsCnt02 cl_E9483E">休業日</span>です!</h2>' +
                '<img loading="lazy" src="' + theme_url + '/img/nowstatuscara.png" alt="" width="76.4" height="76.4">';

        } else {

            if (results['status'] === "一人対応中") {

                nowcnt =
                    '<h2 class="t_center cl_020202 Mochiy fw_400 h2NowNewsCnt ">現在<span class="gigh2NowNewsCnt02 cl_E9483E ">' +
                    results['status'] +
                    '</span>です!</h2>';

                nowcnt +=
                    '<p class="t_center cl_020202 Mochiy fw_400 txtNowNewsCntTop">DM・LINE返信不可となります。<br>ご予約は下記よりお願い致します。</p>';

                nowcnt +=
                    '<p class="t_center cl_020202 Mochiy fw_400 txtNowNewsCntTop"><a class="cl_E9483E undernone " href="tel:078-995-8420">078-995-8420</a></p>';

                nowcnt +=
                    '<img loading="lazy" src="' + theme_url + '/img/nowstatuscara.png" alt="" width="76.4" height="76.4">';

            } else {

                nowcnt =
                    '<h2 class="t_center cl_020202 Mochiy fw_400 h2NowNewsCnt">現在お店は　<span class="gigh2NowNewsCnt02 cl_E9483E">' +
                    results['status'] +
                    '</span>　です!</h2>' +
                    '<img loading="lazy" src="' + theme_url + '/img/nowstatuscara.png" alt="" width="76.4" height="76.4">';
            }
        }

        $('.jsnowNewsCnt').append(cntents + nowcnt);
    }

    setInterval(function () {
        setRestCnt();
    }, 30000);

    async function getHoliday() {

        const restHoliday = home_url + '/wp-json/wp/v2/calendar/226/?_embed';

        const results = await $.getJSON(restHoliday);

        const today = new Date();

        const todayStr =
            today.getFullYear() + '-' +
            String(today.getMonth() + 1).padStart(2, '0') + '-' +
            String(today.getDate()).padStart(2, '0');

        return results['post_meta']['eventdate'].includes(todayStr);
    }

})(jQuery);

(function ($) {


    //トリガーメニュー
    $(document).on('click', '.jsbtnMenuGenre', function () {
        $('.jsmenuGenreLxn').slideToggle();
        if ($(this).hasClass('off')) {
            $(this).removeClass('off').addClass('on');
        } else {
            $(this).removeClass('on').addClass('off');
        }
    });
    $(document).on('click', '.jsbtnMenuGenreLxnBx', function () {
        $(this).next('.jsulSubMenuGenreLxn').slideToggle();
        if ($(this).hasClass('off')) {
            $(this).removeClass('off').addClass('on');
        } else {
            $(this).removeClass('on').addClass('off');
        }
    });

    $(document).on('click', '.jsbtnFaq', function () {
        $(this).next('.jsFaqLxn').slideToggle();
        if ($(this).hasClass('off')) {
            $(this).removeClass('off').addClass('on');
        } else {
            $(this).removeClass('on').addClass('off');
        }
    });
})(jQuery);

//スライダー
window.addEventListener('load', function () {
    const swiper = new Swiper('.swiper', {
        loop: true,
        speed: 500, // スライドアニメーション速度 0.5秒
        autoplay: {
            delay: 4000, // 4秒ごとに自動スライド
            disableOnInteraction: false, // ユーザー操作後も自動再生を継続
        },

        allowTouchMove: true,
    });

    // 動画再生中はスワイプ禁止、終了で次スライド
    const videos = document.querySelectorAll('.my-video');
    videos.forEach(video => {
        video.addEventListener('play', () => {
            swiper.autoplay.stop(); // 動画再生中は自動スライド停止
            swiper.allowTouchMove = false;
        });

        video.addEventListener('ended', () => {
            swiper.allowTouchMove = true;
            swiper.autoplay.start(); // 自動スライド再開
            swiper.slideNext(); // 次のスライドへ
            const nextVideo = swiper.slides[swiper.activeIndex].querySelector('video');
            if (nextVideo) {
                nextVideo.currentTime = 0;
                nextVideo.play(); // 次の動画があれば再生
            }
        });

        video.addEventListener('pause', () => {
            swiper.allowTouchMove = true;
            swiper.autoplay.start(); // 一時停止後は自動スライド再開
        });
    });

    // 初期スライドの動画自動再生
    window.addEventListener('load', () => {
        const firstVideo = swiper.slides[swiper.activeIndex].querySelector('video');
        if (firstVideo) firstVideo.play();
    });
});