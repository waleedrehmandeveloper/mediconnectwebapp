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
  <link rel="stylesheet" href="../../node_mosdules/simplebar/dist/simplebar.min.css">
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
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
        <h3 class="mb-4">Weekly Availability</h3>

        <!-- Add Button -->
        <button class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#availabilityModal">
          + Add Availability
        </button>
        <!-- SHOW DATA PHP CODE -->
        <?php
        include("connection.php");
        $showquery = "select * from doctor_availiblity";
        $showresult = mysqli_query($conn, $showquery);

        ?>
        <!-- SHOW DATA PHP CODE -->
        <!-- Availability Table -->
        <table class="table table-bordered bg-white shadow-sm">
          <thead class="table-light">
            <tr>
              <th>Available Days</th>
              <th>From Time</th>
              <th>To Time</th>
              <th>Options</th>
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
          <td>
          <a href='#' class='btn btn-sm btn-outline-primary me-1 edit-btn' 
           data-id='{$data['id']}' 
           data-day='{$data['available_day']}' 
           data-from='{$data['available_time_from']}' 
           data-to='{$data['available_time_to']}' 
           data-bs-toggle='modal' data-bs-target='#editAvailabilityModal'>
          <i class='bi bi-pencil'></i> Edit
          </a>
            <a href='delete_row.php?id={$data['id']}' class='btn btn-sm btn-outline-danger'>
              <i class='bi bi-trash'></i> Delete
            </a>
          </td>
        </tr>
      ";
              }
              ?>
            </tr>
          </tbody>
        </table>

        <!-- Add Availability Modal -->
        <div class="modal fade" id="availabilityModal" tabindex="-1" aria-labelledby="availabilityModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <form method="POST" class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="availabilityModalLabel">Add Availability</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                  <label for="day" class="form-label">Day</label>
                  <select class="form-select" id="day" name="day" required>
                    <option value="">Select a Day</option>
                    <option value="monday">Monday</option>
                    <option value="tuesday">Tuesday</option>
                    <option value="wednesday">Wednesday</option>
                    <option value="thursday">Thursday</option>
                    <option value="friday">Friday</option>
                    <option value="saturday">Saturday</option>
                    <option value="sunday">Sunday</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="from_time" class="form-label">From Time</label>
                  <input type="time" class="form-control" id="from_time" name="from_time" required>
                </div>
                <div class="mb-3">
                  <label for="to_time" class="form-label">To Time</label>
                  <input type="time" class="form-control" id="to_time" name="to_time" required>
                </div>
              </div>
              <div class="modal-footer">
                <input name="add" type="submit" class="btn btn-success"></input>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              </div>
            </form>
          </div>
        </div>
        <!-- ADD AVAILABLITY BACKEND -->
        <?php
        include("connection.php");

        if (isset($_POST['add'])) {
          $days = $_POST['day'];
          $to_time = $_POST['to_time'];
          $from_time = $_POST['from_time'];

          $addquery = "insert into doctor_availiblity(doctor_id,available_day,available_time_to,available_time_from) values($doctorid,'$days','$to_time',' $from_time')";

          if (empty($days) || empty($to_time) || empty($from_time)) {
            echo "<script>alert('Please fill all fields before submitting the form.'); window.history.back();</script>";
            exit();
          }

          $addresult = mysqli_query($conn, $addquery);
          if ($addresult) {
           echo"
           <script>
           window.location.href = 'avaliblity.php'
           </script>
           "; 
          }
        }
        ?>
        <!-- ADD AVAILABLITY BACKEND -->

        <!-- Edit Availability Modal -->
        <div class="modal fade" id="editAvailabilityModal" tabindex="-1" aria-labelledby="editAvailabilityModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <form method="POST" class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="editAvailabilityModalLabel">Edit Availability</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <input type="hidden" name="availability_id" id="edit_availability_id">

                <div class="mb-3">
                  <label for="edit_day" class="form-label">Day</label>
                  <select class="form-select" id="edit_day" name="day" required>
                    <option value="">Select a Day</option>
                    <option value="monday">Monday</option>
                    <option value="tuesday">Tuesday</option>
                    <option value="wednesday">Wednesday</option>
                    <option value="thursday">Thursday</option>
                    <option value="friday">Friday</option>
                    <option value="saturday">Saturday</option>
                    <option value="sunday">Sunday</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="edit_from_time" class="form-label">From Time</label>
                  <input type="time" class="form-control" id="edit_from_time" name="from_time" required>
                </div>
                <div class="mb-3">
                  <label for="edit_to_time" class="form-label">To Time</label>
                  <input type="time" class="form-control" id="edit_to_time" name="to_time" required>
                </div>
              </div>
              <div class="modal-footer">
                <input name="update" id="edit-btn" value="Update" type="submit" class="btn btn-success"></input>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              </div>
            </form>
          </div>
          <?php
include("connection.php");

if (isset($_POST['update'])) {
    $id = intval($_POST['availability_id']);
    $day = $_POST['day'];
    $from_time = $_POST['from_time'];
    $to_time = $_POST['to_time'];

    if (empty($day) || empty($from_time) || empty($to_time)) {
        echo "<script>alert('All fields are required.');</script>";
        exit();
    }

   $updateQuery = "UPDATE doctor_availiblity SET available_day='$day', available_time_from='$from_time', available_time_to='$to_time' WHERE id=$id";


    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        echo "<script>window.location.href = 'avaliblity.php';</script>";
    } else {
        echo "<script>alert('Failed to update availability');</script>";
    }
}
?>
  <script>
  document.querySelectorAll('.edit-btn').forEach(button => {
    button.addEventListener('click', function () {
      const id = this.getAttribute('data-id');
      const day = this.getAttribute('data-day');
      const from = this.getAttribute('data-from');
      const to = this.getAttribute('data-to');

      document.getElementById('edit_availability_id').value = id;
      document.getElementById('edit_day').value = day;
      document.getElementById('edit_from_time').value = from.trim();
      document.getElementById('edit_to_time').value = to.trim();
    });
  });
</script>

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