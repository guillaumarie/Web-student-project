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

