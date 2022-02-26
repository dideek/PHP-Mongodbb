<?php
use MongoDB\BSON\ObjectID;
require '../vendor/autoload.php';
session_start();
function get_dB(){
    $mongo = new MongoDB\Client(
        "mongodb://localhost:27017/wai",
        [
            'username' => 'wai_web',
            'password' => 'w@i_w3b',
        ]);
    $db = $mongo->wai;
    return $db;
}
function create2_png(){
    $upload_dir = '/var/www/prod/src/web/images/';
    $file = $_FILES['image'];
    $wodny=$_POST['wodny'];
    $file_name = $file['name'];
    $author=$_POST['autor'];
    $tytul=$_POST['title'];
    $target = $upload_dir.$author.$tytul.$file_name;
    $zdjecie=imagecreatefrompng($target);
    $kolor=imagecolorallocate($zdjecie,255,0,0);
    imagestring($zdjecie,5,0,0,$wodny,$kolor);
    $target=$upload_dir.'wodny'.$author.$tytul.$file_name;
    imagepng($zdjecie,$target,0);
    $zdjecie=imagescale($zdjecie,200,125);
    $target=$upload_dir.'mini'.$author.$tytul.$file_name;
    imagepng($zdjecie,$target,0);
}
function create2_jpg(){
    $author=$_POST['autor'];
    $tytul=$_POST['title'];
    $upload_dir = '/var/www/prod/src/web/images/';
    $file = $_FILES['image'];
    $wodny=$_POST['wodny'];
    $file_name = $file['name'];
    $target = $upload_dir.$author.$tytul.$file_name;
    $tmp_path = $file['tmp_name'];
    $zdjecie=imagecreatefromjpeg($target);
    $kolor=imagecolorallocate($zdjecie,255,0,0);
    imagestring($zdjecie,5,0,0,$wodny,$kolor);
    $target=$upload_dir.'wodny'.$author.$tytul.$file_name;
    imagejpeg($zdjecie,$target,100);
    $zdjecie=imagescale($zdjecie,200,125);
    $target=$upload_dir.'mini'.$author.$tytul.$file_name;
    imagejpeg($zdjecie,$target,100);
}   
function add_photo($foto){
    $db=get_db();
    $db->zdjecia->insertOne($foto);
}
function add_user($user){
    $db=get_db();
    $db->users->insertOne($user);
}
function add_private_photo(){
    $db=get_db();
    $file = $_FILES['image'];
    $file_name = $file['name'];
    $author=$_POST['autor'];
    $tytul=$_POST['title'];
    $foto=[
        'miniaturka'=>'mini'.$author.$tytul.$file_name,
        'fullsize'=>'wodny'.$author.$tytul.$file_name,
        'autor'=>$_POST['autor'],
        'title'=>$_POST['title'],
        'prywatne'=>'tak'
    ];
    $zdjecia='zdjecia'.$_SESSION['user_login'];
    $db->$zdjecia->insertOne($foto);
}
function get_cart()
{
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = []; 
    }
}
function add_to_cart($value)
{
    $cart=$_SESSION['cart'];
    array_push($cart,$value);
    $_SESSION['cart']=$cart;
}
function remove_from_cart($value)
{
    $cart=$_SESSION['cart'];
    $key=array_search($value,$cart);
    array_splice($cart,$key,1);
    $_SESSION['cart']=$cart;
}
?>