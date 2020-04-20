<!DOCTYPE html>
<html>


  
        <?php include 'includes/head.php'; ?>


    <body>
        <?php include 'includes/header.php'; ?>


        <div id="connexion" class="mt-5">
            <h1 class="text-center pt-5 pb-4">Connexion</h1>
            <form action="connexion_mail.php" method="post">
                <table align="center" width="55%">
                    <tr>
                        <td class="pb-2"><strong>Email :</strong></td>
                    </tr>
                    <tr>
                        <td class="pb-3"><input class="container-fluid mb-1" input type="text" name="RefAchat" placeholder="RefAchat" size="40"></td>
                    </tr>
                    <tr>
                        <td class="pb-2"><strong>Mot de Passe :</strong> </td>
                    </tr>
                    <tr>
                        <td class="pb-3"><input class="container-fluid mb-1" type="text" name="IdAcheteur" placeholder="IdAcheteur" size="40"></td>
                    </tr>
                    <tr>
                        <td class="pb-4" colspan="2" align="center">
                            <input type="submit" value="Valider">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <br><br>


        <?php include 'includes/footer.php'; ?>

    </body>

</html>