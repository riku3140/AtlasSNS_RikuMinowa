<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
    <header>
        <div id = "head">
        <h1><a href="/top"><img src="/images/atlas.png"></a></h1>
            <div class="header-content">
                <div class="header-logo">
                    <p class="name">{{ Auth::user()->username }} さん</p>
                </div>
                <div class="accordion">
                    <p class="nav-btn"></p>
                    <ul class="nav-menu">
                    <li class="menu-item"><a href="/top">ホーム</a></li>
                    <li class="menu-item"><a href="/profile">プロフィール</a></li>
                    <li class="menu-item"><a href="/logout">ログアウト</a></li>
                    </ul>
                </div>
                <img src="{{ asset('storage/'.Auth::user()->images) }}">
            </div>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p class="username">{{ Auth::user()->username }}さんの</p>
                <div class="follow-info">
                 <p class="follow-count">フォロー数</p>
                 <p class="count">{{Auth::user()->follows()->count()}}名</p>
                </div>
                <p class="btn"><a href="/followList">フォローリスト</a></p>

                <div class="follow-info">
                    <p class="follower-count">フォロワー数</p>
                    <p class="count">{{Auth::user()->follower()->count()}}名</p>
                </div>
                 <p class="btn"><a href="/followerList">フォロワーリスト</a></p>
            <div class="line"></div>
            <p class="btn-search"><a href="/search">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>
    <script src="JavaScriptファイルのURL"></script>
    <script src="/js/jquery-3.7.1.min.js"></script>
    <script src="{{ asset('js/script.js')}}"></script>
</body>
</html>
