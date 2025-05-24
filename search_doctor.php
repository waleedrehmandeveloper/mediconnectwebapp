<?php
  if(isset($_SESSION['doctor_id'])){
    $doctorid = $_SESSION['doctor_id'];
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Find a Doctor</title>
  
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
h1 {
  text-align: center;
  margin-bottom: 30px;
  color: #2c3e50;
  margin-top: 20px;
}

.filters {
  display: flex;
  flex-wrap: wrap;
  gap: 15px;
  justify-content: center;
  margin-bottom: 30px;
}

.filters input,
.filters select {
  padding: 10px;
  width: 200px;
  border: 1px solid #ccc;
  border-radius: 6px;
}
.card_left{
  width: 70%;
}
  </style>
</head>
<body>
<!-- Navbar Start -->
   <?php
    include('components/navbar.php');
  ?>
<!-- Navbar End -->

<div class="container ">
  <h1>Find a Doctor</h1>

  <div class="filters">
    <input type="text" id="searchInput" placeholder="Search doctor name...">

    <select id="cityFilter">
      <option value="">All Cities</option>
      <option value="Lahore">Lahore</option>
      <option value="Karachi">Karachi</option>
      <option value="Islamabad">Islamabad</option>
    </select>

    <select id="specializationFilter">
      <option value="">All Specializations</option>
      <option value="Cardiologist">Cardiologist</option>
      <option value="Dermatologist">Dermatologist</option>
      <option value="Pediatrician">Pediatrician</option>
    </select>

    <select id="timingFilter">
      <option value="">All Timings</option>
      <option value="Morning">Morning</option>
      <option value="Evening">Evening</option>
      <option value="Night">Night</option>
    </select>
  </div>

  <div class="doctor-list m-0" id="doctorList">
  <!-- Doctor card -->
  <?php
include("connection.php");

if (isset($_SESSION['doctor_id'])) {
    $query = "SELECT * FROM doctor_register WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $doctorid);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        echo "
        <div class='doctor-card' style='display: flex; flex-wrap: wrap; gap: 30px; align-items: center; border: 1px solid #ccc; padding: 15px; margin-bottom: 15px;'>
            <div class='card_left' style='flex: 1 1 300px; display: flex; gap: 20px; align-items: center;'>
                <img src='../Mediconnect/Doctor_dashboard/src/html/".$row['profile_pic']."' alt='Doctor Image' style='width: 100px; height: 100px; object-fit: cover; border-radius: 8px;'>
                <div style='line-height: 18px;'>
                    <h4 style='margin: 0;'>".$row['name']."</h4>
                    <p style='margin: 4px 0;'>".$row['category']."</p>
                    <p style='margin: 4px 0;'>Postal: 12345</p>
                    <p style='margin: 4px 0;'>City: ".$row['location']."</p>
                    <div style='font-size: 13px; color: orange; margin-top: 10px;'>5 Yrs Experience</div>
                </div>
            </div>
            <div style='flex: 1 1 250px; text-align: center;'>
                <div class='d-flex justify-content-center gap-2 flex-wrap'>
                    <div class='rounded px-3 py-1 border bg-light'>PRP</div>
                    <div class='rounded px-3 py-1 border bg-light'>Skin Care</div>
                    <div class='rounded px-3 py-1 border bg-light'>Hair Fall</div>
                    <div class='rounded px-3 py-1 border bg-light'>Acne</div>
                </div>
            </div>
            <div class='card_right' style='flex: 1 1 200px; display: flex; flex-direction: column; justify-content: center; align-items: flex-end; gap: 10px;'>
                <a href='profiles.php?id=$doctorid' class='btn btn-primary'>View Profile</a>
                <button class='btn btn-success'>Appointment</button>
            </div>
        </div>
        ";
    }
}
else {
    $query = "SELECT * FROM doctor_register";
    $result = $conn->query($query);
    $query2= "SELECT * FROM doctor_register where city like '%%'";
    $result2 = $conn->query($query2);
    while ($row = $result->fetch_assoc()) {
        echo "
         <div class='doctor-card' style='display: flex; flex-wrap: wrap; gap: 30px; align-items: center; border: 1px solid #ccc; padding: 15px; margin-bottom: 15px;'>
            <div class='card_left' style='flex: 1 1 300px; display: flex; gap: 20px; align-items: center;'>
                <img src='../Mediconnect/Doctor_dashboard/src/html/".$row['profile_pic']."' alt='Doctor Image' style='width: 100px; height: 100px; object-fit: cover; border-radius: 8px;'>
                <div style='line-height: 18px;'>
                    <h4 style='margin: 0;'>".$row['name']."</h4>
                    <p style='margin: 4px 0;'>".$row['category']."</p>
                    <p style='margin: 4px 0;'>Postal: 12345</p>
                    <p style='margin: 4px 0;'>City: ".$row['location']."</p>
                    <div style='font-size: 13px; color: orange; margin-top: 10px;'>5 Yrs Experience</div>
                </div>
            </div>
            <div style='flex: 1 1 250px; text-align: center;'>
                <div class='d-flex justify-content-center gap-2 flex-wrap'>
                    <div class='rounded px-3 py-1 border bg-light'>PRP</div>
                    <div class='rounded px-3 py-1 border bg-light'>Skin Care</div>
                    <div class='rounded px-3 py-1 border bg-light'>Hair Fall</div>
                    <div class='rounded px-3 py-1 border bg-light'>Acne</div>
                </div>
            </div>
            <div class='card_right' style='flex: 1 1 200px; display: flex; flex-direction: column; justify-content: center; align-items: flex-end; gap: 10px;'>
                <a href='profiles.php?id=".$row['id']."' class='btn btn-primary'>View Profile</a>
                <button class='btn btn-success'>Appointment</button>
            </div>
        </div>
       ";
    }
}
?>
</div>
</div>
</body>
</html>
