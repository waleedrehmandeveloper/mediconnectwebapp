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
          <a href="../../../index.php" class="text-nowrap logo-img">
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
   <div class="alert alert-info shadow-sm rounded">
  <strong>Welcome Dr. <?php echo $doctor_name; ?>!</strong> Here's an overview of your day.
  </div>
   <?php
   $totalQuery = "SELECT COUNT(*) AS total FROM appointments WHERE doctor_id = $doctorid";
   $totalResult = mysqli_query($conn, $totalQuery);
   $total = mysqli_fetch_assoc($totalResult)['total'];
   ?>
  <div class="col-md-4 mb-4">
    <div class="card text-center shadow-sm">
      <div class="card-body">
        <h5 class="card-title">Total Appointments</h5>
        <h2 class="text-primary"><?php echo $total ?></h2>
      </div>
    </div>
  </div>
   <?php
   $acceptQuery = "SELECT COUNT(*) AS accept FROM appointments WHERE doctor_id = $doctorid AND status = 'Accepted'";
   $acceptResult = mysqli_query($conn, $acceptQuery);
   $accept = mysqli_fetch_assoc($acceptResult)['accept'];
   ?>
  <div class="col-md-4 mb-4">
    <div class="card text-center shadow-sm">
      <div class="card-body">
        <h5 class="card-title">Accepted</h5>
        <h2 class="text-success"><?php echo $accept ?></h2>
      </div>
    </div>
  </div>
   <?php
   $rejectQuery = "SELECT COUNT(*) AS accept FROM appointments WHERE doctor_id = $doctorid AND status = 'Rejected'";
   $rejectResult = mysqli_query($conn, $rejectQuery);
   $reject = mysqli_fetch_assoc($rejectResult)['accept'];
   ?>
  <div class="col-md-4 mb-4">
    <div class="card text-center shadow-sm">
      <div class="card-body">
        <h5 class="card-title">Rejected</h5>
        <h2 class="text-danger"><?php echo $reject ?></h2>
      </div>
    </div>
  </div>

  <!-- Doctor Mini Profile -->
  <div class="col-lg-4 mb-4">
    <div class="card shadow-sm">
      <div class="card-body text-center">
      <img style="width: 100px; height: 100px; object-fit: cover;" src="imagedata/<?php echo $fresult['profile_pic']; ?>" alt="Doctor Image" class="profile-avatar rounded-circle mb-2">
        <h5 class="card-title"><?php echo $fresult['name']; ?></h5>
        <p class="text-muted mb-1"><?php echo $fresult['category']; ?></p>
        <p class="text-muted small"><?php echo $fresult['location'] ?>- Pakistan</p>
        <a href="profile.php" class="btn btn-sm btn-outline-primary">View Profile</a>
      </div>
    </div>
  </div>

  <!-- Upcoming Appointments -->
    <?php
      $query = "SELECT 
                appointments.appointment_day AS app_date,
                appointments.appointment_time AS app_time,
                appointments.status,
                patient_register.name AS pname
              FROM appointments
              JOIN patient_register ON appointments.patient_id = patient_register.id
              WHERE appointments.status = 'Pending'
              ORDER BY appointments.created_at DESC
              LIMIT 5";

      $result = mysqli_query($conn, $query);
    ?>


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
            <?php if (mysqli_num_rows($result) > 0): ?>
              <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                  <td><?php echo htmlspecialchars($row['pname']); ?></td>
                  <td><?php echo htmlspecialchars($row['app_date']); ?></td>
                  <td><?php echo htmlspecialchars($row['app_time']); ?></td>
                  <td>
                    <span class="badge bg-warning"><?php echo $row['status']; ?></span>
                  </td>
                </tr>
              <?php endwhile; ?>
            <?php else: ?>
              <tr><td colspan="4" class="text-center">No new appointments found.</td></tr>
            <?php endif; ?>
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
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
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