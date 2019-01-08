<html>
<head>
    <title>Instascan &ndash; QR Code Scanner</title>
    <link href="{{ asset('css/material.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}"  rel="stylesheet">
    <link rel="icon" type="image/png" href="{{asset('img/favicon.png')}}">
    <script type="text/javascript" src="{{ asset('js/build/jquery-3.0.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/build/zxing.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('js/build/camera.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/build/qr.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('js/build/material.min.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('js/build/store.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/build/visibility.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/build/vue.min.js') }}"></script>
</head>
<body id="app">
<nav class="menu" id="history-menu">
    <div class="menu-scroll">
        <div class="menu-content">
            <div class="menu-logo">
                <div class="title">History</div>
                <div class="row" style="margin-bottom: 20px; text-align: right" >
                        <div class="col-lg-12">
                            <a href="{{ route('admin.assets.index') }}">返回</a>
                        </div>
                </div>
            </div>
            <div class="container" v-if="!scans.length">
                <p>No scan history</p>
            </div>
            <div class="tile-wrap">
                <div v-for="scan in scans | orderBy 'date' -1" class="tile">
                    <div class="tile-action">
                        <ul class="nav nav-list margin-no pull-right">
                        </ul>
                    </div>
                    <div class="tile-inner">
                        <a v-if="isHttpUrl(scan.content)" href="@{{scan.content}}" target="_blank" class="text-overflow">
                            @{{ scan.content }}
                        </a>
                        <span v-else class="text-overflow">@{{ scan.content }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
<div class="overlay">
    <a id="menu-button" class="fbtn fbtn-brand fbtn-lg waves-attach waves-circle" data-toggle="menu" href="#history-menu">
        <span class="icon icon-lg"></span>
    </a>
    <div id="camera"/>
</div>
<script type="text/javascript" src="{{asset('js/build/app.js')}}"></script>
</body>
</html>
