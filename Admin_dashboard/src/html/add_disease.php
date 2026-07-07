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
include 'connection.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$disease_name = $medicine = $description = "";

// Agar edit mode hai to data fetch karo
if ($id > 0) {
    $stmt = $conn->prepare("SELECT name, medicine, description FROM diseases WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($disease_name, $medicine, $description);
    $stmt->fetch();
    $stmt->close();
}

// Form submit handling
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $disease_name = mysqli_real_escape_string($conn, $_POST['disease_name']);
    $medicine = mysqli_real_escape_string($conn, $_POST['medicine']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    if ($id > 0) {
        // Update query
        $stmt = $conn->prepare("UPDATE diseases SET name=?, medicine=?, description=? WHERE id=?");
        $stmt->bind_param("sssi", $disease_name, $medicine, $description, $id);
        if ($stmt->execute()) {
            echo "<script>alert('Disease updated successfully.'); window.location.href='disease_list.php';</script>";
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        // Insert query
        $stmt = $conn->prepare("INSERT INTO diseases (name, medicine, description) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $disease_name, $medicine, $description);
        if ($stmt->execute()) {
            echo "<script>alert('Disease added successfully.'); window.location.href='disease_list.php';</script>";
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?php echo $id > 0 ? "Edit Disease" : "Add New Disease"; ?></title>
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <aside class="left-sidebar">
      <div>
         <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="../../../index.php" class="text-nowrap logo-img">
            <img class="w-100" src="../assets/images/logos/mediconnect_logo.png" alt="Logo" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <?php include('sidebar.php'); ?>
      </div>
    </aside>

    <div class="body-wrapper">
      <?php include('header.php'); ?>

      <div class="container py-5">
        <h2 class="mb-4"><?php echo $id > 0 ? "Edit Disease" : "Add New Disease"; ?></h2>
        <form method="POST" class="bg-white p-4 rounded shadow-sm">
          <div class="mb-3">
            <label class="form-label">Disease Name</label>
            <input type="text" name="disease_name" class="form-control" value="<?php echo htmlspecialchars($disease_name); ?>" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Medicine</label>
            <input type="text" name="medicine" class="form-control" value="<?php echo htmlspecialchars($medicine); ?>" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4" required><?php echo htmlspecialchars($description); ?></textarea>
          </div>
          <div class="d-flex justify-content-between">
            <a href="disease_list.php" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-success"><?php echo $id > 0 ? "Update" : "Save"; ?></button>
          </div>
        </form>
      </div>
    </div>
</div>

<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/sidebarmenu.js"></script>
<script src="../assets/js/app.min.js"></script>
</body>
</html>
