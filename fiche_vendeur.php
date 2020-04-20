<!DOCTYPE html>
<html>

    <?php include 'includes/head.php'; ?>


    <body>

        <?php include 'includes/header.php'; 
            
        
        $id = isset($_SESSION["id"])? $_SESSION["id"] : "";
        
        if($id ) {
            include 'includes/bdd.php';

            if ($db_found) {
                $sql = "SELECT * FROM vendeur WHERE IdVendeur LIKE '$id'"; 
                $result = mysqli_query($db_handle, $sql);
            } 
            while ($data = mysqli_fetch_assoc($result)) {
                echo'
                    <div id="fiche_vendeur" class="mt-5">
                    <h1 class="text-center pt-5 pb-4"> Mes infos</h1>
                    <table class="d-flex justify-content-center" align="center" width="55%">
                        <tr>
                            <td class="pb-2"><img src="'. $data['PhotoProfil'] . '" height="300"/><br></td>
                        </tr>
                    </table>
                    <br>
                    <table class="d-flex justify-content-center" align="center" width="55%">
                        <tr>
                            <td class="d-flex justify-content-center" class="pb-4"><b>Vendeur n° '. $data['IdVendeur'] . '<br></b></td>
                        </tr>

                        <tr>
                            <td class="d-flex justify-content-center" class="pb-2">Nom : ' . $data['Nom'] . '<br></td>
                        </tr>
                        <tr>
                            <td class="d-flex justify-content-center" class="pb-2">Prénom : ' . $data['Prenom'] . '<br></td>
                        </tr>
                        <tr>
                            <td class="d-flex justify-content-center" class="pb-3"> Email :  '. $data['Email'] . '<br></td>
                        </tr>
                    </table>
                    <br>
                    </div>
                    <table class="d-flex justify-content-center" align="center" width="100%">
                        <tr>
                            <td class="pb-2"><img src="'. $data['ImageFond'] . '" width="100%"/><br></td>
                        </tr>
                    </table>
                    <br>
                    ';
            }
        }
            
    ?>  
    </body>
    <br></br>
    <br></br>
    <br></br>
    <?php include 'includes/footer.php'; ?>
</html>        
                        
