<?php 

    session_start();
    $_SESSION["email"] = isset($_SESSION["email"]) ? $_SESSION["email"] : "";
    $_SESSION["job"] = isset($_SESSION["job"]) ? $_SESSION["job"] : "";
    $_SESSION["connected"] = isset($_SESSION["connected"]) ? $_SESSION["connected"] : 1;
    $_SESSION["id"] = isset($_SESSION["id"]) ? $_SESSION["id"] : "";
    
	echo '
        <header><nav class="navbar navbar-expand-md"><a class="navbar-brand" href="accueil.php">
        <img src="images/navbar/logo.png" width="250" height="120"/></a><div class="collapse navbar-collapse" id="main-navigation">
        <ul class="navbar-nav">
        ';
                  
    if ($_SESSION['connected']==2 && $job='vendeur'){
        $connexion = 1;
        echo '<li class="nav-item"><a class="nav-link" href="espace_'.$_SESSION["job"].'.php">'.$_SESSION["prenom"].'</a></li>';
    }
    else {
        $connexion = 0;
        echo '<li class="nav-item"><a class="nav-link" href="acces_vendeur.php">Vendre</a></li>';
    }

    echo '
        <li class="nav-item"><a class="nav-link" href="accueil.php"> Accueil</a></li>
        <li class="nav-item"><a class="nav-link" href="categories.php"> Catégories</a></li>
        <li class="nav-item"><a class="nav-link" href="acces_acheteur.php"> Déjà membre ?</a></li>
        ';
        
        
    if ($_SESSION['connected']==2) {
        $connexion = 1;
        echo '<li class="nav-item"><a class="nav-link" href="Deconnexion.php">Deconnexion</a></li>';
        }
        else {
            $connexion = 0;
        }

    echo'
        <li class="nav-item"><a class="nav-link" href="panier.php"><img src="images/navbar/logo_panier.jpg" width="30" height="30"/>
        </a></li></ul></div></nav><br></br></header>
        ';
?>