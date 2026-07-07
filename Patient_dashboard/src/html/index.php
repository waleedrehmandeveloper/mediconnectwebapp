 <?php
  include("connection.php");
session_start();

if (
    !isset($_SESSION['pname']) || 
    !isset($_SESSION['role']) || 
    $_SESSION['role'] !== "patient"
) {
    header("Location: ../Mediconnect/signin.php"); 
    exit();
}
  $patient_name = $_SESSION['pname'];
  $patient_id = $_SESSION['patientid'];


  $countQuery = "SELECT COUNT(*) AS total FROM appointments WHERE patient_id = $patient_id";
  $countResult = mysqli_query($conn, $countQuery);
  $countData = mysqli_fetch_assoc($countResult);
  $totalAppointments = $countData['total'];

  $rejectedQuery = "SELECT COUNT(*) AS rejected_total FROM appointments WHERE status = 'Rejected' AND patient_id= $patient_id";
  $rejectedResult = mysqli_query($conn, $rejectedQuery);
  $rejectedData = mysqli_fetch_assoc($rejectedResult);
  $rejectedCount = $rejectedData['rejected_total'];

  $acceptedQuery = "SELECT COUNT(*) AS accepted_total FROM appointments WHERE status = 'Accepted' AND patient_id = $patient_id";
  $acceptedResult = mysqli_query($conn, $acceptedQuery);
  $acceptedData = mysqli_fetch_assoc($acceptedResult);
  $acceptedCount = $acceptedData['accepted_total'];

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
    .card-summary {
      box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
      border-left: 5px solid #0d6efd;
    }
    .activity-item {
      border-bottom: 1px solid #eee;
      padding: 10px 0;
    }
    .welcomesms{
      text-transform: uppercase;
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
      include("header.php");
     ?>
      <!--  Header End -->
      <div class="container-fluid">
        <div class="row">
            <div class="bg-light">
  <div class="container py-5">
    <h2 class="welcomesms mb-4">WELCOME <?php echo $patient_name ?> </h2>

    <!-- Summary Cards -->
    <div class="row g-4 mb-5">
      <div class="col-md-4">
        <div class="card card-summary text-white bg-primary">
          <div class="card-body">
            <h5 class="card-title">Total Appointments</h5>
            <h3 class="card-text"><?php echo $totalAppointments ?></h3>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card card-summary text-white bg-success">
          <div class="card-body">
            <h5 class="card-title">Accepted</h5>
            <h3 class="card-text"><?php echo $acceptedCount ?></h3>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card card-summary text-white bg-danger">
          <div class="card-body">
            <h5 class="card-title">Rejected</h5>
            <h3 class="card-text"><?php echo $rejectedCount ?></h3>
          </div>
        </div>
      </div>
    </div>
    <?php
      $query = "SELECT appointments.*, doctor_register.name AS doctor_name 
                FROM appointments
                JOIN doctor_register ON appointments.doctor_id = doctor_register.id
                WHERE appointments.patient_id = $patient_id AND appointments.status = 'Accepted'
                ORDER BY appointments.created_at DESC LIMIT 1";

      $result = mysqli_query($conn, $query);
      $row = mysqli_fetch_assoc($result);

      // REJECT QUERY

      $rejected_query = "SELECT appointments.*, doctor_register.name 
                   FROM appointments
                   JOIN doctor_register ON appointments.doctor_id = doctor_register.id
                   WHERE appointments.patient_id = $patient_id 
                   AND appointments.status = 'Rejected'
                   ORDER BY appointments.created_at DESC 
                   LIMIT 1";
      $rejected_result = mysqli_query($conn, $rejected_query);
      $rejected_row = mysqli_fetch_assoc($rejected_result);
?>
    <!-- Recent Activity -->
    <div class="card">
      <div class="card-header bg-white">
        <h5 class="mb-0">Recent Activity</h5>
      </div>
      <div class="card-body">
        <div class="activity-item">
          <strong>Appointment booked</strong> 
          <?php 
            if ($row && count($row) > 0) { 
              echo "with Dr." . htmlspecialchars($row['doctor_name']); 
          ?>
              <em><?php echo htmlspecialchars($row['created_at']); ?></em>
          <?php 
            } else {
              echo "No accepted appointments found.";
            }
          ?>
        </div>
          <?php
          $profileQuery = "SELECT updated_at FROM patient_register WHERE id = $patient_id";
          $profileResult = mysqli_query($conn, $profileQuery);
          $profileData = mysqli_fetch_assoc($profileResult);

          if (!empty($profileData['updated_at'])) {
              echo '<div class="activity-item">
                      <strong>Profile updated</strong> - profile updated on 
                      <em>' . date('Y-m-d H:i', strtotime($profileData['updated_at'])) . '</em>
                    </div>';
          }
          ?>
        <div class="activity-item">
          <strong>Appointment cancelled</strong>
            <?php 
              if ($rejected_row && count($rejected_row) > 0) { 
                echo "with Dr." . htmlspecialchars($rejected_row['doctor_name']); 
            ?>
                <em><?php echo htmlspecialchars($rejected_row['created_at']); ?></em>
            <?php 
              } else {
                echo "No rejected appointments found.";
              }
            ?>
          </div>
        </div>
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