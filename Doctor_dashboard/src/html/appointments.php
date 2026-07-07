<?php
  session_start();
  $doctorid = $_SESSION['doctor_id'];
  if (
    !isset($_SESSION['dname']) || 
    !isset($_SESSION['role']) || 
    $_SESSION['role'] !== "doctor"
) {
    header("Location: index.php");
    exit();
}
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
</head>
  <style>
    .status-accept {
        color: green;
        font-weight: bold;
    }
    .status-reject {
        color: red;
        font-weight: bold;
    }
    .status-pending {
        color: orange;
        font-weight: bold;
    }
    .statusstyle{
      border: 0.2px solid;
      border-color: #0463fa;
      padding: 5px;
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
          <h3>Appointments</h3>
          <table class="table table-bordered table-striped">
            <thead class="table-dark text-center">
              <tr>
                <th>s.no</th>
                <th>Paient Name</th>
                <th>Doctor Name</th>
                <th>Patient Email</th>
                <th>Patient Phone</th>
                <th>Appointment Day</th>
                <th>Appointment Time</th>
                <th>Actions</th>
              </tr>
            </thead>
            <?php
            include("connection.php");

            $query = "SELECT appointments.*, doctor_register.name AS doctor_name 
                  FROM appointments 
                  JOIN doctor_register ON appointments.doctor_id = doctor_register.id 
                  WHERE appointments.doctor_id = $doctorid";

            $result = mysqli_query($conn, $query);

            // echo $result;

           if ($result && mysqli_num_rows($result) > 0) {
    echo "<tbody class='text-center'>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "
        <tr>
          <td>" . $row['id'] . "</td>
          <td>" . $row['name'] . "</td>
          <td>" . $row['doctor_name'] . "</td>
          <td>" . $row['email'] . "</td>
          <td>" . $row['phone'] . "</td>
          <td>" . $row['appointment_day'] . "</td>
          <td>" . $row['appointment_time'] . "</td>
          <td>";
        
        //  Check status here .
        if ($row['status'] == '' || $row['status'] == 'Pending') {
            echo "
            <a href='accept_status.php?id=" . $row['id']
            . "&name=" . urlencode($row['name'])
            . "&doctor_name=" . urlencode($row['doctor_name'])
            . "&email=" . urlencode($row['email'])
            . "&phone=" . urlencode($row['phone'])
            . "&appointment_day=" . urlencode($row['appointment_day'])
            . "&appointment_time=" . urlencode($row['appointment_time'])
            . "&status=accept' class='btn btn-success btn-sm me-2'
            onclick=\"return confirm('Are you sure you want to accept this appointment?')\">Accept</a>
            <a href='reject_status.php?id=" . $row['id']
            . "&name=" . urlencode($row['name'])
            . "&doctor_name=" . urlencode($row['doctor_name'])
            . "&email=" . urlencode($row['email'])
            . "&phone=" . urlencode($row['phone'])
            . "&appointment_day=" . urlencode($row['appointment_day'])
            . "&appointment_time=" . urlencode($row['appointment_time'])
            . "&status=reject' class='btn btn-danger btn-sm me-2'
            onclick=\"return confirm('Are you sure you want to reject this appointment?')\">Reject</a>
            ";
        } else {
            echo "<strong class='statusstyle'>" . htmlspecialchars($row['status']) . "</strong>";
        }

        echo "</td></tr>";
    }
    echo "</tbody>";
} else {
    echo "<tr><td colspan='8'>No appointments found.</td></tr>";
}

            ?>


            </tbody>
          </table>
        </div>
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