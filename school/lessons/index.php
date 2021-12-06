<?php
session_start();

include $_SERVER['DOCUMENT_ROOT'] . '/clMysql.php'; //подключаем биб. для работы с БД

include $_SERVER['DOCUMENT_ROOT'] . '/clNav.php';
$clMysql = new clMysql();
$clMysql->ConnectedDefaultBase();;


$clNav = new clNav($clMysql);


?>

    <!doctype html>
    <html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Главная страница</title>
        <link rel="stylesheet" href="/css/style.css?v=<?= rand(1, 1000000) ?>" type="text/css">
        <link rel="stylesheet" href="/css/reset.css?v=<?= rand(1, 1000000) ?>" type="text/css">
        <link rel="stylesheet" href="/css/main.css" type="text/css">
        <link rel="stylesheet" href="/css/Stratos%20LC%20Web.css" type="text/css">
        <link href='/css/calendar.css' rel='stylesheet'/>
        <link rel="stylesheet" href="/css/font-awesome.min.css">
        <meta name="yandex-verification" content="3793376a9581f55d"/>
        <script type="text/javascript" src="/js/jquery.min.js"></script>
        <script type="text/javascript" src="/js/jquery-ui.min.js"></script>
        <script type="text/javascript" src='/js/calendar.js'></script>
        <script type="text/javascript" src='/js/calendar-locales-all.js'></script>
        <script type="text/javascript" src='/js/main.js'></script>

        <link rel="stylesheet" href="/css/jquery.bxslider.css">
        <script src="/js/jquery.bxslider.min.js"></script>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/calendar/head.php'; ?>
    </head>
<body>


    <div id="fade" class="fade"
         onclick="$('.dialog_reg').css({display:'none'});$('.dialog_auth').css({display:'none'});$('.fade').css({display:'none'});"></div>


<?php

include $_SERVER['DOCUMENT_ROOT'] . '/block/dialog_auth/dialog_auth.php';
include $_SERVER['DOCUMENT_ROOT'] . '/block/dialog_reg/dialog_reg.php';
include $_SERVER['DOCUMENT_ROOT'] . '/block/top_menu.php'; //подключаем верхнее меню


?>


<table style="height: 100%; width: 100%;" cellpadding="0" cellspacing="0">
    <tbody>
<tr>

    <td style="width: 100%; height: 100%;">
    <table style="height: 100%; width: 100%; box-shadow: 0 0 5px -2px #000;">
    <tbody>
    <!--                    <tr>-->
    <!--                        <td style="vertical-align: top; height: 30px; padding-bottom: 0;"><div></div></td>-->
    <!--                    </tr>-->
