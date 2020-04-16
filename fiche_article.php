<!DOCTYPE html>
<html>

<head>
    <?php include 'includes/head.php'; ?>
</head>

<body>
    <?php include 'includes/header.php'; ?>

    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-2 sidenav">
                <h3>Catégorie</h3>
                <br>
                <p>Accessoire VIP</p>
            </div>
            <div class="col-sm-8 text-left">
                <h1 align="center">Voiture de collection</h1>
                <p align="center"><img src="images/categories/Img_Cat_VIP.jpg" width="600" height="400" /></p>
                <hr>
                <h3>Description</h3>
                <p>ceci est une voiture</p>
            </div>
            <div class="col-sm-2 sidenav">
                <div class="well">
                    <h3>Vente aux enchères</h3>
                </div>
                <div class="well">
                    <p>prix initial : 500 000 €</p>
                </div>
                <div class="well">
                    <td><input class="container-fluid mb-1" type="text" name="enchere_max" placeholder="votre enchère" size="18"></td>
                </div>
                <div>
                    <input type="submit" name="button" value="Participer">  
                </div>
            </div>
        </div>
    </div>

    <br></br>

    <?php include 'includes/footer.php'; ?>

</body>

</html>