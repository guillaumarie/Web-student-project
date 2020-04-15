<?php session_start(); ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Ebay ECE</title>
        <meta charset="utf-8">
    </head>
<body>
    <h1>Vendre un produit</h1>
    <h2>Informations sur le produit</h2>
    <form action="ajout_item_vendeur_back.php" method="post">
        <table>
            <tr>
                <td><select name="categorie" required>
                    <option value="">Choisir une catégorie</option>
                    <option value="ferraille">Ferraille ou Trésor</option>
                    <option value="musee">Bon pour le Musée</option>
                    <option value="vip">Accessoire VIP</option>
                </select></td>
            </tr>
            <tr>
                <td><input type="text" name="nom" placeholder="Nom du produit" size="30"></td>
            </tr>
            <tr>
                <td><input type="text" name="description" placeholder="Description" size="30"></td>
            </tr>
            <tr>
                <td><label for="photoProduit">Ajouter des photos de votre produit :</label></td>
            </tr>
            <tr>
                <td><input type="file" name="photoProduit" multiple></td>
            </tr>
            <tr>
                <td><input type="number" name="prix" placeholder="Prix" size="10"> €</td>
            </tr>
            <tr>
                <td><select name="achat" required>
                    <option value="">Choisir un type de vente</option>
                    <option value="ferraille">Ferraille ou Trésor</option>
                    <option value="musee">Bon pour le Musée</option>
                    <option value="vip">Accessoire VIP</option>
                </select></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="button" value="Mettre en vente">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>