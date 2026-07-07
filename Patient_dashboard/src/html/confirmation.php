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
  <style>
    .info {
      background-color: #e8f5e9;
      padding: 15px;
      border-left: 5px solid #2e7d32;
      border-radius: 8px;
      margin: 20px 0;
    }

    .btn {
      display: inline-block;
      padding: 10px 20px;
      background-color: #1976d2;
      color: #fff;
      text-decoration: none;
      border-radius: 6px;
      margin-top: 20px;
      transition: background 0.3s ease;
    }

    .btn:hover {
      background-color: #125ca1;
    }
    
  </style>


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
        <?php
$query = "SELECT appointments.*, doctor_register.name AS doctor_name 
          FROM appointments
          JOIN doctor_register ON appointments.doctor_id = doctor_register.id
          WHERE appointments.patient_id = $patient_id AND appointments.status = 'Accepted'
          ORDER BY appointments.created_at DESC LIMIT 5";

$result = mysqli_query($conn, $query);
?>

<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-5">
      <div class="card shadow-sm border-0">
        <div class="card-header bg-success text-white fw-semibold">
          Appointment Notifications
        </div>
        <div class="card-body p-3" id="notifications" style="max-height: 300px; overflow-y: auto;">
          
          <?php while($row = mysqli_fetch_assoc($result)): ?>
            <div class="alert alert-success d-flex align-items-center py-2 px-3 mb-3 small shadow-sm" role="alert">
              <span class="me-2">✅</span>
              <div>
                Dr. <strong><?php echo $row['doctor_name']; ?></strong> accepted appointment <strong><?php echo $row['created_at']; ?></strong> succesfully
              </div>
            </div>
          <?php endwhile; ?>

        </div>
      </div>
    </div>
  </div>
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