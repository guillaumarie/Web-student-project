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

$date = date("Y-m-d");


if ($TypeCarte && $NumeroCarte && $NomTitulaire && $Expiration && $CVC) {


    include 'includes/bdd.php';

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

                                // inccrémentation de numéro commande
                                $NumeroCommande = 0;
                                $valeur = 0;
                                $retour = mysqli_query($db_handle, 'SELECT MAX(NumeroCommande) AS nbMax FROM achat');
                                $valeur = mysqli_fetch_assoc($retour);
                                echo 'La valeur max est : ' . $valeur['nbMax'];
                                $NumeroCommande = $valeur['nbMax'] + 1;
                                $_SESSION["item"] = $NumeroCommande;

                                $sql1 = "SELECT IdAcheteur FROM panier ";
                                $result1 = mysqli_query($db_handle, $sql1);

                                while ($data = mysqli_fetch_assoc($result1)) {
                                    
                                    $sql = "SELECT IdItem FROM panier ";
                                    $result = mysqli_query($db_handle, $sql);

                                    while ($data = mysqli_fetch_assoc($result)) {
                                        $idItem = $data["IdItem"];
                                        if ($idItem) {
                                            $sql = "SELECT IdItem, IdVendeur, Nom, Prix, Categorie, TypeAchat FROM item WHERE IdItem LIKE '$idItem'";
                                            $result = mysqli_query($db_handle, $sql);
                                            while ($data = mysqli_fetch_assoc($result)) {
                                                $idAcheteur = $_SESSION["id"];
                                                echo $idAcheteur;
                                                $idVendeur = $data["IdVendeur"];
                                                echo $idVendeur;
                                                $prix = $data["Prix"];
                                                echo $prix;
                                                $typeAchat = $data["TypeAchat"];
                                                echo $typeAchat;
                                                $sqlInsert = "INSERT INTO achat (NumeroCommande, IdItem, IdAcheteur, IdVendeur, DateVente, Prix, TypeAchat)
                                                VALUES ('$NumeroCommande', '$idItem', '$idAcheteur', '$idVendeur', '$date', '$prix', '$typeAchat')";
                                                $resultInsert = mysqli_query($db_handle, $sqlInsert);

                                                

                                                if ($typeAchat == "immediat_offre" || $typeAchat == "offre") {
                                                    $sqlDelete = "DELETE FROM offre WHERE IdItem LIKE '$idItem'";
                                                    $resultDelete = mysqli_query($db_handle, $sqlDelete);
                                                }
                                                if ($typeAchat == "enchere") {
                                                    $sqlDelete = "DELETE FROM enchere WHERE IdItem LIKE '$idItem'";
                                                    $resultDelete = mysqli_query($db_handle, $sqlDelete);
                                                }
                                                $sqlDelete = "DELETE FROM item WHERE IdItem LIKE '$idItem'";
                                                $resultDelete = mysqli_query($db_handle, $sqlDelete);
                                                $sqlDelete = "DELETE FROM panier WHERE IdItem LIKE '$idItem'";
                                                $resultDelete = mysqli_query($db_handle, $sqlDelete);
                                            }
                                        }
                                    }
                                }


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
} else {
    echo "Veuillez remplir tous les champs.<br>";
}
