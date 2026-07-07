<?php $currentPage = basename($_SERVER['PHP_SELF']); ?>


<style>
    .profile-img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        object-fit: cover;
    }
    .dropdown-toggle::after {
        display: none !important;
    }
    .navbar .nav-link {
    position: relative;
    font-weight: 500;
    padding: 10px 15px;
    color: #000 !important;
    transition: color 0.3s ease;
}

.navbar .nav-link::after {
    content: '';
    position: absolute;
    width: 0;
    height: 2px;
    bottom: 5px;
    left: 50%;
    transform: translateX(-50%);
    background-color: #0d6efd;
    transition: width 0.3s ease;
}

.navbar .nav-link:hover::after,
.navbar .nav-link.active::after {
    width: 80%;
}

.navbar .nav-link:hover,
.navbar .nav-link.active {
    color: #0d6efd !important;
    text-shadow: 0 0 3px rgba(13, 110, 253, 0.3);
}
.dropdown-menu .dropdown-item {
    font-weight: 500;
    padding: 8px 16px;
    transition: all 0.3s ease;
}

.dropdown-menu .dropdown-item:hover,
.dropdown-menu .dropdown-item.active {
    color: #0d6efd;
    background-color: transparent;
    padding-left: 22px;
    text-shadow: 0 0 2px rgba(13, 110, 253, 0.2);
}
.btn.btn-primary {
    transition: all 0.3s ease-in-out;
    box-shadow: none;
}

