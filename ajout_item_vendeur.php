<!DOCTYPE html>
<html>

<head>
    <title>Project</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/Connexion.css">
    
    <script type="text/javascript">
        $(document).ready(function () {
            var compte=1;
            $("#bouton1").click(function () {
                if(compte==4) {
                    $("#ajout").append("<input class='container-fluid mb-1' type='file' name='photo5'>");
                    $(this).hide();
                    compte++;
                }
                if(compte==3) {
                    $("#ajout").append("<input class='container-fluid mb-1' type='file' name='photo4'>");
                    compte++;
                }
                if(compte==2) {
                    $("#ajout").append("<input class='container-fluid mb-1' type='file' name='photo3'>");
                    compte++;
                }
                if(compte==1) {
                    $("#ajout").append("<input class='container-fluid mb-1' type='file' name='photo2'>");
                    compte++;
                }
            });
        });
    </script>

</head>


<body class="pb-5">
        <nav class="navbar navbar-expand-md">
            <a class="navbar-brand" href="#"><img src="img/navbar/logo.png" width="250" height="150" class="d-inline-block align-top" alt="" /></a>
            <div class="collapse navbar-collapse" id="main-navigation">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="accueil.html"> Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="Connexion.hmtl"> Déjà membre ?</a></li>
                </ul>
            </div>
        </nav>

        <div id="inscription" class="mt-5 pb-4">
            <h1 class="text-center pt-5 pb-4">Vendre un produit</h1>
            <form action="ajout_item_vendeur_back.php" method="post">
                <table align="center" width="50%">
                    <tr>
                        <td><select class="container-fluid mb-1" name="categorie">
                        <option value="">Choisir une catégorie</option>
                        <option value="ferraille">Ferraille ou Trésor</option>
                        <option value="musee">Bon pour le musée</option>
                        <option value="vip">Accessoire VIP</option></td>
                    </tr>
                    <tr>
                        <td><select class="container-fluid mb-1" name="typeAchat">
                        <option value="">Choisir un mode d'achat</option>
                        <option value="immediat">Achat immédiat</option>
                        <option value="offre">Meilleure offre</option>
                        <option value="enchere">Vente aux enchères</option>
                        <option value="immediat_offre">Achat immédiat ou meilleure offre</option></td>
                    </tr>
                    <tr>
                        <td><input class="container-fluid mb-1" type="text" name="nom" placeholder="Nom"></td>
                    </tr>
                    <tr>
                        <td><textarea class="container-fluid mb-1" name="description" rows="4" cols="30" maxlenght="300"
                        placeholder="Description (300 caractères max)"></textarea></td>
                    </tr>
                </table>
                <table align="center" width="50%">
                    <tr>
                        <td><input class="container-fluid mb-1" type="number" name="prix" placeholder="Prix" min="0" step="0.01"></td>
                        <td><label> €</label></td>
                    </tr>
                </table>
                <br>
                <table align="center" width="50%">
                    <tr>
                        <td><label for="photosProduit">Ajouter des photos de votre produit (maximum 5) :</label></td>
                    </tr>
                    <tr>
                        <td><input class="container-fluid mb-1" type="file" name="photo1"></td>
                    </tr>
                    <tr>
                        <td><div id="ajout"></div></td>
                    </tr>
                    <tr>
                        <td><input class="container-fluid mb-1" type="button" id="bouton1" value="Ajouter 1 autre photo..."></td>
                    </tr>
                </table>
                <br>
                <table align="center" width="50%">
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" name="button" value="Vendre">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <br></br>


        <footer class="page-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <h6 class="text-uppercase font-weight-bold">Information additionnelle</h6>
                  
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <h6 class="text-uppercase font-weight-bold">Contact</h6>
                    
                </div>
            </div>
            <div class="footer-copyright text-center">&copy; 2019 Copyright | Droit d'auteur: webDynamique.ece.fr</div>
    </footer>
    
    </body>

</html>