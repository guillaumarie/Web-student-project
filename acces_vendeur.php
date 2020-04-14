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
                <td>Email ou Pseudo : </td>
                <td><input type="text" name="pseudo"></td>
            </tr>
            <tr>
                <td>Mot de passe : </td>
                <td><input type="text" name="password"></td>
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
                <td>Nom : </td>
                <td><input type="text" name="nom"></td>
            </tr>
            <tr>
                <td>Prénom : </td>
                <td><input type="text" name="prenom"></td>
            </tr>
            <tr>
                <td>Email : </td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <td>Pseudo : </td>
                <td><input type="text" name="pseudo"></td>
            </tr>
            <tr>
                <td>Mot de passe : </td>
                <td><input type="text" name="password1"></td>
            </tr>
            <tr>
                <td>Répétez votre mot de passe : </td>
                <td><input type="text" name="password2"></td>
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