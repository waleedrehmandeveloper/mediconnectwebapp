<?php
session_start();
$doctorprofile_id = $_GET['id'];
include("connection.php");
$query = "SELECT * FROM doctor_register WHERE id = $doctorprofile_id";
$result = mysqli_query($conn, $query);
$fresult = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Doctor Profile</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700;900&display=swap" rel="stylesheet">

  <!-- Font Awesome & Bootstrap Icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Custom Styles -->
  <link rel="stylesheet" href="css/style.css">
  <style>
  body::-webkit-scrollbar {
  display: none; 
  }
    .profile-banner {
      background-image: url('https://st4.depositphotos.com/9999814/24062/i/450/depositphotos_240620978-stock-photo-male-doctor-standing-hospital-office.jpg');
      background-size: cover;
      background-position: center;
      height: 200px;
      position: relative;
      border-bottom-left-radius: 20px;
      border-bottom-right-radius: 20px;
    }

    .profile-avatar {
      width: 140px;
      height: 140px;
      border-radius: 50%;
      object-fit: cover;
      border: 4px solid #fff;
      position: absolute;
      top: 50%;
      left: 30px;
      transform: translateY(-50%);
      background-color: #fff;
    }

    .profile-text {
      position: absolute;
      top: 50%;
      left: 190px;
      transform: translateY(-50%);
      color: white;
    }

    .profile-text h1 {
      margin: 0;
      color: black;
      font-weight: 700;
    }

    .profile-text span {
      font-size: 18px;
      color: black;
    }

    #uploadBtn {
      position: absolute;
      bottom: 15px;
      right: 15px;
      padding: 10px 20px;
      font-size: 15px;
      font-weight: 600;
      color: #fff;
      background-color: #0d6efd;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }

    @media (max-width: 500px) {
      .profile-text h1 {
        font-size: 24px;
      }
      .profile-text span {
        font-size: 14px;
      }
    }
  </style>
</head>
<body>

<?php include("components/navbar.php"); ?>

<div class="container-fluid">
  <div class="profile-banner container position-relative py-5">
    <img src="<?php echo '../Mediconnect/Doctor_dashboard/src/html/' . $fresult['profile_pic']; ?>" alt="Doctor Image" class="profile-avatar">
    <div class="profile-text">
      <h1><?php echo $fresult['name']; ?></h1>
      <span><?php echo $fresult['category']; ?> - <?php echo $fresult['location']; ?></span>
    </div>

    <!-- Hidden file input -->
    <input type="file" id="fileUpload" style="display: none;">
    <button type="button" id="uploadBtn">Upload</button>
  </div>

  <div class="container mt-5">
    <div class="card shadow-sm p-4">
      <div class="row">
        <div class="col-md-6 mb-4">
          <h4 class="mb-3">Doctor Information</h4>
          <h5>Availability</h5>

          <?php
        $doctorprofile_id = $_GET['id'];
          $showquery = "SELECT * FROM doctor_availiblity WHERE doctor_id = $doctorprofile_id";
          $showresult = mysqli_query($conn, $showquery);
          ?>

          <table class="table table-bordered w-100">
            <thead>
              <tr>
                <th>Day</th>
                <th>From</th>
                <th>To</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($showresult as $data): ?>
              <tr>
                <td><?php echo $data['available_day']; ?></td>
                <td><?php echo $data['available_time_from']; ?></td>
                <td><?php echo $data['available_time_to']; ?></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>

        <div class="col-md-6 mb-4">
          <h4 class="mb-3">Professional Details</h4>
          <p><strong>Qualification:</strong> <?php echo $fresult['qualification']; ?></p>
          <p><strong>Experience:</strong> 10+ years of clinical practice</p>
          <p><strong>Clinic:</strong> Rehman Dental Care, Faisalabad</p>
          <hr>
          <p><strong>Phone:</strong> <?php echo $fresult['phone']; ?></p>
          <p><strong>Location:</strong> <?php echo $fresult['location']; ?></p>
          <p><strong>Gender:</strong> <?php echo $fresult['gender']; ?></p>
           <?php
               echo "<a href='appointment.php?id=$doctorprofile_id' class='btn btn-primary mt-3'>Book Appointment</a>";
            ?>
        </div>
      </div>

      <div class="mt-4">
        <h4>Doctor Bio</h4>
        <p><?php echo $fresult['bio']; ?></p>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Upload Button JS -->
<script>
  const uploadBtn = document.getElementById('uploadBtn');
  const fileInput = document.getElementById('fileUpload');

  uploadBtn.addEventListener('click', () => {
    fileInput.click();
  });

  fileInput.addEventListener('change', () => {
    if (fileInput.files.length > 0) {
      alert(`Selected file: ${fileInput.files[0].name}`);
    }
  });
</script>

</body>
</html>
