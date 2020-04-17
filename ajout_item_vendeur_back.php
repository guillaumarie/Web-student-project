<?php
    session_start();
    $_SESSION["id"] = isset($_SESSION["id"]) ? $_SESSION["id"] : "";
    $id = $_SESSION["id"];
    
    $categorie = isset($_POST["categorie"])? $_POST["categorie"] : "";
    $nom = isset($_POST["nom"])? $_POST["nom"] : "";
    $description2 = isset($_POST["description"])? $_POST["description"] : "";
    $description = str_replace("'", "''", "$description2"); // Pour accepter les apostrophes
    $photo1 = "images/item/";
    $photo1 .= isset($_POST["photo1"])? $_POST["photo1"] : "";
    $photo2 = "images/item/";
    $photo2 .= isset($_POST["photo2"])? $_POST["photo2"] : "";
    $photo3 = "images/item/";
    $photo3 .= isset($_POST["photo3"])? $_POST["photo3"] : "";
    $photo4 = "images/item/";
    $photo4 .= isset($_POST["photo4"])? $_POST["photo4"] : "";
    $photo5 = "images/item/";
    $photo5 .= isset($_POST["photo5"])? $_POST["photo5"] : "";
    $prix = isset($_POST["prix"])? $_POST["prix"] : "";
    $typeAchat = isset($_POST["typeAchat"])? $_POST["typeAchat"] : "";
    $debut = isset($_POST["debut"])? $_POST["debut"] : "";
    $fin = isset($_POST["fin"])? $_POST["fin"] : "";

    if($categorie && $nom && $description && $photo1 && $prix && $typeAchat) {

        $database = "ebay_ece";
        $db_handle = mysqli_connect('127.0.0.1:3308', 'root', '');
        $db_found = mysqli_select_db($db_handle, $database);
        
        if ($db_found) {
            // Si Achat Immédiat
            if ($typeAchat === "immediat") {
                $sqlInsert = "INSERT INTO item (IdVendeur, Nom, Photo1, Description, Prix, Categorie, TypeAchat)
                VALUES ('$id', '$nom', '$photo1', '$description', '$prix', '$categorie', '$typeAchat')";
                $result = mysqli_query($db_handle, $sqlInsert);

                $sql = "SELECT * FROM item ORDER BY IdItem DESC LIMIT 1";
                $result = mysqli_query($db_handle, $sql);
                $data = mysqli_fetch_assoc($result);
                $iditem = $data['IdItem'];

                if ($photo2 !== "images/item/") {
                    $sqlInsert = "UPDATE item SET Photo2 = '$photo2' WHERE IdItem LIKE '$iditem'";
                    $result = mysqli_query($db_handle, $sqlInsert);
                }
                if ($photo3 !== "images/item/") {
                    $sqlInsert = "UPDATE item SET Photo3 = '$photo3' WHERE IdItem LIKE '$iditem'";
                    $result = mysqli_query($db_handle, $sqlInsert);
                }
                if ($photo4 !== "images/item/") {
                    $sqlInsert = "UPDATE item SET Photo4 = '$photo4' WHERE IdItem LIKE '$iditem'";
                    $result = mysqli_query($db_handle, $sqlInsert);
                }
                if ($photo5 !== "images/item/") {
                    $sqlInsert = "UPDATE item SET Photo5 = '$photo5' WHERE IdItem LIKE '$iditem'";
                    $result = mysqli_query($db_handle, $sqlInsert);
                }

                echo "Votre produit a été mis en vente." . "<br>";

                $sql = "SELECT * FROM item WHERE item.IdVendeur LIKE '$id'";
                $result = mysqli_query($db_handle, $sql);

                while ($data = mysqli_fetch_assoc($result)) {
                    echo "Informations sur le produit mis en vente :" . "<br>";
                    echo "ID Produit : " . $data['IdItem'] . "<br>";
                    echo "ID Vendeur : " . $data['IdVendeur'] . "<br>";
                    echo "Catégorie : " . $data['Categorie'] . "<br>";
                    echo "Nom : " . $data['Nom'] . "<br>";
                    echo "Description : " . $data['Description'] . "<br>";
                    echo "Prix : " . $data['Prix'] . " € <br>";
                    $photo1 = $data['Photo1'];
                    $photo2 = $data['Photo2'];
                    $photo3 = $data['Photo3'];
                    $photo4 = $data['Photo4'];
                    $photo5 = $data['Photo5'];
                    echo "<img src='$photo1' alt='photo1' height='400'><br>
                    <img src='$photo2' alt='photo2' height='100'>
                    <img src='$photo3' alt='photo3' height='100'>
                    <img src='$photo4' alt='photo4' height='100'>
                    <img src='$photo5' alt='photo5' height='100'><br>";
                }
            }

            // Si Meilleure Offre OU Achat Immediat et Meilleure Offre
            if ($typeAchat === "offre" || $typeAchat === "immediat_offre") {
                $sqlInsert = "INSERT INTO item (IdVendeur, Nom, Photo1, Description, Prix, Categorie, TypeAchat)
                VALUES ('$id', '$nom', '$photo1', '$description', '$prix', '$categorie', '$typeAchat')";
                $result = mysqli_query($db_handle, $sqlInsert);

                $sql = "SELECT * FROM item ORDER BY IdItem DESC LIMIT 1";
                $result = mysqli_query($db_handle, $sql);
                $data = mysqli_fetch_assoc($result);
                $iditem = $data['IdItem'];
                $prix = $data['Prix'];

                if ($photo2 !== "images/item/") {
                    $sqlInsert = "UPDATE item SET Photo2 = '$photo2' WHERE IdItem LIKE '$iditem'";
                    $result = mysqli_query($db_handle, $sqlInsert);
                }
                if ($photo3 !== "images/item/") {
                    $sqlInsert = "UPDATE item SET Photo3 = '$photo3' WHERE IdItem LIKE '$iditem'";
                    $result = mysqli_query($db_handle, $sqlInsert);
                }
                if ($photo4 !== "images/item/") {
                    $sqlInsert = "UPDATE item SET Photo4 = '$photo4' WHERE IdItem LIKE '$iditem'";
                    $result = mysqli_query($db_handle, $sqlInsert);
                }
                if ($photo5 !== "images/item/") {
                    $sqlInsert = "UPDATE item SET Photo5 = '$photo5' WHERE IdItem LIKE '$iditem'";
                    $result = mysqli_query($db_handle, $sqlInsert);
                }

                $sqlInsert = "INSERT INTO offre (IdItem, Prix) VALUES ('$iditem', '$prix')";
                $result = mysqli_query($db_handle, $sqlInsert);

                echo "Votre produit a été mis en vente." . "<br>";

                $sql = "SELECT * FROM item, offre WHERE item.IdItem = offre.IdItem AND item.IdVendeur LIKE '$id'";
                $result = mysqli_query($db_handle, $sql);

                while ($data = mysqli_fetch_assoc($result)) {
                    echo "Informations sur le produit mis en vente :" . "<br>";
                    echo "ID Produit : " . $data['IdItem'] . "<br>";
                    echo "ID Vendeur : " . $data['IdVendeur'] . "<br>";
                    echo "Catégorie : " . $data['Categorie'] . "<br>";
                    echo "Nom : " . $data['Nom'] . "<br>";
                    echo "Description : " . $data['Description'] . "<br>";
                    echo "Prix : " . $data['Prix'] . " € <br>";
                    $photo1 = $data['Photo1'];
                    $photo2 = $data['Photo2'];
                    $photo3 = $data['Photo3'];
                    $photo4 = $data['Photo4'];
                    $photo5 = $data['Photo5'];
                    echo "<img src='$photo1' alt='photo1' height='400'><br>
                    <img src='$photo2' alt='photo2' height='100'>
                    <img src='$photo3' alt='photo3' height='100'>
                    <img src='$photo4' alt='photo4' height='100'>
                    <img src='$photo5' alt='photo5' height='100'><br>";
                }
            }

            // Si Enchères
            if ($typeAchat === "enchere" && $debut !== "" && $fin !== "") {
                $sqlInsert = "INSERT INTO item (IdVendeur, Nom, Photo1, Description, Prix, Categorie, TypeAchat)
                VALUES ('$id', '$nom', '$photo1', '$description', '$prix', '$categorie', '$typeAchat')";
                $result = mysqli_query($db_handle, $sqlInsert);

                $sql = "SELECT * FROM item ORDER BY IdItem DESC LIMIT 1";
                $result = mysqli_query($db_handle, $sql);
                $data = mysqli_fetch_assoc($result);
                $iditem = $data['IdItem'];
                $prix = $data['Prix'];
                
                if ($photo2 !== "images/item/") {
                    $sqlInsert = "UPDATE item SET Photo2 = '$photo2' WHERE IdItem LIKE '$iditem'";
                    $result = mysqli_query($db_handle, $sqlInsert);
                }
                if ($photo3 !== "images/item/") {
                    $sqlInsert = "UPDATE item SET Photo3 = '$photo3' WHERE IdItem LIKE '$iditem'";
                    $result = mysqli_query($db_handle, $sqlInsert);
                }
                if ($photo4 !== "images/item/") {
                    $sqlInsert = "UPDATE item SET Photo4 = '$photo4' WHERE IdItem LIKE '$iditem'";
                    $result = mysqli_query($db_handle, $sqlInsert);
                }
                if ($photo5 !== "images/item/") {
                    $sqlInsert = "UPDATE item SET Photo5 = '$photo5' WHERE IdItem LIKE '$iditem'";
                    $result = mysqli_query($db_handle, $sqlInsert);
                }
                
                $sqlInsert = "INSERT INTO enchere (IdItem, Prix, Debut, Fin) VALUES ('$iditem', '$prix', '$debut', '$fin')";
                $result = mysqli_query($db_handle, $sqlInsert);

                echo "Votre produit a été mis en vente." . "<br>";

                $sql = "SELECT * FROM item, enchere WHERE item.IdItem = enchere.IdItem AND item.IdVendeur LIKE '$id'";
                $result = mysqli_query($db_handle, $sql);

                while ($data = mysqli_fetch_assoc($result)) {
                    echo "Informations sur le produit mis en vente :" . "<br>";
                    echo "ID Produit : " . $data['IdItem'] . "<br>";
                    echo "ID Vendeur : " . $data['IdVendeur'] . "<br>";
                    echo "Catégorie : " . $data['Categorie'] . "<br>";
                    echo "Nom : " . $data['Nom'] . "<br>";
                    echo "Description : " . $data['Description'] . "<br>";
                    echo "Prix : " . $data['Prix'] . " € <br>";
                    echo "Début de la vente : " . $data['Debut'] . "<br>";
                    echo "Fin de la vente : " . $data['Fin'] . "<br>";
                    $photo1 = $data['Photo1'];
                    $photo2 = $data['Photo2'];
                    $photo3 = $data['Photo3'];
                    $photo4 = $data['Photo4'];
                    $photo5 = $data['Photo5'];
                    echo "<img src='$photo1' alt='photo1' height='400'><br>
                    <img src='$photo2' alt='photo2' height='100'>
                    <img src='$photo3' alt='photo3' height='100'>
                    <img src='$photo4' alt='photo4' height='100'>
                    <img src='$photo5' alt='photo5' height='100'><br>";
                }
            }

            if ($typeAchat === "enchere" && ($debut === "" || $fin === "")) {
                echo "Veuillez rentrer les dates d'enchères.<br>";
            }
            mysqli_close($db_handle);
        }
        else {
            echo "Database not found";
        }
    } else {
        echo "Empty fields.<br>";
    }
?>