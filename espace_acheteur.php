<!DOCTYPE html>
<html>

    <?php include 'includes/head.php'; ?>


    <body>

        <?php include 'includes/header.php';     
        
        $id = $_SESSION["id"];

        include 'includes/bdd.php';

        if ($db_found) {
            $sql = "SELECT * FROM acheteur WHERE IdAcheteur LIKE '$id'"; 
            $result = mysqli_query($db_handle, $sql);

            $data = mysqli_fetch_assoc($result); ?>
                <div id="espace_acheteur" class="mt-5">
                <h1 class="text-center pt-5 pb-3">Mes infos</h1>
                <table align="center" width="55%">
                    <tr>
                        <td class="d-flex justify-content-center pb-2"><b>Client n° <?php echo $data['IdAcheteur'] . "<br>"; ?></b></td>
                    </tr>
                    <tr>
                        <td class="d-flex justify-content-center pb-2">Nom : <?php echo $data['Nom'] . "<br>"; ?></td>
                    </tr>
                    <tr>
                        <td class="d-flex justify-content-center pb-2">Prénom : <?php echo $data['Prenom'] . "<br>"; ?></td>
                    </tr>
                    <tr>
                        <td class="d-flex justify-content-center pb-2">Email : <?php echo $data['Email'] . "<br>"; ?></td>
                    </tr>
                    <tr>
                        <td class="d-flex justify-content-center pb-2">N° Téléphone : <?php echo $data['Telephone'] . "<br>"; ?></td>
                    </tr>
                </table>
                <h3 class="text-center pt-5 pb-3">Mes coordonnées de livraison</h3>
                <table align="center" width="55%">
                    <tr>
                        <td class="d-flex justify-content-center pb-2"><?php echo $data['Adresse1']; ?></td>
                    </tr>
                    <?php if ($data['Adresse2'] !== "") { ?>
                        <tr>
                            <td class="d-flex justify-content-center pb-2"><?php echo $data['Adresse2']; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                    <tr>
                        <td class="d-flex justify-content-center pb-2"><?php echo $data['CP'] . " " . $data['Ville']; ?></td>
                    </tr>
                    <tr>
                        <td class="d-flex justify-content-center pb-2"><?php echo $data['Pays'] . "<br><br>"; ?></td>
                    </tr>
                    <tr>
                        <td class="d-flex justify-content-center pb-2"><a href="modifier_infos_client.php"><input type="button" value="Modifier mes infos"></input></a></td>
                    </tr>
                </table><br><br>
                </div>
        <?php
        }
            
    ?>  
    </body>
    <br></br>
    <br></br>
    <br></br>
    <?php include 'includes/footer.php'; ?>
</html>        
                        
