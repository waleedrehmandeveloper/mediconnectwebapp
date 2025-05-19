 <?php
session_start();

if (
    !isset($_SESSION['pname']) || 
    !isset($_SESSION['role']) || 
    $_SESSION['role'] !== "patient"
) {
    header("Location: ../Mediconnect/signin.php"); 
    exit();
}
  $patient_name = $_SESSION['pname'];
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SeoDash Free Bootstrap Admin Template by Adminmart</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/seodashlogo.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
   <style>
    .card-summary {
      box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
      border-left: 5px solid #0d6efd;
    }
    .activity-item {
      border-bottom: 1px solid #eee;
      padding: 10px 0;
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
      include("header.php");
     ?>
      <!--  Header End -->
      <div class="container-fluid">
        <div class="row">
            <div class="bg-light">
  <div class="container py-5">
    <h2 class="mb-4">Patient Dashboard</h2>

    <!-- Summary Cards -->
    <div class="row g-4 mb-5">
      <div class="col-md-4">
        <div class="card card-summary text-white bg-primary">
          <div class="card-body">
            <h5 class="card-title">Total Appointments</h5>
            <h3 class="card-text">15</h3>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card card-summary text-white bg-success">
          <div class="card-body">
            <h5 class="card-title">Upcoming</h5>
            <h3 class="card-text">3</h3>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card card-summary text-white bg-danger">
          <div class="card-body">
            <h5 class="card-title">Cancelled</h5>
            <h3 class="card-text">2</h3>
          </div>
        </div>
      </div>
    </div>

    <!-- Recent Activity -->
    <div class="card">
      <div class="card-header bg-white">
        <h5 class="mb-0">Recent Activity</h5>
      </div>
      <div class="card-body">
        <div class="activity-item">
          <strong>Appointment booked</strong> with Dr. Ali on <em>2025-05-20</em>
        </div>
        <div class="activity-item">
          <strong>Profile updated</strong> - phone number changed.
        </div>
        <div class="activity-item">
          <strong>Appointment cancelled</strong> with Dr. Sara on <em>2025-05-18</em>
        </div>
      </div>
    </div>
  </div>

    </div>
  </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/js/dashboard.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>