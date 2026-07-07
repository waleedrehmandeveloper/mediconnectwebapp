<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>News</title>
  
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
  .card figure {
  position: relative;
  overflow: hidden;
}

.card figure img {
  transition: transform 0.5s ease;
}

.card figure:hover img {
  transform: scale(1.05);
}

.card figure figcaption {
  opacity: 0;
  background-color: rgba(0, 0, 0, 0.5); /* optional dark overlay */
  transition: opacity 0.5s ease;
}

.card figure:hover figcaption {
  opacity: 1;
}

    </style>
</head>
<body>
<!-- Navbar Start -->
   <?php
    include('components/navbar.php');
  ?>
<!-- Navbar End -->
 <div class="container-fluid">
   <section class="bsb-blog-5 py-5">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class='col-auto text-center'>
        <h2 class='display-5'>LATEST NEWS</h2>
        <hr class='w-25 mx-auto border-dark-subtle'>
      </div>
    </div> 
    <div class='row gy-4 gx-lg-5'>
      <?php
include("connection.php");
$query = "SELECT * FROM news";
$result = mysqli_query($conn, $query);

while($row = mysqli_fetch_assoc($result)) {
    echo "
    <div class='col-12 col-md-6 col-lg-4'>
      <article class='card border rounded-3 shadow-sm h-100 overflow-hidden'>
        <figure class='card-img-top position-relative m-0'>
          <a href='news_description.php?id=" . $row['id'] . "'>
            <img src='Admin_dashboard/src/assets/images/newsimg/".$row['card_image']."' 
                class='img-fluid bsb-hover-scale-up w-100' 
                alt='Medical News'>
            <figcaption class='position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center align-items-center opacity-0 hover-opacity-100 transition bg-dark bg-opacity-50'>
              <svg xmlns='http://www.w3.org/2000/svg' width='32' height='32' fill='currentColor'
                  class='bi bi-eye text-white mb-2' viewBox='0 0 16 16'>
                <path d='M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8z'/>
                <path d='M8 5.5a2.5 2.5 0 1 0 0 5'/>
              </svg>
              <h4 class='h6 text-white'>Read More</h4>
            </figcaption>
          </a>
        </figure>
        <div class='card-body px-3 pt-4'>
          <p class='text-muted small mb-1'><i class='bi bi-calendar-event'></i> " . $row['date'] . "</p>
          <h3 class='h5 fw-semibold mb-2'>
            <a href='news_des.php?id=". $row['id'] . "' class='link-dark text-decoration-none'>" . $row['title'] . "</a>
          </h3>
          <a href='news_des.php?id=" . $row['id'] . "' class='text-primary small text-decoration-underline'>Read Full Article →</a>
        </div>
        <div class='card-footer bg-transparent border-0 px-3 pb-4'>
          <p class='fs-6 text-secondary mb-0'>" . substr($row['content'], 0, 100) . "...</p>
        </div>
      </article>
    </div>
    ";
}
?>

    </div> 
  </div>
</section>

 </div>
</body>
</html>
