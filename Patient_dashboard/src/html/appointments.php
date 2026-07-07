<?php
include("connection.php");
session_start();
$patient_id = $_SESSION['patientid'];
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SeoDash Free Bootstrap Admin Template by Adminmart</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/seodashlogo.png" />
  <link rel="stylesheet" href="../../node_modules/simplebar/dist/simplebar.min.css">
  <link rel="stylesheet" href="../assets/css/styles.min.css" />

</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.php" class="text-nowrap logo-img">
            <img class="w-100" src="../assets/images/logos/mediconnect_logo.png" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <?php
        include('sidebar.php');
        ?>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <?php
      include('header.php');
      ?>
      <!--  Header End -->
      <div class="container-fluid">

        <div class="container my-5">
          <table class="table table-bordered table-striped">
            <thead class="table-dark text-center">
              <tr>
                <th>s.no</th>
                <th>Paient Name</th>
                <th>Doctor Name</th>
                <th>Patient Email</th>
                <th>Patient Phone</th>
                <th>Appointment Day</th>
                <th>Appointment Time</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
          <?php
$appquery = "SELECT 
    appointments.appointment_time AS apptime,
    appointments.appointment_day AS appday,
    appointments.id AS appid,
    patient_register.name AS pname,
    patient_register.email AS pemail,
    doctor_register.name AS dname,
    patient_register.contact AS pphone,
    appointments.status AS status
FROM appointments 
INNER JOIN patient_register ON appointments.patient_id = patient_register.id
INNER JOIN doctor_register ON appointments.doctor_id = doctor_register.id 
WHERE patient_register.id = $patient_id";

$appresult = mysqli_query($conn, $appquery);

if (mysqli_num_rows($appresult) > 0) {
  while ($data = mysqli_fetch_assoc($appresult)) {
    echo "<tr>
      <td>{$data['appid']}</td>
      <td>{$data['pname']}</td>
      <td>{$data['dname']}</td>
      <td>{$data['pemail']}</td>
      <td>{$data['pphone']}</td>
      <td>{$data['appday']}</td>
      <td>{$data['apptime']}</td>
      <td><span class='badge bg-success'>{$data['status']}</span></td>
      <td><a href='delete_app.php?id={$data['appid']}' class='btn btn-danger btn-sm'>Delete</a></td>
    </tr>";
  }
} else {
  echo "<tr><td colspan='9' class='text-center'>No appointments found.</td></tr>";
}
?>


            </tbody>
          </table>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
        <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
        <script src="../assets/js/sidebarmenu.js"></script>
        <script src="../assets/js/app.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>