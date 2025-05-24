<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Klinik - Clinic Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700;900&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

      <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->
    <?php
   include('components/navbar.php');
   ?>
<div class="container-fluid px-0 mx-0">
  <div class="row g-0">

    <!-- Left Column -->
    <div class="col-12 col-md-6">
      <div class="signbox-l bg-primary text-white p-4 d-flex flex-column justify-content-center" style="min-height: 600px;">
        <div>
          <h3 class="mb-4">Get access to everything WebMD offers</h3>
          <ul class="list-unstyled ps-3 mb-0">
            <li class="d-flex align-items-start mb-3">
              <span class="me-2">•</span>
              <span>Personalized tools for managing your health</span>
            </li>
            <li class="d-flex align-items-start mb-3">
              <span class="me-2">•</span>
              <span>Health and wellness updates delivered to your inbox</span>
            </li>
            <li class="d-flex align-items-start mb-3">
              <span class="me-2">•</span>
              <span>Saved articles, conditions and medications</span>
            </li>
            <li class="d-flex align-items-start mb-3">
              <span class="me-2">•</span>
              <span>Health and wellness updates delivered to your inbox</span>
            </li>
            <li class="d-flex align-items-start mb-3">
              <span class="me-2">•</span>
              <span>Health and wellness updates delivered to your inbox</span>
            </li>
            <li class="d-flex align-items-start mb-3">
              <span class="me-2">•</span>
              <span>Health and wellness updates delivered to your inboxs</span>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Right Column -->
    <div class="col-12 col-md-6">
      <div class="p-4 d-flex flex-column justify-content-center" style="min-height: 600px;">
        <div>
          <h3 class="text-center text-primary mb-3">Sign Up</h3>
          <form method="POST">
    <!-- Full Name -->
    <div class="form-group mb-2">
        <label class="mb-1" for="fullName">Full Name</label>
        <input placeholder="Enter your name" type="text" id="fullName" name="name" class="form-control" required>
    </div>

    <!-- Email -->
    <div class="form-group mb-2">
        <label class="mb-1" for="email">Email Address</label>
        <input placeholder="Enter your @email" type="email" id="email" name="email" class="form-control" required>
    </div>

    <!-- Password -->
    <div class="form-group mb-2">
        <label class="mb-1" for="password">Password</label>
        <input placeholder="Enter your password"  type="password" id="password" name="password" class="form-control" required>
    </div>

    <!-- Role Selection (Doctor or Patient) -->
    <div class="form-group mb-2">
        <label class="mb-1" for="role">Select Role</label>
        <select id="role" name="role" class="form-control" required>
            <option disabled selected>select</option>
            <option value="patient">Patient</option>
            <option value="doctor">Doctor</option>
        </select>
    </div>
    <input type="submit" name="signup" value="Sign Up" class="btn btn-primary w-100 p-2 mt-4 mb-2">
    </form>
<?php
include('connection.php');

if (isset($_POST['signup'])) {
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $role     = $_POST['role'];

    $check_email = mysqli_query($conn, "SELECT * FROM doctor_register WHERE email = '$email'");
    $check_password = mysqli_query($conn, "SELECT * FROM doctor_register WHERE password = '$password'");
    if(mysqli_num_rows($check_email) || mysqli_num_rows($check_password)){
      echo"
       <script>
       alert('Email or password already exists!')
       </script>
      ";
    }

    if ($role === "doctor") {
        $query = "INSERT INTO doctor_register (name, email, password, role, date_time)
                  VALUES ('$name', '$email', '$password', '$role', NOW())";
    } elseif ($role === "patient") {
        $query = "INSERT INTO patient_register (name, email, password, role, date_time)
                  VALUES ('$name', '$email', '$password', '$role', NOW())";
    }

    $result = mysqli_query($conn, $query);

if ($result) {
    $last_id = mysqli_insert_id($conn);

    $_SESSION['doctor_id'] = $last_id;
    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;
    $_SESSION['role'] = $role;

} else {
    echo "Error: " . mysqli_error($conn);
}

}
?>

            <p class="text-center small">Already have an account? <a href="signin.php">Sign In here</a></p>
        </div>
      </div>
    </div>

  </div>
</div>


       <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Address</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social rounded-circle" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social rounded-circle" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social rounded-circle" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Services</h5>
                    <a class="btn btn-link" href="">Cardiology</a>
                    <a class="btn btn-link" href="">Pulmonary</a>
                    <a class="btn btn-link" href="">Neurology</a>
                    <a class="btn btn-link" href="">Orthopedics</a>
                    <a class="btn btn-link" href="">Laboratory</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Quick Links</h5>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Our Services</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">Support</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Newsletter</h5>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                        </br>
                        Distributed By <a class="border-bottom" href="https://themewagon.com" target="_blank">ThemeWagon</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>