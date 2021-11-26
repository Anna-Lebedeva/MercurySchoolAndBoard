<style>

    .btpr {
        padding: 7px;

        border-radius: 20px;
        cursor: pointer;
        font-size: 16px;
        background-color: #FDD591;
        transition: background-color 0.2s;
        width: 280px;
        margin: 0 auto;
        display: block;
    }


    .dialog2 {
        position: absolute;
        left: 50%;

        width: 320px;
        background-color: #635AFA;
        z-index: 1000;
        display: block;
        box-shadow: 0 0 4px -1px #000;
        top: 34px;
        border-radius: 5px;
    }

    .dialog_reg {

        margin-left: -160px;
    }
</style>
<div class="modal-form modal-form-reg dialog2 dialog_reg" id="dialog_reg" style="display: none">
    <div style="border-bottom: 1px solid #908bd9;">
        <div style="float: right; margin-top: 15px; margin-right: 15px;cursor: pointer;"
             onclick="document.getElementById('dialog_reg').style.display='none';document.getElementById('fade').style.display='none';">
            <img src="/img/close.png" alt="x"></div>
        <div class="h1" style="padding-top: 22px;
    padding-left: 21px;
    padding-bottom: 20px;
    font-size: 21px;
    color: white;">Заявка
        </div>
    </div>


    <div class="h1" style="padding-top: 22px;
    padding-left: 21px;
    padding-bottom: 1px;
    font-size: 15px;
    color: #FFF;">Имя
    </div>


    <div class="h1" style="padding-top: 4px;
    padding-left: 21px;
    padding-bottom: 9px;
    font-size: 15px;
    color: #ebf0ff;">

        <input type="text" class="input_name" style="width: 260px" placeholder="Имя" size="38" value="Миша">
    </div>


    <div class="h1" style="padding-top: 1px;
    padding-left: 21px;
    padding-bottom: 1px;
    font-size: 15px;
    color: #FFF;">Телефон
    </div>

    <div class="h1" style="padding-top: 4px;
    padding-left: 21px;
    padding-bottom: 9px;
    font-size: 15px;
    color: #ebf0ff;">
        <input type="text" style="width: 260px" class="input_phone" placeholder="Телефон" size="38" value="9998887766">
    </div>
    <div class="result_reg_phone" style="display: none;">
    </div>

    <div class="h1" style="padding-top: 1px;
    padding-left: 21px;
    padding-bottom: 1px;
    font-size: 15px;
    color: #FFF;">Адрес электронной почты
    </div>
    <div style="border-bottom: 1px solid #908bd9;">
        <div class="h1" style="padding-top: 4px;
    padding-left: 21px;
    padding-bottom: 29px;
    font-size: 15px;
    color: #ebf0ff;">
            <input type="text" style="width: 260px" class="input_email" placeholder="Адрес электронной почты" size="38"
                   value="pyth0n@inbox.ru">
        </div>
        <div class="result_reg_email" style="display: none;">
        </div>
    </div>

    <input type="submit" class="btpr submit-btn-reg" style="margin-bottom: 20px; margin-top: 25px; text-align: center;"
           value="Присоединиться к нам!" onclick="reg(this)">
</div>

<script type="text/javascript">
    function dec2hex(dec) {
        return dec.toString(16).padStart(2, "0")
    }

    function generateId(len) {
        let arr = new Uint8Array((len || 40) / 2)
        window.crypto.getRandomValues(arr)
        return Array.from(arr, dec2hex).join('')
    }

    function reg(t) {
        $(t).attr('disabled', 'disabled');
        let name = $('.input_name').val();
        let phone = $('.input_phone').val();
        let email = $('.input_email').val();

        $.post('/block/dialog_reg/srSaveDB.php', ({
            'name': name,
            'phone': phone,
            'email': email,
            'board_url': generateId(32)
        }), function (h) {
            h = Object.values(JSON.parse(h));
            if (h.includes('error_phone')) {
                $('.input_phone').animate({backgroundColor: 'red'}, 500, function () {
                    $('.input_phone').animate({backgroundColor: 'white'}, 500, function () {
                    });
                });
                $('.result_reg_phone').css({display: 'block'}).html(
                    '<div class="form-error">Этот номер телефона уже зарегистрирован</div>')
            }
            if (h.includes('error_email')) {
                $('.input_email').animate({backgroundColor: 'red'}, 500, function () {
                    $('.input_email').animate({backgroundColor: 'white'}, 500, function () {
                    });
                });
                $('.result_reg_email').css({display: 'block'}).html(
                    '<div class="form-error">Неверный формат электронной почты</div>')
            }
            if (h.includes('error_email_registered')) {
                $('.input_email').animate({backgroundColor: 'red'}, 500, function () {
                    $('.input_email').animate({backgroundColor: 'white'}, 500, function () {
                    });
                });
                $('.result_reg_email').css({display: 'block'}).html(
                    '<div class="form-error">Этот адрес электронной почты уже зарегистрирован</div>')
            }
            if (h.includes('success')) {
                $('.dialog_reg').css({display: 'none'});
                alert('Сообщение успешно отправлено');
            }
            if (h.includes('email_send_error')) {
                $('.input_email').animate({backgroundColor: 'red'}, 500, function () {
                    $('.input_email').animate({backgroundColor: 'white'}, 500, function () {
                    });
                });
                $('.result_reg_email').css({display: 'block'}).html(
                    '<div class="form-error" h1>Ошибка при отправке письма</h1></div>')
            }

            $(t).removeAttr('disabled');
        });
    }

</script>