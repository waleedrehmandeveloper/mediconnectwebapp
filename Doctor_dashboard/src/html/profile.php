<?php
session_start();
$doctorid= $_SESSION['doctor_id'];
include("connection.php");
$query = "select * from doctor_register where id = $doctorid";
$result = mysqli_query($conn,$query);
$fresult= mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Doctor Profile</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 5 CDN -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SeoDash Free Bootstrap Admin Template by Adminmart</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/seodashlogo.png" />
  <link rel="stylesheet" href="../../node_modules/simplebar/dist/simplebar.min.css">
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
  <link rel="stylesheet" href="../assets/css/dash.css" />
  <style>
    .profile-banner {
      background-image: url('https://st4.depositphotos.com/9999814/24062/i/450/depositphotos_240620978-stock-photo-male-doctor-standing-hospital-office.jpg');
      background-size: cover;
      background-position: center;
      height: 200px;
      position: relative;
      border-bottom-left-radius: 20px;
      border-bottom-right-radius: 20px;
    }
    .profile-avatar {
      width: 140px;
      height: 140px;
      border-radius: 50%;
      object-fit: cover;
      border: 4px solid #fff;
      position: absolute;
      top: 50%;
      left: 30px;
      transform: translateY(-50%);
      background-color: #fff;
    }
    .profile-text {
      position: absolute;
      top: 50%;
      left: 190px;
      transform: translateY(-50%);
      color: white;
    }
    .profile-text h1 {
      margin: 0;
      color: black;
      font-weight: 700;
    }
@media (max-width: 500px) {
  .profile-text h1 {
    margin: 0;
    color: black;
    font-weight: 600;
    font-size: 24px; 
  }
}
    .profile-text span {
      font-size: 19px;
      color: black;
    }
  </style>
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
  <!-- Profile Banner -->
   <div class="container-fluid">
<div class="profile-banner container position-relative py-5" style="position: relative;">
   <img src="<?php echo $fresult['profile_pic']; ?>" alt="Doctor Image" class="profile-avatar">
    <div class="profile-text">
      <h1><?php echo $fresult['name'] ?></h1>
      <span><?php echo $fresult['category'] ?> - <?php echo $fresult['location'] ?></span>
    </div>

    <!-- Hidden file input -->
    <input type="file" id="fileUpload" style="display:none;" />

    <!-- Upload button -->
    <button type="button" id="uploadBtn" style="
    position: absolute;
    bottom: 15px;
    right: 15px;
    padding: 12px 25px;
    font-size: 16px;
    font-weight: 600;
    color: white;
    background-color: #007bff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    transition: background-color 0.3s ease;
">
      Upload
    </button>
</div>

  <!-- Doctor Details Section -->
<div class="container mt-5">
  <div class="card shadow-sm p-4">
    <div class="row">
      <div class="col-md-6 mb-4">
        <h4 class="mb-3">Doctor Information</h4>
         <!-- SHOW DATA PHP CODE -->
          <?php
           include("connection.php");
           $showquery = "select * from doctor_availiblity";
           $showresult = mysqli_query($conn,$showquery);
          ?>
  <!-- SHOW DATA PHP CODE -->
        <h5>Availability</h5>
        <table class="table table-bordered w-75">
          <thead>
            <tr>
              <th>Day</th>
              <th>From</th>
              <th>To</th>
            </tr>
          </thead>
          <tbody>
           <tr>
             <?php
   foreach ($showresult as $data) {
      echo "
        <tr>
          <td>{$data['available_day']}</td>
          <td>{$data['available_time_from']}</td>
          <td>{$data['available_time_to']}</td>
        </tr>
      ";
    }
    ?>
           </tr>
          </tbody>
        </table>
      </div>

      <!-- Doctor Info Right Side -->
      <div class="col-md-6 mb-4">
        <h4 class="mb-3">Professional Details</h4>
        <p><strong>Qualification: </strong><?php echo $fresult['qualification']?></p>
        <p><strong>Experience:</strong> 10+ years of clinical practice</p>
        <p><strong>Clinic:</strong> Rehman Dental Care, Faisalabad</p>

        <hr>

        <!-- Phone, Location, Gender moved here -->
        <p><strong>Phone: </strong><?php echo $fresult['phone']?></p>
        <p><strong>Location: </strong><?php echo $fresult['location']?></p>
        <p><strong>Gender: </strong><?php echo $fresult['gender']?></p>

        <a href="#" class="btn btn-primary mt-3">Book Appointment</a>
      </div>
    </div>

    <!-- Doctor Bio -->
    <div class="mt-4">
      <h4>Doctor Bio</h4>
      <p>
        <?php echo $fresult['bio']?>
      </p>
    </div>
  </div>
</div>
</div>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
   <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
  <script>
  const uploadBtn = document.getElementById('uploadBtn');
  const fileInput = document.getElementById('fileUpload');

  uploadBtn.addEventListener('click', () => {
    fileInput.click();
  });

  // Optional: handle file selection
  fileInput.addEventListener('change', () => {
    if (fileInput.files.length > 0) {
      alert(`Selected file: ${fileInput.files[0].name}`);
    }
  });
</script>
</body>
</html>
