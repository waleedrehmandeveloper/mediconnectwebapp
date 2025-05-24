<?php
session_start();
include('connection.php');
$diseases = [];
$sql = "SELECT * FROM diseases ORDER BY name ASC";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
  $diseases[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Disease Finder</title>
  <link rel="stylesheet" href="css/style.css">
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
  <style>
    :root {
      --main-color: #007bff;
    }

    body {
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      background: #f4f7f9;
    }

    header {
      background: linear-gradient(135deg, var(--main-color), #0056b3);
      color: white;
      padding: 20px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .logo {
      font-size: 32px;
      animation: blinkLogo 1.5s infinite;
    }

    .title {
      font-size: 24px;
      font-weight: bold;
      text-align: center;
      flex-grow: 1;
    }

    @keyframes blinkLogo {
      0% { opacity: 1; transform: scale(1); }
      50% { opacity: 0.3; transform: scale(1.1); }
      100% { opacity: 1; transform: scale(1); }
    }

    .theme {
      text-align: center;
      padding: 10px;
    }

    .theme input {
      padding: 5px;
    }

    .alphabet-bar {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      padding: 15px;
      background: white;
      box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    }

    .alphabet-bar a {
      margin: 5px;
      padding: 10px;
      border: 1px solid var(--main-color);
      color: var(--main-color);
      text-decoration: none;
      border-radius: 8px;
      font-weight: bold;
      transition: all 0.3s ease;
    }

    .alphabet-bar a:hover,
    .alphabet-bar a.active {
      background: var(--main-color);
      color: white;
    }

    .search-container {
      max-width: 400px;
      margin: 20px auto;
      text-align: center;
    }

    .search-container input {
      width: 100%;
      padding: 12px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 30px;
    }

    .disease-list {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 15px;
      max-width: 1200px;
      margin: auto;
      padding: 20px;
    }

    .disease-card {
      background: white;
      padding: 18px;
      border-radius: 10px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.08);
      position: relative;
      transition: background 0.3s, color 0.3s;
      cursor: pointer;
    }

    .disease-card:hover {
      background: var(--main-color);
      color: white;
    }

    .disease-card .tooltip {
      display: none;
      position: absolute;
      bottom: 100%;
      left: 50%;
      transform: translateX(-50%);
      background: white;
      color: #333;
      padding: 8px 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 14px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      white-space: nowrap;
    }

    .disease-card:hover .tooltip {
      display: block;
    }

    #topBtn {
      position: fixed;
      bottom: 30px;
      right: 30px;
      background: var(--main-color);
      color: white;
      border: none;
      padding: 15px;
      border-radius: 50%;
      font-size: 18px;
      display: none;
      cursor: pointer;
    }

    #topBtn:hover {
      animation: shake 0.4s infinite;
    }

    @keyframes shake {
      0% { transform: translate(1px, 1px) rotate(0deg); }
      20% { transform: translate(-1px, -2px) rotate(-1deg); }
      40% { transform: translate(-3px, 0px) rotate(1deg); }
      60% { transform: translate(3px, 2px) rotate(0deg); }
      80% { transform: translate(1px, -1px) rotate(1deg); }
      100% { transform: translate(-1px, 2px) rotate(-1deg); }
    }

    @media (max-width: 600px) {
      .disease-card {
        font-size: 14px;
      }
    }

    /* Modal Styles */
    #diseaseModal {
      display: none;
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: rgba(0, 0, 0, 0.5);
      justify-content: center;
      align-items: center;
      z-index: 9999;
    }

    #diseaseModalContent {
      background: white;
      max-width: 500px;
      width: 90%;
      padding: 20px;
      border-radius: 10px;
      position: relative;
    }

    #diseaseModalContent span {
      position: absolute;
      top: 10px;
      right: 15px;
      font-size: 24px;
      cursor: pointer;
    }

    #diseaseModalContent h2 {
      margin-top: 0;
    }
  </style>
</head>
<body>
    <?php
      include('components/navbar.php');
    ?>
<div class="theme">
  <label>Select Theme Color:</label>
  <input type="color" id="themeColor" value="#007bff" onchange="changeThemeColor(this.value)">
</div>

<div class="alphabet-bar" id="alphabetBar">
  <a href="#" class="active" onclick="filterByLetter('#')">#</a>
  <?php foreach (range('A', 'Z') as $letter): ?>
    <a href="#" onclick="filterByLetter('<?php echo $letter; ?>')"><?php echo $letter; ?></a>
  <?php endforeach; ?>
</div>

<div class="search-container">
  <input type="text" id="searchBox" placeholder="Search for a disease..." onkeyup="liveSearch()">
</div>

<div class="disease-list" id="diseaseList">
  <?php foreach ($diseases as $d): ?>
    <div class="disease-card"
         data-letter="<?= $d['letter']; ?>"
         data-name="<?= strtolower($d['name']); ?>"
         data-description="<?= htmlspecialchars($d['description']); ?>"
         onclick="openModal('<?= htmlspecialchars($d['name']); ?>', '<?= htmlspecialchars($d['description']); ?>')">
      <?= htmlspecialchars($d['name']) ?>
      <div class="tooltip">Medicine: <?= htmlspecialchars($d['medicine']) ?></div>
    </div>
  <?php endforeach; ?>
</div>

<button id="topBtn" onclick="scrollToTop()">⬆</button>

<!-- Modal -->
<div id="diseaseModal">
  <div id="diseaseModalContent">
    <span onclick="closeModal()">×</span>
    <h2 id="modalTitle"></h2>
    <p id="modalDescription"></p>
  </div>
</div>

<script>
  const searchBox = document.getElementById("searchBox");
  const diseaseCards = document.querySelectorAll(".disease-card");
  const alphabetLinks = document.querySelectorAll(".alphabet-bar a");

  function filterByLetter(letter) {
    event.preventDefault();
    alphabetLinks.forEach(link => link.classList.remove("active"));
    event.target.classList.add("active");

    diseaseCards.forEach(card => {
      const cardLetter = card.getAttribute("data-letter");
      if (letter === "#" || cardLetter === letter) {
        card.style.display = "block";
      } else {
        card.style.display = "none";
      }
    });
    searchBox.value = "";
  }

  function liveSearch() {
    const query = searchBox.value.toLowerCase();
    alphabetLinks.forEach(link => link.classList.remove("active"));

    diseaseCards.forEach(card => {
      const name = card.getAttribute("data-name");
      card.style.display = name.includes(query) ? "block" : "none";
    });
  }

  function scrollToTop() {
    window.scrollTo({ top: 0, behavior: "smooth" });
  }

  window.onscroll = function () {
    const btn = document.getElementById("topBtn");
    if (window.scrollY > 300) {
      btn.style.display = "block";
    } else {
      btn.style.display = "none";
    }
  };

  function changeThemeColor(color) {
    document.documentElement.style.setProperty('--main-color', color);
  }

  function openModal(title, description) {
    document.getElementById("modalTitle").innerText = title;
    document.getElementById("modalDescription").innerText = description;
    document.getElementById("diseaseModal").style.display = "flex";
  }

  function closeModal() {
    document.getElementById("diseaseModal").style.display = "none";
  }
</script>

</body>
</html>
