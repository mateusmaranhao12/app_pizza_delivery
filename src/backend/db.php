<?php 

    $db_conn = new mysqli("localhost", "root", "", "app_pizza_delivery");

    if ($db_conn->connect_error) {
        die("DataBase Connection failed: " . $db_con->connect_error);
    }

?>