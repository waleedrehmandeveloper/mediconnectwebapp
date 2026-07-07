<?php
    include("connection.php");

    $id = $_GET['id'];
    $query = "delete from doctor_register where id = $id";
    $result = mysqli_query($conn,$query);

   echo"
    <script>
        alert('row affected');
        window.location.href= 'doctor.php';
    </script>
   ";
?>
?>