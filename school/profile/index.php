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
    <title>Профиль - Mercury School</title>
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


                    <?php
//include $_SERVER['DOCUMENT_ROOT'] . '/header.php';
?>

<div style="text-align: left;">
    <div class="greetings">Здравствуйте, <?= $clNav->name ?></div>
    <?php

//    echo '<pre style="color: #FFF">';
//    print_r($clNav);
//    echo '</pre>';
    ?>
    <?php if ($clNav->flag_uchitel == 1) { ?>
        <div style="text-align: left; color: #ffd580; font-size: 26px">В этом месяце Вы провели 0 занятий. Ваша зарплата составляет 0 рублей.</div>
        <?php


        ?><?php

    }
    else
    {
     ?>   <div style="text-align: left; color: #d4c5ff; font-size: 26px">Вам еще подбирается учитель</div>
        <br>

        <div style="text-align: left; color: #ffd580; font-size: 26px">Для лучшего подбора заполни анкету "Мой идеальный учитель":</div>

        <br>
        <div class="teacher-param-label">Строгость</div>


    <style>
        /*the container must be positioned relative:*/
        .custom-select {
            position: relative;
            font-family: Arial;
        }
        .custom-select select {
            display: none; /*hide original SELECT element:*/
        }
        .select-selected {
            background-color: DodgerBlue;
        }
        /*style the arrow inside the select element:*/
        .select-selected:after {
            position: absolute;
            content: "";
            top: 14px;
            right: 10px;
            width: 0;
            height: 0;
            border: 6px solid transparent;
            border-color: #fff transparent transparent transparent;
        }
        /*point the arrow upwards when the select box is open (active):*/
        .select-selected.select-arrow-active:after {
            border-color: transparent transparent #fff transparent;
            top: 7px;
        }
        /*style the items (options), including the selected item:*/
        .select-items div,.select-selected {
            color: #ffffff;
            padding: 8px 16px;
            border: 1px solid transparent;
            border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
            cursor: pointer;
            user-select: none;
        }
        /*style items (options):*/
        .select-items {
            position: absolute;
            background-color: DodgerBlue;
            top: 100%;
            left: 0;
            right: 0;
            z-index: 99;
        }
        /*hide the items when the select box is closed:*/
        .select-hide {
            display: none;
        }
        .select-items div:hover, .same-as-selected {
            background-color: rgba(0, 0, 0, 0.1);
        }
        #contacts {
            margin-top: 20px;
        }

    </style>


    <!--<h2>Custom Select</h2>-->

    <!--surround the select box with a "custom-select" DIV element. Remember to set the width:-->
    <div class="custom-select teacher-params">
        <select>
            <option value="0">Выбери строгость</option>
            <option value="1">Добрый:)</option>
            <option value="2">Средний</option>
            <option value="3">Строгий</option>
        </select>
    </div>

    <div class="teacher-param-label">Задает домашнее задание</div>

    <div class="custom-select">
        <select>
            <option value="0">Задает д/з</option>
            <option value="1">Не задаёт</option>
            <option value="2">Задаёт немного</option>
            <option value="3">Задаёт</option>
        </select>
    </div>

    <div class="teacher-param-label">Возраст</div>
    <div class="custom-select teacher-params">
        <select>
            <option value="0">Возраст</option>
            <option value="1">Молодой</option>
            <option value="2">Средних лет</option>
            <option value="3">Солидный</option>
        </select>
    </div>

    <script>
        var x, i, j, selElmnt, a, b, c;
        /*look for any elements with the class "custom-select":*/
        x = document.getElementsByClassName("custom-select");
        for (i = 0; i < x.length; i++) {
            selElmnt = x[i].getElementsByTagName("select")[0];
            /*for each element, create a new DIV that will act as the selected item:*/
            a = document.createElement("DIV");
            a.setAttribute("class", "select-selected");
            a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
            x[i].appendChild(a);
            /*for each element, create a new DIV that will contain the option list:*/
            b = document.createElement("DIV");
            b.setAttribute("class", "select-items select-hide");
            for (j = 0; j < selElmnt.length; j++) {
                /*for each option in the original select element,
                create a new DIV that will act as an option item:*/
                c = document.createElement("DIV");
                c.innerHTML = selElmnt.options[j].innerHTML;
                c.addEventListener("click", function(e) {
                    /*when an item is clicked, update the original select box,
                    and the selected item:*/
                    var y, i, k, s, h;
                    s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                    h = this.parentNode.previousSibling;
                    for (i = 0; i < s.length; i++) {
                        if (s.options[i].innerHTML == this.innerHTML) {
                            s.selectedIndex = i;
                            h.innerHTML = this.innerHTML;
                            y = this.parentNode.getElementsByClassName("same-as-selected");
                            for (k = 0; k < y.length; k++) {
                                y[k].removeAttribute("class");
                            }
                            this.setAttribute("class", "same-as-selected");
                            break;
                        }
                    }
                    h.click();
                });
                b.appendChild(c);
            }
            x[i].appendChild(b);
            a.addEventListener("click", function(e) {
                /*when the select box is clicked, close any other select boxes,
                and open/close the current select box:*/
                e.stopPropagation();
                closeAllSelect(this);
                this.nextSibling.classList.toggle("select-hide");
                this.classList.toggle("select-arrow-active");
            });
        }
        function closeAllSelect(elmnt) {
            /*a function that will close all select boxes in the document,
            except the current select box:*/
            var x, y, i, arrNo = [];
            x = document.getElementsByClassName("select-items");
            y = document.getElementsByClassName("select-selected");
            for (i = 0; i < y.length; i++) {
                if (elmnt == y[i]) {
                    arrNo.push(i)
                } else {
                    y[i].classList.remove("select-arrow-active");
                }
            }
            for (i = 0; i < x.length; i++) {
                if (arrNo.indexOf(i)) {
                    x[i].classList.add("select-hide");
                }
            }
        }
        /*if the user clicks anywhere outside the select box,
        then close all select boxes:*/
        document.addEventListener("click", closeAllSelect);


    </script>

</div>

<?php
    }
    ?>





<?php
include $_SERVER['DOCUMENT_ROOT']. '/footer.php';

?>


