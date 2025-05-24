<?php
echo "
<nav class='sidebar-nav scroll-sidebar' data-simplebar=''>
  <ul id='sidebarnav'>

    <!-- Dashboard -->
    <li class='nav-small-cap'>
      <i class='ti ti-dots nav-small-cap-icon fs-6'></i>
      <span class='hide-menu'>MAIN</span>
    </li>
    <li class='sidebar-item'>
      <a class='sidebar-link' href='index.php' aria-expanded='false'>
        <span>
          <iconify-icon icon='solar:home-smile-bold-duotone' class='fs-6'></iconify-icon>
        </span>
        <span class='hide-menu'>Dashboard</span>
      </a>
    </li>

    <!-- Doctors -->
    <li class='nav-small-cap'>
      <i class='ti ti-dots nav-small-cap-icon fs-6'></i>
      <span class='hide-menu'>MANAGE DATA</span>
    </li>
    <li class='sidebar-item'>
      <a class='sidebar-link' href='doctor.php' aria-expanded='false'>
        <span>
          <iconify-icon icon='solar:heart-bold-duotone' class='fs-6'></iconify-icon>
        </span>
        <span class='hide-menu'>Doctors</span>
      </a>
    </li>

    <!-- Patients -->
    <li class='sidebar-item'>
      <a class='sidebar-link' href='patient.php' aria-expanded='false'>
        <span>
          <iconify-icon icon='solar:user-bold-duotone' class='fs-6'></iconify-icon>
        </span>
        <span class='hide-menu'>Patients</span>
      </a>
    </li>

    <!-- Cities -->
    <li class='sidebar-item'>
      <a class='sidebar-link' href='cities.php' aria-expanded='false'>
        <span>
          <iconify-icon icon='solar:map-point-bold-duotone' class='fs-6'></iconify-icon>
        </span>
        <span class='hide-menu'>Cities</span>
      </a>
    </li>

    <!-- Appointments -->
    <li class='sidebar-item'>
      <a class='sidebar-link' href='appointment.php' aria-expanded='false'>
        <span>
          <iconify-icon icon='solar:calendar-mark-bold-duotone' class='fs-6'></iconify-icon>
        </span>
        <span class='hide-menu'>Appointments</span>
      </a>
    </li>

    <!-- Manage Disease -->
    <li class='nav-small-cap'>
      <i class='ti ti-dots nav-small-cap-icon fs-6'></i>
      <span class='hide-menu'>MANAGE DISEASE</span>
    </li>
    <li class='sidebar-item'>
      <a class='sidebar-link' href='add_disease.php' aria-expanded='false'>
        <span>
          <iconify-icon icon='solar:document-add-bold-duotone' class='fs-6'></iconify-icon>
        </span>
        <span class='hide-menu'>Add Disease</span>
      </a>
    </li>
    <li class='sidebar-item'>
      <a class='sidebar-link' href='disease_list.php' aria-expanded='false'>
        <span>
          <iconify-icon icon='solar:virus-bold-duotone' class='fs-6'></iconify-icon>
        </span>
        <span class='hide-menu'>Disease List</span>
      </a>
    </li>

    <!-- News -->
   <!-- News -->
<li class='nav-small-cap'>
  <i class='ti ti-dots nav-small-cap-icon fs-6'></i>
  <span class='hide-menu'>MANAGE NEWS</span>
</li>
<li class='sidebar-item'>
  <a class='sidebar-link' href='add_news.php' aria-expanded='false'>
    <span>
      <iconify-icon icon='solar:document-add-bold-duotone' class='fs-6'></iconify-icon>
    </span>
    <span class='hide-menu'>Add News</span>
  </a>
</li>
<li class='sidebar-item'>
  <a class='sidebar-link' href='news_list.php' aria-expanded='false'>
    <span>
     <iconify-icon icon='solar:news-bold-duotone' class='fs-4 me-2'></iconify-icon>
    </span>
    <span class='hide-menu'>News List</span>
  </a>
</li>
    <!-- Logout -->
    <li class='nav-small-cap'>
      <i class='ti ti-dots nav-small-cap-icon fs-6'></i>
      <span class='hide-menu'>ACCOUNT</span>
    </li>
    <li class='sidebar-item'>
      <a class='sidebar-link' href='logout.php' aria-expanded='false'>
        <span>
          <iconify-icon icon='solar:logout-bold-duotone' class='fs-6'></iconify-icon>
        </span>
        <span class='hide-menu'>Logout</span>
      </a>
    </li>

  </ul>
</nav>
";
?>
