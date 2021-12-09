<div class="header_row">
    <div id="shapochka">

        <div class="logo"><a href="/"><img class="img-logo" src="/img/logo_no_bg.png" alt="logo"></a></div>
        <div class="links">
            <?php if ($clNav->flag_auth == 0) { ?>
                <a href="#contacts" class="colorLink">Контакты</a>
                <a href="#about-school" class="colorLink">О нас</a>
                <a href="#our-prices" class="colorLink">Цены</a>
                <button class="mobile_menu">=</button>
            <?php } else { ?>
                <a href="/profile" class="colorLink">Личный кабинет</a>
                <a href="/calendar" class="colorLink">Расписание</a>
                <a id="lessons-href" href="/lessons" class="colorLink">Урок</a>
                <a href="/finance" class="colorLink">Финансы</a>
                <a href="/books" class="colorLink">Учебники</a>
                <?php if ($clNav->flag_teacher == 1) { ?>
                    <a style="color: red;" href="/admin" class="colorLink">Управление</a>
                <?php } ?>
                <button class="mobile_menu">=</button>
            <?php } ?>
        </div>

        <div class="buttons">
            <?php if ($clNav->flag_auth == 0) { ?>
                <button class="bt bt_yellow" onclick="show_dialog_reg();" style="margin-right: 10px;">
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
        </div>

    </div>

    <div id="messages"></div>
</div>

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

</script>