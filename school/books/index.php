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
        <title>Учебники - Mercury School</title>
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
                    <source src="/video/starVideo.mp4" type="video/mp4"/>
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
    <style>
        /*.book{*/
        /*text-align: left; color: #ffc880; font-size: 26px;*/
        /*}*/


    </style>

    <!--    <div style="color: #8c00ff; font-size: 36px;">Учебники</div>-->
    <!--    <div class="book">1 класс</div>-->
    <!--    <div class="book">2 класс</div>-->
    <!--    <div class="book">3 класс</div>-->
    <!--    <div class="book">4 класс</div>-->
    <!--    <div class="book">5 класс</div>-->
    <!--    <div class="book">6 класс</div>-->
    <!--    <div class="book">7 класс</div>-->
    <!--    <div class="book">8 класс</div>-->
    <!--    <div class="book">9 класс</div>-->
    <!--    <div class="book">10 класс</div>-->
    <!--    <div class="book">11 класс</div>-->
    <!--    <div class="book">ОГЭ</div>-->
    <!--    <div class="book">ЕГЭ</div>-->
    <!--    <div class="book">Другое</div>-->

    <div class="books-page-table">
        <table class="table">
            <!--            <thead>-->
            <!--            <tr>-->
            <!--                <th style="color: #1a61e8">Категория</th>-->
            <!--            </tr>-->
            <!--            </thead>-->
            <tbody>
            <tr>
                <td>
                    <button class="class-button" onclick="changeBooks('1 klass', this)">1 класс</button>
                </td>
            </tr>
            <tr>
                <td>
                    <button class="class-button" onclick="changeBooks('2 klass', this)">2 класс</button>
                </td>
            </tr>
            <tr>
                <td>
                    <button class="class-button" onclick="changeBooks('3 klass', this)">3 класс</button>
                </td>
            </tr>
            <tr>
                <td>
                    <button class="class-button" onclick="changeBooks('4 klass', this)">4 класс</button>
                </td>
            </tr>
            <tr>
                <td>
                    <button class="class-button" onclick="changeBooks('5 klass', this)">5 класс</button>
                </td>
            </tr>
            <tr>
                <td>
                    <button class="class-button" onclick="changeBooks('6 klass', this)">6 класс</button>
                </td>
            </tr>
            <tr>
                <td>
                    <button class="class-button" onclick="changeBooks('7 klass', this)">7 класс</button>
                </td>
            </tr>
            <tr>
                <td>
                    <button class="class-button" onclick="changeBooks('8 klass', this)">8 класс</button>
                </td>
            </tr>
            <tr>
                <td>
                    <button class="class-button" onclick="changeBooks('9 klass', this)">9 класс</button>
                </td>
            </tr>

            <tr>
                <td>
                    <button class="class-button" onclick="changeBooks('10 klass', this)">10 класс</button>
                </td>
            </tr>
            <tr>
                <td>
                    <button class="class-button" onclick="changeBooks('11 klass', this)">11 класс</button>
                </td>
            </tr>
            <tr>
                <td>
                    <button class="class-button" onclick="changeBooks('VPR', this)">ВПР</button>
                </td>
            </tr>
            <tr>
                <td>
                    <button class="class-button" onclick="changeBooks('OGE', this)">ОГЭ</button>
                </td>
            </tr>
            <tr>
                <td>
                    <button class="class-button" onclick="changeBooks('EGE', this)">ЕГЭ</button>
                </td>
            </tr>
            <tr>
                <td>
                    <button class="class-button" onclick="changeBooks('Other', this)">Другое</button>
                </td>
            </tr>

            </tbody>
        </table>
        <div id="books-list"></div>
    </div>

    <style>
        .table {
            text-align: center;
            color: #ffc880;
            font-size: 26px;
            /*border: 1px solid #dddddd;*/
            border: none;
            /*border-collapse: collapse;*/
            width: 155px;
        }

        .table th {
            padding: 5px;
            background: black;
            /*border: 1px solid #dddddd;*/
            border: none;
        }

        .table td {
            /*border: 1px solid #dddddd;*/
            border: none;
            font-weight: bold;
        }
    </style>
    <script>
        $(document).ready(function () {
            $('#books-list').html('<div id="books-list-placeholder"><img src="/img/rocket.png" style="padding-right: 10px;" alt="<<"> Выберите категорию</div>')
        });

        let max_books_count = 9
        const book_placeholder = '<div class="book-image-ph"></div>'
        let books = {
            "1 klass": [
                {
                    "index": 1,
                    "title": "1. Для тех, кто любит математику - Моро М.И., Волкова С.И.",
                    "path": "/img/book_card/1/1.%20Для%20тех,%20кто%20любит%20математику%20-%20Моро%20М.И.,%20Волкова%20С.И.%20.jpg"
                }, {
                    "index": 2,
                    "title": "1. Александрова 1ч",
                    "path": "/img/book_card/1/1.%20Александрова%201%20ч.jpg"
                }, {
                    "index": 3,
                    "title": "1. Александрова 2ч",
                    "path": "/img/book_card/1/1.%20Александрова%202%20ч.jpg"
                }
            ], "2 klass": [
                {
                    "index": 4,
                    "title": "2. Богданович М.В., Лишенко Г.П.",
                    "path": "/img/book_card/2/2.%20Богданович%20М.В.,%20Лишенко%20Г.П..jpg"
                }, {
                    "index": 5,
                    "title": "2. Чеботаревская Т.М., Николаева В.В. - 1 часть",
                    "path": "/img/book_card/2/2.%20Чеботаревская%20Т.М.,%20Николаева%20В.В.%20-%201%20часть.png"
                }, {
                    "index": 6,
                    "title": "2. Чеботаревская Т.М., Николаева В.В. - 2 часть",
                    "path": "/img/book_card/2/2.%20Чеботаревская%20Т.М.,%20Николаева%20В.В.%20-%202%20часть.png"
                }
            ], "3 klass": [
                {
                    "index": 7,
                    "title": "3. Гахраманова Н. и др.",
                    "path": "/img/book_card/3/3.%20Гахраманова%20Н.%20и%20др..png"
                }, {
                    "index": 8,
                    "title": "3. Богданович М.В., Лишенко Г.П.",
                    "path": "/img/book_card/3/3.%20Богданович%20М.В.,%20Лишенко%20Г.П..jpg"
                }
            ], "4 klass": [
                {
                    "index": 9,
                    "title": "4. Богданович М.В., Лишенко Г.П.",
                    "path": "/img/book_card/4/4.%20Богданович%20М.В.,%20Лишенко%20Г.П..png"
                }, {
                    "index": 10,
                    "title": "4. Гахраманова Н. и др.",
                    "path": "/img/book_card/4/4.%20Гахраманова%20Н.%20и%20др..png"
                }
            ], "5 klass": [
                {
                    "index": 11,
                    "title": "5.Дорофеев",
                    "path": "/img/book_card/5/5.Дорофеев.png"
                }, {
                    "index": 12,
                    "title": "5. Виленкин Н.Я., Жохов В.И. и др.",
                    "path": "/img/book_card/5/5.%20Виленкин%20Н.Я.,%20Жохов%20В.И.%20и%20др..png"
                }, {
                    "index": 13,
                    "title": "5. Мерзляк А.Г., Полонский В.Б., Якир М.С.",
                    "path": "/img/book_card/5/5.%20Мерзляк%20А.Г.,%20Полонский%20В.Б.,%20Якир%20М.С..png"
                }
            ], "6 klass": [
                {
                    "index": 14,
                    "title": "6. Виленкин",
                    "path": "/img/book_card/6/6.%20Виленкин.png"
                }
            ], "7 klass": [
                {
                    "index": 15,
                    "title": "7. Атанасян",
                    "path": "/img/book_card/7/7.%20Атанасян.png"
                }, {
                    "index": 16,
                    "title": "7. Колягин",
                    "path": "/img/book_card/7/7.%20Колягин.png"
                }
            ], "8 klass": [
                {
                    "index": 17,
                    "title": "8. Алгебра, Мерзляк, Полонский, Якир",
                    "path": "/img/book_card/8/8.%20Алгебра,%20Мерзляк,%20Полонский,%20Якир.png"
                }, {
                    "index": 18,
                    "title": "8. Атанасян",
                    "path": "/img/book_card/8/8.%20Атанасян.png"
                }
            ], "9 klass": [
                {
                    "index": 19,
                    "title": "9. Алгебра, Колягин, Ткачева",
                    "path": "/img/book_card/9/9.%20Алгебра,%20Колягин,%20Ткачева.png"
                }, {
                    "index": 20,
                    "title": "9. Макарычев Ю.Н., Миндюк Н.Г. и др.",
                    "path": "/img/book_card/9/9.%20Макарычев%20Ю.Н.,%20Миндюк%20Н.Г.%20и%20др..png"
                }, {
                    "index": 21,
                    "title": "9. Атанасян",
                    "path": "/img/book_card/9/9.%20Атанасян.png"
                }
            ], "10 klass": [
                {
                    "index": 22,
                    "title": "10-11. Алгебра Алимов",
                    "path": "/img/book_card/10/10-11.%20Алгебра%20Алимов.png"
                }, {
                    "index": 23,
                    "title": "10-11. Атанасян",
                    "path": "/img/book_card/10/10-11.%20Атанасян.png"
                }
            ], "11 klass": [
                {
                    "index": 24,
                    "title": "10-11. Алгебра Алимов",
                    "path": "/img/book_card/10/10-11.%20Алгебра%20Алимов.png"
                }, {
                    "index": 25,
                    "title": "10-11. Атанасян",
                    "path": "/img/book_card/10/10-11.%20Атанасян.png"
                }
            ], "VPR": [
            ], "OGE": [
                {
                    "index": 26,
                    "title": "ОГЭ 2019. Математика. Задания с кратким ответом",
                    "path": "/img/book_card/ОГЭ/ОГЭ%202019.%20Математика.%20Задания%20с%20кратким%20ответом.png"
                }, {
                    "index": 27,
                    "title": "ОГЭ 2021 Математика. Сборник заданий.",
                    "path": "/img/book_card/ОГЭ/ОГЭ%202021%20Математика.%20Сборник%20заданий..png"
                }, {
                    "index": 28,
                    "title": "ОГЭ 2021 Математика. 40 тренировочных вариантов",
                    "path": "/img/book_card/ОГЭ/ОГЭ%202021%20Математика.%2040%20тренировочных%20вариантов.png"
                }, {
                    "index": 29,
                    "title": "ОГЭ 2022 Математика. Типовые экзаменационные задания. 36 вариантов - Под. ред. Ященко И.В.",
                    "path": "/img/book_card/ОГЭ/ОГЭ%202022%20Математика.%20Типовые%20экзаменационные%20задания.%2036%20вариантов%20-%20Под.%20ред.%20Ященко%20И.В..png"
                }
            ], "EGE": [
                {
                    "index": 30,
                    "title": "МА-11 ЕГЭ 2022 ДЕМО_базовый",
                    "path": "/img/book_card/ЕГЭ/МА-11%20ЕГЭ%202022%20ДЕМО_базовый.png"
                }, {
                    "index": 31,
                    "title": "МА-11 ЕГЭ 2022 ДЕМО_проф",
                    "path": "/img/book_card/ЕГЭ/МА-11%20ЕГЭ%202022%20ДЕМО_проф.png"
                }
            ], "Other": [
                // {
                //     "index": 32,
                //     "title": "Другое один Аня переименуй",
                //     "path": "/img/book_card/2/2.%20Богданович%20М.В.,%20Лишенко%20Г.П..jpg"
                // }, {
                //     "index": 33,
                //     "title": "Другое два",
                //     "path": "/img/book_card/2/2.%20Чеботаревская%20Т.М.,%20Николаева%20В.В.%20-%201%20часть.png"
                // }, {
                //     "index": 34,
                //     "title": "Другое три",
                //     "path": "/img/book_card/2/2.%20Чеботаревская%20Т.М.,%20Николаева%20В.В.%20-%202%20часть.png"
                // }
            ]
        }

        function changeBooks(klass, obj) {
            $('.class-button').css({color: 'inherit'});
            $(obj).css({color: 'white'});
            // todo сделать красива тайтлы при наведении мыши https://stackoverflow.com/questions/2011142/how-to-change-the-style-of-the-title-attribute-inside-an-anchor-tag

            let html_string = ''
            let counter = 0

            for (const book of books[klass]) {
                html_string += `<div class="book-image">` +
                                `<a href="/lessons?book=${book['index']}">` +
                                `<img title="${book['title']}" class="book-image-preview" src="${book['path']}" alt="" onclick="localStorage.setItem('chosen_book', ${book['index']});">` +
                               `</a></div>`
                counter += 1
            }
            if (counter > max_books_count) {
                max_books_count = counter;
            }
            while (counter !== max_books_count) {
                html_string += book_placeholder
                counter += 1
            }

            $('#books-list').html(html_string);
            console.log(localStorage.getItem('chosen_book'));
        }

    </script>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/footer.php';

?>