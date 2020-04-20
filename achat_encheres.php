<!DOCTYPE html>
<html>

    
        <?php include 'includes/head.php'; ?>

    

    <body>
        <?php include 'includes/header.php';

        include 'includes/bdd.php';

        if ($db_found) {
            $sql = "SELECT * FROM item WHERE TypeAchat LIKE 'enchere'"; 
            $result = mysqli_query($db_handle, $sql);

            ?>
            <div>
            <div class="container">

            <h3 class="feature-title" align="center">Enchères</h3><br>

            <div class="row">

            <?php
            while ($data = mysqli_fetch_assoc($result)) {
                $idItem = $data["IdItem"];
                $sqlPlafond = "SELECT Plafond FROM enchere WHERE IdItem LIKE '$idItem' AND IdAcheteur LIKE '0'"; 
                $resultPlafond = mysqli_query($db_handle, $sqlPlafond);
                $Plafond = mysqli_fetch_assoc($resultPlafond);
                $prixActuel = $Plafond["Plafond"];
                ?>
                <div class="col-sm-4">
                    <div class="panel panel-primary"> 
                        <a style="text-decoration:none" <?php echo 'href="fiche_article.php?id='.$data["IdItem"].'"';?> >
                        <div class="btn btn-outline-secondary btn-lg panel-heading d-flex justify-content-center"
                        align="center"><?php echo $data['Nom']; ?></div><br>
                        <div class="panel-body" align="center"><?php $photo = $data['Photo1'];
                            echo "<img src='$photo' class='img-responsive' style='width:50%' alt='photo_1'>"; ?>
                        </div><br>
                        </a>
                        <div class="panel-footer" align="center">
                            <?php echo "Achat par enchères<br>";
                            $_SESSION["item"] = $data["IdItem"];
                            $prix = number_format($prixActuel, 2, ',', ' ');
                            echo $prix . " €"; ?>
                        </div><br>
                    </div>
                </div>
            <?php
            }
        } else {
            echo "Database not found.<br>";
        }
        mysqli_close($db_handle);

        ?>
            </div>
        </div><br>

        <br></br>

        <?php include 'includes/footer.php'; ?>

    </body>

</html>