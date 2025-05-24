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
          <a href="./index.php">
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
        <h2>City Management</h2>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCityModal">Add New City</button>
      </div>

      <!-- City Table -->
      <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
          <thead class="table-dark">
            <tr>
              <th>ID</th>
              <th>City Name</th>
              <th style="width: 180px;">Actions</th>
            </tr>
          </thead>
          <tbody>
            <!-- Sample static data -->
            <tr>
              <td>1</td>
              <td>Lahore</td>
              <td>
                <div class="d-flex gap-2">
                  <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editCityModal"
                    onclick="fillEditForm(1, 'Lahore')">Edit</button>
                  <button class="btn btn-sm btn-danger">Delete</button>
                </div>
              </td>
            </tr>
            <tr>
              <td>2</td>
              <td>Karachi</td>
              <td>
                <div class="d-flex gap-2">
                  <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editCityModal"
                    onclick="fillEditForm(2, 'Karachi')">Edit</button>
                  <button class="btn btn-sm btn-danger">Delete</button>
                </div>
              </td>
            </tr>
            <tr>
              <td>3</td>
              <td>Islamabad</td>
              <td>
                <div class="d-flex gap-2">
                  <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editCityModal"
                    onclick="fillEditForm(3, 'Islamabad')">Edit</button>
                  <button class="btn btn-sm btn-danger">Delete</button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Edit City Modal -->
    <div class="modal fade" id="editCityModal" tabindex="-1" aria-labelledby="editCityModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form action="edit_city.php" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="editCityModalLabel">Edit City</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

              <input type="hidden" id="editCityId" name="city_id">

              <div class="mb-3">
                <label for="editCityName" class="form-label">City Name</label>
                <input type="text" class="form-control" id="editCityName" name="city_name" required>
              </div>

            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success">Update City</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Add City Modal -->
    <div class="modal fade" id="addCityModal" tabindex="-1" aria-labelledby="addCityModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form action="add_city.php" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="addCityModalLabel">Add New City</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

              <div class="mb-3">
                <label for="cityName" class="form-label">City Name</label>
                <input type="text" class="form-control" id="cityName" name="city_name" placeholder="Enter city name"
                  required>
              </div>

            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success">Add City</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>
</div>
  <!-- Bootstrap JS Bundle -->
          </div>
        </div>
        <div class="py-6 px-6 text-center">
          <p class="mb-0 fs-4">Design and Developed by <a href="https://adminmart.com/" target="_blank"
              class="pe-1 text-primary text-decoration-underline">AdminMart.com</a>Distributed by <a href="https://themewagon.com/" target="_blank"
              class="pe-1 text-primary text-decoration-underline">ThemeWagon</a></p>
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