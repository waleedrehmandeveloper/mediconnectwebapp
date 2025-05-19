<?php
session_start();
if (
    !isset($_SESSION['dname']) || 
    !isset($_SESSION['role']) || 
    $_SESSION['role'] !== "doctor"
) {
    header("Location: index.php");
    exit();
}
$doctor_name = $_SESSION['dname'];
$doctorid= $_SESSION['doctor_id'];
include("connection.php");
$query = "select * from doctor_register where id = $doctorid";
$result = mysqli_query($conn,$query);
$fresult= mysqli_fetch_assoc($result);
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SeoDash Free Bootstrap Admin Template by Adminmart</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/seodashlogo.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
  <link rel="stylesheet" href="../assets/css/dash.css" />
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
        <div class="row">
  <!-- Summary Cards -->
  <div class="col-md-4 mb-4">
    <div class="card text-center shadow-sm">
      <div class="card-body">
        <h5 class="card-title">Total Appointments</h5>
        <h2 class="text-primary">12</h2>
      </div>
    </div>
  </div>
  <div class="col-md-4 mb-4">
    <div class="card text-center shadow-sm">
      <div class="card-body">
        <h5 class="card-title">Accepted</h5>
        <h2 class="text-success">8</h2>
      </div>
    </div>
  </div>
  <div class="col-md-4 mb-4">
    <div class="card text-center shadow-sm">
      <div class="card-body">
        <h5 class="card-title">Rejected</h5>
        <h2 class="text-danger">4</h2>
      </div>
    </div>
  </div>

  <!-- Doctor Mini Profile -->
  <div class="col-lg-4 mb-4">
    <div class="card shadow-sm">
      <div class="card-body text-center">
      <img style="width: 100px; height: 100px; object-fit: cover;" src="<?php echo $fresult['profile_pic']; ?>" alt="Doctor Image" class="profile-avatar rounded-circle mb-2">
        <h5 class="card-title">Dr. Waleed Rehman</h5>
        <p class="text-muted mb-1">Cardiologist</p>
        <p class="text-muted small">Faisalabad, Pakistan</p>
        <a href="profile.php" class="btn btn-sm btn-outline-primary">View Profile</a>
      </div>
    </div>
  </div>

  <!-- Upcoming Appointments -->
  <div class="col-lg-8 mb-4">
    <div class="card shadow-sm">
      <div class="card-body">
        <h5 class="card-title">Upcoming Appointments</h5>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead class="table-light">
              <tr>
                <th>Patient</th>
                <th>Date</th>
                <th>Time</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Ali Raza</td>
                <td>2025-05-22</td>
                <td>10:00 AM</td>
                <td><span class="badge bg-warning">Pending</span></td>
              </tr>
              <tr>
                <td>Fatima Noor</td>
                <td>2025-05-23</td>
                <td>02:00 PM</td>
                <td><span class="badge bg-success">Accepted</span></td>
              </tr>
              <tr>
                <td>Hassan Khan</td>
                <td>2025-05-24</td>
                <td>11:30 AM</td>
                <td><span class="badge bg-danger">Rejected</span></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Patient Feedback -->
  <div class="col-lg-12 mb-4">
    <div class="card shadow-sm">
      <div class="card-body">
        <h5 class="card-title">Recent Feedback</h5>
        <ul class="list-group">
          <li class="list-group-item">
            <strong>Ayesha S.</strong> <span class="text-muted">said:</span> Great experience! Very professional. ⭐⭐⭐⭐⭐
          </li>
          <li class="list-group-item">
            <strong>Imran N.</strong> <span class="text-muted">said:</span> Doctor was very helpful and kind. ⭐⭐⭐⭐
          </li>
          <li class="list-group-item">
            <strong>Zainab A.</strong> <span class="text-muted">said:</span> Satisfied with consultation. ⭐⭐⭐⭐
          </li>
        </ul>
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