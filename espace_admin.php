<!DOCTYPE html>
<html>

    
        <?php include 'includes/head.php'; ?>

    

    <body class="pb-5">
    <?php include 'includes/header.php'; ?>

        <div id="inscription" class="mt-5 pb-4">
                <h1 class="text-center pt-5 pb-4">Créer un compte Vendeur</h1>
                <form action="inscription_vendeur.php" method="post">
                    <table align="center" width="50%">
                        <tr>
                            <td><input class="container-fluid mb-1" type="text" name="nom" placeholder="Nom" size="12"></td>
                            <td><input class="container-fluid mb-1" type="text" name="prenom" placeholder="Prénom" size="12"></td>
                        </tr>
                    </table>
                    <table align="center" width="50%">
                        <tr>
                            <td><input class="container-fluid mb-1" type="text" name="email" placeholder="Email" size="30"></td>
                        </tr>
                        <tr>
                            <td><input class="container-fluid mb-1" type="password" name="password1" placeholder="Nouveau mot de passe" size="30"></td>
                        </tr>
                        <tr>
                            <td><input class="container-fluid mb-1" type="password" name="password2" placeholder="Confirmez votre mot de passe" size="30"></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                <input type="submit" name="button" value="S'inscrire">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <br></br>
            <div id="inscription" class="mt-5 pb-4">
                <h1 class="text-center pt-5 pb-4">Supprimer un compte vendeur</h1>
                <form action="#" method="post">
                    <table align="center" width="50%">
                        <tr>
                            <td><input class="container-fluid mb-1" type="text" name="Email" placeholder="Email"></td>
                        </tr>
                        <tr>
                            <td><input class="container-fluid mb-1" type="text" name="Pseudo" placeholder="Pseudo"></td>
                        </tr>
                        <tr>
                            <td><input class="container-fluid mb-1" type="text" name="nom" placeholder="Nom"></td>
                        </tr>
                    </table>
                    <table align="center" width="50%">
                        <tr>
                            <td><select class="container-fluid mb-1" name="typeAchat">
                                    <option value="">Motif</option>
                                    <option value="immediat">Comportement inadapté</option>
                                    <option value="offre">Inactif</option>
                                    <option value="enchere">Suppression suite à sa demande</option>
                                    <option value="immediat_offre">Autre</option>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <table align="center" width="50%">
                        <tr>
                            <td colspan="2" align="center">
                                <input type="submit" name="button" value="Supprimer">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <br><br>
            <div>
                <div class="container">
                <h2 align="center">Ventes en cours</h2><br>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading" align="center">Montre Rolex</div><br>
                                <div class="panel-body" align="center"><img src="images\espace_vendeur\img_rolex.jpg" class="img-responsive" style="width:50%" alt="Image"></div>
                                <div class="panel-footer">N° 00000 <br>Enchères<br>Prix de départ : 200 000 €<br><a>Suprimer la Vente</a></div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="panel panel-danger">
                                <div class="panel-heading" align="center">Montre Richard Mille</div><br>
                                <div class="panel-body" align="center"><img src="images\espace_vendeur\img_richard_mille.jpg" class="img-responsive" style="width:65%" alt="Image"></div>
                                <div class="panel-footer">N° 00001<br>Achat immédiat<br> Prix : 72 000 €<br><a>Suprimer la Vente</a></div>
                            </div>
                        </div>
                        
                    </div>
                </div><br>


            </div>
            <div id="inscription" class="mt-5 pb-4">
                <h1 class="text-center pt-5 pb-4">Vendre un produit</h1>
                <form action="ajout_item_vendeur_back.php" method="post">
                    <table align="center" width="50%">
                        <tr>
                            <td><select class="container-fluid mb-1" name="categorie">
                                    <option value="">Choisir une catégorie</option>
                                    <option value="ferraille">Ferraille ou Trésor</option>
                                    <option value="musee">Bon pour le musée</option>
                                    <option value="vip">Accessoire VIP</option>
                            </td>
                        </tr>
                        <tr>
                            <td><input class="container-fluid mb-1" type="text" name="nom" placeholder="Nom"></td>
                        </tr>
                        <tr>
                            <td><textarea class="container-fluid mb-1" name="description" rows="4" cols="30" maxlenght="300" placeholder="Description (300 caractères max)"></textarea></td>
                        </tr>
                    </table>
                    <table align="center" width="50%">
                        <tr>
                            <td><label for="photosProduit">Ajouter une photo "à la une" pour votre produit :</label></td>
                        </tr>
                        <tr>
                            <td><input class="container-fluid mb-1" type="file" name="photo1" multiple></td>
                        </tr>
                    </table>
                    <table align="center" width="50%">
                        <tr>
                            <td><input class="container-fluid mb-1" type="number" name="prix" placeholder="Prix" min="0" step="0.01"></td>
                            <td><label> €</label></td>
                        </tr>
                    </table>
                    <table align="center" width="50%">
                        <tr>
                            <td><select class="container-fluid mb-1" name="typeAchat">
                                    <option value="">Choisir un mode d'achat</option>
                                    <option value="immediat">Achat immédiat</option>
                                    <option value="offre">Meilleure offre</option>
                                    <option value="enchere">Vente aux enchères</option>
                                    <option value="immediat_offre">Achat immédiat ou meilleure offre</option>
                            </td>
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
            <br><br>
        <div>


        <br></br>

        <?php include 'includes/footer.php'; ?>

    </body>

</html>