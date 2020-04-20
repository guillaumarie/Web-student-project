<!DOCTYPE html>
<html>

    
        <?php include 'includes/head.php'; ?>

    

    <body>
        <?php include 'includes/header.php';

        $database = "ebay_ece";

        $db_handle = mysqli_connect('127.0.0.1:3308', 'root', '');
        $db_found = mysqli_select_db($db_handle, $database);

        if ($db_found) {
            $sql = "SELECT * FROM item WHERE TypeAchat LIKE 'achat_immediat'"; 
            $result = mysqli_query($db_handle, $sql);


            ?>
            <div>
            <div class="container">

            <h3 class="feature-title" align="center">Bon pour le musée</h3><br>

            <div class="row">

            <?php while ($data = mysqli_fetch_assoc($result)) { ?>
                <div class="col-sm-4">

                    <div class="panel panel-primary"> 
                    <a style="text-decoration:none" <?php echo 'href="fiche_article.php?id='.$data["IdItem"].'"';?> >
                            <div class="panel-heading" align="center"><?php echo $data['Nom']; ?></div><br>
                                <div class="panel-body" align="center"><?php $photo = $data['Photo1'];
                                  echo "<img src='$photo' class='img-responsive' style='width:50%' alt='photo_1'>"; ?></div><br> </a>
                                    <div class="panel-footer" align="center">
                                 <?php if ($data['TypeAchat'] == "immediat_offre") { echo 'Achat immédiat ou par meilleure offre'; }
                                       if ($data['TypeAchat'] == "immediat") { echo 'Achat immédiat'; }
                                       if ($data['TypeAchat'] == "offre") { echo 'Achat par meilleure offre'; }
                                       if ($data['TypeAchat'] == "enchere") { echo 'Achat par enchères'; } ?><br>
                                       <?php $_SESSION["item"]=$data["IdItem"];?>
                                       <?php $prix = number_format($data['Prix'], 2, ',', ' '); echo $prix . " €"; ?></div><br>
                
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