<?php
    include("connection.php");
   $id = $_GET['id'];
   $query = "delete from medicontact where id= $id";
   $result = mysqli_query($conn,$query);

   echo"
    <script>
        alert('row affected');
        window.location.href = 'contact_list.php';
    </script>
   ";
?>
?>