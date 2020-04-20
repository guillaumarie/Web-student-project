<!DOCTYPE html>
<html>

    <?php include 'includes/head.php'; ?>
    

    <body class="pb-5">

        <?php include 'includes/header.php';
        include 'ajout_item_vendeur.php';

        include 'includes/bdd.php';


        if ($db_found) {
            $id = $_SESSION["id"];
            $sql = "SELECT * FROM item WHERE IdVendeur LIKE '$id'"; 
            $result = mysqli_query($db_handle, $sql);

            ?>
            <div>
            <div class="container">
                <h2 align="center">Mes ventes en cours</h2><br>

                <div class="row">

            <?php while ($data = mysqli_fetch_assoc($result)) { ?>
                <div class="col-sm-4">
                    <a style="text-decoration:none" <?php echo 'href="fiche_article.php?id='.$data["IdItem"].'"';?> >
                        <div class="panel panel-primary">
                            <div class="panel-heading" align="center"><?php echo $data['Nom']; ?></div><br>
                            <div class="panel-body" align="center"><?php $photo = $data['Photo1'];
                            echo "<img src='$photo' class='img-responsive' style='width:50%' alt='photo_1'>"; ?></div><br>
                            <div class="panel-footer" align="center">
                            <?php if ($data['TypeAchat'] == "immediat_offre") { echo 'Achat immédiat ou par meilleure offre'; }
                            if ($data['TypeAchat'] == "immediat") { echo 'Achat immédiat'; }
                            if ($data['TypeAchat'] == "offre") { echo 'Achat par meilleure offre'; }
                            $_SESSION["item"]=$data["IdItem"];
                            $prix = number_format($data['Prix'], 2, ',', ' '); echo $prix . " €"; ?></div><br>
                        </div>
                    </a>
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