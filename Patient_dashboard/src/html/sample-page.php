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
      background: url('https://www.bootdey.com/image/900x200') no-repeat center;
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
          <a href="./index.php" class="text-nowrap logo-img">
            <img src="../assets/images/logos/logo-light.svg" alt="" />
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
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                <i class="ti ti-bell-ringing"></i>
                <div class="notification bg-primary rounded-circle"></div>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <a href="#" target="_blank"
                class="btn btn-primary me-2"><span class="d-none d-md-block">Check Pro Version</span> <span class="d-block d-md-none">Pro</span></a>
              <a href="#" target="_blank"
                class="btn btn-success"><span class="d-none d-md-block">Download Free </span> <span class="d-block d-md-none">Free</span></a>
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="../assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">My Profile</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-mail fs-6"></i>
                      <p class="mb-0 fs-3">My Account</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-list-check fs-6"></i>
                      <p class="mb-0 fs-3">My Task</p>
                    </a>
                    <a href="./authentication-login.php" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <div class="container-fluid">
        <div class="profile-banner position-relative">
  <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Profile Picture" class="profile-avatar">

  <!-- Upload Banner Button -->
  <form action="upload_banner.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="banner_img" id="bannerInput" class="d-none" onchange="this.form.submit()">
    <button type="button" class="btn btn-dark btn-sm position-absolute top-0 end-0 m-3"
            onclick="document.getElementById('bannerInput').click()">
      <i class="bi bi-upload"></i> Change Banner
    </button>
  </form>
</div>

  <!-- Profile Form -->
  <div class="container profile-section bg-white p-4 rounded shadow">
    <h4 class="mb-4">Update Profile</h4>
    <form action="update_patient_profile.php" method="POST" enctype="multipart/form-data">
      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label">Full Name</label>
          <input type="text" name="name" class="form-control" value="John Doe">
        </div>
        <div class="col-md-6">
          <label class="form-label">Contact Number</label>
          <input type="text" name="phone" class="form-control" value="03001234567">
        </div>
        <div class="col-md-6">
          <label class="form-label">Gender</label>
          <select class="form-select" name="gender">
            <option selected disabled>Choose...</option>
            <option value="male" selected>Male</option>
            <option value="female">Female</option>
          </select>
        </div>
        <div class="col-md-6">
          <label class="form-label">Profile Picture</label>
          <input type="file" name="profile_pic" class="form-control">
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
        <button type="submit" class="btn btn-primary">Save Changes</button>
      </div>
    </form>
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