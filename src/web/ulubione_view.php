<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
	<title>E-Sport</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style.css" rel="stylesheet" type="text/css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
    <div id="tabs">
    <?php
    echo '<ul>';
    for($i=1;$i<=$ilosc_stron;$i++){
    echo '<li class="tabsli"><a href="#tabs-'.$i.'">'.$i.'    </a></li>';
}
  echo '</ul>';
  echo '<form method="POST">';
    for($page;$page<=$ilosc_stron;$page++){
        echo '<div id="tabs-'.$page.'">';
        $opts=[
            'skip'=>($page-1)*$limit,
            'limit'=>$limit
        ];
        $fotki=$db->tab_images->find([],$opts);
        foreach($fotki as $zdjecie){
            echo '<input type="checkbox" name="koszyk[]" value="'.$zdjecie['_id'].'">';
            echo '<a href="/images/'.$zdjecie['fullsize'].'">';
            echo '<img src="/images/'.$zdjecie['miniaturka'].'"></a>';
            echo '<p>Tytuł: '.$zdjecie['title'].'  </p>';
            echo '<p>Autor: '.$zdjecie['autor'].' </p>';
            if(isset($zdjecie['prywatne'])) echo '<p>Zdjęcie prywatne </p>';
        }
        echo '</div>';
    }
    if($ilosc_zdjec>0){
    echo '<input type="submit" value="Usuń wybrane z ulubionych">';
    }
    echo '</form>';
  ?>
  
</div>

</div>
<footer>
    Copyright 2020, Garbowski Piotr 184390
</footer>



</div>

<script>
  $( function() {
    $( "#tabs" ).tabs();
  } );
  </script>
</body>