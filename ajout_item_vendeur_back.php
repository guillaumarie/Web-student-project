<?php
    $categorie = isset($_POST["categorie"])? $_POST["categorie"] : "";
    $nom = isset($_POST["nom"])? $_POST["nom"] : "";
    $description = isset($_POST["description"])? $_POST["description"] : "";
    $photo1 = isset($_POST["photo1"])? $_POST["photo1"] : "";
    $photo2 = isset($_POST["photo2"])? $_POST["photo2"] : "";
    $photo3 = isset($_POST["photo3"])? $_POST["photo3"] : "";
    $photo4 = isset($_POST["photo4"])? $_POST["photo4"] : "";
    $photo5 = isset($_POST["photo5"])? $_POST["photo5"] : "";
    $prix = isset($_POST["prix"])? $_POST["prix"] : "";
    $typeAchat = isset($_POST["typeAchat"])? $_POST["typeAchat"] : "";
    $debut = isset($_POST["debut"])? $_POST["debut"] : "";
    $fin = isset($_POST["fin"])? $_POST["fin"] : "";

    if($categorie && $nom && $description && $photo1 && $prix && $typeAchat) {
        
        // Si Achat Immédiat
        if($typeAchat === "immediat") {
            $database = "ebay_ece";

            $db_handle = mysqli_connect('127.0.0.1:3308', 'root', '');
            $db_found = mysqli_select_db($db_handle, $database);

            if ($db_found) {
                $sqlInsert = "INSERT INTO item (IdVendeur, Nom, Photo1, Photo2, Photo3, Photo4, Photo5, Description, Prix, Categorie, TypeAchat)
                VALUES ('2', '$nom', '$photo1', '$photo2', '$photo3', '$photo4', '$photo5', '$description', '$prix', '$categorie', '$typeAchat')";
                $result = mysqli_query($db_handle, $sqlInsert);

                echo "Votre produit a été mis en vente." . "<br>";

                $sql = "SELECT * FROM item WHERE item.IdVendeur LIKE '2'";
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
                    echo "<img src='images/item/$photo1' alt='photo1' height='400'><br>
                    <img src='images/item/$photo2' alt='photo2' height='100'>
                    <img src='images/item/$photo3' alt='photo3' height='100'>
                    <img src='images/item/$photo4' alt='photo4' height='100'>
                    <img src='images/item/$photo5' alt='photo5' height='100'><br>";
                }
            } else {
                echo "Database not found";
            }
            mysqli_close($db_handle);
        }

        // Si Enchères
        if($typeAchat === "enchere" && ($debut !== "" || $fin !== "")) {
            $database = "ebay_ece";

            $db_handle = mysqli_connect('127.0.0.1:3308', 'root', '');
            $db_found = mysqli_select_db($db_handle, $database);

            if ($db_found) {
                $sqlInsert = "INSERT INTO item (IdVendeur, Nom, Photo1, Photo2, Photo3, Photo4, Photo5, Description, Prix, Categorie, TypeAchat)
                VALUES ('2', '$nom', '$photo1', '$photo2', '$photo3', '$photo4', '$photo5', '$description', '$prix', '$categorie', '$typeAchat')";
                $result = mysqli_query($db_handle, $sqlInsert);

                $sql = "SELECT * FROM item ORDER BY IdItem DESC LIMIT 1";
                $result = mysqli_query($db_handle, $sql);
                $data = mysqli_fetch_assoc($result);
                $iditem = $data['IdItem'];
                $prix = $data['Prix'];

                $sqlInsert = "INSERT INTO enchere (IdItem, Prix, Debut, Fin) VALUES ('$iditem', '$prix', '$debut', '$fin')";
                $result = mysqli_query($db_handle, $sqlInsert);

                echo "Votre produit a été mis en vente." . "<br>";

                $sql = "SELECT * FROM item, enchere WHERE item.IdItem = enchere.IdItem AND item.IdVendeur LIKE '2'";
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
                    echo "<img src='images/item/$photo1' alt='photo1' height='400'><br>
                    <img src='images/item/$photo2' alt='photo2' height='100'>
                    <img src='images/item/$photo3' alt='photo3' height='100'>
                    <img src='images/item/$photo4' alt='photo4' height='100'>
                    <img src='images/item/$photo5' alt='photo5' height='100'><br>";
                }
            } else {
                echo "Database not found";
            }
            mysqli_close($db_handle);
        }

        // Si Meilleure Offre OU Achat Immediat et Meilleure Offre
        if($typeAchat === "offre" || $typeAchat === "immediat_offre") {
            $database = "ebay_ece";

            $db_handle = mysqli_connect('127.0.0.1:3308', 'root', '');
            $db_found = mysqli_select_db($db_handle, $database);

            if ($db_found) {
                $sqlInsert = "INSERT INTO item (IdVendeur, Nom, Photo1, Photo2, Photo3, Photo4, Photo5, Description, Prix, Categorie, TypeAchat)
                VALUES ('2', '$nom', '$photo1', '$photo2', '$photo3', '$photo4', '$photo5', '$description', '$prix', '$categorie', '$typeAchat')";
                $result = mysqli_query($db_handle, $sqlInsert);

                $sql = "SELECT * FROM item ORDER BY IdItem DESC LIMIT 1";
                $result = mysqli_query($db_handle, $sql);
                $data = mysqli_fetch_assoc($result);
                $iditem = $data['IdItem'];
                $prix = $data['Prix'];

                $sqlInsert = "INSERT INTO offre (IdItem, Prix) VALUES ('$iditem', '$prix')";
                $result = mysqli_query($db_handle, $sqlInsert);

                echo "Votre produit a été mis en vente." . "<br>";

                $sql = "SELECT * FROM item WHERE item.IdVendeur LIKE '2'";
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
                    echo "<img src='images/item/$photo1' alt='photo1' height='400'><br>
                    <img src='images/item/$photo2' alt='photo2' height='100'>
                    <img src='images/item/$photo3' alt='photo3' height='100'>
                    <img src='images/item/$photo4' alt='photo4' height='100'>
                    <img src='images/item/$photo5' alt='photo5' height='100'><br>";
                }
            } else {
                echo "Database not found";
            }
            mysqli_close($db_handle);
        }
        else {
            echo "Veuillez rentrer les dates d'enchères.<br>";
        }
    } else {
        echo "Empty fields.<br>";
    }
?>