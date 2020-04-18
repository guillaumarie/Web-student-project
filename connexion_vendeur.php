<?php

session_start();

    $_SESSION["job"] = 'vendeur';
   
    $email = isset($_POST["email"])? $_POST["email"] : "";
    $password = isset($_POST["password"])? $_POST["password"] : "";

    if($email && $password) {
        $database = "ebay_ece";

        $db_handle = mysqli_connect('127.0.0.1:3306', 'root', 'root');
        $db_found = mysqli_select_db($db_handle, $database);

        if ($db_found) {
            $sql = "SELECT * FROM vendeur WHERE Email LIKE '$email'"; 
            $result = mysqli_query($db_handle, $sql);

            if (mysqli_num_rows($result) === 0) {
                echo "Ce compte vendeur n'existe pas.<br>";
            } else {
                $sql .= " AND Password LIKE '$password'";
                $result = mysqli_query($db_handle, $sql);

                if (mysqli_num_rows($result) === 0) {
                    echo "Votre mot de passe est incorrect.<br>";
                } else {
                    $data = mysqli_fetch_assoc($result);
                    $_SESSION["connected"] = 2 ;
                    $_SESSION["prenom"] = $data["Prenom"];
                    $_SESSION["id"] = $data["IdVendeur"];
                }
            }
        } else {
            echo "Database not found.<br>";
        }
        mysqli_close($db_handle);
        header('Location: accueil.php');
    } else {
        echo "Veuillez remplir tous les champs.<br>";
    }
?>