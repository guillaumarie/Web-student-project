<?php
session_start();

$id = $_SESSION["id"];

$TypeCarte = isset($_POST["TypeCarte"]) ? $_POST["TypeCarte"] : "";
$NumeroCarte = isset($_POST["NumeroCarte"]) ? $_POST["NumeroCarte"] : "";
$NomTitulaire = isset($_POST["NomTitulaire"]) ? $_POST["NomTitulaire"] : "";
$Expiration = isset($_POST["Expiration"]) ? $_POST["Expiration"] : "";
$CVC = isset($_POST["CVC"]) ? $_POST["CVC"] : "";

echo $TypeCarte;
echo $NumeroCarte;
echo $NomTitulaire;
echo $Expiration;
echo $CVC;



if ($TypeCarte && $NumeroCarte && $NomTitulaire && $Expiration && $CVC) {

echo 'ici';

    $database = "ebay_ece";

    $db_handle = mysqli_connect('127.0.0.1:3308', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);

    if ($db_found) {
        $sql = "SELECT * FROM acheteur WHERE IdAcheteur LIKE '$id'";
        $result = mysqli_query($db_handle, $sql);

        if (mysqli_num_rows($result) === 0) {
            echo "Ce compte client n'existe pas.<br>";
        } else {
            $sql .= " AND TypeCarte LIKE '$TypeCarte'";
            $result = mysqli_query($db_handle, $sql);

            if (mysqli_num_rows($result) === 0) {
                echo "TypeCarte.<br>";
            } else {
                $sql .= " AND NumeroCarte LIKE '$NumeroCarte'";
                $result = mysqli_query($db_handle, $sql);

                if (mysqli_num_rows($result) === 0) {
                    echo "NumeroCarte.<br>";
                } else {
                    $sql .= " AND NomTitulaire LIKE '$NomTitulaire'";
                    $result = mysqli_query($db_handle, $sql);

                    if (mysqli_num_rows($result) === 0) {
                        echo "NomTitulaire.<br>";
                    } else {
                        $sql .= " AND Expiration LIKE '$Expiration'";
                        $result = mysqli_query($db_handle, $sql);

                        if (mysqli_num_rows($result) === 0) {
                            echo "Expiration.<br>";
                        } else {
                            $sql .= " AND CVC LIKE '$CVC'";
                            $result = mysqli_query($db_handle, $sql);

                            if (mysqli_num_rows($result) === 0) {
                                echo "CVC.<br>";
                            } else {
                                echo 'succeed';
                                header('Location: connexion_mail.php');
                            }
                        }
                    }
                }
            }
        }
    } else {
        echo "Database not found.<br>";
    }
    mysqli_close($db_handle);
    header('Location: connexion_mail.php');
} else {
    echo "Veuillez remplir tous les champs.<br>";
}
