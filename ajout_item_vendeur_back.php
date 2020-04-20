<?php
    session_start();
    $_SESSION["id"] = isset($_SESSION["id"]) ? $_SESSION["id"] : "";
    $id = $_SESSION["id"];
    
    $categorie = isset($_POST["categorie"])? $_POST["categorie"] : "";
    $nom = isset($_POST["nom"])? $_POST["nom"] : "";
    $description2 = isset($_POST["description"])? $_POST["description"] : "";
    $description = str_replace("'", "''", "$description2"); // Pour accepter les apostrophes
    $photo1 = "images/item/";
    $photo1 .= isset($_POST["photo1"])? $_POST["photo1"] : "";
    $photo2 = "images/item/";
    $photo2 .= isset($_POST["photo2"])? $_POST["photo2"] : "";
    $photo3 = "images/item/";
    $photo3 .= isset($_POST["photo3"])? $_POST["photo3"] : "";
    $photo4 = "images/item/";
    $photo4 .= isset($_POST["photo4"])? $_POST["photo4"] : "";
    $photo5 = "images/item/";
    $photo5 .= isset($_POST["photo5"])? $_POST["photo5"] : "";
    $video = "images/item/";
    $video .= isset($_POST["video"])? $_POST["video"] : "";
    $prix = isset($_POST["prix"])? $_POST["prix"] : "";
    $typeAchat = isset($_POST["typeAchat"])? $_POST["typeAchat"] : "";
    $debut = isset($_POST["debut"])? $_POST["debut"] : "";
    $fin = isset($_POST["fin"])? $_POST["fin"] : "";

    if($categorie && $nom && $description && $photo1 && $prix && $typeAchat) {

        $database = "ebay_ece";
        $db_handle = mysqli_connect('127.0.0.1:3308', 'root', '');
        $db_found = mysqli_select_db($db_handle, $database);
        
        if ($db_found) {
            // Si Achat Immédiat
            if ($typeAchat === "immediat") {
                $sqlInsert = "INSERT INTO item (IdVendeur, Nom, Photo1, Description, Prix, Categorie, TypeAchat)
                VALUES ('$id', '$nom', '$photo1', '$description', '$prix', '$categorie', '$typeAchat')";
                $result = mysqli_query($db_handle, $sqlInsert);

                $sql = "SELECT * FROM item ORDER BY IdItem DESC LIMIT 1";
                $result = mysqli_query($db_handle, $sql);
                $data = mysqli_fetch_assoc($result);
                $iditem = $data['IdItem'];

                if ($photo2 !== "images/item/") {
                    $sqlInsert = "UPDATE item SET Photo2 = '$photo2' WHERE IdItem LIKE '$iditem'";
                    $result = mysqli_query($db_handle, $sqlInsert);
                }
                if ($photo3 !== "images/item/") {
                    $sqlInsert = "UPDATE item SET Photo3 = '$photo3' WHERE IdItem LIKE '$iditem'";
                    $result = mysqli_query($db_handle, $sqlInsert);
                }
                if ($photo4 !== "images/item/") {
                    $sqlInsert = "UPDATE item SET Photo4 = '$photo4' WHERE IdItem LIKE '$iditem'";
                    $result = mysqli_query($db_handle, $sqlInsert);
                }
                if ($photo5 !== "images/item/") {
                    $sqlInsert = "UPDATE item SET Photo5 = '$photo5' WHERE IdItem LIKE '$iditem'";
                    $result = mysqli_query($db_handle, $sqlInsert);
                }
                if ($video !== "images/item/") {
                    $sqlInsert = "UPDATE item SET Video = '$video' WHERE IdItem LIKE '$iditem'";
                    $result = mysqli_query($db_handle, $sqlInsert);
                }
                header('Location: espace_vendeur.php');
            }

            // Si Meilleure Offre OU Achat Immediat et Meilleure Offre
            if ($typeAchat === "offre" || $typeAchat === "immediat_offre") {
                $sqlInsert = "INSERT INTO item (IdVendeur, Nom, Photo1, Description, Prix, Categorie, TypeAchat)
                VALUES ('$id', '$nom', '$photo1', '$description', '$prix', '$categorie', '$typeAchat')";
                $result = mysqli_query($db_handle, $sqlInsert);

                $sql = "SELECT * FROM item ORDER BY IdItem DESC LIMIT 1";
                $result = mysqli_query($db_handle, $sql);
                $data = mysqli_fetch_assoc($result);
                $iditem = $data['IdItem'];
                $prix = $data['Prix'];

                if ($photo2 !== "images/item/") {
                    $sqlInsert = "UPDATE item SET Photo2 = '$photo2' WHERE IdItem LIKE '$iditem'";
                    $result = mysqli_query($db_handle, $sqlInsert);
                }
                if ($photo3 !== "images/item/") {
                    $sqlInsert = "UPDATE item SET Photo3 = '$photo3' WHERE IdItem LIKE '$iditem'";
                    $result = mysqli_query($db_handle, $sqlInsert);
                }
                if ($photo4 !== "images/item/") {
                    $sqlInsert = "UPDATE item SET Photo4 = '$photo4' WHERE IdItem LIKE '$iditem'";
                    $result = mysqli_query($db_handle, $sqlInsert);
                }
                if ($photo5 !== "images/item/") {
                    $sqlInsert = "UPDATE item SET Photo5 = '$photo5' WHERE IdItem LIKE '$iditem'";
                    $result = mysqli_query($db_handle, $sqlInsert);
                }
                if ($video !== "images/item/") {
                    $sqlInsert = "UPDATE item SET Video = '$video' WHERE IdItem LIKE '$iditem'";
                    $result = mysqli_query($db_handle, $sqlInsert);
                }

                $sqlInsert = "INSERT INTO offre (IdItem, Proposition) VALUES ('$iditem', '$prix')";
                $result = mysqli_query($db_handle, $sqlInsert);
                header('Location: espace_vendeur.php');
            }

            // Si Enchères
            if ($typeAchat === "enchere" && $debut !== "" && $fin !== "") {
                $sqlInsert = "INSERT INTO item (IdVendeur, Nom, Photo1, Description, Prix, Categorie, TypeAchat)
                VALUES ('$id', '$nom', '$photo1', '$description', '$prix', '$categorie', '$typeAchat')";
                $result = mysqli_query($db_handle, $sqlInsert);

                $sql = "SELECT * FROM item ORDER BY IdItem DESC LIMIT 1";
                $result = mysqli_query($db_handle, $sql);
                $data = mysqli_fetch_assoc($result);
                $iditem = $data['IdItem'];
                $prix = $data['Prix'];
                
                if ($photo2 !== "images/item/") {
                    $sqlInsert = "UPDATE item SET Photo2 = '$photo2' WHERE IdItem LIKE '$iditem'";
                    $result = mysqli_query($db_handle, $sqlInsert);
                }
                if ($photo3 !== "images/item/") {
                    $sqlInsert = "UPDATE item SET Photo3 = '$photo3' WHERE IdItem LIKE '$iditem'";
                    $result = mysqli_query($db_handle, $sqlInsert);
                }
                if ($photo4 !== "images/item/") {
                    $sqlInsert = "UPDATE item SET Photo4 = '$photo4' WHERE IdItem LIKE '$iditem'";
                    $result = mysqli_query($db_handle, $sqlInsert);
                }
                if ($photo5 !== "images/item/") {
                    $sqlInsert = "UPDATE item SET Photo5 = '$photo5' WHERE IdItem LIKE '$iditem'";
                    $result = mysqli_query($db_handle, $sqlInsert);
                }
                if ($video !== "images/item/") {
                    $sqlInsert = "UPDATE item SET Video = '$video' WHERE IdItem LIKE '$iditem'";
                    $result = mysqli_query($db_handle, $sqlInsert);
                }
                
                $sqlInsert = "INSERT INTO enchere (IdItem, Plafond, Debut, Fin) VALUES ('$iditem', '$prix', '$debut', '$fin')";
                $result = mysqli_query($db_handle, $sqlInsert);
                header('Location: espace_vendeur.php');
            }

            if ($typeAchat === "enchere" && ($debut === "" || $fin === "")) {
                echo "Veuillez rentrer les dates d'enchères.<br>";
            }
            mysqli_close($db_handle);
        }
        else {
            echo "Database not found";
        }
    } else {
        echo "Empty fields.<br>";
    }
?>