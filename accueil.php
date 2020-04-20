<!DOCTYPE html>
<html>


    <?php include 'includes/head.php'; ?>



<body>

    <?php include 'includes/header.php'; ?>

<?php

if ($db_found){
    $sql=="SELECT*
    FROM item i
    INNER JOIN
    (
    SELECT Categorie, min(Prix) AS min_price
    FROM item
    GROUP BY Categorie
    )i2";

    $result= mysqli_query($db_handle,$sql);


    while($data = mysqli_fetch_assoc($result)){
        echo'
        <div id="Affaire1" class="carousel slide col-md-3 data-ride="carousel">
        <h3>Affaire du Moment</3>
        <div class="carousel-inner">
        </div>
        <a class="carousel-control-prev" href="#Affaire1" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="false"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#Affaire1" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="false"></span>
        <span class="sr-only">Next</span>
        </a>
    </div>';

    echo'
        <a href="fiche_article.php?id='.$data["IdItem"].'"> '.$photo=$data['Photo1'].';
        <img src="'.$photo.'" width"260" height="200">
        </a>';

        
    }
}