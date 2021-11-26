<?
session_start();


include $_SERVER['DOCUMENT_ROOT'].'/clMysql.php'; //подключаем биб. для работы с БД

include $_SERVER['DOCUMENT_ROOT'].'/clNav.php';
$clMysql = new clMysql();
$clMysql->ConnectedDefaultBase();;


$clNav = new clNav($clMysql);


//'id_row':id_row,'tema':tema,'data':data



$id = intval($_POST['id']);

$tema = $_POST['tema'];
$data = $_POST['data'];

$ar = explode(' ',$data);
$date_no_db = $ar[0];
$time = $ar[1];


$arDate = explode('.',$date_no_db);
$year = $arDate[2];
$month = $arDate[1];
$day = $arDate[0];

$date_db =$year.'-'.$month.'-'.$day.' '.$time.':00';


if ($id <> 0) {
    $clMysql->query("UPDATE raspisanie SET data_yroka='$date_db', title='$tema' WHERE id=$id");
}
else
{
    $clMysql->query("INSERT raspisanie SET data_yroka='$date_db', profile_id='$clNav->profile_id', title='$tema'");

}



?>