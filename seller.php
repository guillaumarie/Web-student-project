<?php
    $email = isset($_POST["email"])? $_POST["email"] : "";
    $pseudo = isset($_POST["pseudo"])? $_POST["pseudo"] : "";

    if($email || $pseudo) {
        $database = "test_projet";

        $db_handle = mysqli_connect('127.0.0.1:3308', 'root', '');
        $db_found = mysqli_select_db($db_handle, $database);

        if ($db_found) {
            if (isset($_POST["button1"])) {
                $sql = "SELECT * FROM vendeur WHERE Email LIKE '$email' AND Pseudo LIKE '$pseudo'"; 
                
                $result = mysqli_query($db_handle, $sql);

                if (mysqli_num_rows($result) === 0) {
                    echo "Ce compte vendeur n'existe pas.<br>";
                } else {
                    while ($data = mysqli_fetch_assoc($result)) {
                        echo "Informations sur le vendeur connecté :" . "<br>";
                        echo "ID Vendeur : " . $data['IdVendeur'] . "<br>";
                        echo "Email : " . $data['Email'] . "<br>";
                        echo "Pseudo : " . $data['Pseudo'] . "<br>";
                        echo "<br>";
                    }
                }
            }

            if (isset($_POST["button2"])) {
                $sql = "SELECT * FROM vendeur WHERE Email LIKE '$email'";

                $result = mysqli_query($db_handle, $sql);

                if (mysqli_num_rows($result) !== 0) {
                    echo "Cet email est déjà utilisé par un vendeur.<br>";
                } else {
                    $sqlInsert = "INSERT INTO vendeur (Email, Pseudo) VALUES ('$email', '$pseudo')";

                    $result = mysqli_query($db_handle, $sqlInsert);
                    echo "Votre compte vendeur a été créé." . "<br>";

                    $result = mysqli_query($db_handle, $sql);

                    while ($data = mysqli_fetch_assoc($result)) {
                    echo "Informations sur le nouveau vendeur :" . "<br>";
                    echo "ID Vendeur : " . $data['IdVendeur'] . "<br>";
                    echo "Email : " . $data['Email'] . "<br>";
                    echo "Pseudo : " . $data['Pseudo'] . "<br>";
                    echo "<br>";
                    }
                }
            }
        } else {
            echo "Database not found";
        }
        //fermer la connexion
        mysqli_close($db_handle);
    } else {
        echo "Empty fields";
    }
?>