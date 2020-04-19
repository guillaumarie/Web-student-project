<!DOCTYPE html>
<html>


    <?php include 'includes/head.php'; ?>


<body>
    <?php include 'includes/header.php'; ?>


<?php
    $idAcheteur = isset($_SESSION["id"])? $_SESSION["id"] : "";
    $job = isset($_SESSION["job"])? $_SESSION["job"] : "";
    $idItem = isset($_GET['id']) ? $_GET['id'] : "";

    $database = "ebay_ece";
    $db_handle = mysqli_connect('127.0.0.1:3308', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);

    $date = date("Y-m-d");

    if ($db_found) {
        $sql = "SELECT * FROM item WHERE IdItem LIKE '$idItem'";
        $result = mysqli_query($db_handle, $sql);
        $data = mysqli_fetch_assoc($result);
        ?>

        <div class="container-fluid text-center">
        <div class="row content">
        <div class="col-sm-2 sidenav">
            <h3>Catégorie</h3>
            <br>
            <p><?php echo $data['Nom'];?></p>
        </div>
        <div class="col-sm-8 text-left">
            <h1 align="center"><?php echo $data['Categorie']; ?></h1>
            <p align="center"><?php $image = $data['Photo1']; echo "<img src='$image' width='600' height='400'>"; ?></p>
            
            <h3>Description</h3>
            <p><?php echo $data['Description'];?></p>
        </div>
        <div class="col-sm-2 sidenav">
            <div class="well">
                <h3><?php echo $data['TypeAchat']; ?></h3>
            </div>
            <?php
            if ($idAcheteur != 0 && $job === "acheteur") {
                // Achat immédiat
                if ($data["TypeAchat"] == 'immediat'){
                    $sqlImmediat = "SELECT IdAcheteur FROM panier WHERE IdItem LIKE '$idItem' AND IdAcheteur LIKE '$idAcheteur'";
                    $resultImmediat = mysqli_query($db_handle, $sqlImmediat);
                    if (mysqli_num_rows($resultImmediat) !== 0) {  // Si l'acheteur a déjà mis ce produit au panier
                        ?>
                        <div class="well">
                            <p><?php echo "Vous avez déjà ajouté cet article à votre panier.<br>"; ?></p>
                        </div>
                        <?php
                    }
                    else {
                        ?>
                        <div class="well">
                            <p><?php $prix = number_format($data['Prix'], 2, ',', ' '); echo "Prix : " . $prix . " €<br>"; ?></p>
                        </div>
                        <form action="ajout_item_acheteur.php" method="post">
                            <div class="well">
                                <p><?php echo "<input type='hidden' name='idItem' value='$idItem'>";
                                echo "<input type='hidden' name='idAcheteur' value='$idAcheteur'>" ?></p>
                            </div>
                            <div>
                                <p><input type="submit" name="button1" value="Ajouter au panier"></p>
                            </div>
                        </form>
                        <?php
                    }
                }
                // Achat immédiat ou meilleure offre
                if ($data["TypeAchat"] == 'immediat_offre'){
                    $sqlOffre = "SELECT IdAcheteur FROM offre WHERE IdItem LIKE '$idItem' AND IdAcheteur LIKE '$idAcheteur'";
                    $resultOffre = mysqli_query($db_handle, $sqlOffre);
                    $sqlImmediat = "SELECT IdAcheteur FROM panier WHERE IdItem LIKE '$idItem' AND IdAcheteur LIKE '$idAcheteur'";
                    $resultImmediat = mysqli_query($db_handle, $sqlImmediat);
                    // Si l'acheteur a déjà commencé les négociations pour ce produit et l'a également ajouté à son panier
                    if (mysqli_num_rows($resultOffre) !== 0 && mysqli_num_rows($resultImmediat) !== 0) {
                        ?>
                        <div class="well">
                            <p><?php echo "Vous avez déjà ajouté cet article à votre panier.<br>"; ?></p>
                            <p><?php echo "Vous avez également commencé des négociations pour cet article.<br>
                            Vous pouvez consulter leur avancement dans la rubrique 'Mes offres'"; ?></p>
                        </div>
                        <?php
                    }
                    // Si l'acheteur a déjà commencé les négociations pour ce produit mais ne l'a pas ajouté à son panier
                    elseif (mysqli_num_rows($resultOffre) !== 0 && mysqli_num_rows($resultImmediat) === 0) {
                        ?>
                        <div class="well">
                            <p><?php $prix = number_format($data['Prix'], 2, ',', ' '); echo "Prix : " . $prix . " €<br>"; ?></p>
                        </div>
                        <form action="ajout_item_acheteur.php" method="post">
                            <div class="well">
                                <p><?php echo "<input type='hidden' name='idItem' value='$idItem'>";
                                echo "<input type='hidden' name='idAcheteur' value='$idAcheteur'>" ?></p>
                            </div>
                            <div>
                                <p><input type="submit" name="button1" value="Ajouter au panier"></p>
                            </div>
                        </form>
                        <div class="well">
                            <p><?php echo "Vous avez déjà commencé des négociations pour cet article.<br>
                            Vous pouvez consulter leur avancement dans la rubrique 'Mes offres'"; ?></p>
                        </div>
                        <?php
                    }
                    // Si l'acheteur n'a pas encore commencé les négociations pour ce produit mais l'a déjà ajouté à son panier
                    elseif (mysqli_num_rows($resultOffre) === 0 && mysqli_num_rows($resultImmediat) !== 0) {
                        ?>
                        <div class="well">
                            <p><?php $prix = number_format($data['Prix'], 2, ',', ' '); echo "Prix : " . $prix . " €<br>"; ?></p>
                        </div>
                        <form action="ajout_item_acheteur.php" method="post">
                            <div class="well">
                                <p><input class="container-fluid mb-1" type="number" name="prix"
                                placeholder="Vous pouvez proposer un nouveau prix..." size="18"></p>
                                <p><?php echo "<input type='hidden' name='idItem' value='$idItem'>";
                                echo "<input type='hidden' name='idAcheteur' value='$idAcheteur'>" ?></p>
                            </div>
                            <div>
                                <p><input type="submit" name="button2" value="Soumettre une offre"></p>
                            </div>
                        </form>
                        <div class="well">
                            <p><?php echo "Vous avez déjà ajouté cet article à votre panier.<br>"; ?></p>
                        </div>
                        <?php
                    }
                    else {
                        ?>
                        <div class="well">
                            <p><?php $prix = number_format($data['Prix'], 2, ',', ' '); echo "Prix initial : " . $prix . " €<br>"; ?></p>
                        </div>
                        <form action="ajout_item_acheteur.php" method="post">
                            <div class="well">
                                <p><input class="container-fluid mb-1" type="number" name="prix"
                                placeholder="Vous pouvez proposer un nouveau prix..." size="18"></p>
                                <p><?php echo "<input type='hidden' name='idItem' value='$idItem'>";
                                echo "<input type='hidden' name='idAcheteur' value='$idAcheteur'>" ?></p>
                            </div>
                            <div>
                                <p><input type="submit" name="button1" value="Ajouter au panier"></p>
                                <p><input type="submit" name="button2" value="Soumettre une offre"></p>
                            </div>
                        </form>
                        <?php
                    }
                }
                // Meilleure offre
                if ($data["TypeAchat"] == 'offre'){
                    $sqlOffre = "SELECT IdAcheteur FROM offre WHERE IdItem LIKE '$idItem' AND IdAcheteur LIKE '$idAcheteur'";
                    $resultOffre = mysqli_query($db_handle, $sqlOffre);
                    if (mysqli_num_rows($resultOffre) !== 0) {  // Si l'acheteur a déjà commencé les négociations pour ce produit
                        ?>
                        <div class="well">
                            <p><?php echo "Vous avez déjà commencé des négociations pour cet article.<br>
                            Vous pouvez consulter leur avancement dans la rubrique 'Mes offres'"; ?></p>
                        </div>
                        <?php
                    }
                    else {
                        ?>
                        <div class="well">
                            <p><?php $prix = number_format($data['Prix'], 2, ',', ' '); echo "Prix initial : " . $prix . " €<br>"; ?></p>
                        </div>
                        <form action="ajout_item_acheteur.php" method="post">
                            <div class="well">
                                <p><input class="container-fluid mb-1" type="number" name="prix"
                                placeholder="Vous pouvez proposer un nouveau prix..." size="18"></p>
                                <p><?php echo "<input type='hidden' name='idItem' value='$idItem'>";
                                echo "<input type='hidden' name='idAcheteur' value='$idAcheteur'>" ?></p>
                            </div>
                            <div>
                                <p><input type="submit" name="button2" value="Soumettre une offre"></p>
                            </div>
                        </form>
                        <?php
                    }
                }
                // Enchère
                if ($data["TypeAchat"] == 'enchere'){
                    $sqlVerif = "SELECT IdAcheteur FROM enchere WHERE IdItem LIKE '$idItem' AND IdAcheteur LIKE '$idAcheteur'";
                    $resultVerif = mysqli_query($db_handle, $sqlVerif);
                    if (mysqli_num_rows($resultVerif) !== 0) {  // Si l'acheteur a déjà proposé une enchère pour ce produit
                        ?>
                        <div class="well">
                            <p><?php echo "Vous avez déjà proposé un plafond pour cette enchère.<br>
                            Vous pouvez consulter son avancement dans la rubrique 'Mes enchères'"; ?></p>
                        </div>
                        <?php
                    }
                    else {
                        $sqlDates = "SELECT DISTINCT Debut, Fin FROM enchere WHERE IdItem LIKE '$idItem'";
                        $resultDates = mysqli_query($db_handle, $sqlDates);
                        while ($Dates = mysqli_fetch_assoc($resultDates)) {
                            if ($Dates["Debut"] > $date) {
                                ?>
                                <div class="well">
                                    <p><?php $debut = $Dates["Debut"];
                                    list($a, $m, $j) = explode("-", $debut);
                                    if($m=="01"){$mois="janvier";} if($m=="02"){$mois="février";} if($m=="03"){$mois="mars";}
                                    if($m=="04"){$mois="avril";} if($m=="05"){$mois="mai";} if($m=="06"){$mois="juin";}
                                    if($m=="07"){$mois="juillet";} if($m=="08"){$mois="août";} if($m=="09"){$mois="septembre";}
                                    if($m=="10"){$mois="octobre";} if($m=="11"){$mois="novembre";} if($m=="12"){$mois="décembre";}
                                    echo "Les enchères ne sont pas encore ouvertes pour cet article.<br>
                                    Date d'ouverture : " . $j . " " . $mois . " " . $a . "<br>";
                                     ?></p>
                                </div>
                                <?php
                            }
                            if ($Dates["Fin"] < $date) {
                                ?>
                                <div class="well">
                                    <p><?php echo "Les enchères sont fermées pour cet article.<br>"; ?></p>
                                </div>
                                <?php
                            }
                            if ($Dates["Debut"] <= $date && $Dates["Fin"] >= $date) {
                                $sqlEnchere = "SELECT Plafond FROM enchere WHERE IdItem LIKE '$idItem' AND IdAcheteur LIKE '0'";
                                $resultEnchere = mysqli_query($db_handle, $sqlEnchere);
                                $Enchere = mysqli_fetch_assoc($resultEnchere);
                                ?>
                                <div class="well">
                                    <p><?php $prix = number_format($Enchere['Plafond'], 2, ',', ' '); echo "Prix actuel : " . $prix . " €<br>"; ?></p>
                                </div>
                                <form action="ajout_item_acheteur.php" method="post">
                                    <div class="well">
                                        <p><input class="container-fluid mb-1" type="number" name="prix"
                                        placeholder="Indiquez votre plafond pour cette enchère..." size="18"></p>
                                        <p><?php echo "<input type='hidden' name='idItem' value='$idItem'>";
                                        echo "<input type='hidden' name='idAcheteur' value='$idAcheteur'>" ?></p>
                                    </div>
                                    <div>
                                        <p><input type="submit" name="button3" value="Enchérir"></p>
                                    </div>
                                </form>
                                <?php
                            }
                        }
                    }
                }
            }
            elseif ($idAcheteur != 0 && $job === "vendeur") {
                ?>
                <div class="well">
                    <p><?php echo "Vous devez vous connecter en tant que client pour acheter cet article.<br>"; ?></p>
                </div>
                <?php
            }
            else {
                ?>
                <div class="well">
                    <p><?php echo "Vous devez vous connecter pour acheter cet article.<br>"; ?></p>
                </div>
                <?php
            }
            ?>
        </div>
        <?php
    } else {
        echo "Database not found.";
    }
        ?>
        </div>
    </div>

    <br></br>
    <?php include 'includes/footer.php'; ?>

</body>
</html>

