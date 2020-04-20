<?php
    session_start();
    $id = $_SESSION["id"];

    $nom = isset($_POST["nom"])? $_POST["nom"] : "";
    $prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
    $adresse1 = isset($_POST["adresse1"])? $_POST["adresse1"] : "";
    $adresse2 = isset($_POST["adresse2"])? $_POST["adresse2"] : "";
    $cp = isset($_POST["cp"])? $_POST["cp"] : "";
    $ville = isset($_POST["ville"])? $_POST["ville"] : "";
    $pays = isset($_POST["pays"])? $_POST["pays"] : "";
    $tel = isset($_POST["tel"])? $_POST["tel"] : "";

    if($nom && $prenom && $adresse1 && $cp && $ville && $pays && $tel) {
        
        include 'includes/bdd.php';

        if ($db_found) {
            $sql = "SELECT * FROM acheteur WHERE IdAcheteur LIKE '$id'";
            $result = mysqli_query($db_handle, $sql);
            $data = mysqli_fetch_assoc($result);
            $email = $data["Email"];
            $typeCarte = $data["TypeCarte"];
            $numeroCarte = $data["NumeroCarte"];
            $titulaire = $data["NomTitulaire"];
            $expiration = $data["Expiration"];
            $cvc = $data["CVC"];
            $password = $data["Password"];

            $sqlDelete = "DELETE FROM acheteur WHERE IdAcheteur LIKE '$id'";
            $result = mysqli_query($db_handle, $sqlDelete);

            if ($adresse2 !== 0) {
                $sqlInsert = "INSERT INTO acheteur (IdAcheteur, Nom, Prenom, Email, Adresse1, Adresse2, CP, Ville, Pays, Telephone,
                TypeCarte, NumeroCarte, NomTitulaire, Expiration, CVC, Password)
                VALUES ('$id', '$nom', '$prenom', '$email', '$adresse1', '$adresse2', '$cp', '$ville', '$pays', '$tel', '$typeCarte',
                '$numeroCarte', '$titulaire', '$expiration', '$cvc', '$password')";
            } else {
                $sqlInsert = "INSERT INTO acheteur (Nom, Prenom, Email, Adresse1, CP, Ville, Pays, Telephone,
                TypeCarte, NumeroCarte, NomTitulaire, Expiration, CVC, Password)
                VALUES ('$nom', '$prenom', '$email', '$adresse1', '$cp', '$ville', '$pays', '$tel', '$typeCarte',
                '$numeroCarte', '$titulaire', '$expiration', '$cvc', '$password')";
            }
            $result = mysqli_query($db_handle, $sqlInsert);
            echo "Votre compte client a été mis à jour." . "<br><br>";

            $result = mysqli_query($db_handle, $sql);

            $data = mysqli_fetch_assoc($result);
            $_SESSION["prenom"] = $data["Prenom"]; 
            $_SESSION["email"]=$data["Email"];
            $_SESSION["connected"] = 2;
            $_SESSION["id"] = $data["IdAcheteur"];
            header('Location: espace_acheteur.php');
        } else {
            echo "Database not found";
        }
        mysqli_close($db_handle);
    } else {
        echo "Empty fields";
    }
?>