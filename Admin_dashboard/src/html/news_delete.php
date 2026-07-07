<?php
    include("connection.php");
    $id = $_GET['id'];
    $query = "delete from news where id = $id";
    $result = mysqli_query($conn,$query);
    header("location: news_list.php");
?>