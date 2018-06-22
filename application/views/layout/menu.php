<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url().'index.php/home'; ?>">
                  <span data-feather="home"></span>
                  Dashboard VFS
                </a>
              </li>
			  <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url().'index.php/dashboard'; ?>">
                  <span data-feather="home"></span>
                  Dashboard UKO
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url().'index.php/pengelolavfs'; ?>">
                  <span data-feather="file"></span>
                  Data Pengelola EDC VFS
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url().'index.php/pengelolauko'; ?>">
                  <span data-feather="file"></span>
                  Data Pengelola EDC UKO
                </a>
              </li>
            </ul>
    </div>
</nav>
        