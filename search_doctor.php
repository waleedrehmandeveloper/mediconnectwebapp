<?php
  session_start();
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
  <div class="d_card w-100" style="display: flex; justify-content: space-between; align-items: center; padding: 20px; border: 1px solid #ddd; margin-bottom: 20px;">

    <!-- Left side: image and info -->
    <div class="card_left" style="display: flex; gap: 30px; align-items: center; flex: 1;">
      <img src="img/carousel-3.jpg" alt="" style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px;">
      <div style="line-height: 18px;">
        <h4 style="margin: 0;">WALEED REHMAN</h4>
        <p style="margin: 4px 0;">Dermatologist</p>
        <p style="margin: 4px 0;">Postal: 5400</p>
        <p style="margin: 4px 0;">Timing: Evening</p>
        <p style="margin: 4px 0;">City: Karachi</p>
        <div style="font-size: 13px; color: orange; margin-top: 10px;">3 Yrs Experience</div>
      </div>
    </div>

    <!-- Center: PRP buttons -->
    <div style="flex: 1; text-align: center;">
      <div class="d-flex justify-content-center gap-2 flex-wrap">
        <div class="rounded p-2 border">PRP</div>
        <div class="rounded p-2 border">Skin Care</div>
        <div class="rounded p-2 border">Hair Fall</div>
        <div class="rounded p-2 border">Acne</div>
      </div>
    </div>

    <!-- Right side: buttons at bottom -->
    <div class="card_right" style="display: flex; flex-direction: column; justify-content: flex-end; align-items: flex-end; height: 100%;">
      <button class="btn btn-primary" style="padding: 8px 18px; margin-bottom: 10px;">View Profile</button>
      <button class="btn btn-success" style="padding: 8px 12px;">Appointment</button>
    </div>

  </div>
  <div class="d_card w-100" style="display: flex; justify-content: space-between; align-items: center; padding: 20px; border: 1px solid #ddd; margin-bottom: 20px;">

    <!-- Left side: image and info -->
    <div class="card_left" style="display: flex; gap: 30px; align-items: center; flex: 1;">
      <img src="img/carousel-3.jpg" alt="" style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px;">
      <div style="line-height: 18px;">
        <h4 style="margin: 0;">WALEED REHMAN</h4>
        <p style="margin: 4px 0;">Dermatologist</p>
        <p style="margin: 4px 0;">Postal: 5400</p>
        <p style="margin: 4px 0;">Timing: Evening</p>
        <p style="margin: 4px 0;">City: Karachi</p>
        <div style="font-size: 13px; color: orange; margin-top: 10px;">3 Yrs Experience</div>
      </div>
    </div>

    <!-- Center: PRP buttons -->
    <div style="flex: 1; text-align: center;">
      <div class="d-flex justify-content-center gap-2 flex-wrap">
        <div class="rounded p-2 border">PRP</div>
        <div class="rounded p-2 border">Skin Care</div>
        <div class="rounded p-2 border">Hair Fall</div>
        <div class="rounded p-2 border">Acne</div>
      </div>
    </div>

    <!-- Right side: buttons at bottom -->
    <div class="card_right" style="display: flex; flex-direction: column; justify-content: flex-end; align-items: flex-end; height: 100%;">
      <button class="btn btn-primary" style="padding: 8px 18px; margin-bottom: 10px;">View Profile</button>
      <button class="btn btn-success" style="padding: 8px 12px;">Appointment</button>
    </div>

  </div>
  <div class="d_card w-100" style="display: flex; justify-content: space-between; align-items: center; padding: 20px; border: 1px solid #ddd; margin-bottom: 20px;">

    <!-- Left side: image and info -->
    <div class="card_left" style="display: flex; gap: 30px; align-items: center; flex: 1;">
      <img src="img/carousel-3.jpg" alt="" style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px;">
      <div style="line-height: 18px;">
        <h4 style="margin: 0;">ABDULLA AKRAM</h4>
        <p style="margin: 4px 0;">Dermatologist</p>
        <p style="margin: 4px 0;">Postal: 5400</p>
        <p style="margin: 4px 0;">Timing: Evening</p>
        <p style="margin: 4px 0;">City: Karachi</p>
        <div style="font-size: 13px; color: orange; margin-top: 10px;">3 Yrs Experience</div>
      </div>
    </div>

    <!-- Center: PRP buttons -->
    <div style="flex: 1; text-align: center;">
      <div class="d-flex justify-content-center gap-2 flex-wrap">
        <div class="rounded p-2 border">PRP</div>
        <div class="rounded p-2 border">Skin Care</div>
        <div class="rounded p-2 border">Hair Fall</div>
        <div class="rounded p-2 border">Acne</div>
      </div>
    </div>

    <!-- Right side: buttons at bottom -->
    <div class="card_right" style="display: flex; flex-direction: column; justify-content: flex-end; align-items: flex-end; height: 100%;">
      <button class="btn btn-primary" style="padding: 8px 18px; margin-bottom: 10px;">View Profile</button>
      <button class="btn btn-success" style="padding: 8px 12px;">Appointment</button>
    </div>

  </div>
  <div class="d_card w-100" style="display: flex; justify-content: space-between; align-items: center; padding: 20px; border: 1px solid #ddd; margin-bottom: 20px;">

    <!-- Left side: image and info -->
    <div class="card_left" style="display: flex; gap: 30px; align-items: center; flex: 1;">
      <img src="img/carousel-3.jpg" alt="" style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px;">
      <div style="line-height: 18px;">
        <h4 style="margin: 0;">ABRA QAMAR</h4>
        <p style="margin: 4px 0;">Dermatologist</p>
        <p style="margin: 4px 0;">Postal: 5400</p>
        <p style="margin: 4px 0;">Timing: Evening</p>
        <p style="margin: 4px 0;">City: Karachi</p>
        <div style="font-size: 13px; color: orange; margin-top: 10px;">3 Yrs Experience</div>
      </div>
    </div>

    <!-- Center: PRP buttons -->
    <div style="flex: 1; text-align: center;">
      <div class="d-flex justify-content-center gap-2 flex-wrap">
        <div class="rounded p-2 border">PRP</div>
        <div class="rounded p-2 border">Skin Care</div>
        <div class="rounded p-2 border">Hair Fall</div>
        <div class="rounded p-2 border">Acne</div>
      </div>
    </div>

    <!-- Right side: buttons at bottom -->
    <div class="card_right" style="display: flex; flex-direction: column; justify-content: flex-end; align-items: flex-end; height: 100%;">
      <button class="btn btn-primary" style="padding: 8px 18px; margin-bottom: 10px;">View Profile</button>
      <button class="btn btn-success" style="padding: 8px 12px;">Appointment</button>
    </div>

  </div>
  <div class="d_card w-100" style="display: flex; justify-content: space-between; align-items: center; padding: 20px; border: 1px solid #ddd; margin-bottom: 20px;">

    <!-- Left side: image and info -->
    <div class="card_left" style="display: flex; gap: 30px; align-items: center; flex: 1;">
      <img src="img/carousel-3.jpg" alt="" style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px;">
      <div style="line-height: 18px;">
        <h4 style="margin: 0;">ALI KHAN</h4>
        <p style="margin: 4px 0;">Dermatologist</p>
        <p style="margin: 4px 0;">Postal: 5400</p>
        <p style="margin: 4px 0;">Timing: Evening</p>
        <p style="margin: 4px 0;">City: Karachi</p>
        <div style="font-size: 13px; color: orange; margin-top: 10px;">3 Yrs Experience</div>
      </div>
    </div>

    <!-- Center: PRP buttons -->
    <div style="flex: 1; text-align: center;">
      <div class="d-flex justify-content-center gap-2 flex-wrap">
        <div class="rounded p-2 border">PRP</div>
        <div class="rounded p-2 border">Skin Care</div>
        <div class="rounded p-2 border">Hair Fall</div>
        <div class="rounded p-2 border">Acne</div>
      </div>
    </div>

    <!-- Right side: buttons at bottom -->
    <div class="card_right" style="display: flex; flex-direction: column; justify-content: flex-end; align-items: flex-end; height: 100%;">
      <button class="btn btn-primary" style="padding: 8px 18px; margin-bottom: 10px;">View Profile</button>
      <button class="btn btn-success" style="padding: 8px 12px;">Appointment</button>
    </div>

  </div>
  <div class="d_card w-100" style="display: flex; justify-content: space-between; align-items: center; padding: 20px; border: 1px solid #ddd; margin-bottom: 20px;">

    <!-- Left side: image and info -->
    <div class="card_left" style="display: flex; gap: 30px; align-items: center; flex: 1;">
      <img src="img/carousel-3.jpg" alt="" style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px;">
      <div style="line-height: 18px;">
        <h4 style="margin: 0;">WALEED REHMAN</h4>
        <p style="margin: 4px 0;">Dermatologist</p>
        <p style="margin: 4px 0;">Postal: 5400</p>
        <p style="margin: 4px 0;">Timing: Evening</p>
        <p style="margin: 4px 0;">City: Karachi</p>
        <div style="font-size: 13px; color: orange; margin-top: 10px;">3 Yrs Experience</div>
      </div>
    </div>

    <!-- Center: PRP buttons -->
    <div style="flex: 1; text-align: center;">
      <div class="d-flex justify-content-center gap-2 flex-wrap">
        <div class="rounded p-2 border">PRP</div>
        <div class="rounded p-2 border">Skin Care</div>
        <div class="rounded p-2 border">Hair Fall</div>
        <div class="rounded p-2 border">Acne</div>
      </div>
    </div>

    <!-- Right side: buttons at bottom -->
    <div class="card_right" style="display: flex; flex-direction: column; justify-content: flex-end; align-items: flex-end; height: 100%;">
      <button class="btn btn-primary" style="padding: 8px 18px; margin-bottom: 10px;">View Profile</button>
      <button class="btn btn-success" style="padding: 8px 12px;">Appointment</button>
    </div>

  </div>
</div>



</body>
</html>
