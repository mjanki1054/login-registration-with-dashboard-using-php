<?php
$page_title = "Dashboard";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/* Safe session reads */
$userName = $_SESSION['user_name'] ?? 'Guest';
$userRole = $_SESSION['role'] ?? '';

/* Generate initials safely */
$initials = '';
if ($userName !== 'Guest') {
    foreach (explode(' ', $userName) as $part) {
        if (!empty($part)) {
            $initials .= strtoupper($part[0]);
        }
    }
}
$initials = $initials ?: 'U';
?>

<header class="dashboard-header d-flex justify-content-between align-items-center">
  <div class="d-flex align-items-center">
    <button id="sidebarCollapse" class="btn me-3 d-none d-md-block" type="button">
      <i class="fas fa-bars"></i>
    </button>
    <button id="sidebarCollapseMobile" class="btn me-2 d-md-none" type="button">
      <i class="fas fa-bars"></i>
    </button>

    <p class="mb-0 d-none d-sm-block fw-medium" style="color: #1e5c6c;">
      <h4  class="fs-6 fw-semibold d-flex align-items-center mb-0""><?= htmlspecialchars($page_title) ?> </h4>
    </p>

    <!-- <h5 class="mb-0 fw-semibold d-sm-none">LaborChowk</h5> -->
  </div>
  
  <div class="d-flex align-items-center gap-3">
    <div class="position-relative">
      <i class="fas fa-exclamation-triangle fs-6" style="color: #c9823a;"></i>
      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger px-1" style="font-size: 0.65rem;">12</span>
    </div>

    <div class="position-relative">
      <i class="fas fa-clipboard-list fs-6" style="color: #3a7ca5;"></i>
      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning px-1" style="font-size: 0.65rem; background: #f0b34b !important;">6</span>
    </div>
    
    <div class="dropdown">
      <button class="btn d-flex align-items-center gap-2 p-0 border-0 bg-transparent" type="button" data-bs-toggle="dropdown">
        <div class="rounded-circle d-flex align-items-center justify-content-center text-white" style="width: 36px; height: 36px; background: #1a667a;">
          <span class="fw-semibold" style="font-size: 0.85rem;">
            <?= htmlspecialchars($initials) ?>
          </span>
        </div>

        <span class="d-none d-md-inline fw-medium" style="color: #1d4e5d;">
          <?= htmlspecialchars($userName) ?>
        </span>

        <i class="fas fa-chevron-down" style="color: #588da0; font-size: 0.75rem;"></i>
      </button>

      <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 py-2">
        <li>
          <a class="dropdown-item py-1 px-3" href="#">
            <i class="fas fa-user-shield me-2"></i>Admin profile
          </a>
        </li>
        <li>
          <a class="dropdown-item py-1 px-3" href="#">
            <i class="fas fa-cog me-2"></i>Settings
          </a>
        </li>
        <li><hr class="dropdown-divider my-1"></li>
        <li>
          <a class="dropdown-item py-1 px-3 text-danger" href="../logout.php">
            <i class="fas fa-sign-out-alt me-2"></i>Logout
          </a>
        </li>
      </ul>
    </div>
  </div>
</header>
