<?
include $_SERVER['DOCUMENT_ROOT'].'/clMysql.php'; //Подключаем класс для работы с БД


$clMysql = new clMysql(); ///Создаём экземляер класса mysql
$clMysql->ConnectedDefaultBase();


//'id_row':id_row,'tema':tema,'data':data



$id = $_POST['id'];


$clMysql->query("DELETE FROM  raspisanie   WHERE id=$id");



?>