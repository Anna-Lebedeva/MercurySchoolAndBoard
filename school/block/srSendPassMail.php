<?php

include  $_SERVER["DOCUMENT_ROOT"].'/block/libmail.php';

$Subj = 'Регистрация на сайте MercurySchool';
$From = "Mercuryschool;info@mercuryschool.ru";
$Bcc = "info@mercuryschool.ru";
$smtp_login = "info@mercuryschool.ru";
$smtp_pass = "jzyycdbzttbrfyka";

$DT = date('d.m.Y в H:i:s');

$email = trim($email);
$code = rand(100000,999999);

ob_start();
?>
    Для активации аккаунта перейдите по ссылке: <a href="http://mercuryschool.ru/block/activation.php?code=<?=$code?>">http://mercuryschool.ru/block/activation.php?code=<?=$code?></a>
<?php
$html = ob_get_contents();
ob_end_clean();

//$html = 'test';



//if ($mail_or_phone != '')
{
$m = new Mail('UTF-8'); // можно сразу указать кодировку, можно ничего не указывать ($m= new Mail;)
$m->From($From); // от кого Можно использовать имя, отделяется точкой с запятой
//$m->ReplyTo( 'info@torgovii-dom24.ru' ); // куда ответить, тоже можно указать имя
$m->To($email); //'info@is78.ru'// кому, в этом поле так же разрешено указывать имя
$m->Subject($Subj);
$m->Body($html, 'html');
//$m->Cc( "info@atlas-trav.ru");  // кому отправить копию письма
 //$m->Bcc($Bcc); // кому отправить скрытую копию
$m->Priority(3); // установка приоритета

//        $arAttach = explode(';',$attach);
//        foreach ($arAttach as $k=>$v)
//        {
//            if ($v <> '')
//            {
//                //   $v =iconv ('utf-8', 'windows-1251', $v);
//                $m->Attach($v, "", "" ) ;	// прикрепленный файл типа image/gif. типа файла указывать не обязательно
//                echo 'file_attach: '.$v.'<br>';
//            }
//        }
//$m->Attach( "/toto.gif", "", "image/gif" ) ;	// прикрепленный файл типа image/gif. типа файла указывать не обязательно
$m->smtp_on("ssl://smtp.yandex.ru", $smtp_login, $smtp_pass, 465, 10); // используя эу команду отправка пойдет через smtp
$m->log_on(true); // включаем лог, чтобы посмотреть служебную информацию//
//$clNav->save_recall_and_message($clMysql,0,$mail_or_phone,$table,$IP,$gorod, $Browser. ' '.$Browser_v,$OS, 'remont.is78.ru');

    if ($m->Send()) // отправка
 {
     echo json_encode(array('success'));
 }
    else
    {
        echo json_encode(array('email_send_error'));
    }
}
?>