<!DOCTYPE html>
<html>



<?php include 'includes/head.php'; ?>


<body>
    <?php include 'includes/header.php'; ?>


    <div id="inscription" class="mt-5">
        <h1 class="text-center pt-5 pb-4">Interface de paiement EBAY ECE</h1>
        <form action="verif_paiement.php" method="post">
            <h5 class="text-center pt-3 pb-2">Informations de paiement</h5>
            <table align="center" width="75%">
                <tr>
                    <td>Type de carte : </td>
                    <td><input type="radio" id="visa" name="TypeCarte" value="visa"><label for="visa">
                            <img src="images/paiement/logo_visa" alt="logo_visa" height="40"></label></td>
                    <td><input type="radio" id="mastercard" name="TypeCarte" value="mastercard"><label for="mastercard">
                            <img src="images/paiement/logo_mastercard" alt="logo_masteracrd" height="40"></label></td>
                    <td><input type="radio" id="amex" name="TypeCarte" value="amex"><label for="amex">
                            <img src="images/paiement/logo_amex" alt="logo_american_express" height="40"></label></td>
                    <td><input type="radio" id="paypal" name="TypeCarte" value="paypal"><label for="paypal">
                            <img src="images/paiement/logo_paypal" alt="logo_paypal" height="40"></label></td>
                </tr>
            </table>
            <table align="center" width="75%">
                <tr>
                    <td><input class="container-fluid mb-1" type="text" name="NumeroCarte" placeholder="N° Carte Bancaire" size="40"></td>
                </tr>
                <tr>
                    <td><input class="container-fluid mb-1" type="text" name="NomTitulaire" placeholder="Nom du titualaire de la carte" size="40"></td>
                </tr>
            </table>
            <table align="center" width="75%">
                <tr>
                    <td><label for="expiration">Date d'expiration :</label></td>
                    <td><input class="container-fluid mb-1" type="date" name="Expiration"></td>
                    <td><input class="container-fluid mb-1" type="text" name="CVC" placeholder="Code de sécurité"></td>
                </tr>
            </table>
            <table align="center" width="75%">
                <tr>
                    <td><input type="checkbox" name="Clause"></td>
                    <td><label for="clause"> Pour les achats dans la catégorie "Meilleure offre", je reconnais être dans l'obligation
                            d'acheter l'article après acceptation de mon offre par le vendeur.</label></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="button" value="Payer">
                    </td>
                </tr>
            </table><br><br>
        </form>
    </div>
    <br><br>


    <?php include 'includes/footer.php'; ?>

</body>

</html>