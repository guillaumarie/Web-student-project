
<!DOCTYPE html>
<html>


    
        <?php include 'includes/head.php'; ?>

    

  <body>

        <?php include 'includes/header.php'; ?>

 <?php       
        
        $email = isset($_SESSION["email"])? $_SESSION["email"] : "";
        
     

        
        if($email ) {
            $database = "ebay_ece";
    
            $db_handle = mysqli_connect('127.0.0.1:3306', 'root', 'root');
            $db_found = mysqli_select_db($db_handle, $database);
            if ($db_found) {
                $sql = "SELECT * FROM acheteur WHERE Email LIKE '$email'"; 
                $result = mysqli_query($db_handle, $sql);
    
                
           
                } 
                    
                    while ($data = mysqli_fetch_assoc($result)) {

                    echo'<div id="espace_acheteur" class="mt-5">
                    <h1 class="text-center pt-5 pb-4"> Mes infos</h1>
                    <form class="pt-2" method="post">
                        <table align="center" width="55%">
                    <tr>
                        <td class="pb-2">ID Client : '. $data['IdAcheteur'] . '<br></td>
                    </tr>
                    <tr>
                        <td class="pb-3">Nom : ' . $data['Nom'] . '<br></td>
                    </tr>
                    <tr>
                        <td class="pb-2">Prenom : ' . $data['Prenom'] . '<br></td>
                    </tr>
                    <tr>
                        <td class="pb-3"> Email :  '. $data['Email'] . '<br></td>
                    </tr>
                    <tr>
                    </table>
                    </form>
                    </div>';

               
                        
                        

                    }
                
            }
            
            ?>  
             </body>
             <br></br>
             <br></br>
             <br></br>
             <?php include 'includes/footer.php'; ?>
            </html>        
                        
