  <?php  
  session_start(); 

  include("connection.php");

  $patient_id = $_SESSION['patientid'];

  $selectquery = "SELECT * FROM patient_register WHERE id = $patient_id";

  $showresult = mysqli_query($conn, $selectquery);

  if (!$showresult) {
    die("Query Failed: " . mysqli_error($conn));
  }
  $patientdata = mysqli_fetch_assoc($showresult);
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

</head>
  <style>
    .profile-banner {
      background-image: url('https://www.bootdey.com/image/900x200');
      background-size: cover;
      background-position: center;
      height: 200px;
      position: relative;
    }

    .profile-avatar {
      width: 130px;
      height: 130px;
      border-radius: 50%;
      border: 4px solid #fff;
      position: absolute;
      bottom: -65px;
      left: 30px;
      object-fit: cover;
    }

    .profile-content {
      margin-top: 90px;
    }

    .info-label {
      font-weight: 600;
      color: #555;
    }

    .info-value {
      color: #333;
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
          <a href="index.php" class="text-nowrap logo-img">
              <img src="<?php echo $patientdata['profile_pic'] ?>" alt="Banner Picture" class="profile-avatar">
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
     <div class="profile-banner">
    <img src="<?php echo $patientdata['profile_pic'] ?>" alt="Profile Picture" class="profile-avatar">
  </div>
  <div class="container bg-white p-4 rounded shadow profile-content">
    <h4 class="mb-4">Patient Profile</h4>
    <div class="row mb-3">
      <div class="col-md-4 info-label">Full Name:</div>
      <div class="col-md-8 info-value"><?php echo $patientdata['name'] ?></div>
    </div>
    <div class="row mb-3">
      <div class="col-md-4 info-label">Contact Number:</div>
      <div class="col-md-8 info-value"><?php echo $patientdata['contact'] ?></div>
    </div>
    <div class="row mb-3">
      <div class="col-md-4 info-label">Email:</div>
      <div class="col-md-8 info-value"><?php echo $patientdata['email'] ?></div>
    </div>
    <div class="row mb-3">
      <div class="col-md-4 info-label">Gender:</div>
      <div class="col-md-8 info-value"><?php echo  $patientdata['gender'] ?></div>
    </div>
    <div class="row mb-3">
      <div class="col-md-4 info-label">City:</div>
      <div class="col-md-8 info-value"><?php echo  $patientdata['city'] ?></div>
    </div>
    <div class="row mb-3">
      <div class="col-md-4 info-label">Address:</div>
      <div class="col-md-8 info-value">Street 12, Model Town, Lahore</div>
    </div>
    <div class="text-end mt-4">
      <a href="edit_profile.php" class="btn btn-outline-primary">Edit Profile</a>
    </div>
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