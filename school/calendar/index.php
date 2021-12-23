<?php

if(!isset($_SESSION))
{
    session_start();
}

include $_SERVER['DOCUMENT_ROOT'] . '/clMysql.php'; //подключаем биб. для работы с БД
include $_SERVER['DOCUMENT_ROOT'] . '/clNav.php';

$clMysql = new clMysql();
$clMysql->ConnectedDefaultBase();

$clNav = new clNav($clMysql);

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Расписание - Mercury School</title>
    <meta lang="ru" content="Уроки по математике. Дистанционно. Онлайн доска. Подготовка ВПР, ОГЭ, ЕГЭ, повышение успеваемости." name="description">
    <link rel="apple-touch-icon" sizes="180x180" href="/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!--    <link rel="stylesheet" href="/css/style.css?v=--><?//= rand(1, 1000000) ?><!--" type="text/css">-->
    <link rel="stylesheet" href="/css/responsive.css?v=<?= rand(1, 1000000) ?>" type="text/css">
    <link rel="stylesheet" href="/css/Stratos%20LC%20Web.css" type="text/css">
    <link href='/css/calendar.css' rel='stylesheet'/>
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <meta name="yandex-verification" content="3793376a9581f55d"/>
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src='/js/calendar.js'></script>
    <script type="text/javascript" src='/js/calendar-locales-all.js'></script>
    <script type="text/javascript" src='/js/main.js'></script>
    <meta name='wmail-verification' content='7fc725a85fd175254b5f98ba8cd5f643' />
    <link rel="stylesheet" href="/css/jquery.bxslider.css">
    <script src="/js/jquery.bxslider.min.js"></script>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/calendar/head.php'; ?>
</head>
<body>

<div id="fade" class="fade"
     onclick="$('.dialog_reg').css({display:'none'});$('.dialog_auth').css({display:'none'});
              $('.dialog_calendar').css({display:'none'});$('.fade').css({display:'none'});$('body').css({overflow: 'auto', width: '100%'});">
</div>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/block/dialog_auth/dialog_auth.php';
include $_SERVER['DOCUMENT_ROOT'] . '/block/dialog_reg/dialog_reg.php';
include $_SERVER['DOCUMENT_ROOT'] . '/block/top_menu.php'; //подключаем верхнее меню
?>

