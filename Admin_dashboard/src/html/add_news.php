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

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
         <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="../../../index.php" class="text-nowrap logo-img">
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
        <div class="row">
          <div class="container py-5">
          <h2>Add News</h2>
          <form method="POST" enctype="multipart/form-data">  
        <div class="mb-3">
          <label for="newsTitle" class="form-label">Title</label>
          <input type="text" class="form-control" id="newsTitle" name="title" required>
        </div>
        <div class="mb-3">
          <label for="newsContent" class="form-label">Content</label>
          <textarea class="form-control" id="newsContent" name="content" rows="6" required></textarea>
        </div>

        <div class="mb-3">
          <label for="cardImage" class="form-label">Card Image</label>
          <input type="file" class="form-control" id="cardImage" name="card_image" accept="image/*" required>
        </div>
        <div class="mb-3">
          <label for="bannerImage" class="form-label">Banner Image</label>
          <input type="file" class="form-control" id="bannerImage" name="banner_image" accept="image/*" required>
        </div>

        <input name="save" type="submit" class="btn btn-primary" value="Save News">
      </form>
      <?php
include("connection.php");

if(isset($_POST['save'])){

  $title = mysqli_real_escape_string($conn, $_POST['title']);
  $content = mysqli_real_escape_string($conn, $_POST['content']);

  $uploadDir = "../assets/images/newsimg/";

  if (!is_dir($uploadDir)) {
      mkdir($uploadDir, 0755, true);
  }

  $uniqueId = time() . '_' . rand(1000, 9999);

  if(isset($_FILES['card_image']) && isset($_FILES['banner_image'])) {

    // Card Image
    $cardImageName = $_FILES['card_image']['name'];
    $cardImageTmp = $_FILES['card_image']['tmp_name'];
    $cardImageExt = pathinfo($cardImageName, PATHINFO_EXTENSION);
    $cardImageFinalName = $uniqueId . "_card." . $cardImageExt;
    $cardImagePath = $uploadDir . $cardImageFinalName;

    // Banner Image
    $bannerImageName = $_FILES['banner_image']['name'];
    $bannerImageTmp = $_FILES['banner_image']['tmp_name'];
    $bannerImageExt = pathinfo($bannerImageName, PATHINFO_EXTENSION);
    $bannerImageFinalName = $uniqueId . "_banner." . $bannerImageExt;
    $bannerImagePath = $uploadDir . $bannerImageFinalName;

    if(move_uploaded_file($cardImageTmp, $cardImagePath) && move_uploaded_file($bannerImageTmp, $bannerImagePath)) {
      $query = "INSERT INTO news (title, date, content, card_image, banner_image) 
                VALUES ('$title', NOW(), '$content', '$cardImageFinalName', '$bannerImageFinalName')";
      $result = mysqli_query($conn, $query);

      if($result){
        echo "<script>alert('News Added Successfully!'); window.location.href='../../../news_page.php';</script>";
        exit();
      } else {
        echo "Database Error: " . mysqli_error($conn);
      }
    } else {
      echo "Failed to upload images.";
    }

  } else {
    echo "Please upload both card and banner images.";
  }
}

?>

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