<?php
require_once 'business.php';
$db=get_db();
get_cart();
if($_SERVER['REQUEST_METHOD']==='POST'){
    if(isset($_POST['koszyk'])){
    $koszyk=$_POST['koszyk'];
    foreach($koszyk as $koszyk=>$value){
        if(!in_array($value,$_SESSION['cart'])) add_to_cart($value);
    }
    header('Location: ulubione2.php');
    exit;
}
}
$db->temporary->drop();
if(isset($_SESSION['user_login'])){
$zdjecia='zdjecia'.$_SESSION['user_login'];
$limit=3;
$ilosc_zdjec=$db->zdjecia->count()+$db->$zdjecia->count();
if($ilosc_zdjec%$limit==0){
    $ilosc_stron=(int)($ilosc_zdjec/$limit);
}
else $ilosc_stron=(int)($ilosc_zdjec/$limit)+1;
$page=1;
$fotkiA=$db->zdjecia->find();
$fotkiB=$db->$zdjecia->find();
foreach($fotkiA as $fotka){
    $db->temporary->insertOne($fotka);
}
foreach($fotkiB as $fotka){
    $db->temporary->insertOne($fotka);
}
}
else{
    $limit=3;
    $ilosc_zdjec=$db->zdjecia->count();
    if($ilosc_zdjec%$limit==0){
        $ilosc_stron=(int)($ilosc_zdjec/$limit);
    }
    else $ilosc_stron=(int)($ilosc_zdjec/$limit)+1;
    $page=1;
    $fotkiA=$db->zdjecia->find();
    foreach($fotkiA as $fotka){
        $db->temporary->insertOne($fotka);
    }
}
include 'galeria_view.php';
?>
