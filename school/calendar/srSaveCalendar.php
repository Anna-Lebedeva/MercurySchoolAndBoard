<?
session_start();


include $_SERVER['DOCUMENT_ROOT'].'/clMysql.php'; //подключаем биб. для работы с БД

include $_SERVER['DOCUMENT_ROOT'].'/clNav.php';
$clMysql = new clMysql();
$clMysql->ConnectedDefaultBase();;


$clNav = new clNav($clMysql);


//'id_row':id_row,'tema':tema,'data':data



$id = intval($_POST['id']);
$uchenic_id = $_POST['uchenic_id'];
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

$flag_uchitel = $clNav->flag_uchitel;
$profile_uchitel_id = $clNav->profile_uchitel_id;





if (intval($clNav->flag_uchitel) == 1)  //это учитель
{

    $profile_uchitel_id =9;
    if ($id <> 0) {
        $clMysql->query("UPDATE raspisanie SET profile_id='$uchenic_id', profile_uchitel_id='$clNav->profile_id',  data_yroka='$date_db', title='$tema' WHERE id=$id");
    }
    else
    {
        $clMysql->query("INSERT raspisanie SET profile_id='$uchenic_id',  profile_uchitel_id='$clNav->profile_id', data_yroka='$date_db'  , title='$tema'");
 echo "INSERT raspisanie SET profile_id='$uchenic_id',  profile_uchitel_id='$clNav->profile_id', data_yroka='$date_db' , title='$tema'";

    }



}
else //ученик
{
    if ($id <> 0) {
        $clMysql->query("UPDATE raspisanie SET  profile_uchitel_id='$clNav->profile_uchitel_id', data_yroka='$date_db', title='$tema'   WHERE id=$id");
    }
    else
    {
        $clMysql->query("INSERT raspisanie SET  profile_uchitel_id='$clNav->profile_uchitel_id', data_yroka='$date_db', profile_id='$clNav->profile_id', title='$tema'");
        echo $id;

    }
}




?>