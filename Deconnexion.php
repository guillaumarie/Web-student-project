<?php

session_start();
$idAcheteur = isset($_SESSION["id"])? $_SESSION["id"] : "";
$database = "ebay_ece";
$db_handle = mysqli_connect('127.0.0.1:3308', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
if ($db_found) {
    $sqlDelete = "DELETE FROM panier WHERE IdAcheteur LIKE '$idAcheteur'";
    $result = mysqli_query($db_handle, $sqlDelete);
}
unset($_SESSION);
session_destroy();
header('Location: accueil.php');
exit();


?>
