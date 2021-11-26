<?php

include $_SERVER['DOCUMENT_ROOT'].'/header.php'; //Подключаем шапку


$code =  $_GET['code'];

$r = $clMysql->query("SELECT * FROM profile WHERE code='$code'");
if ($r->num_rows == 0)
{
?><h1>Пользователь не найден или уже активирован</h1><?php
}
else
{
    ?><h1>Придумайте пароль для входа</h1>
    <div>
        <label>
            <input type="password" class="pass1"  placeholder="Придумайте новый пароль">
        </label>
    </div>
    <div>
        <label>
            <input type="password" class="pass2" placeholder="Повторите пароль">
        </label>
    </div>
    <div>
        <button onclick="save_pass()">Сохранить</button>
    </div>
    <script type="text/javascript">
        function save_pass() {
            let pass1 = $('.pass1').val();
            let pass2 = $('.pass2').val();

            $.post('/block/srSavePass.php',({'pass1':pass1,'pass2':pass2,'code':'<?=$_GET['code']?>'}), function (h) {
            if (h === 'error len')
            {
               // alert('aa');
                $('.pass1').animate({backgroundColor:'red'},500,function () {

                    $('.pass1').animate({backgroundColor:'white'},500,function () {

                    });
                });

                $('.pass2').animate({backgroundColor:'red'},500,function () {

                    $('.pass2').animate({backgroundColor:'white'},500,function () {

                    });
                });
            }

            if (h === 'ok')
            {
                location.href = '/';
            }
            })

        }
    </script>
    <?php
}
?>

<?php
include $_SERVER['DOCUMENT_ROOT'].'/footer.php'; //Подключаем подвал
?>
