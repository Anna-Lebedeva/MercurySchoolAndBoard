<?php

//error_reporting(0); //отключаем все ошибки и предупреждения

session_start(); //начинаем работать с сессиями.

include $_SERVER['DOCUMENT_ROOT'] . '/clMysql.php'; //Подключаем класс для работы с БД

$clMysql = new clMysql(); ///Создаём экземпляр класса mysql
$clMysql->ConnectedDefaultBase();

$name = addslashes($_POST['name']); // Экранируем спец. символы (кавычки, ' - /')
$phone = $_POST['phone'];
$email = $_POST['email'];

//if ($_SESSION['flag_teacher'] = 1) {
//    $board_url = addslashes($_POST['board_url']);
//} else {
//    $board_url = '';
//}
$board_url = addslashes($_POST['board_url']);

if (strpos($email, '@') === false) {
    echo json_encode(array('error_email'));
    exit();
}

if (strpos($email, '@') === false) {
    echo json_encode(array('error_email'));
    exit();
}

$errors = [];

// todo убрать в один запрос
$r_1 = $clMysql->query("SELECT * FROM profile WHERE phone='$phone'");
if ($r_1->num_rows > 0)  // телефон уже зареган
{
    array_push($errors, 'error_phone');
}

$r_2 = $clMysql->query("SELECT * FROM profile WHERE email='$email'");
if ($r_2->num_rows > 0)  // email уже зареган
{
    array_push($errors, 'error_email_registered');
}

if (count($errors) > 0) {
    echo json_encode($errors);
    exit();
}

include $_SERVER['DOCUMENT_ROOT'] . '/block/srSendPassMail.php'; // Отправляем письмо с паролем

//Добавляем нового пользователя
$DT = date('Y-m-d H:i:s'); //Получаем дату и время в формате 2021-08-25 23:11:11
//Вставляем данные в таблицу profile
$clMysql->query("INSERT profile SET code='$code', pass=null, name='$name', phone='$phone', email='$email', 
                                              create_datetime='$DT', board_url='$board_url'");

$_SESSION['auth_user'] = 1;

//$clMysql->query("UPDATE profile SET name='$name', phone='$phone', email='$email' WHERE id=1"); //Обновляет первую запись
//$clMysql->query("DELETE FROM  profile   WHERE id=1"); //Удаляем первую запись
//$r = $clMysql->query("SELECT * FROM profile  WHERE id=1 "); //Получаем первую запись
//while ($row = $r->getRow())
//{
//
//    echo $row->name;
//}