.btn.btn-primary:hover {
    box-shadow: 0 2px 10px rgba(13, 110, 253, 0.2);
    transform: translateY(-1px);
}
@keyframes blinkLogo {
    0%, 100% { opacity: 1; filter: drop-shadow(0 0 0px #0d6efd); }
    50% { opacity: 0.7; filter: drop-shadow(0 0 6px #0d6efd); }
}

.logo-blink {
    animation: blinkLogo 2s infinite ease-in-out;
}
@keyframes activeBlink {
    0%, 100% {
        opacity: 1;
        text-shadow: 0 0 0px #0d6efd;
    }
    50% {
        opacity: 0.7;
        text-shadow: 0 0 8px #0d6efd;
    }
}

.nav-link.active-blink {
    animation: activeBlink 2s infinite ease-in-out;
    font-weight: bold;
}
/* Dropdown menu styling for better indentation and hover effect */
.dropdown-menu {
    border-radius: 0 0 0.25rem 0.25rem;
    box-shadow: 0 0.5rem 1rem rgba(13, 110, 253, 0.15);
}

.dropdown-menu .dropdown-item {
    font-weight: 600;
    padding: 10px 24px; /* more left padding for indentation */
    color: #000;
    transition: all 0.3s ease;
    position: relative;
    border-left: 3px solid transparent;
}

.dropdown-menu .dropdown-item:hover,
.dropdown-menu .dropdown-item.active,
.dropdown-menu .dropdown-item.active-blink {
    color: #0d6efd;
    background-color: transparent;
    padding-left: 28px; /* slight increase on hover */
    border-left-color: #0d6efd;
    text-shadow: 0 0 4px rgba(13, 110, 253, 0.3);
    font-weight: 700;
}

/* Blink effect for active-blink dropdown items */
.dropdown-menu .dropdown-item.active-blink {
    animation: activeBlink 2s infinite ease-in-out;
}

/* Keep dropdown toggle arrow hidden (already done, but double check) */
.dropdown-toggle::after {
    display: none !important;
}

</style>

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
                <a class="btn btn-sm-square rounded-circle bg-white text-primary me-1" href="#"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-sm-square rounded-circle bg-white text-primary me-1" href="#"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-sm-square rounded-circle bg-white text-primary me-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-sm-square rounded-circle bg-white text-primary me-0" href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->

<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 wow fadeIn" data-wow-delay="0.1s">
    <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <img class="w-75 logo-blink" src="../Mediconnect/img/mediconnect_logo.png" alt="">

    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <?php
            $currentPage = basename($_SERVER['PHP_SELF']);
            ?>

            <a href="index.php" class="nav-item nav-link <?php echo ($currentPage == 'index.php') ? 'active-blink' : ''; ?>">Home</a>
            <a href="about.php" class="nav-item nav-link <?php echo ($currentPage == 'about.php') ? 'active-blink' : ''; ?>">About</a>
            <a href="service.php" class="nav-item nav-link <?php echo ($currentPage == 'service.php') ? 'active-blink' : ''; ?>">Service</a>
            <a href="contact.php" class="nav-item nav-link <?php echo ($currentPage == 'contact.php') ? 'active-blink' : ''; ?>">Contact</a>

            <div class="nav-item dropdown">
    <a href="#" class="nav-link dropdown-toggle <?php echo in_array($currentPage, ['feature.php','disease_page.php','appointment.php','news_page.php','404.php']) ? 'active' : ''; ?>" data-bs-toggle="dropdown">Pages</a>
    <div class="dropdown-menu rounded-0 rounded-bottom m-0">
        <a href="feature.php" class="dropdown-item <?php echo ($currentPage == 'feature.php') ? 'active-blink' : ''; ?>">Feature</a>
        <a href="disease_page.php" class="dropdown-item <?php echo ($currentPage == 'disease_page.php') ? 'active-blink' : ''; ?>">Diseases</a>
        <a href="appointment.php" class="dropdown-item <?php echo ($currentPage == 'appointment.php') ? 'active-blink' : ''; ?>">Appointment</a>
        <a href="news_page.php" class="dropdown-item <?php echo ($currentPage == 'news_page.php') ? 'active-blink' : ''; ?>">News</a>
        <a href="404.php" class="dropdown-item <?php echo ($currentPage == '404.php') ? 'active-blink' : ''; ?>">404 Page</a>
    </div>
</div>


        <!-- Sign In / Profile Logic -->
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

        include("connection.php");

        if (isset($_SESSION['doctor_id']) && $_SESSION['role'] === "doctor") {
            $doctorid = $_SESSION['doctor_id'];
            $query1 = "SELECT id, profile_pic FROM doctor_register WHERE id = $doctorid";
            $result1 = mysqli_query($conn, $query1);
            if ($result1 && $row = mysqli_fetch_assoc($result1)) {
                $profileImg = (!empty($row['profile_pic'])) ? $row['profile_pic'] : 'default.jpg';
                echo "
                <div class='d-none d-lg-flex' id='doctorProfile' style='display:block;'>
                    <div class='nav-item dropdown'>
                        <a href='#' class='nav-link dropdown-toggle' data-bs-toggle='dropdown'>
                           <img src='Doctor_dashboard/src/html/imagedata/".$profileImg."' alt='Profile' class='profile-img'>
                        </a>
                        <div class='dropdown-menu dropdown-menu-start'>
                            <a href='Doctor_dashboard/src/html/' class='dropdown-item'>Dashboard</a>
                            <a href='logout.php' class='dropdown-item'>Log Out</a>
                        </div>
                    </div>
                </div>";
            }
        }

        if (isset($_SESSION['role']) && $_SESSION['role'] === "patient" && isset($_SESSION['patientid'])) {
            $patientid = $_SESSION['patientid'];
            $query = "SELECT id,profile_pic FROM patient_register WHERE id = $patientid";
            $result = mysqli_query($conn, $query);
            if ($result && $row = mysqli_fetch_assoc($result)) {
                $profileImg = $row['profile_pic'];
                echo "
               <div class='d-none d-lg-flex' id='doctorProfile' style='display:block;'>
                    <div class='nav-item dropdown'>
                        <a href='#' class='nav-link dropdown-toggle' data-bs-toggle='dropdown'>
                            <img src='Patient_dashboard/src/html/images/".$profileImg."' alt='Profile' class='profile-img'>
                        </a>
                        <div class='dropdown-menu dropdown-menu-end'>
                            <a href='Patient_dashboard/src/html/' class='dropdown-item'>Dashboard</a>
                            <a href='logout.php' class='dropdown-item'>Log Out</a>
                        </div>
                    </div>
                </div>";
            }
        }

        if (isset($_SESSION['role']) && $_SESSION['role'] === "admin" && isset($_SESSION['admin_id'])) {
            $adminid = $_SESSION['admin_id'];
            $query = "SELECT id,profile_pic FROM admin_register WHERE id = $adminid";
            $result = mysqli_query($conn, $query);
            if ($result && $row = mysqli_fetch_assoc($result)) {
                $profileImg =  $row['profile_pic'];
                echo "
                <div class='d-none d-lg-flex' id='adminProfile' style='display:block;'>
                    <div class='nav-item dropdown'>
                        <a href='#' class='nav-link dropdown-toggle' data-bs-toggle='dropdown'>
                            <img src='Admin_dashboard/src/html/images/".$profileImg."' alt='Profile' class='profile-img'>
                        </a>
                        <div class='dropdown-menu'>
                            <a href='Admin_dashboard/src/html/' class='dropdown-item'>Dashboard</a>
                            <a href='logout.php' class='dropdown-item'>Log Out</a>
                        </div>
                    </div>
                </div>";
            }
        }
        ?>
    </div>
</nav>
<!-- Navbar End -->
