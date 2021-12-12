<?php
include $_SERVER['DOCUMENT_ROOT'] . '/header.php'; //Подключаем шапку
?>

<h1>Mercury School - инновационная школа математики
    <br><span>Уроки с преподавателем в онлайн-школе Mercury School</span>
</h1>
<p style="color: #0ea0ff; font-size: 38px;">Для школьников любого возраста</p>

<div class="video_block">
    <video id="vid" width="100%" height="100%" autoplay muted loop>
        <source src="/video/demo.mp4" type="video/mp4"/>
    </video>
    <!-- отключает нажатия правой кнопки мыши на видео-->
    <script>
        $(document).ready(function () {
            $('#vid').mousedown(function (event) {
                if (event.which === 3) {
                    $('#vid').bind('contextmenu', function () {
                        return false;
                    });
                } else {
                    $('#vid').unbind('contextmenu');
                }
            });
        });
    </script>
</div>
<div id="about-school">
<div class="info-card-block-left">
    <span class="info-card-title-left">Удобная платформа</span>
    <div class="info-card">Занятия проходят на интерактивной платформе "PlanetBoard"</div>
</div>

<div class="info-card-block-right">
    <span class="info-card-title-right">Персональная программа</span>
    <div class="info-card">Подготавливается на основе потребностей для каждого ученика</div>
</div>

<div class="info-card-block-left">
    <span class="info-card-title-left">Гибкое расписание</span>
    <div class="info-card">Ученику доступен любой временной промежуток рабочего времени учителя.
        Занятия можно легко и удобно переносить</div>
</div>

<div class="info-card-block-right">
    <span class="info-card-title-right">Квалифицированные педагоги</span>
    <div class="info-card">Отбор кандидатов проходит в несколько этапов:
        устное собеседование, тестирование, проведение пробных занятий.
        Учителя имеют соответствующий опыт, регулярно проходят повышение квалификации</div>
</div>

</div>


<div id="our-prices" style="margin-top: 110px;">
    <h2 style="text-align:  center; font-weight: 700; font-size: 32px; text-transform: uppercase; -webkit-text-stroke: 1px #004fff;">
        Сколько стоит?</h2>
</div>

<table class="prices">
    <tr>
    <td id="first-card" class="price-card">
        <img src="/img/price/big%20love.png" class="price-card-img" alt="">
        <h3 class="card-title" style="color: rgb(248,0,0);">8 уроков</h3>
        <p class="card-text">Протестировать занятия на платформе PlanetBoard, понять насколько подходит формат</p>
        <p class="card-text price">750 р. за урок</p>
    </td>
    <td id="second-card" class="price-card">
        <img src="/img/price/big%20cap.png" class="price-card-img" alt="">
        <h3 class="card-title" style="color: rgb(64,0,248);">16 уроков</h3>
        <p class="card-text">Подтянуться по школьной программе</p>
        <p class="card-text price">700 р. за урок</p>
    </td>
    <td id="third-card" class="price-card">
        <img src="/img/price/brain64.png" class="price-card-img" alt="">
        <h3 class="card-title" style="color: rgb(255,37,155);">64 урока</h3>
        <p class="card-text">Стать гуру математики, удивить родителей и учителей</p>
        <p class="card-text price">600 р. за урок</p>
    </td>
    </tr>

</table>


<div style="max-width: 900px;margin-top: 50px;" class="banner_mobile">
    <div class="slider1">
        <div class="banner_pic1 table_banner">
            <div class="price-card">
                <img src="/img/price/big%20love.png" class="price-card-img" alt="">
                <p class="card-title" style="color: rgb(248,0,0);">8 уроков</p>
                <p class="card-text">Протестировать занятия на платформе PlanetBoard, понять насколько
                    подходит формат</p>
                <p class="card-text price">750 р. за урок</p>
            </div>
        </div>

        <div class="banner_pic2 table_banner">
            <div class="price-card">
                <img src="/img/price/big%20cap.png" class="price-card-img" alt="">
                <p class="card-title" style="color: rgb(64,0,248);">16 уроков</p>
                <p class="card-text">Подтянуться по школьной программе</p>
                <p class="card-text price">700 р. за урок</p>
            </div>
        </div>
        <div class="banner_pic3 table_banner">
            <div class="price-card">
                <img src="/img/price/brain64.png" class="price-card-img" alt="">
                <p class="card-title" style="color: rgb(255,37,155);">64 урока</p>
                <p class="card-text">Стать гуру математики, удивить родителей и учителей</p>
                <p class="card-text price">600 р. за урок</p>
            </div>
        </div>

    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('.slider1').bxSlider();
    });
</script>
<style>
    .card-title {
        font-size: 17px;
        font-weight: bold;
    }
</style>


<script type="text/javascript">
    let bannerPic = 1;

    //Право
    function banner_next() {
        bannerPic++;
        if (bannerPic >= 3) {
            bannerPic = 3;
        }
        console.log(bannerPic);
        hideDiv(bannerPic);
    }

    //Лево
    function banner_first() {
        bannerPic--;
        if (bannerPic <= 1) {
            bannerPic = 1;
        }
        console.log(bannerPic);
        hideDiv(bannerPic);
    }


    function hideDiv(bannerPic) {
        let animation_length = 400;
        if (bannerPic === 1) {
            $('.banner_pic3').hide(400)
            $('.banner_pic2').hide(400);
            $('.banner_pic1').show(400);
        }

        if (bannerPic === 2) {
            $('.banner_pic1').hide(400)
            $('.banner_pic3').hide(400)
            $('.banner_pic2').show(400);

        }

        if (bannerPic === 3) {
            $('.banner_pic1').hide(400)
            $('.banner_pic2').hide(400)
            $('.banner_pic3').show(400);
        }
    }
</script>

<?php
//
//
//if ($clNav->flag_auth == 1) {
//    echo 'Авторизован';
//
//} else {
//    echo 'Не авторизован';
//}
//
//
//?>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/footer.php'; //Подключаем подвал
?>
