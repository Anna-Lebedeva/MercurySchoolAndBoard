<?

include $_SERVER['DOCUMENT_ROOT'].'/clMysql.php'; //Подключаем класс для работы с БД


$clMysql = new clMysql(); ///Создаём экземляер класса mysql
$clMysql->ConnectedDefaultBase();



$r = $clMysql->query("SELECT * FROM profile  WHERE id=58");

print_r($clMysql->getRow()->test);


?>