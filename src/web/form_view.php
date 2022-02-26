<!DOCTYPE html>
<html lang="pl">
<head>
<title>LCS</title>
    <meta charset="UTF-8">	
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="container">
    <header>
<h1>League of Legends - E-sports</h1>
<img src="lol.png" alt="logo league" height="100">
    
    </header>
    <div id="lewy">
        <nav>
            <ul>
                <li><a href="index.html">Strona Główna</a></li>
                <li><a href="lec.html">LEC</a></li>
                <li><a href="lcs.html">LCS</a></li>
                <li><a href="lck.html">LCK</a></li>
                <li><a href="form.php">Przeslij Zdjecie</a></li>
				<li><a href="galeria.php">Galeria Zdjęć</a></li>
				<li><a href="rejestracja.php">Rejestracja</a></li>
                <li><a href="logowanie.php">Logowanie/Wylogowanie</a></li>
				<li><a href="ulubione.php">Ulubione zdjęcia</a></li>
        
        </ul>  
            
        </nav>
    </div>
<div id="main">
<?php
if($errortype==1 && $errorsize==1){
    echo '<script>alert("Plik jest za duży i ma złe rozszerzenie")</script>'; 
}
else if($errorsize==1){
    echo '<script>alert("Plik jest za duży")</script>'; 
}
else if($errortype==1){
    echo '<script>alert("Złe rozszerzenie pliku")</script>'; 
}
?>
<form method="POST" enctype="multipart/form-data">
Wybierz zdjęcie do przesłania:
 <input type="file" name="image" required> </br>
 Znak wodny: 
 <input type="text" name="wodny" required> </br>
 Tytuł:
 <input type="text" name="title" required> </br>
 Autor:
 <?php
 if(isset($_SESSION['user_login'])){
    echo '<input type="text" name="autor" value="'.$_SESSION['user_login'].'"> </br>';
    echo 'Widoczność zdjęcia: ';
    echo '<input type="radio" id="option1" name="visible" value="private">';
    echo '<label for="option1">Prywatne</label>';
    echo '<input type="radio" id="option2" name="visible" value="public">';
    echo '<label for="option2">Publiczne</label><br>';
 }
 else echo '<input type="text" name="autor" required> </br>';
 ?>
 <input type="submit" value="Wyślij Zdjęcie" name="submit">
</form>
<?php
if($errorimage==1){
    echo '<p> Istnieje już zdjęcie z taką nazwą pliku, tytułem i autorem. </p>';
}
?>
</div>
<footer>
    Copyright 2020, Garbowski Piotr 184390
</footer>



</div>



</body>