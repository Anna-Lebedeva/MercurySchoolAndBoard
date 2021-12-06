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
    <title>Главная страница</title>
    <link rel="icon" type="image/png" href="/favicon.png">
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
     onclick="$('.dialog_reg').css({display:'none'});$('.dialog_auth').css({display:'none'});
              $('.dialog_calendar').css({display:'none'});$('.fade').css({display:'none'});">
</div>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/block/dialog_auth/dialog_auth.php';
include $_SERVER['DOCUMENT_ROOT'] . '/block/dialog_reg/dialog_reg.php';
include $_SERVER['DOCUMENT_ROOT'] . '/block/top_menu.php'; //подключаем верхнее меню
?>

<table style="height: 100%; width: 100%;" cellpadding="0" cellspacing="0">
    <tbody>
    <tr>
        <td>
            <div class="fullscreen-bg">
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
