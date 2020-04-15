<!DOCTYPE html>
<html>
    <head>
        <title>Compte vendeur</title>
        <meta charset="utf-8">
    </head>
<body>
    <h2>Accès à l'espace vendeur</h2>
    <h3>Connexion</h3>
    <form action="connexion_vendeur.php" method="post">
        <table>
            <tr>
                <td><input type="text" name="email" placeholder="Email" size="30"></td>
            </tr>
            <tr>
                <td><input type="password" name="password" placeholder="Mot de passe" size="30"></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="button" value="Se connecter">
                </td>
            </tr>
        </table>
    </form>
    <br>
    <h3>Inscription</h3>
    <form action="inscription_vendeur.php" method="post">
        <table>
            <tr>
                <td><input type="text" name="nom" placeholder="Nom" size="12"></td>
                <td><input type="text" name="prenom" placeholder="Prénom" size="12"></td>
            </tr>
        </table>
        <table>
            <tr>
                <td><input type="text" name="email" placeholder="Email" size="30"></td>
            </tr>
            <tr>
                <td><input type="password" name="password1" placeholder="Nouveau mot de passe" size="30"></td>
            </tr>
            <tr>
                <td><input type="password" name="password2" placeholder="Confirmez votre mot de passe" size="30"></td>
            </tr>
            <tr>
                <td><label for="photoProfil">Sélectionnez une photo de profil</label></td>
            </tr>
            <tr>
                <td><input type="file" name="photoProfil"></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="button" value="S'inscrire">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>