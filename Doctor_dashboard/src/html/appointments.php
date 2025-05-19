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
      include("header.php");
      ?>
      <!--  Header End -->
       <div class="container-fluid">
    <div class="row">
      <h3>Appointments</h3>
    <table class="table table-bordered table-striped">
      <thead class="table-dark text-center">
        <tr>
          <th>User Name</th>
          <th>Location</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="text-center">
        <tr>
          <td>Ali Khan</td>
          <td>Lahore</td>
          <td>
            <button class="btn btn-success btn-sm me-2">Accept</button>
            <button class="btn btn-danger btn-sm">Reject</button>
          </td>
        </tr>
        <tr>
          <td>Sara Ahmed</td>
          <td>Karachi</td>
          <td>
            <button class="btn btn-success btn-sm me-2">Accept</button>
            <button class="btn btn-danger btn-sm">Reject</button>
          </td>
        </tr>
        <tr>
          <td>Faisal Raza</td>
          <td>Islamabad</td>
          <td>
            <button class="btn btn-success btn-sm me-2">Accept</button>
            <button class="btn btn-danger btn-sm">Reject</button>
          </td>
        </tr>
      </tbody>
    </table>
    </div>
  </div>       
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>