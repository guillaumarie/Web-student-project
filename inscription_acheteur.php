<?php
    $nom = isset($_POST["nom"])? $_POST["nom"] : "";
    $prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
    $email = isset($_POST["email"])? $_POST["email"] : "";
    $password1 = isset($_POST["password1"])? $_POST["password1"] : "";
    $password2 = isset($_POST["password2"])? $_POST["password2"] : "";
    $adresse1 = isset($_POST["adresse1"])? $_POST["adresse1"] : "";
    $adresse2 = isset($_POST["adresse2"])? $_POST["adresse2"] : "";
    $cp = isset($_POST["cp"])? $_POST["cp"] : "";
    $ville = isset($_POST["ville"])? $_POST["ville"] : "";
    $pays = isset($_POST["pays"])? $_POST["pays"] : "";
    $tel = isset($_POST["tel"])? $_POST["tel"] : "";
    $typeCarte = isset($_POST["typeCarte"])? $_POST["typeCarte"] : "";
    $numeroCarte = isset($_POST["numeroCarte"])? $_POST["numeroCarte"] : "";
    $titulaire = isset($_POST["titulaire"])? $_POST["titulaire"] : "";
    $expiration = isset($_POST["expiration"])? $_POST["expiration"] : "";
    $cvc = isset($_POST["cvc"])? $_POST["cvc"] : "";
    $clause = isset($_POST["clause"])? $_POST["clause"] : "";

    if($nom && $prenom && $email && $password1 && $password2 && $adresse1 && $cp && $ville && $pays && $tel
        && $typeCarte && $numeroCarte && $titulaire && $expiration && $cvc && $clause) {
        $database = "ebay_ece";

        $db_handle = mysqli_connect('127.0.0.1:3308', 'root', '');
        $db_found = mysqli_select_db($db_handle, $database);

        if ($db_found) {
            $sql = "SELECT * FROM acheteur WHERE Email LIKE '$email'";
            $result = mysqli_query($db_handle, $sql);

            if (mysqli_num_rows($result) !== 0) {
                echo "Cet Email est déjà utilisé par un client.<br>";
            } else {
                if ($password1 === $password2) {
                    if ($adresse2 !== 0) {
                        $sqlInsert = "INSERT INTO acheteur (Nom, Prenom, Email, Adresse1, Adresse2, CP, Ville, Pays, Telephone,
                        TypeCarte, NumeroCarte, NomTitulaire, Expiration, CVC, Password)
                        VALUES ('$nom', '$prenom', '$email', '$adresse1', '$adresse2', '$cp', '$ville', '$pays', '$tel', '$typeCarte',
                        '$numeroCarte', '$titulaire', '$expiration', '$cvc', '$password1')";
                    } else {
                        $sqlInsert = "INSERT INTO acheteur (Nom, Prenom, Email, Adresse1, CP, Ville, Pays, Telephone,
                        TypeCarte, NumeroCarte, NomTitulaire, Expiration, CVC, Password)
                        VALUES ('$nom', '$prenom', '$email', '$adresse1', '$cp', '$ville', '$pays', '$tel', '$typeCarte',
                        '$numeroCarte', '$titulaire', '$expiration', '$cvc', '$password1')";
                    }
                    $result = mysqli_query($db_handle, $sqlInsert);
                    header('Location: acces_acheteur.php');
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