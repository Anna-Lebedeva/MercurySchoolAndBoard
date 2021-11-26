<div id="shapochka">

    <div class="logo"><a href="/"><img class="img-logo" src="/img/logo_no_bg.png" alt="logo"></a></div>
    <div class="links">
        <?php if ($clNav->flag_auth == 0) { ?>
            <a href="/contact" class="colorLink">Контакты</a>
            <a href="/about" class="colorLink">О нас</a>
            <a href="/price" class="colorLink">Цены</a>
            <button class="mobile_menu">=</button>
        <?php } else { ?>
            <a href="/profile" class="colorLink">Личный кабинет</a>
            <a href="/calendar" class="colorLink">Расписание</a>
            <a href="/lessons" class="colorLink">Урок</a>
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
<script type="text/javascript">
    $('.modal-form-auth').keypress(function (e) {
        // enter отправляет формы
        if (e.key === 'Enter') {
            $('.submit-btn-auth').click()
        }
    });
    $('.modal-form-reg').keypress(function (e) {
        // enter отправляет формы
        if (e.key === 'Enter') {
            $('.submit-btn-reg').click()
        }
    });
    // todo починить
    $('.modal-form').keypress(function (e) {
        console.log(e.key, e.which);
        // esc закрывает modal-окна
        if (e.key === "Escape") {
            console.log('bb');
            $('.modal-form').fadeOut(200);
            $('.fade').fadeOut(200);
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
</script>