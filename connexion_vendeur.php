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
                    while ($data = mysqli_fetch_assoc($result)) {
                        echo "Informations sur le vendeur connecté :" . "<br>";
                        echo "ID Vendeur : " . $data['IdVendeur'] . "<br>";
                        echo "Nom : " . $data['Nom'] . "<br>";
                        echo "Prenom : " . $data['Prenom'] . "<br>";
                        echo "Email : " . $data['Email'] . "<br>";
                        $photoProfil = $data['PhotoProfil'];
                        echo "<img src='$photoProfil' alt='photo_profil' height='150'><br>";
                        $banniere = $data['ImageFond'];
                        echo "<img src='$banniere' alt='banniere' height='300'><br>";
                        $_SESSION["connected"] = 2 ;
                        $_SESSION["prenom"] = $data["Prenom"]; 
                    }
                }
            }
        } else {
            echo "Database not found.<br>";
        }
        mysqli_close($db_handle);
    } else {
        echo "Veuillez remplir tous les champs.<br>";
    }
?>