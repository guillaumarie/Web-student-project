<!DOCTYPE html>
<html>
    <?php include 'includes/head.php'; ?>

    <body>
        <?php include 'includes/header.php';

        $id = $_SESSION["id"];

        $database = "ebay_ece";
        $db_handle = mysqli_connect('127.0.0.1:3306', 'root', 'root');
        $db_found = mysqli_select_db($db_handle, $database);

        if ($db_found) {
            $sql = "SELECT * FROM acheteur WHERE IdAcheteur LIKE '$id'";
            $result = mysqli_query($db_handle, $sql);
            $data = mysqli_fetch_assoc($result);
            $nom = $data["Nom"];
            $prenom = $data["Prenom"];
            $adresse1 = $data["Adresse1"];
            $adresse2 = $data["Adresse2"];
            $cp = $data["CP"];
            $ville = $data["Ville"];
            $pays = $data["Pays"];
            $tel = $data["Telephone"];

            ?>
        
            <div id="inscription" class="mt-5">
                <h1 class="text-center pt-5 pb-4">Modifier mes infos</h1>
                <form action="modifier_infos_client_back.php" method="post">
                    <h5 class="text-center pt-3 pb-2">Mes infos</h5>
                    <table align="center" width="75%">
                        <tr>
                            <td><?php echo "<input class='container-fluid mb-1' type='text' name='nom' placeholder='Nom' value='$nom' size='18'>"; ?></td>
                            <td><?php echo "<input class='container-fluid mb-1' type='text' name='prenom' placeholder='Prénom' value='$prenom' size=17'>"; ?></td>
                        </tr>
                    </table>
                    <br><h5 class="text-center pt-3 pb-2">Coordonnées de livraison</h5>
                    <table align="center" width="75%">
                        <tr>
                            <td><?php echo "<input class='container-fluid mb-1' type='text' name='adresse1' placeholder='N°, Rue' value='$adresse1' size='40'>"; ?></td>
                        </tr>
                        <tr>
                            <td><?php echo "<input class='container-fluid mb-1' type='text' name='adresse2' placeholder='Complément d adresse' value='$adresse2' size='40'>"; ?></td>
                        </tr>
                    </table>
                    <table align="center" width="75%">
                        <tr>
                            <td><?php echo "<input class='container-fluid mb-1' type='text' name='cp' placeholder='Code Postal' value='$cp' size='12'>"; ?></td>
                            <td><?php echo "<input class='container-fluid mb-1' type='text' name='ville' placeholder='Ville' value='$ville' size='23'>"; ?></td>
                        </tr>
                    </table>
                    <table align="center" width="75%">
                        <tr>
                            <td><?php echo "<input class='container-fluid mb-1' input type='text' name='pays' placeholder='Pays' value='$pays' size='40'>"; ?></td>
                        </tr>
                        <tr>
                            <td><?php echo "<input class='container-fluid mb-1' type='text' name='tel' placeholder='N° Téléphone' value='$tel' size='40'>"; ?></td>
                        </tr>
                    </table>
                    <table align="center" width="75%">
                        <tr>
                            <td colspan="2" align="center"><input type="submit" name="button" value="Modifier mes infos"></td>
                        </tr>
                    </table><br><br>
                </form>
            </div>
            <br></br>
        <?php
        } else {
            echo "Database not found";
        }

        include 'includes/footer.php'; ?>

    </body>

</html>