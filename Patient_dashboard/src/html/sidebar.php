<?php
echo"
<nav class='sidebar-nav scroll-sidebar' data-simplebar=''>
          <ul id='sidebarnav'>
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
              <span class='hide-menu'>Profile management</span>
            </li>
            <li class='sidebar-item'>
              <a class='sidebar-link' href='profile.php' aria-expanded='false'>
                <span>
                  <iconify-icon icon='solar:layers-minimalistic-bold-duotone' class='fs-6'></iconify-icon>
                </span>
                <span class='hide-menu'>Profile</span>
              </a>
            </li>
            <li class='sidebar-item'>
              <a class='sidebar-link' href='appointments.php' aria-expanded='false'>
                <span>
                  <iconify-icon icon='solar:danger-circle-bold-duotone' class='fs-6'></iconify-icon>
                </span>
                <span class='hide-menu'>Appointments</span>
              </a>
            </li>
            <li class='sidebar-item'>
              <a class='sidebar-link' href='confirmation.php' aria-expanded='false'>
                <span>
                  <iconify-icon icon='solar:danger-circle-bold-duotone' class='fs-6'></iconify-icon>
                </span>
                <span class='hide-menu'>Appointments Confirm</span>
              </a>
            </li>
            <li class='sidebar-item'>
            <a class='sidebar-link text-danger fw-semibold mt-5' href='logout.php' aria-expanded='false' style='border-top: 1px solid #dee2e6; padding-top: 10px;'>
             <span>
            <iconify-icon icon='solar:logout-2-bold-duotone' class='fs-6'></iconify-icon>
            </span>
           <span class='hide-menu'>Logout</span>
           </a>
            </li>
          </nav>
"
?>