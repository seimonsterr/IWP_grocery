<?php
//to execute query
     //defining constants
     define('LOCALHOST','localhost');
     define('DB_USERNAMe','root');
     define('DB_PASSWORD','');
     define('DB_NAME','grocery');
    //by default uname is root and password is blank
    $conn=mysqli_connect(LOCALHOST,root,DB_PASSWORD) or die(mysqli_error());
    //we need to give our db name
    $db_select=mysqli_select_db($conn,DB_NAME) or die(mysqli_error());

?>