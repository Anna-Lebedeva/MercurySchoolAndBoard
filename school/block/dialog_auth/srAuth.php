<?php

session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/clMysql.php'; //Подключаем класс для работы с БД

//ChromePhp::log('test');

$clMysql = new clMysql(); ///Создаём экземпляр класса mysql
$clMysql->ConnectedDefaultBase();

$email = $_POST['email'];
$pass = $_POST['pass'];
$flag_teacher = 0;
if ($email == 'annalebedeva98@mail.ru') {
    $flag_teacher = 1;

}

$r = $clMysql->query("SELECT * FROM profile where email='$email' and pass='$pass'"); //Получаем первую запись
$count = $r->num_rows;



if ($count > 0) {
    $_SESSION['flag_teacher'] = $flag_teacher;
    $_SESSION['auth_user'] = 1;

    $row = $r->fetch_array();

   $arInfo['id'] =  $row['id'];;
    $arInfo['name'] =  $row['name'];
    $arInfo['board_url'] =  $row['board_url'];
    $arInfo['flag_teacher'] = $flag_teacher;
    $_SESSION['profile'] = $arInfo;
    echo 'ok';
}
