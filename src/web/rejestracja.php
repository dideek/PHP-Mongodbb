<?php
require_once 'business.php';
$errorpass=0;
$errorlogin=0;
if($_SERVER['REQUEST_METHOD']==='POST'){
$db=get_db();
$haslo=$_POST['password'];
$haslo2=$_POST['password2'];
$email=$_POST['email'];
$login=$_POST['login'];
if($haslo!==$haslo2){
    $errorpass=1;
}
$query=[
    'login'=>$login
];
if($db->users->findOne($query)){
    $errorlogin=1;
}
if($errorpass==0 && $errorlogin==0){
    $pass=password_hash($haslo, PASSWORD_DEFAULT);
    $user=[
        'login'=>$login,
        'haslo'=>$pass,
        'email'=>$email
    ];
    add_user($user);
    header('Location: rejestracja2.php');
    exit;
}
}
include 'rejestracja-view.php';
?>
