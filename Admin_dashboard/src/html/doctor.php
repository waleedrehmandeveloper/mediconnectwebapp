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
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2>Doctors List</h2>
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDoctorModal">
        Add Doctor
      </button>
    </div>

    <!-- Doctor Table -->
    <div class="table-responsive">
      <table class="table table-bordered table-striped">
        <thead class="table-dark">
          <tr>
            <th>ID</th>
            <th>Doctor Name</th>
            <th>Specialization</th>
            <th>Email</th>
            <th>City</th>
            <th>Phone</th>
            <th>Created at</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php
          include("connection.php");
            $query = "select * from doctor_register";
            $result = mysqli_query($conn,$query);
              if($result){
               foreach($result as $row){
                echo"
                <tr>
                <td>".$row['id']."</td>
                <td>".$row['name']."</td>
                <td>".$row['category']."</td>
                <td>".$row['email']."</td>
                <td>".$row['location']."</td>
                <td>".$row['phone']."</td>
                <td>".$row['date_time']."</td>
                <td>
                  <a href='../../../Doctor_dashboard/src/html/doctor_profile.php?id=".$row['id']."' class='btn btn-sm btn-info text-white'>View Profile</a>
                  <a href='delete_doc.php?id=".$row['id']."' class='btn btn-sm btn-danger'>Delete</a>
                </td>
              </tr>
              ";
               }
              }
        ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Add Doctor Modal -->
  <div class="modal fade" id="addDoctorModal" tabindex="-1" aria-labelledby="addDoctorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="post">
          <div class="modal-header">
            <h5 class="modal-title" id="addDoctorModalLabel">Add New Doctor</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

            <div class="mb-3">
              <label for="doctorName" class="form-label">Doctor Name</label>
              <input type="text" class="form-control" id="doctorName" name="name" required>

            </div>

            <div class="mb-3">
              <label for="specialization" class="form-label">Category</label>
              <input type="text" class="form-control" id="specialization" name="category" required>
            </div>

            <div class="mb-3">
              <label for="city" class="form-label">City</label>
              <select class="form-select" id="city" name="city" required>
                <option value="">-- Select City --</option>
                <option value="1">Lahore</option>
                <option value="2">Karachi</option>
                <option value="3">Islamabad</option>
              </select>
            </div>

            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
              <label for="phone" class="form-label">Phone</label>
              <input type="text" class="form-control" id="phone" name="phone" required>
            </div>

          </div>
          <div class="modal-footer">
            <input name="save" type="submit" class="btn btn-success" value="Sve doctor"></input>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          </div>
        </form>

        <?php
        include("connection.php");

        if (isset($_POST['save'])) {
            $name = $_POST['name'];
            $category = $_POST['category'];
            $city = $_POST['city'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];

            $query = "INSERT INTO doctor_register (name, category, location, email, phone) 
                      VALUES ('$name', '$category', '$city', '$email', '$phone')";

            $result = mysqli_query($conn, $query);

            if ($result) {
                echo "<script>
                alert('Doctor added successfully');
                window.location.href = 'doctor.php';
                </script>";
            } else {
                echo "<script>alert('Failed to add doctor');</script>";
            }
        }
        ?>
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