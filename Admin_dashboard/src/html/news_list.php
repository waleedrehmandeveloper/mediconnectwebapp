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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
     <style>
    body {
      background-color: #f8f9fa;
    }
    .table-hover tbody tr:hover {
      background-color: #e9f7ff;
    }
    .btn-sm i {
      vertical-align: middle;
    }
    .page-header {
      border-bottom: 2px solid #0d6efd;
      padding-bottom: 0.5rem;
      margin-bottom: 1.5rem;
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
  <div class="row">
    <div class="container py-5">
      <div class="d-flex justify-content-between align-items-center page-header">
        <h2 class="mb-0">
          <i class="bi bi-newspaper me-2"></i>
          Manage News
        </h2>
        <a href="add_news.php" class="btn btn-success">
          <i class="bi bi-plus-lg me-1"></i> Add New News
        </a>
      </div>

      <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
          <thead class="table-primary text-center">
            <tr>
              <th style="width: 5%;">S.no</th>
              <th style="width: 45%;">Title</th>
              <th style="width: 20%;">Date</th>
              <th style="width: 20%;">Actions</th>
            </tr>
          </thead>
         <tbody>
  <?php
    include("connection.php");

    $query = "SELECT * FROM news ORDER BY id DESC"; // DESC kis field par apply ho raha hai uska naam likhna zaroori hai
    $result = mysqli_query($conn, $query);

    $sno = 1;
    while($row = mysqli_fetch_assoc($result)) {
      $id = $row['id'];
      $title = $row['title'];
      $date = $row['date'];

      echo "
        <tr>
          <td class='text-center'>$sno</td>
          <td>$title</td>
          <td class='text-center'>$date</td>
          <td class='text-center'>
            <a href='edit_news.php?id=$id' class='btn btn-warning btn-sm me-2' title='Edit'>
              <i class='bi bi-pencil-square'></i>
            </a>
            <button type='button' class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#deleteModal$id' title='Delete'>
              <i class='bi bi-trash'></i>
            </button>

            <!-- Delete Modal -->
            <div class='modal fade' id='deleteModal$id' tabindex='-1' aria-labelledby='deleteModalLabel$id' aria-hidden='true'>
              <div class='modal-dialog modal-dialog-centered'>
                <div class='modal-content'>
                  <div class='modal-header bg-danger text-white'>
                    <h5 class='modal-title' id='deleteModalLabel$id'>
                      <i class='bi bi-exclamation-triangle-fill me-2'></i>Confirm Delete
                    </h5>
                    <button type='button' class='btn-close btn-close-white' data-bs-dismiss='modal' aria-label='Close'></button>
                  </div>
                  <div class='modal-body'>
                    Are you sure you want to delete this news item: <strong>$title</strong>?
                  </div>
                  <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>
                   <form method='POST' class='d-inline'>
                    <input type='hidden' name='news_id' value='<?= $id ?>' />
                    <a href='news_delete.php?id=$id' type='submit' class='btn btn-danger'>Delete</a>
                  </form>
                  </div>
                </div>
              </div>
            </div>
          </td>
        </tr>
      ";

      $sno++;
    }
  ?>
</tbody>

        </table> 
                <!-- Delete Modal -->
                <div class="modal fade" id="deleteModal1" tabindex="-1" aria-labelledby="deleteModalLabel1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title" id="deleteModalLabel1">
                          <i class="bi bi-exclamation-triangle-fill me-2"></i>Confirm Delete
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        Are you sure you want to delete this news item: <strong>COVID-19 Update</strong>?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <form action="delete_news.php" method="POST" class="d-inline">
                          <input type="hidden" name="news_id" value="1" />
                          <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                      </div>
                    </div>
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