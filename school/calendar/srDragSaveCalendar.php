<?
include $_SERVER['DOCUMENT_ROOT'].'/clMysql.php'; //подключаем биб. для работы с БД

include $_SERVER['DOCUMENT_ROOT'].'/clNav.php';
$clMysql = new clMysql();
$clMysql->ConnectedDefaultBase();;


$clNav = new clNav($clMysql);


//'id':id,'tema':tema,'data':data



$id = intval($_POST['id']);


$data = $_POST['data'];

$ar = explode(' ',$data);
$date_no_db = $ar[0];
$time = $ar[1];


$arDate = explode('.',$date_no_db);
$year = $arDate[2];
$month = $arDate[1];
$day = $arDate[0];

$date_db =$year.'-'.$month.'-'.$day.' '.$time.':00';

 $clMysql->query("UPDATE raspisanie SET data_yroka='$date_db' WHERE id=$id");


?>