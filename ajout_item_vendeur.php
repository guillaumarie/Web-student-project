<!DOCTYPE html>
<html>

    <?php include 'includes/head.php'; ?>
        
    <script type="text/javascript">
        $(document).ready(function () {
            $("#encheres").hide();
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
            $("#type").click(function () {
                if (type.value === "enchere") {
                    $("#encheres").show();
                } else {
                    $("#encheres").hide();
                }
            });
            // Obtenir la date du jour
            // https://stackoverflow.com/questions/32378590/set-date-input-fields-max-date-to-today
            var maintenant = new Date();
            var jour = maintenant.getDate();
            var mois = maintenant.getMonth()+1;
            var an = maintenant.getFullYear();
            if(jour < 10){
                jour = '0' + jour;
            }
            if(mois < 10){
                mois = '0' + mois;
            }
            maintenant = an + '-' + mois + '-' + jour;
            document.getElementById("datedebut").setAttribute("min", maintenant);
            // Fin source
            $("#datefin").click(function () {
                var debut = document.getElementById("datedebut").value;
                document.getElementById("datefin").setAttribute("min", debut);
            });
        });
    </script>


    <body class="pb-5">
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
                        <td><select class="container-fluid mb-1" id="type" name="typeAchat">
                        <option value="">Choisir un mode d'achat</option>
                        <option value="immediat">Achat immédiat</option>
                        <option value="offre">Meilleure offre</option>
                        <option value="enchere">Vente aux enchères</option>
                        <option value="immediat_offre">Achat immédiat ou meilleure offre</option></td>
                    </tr>
                </table>
                <table align="center" id="encheres" width="50%">
                    <tr>
                        <td><label for="debut"><i>Début de la vente</i></label></td>
                        <td><input class="container-fluid mb-1" type="date" id="datedebut" name="debut"></td>
                    </tr>
                    <tr>
                        <td><label for="fin"><i>Fin de la vente</i></label></td>
                        <td><input class="container-fluid mb-1" type="date" id="datefin" name="fin"></td>
                    </tr>
                </table>
                <br>
                <table align="center" width="50%">
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
                        <td><label for="photosProduit" align="center">Ajouter au moins une photo (maximum 5) :</label></td>
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
                        <td><label for="videoProduit" align="center">Ajouter une video (optionnel) :</label></td>
                    </tr>
                    <tr>
                        <td><input class="container-fluid mb-1" type="file" name="video"></td>
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
    
    </body>

</html>