<!DOCTYPE html>
<html>
    <head>
        <title>Ebay ECE</title>
        <meta charset="utf-8">
    </head>
<body>
    <h1>Accès à votre compte client</h1>
    <h2>Connexion</h2>
    <form action="connexion_acheteur.php" method="post">
        <table>
            <tr>
                <td><input type="text" name="email" placeholder="Email" size="40"></td>
            </tr>
            <tr>
                <td><input type="password" name="password" placeholder="Mot de passe" size="40"></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="button" value="Se connecter">
                </td>
            </tr>
        </table>
    </form>
    <br><br>
    <h2>Inscription</h2>
    <form action="inscription_acheteur.php" method="post">
        <table>
            <tr>
                <td><input type="text" name="nom" placeholder="Nom" size="18"></td>
                <td><input type="text" name="prenom" placeholder="Prénom" size="17"></td>
            </tr>
        </table>
        <table>
            <tr>
                <td><input type="text" name="email" placeholder="Email" size="40"></td>
            </tr>
            <tr>
                <td><input type="password" name="password1" placeholder="Nouveau mot de passe" size="40"></td>
            </tr>
            <tr>
                <td><input type="password" name="password2" placeholder="Confirmez votre mot de passe" size="40"></td>
            </tr>
            <h4>Coordonnées</h4>
            <tr>
                <td><input type="text" name="adresse1" placeholder="N°, Rue" size="40"></td>
            </tr>
            <tr>
                <td><input type="text" name="adresse2" placeholder="Conplément d'adresse" size="40"></td>
            </tr>
        </table>
        <table>
            <tr>
                <td><input type="text" name="cp" placeholder="Code Postal" size="12"></td>
                <td><input type="text" name="ville" placeholder="Ville" size="23"></td>
            </tr>
        </table>
        <table>
            <tr>
                <td><input type="text" name="pays" placeholder="Pays" size="40"></td>
            </tr>
            <tr>
                <td><input type="text" name="tel" placeholder="N° Téléphone" size="40"></td>
            </tr>
        </table>
        <h4>Informations de paiement</h4>
        <table>
            <tr>
                <td>Type de carte : </td>
                <td><input type="radio" id="visa" name="typeCarte" value="Visa"><label for="visa">
                <img src='img/logo_visa.png' alt='logo_visa' height='40'></label></td>
                <td><input type="radio" id= "mastercard" name="typeCarte" value="MasterCard"><label for="mastercard">
                <img src='img/logo_mastercard.png' alt='logo_mastercard' height='40'></label></td>
                <td><input type="radio" id="amex" name="typeCarte" value="American Express"><label for="amex">
                <img src='img/logo_amex.png' alt='logo_american_express' height='40'></label></td>
                <td><input type="radio" id="paypal" name="typeCarte" value="Paypal"><label for="paypal">
                <img src='img/logo_paypal.png' alt='logo_paypal' height='40'></label></td>
            </tr>
        </table>
        <table>
            <tr>
                <td><input type="text" name="numeroCarte" placeholder="N° Carte Bancaire" size="40"></td>
            </tr>
            <tr>
                <td><input type="text" name="titulaire" placeholder="Nom du titualaire de la carte" size="40"></td>
            </tr>
        </table>
        <table>
            <tr>
                <td><input type="date" name="expiration"></td>
                <td><input type="text" name="cvc" placeholder="Code de sécurité" size="19"></td>
            </tr>
        </table>
        <table>
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
</body>
</html>