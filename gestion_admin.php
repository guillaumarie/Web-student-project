<?php

    session_start();

    $idItem = isset($_POST["idItem"])? $_POST["idItem"] : "";
    $idVendeur = isset($_POST["id"])? $_POST["id"] : "";
    $emailVendeur = isset($_POST["email"])? $_POST["email"] : "";
    $idAcheteur = $_SESSION["id"];

    
    $database = "ebay_ece";

    $db_handle = mysqli_connect('127.0.0.1:3308', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);

    if ($db_found) {
        if(isset($_POST["button1"])) {      // Suppression article du site
            if($idItem) {
                $sql = "SELECT TypeAchat FROM item WHERE IdItem LIKE '$idItem'"; 
                $result = mysqli_query($db_handle, $sql);
                $data = mysqli_fetch_assoc($result);
                if ($data["TypeAchat"] == "immediat_offre" || $data["TypeAchat"] == "offre") {
                    $sqlDelete = "DELETE FROM offre WHERE IdItem LIKE '$idItem'"; 
                    $resultDelete = mysqli_query($db_handle, $sqlDelete);
                }
                if ($data["TypeAchat"] == "enchere") {
                    $sqlDelete = "DELETE FROM enchere WHERE IdItem LIKE '$idItem'"; 
                    $resultDelete = mysqli_query($db_handle, $sqlDelete);
                }
                $sqlDelete = "DELETE FROM item WHERE IdItem LIKE '$idItem'"; 
                $resultDelete = mysqli_query($db_handle, $sqlDelete);
                $sqlDelete = "DELETE FROM panier WHERE IdItem LIKE '$idItem'"; 
                $resultDelete = mysqli_query($db_handle, $sqlDelete);

                header('Location: accueil.php');
            }
        }
        if(isset($_POST["button2"])) {      // Suppression vendeur
            if ($idVendeur) {
                $sql = "SELECT IdItem, TypeAchat FROM item WHERE IdVendeur LIKE '$idVendeur'"; 
                $result = mysqli_query($db_handle, $sql);
                while ($data = mysqli_fetch_assoc($result)) {
                    $idItem = $data["IdItem"];
                    if ($data["TypeAchat"] == "immediat_offre" || $data["TypeAchat"] == "offre") {
                        $sqlDelete = "DELETE FROM offre WHERE IdItem LIKE '$idItem'"; 
                        $resultDelete = mysqli_query($db_handle, $sqlDelete);
                    }
                    if ($data["TypeAchat"] == "enchere") {
                        $sqlDelete = "DELETE FROM enchere WHERE IdItem LIKE '$idItem'"; 
                        $resultDelete = mysqli_query($db_handle, $sqlDelete);
                    }
                    $sqlDelete = "DELETE FROM item WHERE IdItem LIKE '$idItem'"; 
                    $resultDelete = mysqli_query($db_handle, $sqlDelete);
                    $sqlDelete = "DELETE FROM panier WHERE IdItem LIKE '$idItem'"; 
                    $resultDelete = mysqli_query($db_handle, $sqlDelete);
                }
                $sqlDelete = "DELETE FROM vendeur WHERE IdVendeur LIKE '$idVendeur'"; 
                $resultDelete = mysqli_query($db_handle, $sqlDelete);

                header('Location: accueil.php');
            }
            if ($emailVendeur) {
                $sql = "SELECT IdVendeur FROM vendeur WHERE Email LIKE '$emailVendeur'"; 
                $result = mysqli_query($db_handle, $sql);
                $data = mysqli_fetch_assoc($result);
                $idVendeur = $data["IdVendeur"];

                $sql = "SELECT IdItem, TypeAchat FROM item WHERE IdVendeur LIKE '$idVendeur'"; 
                $result = mysqli_query($db_handle, $sql);
                while ($data = mysqli_fetch_assoc($result)) {
                    $idItem = $data["IdItem"];
                    if ($data["TypeAchat"] == "immediat_offre" || $data["TypeAchat"] == "offre") {
                        $sqlDelete = "DELETE FROM offre WHERE IdItem LIKE '$idItem'"; 
                        $resultDelete = mysqli_query($db_handle, $sqlDelete);
                    }
                    if ($data["TypeAchat"] == "enchere") {
                        $sqlDelete = "DELETE FROM enchere WHERE IdItem LIKE '$idItem'"; 
                        $resultDelete = mysqli_query($db_handle, $sqlDelete);
                    }
                    $sqlDelete = "DELETE FROM item WHERE IdItem LIKE '$idItem'"; 
                    $resultDelete = mysqli_query($db_handle, $sqlDelete);
                    $sqlDelete = "DELETE FROM panier WHERE IdItem LIKE '$idItem'"; 
                    $resultDelete = mysqli_query($db_handle, $sqlDelete);
                }
                $sqlDelete = "DELETE FROM vendeur WHERE IdVendeur LIKE '$idVendeur'"; 
                $resultDelete = mysqli_query($db_handle, $sqlDelete);

                header('Location: accueil.php');
            }
        }
        if(isset($_POST["button3"])) {      // Suppression article du panier
            if($idItem) {
                $sqlDelete = "DELETE FROM panier WHERE IdItem LIKE '$idItem' AND IdAcheteur LIKE '$idAcheteur'"; 
                $resultDelete = mysqli_query($db_handle, $sqlDelete);
                header('Location: panier.php');
            }
        }
    } else {
        echo "Database not found.<br>";
    }
    mysqli_close($db_handle);
?>