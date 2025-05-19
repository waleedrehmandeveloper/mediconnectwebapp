<?php
include("connection.php");

    $id = $_GET['id'];
    $query = "delete from doctor_availiblity where id= $id";
    $result = mysqli_query($conn,$query);
    header("location: avaliblity.php");
?>