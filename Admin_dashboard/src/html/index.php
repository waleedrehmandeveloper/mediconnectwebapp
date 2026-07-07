<?php
session_start();
include("connection.php");
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
  <style>
    .card {
      border-radius: 0.5rem;
      box-shadow: 0 0.15rem 1.75rem rgb(58 59 69 / 15%);
    }
    .card-title {
      font-weight: 600;
      font-size: 1.25rem;
    }
    .progress {
      height: 0.5rem;
      border-radius: 0.25rem;
    }
    .table thead th {
      border-bottom: 2px solid #0d6efd;
    }
    .table td, .table th {
      vertical-align: middle;
    }
    .btn-primary {
      border-radius: 0.25rem;
      padding: 0.5rem 1.25rem;
    }
     .card {
      border-radius: 0.5rem;
      box-shadow: 0 0.15rem 1.75rem rgb(58 59 69 / 15%);
    }
    .card-title {
      font-weight: 600;
      font-size: 1.25rem;
    }
    .progress {
      height: 0.5rem;
      border-radius: 0.25rem;
    }
    .table thead th {
      border-bottom: 2px solid #0d6efd;
    }
    .table td, .table th {
      vertical-align: middle;
    }
    .btn-primary {
      border-radius: 0.25rem;
      padding: 0.5rem 1.25rem;
    }

    /* Summary Boxes */
    .summary-box {
      color: #fff;
      border-radius: 0.5rem;
      padding: 1.5rem;
      box-shadow: 0 0.25rem 1rem rgb(0 0 0 / 0.1);
      display: flex;
      align-items: center;
      justify-content: space-between;
      font-weight: 600;
      font-size: 1.2rem;
    }
    .summary-icon {
      font-size: 2.5rem;
      opacity: 0.8;
    }
    .summary-appointments { background: #0d6efd; }
    .summary-doctors { background: #198754; }
    .summary-patients { background: #ffc107; color: #212529; }
    .summary-revenue { background: #dc3545; }
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
       <?php
        $appointments = "SELECT COUNT(*) AS appointment FROM appointments";
        $appointmentsresult = mysqli_query($conn, $appointments);
        $appoint = mysqli_fetch_assoc($appointmentsresult)['appointment'];
        print_r($appoint)
        ?>
      <div class="container-fluid">
         <div class="row g-4 mb-4">
    <div class="col-sm-6 col-lg-3">
      <div class="summary-box summary-appointments">
        <div>
          <div>Appointments</div>
          <div class="fs-3"><?php echo $appoint ?></div>
        </div>
        <i class="bi bi-calendar-check summary-icon"></i>
      </div>
    </div>
     <?php
        $doctors = "SELECT COUNT(*) AS doctors FROM doctor_register";
        $doctorresult = mysqli_query($conn, $doctors);
        $doctor = mysqli_fetch_assoc($doctorresult)['doctors'];
        ?>
    <div class="col-sm-6 col-lg-3">
      <div class="summary-box summary-doctors">
        <div>
          <div>Doctors</div>
          <div class="fs-3"><?php echo $doctor ?></div>
        </div>
        <i class="bi bi-person-badge summary-icon"></i>
      </div>
    </div>
     <?php
        $patientquery = "SELECT COUNT(*) AS patients FROM patient_register";
        $patientresult = mysqli_query($conn, $patientquery);
        $patients = mysqli_fetch_assoc($patientresult)['patients'];
        ?>
    <div class="col-sm-6 col-lg-3">
      <div class="summary-box summary-patients">
        <div>
          <div>Patients</div>
          <div class="fs-3"><?php echo $patients ?></div>
        </div>
        <i class="bi bi-people summary-icon"></i>
      </div>
    </div>
    <?php
    include("connection.php");
    $query = "SELECT COUNT(*) as total FROM medicontact";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $totalContacts = $row['total'];
    ?>

<div class="col-sm-6 col-lg-3">
  <div class="summary-box summary-revenue">
    <div>
      <div>Contacts</div>
      <div class="fs-3"><?php echo $totalContacts; ?></div>
    </div>
    <i class="bi bi-people summary-icon"></i>
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