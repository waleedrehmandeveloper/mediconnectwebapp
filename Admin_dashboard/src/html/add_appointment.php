<?php
session_start();
if (
    !isset($_SESSION['aname']) ||
    !isset($_SESSION['role']) ||
    $_SESSION['role'] !== 'admin' ||
    !isset($_SESSION['admin_mail'])
) {
    header('Location: signin.php');
    exit();
}
$admin_mail = $_SESSION['admin_mail'];
$admin_name = $_SESSION['aname'];
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

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.php">
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
      <div class="row">
         <div class="container py-5">
    <h2 class="mb-4">Add New Appointment</h2>

    <form action="add_appointment.php" method="POST" class="bg-white p-4 rounded shadow-sm">
      <div class="row g-3">
        <!-- Patient Name -->
        <div class="col-md-6">
          <label class="form-label">Patient Name</label>
          <input type="text" class="form-control" name="patient" required>
        </div>

        <!-- Patient Email -->
        <div class="col-md-6">
          <label class="form-label">Patient Email</label>
          <input type="email" class="form-control" name="patient_email">
        </div>

        <!-- Doctor Name -->
        <div class="col-md-6">
          <label class="form-label">Doctor Name</label>
          <input type="text" class="form-control" name="doctor" required>
        </div>

        <!-- Specialization -->
        <div class="col-md-6">
          <label class="form-label">Specialization</label>
          <input type="text" class="form-control" name="specialization">
        </div>

        <!-- Date -->
        <div class="col-md-6">
          <label class="form-label">Appointment Date</label>
          <input type="date" class="form-control" name="date" required>
        </div>

        <!-- Time -->
        <div class="col-md-6">
          <label class="form-label">Appointment Time</label>
          <input type="time" class="form-control" name="time" required>
        </div>

        <!-- Status -->
        <div class="col-md-6">
          <label class="form-label">Status</label>
          <select class="form-select" name="status" required>
            <option value="Scheduled">Scheduled</option>
            <option value="Completed">Completed</option>
            <option value="Cancelled">Cancelled</option>
          </select>
        </div>

        <!-- Notes -->
        <div class="col-md-12">
          <label class="form-label">Additional Notes</label>
          <textarea class="form-control" name="notes" rows="3" placeholder="Optional..."></textarea>
        </div>
      </div>

      <!-- Buttons -->
      <div class="mt-4 d-flex justify-content-between">
        <a href="appointment.php" class="btn btn-secondary">Back to Dashboard</a>
        <button type="submit" class="btn btn-success">Save Appointment</button>
      </div>
    </form>
  </div>
     </div>
    </div>
        <div class="py-6 px-6 text-center">
          <p class="mb-0 fs-4">Design and Developed by <a href="https://adminmart.com/" target="_blank"
              class="pe-1 text-primary text-decoration-underline">AdminMart.com</a>Distributed by <a href="https://themewagon.com/" target="_blank"
              class="pe-1 text-primary text-decoration-underline">ThemeWagon</a></p>
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