<?php
    $email = isset($_POST["email"])? $_POST["email"] : "";
    $password = isset($_POST["password"])? $_POST["password"] : "";

    if($email && $password) {
        $database = "ebay_ece";

        $db_handle = mysqli_connect('127.0.0.1:3308', 'root', '');
        $db_found = mysqli_select_db($db_handle, $database);

        if ($db_found) {
            $sql = "SELECT * FROM acheteur WHERE Email LIKE '$email'"; 
            $result = mysqli_query($db_handle, $sql);

            if (mysqli_num_rows($result) === 0) {
                echo "Ce compte client n'existe pas.<br>";
            } else {
                $sql .= " AND Password LIKE '$password'";
                $result = mysqli_query($db_handle, $sql);

                if (mysqli_num_rows($result) === 0) {
                    echo "Votre mot de passe est incorrect.<br>";
                } else {
                    while ($data = mysqli_fetch_assoc($result)) {
                        echo "Informations sur le client connecté :" . "<br>";
                        echo "ID Client : " . $data['IdAcheteur'] . "<br>";
                        echo "Nom : " . $data['Nom'] . "<br>";
                        echo "Prenom : " . $data['Prenom'] . "<br>";
                        echo "Email : " . $data['Email'] . "<br>";
                        echo "<br>";
                    }
                }
            }
        } else {
            echo "Database not found.<br>";
        }
        //fermer la connexion
        mysqli_close($db_handle);
    } else {
        echo "Veuillez remplir tous les champs.<br>";
    }
?>