<?php
$user  = 'Admin';
$title = 'Dashboard';
$site_name = 'LaborChowk';



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>LaborChowk · Admin Dashboard</title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome 6 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!-- Google Font: Inter -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../assets/css/dashboard-css.css" >
</head>
<body>

<!-- BACKDROP (mobile) -->
<div id="sidebarBackdrop" class="sidebar-backdrop"></div>

<div class="wrapper">
  <!-- ========== SIDEBAR – LABOR CHOWK (SHRINK/EXPAND INTACT) ========== -->
  <?php require_once('./sidebar.php') ?>

  <!-- PAGE CONTENT -->
  <div id="content" class="d-flex flex-column">

    <!-- HEADER (toggles intact) -->
     <?php include_once('./header.php') ?>
    <!-- END HEADER -->

    <!-- MAIN DASHBOARD -->
    <main class="p-3">

      <!-- row 1: stats cards -->
      <div class="row g-3 mb-4">
        <div class="col-sm-6 col-xl-3">
          <div class="card card-dash p-3 h-100">
            <div class="d-flex align-items-center">
              <div class="flex-shrink-0">
                <i class="fa-solid fa-user-check stat-icon" style="background: #e0f0f5; color: #19718b;"></i>
              </div>
              <div class="flex-grow-1 ms-3">
                <p class="text-secondary mb-0 text-uppercase fw-semibold" style="font-size: 0.7rem;">Verified employers</p>
                <h4 class="fw-bold mb-0" style="font-size: 1.3rem;">1,423</h4>
                <span class="text-success small"><i class="fas fa-arrow-up"></i> +8</span>
                <span class="text-secondary ms-2" style="font-size: 0.7rem;">12 pending</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-xl-3">
          <div class="card card-dash p-3 h-100">
            <div class="d-flex align-items-center">
              <div class="flex-shrink-0">
                <i class="fa-solid fa-people-arrows stat-icon" style="background: #fcead8; color: #b0722e;"></i>
              </div>
              <div class="flex-grow-1 ms-3">
                <p class="text-secondary mb-0 text-uppercase fw-semibold" style="font-size: 0.7rem;">Active labors</p>
                <h4 class="fw-bold mb-0" style="font-size: 1.3rem;">3,872</h4>
                <span class="text-success small"><i class="fas fa-arrow-up"></i> +18%</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-xl-3">
          <div class="card card-dash p-3 h-100">
            <div class="d-flex align-items-center">
              <div class="flex-shrink-0">
                <i class="fa-solid fa-briefcase stat-icon" style="background: #e0ede8; color: #1e7a62;"></i>
              </div>
              <div class="flex-grow-1 ms-3">
                <p class="text-secondary mb-0 text-uppercase fw-semibold" style="font-size: 0.7rem;">Open jobs nearby</p>
                <h4 class="fw-bold mb-0" style="font-size: 1.3rem;">246</h4>
                <span class="text-success small"><i class="fas fa-arrow-up"></i> +5%</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-xl-3">
          <div class="card card-dash p-3 h-100">
            <div class="d-flex align-items-center">
              <div class="flex-shrink-0">
                <i class="fa-solid fa-flag stat-icon" style="background: #ffded9; color: #b14d3e;"></i>
              </div>
              <div class="flex-grow-1 ms-3">
                <p class="text-secondary mb-0 text-uppercase fw-semibold" style="font-size: 0.7rem;">Active complaints</p>
                <h4 class="fw-bold mb-0" style="font-size: 1.3rem;">47</h4>
                <span class="text-danger small"><i class="fas fa-arrow-up"></i> +22%</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      

    </main>
    <!-- END MAIN -->
  </div>
  <!-- END CONTENT -->
</div>
<!-- END WRAPPER -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/js/main.js"></script>
</body>
</html>