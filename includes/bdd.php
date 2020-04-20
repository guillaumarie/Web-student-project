<?php
    $database = "ebay_ece";
    $db_handle = mysqli_connect('127.0.0.1:3306', 'root', 'root');
    $db_found = mysqli_select_db($db_handle, $database);
?>