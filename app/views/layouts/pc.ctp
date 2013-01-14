<!DOCTYPE html>
<html lang="ja" xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=no;"/>
    <meta name="format-detection" content="telephone=no"/>
    <link rel="stylesheet" media="screen,handheld" href="/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" media="screen,handheld" href="/css/bootstrap-responsive.min.css" type="text/css">
    <link href="/css/layout.css" rel="stylesheet" type="text/css"/>
    <link href="/css/forms.css" rel="stylesheet" type="text/css"/>
    <link href="/css/ajaxui.css" rel="stylesheet" type="text/css"/>
    <link href="/css/style.css" rel="stylesheet" type="text/css"/>
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <title>tygrys</title>
</head>

<body>
<div id="wrap">
    <div id="topbar">
        <a href="/">
            <div id="logo"></div>
        </a>

        <div id="global-nav">
            <ul>
                <li class="current">
                    <a href="/" class="leftBorder">トップ</a>
                </li>
                <li>
                    <a href="/regist/newAim/">目標登録</a>
                </li>
                <!-- <li><a href="#">ランキング</a></li> -->
                <li>
                    <a href="/user/${tygrysId }">マイページ</a>
                </li>
                <li>
                    <a href="/regist/config/">設定変更</a>
                </li>
                <li>
                    <a href="#">お問い合わせ</a>
                </li>
            </ul>
        </div>
    </div>
    <div id="header"></div>
    <div id="content">
        <div id="main">
            <div id="topcategorieslink" class="clear">
                <h2>目標一覧</h2>
                <ul>
                    <li>
                        <a href=""></a>
                    </li>

                    <li>
                        <a href="/">新着</a>
                    </li>

                    <li>
                        <a href="/popular">注目</a>
                    </li>

                    <li>
                        <a href="/finished">達成済</a>
                    </li>
                </ul>
            </div>
            <div class="clear">
                &nbsp;</div>
            <div id="list_header">
                <h1 class="pen_blue">
                    新着の目標</h1>
            </div>
            <ul class="listing">
                <li>
                    <div class="listinfo">
                        <div class="list_image">
                            <a href="/user/${aimDataMap[aim.key.id]['user_id']}"><img src=" ${aimDataMap[aim.key.id]['image_icon']}" alt=" ${aimDataMap[aim.key.id]['screen_name']}" class="listingimage" width="64px" height="64px"/>

                                <p class="screen_name" id="screen_name${aim.key.id}">
                                    ${aimDataMap[aim.key.id]['screen_name']}</p>
                            </a>
                        </div>
                        <div class="leftinfo">
                            <h3>
                                <a href="/aim/${aim.key.id}">${f:h(aim.title) }</a>
                            </h3>

                            <p class="toGoal">
                                目標達成まであと${f:h(aim.toGoal)}</p>

                            <p class="keep_day">
                                現在の継続日数:
                                ${aimDataMap[aim.key.id]['continue_day']}日</p>

                            <p class="start_date">
                                目標開始日: </p>

                            <p class="goal_date">
                                目標達成日: </p>
                        </div>
                        <div class="rightinfo">
                            <img src="/img/mybest.png" alt="自己記録更新中!"/>
                        </div>
                    </div>
                    <div class="listingbtns">
                        <div class="twipsy above">
                            <div class="twipsy-arrow"></div>
                            <div class="twipsy-inner">
                                <span id="watch${aim.key.id }">${aimDataMap[aim.key.id]['watch_count']}</span>
                            </div>
                        </div>
<span class="buttons">
<span class="watchButton ${aim.key.id } ${aimDataMap[aim.key.id]['watch_flg']}"></span></span>
                        <a href="http://twitter.com/share" class="twitter-share-button" data-url="${aimDataMap[aim.key.id]['tweet_url'] }" data-text="${aimDataMap[aim.key.id]['tweet_body'] }" data-count="horizontal" data-via="Vexus2" data-related="tygrys3" data-lang="ja">ツイート</a>
                        <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
<span class="listbuttons">
<a href="/aim/${f:h(aim.key.id)} ">詳細ページへ</a></span>
                    </div>
                    <div class="clear">
                        &nbsp;</div>
                </li>
            </ul>
            <div id="nextpage">
                <a href="/?offset=${beforeCount }">前の10件</a>&nbsp;<a href="/?offset=${nextCount }">次の10件</a>
            </div>
        </div>

        <div id="home_sidebar">
            <a href="/twitter/requestToken">
                <div id="twitter_login" class="smsalert">
                    &nbsp;</div>
            </a>

            <div class="block smsalert">

                <div id="user_profile">
                    <div id="image_icon">
                        <img src=" ${userInfo['image_icon']}" alt="${userInfo['screen_name'] }" id="self_image_icon" width="64px" height="64px"/>
                    </div>
                    <div id="user_name">
                        <p>
                            ${userInfo['screen_name'] }</p>
                    </div>
                </div>
                <a href="/regist/newAim">
                    <div id="reg_aim"></div>
                </a>

                <div id="user_info">
                    <p>
                        現在進行中の目標:
                        ${userInfo['progressAim'] }件</p>

                    <p>
                        今までに達成した目標:
                        ${userInfo['achievementAim'] }件</p>
                </div>
            </div>
        </div>
        <div class="clear">
            &nbsp;</div>
        <div id="sidebar">
            <div class="block advert">

            </div>
            <div class="menulist block">
                <script src="http://widgets.twimg.com/j/2/widget.js"></script>
                <script>
                    new TWTR.Widget({
                        version :2,
                        type    :'profile',
                        rpp     :6,
                        interval:6000,
                        width   :260,
                        height  :350,
                        theme   :{
                            shell :{
                                background:'#1c1c1c',
                                color     :'#ffffff'
                            },
                            tweets:{
                                background:'#333333',
                                color     :'#ffffff',
                                links     :'#4aed05'
                            }
                        },
                        features:{
                            scrollbar:false,
                            loop     :false,
                            live     :true,
                            hashtags :true,
                            timestamp:true,
                            avatars  :true,
                            behavior :'all'
                        }
                    }).render().setUser('tygrys3').start();
                </script>
                <div class="clear">
                    &nbsp;</div>
            </div>

        </div>

        <div class="clear">
            &nbsp;</div>
    </div>
    <div id="footer">
        <p>tygrys by
            @vexus2</p>
    </div>
</div>
<script type="text/javascript" src="/js/jquery.confirm/jquery.confirm.js"></script>
<script type="text/javascript" src="/js/watch.js"></script>
</body>

<?= $content_for_layout ?>
</html>



