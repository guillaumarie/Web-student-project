<?php
    $nom = isset($_POST["nom"])? $_POST["nom"] : "";
    $prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
    $email = isset($_POST["email"])? $_POST["email"] : "";
    $password1 = isset($_POST["password1"])? $_POST["password1"] : "";
    $password2 = isset($_POST["password2"])? $_POST["password2"] : "";
    $photoProfil = "images/vendeur/";
    $photoProfil .= isset($_POST["photoProfil"])? $_POST["photoProfil"] : "";
    $banniere = "images/vendeur/";
    $banniere .= isset($_POST["banniere"])? $_POST["banniere"] : "";

    if($nom && $prenom && $email && $password1 && $password2) {
        
        include 'includes/bdd.php';

        if ($db_found) {
            $sql = "SELECT * FROM vendeur WHERE Email LIKE '$email'";
            $result = mysqli_query($db_handle, $sql);

            if (mysqli_num_rows($result) !== 0) {
                echo "Cet Email est déjà utilisé par un vendeur.<br>";
            } else {
                if ($password1 === $password2) {
                    $sqlInsert = "INSERT INTO vendeur (Nom, Prenom, Email, Password, PhotoProfil, ImageFond)
                    VALUES ('$nom', '$prenom', '$email', '$password1', '$photoProfil', '$banniere')";

                    $result = mysqli_query($db_handle, $sqlInsert);
                    header('Location: acces_vendeur.php');
                    }
                } else {
                    echo "Les mots de passe ne sont pas les mêmes.<br>";
                }
            }
        } else {
            echo "Database not found";
        }
        mysqli_close($db_handle);
    } else {
        echo "Empty fields";
    }
?>