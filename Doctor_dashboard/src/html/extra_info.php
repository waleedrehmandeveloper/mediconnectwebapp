<?php
session_start();
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
  <link rel="stylesheet" href="../assets/css/dash.css" />
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
      <section class="bg-light py-5">
        <div class="container py-4">
  <div class="bg-white p-4 rounded shadow-sm">
    <h3 class="mb-4">Complete Your Profile</h3>
  <form method="POST" enctype="multipart/form-data">
  <div class="row g-3">
    <div class="col-md-6">
      <label class="form-label">Full Name *</label>
      <input type="text" name="full_name" class="form-control" required>
    </div>

    <div class="col-md-6">
      <label class="form-label">Phone Number *</label>
      <input type="text" name="phone" class="form-control" required>
    </div>

    <!-- ✅ Gender Field -->
    <div class="col-md-6">
      <label class="form-label d-block">Gender *</label>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gender" id="genderMale" value="male" required>
        <label class="form-check-label" for="genderMale">Male</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="female" required>
        <label class="form-check-label" for="genderFemale">Female</label>
      </div>
    </div>

    <div class="col-md-6">
      <label class="form-label">City / Location *</label>
      <input type="text" name="location" class="form-control" placeholder="e.g. Faisalabad" required>
    </div>

    <div class="col-md-3">
      <label class="form-label">Postal Code *</label>
      <input type="text" name="postal_code" class="form-control" required>
    </div>

    <div class="col-md-3">
      <label class="form-label">Clinic Address *</label>
      <input type="text" name="clinic_address" class="form-control" required>
    </div>

    <div class="col-md-6">
      <label class="form-label">Specialization / Category *</label>
      <select name="category" class="form-select" required>
        <option value="">-- Select --</option>
        <option value="dentist">Dentist</option>
        <option value="cardiologist">Cardiologist</option>
        <option value="surgeon">Surgeon</option>
        <option value="orthopedic">Orthopedic</option>
        <option value="neurologist">Neurologist</option>
        <option value="general">General Physician</option>
      </select>
    </div>

    <div class="col-md-6">
      <label class="form-label">Qualification *</label>
      <input type="text" name="qualification" class="form-control" required>
    </div>

    <div class="col-md-6">
      <label class="form-label">Experience (Years) *</label>
      <input type="number" name="experience" min="0" class="form-control" required>
    </div>

    <div class="col-md-6">
      <label class="form-label">Short Bio / Description</label>
      <textarea name="bio" class="form-control" rows="3" placeholder="A brief introduction…"></textarea>
    </div>

    <div class="col-md-6">
      <label class="form-label">Profile Picture *</label>
      <input accept="jpg" loading="lazy" type="file" name="profile_pic" class="form-control" required>
    </div>
  </div>

  <div class="text-end mt-4">
    <button type="submit" name="update" class="btn btn-primary btn-lg">Save Profile</button>
  </div>
</form>
  </div>
</div>
<?php
if(isset($_POST['update'])){
  include("connection.php");
$doctorid= $_SESSION['doctor_id'];
$full_name      = $_POST['full_name'];
$phone          = $_POST['phone'];
$location       = $_POST['location'];
$postal_code    = $_POST['postal_code'];
$clinic_address = $_POST['clinic_address'];
$category       = $_POST['category'];
$qualification  = $_POST['qualification'];
$experience     = $_POST['experience'];
$gender         = $_POST['gender'];
$bio            = $_POST['bio'];
$image = $_FILES['profile_pic'];
 if (
  empty($full_name) || 
  empty($phone) || 
  empty($location) || 
  empty($postal_code) || 
  empty($clinic_address) || 
  empty($category) || 
  empty($qualification) || 
  empty($experience) || 
  empty($gender) || 
  empty($bio) || 
  empty($_FILES['profile_pic']['name']) 
) {
  echo "
    <script>
      alert('Please fill the data first');
    </script>
  ";
}


$query = "UPDATE doctor_register 
          SET name='$full_name', 
              phone='$phone', 
              location='$location', 
              postal_code='$postal_code', 
              clinic_address='$clinic_address', 
              category='$category', 
              qualification='$qualification', 
              experience='$experience',
              bio='$bio', gender='$gender'
          WHERE id=$doctorid";

          $result = mysqli_query($conn, $query);
    // FOR IMAGE UPLOADIING

    $image = $_FILES['profile_pic'];
    $image_name = $image['name'];
    $tmp_name = $image['tmp_name'];
    $new_name = rand(0,99). "_" .$image_name;

    $upload_path = "imagedata/" . $new_name;

    if (move_uploaded_file($tmp_name, $upload_path)) {
        
        $imgquery = "UPDATE doctor_register 
                  SET profile_pic = '$upload_path' 
                  WHERE id = $doctorid";
        $resultimg= mysqli_query($conn,$imgquery);
    }
}
?>
     </section>
        <div class="py-6 px-6 text-center">
          <p class="mb-0 fs-4">Design and Developed by <a href="https://adminmart.com/" target="_blank"
              class="pe-1 text-primary text-decoration-underline">AdminMart.com</a> Distributed by <a href="https://themewagon.com/" target="_blank"
              class="pe-1 text-primary text-decoration-underline">ThemeWagon</a></p>
        </div>
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