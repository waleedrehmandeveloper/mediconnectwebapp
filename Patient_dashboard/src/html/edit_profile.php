<?php
session_start();
include("connection.php");

$patient_id = $_SESSION['patientid'];
$query = "SELECT profile_pic FROM patient_register WHERE id = $patient_id";
$showresult = mysqli_query($conn, $query); 
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
      background: url('images/patient_banner2.jpeg') no-repeat center;
      background-size: cover;
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

    .profile-section {
      margin-top: 90px;
    }

    .form-label {
      font-weight: 600;
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
        <div class="profile-banner position-relative">
         <img src="images/<?php echo $patientdata['profile_pic']; ?>" alt="Profile Picture" class="profile-avatar">
          
          <!-- Banner Upload Button -->
          <input type="file" name="banner_img" id="bannerInput" class="d-none">
      </div>
      
      <!-- Profile Form -->
      <div class="container profile-section bg-white p-4 rounded shadow">
      <h4 class="mb-4">Update Profile</h4>
     <form method="POST" enctype="multipart/form-data">
  <div class="row g-3">
    
    <div class="col-md-6">
      <label class="form-label">Full Name</label>
      <input required type="text" name="name" class="form-control" placeholder="Full Name">
    </div>

    <div class="col-md-6">
      <label class="form-label">Email</label>
      <input required type="email" name="email" class="form-control" placeholder="Email Address">
    </div>

    <div class="col-md-6">
      <label class="form-label">Contact Number</label>
      <input required type="text" name="phone" class="form-control" placeholder="Contact Number">
    </div>

    <div class="col-md-6">
      <label class="form-label">Gender</label>
      <select class="form-select" name="gender" required>
        <option selected disabled>Choose...</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
      </select>
    </div>

    <!-- ✅ New City Field -->
    <div class="col-md-6">
      <label class="form-label">City</label>
      <input required type="text" name="city" class="form-control" placeholder="Enter your city">
    </div>

    <div class="col-md-6">
      <label class="form-label">Profile Picture</label>
      <input required type="file" name="profile_pic" class="form-control">
    </div>

    <div class="col-md-6">
      <label class="form-label">New Password</label>
      <input type="password" name="password" class="form-control">
    </div>

    <div class="col-md-6">
      <label class="form-label">Confirm Password</label>
      <input type="password" name="confirm_password" class="form-control">
    </div>

  </div>

  <div class="text-end mt-4">
    <input required name="save" type="submit" class="btn btn-primary" value="Save Changes">
  </div>
</form>


  </div>
 <?php
include("connection.php");

$patient_id = $_SESSION['patientid'];
$selectquery = "select * from patient_register where id= $patient_id";
$showresult = mysqli_query($conn, $selectquery);
$patientdata = mysqli_fetch_assoc($showresult);

if (isset($_POST['save'])) {
  $fullname = $_POST['name'] ?? '';
  $contact = $_POST['phone'] ?? '';
  $gender = $_POST['gender'] ?? '';
  $email = $_POST['email'] ?? '';
  $city = $_POST['city'] ?? '';
  $pass = $_POST['password'] ?? '';
  $confirm_pass = $_POST['confirm_password'] ?? '';

  $image = $_FILES['profile_pic']['name'] ?? '';
  $tmp_name = $_FILES['profile_pic']['tmp_name'] ?? '';
  $image_name = rand(0,99) . "_" . $image; 
  $upload_folder = "images/";

  if (!empty($image) && !empty($tmp_name)) {
    move_uploaded_file($tmp_name, $upload_folder . $image_name);

    $query = "UPDATE patient_register SET updated_at= NOW(), name='$fullname', city='$city', email='$email', contact='$contact', gender='$gender', profile_pic='$image_name' WHERE id='$patient_id'";
  } else {
    $query = "UPDATE patient_register SET updated_at= NOW(), name='$fullname', email='$email', contact='$contact', gender='$gender' WHERE id='$patient_id'";
  }

  $result = mysqli_query($conn, $query);
  if ($result) {
    echo 
    "<script>alert('Profile updated successfully');
    window.location.href= 'edit_profile.php';
    </script>";
  }

  if (!empty($pass) && !empty($confirm_pass)) {
    if ($pass === $confirm_pass) {
      $passquery = "UPDATE patient_register SET updated_at= NOW(), password='$confirm_pass' WHERE id='$patient_id'";
      mysqli_query($conn, $passquery);
    } else {
      echo "<script>alert('Passwords do not match');</script>";
    }
  }
}
?>

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