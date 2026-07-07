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
<?php
include("connection.php");

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$editMode = false;

$title = '';
$content = '';
$cardImageExisting = '';
$bannerImageExisting = '';

if ($id > 0) {
  $editMode = true;
  $query = "SELECT * FROM news WHERE id = $id";
  $result = mysqli_query($conn, $query);
  if ($row = mysqli_fetch_assoc($result)) {
    $title = $row['title'];
    $content = $row['content'];
    $cardImageExisting = $row['card_image'];
    $bannerImageExisting = $row['banner_image'];
  }
}
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
    <div class="container py-5">
  <div class="card shadow-lg border-0 rounded-4">
    <div class="card-body p-5">
      <h2 class="mb-4 text-center text-primary"><?= $editMode ? 'Edit News' : 'Add News' ?></h2>

      <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $id ?>">

        <!-- Title -->
        <div class="mb-4">
          <label for="newsTitle" class="form-label fw-bold">Title</label>
          <input type="text" class="form-control rounded-3" id="newsTitle" name="title" value="<?= htmlspecialchars($title) ?>" required>
        </div>

        <!-- Content -->
        <div class="mb-4">
          <label for="newsContent" class="form-label fw-bold">Content</label>
          <textarea class="form-control rounded-3" id="newsContent" name="content" rows="6" required><?= htmlspecialchars($content) ?></textarea>
        </div>

        <!-- Card Image -->
        <div class="mb-4">
          <label for="cardImage" class="form-label fw-bold">Card Image</label>
          <input type="file" class="form-control rounded-3" id="cardImage" name="card_image" accept="image/*" <?= $editMode ? '' : 'required' ?>>
          <?php if ($editMode && $cardImageExisting): ?>
            <div class="mt-2">
              <img src="../assets/images/newsimg/<?= $cardImageExisting ?>" alt="Card Image" class="rounded shadow-sm" width="120">
            </div>
          <?php endif; ?>
        </div>

        <!-- Banner Image -->
        <div class="mb-4">
          <label for="bannerImage" class="form-label fw-bold">Banner Image</label>
          <input type="file" class="form-control rounded-3" id="bannerImage" name="banner_image" accept="image/*" <?= $editMode ? '' : 'required' ?>>
          <?php if ($editMode && $bannerImageExisting): ?>
            <div class="mt-2">
              <img src="../assets/images/newsimg/<?= $bannerImageExisting ?>" alt="Banner Image" class="rounded shadow-sm" width="120">
            </div>
          <?php endif; ?>
        </div>

        <!-- Submit Button -->
        <div class="d-grid">
          <input name="save" type="submit" class="btn btn-primary btn-lg rounded-3" value="<?= $editMode ? 'Update News' : 'Save News' ?>">
        </div>
      </form>
    </div>
  </div>
</div>

<?php
if(isset($_POST['save'])){
  $id = isset($_POST['id']) ? intval($_POST['id']) : 0;

  $title = mysqli_real_escape_string($conn, $_POST['title']);
  $content = mysqli_real_escape_string($conn, $_POST['content']);

  $uploadDir = "../assets/images/newsimg/";
  if (!is_dir($uploadDir)) {
      mkdir($uploadDir, 0755, true);
  }

  $cardImageFinalName = $cardImageExisting;
  $bannerImageFinalName = $bannerImageExisting;

  $uniqueId = time() . '_' . rand(1000, 9999);

  if(isset($_FILES['card_image']) && $_FILES['card_image']['size'] > 0){
    $cardImageName = $_FILES['card_image']['name'];
    $cardImageTmp = $_FILES['card_image']['tmp_name'];
    $cardImageExt = pathinfo($cardImageName, PATHINFO_EXTENSION);
    $cardImageFinalName = $uniqueId . "_card." . $cardImageExt;
    move_uploaded_file($cardImageTmp, $uploadDir . $cardImageFinalName);
  }

  if(isset($_FILES['banner_image']) && $_FILES['banner_image']['size'] > 0){
    $bannerImageName = $_FILES['banner_image']['name'];
    $bannerImageTmp = $_FILES['banner_image']['tmp_name'];
    $bannerImageExt = pathinfo($bannerImageName, PATHINFO_EXTENSION);
    $bannerImageFinalName = $uniqueId . "_banner." . $bannerImageExt;
    move_uploaded_file($bannerImageTmp, $uploadDir . $bannerImageFinalName);
  }

  if ($id > 0) {
    $query = "UPDATE news SET 
                title = '$title',
                content = '$content',
                card_image = '$cardImageFinalName',
                banner_image = '$bannerImageFinalName',
                date = NOW()
              WHERE id = $id";
            $msg = "News Updated Successfully!";
        } else {
            $query = "INSERT INTO news (title, date, content, card_image, banner_image) 
                    VALUES ('$title', NOW(), '$content', '$cardImageFinalName', '$bannerImageFinalName')";
            $msg = "News Added Successfully!";
        }

        $result = mysqli_query($conn, $query);
        if($result){
            echo "<script>alert('$msg'); window.location.href='../../../news_page.php';</script>";
            exit();
        } else {
            echo "Database Error: " . mysqli_error($conn);
        }
        }
        ?>
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