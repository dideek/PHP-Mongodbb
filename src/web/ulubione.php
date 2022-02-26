<?php
require_once 'business.php';
$db=get_db();
get_cart();
$db->tab_images->drop();
if($_SERVER['REQUEST_METHOD']==='POST'){
    if(isset($_POST['koszyk'])){
    $koszyk=$_POST['koszyk'];
    foreach($koszyk as $koszyk=>$value){
        remove_from_cart($value);
    }
    header('Location: ulubione2.php');
    exit;
}
}
    $limit=3;
    $ilosc_zdjec=count($_SESSION['cart']);
    if($ilosc_zdjec%$limit==0){
        $ilosc_stron=(int)($ilosc_zdjec/$limit);
    }
    else $ilosc_stron=(int)($ilosc_zdjec/$limit)+1;
    $page=1;
    if($ilosc_zdjec>0){
    for($i=0;$i<$ilosc_zdjec;$i++){
        $tab_images[$i]=$db->temporary->findOne(['_id'=>new MongoDB\BSON\ObjectID($_SESSION['cart'][$i])]);
    }
    foreach($tab_images as $image){
        $db->tab_images->insertOne($image);
    }
}
include 'ulubione_view.php';
?>
