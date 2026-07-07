<?php
echo"
<nav class='sidebar-nav scroll-sidebar d-flex flex-column' data-simplebar='' style='height: 100vh;'>
  <ul id='sidebarnav' class='flex-grow-1 d-flex flex-column'>
    <li class='nav-small-cap'>
      <i class='ti ti-dots nav-small-cap-icon fs-6'></i>
      <span class='hide-menu'>Home</span>
    </li>
    <li class='sidebar-item'>
      <a class='sidebar-link' href='./index.php' aria-expanded='false'>
        <span>
          <iconify-icon icon='solar:home-smile-bold-duotone' class='fs-6'></iconify-icon>
        </span>
        <span class='hide-menu'>Dashboard</span>
      </a>
    </li>
    <li class='nav-small-cap'>
      <i class='ti ti-dots nav-small-cap-icon fs-6'></i>
      <span class='hide-menu'>UI COMPONENTS</span>
    </li>
    <li class='sidebar-item'>
      <a class='sidebar-link' href='extra_info.php' aria-expanded='false'>
        <span>
          <iconify-icon icon='solar:layers-minimalistic-bold-duotone' class='fs-6'></iconify-icon>
        </span>
        <span class='hide-menu'>Extra info</span>
      </a>
    </li>
    <li class='sidebar-item'>
      <a class='sidebar-link' href='profile.php' aria-expanded='false'>
        <span>
          <iconify-icon icon='solar:danger-circle-bold-duotone' class='fs-6'></iconify-icon>
        </span>
        <span class='hide-menu'>Doctor Profile</span>
      </a>
    </li>
    <li class='sidebar-item'>
      <a class='sidebar-link' href='avaliblity.php' aria-expanded='false'>
        <span>
          <iconify-icon icon='solar:bookmark-square-minimalistic-bold-duotone' class='fs-6'></iconify-icon>
        </span>
        <span class='hide-menu'>Set Availability</span>
      </a>
    </li>
    <li class='sidebar-item'>
      <a class='sidebar-link' href='appointments.php' aria-expanded='false'>
        <span>
          <iconify-icon icon='solar:file-text-bold-duotone' class='fs-6'></iconify-icon>
        </span>
        <span class='hide-menu'>Appointments</span>
      </a>
    </li>
    <li class='sidebar-item mt-5'>
      <a class='sidebar-link text-danger fw-semibold' href='logout.php' aria-expanded='false' style='border-top: 1px solid #dee2e6; padding-top: 10px;'>
        <span>
          <iconify-icon icon='solar:logout-2-bold-duotone' class='fs-6'></iconify-icon>
        </span>
        <span class='hide-menu'>Logout</span>
      </a>
    </li>
  </ul>
</nav>
"
?>
