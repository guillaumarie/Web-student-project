<!DOCTYPE html>
<html>

<head>
    <?php include 'includes/head.php'; ?>

</head>

<body>

    <?php include 'includes/header.php'; ?>

    <div>
        <div class="container">
            <h2 align="center">Ventes en cours</h2><br>

            <div class="row">
                <div class="col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading" align="center">Montre Rolex</div><br>
                        <div class="panel-body" align="center"><img src="Images\espace_vendeur\img_rolex.jpg" class="img-responsive" style="width:50%" alt="Image"></div>
                        <div class="panel-footer">N° 00000 <br>Enchères<br>Prix de départ : 200 000 €</div>
                        <table align="center" width="50%">
                            <tr>
                                <td colspan="2" >
                                    <input type="submit" name="button" value="Accéder à la vente">
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="panel panel-danger">
                        <div class="panel-heading" align="center">Montre Richard Mille</div><br>
                        <div class="panel-body" align="center"><img src="Images\espace_vendeur\img_richard_mille.jpg" class="img-responsive" style="width:65%" alt="Image"></div>
                        <div class="panel-footer">N° 00001<br>Achat immédiat<br> Prix : 72 000 €</div>
                        <table align="center" width="50%">
                            <tr>
                                <td colspan="2" >
                                    <input type="submit" name="button" value="Accéder à la vente">
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
        </div><br>

        <br></br>

        <?php include 'includes/footer.php'; ?>

</body>



</html>