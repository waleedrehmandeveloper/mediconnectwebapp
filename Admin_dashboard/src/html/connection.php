<?php
$hostname="localhost";
$server="root";
$pass="";
$database="ecommercewebsite";

$conn= new mysqli($hostname,$server,$pass,$database);
if(isset($conn)){
    echo "DataBase connected successfully".mysqli_error($conn);
    exit();
}
?>