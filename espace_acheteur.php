<?php
session_start();
$_SESSION['verif']=0;
if($_SESSION['']!=""){
    $_SESSION['verif'] = 2;
    header('Location: connexion_acheteur.php');
    exit();
}
?>

<!DOCTYPE html>
<html>

    <head>
        <?php include 'includes/head.php'; ?>

    </head>

    <body class="pb-5">

        <?php include 'includes/header.php'; ?>

 <?php       
        
        $email = isset($_POST["email"])? $_POST["email"] : "";

        if($email ) {
            $database = "ebay_ece";
    
            $db_handle = mysqli_connect('127.0.0.1:3306', 'root', 'root');
            $db_found = mysqli_select_db($db_handle, $database);
            if ($db_found) {
                $sql = "SELECT * FROM acheteur WHERE Email LIKE '$email'"; 
                $result = mysqli_query($db_handle, $sql);
    


            }
        }
        