<tr>
    <td style="background-color: black;vertical-align: top; text-align: -webkit-center;">
    <table style="width: 100%; height: 100%;">
        <tr>
            <td style="padding: 0;">
                <input type="range" class="form-range" id="customRange1" min="0" max="10000"
                       value="7000">
                <div class="drag-container" id="drag-container">
                    <div class="panel-one" id="drag-left">
                        <iframe id="lesson-board" onload="load_frame(this)"
                                src="http://<?= $clNav->board_link ?>/boards/<?= $clNav->board_url ?>"></iframe>
                    </div>
                    <div class="dragbar" id="dragbar"></div>
                    <div class="panel-two" id="drag-right">
                        <?


                        $url = "";
                        if (!array_key_exists("book", $_GET)) {
                            ?>
                            <div style="background-color: ">Не выбран учебник :(<br><a href="/books">выбрать учебник</a>
                            </div><?
                        } else {
//---------------------------------------------------------------------------------------------------------------------------------
                            if (intval($_GET['book'] == 1)) {
                                $url = "/pdfs/1/1Aleksandrova1ch.pdf";
                            }
                            if (intval($_GET['book'] == 2)) {
                                $url = "/pdfs/1/1Aleksandrova2ch.pdf";
                            }
                            if (intval($_GET['book'] == 3)) {
                                $url = "/pdfs/1/1Dlyatehktolybitmatematiky.pdf";
                            }
                            if (intval($_GET['book'] == 4)) {
                                $url = "/pdfs/2/2Bogdanovich_M.V.,_Lishenko_G.P.pdf";
                            }
                            if (intval($_GET['book'] == 5)) {
                                $url = "/pdfs/2/2Chebotarevskaya_T.M.,_Nikolaeva_V.V._1part.pdf";
                            }
                            if (intval($_GET['book'] == 5)) {
                                $url = "/pdfs/2/2Chebotarevskaya_T.M.,_Nikolaeva_V.V._2_part.pdf";
                            }


                            ?>
                        <iframe id="lesson-book" src="<?= $url ?>" width="100%" height="100%">
                            </iframe><?
                        }
                        //---------------------------------------------------------------------------------------------------------------------------------

                        ?>

                    </div>
            </td>
        </tr>

    </table>


    <script type="text/javascript">
        function load_frame(t) {
            let iframeLink = document.createElement('link');

            iframeLink.href = '/css/reset_iframe.css'; // css файл для iFrame
            iframeLink.rel = 'stylesheet';
            iframeLink.type = 'text/css';

            // вставляем в [0] - индекс iframe
            frames[0].document.head.appendChild(iframeLink);

        }


    </script>

    <script>
        //слайдер
        window.onload = init;

        function init() {
            const left = document.getElementById('drag-left');
            const bar = document.getElementById('dragbar');
            const rng = document.getElementById('customRange1')

            const drag = (e) => {
                document.selection ? document.selection.empty() : window.getSelection().removeAllRanges();
                left.style.width = (e.pageX - bar.offsetWidth / 2) + 'px';
            }
            rng.addEventListener('mousedown', () => {
                document.addEventListener('mousemove', drag);
            });

            document.addEventListener('mouseup', () => {
                document.removeEventListener('mousemove', drag);
            });

            const chosen_book = localStorage.getItem('chosen_book')
            const urlSearchParams = new URLSearchParams(window.location.search);
            const params = Object.fromEntries(urlSearchParams.entries());
            if (chosen_book && !params['book']) {
                document.location.href = `/lessons?book=${chosen_book}`;
            }
        }
    </script>

    <style>
        body {
            overflow: hidden;
        }

        #lesson-board {
            width: 100%;
            height: 100%;
            background-color: #fffcef;
        }

        .drag-container {
            display: flex;
            flex: 1 1 auto;
            height: 100%;
        }

        .dragbar {
            cursor: col-resize;
            background-color: #9b9b9b;
        }

        .panel-one {
            width: 70%;
            overflow: hidden;
        }

        .panel-two {
            flex: 1;
            width: 30%;
            overflow: hidden;
        }

        #shapochka {
            height: 36px;
        }

        .bt_gray {
            font-size: 16px;
            padding: 5px;
        }

        .img-logo {
            height: 30px;
        }

        .colorLink {
            font-size: 17px;
            font-weight: 400;
        }

        #customRange1 {
            width: 100%;
            border: 0;
            -webkit-appearance: none;
            margin: 0;
            padding: 0 0 4px 0;
            background-color: transparent !important;
            position: absolute;
            top: 36px;
            z-index: 100;
        }

        #customRange1:focus {
            outline: none;
        }

        #customRange1::-webkit-slider-runnable-track {
            cursor: pointer;
            box-shadow: 2px 2px 6px rgba(7, 7, 163, 0.72), 0 0 2px rgba(8, 8, 187, 0.72);
            background: #ac62ff;
            border-radius: 22px;
            border: 1px solid rgba(163, 0, 255, 0.79);
        }

        #customRange1::-webkit-slider-thumb {
            box-shadow: 2px 2px 9px rgba(4, 16, 14, 0.78), 0 0 2px rgba(9, 36, 32, 0.78);
            border: 2px solid rgba(0, 0, 6, 0.77);
            border-radius: 28px;
            background: #b18c59;
            cursor: pointer;
            -webkit-appearance: none;
            margin-top: -7.8px;
        }

        #customRange1:focus::-webkit-slider-runnable-track {
            background: #b16cff;
        }

        #customRange1::-moz-range-track {
            width: 100%;
            cursor: pointer;
            box-shadow: 2px 2px 6px rgba(7, 7, 163, 0.72), 0 0 2px rgba(8, 8, 187, 0.72);
            background: #ac62ff;
            border-radius: 22px;
            border: 1px solid rgba(163, 0, 255, 0.79);
        }

        #customRange1::-moz-range-thumb {
            box-shadow: 2px 2px 9px rgba(4, 16, 14, 0.78), 0 0 2px rgba(9, 36, 32, 0.78);
            border: 2px solid rgba(0, 0, 6, 0.77);
            border-radius: 28px;
            background: #b18c59;
            cursor: pointer;
        }

        #customRange1::-ms-track {
            width: 100%;
            cursor: pointer;
            background: transparent;
            border-color: transparent;
            color: transparent;
        }

        #customRange1::-ms-fill-lower {
            background: #a758ff;
            border: 1px solid rgba(163, 0, 255, 0.79);
            border-radius: 43px;
            box-shadow: 2px 2px 6px rgba(7, 7, 163, 0.72), 0 0 2px rgba(8, 8, 187, 0.72);
        }

        #customRange1::-ms-fill-upper {
            background: #ac62ff;
            border: 1px solid rgba(163, 0, 255, 0.79);
            border-radius: 43px;
            box-shadow: 2px 2px 6px rgba(7, 7, 163, 0.72), 0 0 2px rgba(8, 8, 187, 0.72);
        }

        #customRange1::-ms-thumb {
            box-shadow: 2px 2px 9px rgba(4, 16, 14, 0.78), 0 0 2px rgba(9, 36, 32, 0.78);
            border: 2px solid rgba(0, 0, 6, 0.77);
            border-radius: 28px;
            background: #b18c59;
            cursor: pointer;
        }

        #customRange1:focus::-ms-fill-lower {
            background: #ac62ff;
        }

        #customRange1:focus::-ms-fill-upper {
            background: #b16cff;
        }

        /* Track */
        #customRange1::-webkit-slider-runnable-track {
            height: 6px;
        }

        #customRange1::-moz-range-track {
            height: 6px;
        }

        #customRange1::-ms-track {
            height: 6px;
        }

        /* Thumb */
        #customRange1::-webkit-slider-thumb {
            height: 20px;
            width: 8px;
        }

        #customRange1::-moz-range-thumb {
            height: 20px;
            width: 8px;
        }

        #customRange1::-ms-thumb {
            height: 20px;
            width: 8px;
        }
    </style>

<? //
//include $_SERVER['DOCUMENT_ROOT']. '/footer.php';
//
//?>