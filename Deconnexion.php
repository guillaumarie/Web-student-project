<?php

session_start();
$idAcheteur = isset($_SESSION["id"])? $_SESSION["id"] : "";
include 'includes/bdd.php';
if ($db_found) {
    $sqlDelete = "DELETE FROM panier WHERE IdAcheteur LIKE '$idAcheteur'";
    $result = mysqli_query($db_handle, $sqlDelete);
}
unset($_SESSION);
session_destroy();
header('Location: accueil.php');
exit();


?>
