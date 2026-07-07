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
    <div class="container py-5">

      <!-- Filters -->
      <form class="row g-3 mb-4">
        <div class="col-md-3">
          <input type="text" class="form-control" placeholder="Search by Patient" name="patient">
        </div>
        <div class="col-md-3">
          <input type="text" class="form-control" placeholder="Search by Doctor" name="doctor">
        </div>
        <div class="col-md-3">
          <input type="date" class="form-control" name="date">
        </div>
        <div class="col-md-3">
          <button type="submit" class="btn btn-primary w-100">Filter</button>
        </div>
      </form>

      <!-- Appointments Table -->
      <div class="table-responsive">
       <table class="table table-bordered table-striped">
      <thead class="table-dark text-center">
        <tr>
          <th>Doctor Name</th>
          <th>Paient Name</th>
          <th>Patient Email</th>
          <th>Patient Phone</th>
          <th>Patient Phone</th>
          <th>Appointment Day</th>
          <th>Appointment status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="text-center">
 <?php
include("connection.php");
$query = "SELECT 
            appointments.*, 
            doctor_register.name AS doctor_name, 
            patient_register.name AS patient_name,
            patient_register.email AS email
          FROM appointments
          JOIN doctor_register ON appointments.doctor_id = doctor_register.id
          JOIN patient_register ON appointments.patient_id = patient_register.id
          ORDER BY appointments.id DESC";

$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query Failed: " . mysqli_error($conn));
}

if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
    $status = $row['status'];
    $badgeClass = '';

    if ($status == 'Accepted') {
        $badgeClass = 'text-success fw-bold';
    } elseif ($status == 'Rejected') {
        $badgeClass = 'text-danger fw-bold';
    } elseif ($status == 'Pending') {
        $badgeClass = 'text-warning text-dark';
    }

        echo "<tr>
                <td>".$row['doctor_name']."</td>
                <td>".$row['patient_name']."</td>
                <td>".$row['email']."</td>
                <td>".$row['phone']."</td>
                <td>".$row['appointment_day']."</td>
                <td>".$row['appointment_time']."</td>
                <td class='$badgeClass'>
                  ".$row['status']."
                </td>
                <td>
                  <a href='appointments_delete.php?id=".$row['id']."' class='btn btn-danger btn-sm me-2'>Delete</a>
                </td>
              </tr>";
                }
            } else {
                echo "<tr><td colspan='7' class='text-center'>No appointments found</td></tr>";
            }
            ?>

      </tbody>
    </table>
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