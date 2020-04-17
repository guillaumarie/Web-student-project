<!DOCTYPE html>
<html>

    <head>
        <?php include 'includes/head.php'; ?>

    </head>

    <body>
        <?php include 'includes/header.php';

        $database = "ebay_ece";

        $db_handle = mysqli_connect('127.0.0.1:3308', 'root', '');
        $db_found = mysqli_select_db($db_handle, $database);

        if ($db_found) {
            $sql = "SELECT * FROM item WHERE Categorie LIKE 'vip'"; 
            $result = mysqli_query($db_handle, $sql);

            ?>
            <div>
            <div class="container">
            <h3 class="feature-title" align="center">Accessoires VIP</h3><br>

            <div class="row">

            <?php while ($data = mysqli_fetch_assoc($result)) { ?>
                <div class="col-sm-4">
                    <a style="text-decoration:none" href="fiche_article.php">
                        <div class="panel panel-primary">
                            <div class="panel-heading" align="center"><?php echo $data['Nom']; ?></div><br>
                            <div class="panel-body" align="center"><?php $photo = $data['Photo1'];
                            echo "<img src='$photo' class='img-responsive' style='width:50%' alt='photo_1'>"; ?></div><br>
                            <div class="panel-footer" align="center">
                            <?php if ($data['TypeAchat'] == "immediat_offre") { echo 'Achat immédiat ou  par meilleure offre'; }
                            if ($data['TypeAchat'] == "immediat") { echo 'Achat immédiat'; }
                            if ($data['TypeAchat'] == "offre") { echo 'Achat par meilleure offre'; }
                            if ($data['TypeAchat'] == "enchere") { echo 'Achat par enchères'; } ?><br>
                            <?php $prix = number_format($data['Prix'], 2, ',', ' '); echo $prix . " €"; ?></div><br>
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