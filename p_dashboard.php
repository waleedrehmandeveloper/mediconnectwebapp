<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Patient Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .dashlinks {
      padding: 10px 15px;
      border-radius: 5px;
      transition: background-color 0.3s ease, color 0.3s ease;
      display: block;
    }
    .dashlinks:hover {
      background-color: #0463FA;
      color: white;
    }
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row">

    <!-- Sidebar -->
    <nav class="col-md-3 col-12 bg-white border min-vh-100 p-4">
      <img class="w-100 mb-5" src="img/navlogo.jpg" alt="Logo">
      <ul class="nav flex-column mt-5">
        <li class="nav-item border mb-3">
          <a onclick="showSection('welcome')" class="nav-link dashlinks text-dark fs-5" href="#">🏠 Dashboard</a>
        </li>
        <li class="nav-item border mb-3">
          <a onclick="showSection('appointment')" class="nav-link dashlinks text-dark fs-5" href="#">📅 Appointment</a>
        </li>
        <li class="nav-item border mb-3">
          <a onclick="showSection('settings')" class="nav-link dashlinks text-dark fs-5" href="#">⚙️ Settings</a>
        </li>
        <li class="nav-item border mb-5">
          <a onclick="showSection('profile')" class="nav-link dashlinks text-dark fs-5" href="#">👤 My Profile</a>
        </li>
        <li class="nav-item border">
          <a class="nav-link dashlinks text-dark fs-5" href="logout.php">🚪 Logout</a>
        </li>
      </ul>
    </nav>

    <!-- Main Area -->
    <div class="col-md-9 col-12 p-4">
      
      <!-- Dashboard -->
      <section id="welcome">
        <h2>Welcome, Waleed 👋</h2>
        <p>This is your patient dashboard. You can view your appointments, profile, and settings.</p>
        <img src="img/dashimg.png" class="img-fluid mt-3" alt="Dashboard Image">
      </section>

      <!-- Appointment -->
      <section id="appointment" style="display: none;">
        <h2>📅 My Appointments</h2>
        <p>You have no upcoming appointments.</p>
      </section>

      <!-- Settings -->
      <section id="settings" style="display: none;">
        <h2>⚙️ Settings</h2>
        <p>Here you can update your password and preferences.</p>
      </section>

      <!-- Profile -->
      <section id="profile" style="display: none;">
        <h2>👤 My Profile</h2>
        <form method="POST" action="update-profile.php">
  <input type="text" name="specialization">
  <input type="text" name="city">
  <input type="text" name="postal_code">
  <input type="text" name="timing">
  <button type="submit" name="update">Update</button>
</form>
  <?php
   include('connection.php');
  session_start();
  $id = $_SESSION['doctorid'];
  $spec = $_POST['specialization'];
  $city = $_POST['city'];
  $postal = $_POST['postal_code'];
  $timing = $_POST['timing'];

  $query = "UPDATE doctor_register SET 
            specialization = '$spec',
            city = '$city',
            postal_code = '$postal',
            timing = '$timing'
          WHERE id = $id";
  mysqli_query($conn, $query);
  ?>
  </section>
  </div>
  </div>
</div>

<!-- JavaScript -->
<script>
  function showSection(id) {
    const sections = document.querySelectorAll('section');
    sections.forEach(sec => sec.style.display = 'none');
    document.getElementById(id).style.display = 'block';
  }
</script>

</body>
</html>
