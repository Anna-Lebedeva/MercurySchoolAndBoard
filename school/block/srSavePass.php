<?php
//error_reporting(0);
include $_SERVER['DOCUMENT_ROOT'].'/clMysql.php'; //Подключаем класс для работы с БД

$clMysql = new clMysql(); ///Создаём экземляер класса mysql
$clMysql->ConnectedDefaultBase();

$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];
$code = $_POST['code'];

if (trim($pass1) == '')
{
    echo 'error len';
    exit;
}

if (strlen($pass1) <= 3)
{
    echo 'error len';
    exit;

}
if ($pass1 <> $pass2)
{
    echo 'error len';
    exit;
}

$clMysql->query("UPDATE profile SET pass='$pass1', code=null WHERE code='$code'");

echo 'ok';
