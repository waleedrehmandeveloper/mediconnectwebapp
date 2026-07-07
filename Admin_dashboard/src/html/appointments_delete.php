<?php
  $id = $_GET['id'];
  include("connection.php");

  $query = "delete from appointments where id = $id";
  $result = mysqli_query($conn,$query);

  if($result){
    echo"
      <script>
        alert('Appointment delete succesfully');
        window.location.href = 'appointment.php';
      </script>
    ";
  }
?>