<div class="modal-form dialog2 dialog_auth" id="dialog_auth" style="display: none;height: auto;">
    <div style="border-bottom: 1px solid #908bd9;">

        <div style="float: right; margin-top: 15px; margin-right: 15px;cursor: pointer;"
             onclick="document.getElementById('dialog_auth').style.display='none';$('#fade').css({display:'none'});
             $('body').css({overflow: 'auto', width: '100%'})"
        >
            <img src="/img/close.png" alt="x"></div>

        <div class="h1" style="
        padding-top: 22px;
    padding-left: 21px;
    padding-bottom: 20px;
    font-size: 21px;
    color: white;">Вход
        </div>

    </div>

    <div class="h1 reg-label" style="padding-top: 22px;">Ваш email
    </div>

    <div class="h1 reg-input">
        <label>
            <input type="text" class="input-field auth_email" placeholder="Ваш email" size="38" autofocus >
        </label>
    </div>

    <div class="h1 reg-label">Пароль
    </div>

    <div style="border-bottom: 1px solid #908bd9;padding-bottom: 22px;">

        <div class="h1 reg-input">
            <label>
                <input id="auth_pass" type="password" class="input-field auth_pass"
                       onkeydown="key_pass(this)" placeholder="Пароль" size="38">
            </label>
        </div>
    </div>

    <div class="auth-buttons">
        <p class="button-reg-form auth-but" onclick="show_form_reg()" style="
        margin: 0;padding-top: 7px;    position: absolute;
    left: 25px;">
            Ещё не с нами?
        </p>

        <button type="submit" class="button-auth auth-but submit-btn-auth bt_yellow"  style="
            position: absolute;
    right: 20px;
    padding: 7px;" onclick="auth();">
            Войти
        </button>

    </div>

</div>

<script type="text/javascript">
    function key_pass(t) {
        // let real_value = t.value
        // let auth_pass = $('#auth_pass');
        // auth_pass.val('*'.repeat(t.value.length));
        // setTimeout(() => { auth_pass.val('*'.repeat(t.value.length)) }, 500);
        // console.log(real_value);
    }

    function show_form_reg() {
        $('.dialog_auth').css({display: 'none'});
        $('.dialog_reg').css({display: 'block'});
        const body = $('body');
        body.css({overflow: 'hidden', width: body.outerWidth()});
    }

    function auth() {
        $('.submit-btn-auth').trigger('focus');

        let auth_email = $('.auth_email').val();
        let auth_pass = $('.auth_pass').val();

        $.post('/block/dialog_auth/srAuth.php', ({'email': auth_email, 'pass': auth_pass}), function (h) {
            if (h === 'ok') {
                $('body').css({overflow: 'auto', width: '100%'});
                location.href = '/';
            } else {
                $('.auth_email').animate({backgroundColor: 'red'}, 500, function () {

                    $('.auth_email').animate({backgroundColor: 'white'}, 500, function () {

                    });
                });
                $('.auth_pass').animate({backgroundColor: 'red'}, 500, function () {

                    $('.auth_pass').animate({backgroundColor: 'white'}, 500, function () {

                    });
                });
            }


        });
    }
</script>