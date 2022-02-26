<?php
require_once 'business.php';
$errortype=0;
$errorsize=0;
$sukces=0;
$errorimage=0;
if($_SERVER['REQUEST_METHOD']==='POST'){
$image=$_FILES['image'];
$finfo=finfo_open(FILEINFO_MIME_TYPE);
$file_name=$image['tmp_name'];
$mime_type=finfo_file($finfo,$file_name);
$image_name=$image['name'];
$author=$_POST['autor'];
$tytul=$_POST['title'];
$db=get_db();
if($mime_type!=='image/jpeg' && $mime_type!=='image/png'){
    //echo '<p>Złe rozszerzenie pliku </p>'; 
    $errortype=1;
}
if($image['size']>1048576){
    //echo 'Za duży rozmiar pliku <br>'; 
    $errorsize=1;
}
$query=[
    'miniaturka'=>'mini'.$author.$tytul.$image_name
];
if($db->zdjecia->findOne($query)){
    $errorimage=1;
}
if(isset($_SESSION['user_login'])){
    $zdjecia='zdjecia'.$_SESSION['user_login'];
    if($db->$zdjecia->findOne($query)) $errorimage=1;
}
if($errorsize==1 || $errortype==1 || $errorimage==1){
    //echo 'błąd';
}

else{
$upload_dir = '/var/www/prod/src/web/images/';
$file = $_FILES['image'];
$wodny=$_POST['wodny'];
$file_name = $file['name'];
$target = $upload_dir.$author.$tytul.$file_name;
$tmp_path = $file['tmp_name'];
if(move_uploaded_file($tmp_path, $target)){
if($mime_type==='image/png'){
    create2_png();

                            }
else{
    create2_jpg();
    }
$foto=[
    'miniaturka'=>'mini'.$author.$tytul.$file_name,
    'fullsize'=>'wodny'.$author.$tytul.$file_name,
    'autor'=>$_POST['autor'],
    'title'=>$_POST['title']
];
$widok='public';
if(isset($_POST['visible'])) $widok=$_POST['visible'];
if($widok==='private') add_private_photo($foto);
else add_photo($foto);
//$db->zdjecia->insertOne($foto);
header('Location: form2.php');
exit;
}
}
}
include 'form_view.php';
?>