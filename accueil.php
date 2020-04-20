<!DOCTYPE html>
<html>


<?php include 'includes/head.php'; ?>

<body>

    <?php include 'includes/header.php';
    
    include 'includes/bdd.php';

    if ($db_found) {
        $sql = "SELECT*
    FROM item i
    INNER JOIN
    (
    SELECT Categorie, min(Prix) AS min_price
    FROM item
    GROUP BY Categorie
    )i2
    ON i.Categorie = i2.Categorie AND i.Prix = i2.min_price";

        $result = mysqli_query($db_handle, $sql);
        $rows = mysqli_fetch_row($result);
        $rows2 = mysqli_fetch_row($result);
        $rows3 = mysqli_fetch_row($result);
    ?>

        <div id="Affaire1" class="carousel slide col-md-3" data-ride="carousel">
            <h3>Affaire du Moment</h3>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <?php echo '<a href="fiche_article.php?id='.$rows[0].'">'; ?>
                    <?php echo '<img src="'.$rows[3].'" alt ="bonne_affaire_vip" width="350" height="200"> </a>'; ?>
                </div>
                <div class="carousel-item">
                    <?php echo '<a href="fiche_article.php?id='.$rows2[0].'">'; ?>
                    <?php echo '<img src="'.$rows2[3].'" alt="bonne_affaire_musee" width="350" height="200"> </a>'; ?>
                </div>
                <div class="carousel-item">
                    <?php echo '<a href="fiche_article.php?id='.$rows3[0].'">'; ?>
                    <?php echo '<img src="'.$rows3[3].'" alt="bonne_affaire_tresor" width="350" height="200"> </a>'; ?>
                </div>
            </div>
            <a class="carousel-control-prev" href="#Affaire1" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="false"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#Affaire1" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="false"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    <?php
    }
    ?>
