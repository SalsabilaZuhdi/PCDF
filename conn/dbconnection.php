<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "pcdf";
 
try {
   
    $dba = mysqli_connect($servername, $username, $password, $db);
     //echo "Connected successfully"; 
    }
catch(exception $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
    return $dba;

?>