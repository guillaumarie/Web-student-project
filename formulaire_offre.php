<?php
    session_start();

    $idOffre = isset($_POST["idOffre"])? $_POST["idOffre"] : "";
    $offre = isset($_POST["offre"])? $_POST["offre"] : "";

    include 'includes/bdd.php';

    if ($db_found) {
        if(isset($_POST["button1"])) {      // Contre-offre
            if($offre && $idOffre) {
                $sql = "SELECT IdItem, IdAcheteur FROM offre WHERE IdOffre LIKE '$idOffre'"; 
                $result = mysqli_query($db_handle, $sql);
                $data = mysqli_fetch_assoc($result);
                $idItem = $data["IdItem"];
                $idAcheteur = $data["IdAcheteur"];

                $sqlInsert = "INSERT INTO offre (IdItem, IdAcheteur, Proposition) VALUES ('$idItem', '$idAcheteur', '$offre')"; 
                $resultInsert = mysqli_query($db_handle, $sqlInsert);

                header('Location: offre.php');
            }
        }
        if(isset($_POST["button2"])) {      // Accepter l'offre
            if ($idOffre) {
                $sql = "SELECT IdItem, IdAcheteur, Proposition FROM offre WHERE IdOffre LIKE '$idOffre'"; 
                $result = mysqli_query($db_handle, $sql);
                $data = mysqli_fetch_assoc($result);
                $idItem = $data["IdItem"];
                $idAcheteur = $data["IdAcheteur"];
                $proposition = $data["Proposition"];

                $sqlInsert = "INSERT INTO offre (IdItem, IdAcheteur, Proposition, Accepte) VALUES ('$idItem', '$idAcheteur', '$proposition', '1')"; 
                $resultInsert = mysqli_query($db_handle, $sqlInsert);

                header('Location: offre.php');
            }
        }
    } else {
        echo "Database not found.<br>";
    }
    mysqli_close($db_handle);
?>