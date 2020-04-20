<!DOCTYPE html>
<html>


    <?php include 'includes/head.php'; ?>


    <body>
        <?php include 'includes/header.php';

        include 'includes/bdd.php';

        if ($db_found) {
            $id = $_SESSION["id"];
            $sql = "SELECT * FROM item INNER JOIN panier ON item.IdItem=panier.IdItem WHERE panier.IdAcheteur LIKE '$id'"; 
            $result = mysqli_query($db_handle, $sql);
            $prixTot=0;

            ?>
            
            <div class="container text-center">
            <h1>Votre Panier</h1><br><br>
            <div class="row">
            <div class="col-sm-7">
            
            <?php while ($data = mysqli_fetch_assoc($result)) { ?>
                <div class="row">
                    <div class="col-sm-9">
                        <div class="well">
                            <span><?php $photo = $data['Photo1']; echo "<img src='$photo' width='200' align='left'>"; ?></span>
                            <span><h5><?php echo $data['Nom'] . "<br>"; ?></h5>
                            <?php $prix = number_format($data['Prix'], 2, ',', ' '); echo $prix . " €" . "<br>";
                            $prixTot = $prixTot + $data['Prix']; ?></span>
                        </div>
                    </div>
                </div><br>
            <?php
            }
        } else {
            echo "Database not found.<br>";
        }
        mysqli_close($db_handle);

        ?>
            </div>
            <div class="col-sm-2 well">
                <h4>Total de votre panier</h4><br>
                <h5><?php $prixTot = number_format($prixTot, 2, ',', ' '); echo $prixTot . " €" . "<br>"; ?></h5>
                <br><br>
                <input type="submit" name="button" value="Procéder au paiement">
            </div>

                    
                
            </div>
        </div>
        <br></br>

        <?php include 'includes/footer.php'; ?>

    </body>

</html>