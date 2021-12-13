<?php
session_start();

include $_SERVER['DOCUMENT_ROOT'] . '/clMysql.php'; //подключаем биб. для работы с БД
include $_SERVER['DOCUMENT_ROOT'] . '/clNav.php';
$clMysql = new clMysql();
$clMysql->ConnectedDefaultBase();;
$clNav = new clNav($clMysql);

//ChromePhp::log('ididididid', $_POST['uchenic_id']);

$flag_uchitel = $clNav->flag_uchitel;
$id = intval($_POST['id']);
$uchitel_id = $flag_uchitel == 0 ? $clNav->profile_uchitel_id  : $_SESSION['profile']['id'];
$uchenic_id = $flag_uchitel == 1 ? $_POST['uchenic_id'] : $_SESSION['profile']['id'];
$tema = $_POST['tema'];
$data = $_POST['data'];

$ar = explode(' ', $data);
$date_no_db = $ar[0];
$time = $ar[1];

$arDate = explode('.', $date_no_db);
$year = $arDate[2];
$month = $arDate[1];
$day = $arDate[0];

$date_db = $year . '-' . $month . '-' . $day . ' ' . $time . ':00';

if ($id <> 0) {
    $clMysql->query("UPDATE raspisanie 
                               SET data_yroka='$date_db', 
                                   title='$tema' 
                               WHERE id=$id");
    echo "UPDATE raspisanie 
                               SET data_yroka='$date_db', 
                                   title='$tema' 
                               WHERE id=$id";
} else {
    $clMysql->query("INSERT INTO raspisanie (
                            profile_id, 
                            profile_uchitel_id, 
                            data_yroka, 
                            title
                            ) VALUES (
                            $uchenic_id, 
                            $uchitel_id, 
                            '$date_db', 
                            '$tema'
                            )");
    echo "INSERT INTO raspisanie (
                            profile_id, 
                            profile_uchitel_id, 
                            data_yroka, 
                            title
                            ) VALUES (
                            $uchenic_id, 
                            $uchitel_id, 
                            '$date_db', 
                            '$tema'
                            )";

}
