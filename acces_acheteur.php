<!DOCTYPE html>
<html>
    <head>
        <title>Compte client</title>
        <meta charset="utf-8">
    </head>
    <!DOCTYPE html>
<html>

<head>
    <title>Project</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="CSS/Connexion.css">

</head>

<body>
    <nav class="navbar navbar-expand-md">
        <a class="navbar-brand" href="#"><img src="Images/navbar/logo.png" width="200" height="150" class="d-inline-block align-top" alt="" /></a>
        <div class="collapse navbar-collapse" id="main-navigation">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="accueil.html"> Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="Connexion.hmtl"> Déjà membre ?</a></li>
            </ul>
        </div>
    </nav>

    <div id="connexion" class="mt-5">
        <h1 class="text-center pt-5 pb-4">Connexion</h1>
        <form action="connexion_acheteur.php" method="post">
            <table align="center" width="55%">
                <tr>
                    <td class="pb-2"><strong>Email :</strong></td>
                </tr>
                <tr>
                    <td class="pb-3"><input class="container-fluid mb-1" input type="text" name="email" placeholder="Email" size="40"></td>
                </tr>
                <tr>
                    <td class="pb-2"><strong>Mot de Passe :</strong> </td>
                </tr>
                <tr>
                    <td class="pb-3"><input class="container-fluid mb-1" type="password" name="password" placeholder="Mot de passe" size="40"></td>
                </tr>
                <tr >
                    <td class="pb-4" colspan="2" align="center">
                        <input type="submit" value="Valider" />
                    </td>
                </tr>
            </table >
        </form>
    </div>
    <br><br>
    <div id="inscription" class="mt-5">
        <h1 class="text-center pt-5 pb-4">Créer mon compte COVID-BAY</h1>
        <h5 class="text-center pt-3 pb-4">Informations utilisateur</h1>
        <form class="pt-2" action="inscription_acheteur.php" method="post"></form>
            <table align="center" width="50%">
                <tr>
                    <td><input class="container-fluid mb-1"  type="text" name="nom" placeholder="Nom" size="18"></td>
                    <td><input class="container-fluid mb-1" type="text" name="prenom" placeholder="Prénom" size="17"></td>
                </tr>
            </table>
            <h5 class="text-center pt-3 pb-2">Coordonnées</h5>
            <table align="center" width="50%">
                <tr>
                    <td><input class="container-fluid mb-1" type="text" name="email" placeholder="Email" size="40"></td>
                    </td>
                </tr>
                <tr>
                    <td><input class="container-fluid mb-1" type="password" name="password1" placeholder="Nouveau mot de passe" size="40"></td>
                </tr>
                <tr>
                    <td><input class="container-fluid mb-1" type="password" name="password2" 
                        placeholder="Confirmez votre mot de passe" size="40"></td>
                </tr>
                <tr>
                    <td><input class="container-fluid mb-1" type="text" name="adresse1" placeholder="N°, Rue" size="40"></td>
                </tr>
            </table>
            <table align="center" width="50%">
                <tr>
                    <td><input class="container-fluid mb-1" type="text" name="cp" placeholder="Code Postal" size="12"></td>
                    <td><input class="container-fluid mb-1" type="text" name="ville" placeholder="Ville" size="23"></td>
                </tr>
                </tr>
            </table>
            <table align="center" width="50%">
                <tr>
                    <td><input class="container-fluid mb-1" input type="text" name="pays" placeholder="Pays" size="40"></td>
                </tr>
                <tr>
                    <td><input class="container-fluid mb-1" type="text" name="tel" placeholder="N° Téléphone" size="40"></td>
                    </td>
                </tr>
            </table>
            <h5 class="text-center pt-3 pb-2">Informations de paiement</h5>

            <table align="center" width="50%">
                
                    <tr>
                        <td>Type de carte : </td>
                        <td><input type="radio" id="visa" name="typeCarte" value="Visa"><label for="visa">Visa</label></td>
                        <td><input type="radio" id= "mastercard" name="typeCarte" value="MasterCard"><label for="mastercard">MasterCard</label></td>
                        <td><input type="radio" id="amex" name="typeCarte" value="American Express"><label for="amex">American Express</label></td>
                        <td><input type="radio" id="paypal" name="typeCarte" value="Paypal"><label for="paypal">Paypal</label></td>
                    </tr>
                
            </table>
            <table align="center" width="50%">
                <tr>
                    <td><input class="container-fluid mb-1"  type="text" name="numeroCarte" placeholder="N° Carte Bancaire" size="40"></td>
                </tr>
                <tr>
                    <td><input class="container-fluid mb-1" type="text" name="titulaire" placeholder="Nom du titualaire de la carte" size="40"></td>
                </tr>
            </table>
            <table align="center" width="50%">
                <tr>
                    <td><input class="container-fluid mb-1" type="date" name="expiration"></td>
                    <td><input class="container-fluid mb-1" type="text" name="cvc" placeholder="Code de sécurité" size="19"></td>
                </tr>
                
                    <tr>
                        <td><input type="checkbox" name="clause"><label for="accepte"> Pour les achats dans la catégorie
                            "Meilleure offre", je reconnais être dans l'obligation d'acheter l'article après acceptation
                            de mon offre par le vendeur.</label></td>
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