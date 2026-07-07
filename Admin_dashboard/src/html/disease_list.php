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

// Delete disease
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    $stmt = $conn->prepare("DELETE FROM diseases WHERE id = ?");
    $stmt->bind_param("i", $delete_id);
    $stmt->execute();
    $stmt->close();
    header("Location: disease_list.php");
    exit();
}

// Fetch all diseases
$result = $conn->query("SELECT * FROM diseases ORDER BY id DESC");
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Disease List</title>
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

      <div class="container-fluid py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h2>Diseases</h2>
          <a href="add_disease.php" class="btn btn-success">+ Add New Disease</a>
        </div>

        <table class="table table-bordered table-hover bg-white">
          <thead class="table-dark">
            <tr>
              <th>#</th>
              <th>Disease Name</th>
              <th>Medicine</th>
              <th>Description</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if ($result && $result->num_rows > 0) {
                $count = 1;
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $count++ . "</td>";
                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['medicine']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                    echo "<td>
                            <a href='add_disease.php?id=" . $row['id'] . "' class='btn btn-sm btn-warning'>Edit</a> 
                            <a href='disease_list.php?delete_id=" . $row['id'] . "' class='btn btn-sm btn-danger' onclick='return confirm(\"Are you sure to delete this disease?\");'>Delete</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5' class='text-center'>No diseases found.</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
</div>

<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/sidebarmenu.js"></script>
<script src="../assets/js/app.min.js"></script>
</body>
</html>
