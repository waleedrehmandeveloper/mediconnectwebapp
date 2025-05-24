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
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .card {
      border-radius: 0.5rem;
      box-shadow: 0 0.15rem 1.75rem rgb(58 59 69 / 15%);
    }
    .card-title {
      font-weight: 600;
      font-size: 1.25rem;
    }
    .progress {
      height: 0.5rem;
      border-radius: 0.25rem;
    }
    .table thead th {
      border-bottom: 2px solid #0d6efd;
    }
    .table td, .table th {
      vertical-align: middle;
    }
    .btn-primary {
      border-radius: 0.25rem;
      padding: 0.5rem 1.25rem;
    }
     .card {
      border-radius: 0.5rem;
      box-shadow: 0 0.15rem 1.75rem rgb(58 59 69 / 15%);
    }
    .card-title {
      font-weight: 600;
      font-size: 1.25rem;
    }
    .progress {
      height: 0.5rem;
      border-radius: 0.25rem;
    }
    .table thead th {
      border-bottom: 2px solid #0d6efd;
    }
    .table td, .table th {
      vertical-align: middle;
    }
    .btn-primary {
      border-radius: 0.25rem;
      padding: 0.5rem 1.25rem;
    }

    /* Summary Boxes */
    .summary-box {
      color: #fff;
      border-radius: 0.5rem;
      padding: 1.5rem;
      box-shadow: 0 0.25rem 1rem rgb(0 0 0 / 0.1);
      display: flex;
      align-items: center;
      justify-content: space-between;
      font-weight: 600;
      font-size: 1.2rem;
    }
    .summary-icon {
      font-size: 2.5rem;
      opacity: 0.8;
    }
    .summary-appointments { background: #0d6efd; }
    .summary-doctors { background: #198754; }
    .summary-patients { background: #ffc107; color: #212529; }
    .summary-revenue { background: #dc3545; }
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
         <div class="row g-4 mb-4">
    <div class="col-sm-6 col-lg-3">
      <div class="summary-box summary-appointments">
        <div>
          <div>Appointments</div>
          <div class="fs-3">1,245</div>
        </div>
        <i class="bi bi-calendar-check summary-icon"></i>
      </div>
    </div>
    <div class="col-sm-6 col-lg-3">
      <div class="summary-box summary-doctors">
        <div>
          <div>Doctors</div>
          <div class="fs-3">85</div>
        </div>
        <i class="bi bi-person-badge summary-icon"></i>
      </div>
    </div>
    <div class="col-sm-6 col-lg-3">
      <div class="summary-box summary-patients">
        <div>
          <div>Patients</div>
          <div class="fs-3">5,678</div>
        </div>
        <i class="bi bi-people summary-icon"></i>
      </div>
    </div>
    <div class="col-sm-6 col-lg-3">
      <div class="summary-box summary-revenue">
        <div>
          <div>Revenue</div>
          <div class="fs-3">$48,650</div>
        </div>
        <i class="bi bi-currency-dollar summary-icon"></i>
      </div>
    </div>
  </div>

  <div class="row g-4">
    <!-- Traffic Overview Card -->
    <div class="col-lg-8">
      <div class="card p-4">
        <h5 class="card-title mb-4 d-flex align-items-center justify-content-between">
          Traffic Overview
          <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-toggle="tooltip" title="Overview of website traffic">
            ?
          </button>
        </h5>
        <div id="trafficChart" style="height: 300px; background-color: #e9ecef; border-radius: 0.5rem; display:flex; align-items:center; justify-content:center;">
          <!-- Chart Placeholder -->
          <span class="text-muted">[Chart will render here]</span>
        </div>
      </div>
    </div>

    <!-- Productivity Tips Card -->
    <div class="col-lg-4">
      <div class="card text-center p-4">
        <img src="https://via.placeholder.com/180x120" alt="Productivity Tips" class="img-fluid mb-3 rounded" />
        <h4 class="mb-2">Productivity Tips!</h4>
        <p class="text-muted mb-3">Focus on high-impact tasks to boost your efficiency and results.</p>
        <button class="btn btn-primary">View All Tips</button>
      </div>
    </div>

    <!-- Page View Table -->
    <div class="col-lg-8">
      <div class="card p-4">
        <h5 class="card-title mb-4">Page Views by Title</h5>
        <div class="table-responsive">
          <table class="table table-hover align-middle">
            <thead>
              <tr>
                <th>Page Title</th>
                <th>Link</th>
                <th class="text-center">Pageviews</th>
                <th class="text-center">Page Value</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Welcome to our website</td>
                <td><a href="/index.php" class="link-primary text-decoration-none">/index.php</a></td>
                <td class="text-center">18,456</td>
                <td class="text-center">$2.40</td>
              </tr>
              <tr>
                <td>Modern Admin Dashboard Template</td>
                <td><a href="/dashboard" class="link-primary text-decoration-none">/dashboard</a></td>
                <td class="text-center">17,452</td>
                <td class="text-center">$0.97</td>
              </tr>
              <tr>
                <td>Explore our product catalog</td>
                <td><a href="/product-checkout" class="link-primary text-decoration-none">/product-checkout</a></td>
                <td class="text-center">12,180</td>
                <td class="text-center">$7.50</td>
              </tr>
              <tr>
                <td>Comprehensive User Guide</td>
                <td><a href="/docs" class="link-primary text-decoration-none">/docs</a></td>
                <td class="text-center">800</td>
                <td class="text-center">$5.50</td>
              </tr>
              <tr>
                <td>Check out our services</td>
                <td><a href="/services" class="link-primary text-decoration-none">/services</a></td>
                <td class="text-center">1,300</td>
                <td class="text-center">$2.15</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Sessions by Device -->
    <div class="col-lg-4">
      <div class="card p-4">
        <h5 class="card-title mb-4 d-flex align-items-center justify-content-between">
          Sessions by Device
          <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-toggle="tooltip" title="Sessions grouped by device type">
            ?
          </button>
        </h5>

        <div class="mb-3">
          <div class="d-flex justify-content-between align-items-center mb-1">
            <span>Computers</span>
            <strong>87%</strong>
          </div>
          <div class="progress">
            <div class="progress-bar bg-primary" style="width: 87%;"></div>
          </div>
        </div>

        <div class="mb-3">
          <div class="d-flex justify-content-between align-items-center mb-1">
            <span>Smartphones</span>
            <strong>9.2%</strong>
          </div>
          <div class="progress">
            <div class="progress-bar bg-secondary" style="width: 9.2%;"></div>
          </div>
        </div>

        <div class="mb-3">
          <div class="d-flex justify-content-between align-items-center mb-1">
            <span>Tablets</span>
            <strong>3.1%</strong>
          </div>
          <div class="progress">
            <div class="progress-bar bg-success" style="width: 3.1%;"></div>
          </div>
        </div>

      </div>
    </div>

    <!-- Latest Articles -->
    <div class="col-lg-12">
      <div class="card p-4">
        <h5 class="card-title mb-4">Latest Articles</h5>
        <div class="row g-3">
          <div class="col-md-4">
            <div class="card h-100 shadow-sm">
              <img src="https://via.placeholder.com/350x180" class="card-img-top" alt="Article 1" />
              <div class="card-body">
                <span class="badge bg-info mb-2">Social</span>
                <h6 class="card-title">
                  <a href="#" class="text-decoration-none text-dark">As yen tumbles, gadget-loving Japan goes for secondhand iPhones</a>
                </h6>
                <div class="d-flex justify-content-between text-muted fs-7 mt-3">
                  <small><i class="bi bi-eye"></i> 9,125</small>
                  <small><i class="bi bi-chat-dots"></i> 3</small>
                  <small>Dec 19</small>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card h-100 shadow-sm">
              <img src="https://via.placeholder.com/350x180" class="card-img-top" alt="Article 2" />
              <div class="card-body">
                <span class="badge bg-warning mb-2">Gadget</span>
                <h6 class="card-title">
                  <a href="#" class="text-decoration-none text-dark">Intel loses bid to revive antitrust case against patent foe Fortress</a>
                </h6>
                <div class="d-flex justify-content-between text-muted fs-7 mt-3">
                  <small><i class="bi bi-eye"></i> 6,362</small>
                  <small><i class="bi bi-chat-dots"></i> 2</small>
                  <small>Dec 17</small>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card h-100 shadow-sm">
              <img src="https://via.placeholder.com/350x180" class="card-img-top" alt="Article 3" />
              <div class="card-body">
                <span class="badge bg-success mb-2">Android</span>
                <h6 class="card-title">
                  <a href="#" class="text-decoration-none text-dark">New AI chatbot could learn from your brainwaves</a>
                </h6>
                <div class="d-flex justify-content-between text-muted fs-7 mt-3">
                  <small><i class="bi bi-eye"></i> 3,205</small>
                  <small><i class="bi bi-chat-dots"></i> 1</small>
                  <small>Dec 15</small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
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