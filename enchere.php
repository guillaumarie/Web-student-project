<!DOCTYPE html>
<html>

    <?php include 'includes/head.php'; ?>


    <body>
        <?php include 'includes/header.php';

        $database = "ebay_ece";

        $db_handle = mysqli_connect('127.0.0.1:3308', 'root', '');
        $db_found = mysqli_select_db($db_handle, $database);

        $date = date("Y-m-d");

        if ($db_found) {
            $id = $_SESSION["id"];
            $job = $_SESSION["job"];

            // Si l'utilisateur est un acheteur
            if($job === "acheteur") {
                // On cherche le nombre d'items en cours pour l'acheteur connecté
                $sqlNbreItems = "SELECT COUNT(DISTINCT IdItem) AS NbreItem FROM enchere WHERE IdAcheteur = '$id'"; 
                $result = mysqli_query($db_handle, $sqlNbreItems);
                $nbrItems = mysqli_fetch_assoc($result);

                // Si pas d'item en cours pour l'acheteur connecté
                if ($nbrItems["NbreItem"] === 0) {
                    echo "Vous n'avez pas d'enchère en cours.<br>";
                }
                // Si au moins 1 item en cours
                if ($nbrItems["NbreItem"] !== 0) {
                    // On récupère les Id des items
                    $sqlItem = "SELECT IdItem FROM enchere WHERE IdAcheteur='$id'";
                    $tousLesItems = mysqli_query($db_handle, $sqlItem);
                    while ($idItems = mysqli_fetch_assoc($tousLesItems)) {
                        $item = $idItems["IdItem"];
                        $sqlProduit = "SELECT * FROM item WHERE item.IdItem = '$item'"; 
                        $resultProduit = mysqli_query($db_handle, $sqlProduit);
                        $produit = mysqli_fetch_assoc($resultProduit);
                        ?>

                        <div class="d-flex justify-content-center">
                            <div class="well">
                            <span><h2 align="center"><?php echo $produit['Nom'] . "<br>" ; ?></h2><p align="center"><?php echo $produit['Description'] . "<br><br>"; ?></p></span>
                                <span><?php $photo = $produit['Photo1']; echo "<img src='$photo' style=\"max-height:300px\">"; ?><br></span>
                            </div>
                        </div>

                        <?php
                        $sqlEnchere = "SELECT * FROM enchere WHERE IdAcheteur = '$id' AND IdItem = '$item'";
                        $resultEnchere = mysqli_query($db_handle, $sqlEnchere);
                        $enchere = mysqli_fetch_assoc($resultEnchere);

                        $sqlEnchereActuelle = "SELECT * FROM enchere WHERE IdAcheteur = '0' AND IdItem = '$item'";
                        $resultEnchereActuelle = mysqli_query($db_handle, $sqlEnchereActuelle);
                        $enchereActuelle = mysqli_fetch_assoc($resultEnchereActuelle);

                        $prix = number_format($enchere['Plafond'], 2, ',', ' ');
                        $prixgagnant = number_format($enchereActuelle['Plafond'], 2, ',', ' ');
                        
                        ?>
                        <div class="d-flex justify-content-center">
                            <div class="well"><span><br>
                            <?php
                            if ($enchereActuelle["Fin"] > $date) { // Enchères en cours
                                if ($enchere["Plafond"] >= $enchereActuelle["Plafond"]) {       // Si le client à pour l'instant la plus forte enchère
                                    echo "Votre plafond d'enchère pour cet article fixé à " . $prix . " € n'a pour l'instant pas été dépassé.<br>
                                    Les enchères sont toujours en cours...<br>";
                                }
                                if ($enchere["Plafond"] < $enchereActuelle["Plafond"]) {
                                    echo "Votre plafond d'enchère pour cet article fixé à " . $prix . " € a été dépassé.<br>
                                    Vous ne remporterez malheuereusement pas cette vente...<br>";
                                }
                            }
                            if ($enchereActuelle["Fin"] <= $date) {   // Enchères terminées
                                if ($enchere["Plafond"] >= $enchereActuelle["Plafond"]) {
                                    echo "Les enchères sont terminées pour cet article et vous remportez la vente !<br>
                                    Vous pouvez valider l'achat à " . $prixgagnant . " €.<br>";
                                }
                                if ($enchere["Plafond"] < $enchereActuelle["Plafond"]) {
                                    echo "Les enchères sont terminées pour cet article, mais vous ne remportez malheureusement pas la vente...<br>";
                                }
                            }
                            ?>
                            </span>
                            </div>
                        </div><br><br><br>
                        <?php
                    }
                }
            }

            // Si l'utilisateur est un vendeur
            if($job === "vendeur") {
                // On cherche le nombre d'items en cours pour le vendeur connecté
                $sqlNbreItems = "SELECT COUNT(DISTINCT enchere.IdItem) AS NbreItem FROM item, enchere WHERE item.IdVendeur = '$id'
                AND item.IdItem = enchere.IdItem AND enchere.IdAcheteur NOT LIKE '0'";
                $result = mysqli_query($db_handle, $sqlNbreItems);
                $nbrItems = mysqli_fetch_assoc($result);

                // Si pas d'item en cours pour le vendeur connecté
                if ($nbrItems["NbreItem"] === 0) {
                    echo "Vous n'avez pas reçu d'enchères sur vos ventes.<br>";
                }
                // Si au moins 1 item en cours
                if ($nbrItems["NbreItem"] !== 0) {
                    // On récupère les Id des items
                    $sqlItem = "SELECT DISTINCT enchere.IdItem FROM item, enchere WHERE item.IdVendeur = '$id'
                    AND item.IdItem = enchere.IdItem AND enchere.IdAcheteur NOT LIKE '0'";
                    $tousLesItems = mysqli_query($db_handle, $sqlItem);
                    while ($idItems = mysqli_fetch_assoc($tousLesItems)) {
                        $item = $idItems["IdItem"];
                        $sqlProduit = "SELECT * FROM item WHERE item.IdItem = '$item'"; 
                        $resultProduit = mysqli_query($db_handle, $sqlProduit);
                        $produit = mysqli_fetch_assoc($resultProduit);
                        ?>

                        <div class="col-sm-9">
                            <div class="well">
                                <span><?php $photo = $produit['Photo1']; echo "<img src='$photo' width='200' align='left'>"; ?></span>
                                <span><h5><?php echo $produit['Nom'] . "<br>"; ?></h5><?php echo $produit['Description'] . "<br>"; ?></span>
                            </div>
                        </div>

                        <?php
                        $plafondItem = 0;
                        $acheteur = 0;
                        $sqlIdEnchere = "SELECT IdAcheteur, Plafond FROM enchere WHERE IdAcheteur NOT LIKE '0' AND IdItem='$item'";
                        $resultIdEnchere = mysqli_query($db_handle, $sqlIdEnchere);
                        while ($enchere = mysqli_fetch_assoc($resultIdEnchere)) {
                            if ($enchere["Plafond"] > $plafondItem)
                            {
                                $acheteur = $enchere["IdAcheteur"];
                            }
                        }

                        $sqlEnchereActuelle = "SELECT * FROM enchere WHERE IdAcheteur = '0' AND IdItem = '$item'";
                        $resultEnchereActuelle = mysqli_query($db_handle, $sqlEnchereActuelle);
                        $enchereActuelle = mysqli_fetch_assoc($resultEnchereActuelle);

                        $prixgagnant = number_format($enchereActuelle['Plafond'], 2, ',', ' ');
                        ?>
                        <div class="col-sm-9">
                            <div class="well"><span>
                            <?php
                            if ($enchereActuelle["Fin"] > $date) { // Enchères en cours
                                echo "Les enchères pour votre article sont montées à " . $prixgagnant . " € pour l'instant.<br>
                                Les enchères sont toujours en cours...<br>";
                            }
                            if ($enchereActuelle["Fin"] <= $date) {   // Enchères terminées
                                echo "Les enchères sont terminées pour cet article.<br>
                                Elles ont été remportées par le client N°" . $acheteur . " pour un montant de " . $prixgagnant . " € !<br>";
                            }
                            ?>
                            </span>
                            </div>
                        </div><br><br><br>
                        <?php
                    }
                }
            }
        } else {
            echo "Database not found.<br>";
        }
        mysqli_close($db_handle);
        ?>

        <br></br>

        <?php include 'includes/footer.php'; ?>

    </body>

</html>