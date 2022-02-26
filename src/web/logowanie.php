<?php
require_once 'business.php';
$loginerror=0;
$passworderror=0;
$db=get_db();
if($_SERVER['REQUEST_METHOD']==='POST'){
    if(isset($_POST['logout'])){
        session_destroy();
        header('Location: logowanie3.php');
        exit;
    }

    else{
    $db=get_db();
    $password=$_POST['password'];
    $login=$_POST['password'];
    $query=[
        'login'=>$login
    ];
    if($user=$db->users->findOne($query)){
    if(password_verify($password,$user['haslo'])){
        session_regenerate_id();
        $_SESSION['user_login']=$user['login'];
        header('Location:logowanie2.php');
        exit;
    }
    else $passworderror=1;
    }
    else $loginerror=1;
}
}
include 'logowanie_view.php';
?>
