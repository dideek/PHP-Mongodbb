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
<?php if(!isset($_SESSION['user_login'])): ?>
Zaloguj się:
<form method="POST">
Login:
 <input type="text" name="login" required> </br>
Hasło:
 <input type="password" name="password" required> </br>
 <input type="submit" value="Zaloguj się" name="submit">
</form>
<?php
if($passworderror==1){
echo '<p> Błędne Hasło </p>';
}
if($loginerror==1){
 echo '<p> Nie znaleziono użytkownika o podanym loginie</p>';
}
?>
<?php endif; ?>
<?php if(isset($_SESSION['user_login'])): ?>
Naciśnij przycisk, aby się wylogować
<form method="POST">
<input type="submit" value="Wyloguj się" name="logout">
</form>
<?php endif; ?>
</div>
<footer>
    Copyright 2020, Garbowski Piotr 184390
</footer>



</div>



</body>