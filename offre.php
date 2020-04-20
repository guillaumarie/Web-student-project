<!DOCTYPE html>
<html>

    <?php include 'includes/head.php'; ?>


    <body>
        <?php include 'includes/header.php';

        include 'includes/bdd.php';

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
                        
                        $sqlProduit = "SELECT * FROM item WHERE item.IdItem = '$item'"; 
                        $resultproduit = mysqli_query($db_handle, $sqlProduit);
                        $produit = mysqli_fetch_assoc($resultproduit);
                        ?>

                        <br><br>
                        <div class="d-flex justify-content-center">
                            <div class="well">
                            <span><h2 align="center"><?php echo $produit['Nom'] . "<br>" ; ?></h2><p align="center"><?php echo $produit['Description'] . "<br><br>"; ?></p></span>
                                <span><?php $photo = $produit['Photo1']; echo "<img src='$photo' style=\"max-height:300px\">"; ?><br></span>
                            </div>
                        </div><br>

                        <?php
                        // Nombre d'offres par item
                        $sqlNbreOffres = "SELECT COUNT(IdOffre) AS NbreOffre FROM offre WHERE IdAcheteur = '$id' AND IdItem = '$item'"; 
                        $resultnbrOffres = mysqli_query($db_handle, $sqlNbreOffres);
                        $nbrOffres = mysqli_fetch_assoc($resultnbrOffres);
                        // On récupère les Id des offres
                        $limite = $nbrOffres["NbreOffre"]-1;
                        $vendeur = FALSE;
                        $numeroIdEnCours = 0;
                        $sqlIdOffre = "SELECT IdOffre FROM offre WHERE IdAcheteur='$id' AND IdItem = '$item' ORDER BY IdOffre
                        LIMIT $limite";
                        $resultidOffres = mysqli_query($db_handle, $sqlIdOffre);
                        while ($idOffres = mysqli_fetch_assoc($resultidOffres)) {
                            $numeroIdEnCours++;
                            $vendeur = !$vendeur;
                            $IdEnCours = $idOffres["IdOffre"];
                            $sqlOffre = "SELECT * FROM offre WHERE IdOffre = '$IdEnCours'";
                            $resultOffreEnCours = mysqli_query($db_handle, $sqlOffre);
                            $OffreEnCours = mysqli_fetch_assoc($resultOffreEnCours);

                            // Si on parcourt l'avant-dernière offre
                            if ($numeroIdEnCours == $limite) {
                                // On récupère l'id de la dernière offre
                                $sqlIdOffreSuivante = "SELECT IdOffre FROM offre WHERE IdAcheteur='$id' AND IdItem = '$item' ORDER BY IdOffre
                                LIMIT 1 OFFSET $limite";
                                $resultidOffreSuivante = mysqli_query($db_handle, $sqlIdOffreSuivante);
                                $idOffreSuivante = mysqli_fetch_assoc($resultidOffreSuivante);
                                $IdSuivant = $idOffreSuivante["IdOffre"];
                                // Et donc la dernière offre
                                $sqlOffre = "SELECT * FROM offre WHERE IdOffre = '$IdSuivant'";
                                $resultOffreSuivante = mysqli_query($db_handle, $sqlOffre);
                                $OffreSuivante = mysqli_fetch_assoc($resultOffreSuivante);
                                if ($OffreSuivante['Accepte'] == 0) {
                                    ?>
                                    <div class="d-flex justify-content-center">
                                    <div class="well">
                                        <span><?php $prix = number_format($OffreEnCours['Proposition'], 2, ',', ' ');
                                        echo "Offre refusée ";
                                        if ($vendeur === TRUE) {
                                            echo "par le vendeur : ";
                                        }
                                        if ($vendeur === FALSE) {
                                            echo "par vous-même : ";
                                        }
                                        echo $prix . " €";
                                        ?></span>
                                    </div>
                                    </div>
                                <?php
                                }
                                else {break;} // Si dernière offre acceptée, on ignore l'avant-dernière (qui est le même mais non acceptée)
                            }
                            else {
                                ?>
                                    <div class="d-flex justify-content-center">
                                    <div class="well">
                                        <span><?php $prix = number_format($OffreEnCours['Proposition'], 2, ',', ' ');
                                        echo "Offre refusée ";
                                        if ($vendeur === TRUE) {
                                            echo "par le vendeur : ";
                                        }
                                        if ($vendeur === FALSE) {
                                            echo "par vous-même : ";
                                        }
                                        echo $prix . " €";
                                        ?></span>
                                    </div>
                                    </div>
                                <?php
                            }
                        }
                        // Si la dernière offre vient de l'acheteur
                        // Donc nombre impair d'offres (contre-offres comprises)
                        if ($nbrOffres["NbreOffre"]%2 != 0) {
                            $sqlIdDerniereOffre = "SELECT MAX(IdOffre) AS IdOffre FROM offre WHERE IdAcheteur='$id' AND IdItem = '$item'";
                            $result = mysqli_query($db_handle, $sqlIdDerniereOffre);
                            $IdEnCours = mysqli_fetch_assoc($result);
                            $offre = $IdEnCours["IdOffre"];
                            $sqlOffre = "SELECT * FROM offre WHERE IdOffre = '$offre'";
                            $resultderniereOffre = mysqli_query($db_handle, $sqlOffre);
                            $derniereOffre = mysqli_fetch_assoc($resultderniereOffre);
                            $prix = number_format($derniereOffre['Proposition'], 2, ',', ' ');
                            ?>
                            <div class="d-flex justify-content-center">
                                <div class="well">
                                    <span><?php
                                    if ($derniereOffre['Accepte'] == 1) {
                                        echo "Vous avez accepté la dernière offre du vendeur à : " . $prix . " €" . "<br>";
                                        $sqlVerifPanier = "SELECT IdItem FROM panier WHERE IdAcheteur = '$id' AND IdItem = '$item'";
                                        $resultVerifPanier = mysqli_query($db_handle, $sqlVerifPanier);
                                        if (mysqli_num_rows($resultVerifPanier) === 0) {
                                            ?>
                                            <form action="ajout_item_acheteur.php" method="post">
                                                <div class="well">
                                                    <p><?php echo "<input type='hidden' name='idOffre' value='$offre'>"; ?></p>
                                                </div>
                                                <div>
                                                    <p><input type="submit" name="button1" value="Ajouter l'article au panier">
                                                </div>
                                            </form>
                                            <?php
                                        }
                                        else {
                                            echo "Vous avez déjà ajouté cet article au panier.<br>";
                                        }
                                    }
                                    if ($derniereOffre['Accepte'] == 0) {
                                        echo "Le vendeur n'a pas encore répondu à votre offre à : " . $prix . " €" . "<br>";
                                    }
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
                            $resultderniereOffre = mysqli_query($db_handle, $sqlOffre);
                            $derniereOffre = mysqli_fetch_assoc($resultderniereOffre);
                            $prix = number_format($derniereOffre['Proposition'], 2, ',', ' ');
                            ?>
                            <div class="d-flex justify-content-center">
                                <div class="well">
                                    <span><?php
                                    if ($derniereOffre['Accepte'] == 1) {
                                        echo "Le vendeur a accepté votre offre à " . $prix . " €" . "<br>";
                                        $sqlVerifPanier = "SELECT IdItem FROM panier WHERE IdAcheteur = '$id' AND IdItem = '$item'";
                                        $resultVerifPanier = mysqli_query($db_handle, $sqlVerifPanier);
                                        if (mysqli_num_rows($resultVerifPanier) === 0) {
                                            ?>
                                            <form action="ajout_item_acheteur.php" method="post">
                                                <div class="well">
                                                    <p><?php echo "<input type='hidden' name='idOffre' value='$offre'>"; ?></p>
                                                </div>
                                                <div>
                                                    <p><input type="submit" name="button1" value="Ajouter l'article au panier">
                                                </div>
                                            </form>
                                            <?php
                                        }
                                        else {
                                            echo "Vous avez déjà ajouté cet article au panier.<br>";
                                        }
                                    }
                                    if ($derniereOffre['Accepte'] == 0) {
                                        echo "Voici sa dernière offre : " . $prix . " €" . "<br>";
                                        if ($nbrOffres["NbreOffre"] <= 9) {
                                            ?>
                                            <form action="formulaire_offre.php" method="post">
                                            <div class="well">
                                                <p><?php echo "<input type='hidden' name='idOffre' value='$offre'>"; ?>
                                                <input type="number" name="offre" placeholder="Montant de votre contre-offre..."
                                                min="0" step="0.01"></p>
                                            </div>
                                            <div>
                                                <p><input type="submit" name="button1" value="Soumettre une contre-offre">
                                                <input type="submit" name="button2" value="Accepter l'offre"></p>
                                            </div>
                                            </form>
                                            <?php
                                        }
                                        if ($nbrOffres["NbreOffre"] > 9) {
                                            ?>
                                            <form action="formulaire_offre.php" method="post">
                                                <div class="well">
                                                    <p><?php echo "<input type='hidden' name='idOffre' value='$offre'>";
                                                    echo "Vous avez atteint le nombre maximum d'offres proposées.
                                                    Vous n'avez désormais plus que le choix d'accepter cette offre ou d'en rester là."; ?>
                                                </div>
                                                <div>
                                                    <input type="submit" name="button2" value="Accepter l'offre"></p>
                                                </div>
                                            </form>
                                            <?php
                                        }
                                    }
                                    ?></span>
                                </div>
                            </div>
                            <?php
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
                        
                        $sqlProduit = "SELECT * FROM item WHERE item.IdItem = '$item'"; 
                        $resultproduit = mysqli_query($db_handle, $sqlProduit);
                        $produit = mysqli_fetch_assoc($resultproduit);
                        ?>
                        <br><br>
                        <div class="d-flex justify-content-center">
                            <div class="well">
                            <span><h2 align="center"><?php echo $produit['Nom'] . "<br>" ; ?></h2><p align="center"><?php echo $produit['Description'] . "<br><br>"; ?></p></span>
                                <span><?php $photo = $produit['Photo1']; echo "<img src='$photo' style=\"max-height:300px\">"; ?><br></span>
                            </div>
                        </div><br>

                        <?php
                        // Nombre d'offres par item et par acheteur
                        $sqlNbreOffres = "SELECT COUNT(offre.IdOffre) AS NbreOffre FROM item, offre WHERE item.IdVendeur = '$id'
                        AND offre.IdAcheteur='$acheteur' AND item.IdItem = offre.IdItem AND offre.IdAcheteur NOT LIKE '0'
                        AND offre.IdItem='$item'"; 
                        $resultnbrOffres = mysqli_query($db_handle, $sqlNbreOffres);
                        $nbrOffres = mysqli_fetch_assoc($resultnbrOffres);
                        // On récupère les Id des offres
                        $limite = $nbrOffres["NbreOffre"]-1;
                        $vendeur = FALSE;
                        $numeroIdEnCours = 0;
                        $sqlIdOffre = "SELECT offre.IdOffre FROM offre, item WHERE item.IdVendeur = '$id'
                        AND offre.IdAcheteur='$acheteur' AND item.IdItem = offre.IdItem AND offre.IdAcheteur NOT LIKE '0'
                        AND offre.IdItem='$item' ORDER BY offre.IdOffre LIMIT $limite";
                        $resultidOffres = mysqli_query($db_handle, $sqlIdOffre);
                        while ($idOffres = mysqli_fetch_assoc($resultidOffres)) {
                            $numeroIdEnCours++;
                            $vendeur = !$vendeur;
                            $IdEnCours = $idOffres["IdOffre"];
                            $sqlOffre = "SELECT * FROM offre WHERE IdOffre = '$IdEnCours'";
                            $resultOffreEnCours = mysqli_query($db_handle, $sqlOffre);
                            $OffreEnCours = mysqli_fetch_assoc($resultOffreEnCours);

                            // Si on parcourt l'avant-dernière offre
                            if ($numeroIdEnCours == $limite) {
                                // On récupère l'id de la dernière offre
                                $sqlIdOffreSuivante = "SELECT offre.IdOffre FROM offre, item WHERE item.IdVendeur = '$id'
                                AND offre.IdAcheteur='$acheteur' AND item.IdItem = offre.IdItem AND offre.IdAcheteur NOT LIKE '0'
                                AND offre.IdItem='$item' ORDER BY offre.IdOffre LIMIT 1 OFFSET $limite";
                                $resultidOffreSuivante = mysqli_query($db_handle, $sqlIdOffreSuivante);
                                $idOffreSuivante = mysqli_fetch_assoc($resultidOffreSuivante);
                                $IdSuivant = $idOffreSuivante["IdOffre"];
                                // Et donc la dernière offre
                                $sqlOffre = "SELECT * FROM offre WHERE IdOffre = '$IdSuivant'";
                                $resultOffreSuivante = mysqli_query($db_handle, $sqlOffre);
                                $OffreSuivante = mysqli_fetch_assoc($resultOffreSuivante);
                                if ($OffreSuivante['Accepte'] == 0) {
                                    ?>
                                    <div class="d-flex justify-content-center">
                                    <div class="well">
                                        <span><?php $prix = number_format($OffreEnCours['Proposition'], 2, ',', ' ');
                                        echo "Offre refusée ";
                                        if ($vendeur === TRUE) {
                                            echo "par vous-même : ";
                                        }
                                        if ($vendeur === FALSE) {
                                            echo "par le client : ";
                                        }
                                        echo $prix . " €";
                                        ?></span>
                                    </div>
                                    </div>
                                <?php
                                }
                                else {break;} // Si dernière offre acceptée, on ignore l'avant dernière (qui est le même mais non acceptée)
                            }
                            else {
                                ?>
                                    <div class="d-flex justify-content-center">
                                    <div class="well">
                                        <span><?php $prix = number_format($OffreEnCours['Proposition'], 2, ',', ' ');
                                        echo "Offre refusée ";
                                        if ($vendeur === TRUE) {
                                            echo "par vous-même : ";
                                        }
                                        if ($vendeur === FALSE) {
                                            echo "par le client : ";
                                        }
                                        echo $prix . " €";
                                        ?></span>
                                    </div>
                                    </div>
                                <?php
                            }
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
                            $resultderniereOffre = mysqli_query($db_handle, $sqlOffre);
                            $derniereOffre = mysqli_fetch_assoc($resultderniereOffre);
                            $prix = number_format($derniereOffre['Proposition'], 2, ',', ' ');
                            ?>
                            <div class="d-flex justify-content-center">
                                <div class="well">
                                <span><?php
                                if ($derniereOffre['Accepte'] == 1) {
                                    echo "Le client N°" . $acheteur . " a accepté votre offre à : " . $prix . " €." . "<br>";
                                    echo "Vous recevrez les informations sur la transaction très prochainement.<br>";
                                }
                                if ($derniereOffre['Accepte'] == 0) {
                                    echo "Voici la dernière offre du client : " . $prix . " €<br>"; ?>
                                    <form action="formulaire_offre.php" method="post">
                                        <div class="well">
                                            <p><?php echo "<input type='hidden' name='idOffre' value='$offre'>"; ?>
                                            <input type="number" name="offre" placeholder="Montant de votre contre-offre..."
                                            min="0" step="0.01"></p>
                                        </div>
                                        <div>
                                            <p><input type="submit" name="button1" value="Soumettre une contre-offre">
                                            <input type="submit" name="button2" value="Accepter l'offre"></p>
                                        </div>
                                    </form>
                                    <?php
                                }
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
                            $resultderniereOffre = mysqli_query($db_handle, $sqlOffre);
                            $derniereOffre = mysqli_fetch_assoc($resultderniereOffre);
                            $prix = number_format($derniereOffre['Proposition'], 2, ',', ' ');
                            ?>
                            <div class="d-flex justify-content-center">
                                <div class="well">
                                    <span><?php
                                    if ($derniereOffre['Accepte'] == 1) {
                                        echo "Vous avez accepté l'offre du client à : " . $prix . " €" . "<br>";
                                        echo "Vous recevrez les informations sur la transaction quand le client aura payé.<br>";
                                    }
                                    if ($derniereOffre['Accepte'] == 0) {
                                        echo "Le client n'a pas encore répondu à votre offre à : " . $prix . " €" . "<br>";
                                    }
                                    ?></span>
                                </div>
                            </div>
                            <?php
                        }
                        echo "<br><br><br><br>";
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