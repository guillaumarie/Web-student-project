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

        <div id="connexion" class="mt-5">
            <h1 class="text-center pt-5 pb-4">Connexion</h1>
            <form class="pt-2" action="connexion_vendeur.php" method="post">
                <table align="center" width="50%">
                    <tr>
                        <td class="pb-2"><strong>Email :</strong></td>
                    </tr>
                    <tr>
                        <td class="pb-3"><input class="container-fluid mb-1" type="text" name="email" placeholder="Email" size="30"></td>
                    </tr>
                    <tr>
                        <td class="pb-2"><strong>Mot de Passe :</strong> </td>
                    </tr>
                    <tr>
                        <td class="pb-3"><input class="container-fluid mb-1" type="password" name="password" placeholder="Mot de passe" size="30"></td>
                    </tr>
                    <tr>
                        <td class="pb-4" colspan="2" align="center">
                            <input type="submit" value="Valider">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <br>
        <div id="inscription" class="mt-5 pb-4">
            <h1 class="text-center pt-5 pb-4">Créer mon compte Vendeur</h1>
            <form action="inscription_vendeur.php" method="post">
                <table align="center" width="75%">
                    <tr>
                        <td><input class="container-fluid mb-1" type="text" name="nom" placeholder="Nom" size="12"></td>
                        <td><input class="container-fluid mb-1" type="text" name="prenom" placeholder="Prénom" size="12"></td>
                    </tr>
                </table>
                <table align="center" width="75%">
                    <tr>
                        <td><input class="container-fluid mb-1" type="text" name="email" placeholder="Email" size="30"></td>
                    </tr>
                    <tr>
                        <td><input class="container-fluid mb-1" type="password" name="password1" placeholder="Nouveau mot de passe" size="30"></td>
                    </tr>
                    <tr>
                        <td><input class="container-fluid mb-1" type="password" name="password2" placeholder="Confirmez votre mot de passe" size="30"></td>
                    </tr>
                </table>
                <table align="center" width="75%">
                    <tr>
                        <td><label for="photoProfil">Choisir une photo de profil :</label></td>
                        <td><input class="container-fluid mb-1" type="file" name="photoProfil"></td>
                    </tr>
                </table>
                <br>
                <table align="center" width="75%">
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