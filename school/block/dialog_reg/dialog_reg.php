
<div class="modal-form dialog2 dialog_reg" id="dialog_reg" style="display: none">
    <div style="border-bottom: 1px solid #908bd9;">
        <div style="float: right; margin-top: 15px; margin-right: 15px;cursor: pointer;"
             onclick="document.getElementById('dialog_reg').style.display='none';$('#fade').css({display:'none'});
             $('body').css({overflow: 'auto', width: '100%'})"
        >
            <img src="/img/close.png" alt="x"></div>
        <div class="h1" style="padding-top: 22px;
    padding-left: 21px;
    padding-bottom: 20px;
    font-size: 21px;
    color: white;">Заявка
        </div>
    </div>


    <div class="h1 reg-label" style="padding-top: 22px;">Имя</div>
    <div class="h1 reg-input">
        <label>
            <input type="text" class="input-field input_name" placeholder="Имя" size="38">
        </label>
    </div>

    <div class="h1 reg-label">Телефон</div>
    <div class="h1 reg-input">
        <label>
            <input type="tel" class="input-field input_phone" placeholder="Телефон" size="38">
        </label>
    </div>
    <div class="result_reg_phone" style="display: none;"></div>

    <div class="h1 reg-label">Адрес электронной почты</div>
    <div style="border-bottom: 1px solid #908bd9;padding-bottom: 22px;">
        <div id="stroshka-with-email" class="h1 reg-input" style="padding-bottom: 10px;">
            <label>
                <input type="text" class="input-field input_email" placeholder="Адрес электронной почты" size="38">
            </label>
        </div>
        <div class="result_reg_email" style="display: none;"></div>
    </div>

    <input type="submit" class="btpr submit-btn-reg" value="Присоединиться к нам!" onclick="reg(this)">
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
                $('#stroshka-with-email').css({paddingBottom: '2px'})
                $('.result_reg_phone').css({display: 'block'}).html(
                    '<div class="form-error">Этот номер телефона уже зарегистрирован</div>')
            }
            if (h.includes('error_email')) {
                $('.input_email').animate({backgroundColor: 'red'}, 500, function () {
                    $('.input_email').animate({backgroundColor: 'white'}, 500, function () {
                    });
                });
                $('#stroshka-with-email').css({paddingBottom: '2px'})
                $('.result_reg_email').css({display: 'block'}).html(
                    '<div class="form-error">Неверный формат электронной почты</div>')
            }
            if (h.includes('error_email_registered')) {
                $('.input_email').animate({backgroundColor: 'red'}, 500, function () {
                    $('.input_email').animate({backgroundColor: 'white'}, 500, function () {
                    });
                });
                $('#stroshka-with-email').css({paddingBottom: 0})
                $('.result_reg_email').css({display: 'block'}).html(
                    '<div class="form-error">Этот адрес электронной почты уже зарегистрирован</div>')
            }
            if (h.includes('success')) {
                $('.dialog_reg').css({display: 'none'});
                $('#fade').css({display: 'none'});
                $('body').css({overflow: 'auto', width: '100%'})
                $('#messages').html('Сообщение успешно отправлено').slideDown(600).delay(3000).slideUp(600);
            }
            if (h.includes('email_send_error')) {
                $('.input_email').animate({backgroundColor: 'red'}, 500, function () {
                    $('.input_email').animate({backgroundColor: 'white'}, 500, function () {
                    });
                });
                $('#stroshka-with-email').css({paddingBottom: 0})
                $('.result_reg_email').css({display: 'block'}).html(
                    '<div class="form-error"><h1>Ошибка при отправке письма</h1></div>')
            }

            $(t).removeAttr('disabled');
        });
    }

</script>