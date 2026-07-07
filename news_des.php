<?php
  session_start();
  // Debugging enabled (remove in production)
  ini_set('display_errors', 1);
  error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>News Article</title>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700;900&display=swap" rel="stylesheet"> 

  <!-- Icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">

  <!-- Custom Styling -->
 <style>
  body::-webkit-scrollbar {
    display: none;
  }
      .hero-image {
      width: 100%;
      height: 60vh;
      object-fit: cover;
      border-bottom: 4px solid #0d6efd;
    }
    .blog-container {
      max-width: 850px;
      margin: auto;
      padding: 60px 40px;
      background-color: white;
      margin-top: -100px;
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
      position: relative;
      z-index: 10;
    }
    .blog-title {
      font-size: 2.8rem;
      font-weight: 700;
      margin-bottom: 15px;
    }
    .blog-date {
      color: #6c757d;
      font-size: 0.95rem;
      margin-bottom: 30px;
    }
    .blog-content p {
      font-size: 1.15rem;
      line-height: 1.9;
      margin-bottom: 20px;
    }
  /* Container for hero image */
  .hero-container {
    position: relative;
    width: 100%;
    max-width: 900px;  /* max width container */
    height: 60vh;      /* same height as before */
    margin: 0 auto;    /* center horizontally */
    overflow: hidden;  /* crop overflow */
    border-bottom: 4px solid #0d6efd;
    border-radius: 8px;
  }

  /* Hero Image styles */
  .hero-image {
    position: absolute;
    top: 50%;
    left: 50%;
    width: auto;
    height: 100%;
    transform: translate(-50%, -50%);
    object-fit: cover;
    max-width: 100%;
  }
</style>

</head>
<body>
<?php
  include("components/navbar.php");
  include("connection.php");

  if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "SELECT * FROM news WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        $title = $row['title'];
        $content = nl2br($row['content']);
        $date_raw = $row['date'];
        $formatted_date = date("F j, Y", strtotime($date_raw)); 

        // Use correct column name
        $bannerImage = !empty($row['banner_image']) ? $row['banner_image'] : 'default_banner.jpg';
    } else {
        echo "<h2 class='text-center mt-5'>News not found.</h2>";
        exit;
    }
  } else {
    echo "<h2 class='text-center mt-5'>Invalid request.</h2>";
    exit;
  }
?>

<!-- Main Content -->
<div class="container-fluid">
  <!-- Hero Image -->
<div class="hero-container">
  <img src="Admin_dashboard/src/assets/images/newsimg/<?php echo $bannerImage; ?>" alt="Hero Image" class="hero-image" />
</div>


  <!-- Blog Card -->
  <div class="blog-container">
    <h1 class="blog-title"><?php echo htmlspecialchars($title); ?></h1>
    <div class="blog-date">Published on <?php echo $formatted_date; ?></div>
    <div class="blog-content">
      <?php echo $content; ?>
    </div>
  </div>
</div>

</body>
</html>
