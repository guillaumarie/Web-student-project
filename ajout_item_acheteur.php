<?php
    $idItem = isset($_POST["idItem"])? $_POST["idItem"] : "";
    $idAcheteur = isset($_POST["idAcheteur"])? $_POST["idAcheteur"] : "";
    $prix = isset($_POST["prix"])? $_POST["prix"] : "";

    if($idItem && $idAcheteur) {
        $database = "ebay_ece";

        $db_handle = mysqli_connect('127.0.0.1:3308', 'root', '');
        $db_found = mysqli_select_db($db_handle, $database);

        if ($db_found) {
            if (isset($_POST["button1"])) {    // Si achat immédiat
                $sqlInsert = "INSERT INTO panier (IdAcheteur, IdItem) VALUES ($idAcheteur, $idItem)";
                $result = mysqli_query($db_handle, $sqlInsert);
                header('Location: fiche_article.php?id='.$idItem.'');
            }
            if (isset($_POST["button2"])) {    // Si offre
                if ($prix) {
                    $sqlInsert = "INSERT INTO offre (IdItem, IdAcheteur, Proposition) VALUES ($idItem, $idAcheteur, $prix)";
                    $result = mysqli_query($db_handle, $sqlInsert);
                    header('Location: fiche_article.php?id='.$idItem.'');
                }
                else {echo "Veuillez renseigner une offre.<br>";}
            }
            if (isset($_POST["button3"])) {    // Si enchère
                if ($prix) {
                    $sqlEnchere = "SELECT Plafond, Debut, Fin FROM enchere WHERE IdItem LIKE '$idItem' AND IdAcheteur LIKE '0'";
                    $resultEnchere = mysqli_query($db_handle, $sqlEnchere);
                    $Enchere = mysqli_fetch_assoc($resultEnchere);
                    $debut = $Enchere["Debut"];
                    $fin = $Enchere["Fin"];

                    $sqlPlafondMax = "SELECT MAX(Plafond) AS PlafondMax FROM enchere WHERE IdItem LIKE '$idItem'";
                    $resultPlafondMax = mysqli_query($db_handle, $sqlPlafondMax);
                    $PlafondMax = mysqli_fetch_assoc($resultPlafondMax);

                    $sqlInsert = "INSERT INTO enchere (IdItem, IdAcheteur, Plafond, Debut, Fin)
                    VALUES ('$idItem', '$idAcheteur', '$prix', '$debut', '$fin')";
                    $result = mysqli_query($db_handle, $sqlInsert);

                    $sqlNbreEnchere = "SELECT COUNT(IdItem) AS NbreEncheres FROM enchere WHERE IdItem LIKE '$idItem' AND IdAcheteur NOT LIKE '0'";
                    $resultNbreEnchere = mysqli_query($db_handle, $sqlNbreEnchere);
                    $NbreEnchere = mysqli_fetch_assoc($resultNbreEnchere);
                    if ($NbreEnchere["NbreEncheres"] != 1) {  // Si déjà une enchère
                        if ($prix >= $Enchere["Plafond"]) {
                            if ($prix > $PlafondMax["PlafondMax"]) {
                                $nouveauPrix = $PlafondMax["PlafondMax"] + 1;
                            }
                            else {
                                $nouveauPrix = $prix + 1;
                            }
                            $sqlNouveauPrix = "UPDATE enchere SET Plafond = '$nouveauPrix' WHERE IdItem LIKE '$idItem' AND IdAcheteur LIKE '0'";
                            $resultNouveauPrix = mysqli_query($db_handle, $sqlNouveauPrix);
                        }
                    }
                    else {  // Si première enchère
                        if ($prix >= $Enchere["Plafond"]) {
                            $nouveauPrix = $PlafondMax["PlafondMax"] + 1;
                            $sqlNouveauPrix = "UPDATE enchere SET Plafond = '$nouveauPrix' WHERE IdItem LIKE '$idItem' AND IdAcheteur LIKE '0'";
                            $resultNouveauPrix = mysqli_query($db_handle, $sqlNouveauPrix);
                        }
                    }
                    header('Location: fiche_article.php?id='.$idItem.'');
                }
                else {echo "Veuillez renseigner une offre.<br>";}
            }
        } else {
            echo "Database not found";
        }
    mysqli_close($db_handle);
    }
?>