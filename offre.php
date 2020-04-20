<!DOCTYPE html>
<html>

    <?php include 'includes/head.php'; ?>


    <body>
        <?php include 'includes/header.php';

        $database = "ebay_ece";

        $db_handle = mysqli_connect('127.0.0.1:3308', 'root', '');
        $db_found = mysqli_select_db($db_handle, $database);

        if ($db_found) {
            $id = $_SESSION["id"];
            $job = $_SESSION["job"];

            // Si l'utilisateur est un acheteur
            if($job === "acheteur") {
                // On cherche le nombre d'items en cours pour l'acheteur connecté
                $sqlNbreItems = "SELECT COUNT(DISTINCT IdItem) AS NbreItem FROM offre WHERE IdAcheteur = '$id'"; 
                $result = mysqli_query($db_handle, $sqlNbreItems);
                $nbrItems = mysqli_fetch_assoc($result);

                // Si pas d'item en cours pour l'acheteur connecté
                if ($nbrItems["NbreItem"] === 0) {
                    echo "Vous n'avez pas d'offre en cours.<br>";
                }
                // Si au moins 1 item en cours
                if ($nbrItems["NbreItem"] !== 0) {
                    // On récupère les Id des items
                    $sqlItem = "SELECT DISTINCT IdItem FROM offre WHERE IdAcheteur='$id'";
                    $tousLesItems = mysqli_query($db_handle, $sqlItem);
                    while ($idItems = mysqli_fetch_assoc($tousLesItems)) {
                        $item = $idItems["IdItem"];
                        // Nombre d'offres par item
                        $sqlNbreOffres = "SELECT COUNT(IdOffre) AS NbreOffre FROM offre WHERE IdAcheteur = '$id' AND IdItem = '$item'"; 
                        $result = mysqli_query($db_handle, $sqlNbreOffres);
                        $nbrOffres = mysqli_fetch_assoc($result);
                        
                        $sqlProduit = "SELECT * FROM item WHERE item.IdItem = '$item'"; 
                        $result = mysqli_query($db_handle, $sqlProduit);
                        $produit = mysqli_fetch_assoc($result);
                        ?>

                        <div class="col-sm-9">
                            <div class="well">
                                <span><?php $photo = $produit['Photo1']; echo "<img src='$photo' width='200' align='left'>"; ?></span>
                                <span><h5><?php echo $produit['Nom'] . "<br>"; ?></h5><?php echo $produit['Description'] . "<br>"; ?></span>
                            </div>
                        </div>

                        <?php
                        // Si 1 seule offre en cours pour l'item traité
                        if ($nbrOffres["NbreOffre"] == 1) {
                            $sqlOffre = "SELECT * FROM offre WHERE IdAcheteur = '$id' AND IdItem = '$item'";
                            $result = mysqli_query($db_handle, $sqlOffre);
                            $derniereOffre = mysqli_fetch_assoc($result);
                            ?>
                            <div class="col-sm-9">
                                <div class="well">
                                    <span><?php $prix = number_format($derniereOffre['Proposition'], 2, ',', ' ');
                                    echo "Vous avez soumis une offre pour ce produit : " . $prix . " €" . "<br>";
                                    echo "Le vendeur n'y a pas encore répondu...<br>";
                                    ?></span>
                                </div>
                            </div><br>
                            <?php
                        }
                        // Si au moins 2 offres en cours pour l'item traité
                        if ($nbrOffres["NbreOffre"] >= 2) {
                            // On récupère les Id des offres
                            $sqlIdOffre = "SELECT IdOffre FROM offre WHERE IdAcheteur='$id' AND IdItem = '$item' ORDER BY IdOffre";
                            $result = mysqli_query($db_handle, $sqlIdOffre);
                            while ($idOffres = mysqli_fetch_assoc($result)) {
                                $IdEnCours = $idOffres["IdOffre"];
                                $sqlOffre = "SELECT * FROM offre WHERE IdOffre = '$IdEnCours'";
                                $result = mysqli_query($db_handle, $sqlOffre);
                                $OffreEnCours = mysqli_fetch_assoc($result);
                                ?>
                                <div class="col-sm-9">
                                    <div class="well">
                                        <span><?php $prix = number_format($OffreEnCours['Proposition'], 2, ',', ' ');
                                        echo "Offre refusée : " . $prix . " €";
                                        ?></span>
                                    </div>
                                </div>
                                <?php
                            }
                            // Si la dernière offre vient de l'acheteur
                            // Donc nombre impair d'offres (contre-offres comprises)
                            if ($nbrOffres["NbreOffre"]%2 != 0) {
                                echo "Et voici votre dernière offre :<br>";
                                $sqlIdDerniereOffre = "SELECT MAX(IdOffre) AS IdOffre FROM offre WHERE IdAcheteur='$id' AND IdItem = '$item'";
                                $result = mysqli_query($db_handle, $sqlIdDerniereOffre);
                                $IdEnCours = mysqli_fetch_assoc($result);
                                $offre = $IdEnCours["IdOffre"];
                                $sqlOffre = "SELECT * FROM offre WHERE IdOffre = '$offre'";
                                $result = mysqli_query($db_handle, $sqlOffre);
                                $derniereOffre = mysqli_fetch_assoc($result);
                                ?>
                                <div class="col-sm-9">
                                    <div class="well">
                                        <span><?php $prix = number_format($derniereOffre['Proposition'], 2, ',', ' ');
                                        echo $prix . " €" . "<br>"; echo "Le vendeur n'a pas encore répondu à votre offre...<br>";
                                        ?></span>
                                    </div>
                                </div>
                                <?php
                            }
                            // Si la dernière offre vient du vendeur
                            // Donc nombre pair d'offres (contre-offres comprises)
                            if ($nbrOffres["NbreOffre"]%2 == 0) {
                                $sqlIdDerniereOffre = "SELECT MAX(IdOffre) AS IdOffre FROM offre WHERE IdAcheteur='$id' AND IdItem = '$item'";
                                $result = mysqli_query($db_handle, $sqlIdDerniereOffre);
                                $IdEnCours = mysqli_fetch_assoc($result);
                                $offre = $IdEnCours["IdOffre"];
                                $sqlOffre = "SELECT * FROM offre WHERE IdOffre = '$offre'";
                                $result = mysqli_query($db_handle, $sqlOffre);
                                $derniereOffre = mysqli_fetch_assoc($result);
                                ?>
                                <div class="col-sm-9">
                                    <div class="well">
                                        <span><?php
                                        if ($derniereOffre['Accepte'] === 1) {
                                            echo "Le vendeur a accepté votre offre à ";
                                        }
                                        if ($derniereOffre['Accepte'] === 0) {
                                            echo "Le vendeur a refusé votre offre...<br>Voici sa dernière contre-offre : <br>";
                                        }
                                        $prix = number_format($derniereOffre['Proposition'], 2, ',', ' ');
                                        echo $prix . " €" . "<br>";
                                        ?></span>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        echo "<br><br>";
                    }
                }
            }
            // Si l'utilisateur est un vendeur
            if($job === "vendeur") {
                // On cherche le nombre d'items en cours pour le vendeur connecté
                $sqlVentesOffres = "SELECT COUNT(offre.IdItem) AS NbreItem FROM item, offre WHERE item.IdVendeur = '$id' AND item.IdItem = offre.IdItem
                AND offre.IdAcheteur NOT LIKE '0'";
                $result = mysqli_query($db_handle, $sqlVentesOffres);
                $nbrItems = mysqli_fetch_assoc($result);

                // Si pas d'item en cours pour le vendeur connecté
                if ($nbrItems["NbreItem"] === 0) {
                    echo "Vous n'avez reçu aucune offre.<br>";
                }
                // Si au moins 1 item en cours
                if ($nbrItems["NbreItem"] !== 0) {
                    // On récupère les Id des items et des acheteurs
                    $sqlItem = "SELECT DISTINCT offre.IdItem, offre.IdAcheteur FROM item, offre WHERE item.IdVendeur = '$id'
                    AND item.IdItem = offre.IdItem AND offre.IdAcheteur NOT LIKE '0'";
                    $tousLesItems = mysqli_query($db_handle, $sqlItem);
                    while ($idItems = mysqli_fetch_assoc($tousLesItems)) {
                        $item = $idItems["IdItem"];
                        $acheteur = $idItems["IdAcheteur"];
                        // Nombre d'offres par item et par acheteur
                        $sqlNbreOffres = "SELECT COUNT(offre.IdOffre) AS NbreOffre FROM item, offre WHERE item.IdVendeur = '$id'
                        AND offre.IdAcheteur='$acheteur' AND item.IdItem = offre.IdItem AND offre.IdAcheteur NOT LIKE '0'
                        AND offre.IdItem='$item'"; 
                        $result = mysqli_query($db_handle, $sqlNbreOffres);
                        $nbrOffres = mysqli_fetch_assoc($result);
                        
                        $sqlProduit = "SELECT * FROM item WHERE item.IdItem = '$item'"; 
                        $result = mysqli_query($db_handle, $sqlProduit);
                        $produit = mysqli_fetch_assoc($result);
                        ?>

                        <div class="col-sm-9">
                            <div class="well">
                                <span><?php $photo = $produit['Photo1']; echo "<img src='$photo' width='200' align='left'>"; ?></span>
                                <span><h5><?php echo $produit['Nom'] . "<br>"; ?></h5><?php echo $produit['Description'] . "<br>"; ?></span>
                            </div>
                        </div>

                        <?php
                        // Si 1 seule offre en cours pour l'item traité
                        if ($nbrOffres["NbreOffre"] == 1) {
                            $sqlOffre = "SELECT offre.Proposition FROM item, offre WHERE item.IdVendeur = '$id'
                            AND offre.IdAcheteur='$acheteur' AND item.IdItem = offre.IdItem AND offre.IdAcheteur NOT LIKE '0'
                            AND offre.IdItem='$item'";
                            $result = mysqli_query($db_handle, $sqlOffre);
                            $derniereOffre = mysqli_fetch_assoc($result);
                            ?>
                            <div class="col-sm-9">
                                <div class="well">
                                    <span><?php $prix = number_format($derniereOffre['Proposition'], 2, ',', ' ');
                                    echo "Vous avez recu une offre du client N°" . $acheteur . " : " . $prix . " €" . "<br>";
                                    ?></span>
                                </div>
                            </div><br>
                            <?php
                        }
                        // Si au moins 2 offres en cours pour l'item traité
                        if ($nbrOffres["NbreOffre"] >= 2) {
                            // On récupère les Id des offres
                            $sqlIdOffre = "SELECT offre.IdOffre FROM offre, item WHERE item.IdVendeur = '$id'
                            AND offre.IdAcheteur='$acheteur' AND item.IdItem = offre.IdItem AND offre.IdAcheteur NOT LIKE '0'
                            AND offre.IdItem='$item' ORDER BY offre.IdOffre";
                            $result = mysqli_query($db_handle, $sqlIdOffre);
                            while ($idOffres = mysqli_fetch_assoc($result)) {
                                $IdEnCours = $idOffres["IdOffre"];
                                $sqlOffre = "SELECT * FROM offre WHERE IdOffre = '$IdEnCours'";
                                $result = mysqli_query($db_handle, $sqlOffre);
                                $OffreEnCours = mysqli_fetch_assoc($result);
                                ?>
                                <div class="col-sm-9">
                                    <div class="well">
                                        <span><?php $prix = number_format($OffreEnCours['Proposition'], 2, ',', ' ');
                                        echo "Offre refusée : " . $prix . " €";
                                        ?></span>
                                    </div>
                                </div>
                                <?php
                            }
                            // Si la dernière offre vient de l'acheteur
                            // Donc nombre impair d'offres (contre-offres comprises)
                            if ($nbrOffres["NbreOffre"]%2 != 0) {
                                $sqlIdDerniereOffre = "SELECT MAX(offre.IdOffre) AS IdOffre FROM offre, item WHERE item.IdVendeur = '$id'
                                AND offre.IdAcheteur='$acheteur' AND item.IdItem = offre.IdItem AND offre.IdAcheteur NOT LIKE '0'
                                AND offre.IdItem='$item'";
                                $result = mysqli_query($db_handle, $sqlIdDerniereOffre);
                                $IdEnCours = mysqli_fetch_assoc($result);
                                $offre = $IdEnCours["IdOffre"];
                                $sqlOffre = "SELECT * FROM offre WHERE IdOffre = '$offre'";
                                $result = mysqli_query($db_handle, $sqlOffre);
                                $derniereOffre = mysqli_fetch_assoc($result);
                                ?>
                                <div class="col-sm-9">
                                    <div class="well">
                                    <span><?php
                                    if ($derniereOffre['Accepte'] === 1) {
                                        echo "Le client N°" . $acheteur . " a accepté votre offre à : ";
                                    }
                                    if ($derniereOffre['Accepte'] === 0) {
                                        echo "Le client a refusé votre offre...<br>Voici sa dernière contre-offre : <br>";
                                    }
                                    $prix = number_format($derniereOffre['Proposition'], 2, ',', ' ');
                                    echo $prix . " €" . "<br>";
                                    ?></span>
                                    </div>
                                </div>
                                <?php
                            }
                            // Si la dernière offre vient du vendeur
                            // Donc nombre pair d'offres (contre-offres comprises)
                            if ($nbrOffres["NbreOffre"]%2 == 0) {
                                $sqlIdDerniereOffre = "SELECT MAX(IdOffre) AS IdOffre FROM offre ,item WHERE item.IdVendeur = '$id'
                                AND offre.IdAcheteur='$acheteur' AND item.IdItem = offre.IdItem AND offre.IdAcheteur NOT LIKE '0'
                                AND offre.IdItem='$item'";
                                $result = mysqli_query($db_handle, $sqlIdDerniereOffre);
                                $IdEnCours = mysqli_fetch_assoc($result);
                                $offre = $IdEnCours["IdOffre"];
                                $sqlOffre = "SELECT * FROM offre WHERE IdOffre = '$offre'";
                                $result = mysqli_query($db_handle, $sqlOffre);
                                $derniereOffre = mysqli_fetch_assoc($result);
                                ?>
                                <div class="col-sm-9">
                                    <div class="well">
                                        <span><?php $prix = number_format($derniereOffre['Proposition'], 2, ',', ' ');
                                        echo "Vous avez soumis une contre-offre pour ce produit : " . $prix . " €" . "<br>";
                                        echo "Le client n'y a pas encore répondu...<br>";
                                        ?></span>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        echo "<br><br>";
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