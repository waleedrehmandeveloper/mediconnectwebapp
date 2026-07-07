<?php
session_start();

include("connection.php");

if (!isset($_SESSION['patientid']) || $_SESSION['role'] != 'patient') {
    header("location: index.php");
    exit();
}

$patient_id = $_SESSION['patientid'];

$doctor_id = $_GET['id'];
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
    <style>
        body::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>

<body>
    <!-- Spinner Start -->
    <!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div> -->
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <?php
    include("components/navbar.php")
    ?>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Appointment</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Appointment</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->
    <!-- Appointment Start -->
     <?php
        $querydf = "SELECT phone,email FROM doctor_register";
        $resultdf = mysqli_query($conn,$querydf);
        $rowdf = mysqli_fetch_assoc($resultdf);
     ?>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <p class="d-inline-block border rounded-pill py-1 px-4">Appointment</p>
                    <h1 class="mb-4">Make An Appointment To Visit Our Doctor</h1>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                    <div class="bg-light rounded d-flex align-items-center p-5 mb-4">
                        <div title="Direct Call" class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-white" style="width: 55px; height: 55px;">
                            <a href="tel:<?php echo $rowdf['phone']; ?>">
                                <i class="fa fa-phone text-primary"></i>
                            </a>
                        </div>
                        <div class="ms-4">
                            <p class="mb-2">Call Us Now</p>
                            <h5 class="mb-0"><?php echo $rowdf['phone'] ?></h5>
                        </div>
                    </div>
                    <div class="bg-light rounded d-flex align-items-center p-5">
                        <div title="Send Email" class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-white" style="width: 55px; height: 55px;">
                        <i class="fa fa-envelope text-primary"></i>
                        </div>
                        <div class="ms-4">
                            <p class="mb-2">Mail Us Now</p>
                            <h5 class="mb-0"><?php echo $rowdf['email'] ?></h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded h-100 d-flex align-items-center p-5">
                        <form method='POST'>
                            <!-- Hidden IDs -->
                            <input type='hidden' name='doctor_id' value='<?php echo $doctor_id; ?>'>
                            <input type='hidden' name='patient_id' value='<?php echo $patient_id; ?>'>

                    <?php
                    $query_patient = "
                        SELECT 
                            patient_register.name, 
                            patient_register.email, 
                            patient_register.contact
                        FROM 
                            patient_register
                        WHERE 
                            patient_register.id = $patient_id
                    ";
                    $result_patient = mysqli_query($conn, $query_patient);
                    $query_availability = "
                        SELECT 
                            available_day, 
                            available_time_from, 
                            available_time_to
                        FROM 
                            doctor_availiblity
                        WHERE 
                            doctor_id = $doctor_id
                    ";
                    $result_availability = mysqli_query($conn, $query_availability);

                    // Render form
                  if ($row = mysqli_fetch_assoc($result_patient)) {
    echo "
    <div class='row g-3'>
        <!-- Patient Name -->
        <div class='col-12 col-sm-6'>
            <input readonly type='text' name='patient_name' value='" . $row['name'] . "' required class='form-control border-0' placeholder='Your Name' style='height: 55px;'>
        </div>

        <!-- Email -->
        <div class='col-12 col-sm-6'>
            <input readonly type='email' name='email' value='" . $row['email'] . "' required class='form-control border-0' placeholder='Your Email' style='height: 55px;'>
        </div>

        <!-- Mobile -->
        <div class='col-12'>
            <input readonly type='text' name='mobile' value='" . $row['contact'] . "' required class='form-control border-0' placeholder='Your Mobile' style='height: 55px;'>
        </div>

        <!-- Day & Time Dropdown -->
        <div class='col-12 col-sm-6'>
            <select name='day_time' class='form-control border-0' required style='height: 55px; width: 350px;'>
                <option value=''>-- Select Day & Time --</option>";
                
              while ($slot = mysqli_fetch_assoc($result_availability)) {
                $day = $slot['available_day'];
                $from = $slot['available_time_from'];
                $to = $slot['available_time_to'];
                echo "<option value='{$day}|{$from} to {$to}'>{$day} - {$from} to {$to}</option>";
            }

                echo "
                        </select>
                    </div>

                    <!-- Problem Description -->
                    <div class='col-12'>
                        <textarea name='message' class='form-control border-0' rows='5' placeholder='Describe your problem'></textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class='col-12'>
                        <input name='send' type='submit' class='btn btn-primary w-100 py-3' value='Send Appointment'>
                    </div>
                </div>
                ";
            }
            else {
                    echo "<p>Patient data not found.</p>";
               }
              ?>
             </form>
        <?php
        if (isset($_POST['send'])) {
            $doctor_id = $_POST['doctor_id'];
            $patient_id = $_POST['patient_id'];
            $name = $_POST['patient_name'];
            $email = $_POST['email'];
            $phone = $_POST['mobile'];
            $message = $_POST['message'];

          $day_time = explode("|", $_POST['day_time']);
            if (count($day_time) == 2) {
                $appointment_day = date('Y-m-d', strtotime("next " . trim($day_time[0])));
                $appointment_time = trim($day_time[1]);
            } else {
                $appointment_day = "";
                $appointment_time = "";
            }



            $created_at = date('Y-m-d H:i:s');
            $status = "Pending";

            if (!empty($appointment_day) && !empty($appointment_time)) {
    $query = "INSERT INTO appointments (
        patient_id,
        doctor_id,
        appointment_day,
        appointment_time,
        name,
        email,
        phone,
        status,
        message
    ) VALUES (
        '$patient_id',
        '$doctor_id',
        '$appointment_day',
        NOW(),
        '$name',
        '$email',
        '$phone',
        'Pending',
        '$message'
    )";
    $result = mysqli_query($conn, $query);
}


    if ($result) {
        echo "<script>alert('Appointment booked successfully');</script>";
    } else {
        echo "<script>alert('Failed to book appointment');</script>";
    }
}
?>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Appointment End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


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