<!DOCTYPE html>
<html>

    <head>
        <?php include 'includes/head.php'; ?>
    </head>

    <body>
        <?php include 'includes/header.php'; 

      
        ?>

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

        <?php include 'includes/footer.php'; ?>
    </body>

</html>