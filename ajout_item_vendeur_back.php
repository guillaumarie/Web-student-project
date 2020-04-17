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

    if($categorie && $nom && $description && $photo1 && $prix && $typeAchat) {
        $database = "ebay_ece";

        $db_handle = mysqli_connect('127.0.0.1:3308', 'root', '');
        $db_found = mysqli_select_db($db_handle, $database);

        if ($db_found) {
            $sqlInsert = "INSERT INTO item (IdVendeur, Nom, Photo1, Photo2, Photo3, Photo4, Photo5, Description, Prix, Categorie, TypeAchat)
            VALUES ('3', '$nom', '$photo1', '$photo2', '$photo3', '$photo4', '$photo5', '$description', '$prix', '$categorie', '$typeAchat')";

            $result = mysqli_query($db_handle, $sqlInsert);
            echo "Votre produit a été mis en vente." . "<br>";

            $sql = "SELECT * FROM item WHERE IdVendeur LIKE '3'";
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
                echo "<br>";
            }
        } else {
            echo "Database not found";
        }
        mysqli_close($db_handle);
    } else {
        echo "Empty fields";
    }
?>