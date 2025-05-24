    <!-- Topbar Start -->
    <div class="container-fluid bg-light p-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-map-marker-alt text-primary me-2"></small>
                    <small>123 Street, New York, USA</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center py-3">
                    <small class="far fa-clock text-primary me-2"></small>
                    <small>Mon - Fri : 09.00 AM - 09.00 PM</small>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-phone-alt text-primary me-2"></small>
                    <small>+012 345 6789</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center">
                    <a class="btn btn-sm-square rounded-circle bg-white text-primary me-1" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-sm-square rounded-circle bg-white text-primary me-1" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-sm-square rounded-circle bg-white text-primary me-1" href=""><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-sm-square rounded-circle bg-white text-primary me-0" href=""><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 wow fadeIn" data-wow-delay="0.1s">
    <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <img class="w-75" src="../Mediconnect/img/mediconnect_logo.png" alt="">
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="index.php" class="nav-item nav-link active">Home</a>
            <a href="about.php" class="nav-item nav-link">About</a>
            <a href="service.php" class="nav-item nav-link">Service</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                <div class="dropdown-menu rounded-0 rounded-bottom m-0">
                    <a href="feature.php" class="dropdown-item">Feature</a>
                    <a href="disease_page.php" class="dropdown-item">Diseases</a>
                    <a href="appointment.php" class="dropdown-item">Appointment</a>
                    <a href="testimonial.php" class="dropdown-item">Testimonial</a>
                    <a href="404.php" class="dropdown-item">404 Page</a>
                </div>
            </div>
            <a href="contact.php" class="nav-item nav-link">Contact</a>
        </div>

        <!-- Variant 1: Show 'Sign In' button if no user is logged in -->
        <?php
        if(!isset($_SESSION['role'])){
            echo"
            <a href='signin.php' class='btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-flex align-items-center gap-2'>
                <i class='bi bi-person-circle fs-4'></i>
                <div>
                    <div style='font-size: 14px;'>Account</div>
                    <div style='font-size: 16px; font-weight: bold;'>Sign In</div>
                </div>
            </a>         
            ";
        }
        ?>

        <!-- Variant 2: If patient is logged in, show patient profile dropdown -->
       <?php
    if (isset($_SESSION['role']) && $_SESSION['role'] === "doctor") {
    echo "
    <div class='d-none d-lg-flex' id='doctorProfile' style='display:block;'>
        <div class='nav-item dropdown'>
            <a href='#' class='nav-link dropdown-toggle' data-bs-toggle='dropdown'>
                <i class='bi bi-person-circle fs-4'></i> Profile
            </a>
            <div class='dropdown-menu'>
                 <a href='Doctor_dashboard/src/html/' class='dropdown-item'>Dashboard</a>
                <a href='logout.php' class='dropdown-item'>Log Out</a>
            </div>
        </div>
    </div>";
}
?>

<?php
if (isset($_SESSION['role']) && $_SESSION['role'] === "patient") {
    echo "
    <div class='d-none d-lg-flex' id='patientProfile' style='display:block;'>
        <div class='nav-item dropdown'>
            <a href='#' class='nav-link dropdown-toggle' data-bs-toggle='dropdown'>
                <i class='bi bi-person-circle fs-4'></i> Profile
            </a>
            <div class='dropdown-menu'>
                <a href='../Mediconnect/Patient_dashboard/src/html/' class='dropdown-item'>Dashboard</a>
                <a href='logout.php' class='dropdown-item'>Log Out</a>
            </div>
        </div>
    </div>";
}
?>
<?php
if (isset($_SESSION['role']) && $_SESSION['role'] === "admin") {
    echo "
    <div class='d-none d-lg-flex' id='patientProfile' style='display:block;'>
        <div class='nav-item dropdown'>
            <a href='#' class='nav-link dropdown-toggle' data-bs-toggle='dropdown'>
                <i class='bi bi-person-circle fs-4'></i> Profile
            </a>
            <div class='dropdown-menu'>
                <a href='Admin_dashboard/src/html/' class='dropdown-item'>Dashboard</a>
                <a href='logout.php' class='dropdown-item'>Log Out</a>
            </div>
        </div>
    </div>";
}
?>

</nav>

    <!-- Navbar End -->

