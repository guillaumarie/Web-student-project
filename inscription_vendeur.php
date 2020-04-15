<?php
    $nom = isset($_POST["nom"])? $_POST["nom"] : "";
    $prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
    $email = isset($_POST["email"])? $_POST["email"] : "";
    $password1 = isset($_POST["password1"])? $_POST["password1"] : "";
    $password2 = isset($_POST["password2"])? $_POST["password2"] : "";
    $photoProfil = isset($_POST["photoProfil"])? $_POST["photoProfil"] : "";

    if($nom && $prenom && $email && $password1 && $password2) {
        $database = "ebay_ece";

        $db_handle = mysqli_connect('127.0.0.1:3308', 'root', '');
        $db_found = mysqli_select_db($db_handle, $database);

        if ($db_found) {
            $sql = "SELECT * FROM vendeur WHERE Email LIKE '$email'";
            $result = mysqli_query($db_handle, $sql);

            if (mysqli_num_rows($result) !== 0) {
                echo "Cet Email est déjà utilisé par un vendeur.<br>";
            } else {
                if ($password1 === $password2) {
                    $sqlInsert = "INSERT INTO vendeur (Nom, Prenom, Email, Password, PhotoProfil)
                    VALUES ('$nom', '$prenom', '$email', '$password1', '$photoProfil')";

                    $result = mysqli_query($db_handle, $sqlInsert);
                    echo "Votre compte vendeur a été créé." . "<br>";

                    $result = mysqli_query($db_handle, $sql);

                    while ($data = mysqli_fetch_assoc($result)) {
                    echo "Informations sur le nouveau vendeur :" . "<br>";
                    echo "ID Vendeur : " . $data['IdVendeur'] . "<br>";
                    echo "Nom : " . $data['Nom'] . "<br>";
                    echo "Prenom : " . $data['Prenom'] . "<br>";
                    echo "Email : " . $data['Email'] . "<br>";
                    $photoProfil = $data['PhotoProfil'];
                    echo "<img src='img/vendeur/$photoProfil' alt='photo_profil' height='150'>";
                    echo "<br>";
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