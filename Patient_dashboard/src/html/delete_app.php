<?php
include("connection.php");

$id = $_GET['id'];
$query = "DELETE FROM appointments WHERE id = $id";
$result = mysqli_query($conn, $query);

if ($result) {
    echo "
    <script>
      alert('Appointment deleted successfully');
      window.location.href = 'appointments.php';
    </script>
    ";
}
?>
