
<?php if ($clNav->flag_auth == 0) { ?>
<table class="header_row signed-out">
<?php } else { ?>
<table class="header_row signed-in">
<?php } ?>

    <tbody id="shapochka">
    <tr>
        <?php if ($clNav->flag_auth == 1) { ?>
        <td id="burger" onclick="show_mobile_menu()">
            <div class="bar topBar"></div>
            <div class="bar btmBar"></div>
        </td>
        <td class="td-menu">
            <ul class="menu">
                    <li class="menu-item"><a href="/profile">Личный кабинет</a></li>
                    <li class="menu-item"><a href="/calendar">Расписание</a></li>
                    <li class="menu-item"><a href="/lessons">Урок</a></li>
                    <li class="menu-item"><a href="/finance">Финансы</a></li>
                    <li class="menu-item books-item"><a href="/books">Учебники</a></li>
                <?php if ($clNav->flag_teacher == 1) { ?>
                    <li class="menu-item"><a href="/admin">Управление</a></li>
                <?php } ?>
            </ul>
        </td>
        <?php } ?>

        <td class="logo"><a href="/"><img class="img-logo" src="/img/logo_no_bg.png" alt="logo"></a></td>

            <?php if ($clNav->flag_auth == 0) { ?>
        <td class="links links-glavnaya">
                <a href="#contacts" class="colorLink">Контакты</a>
                <a href="#about-school" class="colorLink">О нас</a>
                <a href="#our-prices" class="colorLink">Цены</a>
            <?php } else { ?>
        <td class="links links-profile">
                <a href="/profile" class="colorLink">Личный кабинет</a>
                <a href="/calendar" class="colorLink">Расписание</a>
                <a href="/lessons" id="lessons-href" class="colorLink">Урок</a>
                <a href="/finance" class="colorLink">Финансы</a>
                <a href="/books" class="colorLink">Учебники</a>
            <?php } ?>
            <?php if ($clNav->flag_teacher == 1) { ?>
                <a style="color: red;" href="/admin" class="colorLink">Управление</a>
            <?php } ?>
        </td>

        <td class="buttons">
            <?php if ($clNav->flag_auth == 0) { ?>
                <button class="bt bt_yellow" onclick="show_dialog_reg();">
                    Начать бесплатно
                </button>
                <button class="bt bt_gray" onclick="show_dialog_auth();">
                    Войти
                </button>
            <?php } else { ?>
                <button class="bt bt_gray" onclick="exit_auth();">
                    Выйти
                </button>
            <?php } ?>
        </td>
    </tr>
    <tr>
        <td id="messages"></td>
    </tr>
    </tbody>

</table>

<script type="text/javascript">
    $('.modal-form').keypress(function (e) {
        // enter отправляет формы
        if (e.key === 'Enter') {
            $('.submit-btn-auth').click()
        }
    });

    function exit_auth() {

        $.post('/block/srExit.php', function () {
            location.href = '/';
        })
    }

    function show_dialog_auth() {

        // document.getElementById('dialog_auth').style.display='block';document.getElementById('fade').style.display='block';

        $('.dialog_auth').fadeIn(200);
        $('.fade').fadeIn(200);
        //    $('.dialog_auth').animate({top:'50px',height:'200px'},1000)
    }

    function show_dialog_reg() {

        $('.dialog_reg').fadeIn(200);
        $('.fade').fadeIn(200);
    }

    const chosen_book = localStorage.getItem('chosen_book')
    if (chosen_book) {
        $('#lessons-href').attr('href', `/lessons?book=${chosen_book}`);
    }

    function show_mobile_menu() {
        // const header = document.querySelector('.header_row');
        // header.classList.toggle('menu-opened');
        $('.header_row').toggleClass('menu-opened').slideDown(300);  // Не работает
        $('.body-table').toggle(0);
        $('.lesson-body').toggle(0);
    }

</script>