<table class="body-table" style="height: 100%; width: 100%;" cellpadding="0" cellspacing="0">
    <tbody>
    <tr>
        <td>
            <div id="fullscreen-bg">
                <video loop="" muted="" autoplay="" poster="img/zvezdnoe.jpg" class="fullscreen-bg__video">
                    <source src="https://storage.googleapis.com/ms_storage/starVideo.mp4" type="video/mp4">
                </video>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div></div>
        </td>
        <td class="main_td">
            <table style="height: 100%; width: 100%; box-shadow: 0 0 5px -2px #000;" cellpadding="0" cellspacing="0">
                <tbody>
                <!--                <tr>-->
                <!--                    <td style="    background-color: #5e5e5e;-->
                <!--    vertical-align: top;-->
                <!--    height: 60px;">-->
                <!--                        <div></div>-->
                <!--                    </td>-->
                <!--                </tr>-->
                <tr>
                    <td style="background-color: black;vertical-align: top;
                text-align: -webkit-center;">


                    <?php if ($clNav->flag_auth == 1) { ?>
    <style>

        .bt_gray2 {
            background-color: #474747;
            transition: background-color 0.2s;
            color: white;

            border-radius: 10px;
            text-decoration: none;
            display: block;
            padding: 20px;
        }

        .bt_gray2:hover {
            background-color: #565656;
        }

        .bt_gray2:active {
            background-color: #3a3a3a;
        }

        .btYellow2 {

            transition: background-color 0.2s;
            cursor: pointer;
            background-color: #dccc47;
            border: 1px solid #eeeeee;
            box-shadow: 0 0 7px -3px #000;
        }

        .btYellow2:hover {
            background-color: #ecda4b;

        }

        .btYellow2:active {
            background-color: #dcca48;

        }


        .btRed2 {

            transition: background-color 0.2s;
            cursor: pointer;
            background-color: #c53a3a;
            border: 1px solid #eeeeee;
            box-shadow: 0 0 7px -3px #000;
        }

        .btRed2:hover {
            background-color: #ec4b4b;

        }

        .btRed2:active {
            background-color: #dc4848;

        }
    </style>

    <div class="dialog_calendar modal-form">

        <div style="background: #d3d3d3;text-align: left;color: #000;padding: 10px 10px 10px 30px;font-size: 16px">
            <span onclick="$('.dialog_calendar').css({display:'none'});$('#fade').css({display:'none'});$('body').css({overflow: 'auto', width: '100%'});"
                  style="cursor: pointer; float: right;width: 16px;height: 16px;display: block; background: url('/img/close2.png');"></span>Урок
        </div>

        <div style="           overflow-y: auto; text-align: left;">

            <div style="padding: 10px;text-align: center;"><a href="/lessons" class="bt_gray2" style=" ">Перейти к
                    уроку</a>
            </div>
            <div style="padding: 10px;">
                <?php

                if (intval($clNav->flag_uchitel) == 1)  //это учитель
                {
                    echo '<p style="color: #000;
    text-align: left;
    padding: 0 0 10px 0;
    margin: 0;">Ученик:</p>';
                    ?>
                    <select class="select_uchenik input-field">
                        <?php

                        $r = $clMysql->query("SELECT id, name, email FROM profile 
                                                        WHERE flag_uchitel=0 AND 
                                                              profile_uchitel_id=$clNav->profile_id");

                        while ($row = $r->fetch_row()) {

                            ?>
                            <option value="<?= $row[0] ?>"><?= $row[1] . ' [' . $row[2] . ']' ?></option><?php
                        }

                        ?>
                    </select>

                    <?php
                }


                ?>

                <input type="hidden" value="" class="id_row">
                <input type="hidden" value="" class="data_db">
                <p style="color: #000;text-align: left;padding: 0 0 10px 0; margin: 10px 0 0 0;">Тема</p>
                <label>
                    <input type="text" class="input-field input_tema" value="">
                </label>
                <p style="color: #000;text-align: left;padding: 0 0 10px 0; margin: 10px 0 0 0;">Начало занятия</p>
                <label>
                    <input type="text" value="" disabled="disabled" class="input-field input_date"
                           style="background-color: #f6f6f6">
                </label>
<!--                <p style="color: #000;text-align: left;padding: 0 0 10px 0; margin: 10px 0 0 0;">Длительность</p>-->
<!--                <label>-->
<!--                    <select class="input-field" style="width: 100%">-->
<!--                        <option value="60 минут">60 минут</option>-->
<!--                    </select>-->
<!--                </label>-->
                <div style="padding-top: 20px;">
                    <input type="button" value="Сохранить" onclick="save_calendar()" class="btYellow2 btDialogCalendar">
                    <input type="button" value="Удалить" onclick="remove_calendar();" class="btRed2"
                           style=" float: right;">
                </div>

            </div>
            body

        </div>

    </div>
    <div id='calendar'></div>


    <script type="text/javascript">
        function save_calendar() {

            let uchenic_id = $('.select_uchenik option:selected').val();
            let id_row = $('.id_row').val();
            let tema = $('.input_tema').val();
            let data = $('.input_date').val();


            $.post('/calendar/srSaveCalendar.php', ({
                'uchenic_id': uchenic_id,
                'id': id_row,
                'tema': tema,
                'data': data
            }), function (h) {
                // console.log(h);
            });

            $('.dialog_calendar').css({display:'none'});
            $('.fade').css({display:'none'});
            location.reload();
        }

        function remove_calendar() {

            let id_row = $('.id_row').val();
            $.post('/calendar/srDeleteCalendar.php', ({'id': id_row}), function (h) {
                location.reload();
            });
        }


        function open_dialog() {


        }

        $(document).ready(function () {

            setTimeout(function () {
                $('.fc-timegrid-slots td').click(function () {


                    open_dialog();
                })
            }, 100)

        })

    </script>


<?php } else { ?>

<?php } ?>



<?php include $_SERVER['DOCUMENT_ROOT'] . '/footer.php'; ?>
