<?php
$serverName="localhost";
$serverUserName="root";
$pass="";
$dbName="productsdb";
$connection = mysqli_connect($serverName, $serverUserName, $pass,$dbName); // Establishing Connection with Server..
if($connection){
//    echo"connection established";
}
else{
    //echo "Connection Failed";
    echo"<script>conError()</script>";
}
?>
