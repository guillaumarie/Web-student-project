<!DOCTYPE html>
<html>


    <?php include 'includes/head.php'; ?>


<body>
    <?php include 'includes/header.php'; ?>


<?php
    $id = isset($_SESSION["id"])? $_SESSION["id"] : "";
    $database = "ebay_ece";

        $db_handle = mysqli_connect('127.0.0.1:3308', 'root', '');
        $db_found = mysqli_select_db($db_handle, $database);
        if ($db_found) {
            $id = isset($_GET['id']) ? $_GET['id'] : "";
            $sql = "SELECT * FROM item WHERE IdItem LIKE '$id'";
            $result = mysqli_query($db_handle, $sql);
        }
    ?>
      

     
    
      <div class="container-fluid text-center">
        <div class="row content">

       <?php while ($data = mysqli_fetch_assoc($result)) {?>

        
            <div class="col-sm-2 sidenav">
                <h3>Catégorie</h3>
                <br>
                <p><?php echo $data['Nom']?></p>
            </div>
            <div class="col-sm-8 text-left">
                <h1 align="center"><?php echo $data['Categorie']; ?></h1>
                <p align="center"><img src="<?php $photo = $data['Photo1']?>;" width="600" height="400" /></p>
                
                <h3>Description</h3>
                <p><?php echo $data['Description'];?></p>
            </div>
            <div class="col-sm-2 sidenav">
                <div class="well">
                    <h3><?php echo $data['TypeAchat']; ?></h3>
                </div>
                <div class="well">
                    <p>prix initial : <?php echo $data['Prix']; ?>€</p>
                </div>
                <div class="well">
                    <td><input class="container-fluid mb-1" type="text" name="enchere_max" placeholder="votre enchère" size="18"></td>
                </div>
                <div>
            
                    <input type="submit" name="button" value="Participer">  
                </div>
            </div>
            <?php }
            ?>
        </div>
    </div>

    <br></br>
    <?php include 'includes/footer.php'; ?>

</body>
</html>

